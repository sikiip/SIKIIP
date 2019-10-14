<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Excel;
use DateTime;
use App\Exports\LaporanPenggajian;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_karyawan  = \App\Datakaryawan::all();

        foreach ($data_karyawan as $data1) {

            $data_gaji_blade[] = ([
                'id_gaji' => null,
                'periode_gaji' =>null,
                'nik' => $data1->nik,
                'nama_karyawan' => $data1->nama_karyawan,
                'divisi'        => $data1->divisi,
                'id_sidik_jari' => $data1->id_sidik_jari,
                'pengalaman_tanggal' => null,
                'pengalaman_bulan' => null,
                'gaji_pokok' => null,
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
                'total_potongan' => null,
                'dibayar' => null,
                'no_rek' => null,
                'nama_bank' => null,
                'keterangan_potongan' => null,
                'keterangan_tunjangan_transport' => null,
                'default_jam_transport' => '09:00',
                'keterangan_disinsentif_insentif' => null,
            ]);
        }

        $request = NULL;

        return view('Penggajian.penggajian',  ['data_gaji_blade' => $data_gaji_blade, 'request' => $request, 'data_karyawan' => $data_karyawan]);
    }

    
    public function tambah_table_gaji(Request $request){
        $request = $request->all();

        $tanggal_awal  = $request['dari_tanggal'];
        $tanggal_akhir = $request['sampai_tanggal'];
        $periode       = $tanggal_awal. ' ' .$tanggal_akhir;

        $data_default_gaji = \App\DefaultGaji::all();
        $data_karyawan     = \App\DataKaryawan::all();

        $count_data = DB::table('presensibulan')->where('periode_presensi', '=', $periode)->count();

        if($count_data < 0){
            $notification = array(
                'message' => 'Presensi belum di kalkulasi, silahkan Kalkulasi terelbih dahulu!',
                'alert-type' => 'warning'
            );

            return redirect()->action('PenggajianController@index', $request)->with($notification);
        } else {                 

            foreach ($data_karyawan as $key => $data1) {
                foreach ($data_default_gaji as $key => $data3) {
                    if($data1->nik == $data3->nik){
                        $count_data = DB::table('gaji')->where([
                            ['nik', '=', $data1->nik],
                            ['periode_gaji', '=', $periode],
                        ])->count();
                        
                        if($count_data > 0){

                            $get_data = \App\Gaji::where([
                                ['nik', '=', $data1->nik],
                                ['periode_gaji', '=', $periode],
                            ])->first();
                            
                            $get_data->update([
                             'pengalaman_tanggal' => $data3->pengalaman_tanggal,
                             'pengalaman_bulan' => $data3->pengalaman_bulan,
                             'gaji_pokok' => $data3->gaji_pokok,
                             'T_profesi'  =>$data3->T_profesi,
                             'T_jabatan' => $data3->T_jabatan,
                             'T_kinerja' => $data3->T_kinerja,
                             'T_khusus' => $data3->T_khusus,
                             'T_transport' => $data3->T_transport,
                             'basic_gaji_perhitungan_bpjs_kesehatan' => $data3->basic_gaji_perhitungan_bpjs_kesehatan,
                             'basic_gaji_perhitungan_bpjs_ketenagakerjaan' => $data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan,
                             'insentif' => $data3->insentif,
                             'bonus' => $data3->bonus,
                             'masa_kerja' => $data3->masa_kerja,
                             'status' => $data3->status,
                         ]);
                        } else {

                            \App\Gaji::create([
                             'periode_gaji' =>$periode,
                             'nik' => $data1->nik,
                             'pengalaman_tanggal' => $data3->pengalaman_tanggal,
                             'pengalaman_bulan' => $data3->pengalaman_bulan,
                             'gaji_pokok' => $data3->gaji_pokok,
                             'T_profesi'  =>$data3->T_profesi,
                             'T_jabatan' => $data3->T_jabatan,
                             'T_kinerja' => $data3->T_kinerja,
                             'T_khusus' => $data3->T_khusus,
                             'T_transport' => $data3->T_transport,
                             'basic_gaji_perhitungan_bpjs_kesehatan' => $data3->basic_gaji_perhitungan_bpjs_kesehatan,
                             'basic_gaji_perhitungan_bpjs_ketenagakerjaan' => $data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan,
                             'insentif' => $data3->insentif,
                             'bonus' => $data3->bonus,
                             'masa_kerja' => $data3->masa_kerja,
                             'status' => $data3->status,
                         ]);
                        }
                    }
                }
            }

            $notification = array(
                'message' => 'Table Berhasil Ditambahkan',
                'alert-type' => 'success'
            );

            return redirect()->action('PenggajianController@index', $request)->with($notification);
        }
    }

    public function tampilkan_gaji(Request $request){
        $request = $request->all();

        $tanggal_awal  = $request['dari_tanggal'];
        $tanggal_akhir = $request['sampai_tanggal'];
        $periode       = $tanggal_awal. ' ' .$tanggal_akhir;

        $count_data = DB::table('gaji')->where('periode_gaji', '=', $periode)->count();

        if($count_data == 0){
            $notification = array(
                'message' => 'Data Gaji tidak tersedia, Silahkan Tambah Table Gaji!',
                'alert-type' => 'warning'
            );

            return back()->with($notification);
        } else {



            $default_gaji  = \App\PengaturanPenggajian::first();
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
                    if('nik'.$data1->nik == 'nik'.$data3->nik){
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

                        $T_transport = ($data3->T_transport * $hari_transportasi);

                        $bpjs_kesehatan_perusahaan = ($data3->basic_gaji_perhitungan_bpjs_kesehatan * ($default_gaji->bpjs_kesehatan_perusahaan / 100));
                        $bpjs_kesehatan_karyawan   = ($data3->basic_gaji_perhitungan_bpjs_kesehatan * ($default_gaji->bpjs_kesehatan_karyawan / 100));
                        $bpjs_ketenagakerjaan_JKK  = ($data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan * (($default_gaji->bpjs_ketenagakerjaan_JKK) / 100));
                        $bpjs_ketenagakerjaan_JKM  = ($data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan * (($default_gaji->bpjs_ketenagakerjaan_JKM) / 100));
                        $bpjs_ketenagakerjaan_JHT  = ($data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan * (($default_gaji->bpjs_ketenagakerjaan_JHT) / 100));

                        $keterangan_tunjangan_transport = $count_absen - $hari_transportasi;
                        if($keterangan_tunjangan_transport == 0 ){
                            $keterangan_tunjangan_transport = null;
                        }else{
                        // Do nothing;
                        }

                        if($keterangan == null){
                            $keterangan_akumulasi = null;
                            $disinsentif = ($jumlah_absen + $cuti_luar_tanggungan / $jumlah_hari) * ($data3->gaji_pokok + $data3->T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus);
                        } else {
                            $data_r = preg_split('/\+/', $keterangan);
                            $count   = count($data_r);
                            if($count > 1){
                             $keterangan_akumulasi = '(potongan '.$data_r[0].' tunjangan + '.$data_r[1].' Cuti/Disinsentif)';
                             $disinsentif = ((($jumlah_absen + (int)$cuti_luar_tanggungan + (int)$data_r[1]) / $jumlah_hari) * ($data3->gaji_pokok + $data3->T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus)) + ($data3->T_kinerja * (int)$data_r[0] / 100);
                           //dd((($jumlah_absen + (int)$cuti_luar_tanggungan + (int)$data_r[1]) / $jumlah_hari));
                         } else {
                             $keterangan_akumulasi = '(potongan '.$data_r[0].' tunjangan)';
                             $disinsentif = ((($jumlah_absen + (int)$cuti_luar_tanggungan) / $jumlah_hari) * ($data3->gaji_pokok + $data3->T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus)) + ($data3->T_kinerja * (int)$data_r[0] / 100);
                         }
                     }

                     $total_gaji = ($data3->gaji_pokok + $data3->T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus + $T_transport + $bpjs_kesehatan_perusahaan + $bpjs_ketenagakerjaan_JKK + $bpjs_ketenagakerjaan_JKM + $data3->insentif + $data3->bonus) - $disinsentif;
                     $gaji_setahun = ($total_gaji - $data3->bonus) * $data3->masa_kerja;
                     $iuran_JHT_karyawan = (($default_gaji->default_iuran / 100) * $data3->basic_gaji_perhitungan_bpjs_ketenagakerjaan) * $data3->masa_kerja;

                     $biaya_jabatan = $gaji_setahun * ($default_gaji->default_biaya_jabatan1 / 100);
                     if($biaya_jabatan > $default_gaji->default_biaya_jabatan2){
                        $biaya_jabatan = $default_gaji->default_biaya_jabatan2;
                    } else {
                        //do nothing tetap $gaji_setahun * (5 / 100);
                    }

                    $gaji_setelah_pengurangan_biaya_jabatan_JHT = $gaji_setahun - $biaya_jabatan - $iuran_JHT_karyawan;

                    $status = \App\PTKP::where('status',$data3->status)->first();
                    $ptkp = (int)$status['tarif_tahun'];
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

                    if($data1->no_npwp == 'tidak punya NPWP' && $tp == '0%'){
                        $tp_real = '0%';
                    } else{
                        if($data1->no_npwp == 'tidak punya NPWP' && $tp > '0%'){
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

                    $data_gaji_blade[] = ([
                        'id_gaji' => $data3->id_gaji,
                        'periode_gaji' =>$data3->periode_gaji,
                        'nik' => $data1->nik,
                        'nama_karyawan' => $data1->nama_karyawan,
                        'divisi'        => $data1->divisi,
                        'id_sidik_jari' => $id_sidik_jari,
                        'pengalaman_tanggal' => $data3->pengalaman_tanggal,
                        'pengalaman_bulan' => $data3->pengalaman_bulan,
                        'gaji_pokok' => $data3->gaji_pokok,
                        'T_profesi'  => $data3->T_profesi,
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
                        'total_potongan' => $total_potongan,
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

        return view('Penggajian.penggajian',  ['data_gaji_blade' => $data_gaji_blade, 'request' => $request, 'data_karyawan' => $data_karyawan]);
    }
}

public function update_gaji(Request $request , $id_gaji){
    $request = $request->all();

    $data_presensi = \App\Gaji::find($id_gaji);

    $data = $data_presensi->update($request);

    if($data == true){

        $notification = array(
            'message' => 'Data Berhasil di Ubah!',
            'alert-type' => 'success'
        );

        return redirect()->action('PenggajianController@tampilkan_gaji', $request)->with($notification);

    } else {

        $notification = array(
            'message' => 'Data Gagal di Ubah!',
            'alert-type' => 'error'
        );

        return redirect()->action('PenggajianController@tampilkan_gaji', $request)->with($notification);
    }
}


public function unduh_laporan_gaji($periode){
    if($periode == " "){
        $notification = array(
            'message' => 'Silahkan Tampilkan Data yang Ingin Anda Unduh!',
            'alert-type' => 'warning'
        );

        return back()->with($notification);
    } else {
       return Excel::download(new LaporanPenggajian($periode), 'Laporan Gaji '.$periode.'.xlsx');
   }
}

public function standar_penggajian(){

    $data_karyawan    = \App\Datakaryawan::all();
    $default_gaji     = \App\DefaultGaji::all();

    
    return view('penggajian.standar_penggajian' , ['data_karyawan' => $data_karyawan, 'default_gaji' => $default_gaji]);
}

public function delete_standar_penggajian ($id_default_gaji) {

    $default_gaji = \App\DefaultGaji::find($id_default_gaji);
    $default_gaji->delete($default_gaji);


    $notification = array(
        'message' => 'Data Berhasil Dihapus',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);

}

public function tambah_standar_penggajian (Request $request)
{

    \App\DefaultGaji::create([
        'nik' => $request->nik,
        'pengalaman_tanggal' => $request->pengalaman_tanggal,
        'pengalaman_bulan' => $request->pengalaman_bulan,
        'gaji_pokok'=> $request->gaji_pokok,
        'T_jabatan' => $request->T_jabatan,
        'T_kinerja' => $request->T_kinerja,
        'T_khusus' => $request->T_khusus,
        'T_transport' => $request->T_transport,
        'basic_gaji_perhitungan_bpjs_kesehatan' => $request->basic_gaji_perhitungan_bpjs_kesehatan,
        'basic_gaji_perhitungan_bpjs_ketenagakerjaan' => $request->basic_gaji_perhitungan_bpjs_ketenagakerjaan,
        'insentif' => $request->insentif,
        'bonus'=> $request->bonus,
        'masa_kerja' => $request->masa_kerja,
        'status' => $request->status,
    ]);

    $notification = array(
        'message' => 'Data Berhasil Dihapus',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);



}

public function update_standar_penggajian(Request $request, $id_default_gaji){
    $default_gaji = \App\DefaultGaji::find($id_default_gaji);
    $default_gaji->update($request->all());

    $notification = array(
        'message' => 'Data Berhasil Diupdate',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);

}

public function pengaturan_penggajian(){
    $ptkp= \App\PTKP::all();
    $pkp_progresif= \App\PKPProgresif::all();

    $pengaturan_penggajian= \App\PengaturanPenggajian::find(1);
    return view('Penggajian.pengaturan_penggajian' , ['pengaturan_penggajian' => $pengaturan_penggajian, 'ptkp' => $ptkp, 'pkp_progresif' => $pkp_progresif]);
}

public function update_pengaturan_penggajian(Request $request, $id_pengaturan_penggajian){
    $pengaturan_penggajian = \App\PengaturanPenggajian::find($id_pengaturan_penggajian);
    $pengaturan_penggajian->update($request->all());

    $notification = array(
        'message' => 'Data Berhasil Diupdate',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);

}

public function tambah_ptkp (Request $request)
{

    \App\PTKP::create([
        'status' => $request->status,
        'tarif_bulan' => $request->tarif_bulan,
        'tarif_tahun'=> $request->tarif_tahun,

    ]);

    $notification = array(
        'message' => 'Data Berhasil Diinput',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);


}

public function update_ptkp(Request $request, $id){

    $ptkp = \App\PTKP::find($id);
    $ptkp->update($request->all());

    $notification = array(
        'message' => 'Data Berhasil Diupdate',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);

}

public function delete_ptkp($id) {

    $ptkp = \App\PTKP::find($id);
    $ptkp->delete($ptkp);


    $notification = array(
        'message' => 'Data Berhasil Dihapus',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);

}

public function tambah_pkp (Request $request)
{

    \App\PKPProgresif::create([
        'min_income' => $request->min_income,
        'max_income' => $request->max_income,
        'tarif_pajak'=> $request->tarif_pajak,

    ]);

    $notification = array(
        'message' => 'Data Berhasil Diinput',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);


}

public function update_pkp(Request $request, $id){
    $pkp_progresif = \App\PKPProgresif::find($id);
    $pkp_progresif->update($request->all());

    $notification = array(
        'message' => 'Data Berhasil Diupdate',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);

}
public function delete_pkp($id) {

    $pkp_progresif = \App\PKPProgresif::find($id);
    $pkp_progresif->delete($pkp_progresif);


    $notification = array(
        'message' => 'Data Berhasil Dihapus',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);

}

public function cetak_slip_gaji_karyawan($nik, $dari_tanggal, $sampai_tanggal)
{
    if($dari_tanggal == null && $sampai_tanggal == null) {
        $notification = array(
            'message' => 'Silahkan Tampilkan Data Terlebih Dahulu',
            'alert-type' => 'warning'
        );

        return back()->with($notification);
    } else {
        //do nothing
    }

    $tanggal_awal  = $dari_tanggal;
    $tanggal_akhir = $sampai_tanggal; 
    $periode = $tanggal_awal. ' ' .$tanggal_akhir;

    $data1 = \App\DataKaryawan::where('nik',$nik)->first();
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

    if($count_data1 > 0){
        $data3 = DB::table('gaji')->where([
            ['nik', '=', $nik],
            ['periode_gaji', '=', $periode],
        ])->first();

        if($id_sidik_jari == 0 ){
            $count_data2 = 1;
        } else {
            $count_data2 = DB::table('presensibulan')->where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();

            if($count_data2 > 0){

            } else {

            }
        }


        $count_absen = 0;
        $jumlah_hari = 0;

        while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            if(date('l', strtotime($tanggal_awal)) != 'Sunday' && date('l', strtotime($tanggal_awal)) != 'Saturday' ){
                $count_absen = $count_absen + 1;
            }
            $jumlah_hari = $jumlah_hari + 1 ;
            $tanggal_awal = date ("Y-m-d", strtotime("+1 day", strtotime($tanggal_awal)));
        }

        if($id_sidik_jari == 0 ){
            $jumlah_absen = null;
            $cuti_luar_tanggungan = null;
            $jumlah_keterlambatan = null;
            $hari_transportasi  = $count_absen;
            $keterangan   = null;
        } else {
            $data2 = DB::table('presensibulan')->where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->first();

            $jumlah_absen = $data2->jumlah_absen;
            $cuti_luar_tanggungan = $data2->cuti_luar_tanggungan;
            $jumlah_keterlambatan = $data2->jumlah_keterlambatan;
            $hari_transportasi  = $data2->transport_presensi + $data2->tambahan_presensi;
            $keterangan   = $data2->keterangan; 
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
            $disinsentif = ($jumlah_absen + $cuti_luar_tanggungan / $jumlah_hari) * ($data3->gaji_pokok + $data3->T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus);
        } else  {
            $data_r = preg_split('/\+/', $keterangan);
            $count   = count($data_r);
            if($count > 1){
             $keterangan_akumulasi = '(potongan '.$data_r[0].' tunjangan + '.$data_r[1].' Cuti/Disinsentif)';
             $disinsentif = (($jumlah_absen + $cuti_luar_tanggungan / $jumlah_hari) * ($data3->gaji_pokok + $data3->T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus)) + ($data3->T_kinerja * (int)$data_r[0] / 100);
         } else {
             $keterangan_akumulasi = '(potongan '.$data_r[0].' tunjangan)';
             $disinsentif = (($jumlah_absen + $cuti_luar_tanggungan / $jumlah_hari) * ($data3->gaji_pokok + $data3->T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus)) + ($data3->T_kinerja * (int)$data_r[0] / 100);
         }
     }

     $total_gaji = ($data3->gaji_pokok + $data3->T_profesi + $data3->T_jabatan + $data3->T_kinerja + $data3->T_khusus + $T_transport + $bpjs_kesehatan_perusahaan + $bpjs_ketenagakerjaan_JKK + $bpjs_ketenagakerjaan_JKM + $data3->insentif + $data3->bonus) - $disinsentif;
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
        'T_profesi'  => $data3->T_profesi,
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

    $bulan = DateTime::createFromFormat('Y-m-d',$tanggal_akhir)->format('m');
    $tahun = DateTime::createFromFormat('Y-m-d',$tanggal_akhir)->format('Y');

    $bln = $arrayBulan[(int)$bulan];

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

public function buat_slip_gaji(Request $request){

    $bruto          = $request->gaji_pokok + $request->T_profesi + $request->T_jabatan + $request->T_kinerja + $request->T_khusus + $request->T_transport;
    $total_potongan = $request->disinsentif + $request->lain_lain;
    $netto          = $bruto - $total_potongan;

    $data   = \App\DataKaryawan::where('nama_karyawan', $request->nama_karyawan)->first();
    $divisi = $data->divisi;

    $kumpulanBulan =" JANUARI FEBRUARI MARET APRIL MEI JUNI JULI AUGUSTUS SEPTEMBER OCTOBER NOVEMBER DECEMBER";

    $arrayBulan=explode(" ", $kumpulanBulan);

    $bln = $arrayBulan[(int)$request->bulan];

    $data_gaji_blade = ([
        'nama_karyawan' => $request->nama_karyawan,
        'divisi'        => $divisi,
        'gaji_pokok' => $request->gaji_pokok,
        'T_profesi'  => $request->T_profesi,
        'T_jabatan'  => $request->T_jabatan,
        'T_kinerja'  => $request->T_kinerja,
        'T_khusus'   => $request->T_khusus,
        'T_transport'=> $request->T_transport,
        'bruto'      => $bruto,
        'disinsentif'=> $request->disinsentif,
        'lain_lain'  => $request->lain_lain,
        'total_potongan' => $total_potongan,
        'netto'      => $netto,
        'bln'        => $bln,
        'tahun'      => $request->tahun,
    ]);

    $pdf = PDF::loadview('Penggajian.buat_slip_gaji',['data_gaji_blade'=>$data_gaji_blade,]);
    return $pdf->stream('Slip Gaji '.$bln.'.pdf');

}

}
