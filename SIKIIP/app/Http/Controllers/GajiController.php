<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data1 = \App\DataKaryawan::find($id);

        $data_gaji_blade = ([
            'periode_gaji' =>null,
            'nik' => $data1->nik,
            'nama_karyawan' => $data1->nama_karyawan,
            'divisi'        => $data1->divisi,
            'id_sidik_jari' => $data1->id_sidik_jari,
            'pengalaman_tanggal' => null,
            'pengalaman_bulan' => null,
            'gaji_pokok' => null,
            'total_potongan' => null,
            'T_profesi'  => null,
            'T_jabatan' => null,
            'T_kinerja' => null,
            'T_khusus' => null,
            'T_transport' => null,
            'jumlah_absen' => null,
            'hari_transportasi' => null,
            'jumlah_keterlambatan' => null,
            'besaran_tunjangan_transport' => null,
            'basic_gaji_perhitungan_bpjs_kesehatan' =>null,
            'basic_gaji_perhitungan_bpjs_ketenagakerjaan' => null,
            'bpjs_kesehatan_perusahaan' => null,
            'bpjs_kesehatan_karyawan'  => null,
            'bpjs_ketenagakerjaan_JKK' => null,
            'bpjs_ketenagakerjaan_JKM' => null,
            'bpjs_ketenagakerjaan_JHT' => null,
            'insentif' => null,
            'bonus' => null,
            'disinsentif' => null,
            'total_gaji'  => null,
            'masa_kerja' => null,
            'gaji_setahun' => null,
            'iuran_JHT_karyawan' => null,
            'biaya_jabatan' => null,
            'gaji_setelah_pengurangan_biaya_jabatan_JHT' => null,
            'status' => null,
            'ptkp' => null,
            'pkp_th' => null,
            'tp' =>null,
            'npwp' => null,
            'tp_real' => null,
            'pph_21'  => null,
            'potongan' => null,
            'potongan_BPJS' => null,
            'dibayar' => null,
            'no_rek' => null,
            'nama_bank' => null,
            'keterangan_potongan' => null,
            'keterangan_tunjangan_transport' => null,
            'default_jam_transport' => '09:00',
            'keterangan_disinsentif_insentif' => null,
        ]);
        
        $request = ([
            'bulan' => null,
            'tahun' => null,
        ]);

        return view('Gaji.gaji',  ['data_gaji_blade' => $data_gaji_blade, 'request' => $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tampilkan_gaji($id, Request $request)
    {
        $request = $request->all();
        $tahun = $request['tahun'];
        $bulan = $request['bulan'];
        $bulan_awal = $bulan-1;

        if($bulan_awal < 10){
            $bulan_awal = '0'.$bulan_awal;
        } else {
                //Do Nothing
        }

        $tanggal_awal = $tahun.'-'.($bulan_awal).'-21';
        $tanggal_akhir = $tahun.'-'.$bulan.'-20';
        $periode = $tanggal_awal. ' ' .$tanggal_akhir;

        $data1 = \App\DataKaryawan::find($id);
        $nik = $data1->nik;
        $id_sidik_jari = $data1->id_sidik_jari;

        $count_data1 = DB::table('gaji')->where([
            ['nik', '=', $nik],
            ['periode_gaji', '=', $periode],
        ])->count();

        $count_data2 = DB::table('presensibulan')->where([
            ['id_sidik_jari', '=', $id_sidik_jari],
            ['periode_presensi', '=', $periode],
        ])->count();

        if($count_data1 > 0 && $count_data2 > 0){
            $data3 = DB::table('gaji')->where([
                ['nik', '=', $nik],
                ['periode_gaji', '=', $periode],
            ])->first();

            $data2 = DB::table('presensibulan')->where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->first();

            $count_absen = 0;
            $jumlah_hari = 0;

            while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
                if(date('l', strtotime($tanggal_awal)) != 'Sunday' && date('l', strtotime($tanggal_awal)) != 'Saturday' ){
                    $count_absen = $count_absen + 1;
                }
                $jumlah_hari = $jumlah_hari + 1 ;
                $tanggal_awal = date ("Y-m-d", strtotime("+1 day", strtotime($tanggal_awal)));
            }

            $id_sidik_jari = $data2->id_sidik_jari;
            $jumlah_absen = $data2->jumlah_absen;
            $cuti_luar_tanggungan = $data2->cuti_luar_tanggungan;
            $jumlah_keterlambatan = $data2->jumlah_keterlambatan;
            $hari_transportasi  = $data2->transport_presensi + $data2->tambahan_presensi;
            $keterangan   = $data2->keterangan;
            
            $T_profesi = $data3->T_profesi;

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

        $total_potongan = $data3->potongan + $pph_21 + $potongan_BPJS;

        $dibayar = $total_gaji - $total_potongan;

        $data_gaji_blade = ([
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
            'npwp' => $data1->npwp,
            'tp_real' => $tp_real,
            'pph_21'  => $pph_21,
            'potongan' => $data3->potongan,
            'potongan_BPJS' => $potongan_BPJS,
            'total_potongan' => $total_potongan,
            'dibayar' => $dibayar,
            'no_rek' => $data1->no_rek,
            'nama_bank' => $data1->nama_bank,
            'keterangan_potongan' => $data3->keterangan_potongan,
            'default_jam_transport' => '09:00',
            'keterangan_tunjangan_transport' => $keterangan_tunjangan_transport,
            'keterangan_disinsentif_insentif' => $keterangan_akumulasi,
        ]);

        return view('Gaji.gaji',  ['data_gaji_blade' => $data_gaji_blade, 'request' => $request]);
    } else {

        $notification = array(
            'message' => 'Data Belum Tersedia',
            'alert-type' => 'warning'
        );

        return back()->with($notification);
    }
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function cetak_slip_gaji($id, $bulan, $tahun)
    {
        $bulan_awal = $bulan-1;

        if($bulan_awal < 10){
            $bulan_awal = '0'.$bulan_awal;
        } else {
                //Do Nothing
        }

        $tanggal_awal = $tahun.'-'.($bulan_awal).'-21';
        $tanggal_akhir = $tahun.'-'.$bulan.'-20';
        $periode = $tanggal_awal. ' ' .$tanggal_akhir;

        $data1 = \App\DataKaryawan::find($id);
        $nik = $data1->nik;
        $id_sidik_jari = $data1->id_sidik_jari;

        $count_data1 = DB::table('gaji')->where([
            ['nik', '=', $nik],
            ['periode_gaji', '=', $periode],
        ])->count();

        $count_data2 = DB::table('presensibulan')->where([
            ['id_sidik_jari', '=', $id_sidik_jari],
            ['periode_presensi', '=', $periode],
        ])->count();

        if($count_data1 > 0 && $count_data2 > 0){
            $data3 = DB::table('gaji')->where([
                ['nik', '=', $nik],
                ['periode_gaji', '=', $periode],
            ])->first();

            $data2 = DB::table('presensibulan')->where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->first();

            $count_absen = 0;
            $jumlah_hari = 0;

            while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
                if(date('l', strtotime($tanggal_awal)) != 'Sunday' && date('l', strtotime($tanggal_awal)) != 'Saturday' ){
                    $count_absen = $count_absen + 1;
                }
                $jumlah_hari = $jumlah_hari + 1 ;
                $tanggal_awal = date ("Y-m-d", strtotime("+1 day", strtotime($tanggal_awal)));
            }

            $id_sidik_jari = $data2->id_sidik_jari;
            $jumlah_absen = $data2->jumlah_absen;
            $cuti_luar_tanggungan = $data2->cuti_luar_tanggungan;
            $jumlah_keterlambatan = $data2->jumlah_keterlambatan;
            $hari_transportasi  = $data2->transport_presensi + $data2->tambahan_presensi;
            $keterangan   = $data2->keterangan;


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

        $total_potongan = $data3->potongan + $pph_21 + $potongan_BPJS;

        $dibayar = $total_gaji - $total_potongan;

        $data_gaji_blade = ([
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
            'npwp' => $data1->npwp,
            'tp_real' => $tp_real,
            'pph_21'  => $pph_21,
            'potongan' => $data3->potongan,
            'potongan_BPJS' => $potongan_BPJS,
            'total_potongan' => $total_potongan,
            'dibayar' => $dibayar,
            'no_rek' => $data1->no_rek,
            'nama_bank' => $data1->nama_bank,
            'keterangan_potongan' => $data3->keterangan_potongan,
            'default_jam_transport' => '09:00',
            'keterangan_tunjangan_transport' => $keterangan_tunjangan_transport,
            'keterangan_disinsentif_insentif' => $keterangan_akumulasi,
        ]);

        $kumpulanBulan ="JANUARI FEBRUARI MARET APRIL MEI JUNI JULI AUGUSTUS SEPTEMBER OCTOBER NOVEMBER DECEMBER";

        $arrayBulan=explode(" ", $kumpulanBulan);

        $bln = $arrayBulan[(int)$bulan_awal];

        $request = ([
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);

        $pdf = PDF::loadview('Gaji.slip_gaji',['data_gaji_blade'=>$data_gaji_blade, 'request' => $request]);
        return $pdf->stream('Slip Gaji '.$bln.'.pdf');
    } else {

        $notification = array(
            'message' => 'Data Belum Tersedia',
            'alert-type' => 'warning'
        );

        return back()->with($notification);
    }


}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function gagal_cetak_slip_gaji($id)
    {
        $notification = array(
            'message' => 'Silahkan Tampilkan Gaji Yang Ingin di Cetak!',
            'alert-type' => 'warning'
        );

        return back()->with($notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
