<?php

namespace App\Exports;

use App\Gaji;
use App\DataKaryawan;
use App\Presensi;
use App\PresensiBulan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanPenggajian implements FromView
{

	protected $periode;
	protected $tanggal_awal;
	protected $tanggal_akhir;

	 function __construct($periode) {
	 	$data_tanggal = preg_split('/ +/', $periode);
	 	//dd($data_tanggal);

        $this->periode = $periode;
        $this->tanggal_awal  = $data_tanggal[0];
        $this->tanggal_akhir = $data_tanggal[1];
        //dd($this->tanggal_awal);
 	}

	 public function view(): View
    {
        $periode       = $this->periode;
        $tanggal_awal  = $this->tanggal_awal;
        $tanggal_akhir = $this->tanggal_akhir;

        $data_gaji     = \App\Gaji::where('periode_gaji',$periode)->get();
        $data_presensi = \App\PresensiBulan::where('periode_presensi',$periode)->get();
        $data_karyawan = \App\DataKaryawan::all();

        $count_absen = 0;
        $jumlah_hari = 0;

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            if(date('l', strtotime($tanggal_awal)) != 'Sunday' && date('l', strtotime($tanggal_awal)) != 'Saturday' ){
                $count_absen = $count_absen + 1;
            }
            $jumlah_hari = $jumlah_hari + 1 ;
            $tanggal_awal = date ("Y-m-d", strtotime("+1 day", strtotime($tanggal_awal)));
        }

        foreach ($data_karyawan as $data1) {
            foreach ($data_gaji as $data3) {
                if($data1->nik == $data3->nik){
                    foreach ($data_presensi as $data2) {
                        if ($data1->id_sidik_jari == 0 ) {
                            $id_sidik_jari = 0;
                            $jumlah_absen = null;
                            $cuti_luar_tanggungan = null;
                            $jumlah_keterlambatan = null;
                            $hari_transportasi = $count_absen;
                            $keterangan = null;
                        } else {
                            if($data1->id_sidik_jari == $data2->id_sidik_jari){
                                $id_sidik_jari = $data2->id_sidik_jari;
                                $jumlah_absen = $data2->jumlah_absen;
                                $cuti_luar_tanggungan = $data2->cuti_luar_tanggungan;
                                $jumlah_keterlambatan = $data2->jumlah_keterlambatan;
                                $hari_transportasi  = $data2->transport_presensi + $data2->tambahan_presensi;
                                $keterangan   = $data2->keterangan;
                            }
                        }
                    }

                    if($data1->divisi == 'Housekeeping' || $data1->divisi == 'Driver & Office Boy'){
                        $T_profesi = 150000;
                    } else {
                        $T_profesi = ($data3->pengalaman_bulan / 12) * ($data3->gaji_pokok * (8 / 100));    
                    }
                    
                    $T_transport = ($data3->T_transport * $hari_transportasi);
                    $bpjs_kesehatan_perusahaan = ($data3->basic_gaji_perhitungan_bpjs_kesehatan * (4 / 100));
                    $bpjs_kesehatan_karyawan   = ($data3->basic_gaji_perhitungan_bpjs_kesehatan * (1 / 100));
                    $bpjs_ketenagakerjaan_JKK  = ($data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan * ((0.24) / 100));
                    $bpjs_ketenagakerjaan_JKM  = ($data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan * ((0.3) / 100));
                    $bpjs_ketenagakerjaan_JHT  = ($data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan * ((3.7) / 100));

                    $keterangan_tunjangan_transport = $count_absen - $hari_transportasi;
                    if($keterangan_tunjangan_transport == 0 ){
                        $keterangan_tunjangan_transport = null;
                    }else{
                        // Do nothing;
                    }

                    if($keterangan == null){
                        $keterangan_akumulasi = null;
                        $disinsentif = ($jumlah_absen + $cuti_luar_tanggungan / $jumlah_hari) * ($data3->gaji_pokok + $T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus);
                    } else  {
                        $data_r = preg_split('/\+/', $keterangan);
                        $count   = count($data_r);
                        if($count > 1){
                           $keterangan_akumulasi = '(potongan '.$data_r[0].' tunjangan + '.$data_r[1].' Cuti/Disinsentif)';
                           $disinsentif = (($jumlah_absen + $cuti_luar_tanggungan / $jumlah_hari) * ($data3->gaji_pokok + $T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus)) + ($data3->T_kinerja * (int)$data_r[0] / 100);
                       } else {
                           $keterangan_akumulasi = '(potongan '.$data_r[0].' tunjangan)';
                           $disinsentif = (($jumlah_absen + $cuti_luar_tanggungan / $jumlah_hari) * ($data3->gaji_pokok + $T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus)) + ($data3->T_kinerja * (int)$data_r[0] / 100);
                       }
                   }

                   $total_gaji = ($data3->gaji_pokok + $T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus + $T_transport + $bpjs_kesehatan_perusahaan + $bpjs_ketenagakerjaan_JKK + $bpjs_ketenagakerjaan_JKM + $data3->insentif + $data3->bonus) - $disinsentif;
                   $gaji_setahun = ($total_gaji - $data3->bonus) * $data3->masa_kerja;
                   $iuran_JHT_karyawan = ((2 / 100) * $data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan) * $data3->masa_kerja;

                   $biaya_jabatan = $gaji_setahun * (5 / 100);
                   if($biaya_jabatan > 6000000){
                    $biaya_jabatan = 6000000;
                } else {
                        //do nothing tetap $gaji_setahun * (5 / 100);
                }

                $gaji_setelah_pengurangan_biaya_jabatan_JHT = $gaji_setahun - $biaya_jabatan - $iuran_JHT_karyawan;

                $status = \App\PTKP::where('status',$data3->status)->first();
                $ptkp = (int)$status->tarif_tahun;
                $pkp_th = $gaji_setelah_pengurangan_biaya_jabatan_JHT - $ptkp;
                
                $data_pkp = \App\PKPProgresif::all();
                foreach ($data_pkp as $key => $pkp) {
                    $sn[] = [$pkp->min_income,$pkp->max_income,$pkp->tarif_pajak];     
                }

                if($pkp_th > 0 && $pkp_th < $sn[0][1] ){
                    $tp = $sn[0][2];
                } else {
                    if($pkp_th > $sn[0][1]){
                        $tp = 'Progresif';
                    } else {
                        $tp = '0%';
                    }
                }

                if($data1->npwp == 'tidak punya NPWP' && $tp == '0%'){
                    $tp_real = '0%';
                } else{
                    if($data1->npwp == 'tidak punya NPWP' && $tp > '0%'){
                        $tp_real = '6%';
                    } else {
                        $tp_real = $tp;
                    }
                }
                
                if($pkp_th <= $sn[0][1]){
                    $pph_21 = $pkp_th * ((int)$tp_real/100);
                } else {
                    if($pkp_th > $sn[0][1] && $pkp_th <= $sn[1][1]){
                        $pph_21 = ($sn[0][1] * ((int)$sn[0][2]/100)) +  (($pkp_th - $sn[0][1]) * ((int)$sn[1][2]/100));
                    } else {
                        if($pkp_th > $sn[1][1] && $pkp_th <= $sn[2][1]){
                            $pph_21 = ($sn[0][1] * ((int)$sn[0][2]/100)) + (($sn[1][1] - $sn[0][1]) * ((int)$sn[1][2]/100)) + (($pkp_th - $sn[1][1]) * ((int)$sn[2][2]/100));
                        } else {
                            if($pkp_th > $sn[2][1]){
                                $pph_21 = ($sn[0][1] * ((int)$sn[0][2]/100)) + ($sn[1][1] * ((int)$sn[1][2]/100)) + ($sn[2][1] * ((int)$sn[2][2]/100)) + (($pkp_th - ($sn[0][1] + $sn[1][1] + $sn[2][1])) * ((int)$sn[3][2]/100));
                            }
                        }
                    }
                }
                
                $pph_21 = $pph_21/12;

                $potongan_BPJS = $bpjs_kesehatan_perusahaan + $bpjs_kesehatan_karyawan + $bpjs_ketenagakerjaan_JKK + $bpjs_ketenagakerjaan_JKM;

                $dibayar = $total_gaji - $data3->potongan - $pph_21 - $potongan_BPJS;

                $data_gaji_blade[] = ([
                    'periode_gaji' =>$data3->periode_gaji,
                    'nik' => $data1->nik,
                    'nama_karyawan' => $data1->nama_karyawan,
                    'divisi'        => $data1->divisi,
                    'id_sidik_jari' => $id_sidik_jari,
                    'pengalaman_tanggal' => $data3->pengalaman_tanggal,
                    'pengalaman_bulan' => $data3->pengalaman_bulan,
                    'gaji_pokok' => $data3->gaji_pokok,
                    'T_profesi'  => $T_profesi,
                    'T_jabatan' => $data3->T_jabatan,
                    'T_kinerja' => $data3->T_kinerja,
                    'T_khusus' => $data3->T_khusus,
                    'T_transport' => $T_transport,
                    'besaran_tunjangan_transport' => $data3->T_transport,
                    'jumlah_absen' => $jumlah_absen,
                    'jumlah_keterlambatan' => $jumlah_keterlambatan,
                    'hari_transportasi' => $hari_transportasi,
                    'basic_gaji_perhitungan_bpjs_kesehatan' => $data3->basic_gaji_perhitungan_bpjs_kesehatan,
                    'basic_gaji_perhitungan_bpjs_ketenagakerjaan' => $data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan,
                    'bpjs_kesehatan_perusahaan' => $bpjs_kesehatan_perusahaan,
                    'bpjs_kesehatan_karyawan'  => $bpjs_kesehatan_karyawan,
                    'bpjs_ketenagakerjaan_JKK' => $bpjs_ketenagakerjaan_JKK,
                    'bpjs_ketenagakerjaan_JKM' => $bpjs_ketenagakerjaan_JKM,
                    'bpjs_ketenagakerjaan_JHT' => $bpjs_ketenagakerjaan_JHT,
                    'insentif' => $data3->insentif,
                    'bonus' => $data3->bonus,
                    'disinsentif' => $disinsentif,
                    'total_gaji'  => $total_gaji,
                    'masa_kerja' => $data3->masa_kerja,
                    'gaji_setahun' => $gaji_setahun,
                    'iuran_JHT_karyawan' => $iuran_JHT_karyawan,
                    'biaya_jabatan' => $biaya_jabatan,
                    'gaji_setelah_pengurangan_biaya_jabatan_JHT' => $gaji_setelah_pengurangan_biaya_jabatan_JHT,
                    'status' => $data3->status,
                    'ptkp' => $ptkp,
                    'pkp_th' => $pkp_th,
                    'tp' =>$tp,
                    'npwp' => $data1->no_npwp,
                    'tp_real' => $tp_real,
                    'pph_21'  => $pph_21,
                    'potongan' => $data3->potongan,
                    'potongan_BPJS' => $potongan_BPJS,
                    'dibayar' => $dibayar,
                    'no_rek' => $data1->no_rekening,
                    'nama_bank' => $data1->nama_bank,
                    'keterangan_potongan' => $data3->keterangan_potongan,
                    'default_jam_transport' => '09:00',
                    'keterangan_tunjangan_transport' => $keterangan_tunjangan_transport,
                    'keterangan_disinsentif_insentif' => $keterangan_akumulasi,
                ]);
                
            }
        }
    }

        return view('Penggajian.laporan_gaji', [
            'data_presensi'   => Presensi::whereBetween('tanggal_presensi', [$this->tanggal_awal, $this->tanggal_akhir])->get(),
            'data_gaji_blade' => $data_gaji_blade,
        ]);
    }
}
