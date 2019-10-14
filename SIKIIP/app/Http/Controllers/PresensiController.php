<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use DateTime;
use Illuminate\Http\Request;
use App\Exports\PresensiExport;
use App\Exports\PresensiRekapExport;
use App\Exports\DefaultPresensiExport;



class PresensiController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $date = date('Y-m-d');
        // dd($date);
        return view('Presensi.presensi',  ['data_presensi_blade' => null , 'request' => null]);
    }

    public function presensi_calendar($id_sidik_jari)
    {

        $data_karyawan = \App\Datakaryawan::where('id_sidik_jari',$id_sidik_jari)->first();
        $data_presensi  = \App\Presensi::where('id_sidik_jari',$id_sidik_jari)->get();

        return view('Presensi.presensi_calendar',  ['data_presensi' => $data_presensi , 'data_karyawan' => $data_karyawan]);
    }

    public function tambah_presensi_Calendar_absen(Request $request)
    {   
        $request = $request->all();

        $count_data = DB::table('presensi')->where([
            ['id_sidik_jari', '=', $request['id_sidik_jari']],
            ['tanggal_presensi', '=', $request['tanggal_presensi']],
        ])->count();

        if($count_data > 0){
            $notification = array(
                'message' => 'Data Sudah Tersedia, Tidak bisa menambah lagi',
                'alert-type' => 'error'
            );

            return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);

        } else {

            \App\Presensi::create([
                'id_sidik_jari'    => $request['id_sidik_jari'],
                'tanggal_presensi' => $request['tanggal_presensi'],
                'keterangan_presensi'=> $request['tipe_izin'].' : '.$request['alasan_izin'],
            ]);

            $hari  = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('d');
            $bulan = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('m');
            $tahun = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('Y');

            if ( $hari > 20 ){
                $bln = $bulan+1;
                if($bln<10){
                    $bln = '0'.$bln;
                } else {

                }
                $periode = $tahun.'-'.$bln.'-21 '.$tahun.'-'.$bulan.'-20';
            } elseif ( $hari < 21){
                $bln = $bulan-1;
                if($bln<10){
                    $bln = '0'.$bln;
                } else {
                    $bln = $bln;
                }
                $periode = $tahun.'-'.$bln.'-21 '.$tahun.'-'.$bulan.'-20';
            } else {
                //do nothing
            }

            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $request['id_sidik_jari']],
                ['periode_presensi', '=', $periode],
            ])->count();
            if($count_data > 0 ){

                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $request['id_sidik_jari']],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $new_jumlah_absen = $get_data['jumlah_absen'] - 1;

                $get_data->update([
                    'jumlah_absen' => $new_jumlah_absen,
                ]);
            } else {

            }

            $notification = array(
                'message' => 'Data Berhasil di Tambah!',
                'alert-type' => 'success'
            );

            return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);
        }

    }

    public function tambah_presensi_Calendar_presensi(Request $request)
    { 


        $request = $request->all();
        $data = \App\PengaturanPresensi::find(1);

        if($request['mode'] == "Normal"){
            $default_clock_in = $data->clock_in_normal;
            $default_clock_out = $data->clock_out_normal;
            $default_transport = $data->transport_normal;
        } else if ($request['mode'] == "Ramadhan"){
            $default_clock_in = $data->clock_in_ramadhan;
            $default_clock_out = $data->clock_out_ramadhan;
            $default_transport = $data->transport_ramadhan;
        }

        $lupa_clock_in_out = $data->lupa_clock_in_out;

        $tanggal_presensi = $request['tanggal_presensi'];
        $jam_clock_in = $request['jam_clock_in'];
        $jam_clock_out = $request['jam_clock_out'];
        $info_clock_in = $request['info_clock_in'];
        $info_clock_out = $request['info_clock_out'];
        $mode          = $request['mode'];
        $id_sidik_jari = $request['id_sidik_jari'];

        $count_data = DB::table('presensi')->where([
            ['id_sidik_jari', '=', $id_sidik_jari],
            ['tanggal_presensi', '=', $tanggal_presensi,
        ]])->count();

        if($count_data > 0){

            $notification = array(
                'message' => 'Data Sudah Tersedia, Tidak bisa menambah lagi',
                'alert-type' => 'error'
            );

            return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);

        } else {

            //Input late
            if ($jam_clock_in == '00:00:00') {
                $late = $lupa_clock_in_out;
            } else {
                if ($jam_clock_in > $default_clock_in) {
                    $total = strtotime($jam_clock_in) - strtotime($default_clock_in);
                    $hours = floor($total / 60 / 60);
                    $minutes = floor(($total - ($hours * 60 * 60)) / 60);
                    if($minutes<10){
                        $late = $hours . '.0' . $minutes;
                    } else {
                        $late = $hours . '.' . $minutes;
                    }
                } else {
                    $late = '0.00';
                }
            }

            //Input Early
            if ($jam_clock_out == '00:00:00') {
                $early = $lupa_clock_in_out;
            } else {
                if ($jam_clock_out < $default_clock_out) {
                    $total = strtotime($default_clock_out) - strtotime($jam_clock_out);
                    $hours = floor($total / 60 / 60);
                    $minutes = floor(($total - ($hours * 60 * 60)) / 60);
                    if($minutes<10){
                        $early = $hours . '.0' . $minutes;
                    } else {
                        $early = $hours . '.' . $minutes;
                    }                               
                } else {
                    $early = '0.00';
                }
            }

            //Input Transport
            if (is_null($jam_clock_in)) {
                $transport = null;
            } elseif($jam_clock_in == '00:00:00'){
                $transport = null;
            } else {
                if ($jam_clock_in < $default_transport) {
                    $transport = '1';
                } else {
                    $transport = null;
                }
            }

            \App\Presensi::create([
                'id_sidik_jari'    => $id_sidik_jari,
                'tanggal_presensi' => $tanggal_presensi,
                'jam_clock_in'     => $jam_clock_in,
                'jam_clock_out'    => $jam_clock_out,
                'late_presensi'    => $late,
                'early_presensi'   => $early,
                'transport_presensi' => $transport,
            ]);

            $hari  = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('d');
            $bulan = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('m');
            $tahun = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('Y');

            if ( $hari > 20 ){
                $bln = $bulan+1;
                if($bln<10){
                    $bln = '0'.$bln;
                } else {

                }
                $periode = $tahun.'-'.$bln.'-21 '.$tahun.'-'.$bulan.'-20';
            } elseif ( $hari < 21){
                $bln = $bulan-1;
                if($bln<10){
                    $bln = '0'.$bln;
                } else {
                    $bln = $bln;
                }
                $periode = $tahun.'-'.$bln.'-21 '.$tahun.'-'.$bulan.'-20';
            } else {
                //do nothing
            }

            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $request['id_sidik_jari']],
                ['periode_presensi', '=', $periode],
            ])->count();
            if($count_data > 0 ){

                $count_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $request['id_sidik_jari']],
                    ['periode_presensi', '=', $periode],
                ])->count();
                
                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $request['id_sidik_jari']],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_early_presensi = $get_data['total_early_presensi'];
                $total_late_presensi  = $get_data['total_late_presensi'];

                $data_r1 = preg_split('/\./', $total_early_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $early);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r3 = preg_split('/\./', $total_late_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];
                $data_r4 = preg_split('/\./', $late);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                

                $total_early = $total1 + $total2;
                $hours = floor($total_early / 60 );
                $minutes = floor(($total_early - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_early = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_early = $hours . '.' . $minutes;
                }   

                $total_late  = $total3 + $total4;
                $hours = floor($total_late / 60 );
                $minutes = floor(($total_late - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_late = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_late = $hours . '.' . $minutes;
                }    


                $jumlah = $total_late + $total_early;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 

                if($jumlah_keterlambatan < 8.00){
                    $keterangan = null;
                }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                    $keterangan = '25%';
                } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                    $keterangan = '50%';
                } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                    $keterangan = '75%';
                } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                    $keterangan = '100%';
                } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                    $keterangan = '100% + 1H';
                } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                    $keterangan = '100% + 2H';
                } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                    $keterangan = '100% + 3H';
                } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                    $keterangan = '100% + 4H';
                } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                    $keterangan = '100% + 5H';
                } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                    $keterangan = '100% + 6H';
                } else {
                    $keterangan = null;
                }

                $new_jumlah_absen = $get_data['jumlah_absen'] - 1;
                
                $get_data->update([
                    'jumlah_absen' => $new_jumlah_absen,
                    'total_late_presensi' => $new_total_presensi_late,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);



                $notification = array(
                    'message' => 'Data Berhasil di Tambah!',
                    'alert-type' => 'success'
                );

                return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);


            } else {

                $notification = array(
                    'message' => 'Presensi berhasil di tambah, Data Belum Di Kalkulasi!',
                    'alert-type' => 'error'
                );

                return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);
            }
        }

    }

    public function update_presensi_Calendar_presensi(Request $request)
    {
        $request = $request->all();

        $data_presensi = \App\Presensi::find($request['id_presensi']);

        $old_late_presensi = $data_presensi->late_presensi;
        $old_early_presensi = $data_presensi->early_presensi;
        $old_jam_clock_in = $data_presensi->jam_clock_in;
        $old_jam_clock_out = $data_presensi->jam_clock_out;
        $new_late_presensi = $request['late_presensi'];
        $new_early_presensi = $request['early_presensi'];
        $new_jam_clock_in   = $request['jam_clock_in'];
        $new_jam_clock_out  = $request['jam_clock_out'];
        $id_sidik_jari      = $request['id_sidik_jari'];

        $data = \App\PengaturanPresensi::find(1);
        
        if($request['mode'] == "Normal"){
            $default_clock_in = $data->clock_in_normal;
            $default_clock_out = $data->clock_out_normal;
            $default_transport = $data->transport_normal;
        } else if ($request['mode'] == "Ramadhan"){
            $default_clock_in = $data->clock_in_ramadhan;
            $default_clock_out = $data->clock_out_ramadhan;
            $default_transport = $data->transport_ramadhan;
        }

        $lupa_clock_in_out = $data->lupa_clock_in_out;

        $hari  = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('d');
        $bulan = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('m');
        $tahun = DateTime::createFromFormat('Y-m-d',$request['tanggal_presensi'])->format('Y');

        if ( $hari > 20 ){
            $bln = $bulan+1;
            if($bln<10){
                $bln = '0'.$bln;
            } else {

            }
            $periode = $tahun.'-'.$bln.'-21 '.$tahun.'-'.$bulan.'-20';
        } elseif ( $hari < 21){
            $bln = $bulan-1;
            if($bln<10){
                $bln = '0'.$bln;
            } else {
                $bln = $bln;
            }
            $periode = $tahun.'-'.$bln.'-21 '.$tahun.'-'.$bulan.'-20';
        } else {
                //do nothing
        }

        $data = $data_presensi->update($request);

            //Update Late 
        if($old_late_presensi == $new_late_presensi ){
                //do nothing
        } elseif($old_late_presensi > $new_late_presensi){

            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();

            if($count_data > 0){
                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_late_presensi  = $get_data['total_late_presensi'];
                $total_early_presensi = $get_data['total_early_presensi'];

                $data_r1 = preg_split('/\./', $total_late_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $old_late_presensi);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r4 = preg_split('/\./', $new_late_presensi);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                $data_r3 = preg_split('/\./', $total_early_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];

                $selisih = $total2 - $total4;
                $total_late = $total1 - $selisih;
                $hours = floor($total_late / 60 );
                $minutes = floor(($total_late - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_late = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_late = $hours . '.' . $minutes;
                }                

                $jumlah = $total3 + $total_late;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 

                if($jumlah_keterlambatan < 8.00){
                    $keterangan = null;
                }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                    $keterangan = '25%';
                } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                    $keterangan = '50%';
                } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                    $keterangan = '75%';
                } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                    $keterangan = '100%';
                } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                    $keterangan = '100% + 1H';
                } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                    $keterangan = '100% + 2H';
                } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                    $keterangan = '100% + 3H';
                } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                    $keterangan = '100% + 4H';
                } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                    $keterangan = '100% + 5H';
                } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                    $keterangan = '100% + 6H';
                } else {
                    $keterangan = null;
                }


                $get_data->update([
                    'total_late_presensi' => $new_total_presensi_late,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);
            } else {

            }

        } elseif ($old_late_presensi < $new_late_presensi) {
            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();

            if($count_data>0){

                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_late_presensi  = $get_data['total_late_presensi'];
                $total_early_presensi = $get_data['total_early_presensi'];

                $data_r1 = preg_split('/\./', $total_late_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $old_late_presensi);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r4 = preg_split('/\./', $new_late_presensi);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                $data_r3 = preg_split('/\./', $total_early_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];

                $selisih = $total4 - $total2;
                $total_late = $total1 + $selisih;
                $hours = floor($total_late / 60 );
                $minutes = floor(($total_late - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_late = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_late = $hours . '.' . $minutes;
                }                

                $jumlah = $total3 + $total_late;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 

                if($id_sidik_jari == 79 || $id_sidik_jari == 97 ){
                    $keterangan = null;
                } else {

                    if($jumlah_keterlambatan < 8.00){
                        $keterangan = null;
                    }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                        $keterangan = '25%';
                    } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                        $keterangan = '50%';
                    } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                        $keterangan = '75%';
                    } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                        $keterangan = '100%';
                    } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                        $keterangan = '100% + 1H';
                    } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                        $keterangan = '100% + 2H';
                    } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                        $keterangan = '100% + 3H';
                    } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                        $keterangan = '100% + 4H';
                    } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                        $keterangan = '100% + 5H';
                    } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                        $keterangan = '100% + 6H';
                    } else {
                        $keterangan = null;
                    }

                }


                $get_data->update([
                    'total_late_presensi' => $new_total_presensi_late,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);
            }
        }

            //Update Early
        if($old_early_presensi == $new_early_presensi ){
                //do nothing
        } elseif ($old_early_presensi > $new_early_presensi) {
            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();

            if($count_data>0){
                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_early_presensi = $get_data['total_early_presensi'];
                $total_late_presensi  = $get_data['total_late_presensi'];

                $data_r1 = preg_split('/\./', $total_early_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $old_early_presensi);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r4 = preg_split('/\./', $new_early_presensi);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                $data_r3 = preg_split('/\./', $total_late_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];

                $selisih = $total2 - $total4;
                $total_early = $total1 - $selisih;
                $hours = floor($total_early / 60 );
                $minutes = floor(($total_early - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_early = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_early = $hours . '.' . $minutes;
                }                

                $jumlah = $total3 + $total_early;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 

                if($id_sidik_jari == 79 || $id_sidik_jari == 97 ){
                    $keterangan = null;
                } else {

                    if($jumlah_keterlambatan < 8.00){
                        $keterangan = null;
                    }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                        $keterangan = '25%';
                    } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                        $keterangan = '50%';
                    } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                        $keterangan = '75%';
                    } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                        $keterangan = '100%';
                    } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                        $keterangan = '100% + 1H';
                    } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                        $keterangan = '100% + 2H';
                    } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                        $keterangan = '100% + 3H';
                    } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                        $keterangan = '100% + 4H';
                    } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                        $keterangan = '100% + 5H';
                    } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                        $keterangan = '100% + 6H';
                    } else {
                        $keterangan = null;
                    }

                }


                $get_data->update([
                    'total_early_presensi'=> $new_total_presensi_early,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);
            }else {

            }
        } elseif($old_early_presensi < $new_early_presensi){
            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();

            if($count_data>0){

                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_early_presensi = $get_data['total_early_presensi'];
                $total_late_presensi  = $get_data['total_late_presensi'];

                $data_r1 = preg_split('/\./', $total_early_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $old_early_presensi);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r4 = preg_split('/\./', $new_early_presensi);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                $data_r3 = preg_split('/\./', $total_late_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];

                $selisih = $total4 - $total2;
                $total_early = $total1 + $selisih;
                $hours = floor($total_early / 60 );
                $minutes = floor(($total_early - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_early = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_early = $hours . '.' . $minutes;
                }                

                $jumlah = $total3 + $total_early;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 

                if($jumlah_keterlambatan < 8.00){
                    $keterangan = null;
                }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                    $keterangan = '25%';
                } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                    $keterangan = '50%';
                } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                    $keterangan = '75%';
                } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                    $keterangan = '100%';
                } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                    $keterangan = '100% + 1H';
                } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                    $keterangan = '100% + 2H';
                } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                    $keterangan = '100% + 3H';
                } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                    $keterangan = '100% + 4H';
                } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                    $keterangan = '100% + 5H';
                } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                    $keterangan = '100% + 6H';
                } else {
                    $keterangan = null;
                }


                $get_data->update([
                    'total_early_presensi'=> $new_total_presensi_early,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);
            }
        }

            //Update Jam Clock In
        if($old_jam_clock_in == $new_jam_clock_in){
                //do nothing
        } else {

                //Input late
            if ($new_jam_clock_in == '00:00:00') {
                $late = $lupa_clock_in_out;
            } else {
                if ($new_jam_clock_in > $default_clock_in) {
                    $total = strtotime($new_jam_clock_in) - strtotime($default_clock_in);
                    $hours = floor($total / 60 / 60);
                    $minutes = floor(($total - ($hours * 60 * 60)) / 60);
                    if($minutes<10){
                     $late = $hours . '.0' . $minutes;
                 } else {
                     $late = $hours . '.' . $minutes;
                 }
             } else {
                $late = '0.00';
            }
        }

                //Input Transport
        if (is_null($new_jam_clock_in)) {
            $transport = null;
        } elseif($new_jam_clock_in == '00:00:00'){
            $transport = null;
        } else {
            if ($new_jam_clock_in < $default_transport) {
                $transport = '1';
            } else {
                $transport = null;
            }
        }

        $data_presensi->update([
            'late_presensi'     => $late,
            'transport_presensi'=> $transport,
        ]);

                //Update late presensi
        if($old_late_presensi == $late ){
                    //do nothing
        } elseif($old_late_presensi > $late){
            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();
            if($count_data > 0){
                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_late_presensi  = $get_data['total_late_presensi'];
                $total_early_presensi = $get_data['total_early_presensi'];

                $data_r1 = preg_split('/\./', $total_late_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $old_late_presensi);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r4 = preg_split('/\./', $late);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                $data_r3 = preg_split('/\./', $total_early_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];

                $selisih = $total2 - $total4;
                $total_late = $total1 - $selisih;
                $hours = floor($total_late / 60 );
                $minutes = floor(($total_late - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_late = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_late = $hours . '.' . $minutes;
                }                

                $jumlah = $total3 + $total_late;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 

                if($jumlah_keterlambatan < 8.00){
                    $keterangan = null;
                }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                    $keterangan = '25%';
                } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                    $keterangan = '50%';
                } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                    $keterangan = '75%';
                } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                    $keterangan = '100%';
                } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                    $keterangan = '100% + 1H';
                } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                    $keterangan = '100% + 2H';
                } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                    $keterangan = '100% + 3H';
                } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                    $keterangan = '100% + 4H';
                } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                    $keterangan = '100% + 5H';
                } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                    $keterangan = '100% + 6H';
                } else {
                    $keterangan = null;
                }


                $get_data->update([
                    'total_late_presensi' => $new_total_presensi_late,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);
            } else {

            }
        } elseif ($old_late_presensi < $late) {
            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();
            if($count_data > 0){

                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_late_presensi  = $get_data['total_late_presensi'];
                $total_early_presensi = $get_data['total_early_presensi'];

                $data_r1 = preg_split('/\./', $total_late_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $old_late_presensi);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r4 = preg_split('/\./', $late);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                $data_r3 = preg_split('/\./', $total_early_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];

                $selisih = $total4 - $total2;
                $total_late = $total1 + $selisih;
                $hours = floor($total_late / 60 );
                $minutes = floor(($total_late - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_late = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_late = $hours . '.' . $minutes;
                }                

                $jumlah = $total3 + $total_late;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 
                if($jumlah_keterlambatan < 8.00){
                    $keterangan = null;
                }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                    $keterangan = '25%';
                } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                    $keterangan = '50%';
                } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                    $keterangan = '75%';
                } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                    $keterangan = '100%';
                } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                    $keterangan = '100% + 1H';
                } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                    $keterangan = '100% + 2H';
                } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                    $keterangan = '100% + 3H';
                } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                    $keterangan = '100% + 4H';
                } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                    $keterangan = '100% + 5H';
                } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                    $keterangan = '100% + 6H';
                } else {
                    $keterangan = null;
                }


                $get_data->update([
                    'total_late_presensi' => $new_total_presensi_late,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);
            }
        }
    }

            //Update Jam Clock Out
    if($old_jam_clock_out == $new_jam_clock_out){
                //do nothing
    } else {
                //Input Early
        if ($new_jam_clock_out == '00:00:00') {
            $early = $lupa_clock_in_out;
        } else {
            if ($new_jam_clock_out < $default_clock_out) {
                $total = strtotime($default_clock_out) - strtotime($new_jam_clock_out);
                $hours = floor($total / 60 / 60);
                $minutes = floor(($total - ($hours * 60 * 60)) / 60);
                if($minutes<10){
                    $early = $hours . '.0' . $minutes;
                } else {
                    $early = $hours . '.' . $minutes;
                }                              
            } else {
                $early = '0.00';
            }
        }



        $data_presensi->update([
            'early_presensi' => $early,
        ]);

                //Update Early
        if($old_early_presensi == $early ){
                    //do nothing
        } elseif ($old_early_presensi > $early) {
            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();
            if($count_data > 0){
                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_early_presensi = $get_data['total_early_presensi'];
                $total_late_presensi  = $get_data['total_late_presensi'];

                $data_r1 = preg_split('/\./', $total_early_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $old_early_presensi);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r4 = preg_split('/\./', $early);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                $data_r3 = preg_split('/\./', $total_late_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];

                $selisih = $total2 - $total4;
                $total_early = $total1 - $selisih;
                $hours = floor($total_early / 60 );
                $minutes = floor(($total_early - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_early = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_early = $hours . '.' . $minutes;
                }                

                $jumlah = $total3 + $total_early;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 

                if($jumlah_keterlambatan < 8.00){
                    $keterangan = null;
                }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                    $keterangan = '25%';
                } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                    $keterangan = '50%';
                } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                    $keterangan = '75%';
                } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                    $keterangan = '100%';
                } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                    $keterangan = '100% + 1H';
                } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                    $keterangan = '100% + 2H';
                } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                    $keterangan = '100% + 3H';
                } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                    $keterangan = '100% + 4H';
                } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                    $keterangan = '100% + 5H';
                } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                    $keterangan = '100% + 6H';
                } else {
                    $keterangan = null;
                }


                $get_data->update([
                    'total_early_presensi'=> $new_total_presensi_early,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);
            }
        } elseif($old_early_presensi < $early){
            $count_data = \App\PresensiBulan::where([
                ['id_sidik_jari', '=', $id_sidik_jari],
                ['periode_presensi', '=', $periode],
            ])->count();
            if($count_data > 0){

                $get_data = \App\PresensiBulan::where([
                    ['id_sidik_jari', '=', $id_sidik_jari],
                    ['periode_presensi', '=', $periode],
                ])->first();

                $total_early_presensi = $get_data['total_early_presensi'];
                $total_late_presensi  = $get_data['total_late_presensi'];

                $data_r1 = preg_split('/\./', $total_early_presensi);
                $total1 = ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $old_early_presensi);
                $total2 = ($data_r2[0]*60) + $data_r2[1];
                $data_r4 = preg_split('/\./', $early);
                $total4 = ($data_r4[0]*60) + $data_r4[1];
                $data_r3 = preg_split('/\./', $total_late_presensi);
                $total3 = ($data_r3[0]*60) + $data_r3[1];

                $selisih = $total4 - $total2;
                $total_early = $total1 + $selisih;
                $hours = floor($total_early / 60 );
                $minutes = floor(($total_early - ($hours * 60 )));
                if($minutes < 10){
                    $new_total_presensi_early = $hours . '.0' . $minutes;
                } else {
                    $new_total_presensi_early = $hours . '.' . $minutes;
                }                

                $jumlah = $total3 + $total_early;
                $hours = floor($jumlah / 60 );
                $minutes = floor(($jumlah - ($hours * 60 )));
                if($minutes<10){
                    $jumlah_keterlambatan = $hours . '.0' . $minutes;
                } else {
                    $jumlah_keterlambatan = $hours . '.' . $minutes;
                } 

                if($jumlah_keterlambatan < 8.00){
                    $keterangan = null;
                }elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
                    $keterangan = '25%';
                } elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
                    $keterangan = '50%';
                } elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
                    $keterangan = '75%';
                } elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
                    $keterangan = '100%';
                } elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
                    $keterangan = '100% + 1H';
                } elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
                    $keterangan = '100% + 2H';
                } elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
                    $keterangan = '100% + 3H';
                } elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
                    $keterangan = '100% + 4H';
                } elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
                    $keterangan = '100% + 5H';
                } elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
                    $keterangan = '100% + 6H';
                } else {
                    $keterangan = null;
                }


                $get_data->update([
                    'total_early_presensi'=> $new_total_presensi_early,
                    'jumlah_keterlambatan'=> $jumlah_keterlambatan,
                    'keterangan'          => $keterangan,
                ]);
            }
        }
    }

    if($data == true){

        $notification = array(
            'message' => 'Data Berhasil di Ubah!',
            'alert-type' => 'success'
        );

        return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);

    } else {

        $notification = array(
            'message' => 'Data Gagal di Ubah!',
            'alert-type' => 'error'
        );

        return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);
    }

}

public function update_presensi_Calendar_absen(Request $request)
{
    $request = $request->all();

    $data_presensi = \App\Presensi::find($request['id_presensi']);

    $data = $data_presensi->update($request);

    if($data == true){

        $notification = array(
            'message' => 'Data Berhasil di Ubah!',
            'alert-type' => 'success'
        );

        return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);

    } else {

        $notification = array(
            'message' => 'Data Gagal di Ubah!',
            'alert-type' => 'error'
        );

        return redirect()->action('PresensiController@presensi_Calendar', $request['id_sidik_jari'])->with($notification);
    }

}

public function hapus_presensi_absen(Request $request){


    $count_data = \App\Presensi::where([
        ['id_sidik_jari', '=', $request->id_sidik_jari],
        ['tanggal_presensi', '=', $request->tanggal_presensi],
    ])->count();



    if($count_data > 0){

        $get_data = \App\Presensi::where([
           ['id_sidik_jari', '=', $request->id_sidik_jari],
           ['tanggal_presensi', '=', $request->tanggal_presensi],
       ])->first();

        $get_data->delete($get_data);

        //notifikasi untuk toastr ketika data berhasil di hapus
        $notification = array(
            'message' => 'Data Berhasil di Hapus!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);

    } else {
        //notifikasi untuk toastr ketika data berhasil di hapus
        $notification = array(
            'message' => 'Data Tidak Tersedia!',
            'alert-type' => 'warning' 
        );

        return back()->with($notification);
    }
}

public function update_presensi(Request $request, $id_presensi){
    $request = $request->all();

    $data_presensi = \App\PresensiBulan::find($id_presensi);

    $data_presensi->update([
        'keterangan'=> $request['keterangan1'].' + '.$request['keterangan2'],
    ]);

    $data = $data_presensi->update($request);

    if($data == true){

        $notification = array(
            'message' => 'Data Berhasil di Ubah!',
            'alert-type' => 'success'
        );

        return redirect()->action('PresensiController@tampilkan_presensi', $request)->with($notification);

    } else {

        $notification = array(
            'message' => 'Data Gagal di Ubah!',
            'alert-type' => 'error'
        );

        return redirect()->action('PresensiController@tampilkan_presensi', $request)->with($notification);
    }

}


public function import_file(Request $request){

    $tanggal_awal_cek = DateTime::createFromFormat('Y-m-d',$request['dari_tanggal'])->format('Y-m-d');
    $tanggal_awal_cek = new DateTime($tanggal_awal_cek);
    $tanggal_akhir_cek = DateTime::createFromFormat('Y-m-d',$request['sampai_tanggal'])->format('Y-m-d');
    $tanggal_akhir_cek = new DateTime($tanggal_akhir_cek);

    $perbedaan = $tanggal_awal_cek->diff($tanggal_akhir_cek);
    $bulan = $perbedaan->m;
    $hari  = $perbedaan->d;

    if($bulan <= 0 && $hari <= 31){

        $data = \App\PengaturanPresensi::find(1);

        if($request['mode'] == "Normal"){
            $default_clock_in = $data->clock_in_normal;
            $default_clock_out = $data->clock_out_normal;
            $default_transport = $data->transport_normal;
        } else if ($request['mode'] == "Ramadhan"){
            $default_clock_in = $data->clock_in_ramadhan;
            $default_clock_out = $data->clock_out_ramadhan;
            $default_transport = $data->transport_ramadhan;
        }

        $lupa_clock_in_out = $data->lupa_clock_in_out;

        if ($request->hasFile('import_presensi')) {
            $request->file('import_presensi')->move(public_path().'/filePresensi', $request->file('import_presensi')->getClientOriginalName());

            $filename = $request->file('import_presensi')->getClientOriginalName();
            $public_path = '/filePresensi/';

            $fp = fopen($_SERVER['DOCUMENT_ROOT'].$public_path.$filename, 'r');
            $i  = 0;

            $last = DB::table('presensi')->latest('id_presensi')->first();
            if($last == null){
                $last = null;
            } else {
                $last = $last->tanggal_presensi;
            }

            $dari_tanggal    = $request->dari_tanggal;
            $sampai_tanggal  = $request->sampai_tanggal;

            $data_absen = null;
            while (!feof($fp)) {

                $data = fgetcsv($fp, 0, "\t");

                $data_raw0 = preg_split('/ +/', $data[1]);
                $tanggal_presensi = $data_raw0[0];

                if ($tanggal_presensi >= $dari_tanggal && $tanggal_presensi <= $sampai_tanggal) {
                    $jam_presensi = $data_raw0[1];
                    $id_sidik_jari = (int)$data[0];
                    $dif = (int)$data[3];

                    $data_absen[$id_sidik_jari . $tanggal_presensi] = $id_sidik_jari . ' ' . $tanggal_presensi;

                    if ($dif == 0) {
                        $data_jam_absen_datang[$id_sidik_jari . $tanggal_presensi] = $jam_presensi;
                    } elseif ($dif == 1) {
                        $data_jam_absen_pulang[$id_sidik_jari . $tanggal_presensi] = $jam_presensi;
                    }

                } else{
                                    // Do nothing
                }

            }


            if(is_null($data_absen))
            {

                $notification = array(
                    'message' => 'File Gagal di Upload!',
                    'alert-type' => 'error'
                );

                return back()->with($notification);

            } else {

                foreach ($data_absen as $data_absen) {
                    $data_raw1 = preg_split('/ +/', $data_absen);
                    $id_sidik_jari = $data_raw1[0];
                    $count = DB::Table("dataKaryawan")->where('id_sidik_jari', $id_sidik_jari)->count();
                    if($count > 0){
                        $tanggal_presensi = $data_raw1[1];
                        $keys = $id_sidik_jari . $tanggal_presensi;

                                            //Input jam clock out
                        if (array_key_exists($keys, $data_jam_absen_pulang)) {
                            $jam_clock_out = $data_jam_absen_pulang[$keys];
                            $info_clock_out = null;
                        } else {
                            $jam_clock_out  = '00:00:00';
                            $info_clock_out = 'Lupa clock out!';
                        }
                                            //Input jam clock in
                        if (array_key_exists($keys, $data_jam_absen_datang)) {
                            $jam_clock_in = $data_jam_absen_datang[$keys];
                            $info_clock_in = null;
                        } else {
                            $jam_clock_in  = '00:00:00';
                            $info_clock_in = 'Lupa clock in!';
                        }
                                            //Input late
                        if ($jam_clock_in == '00:00:00') {
                            $late = $lupa_clock_in_out;
                        } else {
                            if ($jam_clock_in > $default_clock_in) {
                                $total = strtotime($jam_clock_in) - strtotime($default_clock_in);
                                $hours = floor($total / 60 / 60);
                                $minutes = floor(($total - ($hours * 60 * 60)) / 60);
                                if($minutes<10){
                                    $late = $hours . '.0' . $minutes;
                                } else {
                                    $late = $hours . '.' . $minutes;
                                }
                            } else {
                                $late = '0.00';
                            }
                        }
                                            //Input Early
                        if ($jam_clock_out == '00:00:00') {
                            $early = $lupa_clock_in_out;
                        } else {
                            if ($jam_clock_out < $default_clock_out) {
                                $total = strtotime($default_clock_out) - strtotime($jam_clock_out);
                                $hours = floor($total / 60 / 60);
                                $minutes = floor(($total - ($hours * 60 * 60)) / 60);
                                if($minutes<10){
                                    $early = $hours . '.0' . $minutes;
                                } else {
                                    $early = $hours . '.' . $minutes;
                                }

                            } else {
                                $early = '0.00';
                            }
                        }

                                            //Input Transport
                        if (is_null($jam_clock_in)) {
                            $transport = null;
                        } elseif($jam_clock_in == '00:00:00'){
                            $transport = null;
                        } else {
                            if ($jam_clock_in < $default_transport) {
                                $transport = '1';
                            } else {
                                $transport = null;
                            }
                        }

                        $count_data = DB::table('presensi')->where([
                            ['id_sidik_jari', '=', $id_sidik_jari],
                            ['tanggal_presensi', '=', $tanggal_presensi],
                        ])->count();
                        if($count_data > 0){

                            $get_data = \App\Presensi::where([
                                ['id_sidik_jari', '=', $id_sidik_jari],
                                ['tanggal_presensi', '=', $tanggal_presensi],
                            ])->first();

                            $get_data->update([
                                'jam_clock_in'      => $jam_clock_in,
                                'info_clock_in'     => $info_clock_in,
                                'jam_clock_out'     => $jam_clock_out,
                                'info_clock_out'    => $info_clock_out,
                                'late_presensi'     => $late,
                                'early_presensi'    => $early,
                                'transport_presensi'=> $transport,
                            ]);

                        } else {

                            \App\Presensi::create([
                                'id_sidik_jari' => $id_sidik_jari,
                                'tanggal_presensi' => $tanggal_presensi,
                                'jam_clock_in'      => $jam_clock_in,
                                'info_clock_in'     => $info_clock_in,
                                'jam_clock_out'     => $jam_clock_out,
                                'info_clock_out'    => $info_clock_out,
                                'late_presensi' => $late,
                                'early_presensi' => $early,
                                'transport_presensi' => $transport,
                            ]);

                        }

                    } else {
                                        //Do Nothing
                    }
                }

            }  

            $notification = array(
                'message' => 'File Berhasil di Upload!',
                'alert-type' => 'success'
            );

            return back()->with($notification);

        } else {

            $notification = array(
                'message' => 'File Gagal di Upload!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }
    } else {
        $notification = array(
            'message' => 'Rentang tanggal melebihi kapasitas!',
            'alert-type' => 'error'
        );

        return back()->with($notification);
    }

}

public function kalkulasi_presensi(Request $request){

    $request = $request->all();

    if($request == null){

        $notification = array(
            'message' => 'Rentang tanggal tidak valid!',
            'alert-type' => 'error'
        );

        return redirect()->action('PresensiController@index')->with($notification);

    } else {

        $tanggal_awal = $request['dari_tanggal'];
        $tanggal_akhir = $request['sampai_tanggal'];
        $periode = $tanggal_awal. ' ' .$tanggal_akhir;

        $tanggal_awal_cek = DateTime::createFromFormat('Y-m-d',$tanggal_awal)->format('Y-m-d');
        $tanggal_awal_cek = new DateTime($tanggal_awal_cek);
        $tanggal_akhir_cek = DateTime::createFromFormat('Y-m-d',$tanggal_akhir)->format('Y-m-d');
        $tanggal_akhir_cek = new DateTime($tanggal_akhir_cek);

        $perbedaan = $tanggal_awal_cek->diff($tanggal_akhir_cek);
        $bulan = $perbedaan->m;
        $hari  = $perbedaan->d;

            // $count_absen = 0;
            // while (strtotime($tanggal_awal) <= strtotime($tanggal_akhir)) {
            //     if(date('l', strtotime($tanggal_awal)) != 'Sunday' && date('l', strtotime($tanggal_awal)) != 'Saturday' ){
            //     $count_absen = $count_absen + 1;
            //     }
            //     $tanggal_awal = date ("Y-m-d", strtotime("+1 day", strtotime($tanggal_awal)));
            // }

            // dd($count_absen);

        if($bulan <= 0 && $hari <= 31){


            $data  =  DB::table('presensi')->whereBetween('tanggal_presensi', [$tanggal_awal, $tanggal_akhir])->get();

            $data  = $data->all();

            if($data == null){

                $notification = array(
                    'message' => 'Data Tidak Tersedia!',
                    'alert-type' => 'warning'
                );

                return back()->with($notification);

            } else {

                foreach ($data as $key => $data) {

                    $id_sidik_jari    = $data->id_sidik_jari;
                    $tanggal_presensi = $data->tanggal_presensi;
                    $jam_clock_in     = $data->jam_clock_in;
                    $jam_clock_out    = $data->jam_clock_out;
                    $late_presensi    = $data->late_presensi;
                    $early_presensi   = $data->early_presensi;
                    $transport_presensi= $data->transport_presensi;
                    $keterangan_presensi= $data->keterangan_presensi;


                    $data_periode[$id_sidik_jari.$tanggal_awal.$tanggal_akhir] =  $id_sidik_jari.' '.$tanggal_awal.' '.$tanggal_akhir;

                    $data_absen = ([
                        $id_sidik_jari,
                        $tanggal_presensi,
                        $jam_clock_in,
                        $jam_clock_out,
                        $late_presensi,
                        $early_presensi,
                        $transport_presensi,
                        $keterangan_presensi,
                    ]);

                    $data_presensi[$id_sidik_jari.$tanggal_presensi] = $data_absen;
                }

                foreach ($data_periode as $key => $data_periode) {

                    $data_raw2   = preg_split('/ +/', $data_periode);
                    $bulan_awal  = DateTime::createFromFormat('Y-m-d',$data_raw2[1])->format('m');
                    $bulan_akhir = DateTime::createFromFormat('Y-m-d',$data_raw2[2])->format('m');
                    $tahun       = DateTime::createFromFormat('Y-m-d',$data_raw2[2])->format('Y');
                    $transport   = 0; 
                    $count_absen = 0;
                    $total_presensi_late  = 0;
                    $total_presensi_early = 0;
                    $jumlah_keterlambatan = 0;
                    $cuti = 0;
                    $cuti_penting = 0;
                    $izin = 0;
                    $dispensasi = 0;
                    $sdsd = 0;
                    $stsd = 0;

                    $keys_21 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-21';
                    $keys_22 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-22';
                    $keys_23 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-23';
                    $keys_24 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-24';
                    $keys_24 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-24';
                    $keys_25 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-25';
                    $keys_26 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-26';
                    $keys_27 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-27';
                    $keys_28 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-28';
                    $keys_29 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-29';
                    $keys_30 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-30';
                    $keys_31 = $data_raw2[0].$tahun.'-'.$bulan_awal.'-31';
                    $keys_01 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-01';
                    $keys_02 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-02';
                    $keys_03 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-03';
                    $keys_04 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-04';
                    $keys_05 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-05';
                    $keys_06 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-06';
                    $keys_07 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-07';
                    $keys_08 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-08';
                    $keys_09 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-09';
                    $keys_10 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-10';
                    $keys_11 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-11';
                    $keys_12 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-12';
                    $keys_13 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-13';
                    $keys_14 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-14';
                    $keys_15 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-15';
                    $keys_16 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-16';
                    $keys_17 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-17';
                    $keys_18 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-18';
                    $keys_19 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-19';
                    $keys_20 = $data_raw2[0].$tahun.'-'.$bulan_akhir.'-20';

                    if (array_key_exists($keys_21, $data_presensi)) {
                        if($data_presensi[$keys_21][7] == null){
                            $data_r1 = preg_split('/\./', $data_presensi[$keys_21][4]);
                            $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
                            $data_r2 = preg_split('/\./', $data_presensi[$keys_21][5]);
                            $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
                            $transport = $transport + $data_presensi[$keys_21][6];
                        } else {
                            $data_r3 = preg_split('/\ : /', $data_presensi[$keys_21][7]);
                            if($data_r3[0] == 'Izin'){
                                $izin = $izin + 1;
                            } elseif ($data_r3[0] == 'Cuti'){
                                $cuti = $cuti + 1;
                            } elseif ($data_r3[0] == 'Cuti Penting'){
                                $cuti_penting = $cuti_penting + 1;
                            } elseif ($data_r3[0] == 'Dispensasi'){
                                $dispensasi = $dispensasi + 1;
                            } elseif ($data_r3[0] == 'SDSD'){
                                $sdsd = $sdsd + 1;
                            } elseif ($data_r3[0] == 'STSD'){
                                $stsd = $stsd + 1;
                            } elseif ($data_r3[0] == 'Dinas Luar'){
                                $transport = $transport + 1;
                            }
                        }
                    } else {
                        if(date('l', strtotime($tahun.'-'.$bulan_awal.'-21')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-21')) != 'Saturday' ){
                         $count_absen = $count_absen + 1;
                     }
                 }

                 if (array_key_exists($keys_22, $data_presensi)) {
                    if($data_presensi[$keys_22][7] == null){
                        $data_r1 = preg_split('/\./', $data_presensi[$keys_22][4]);
                        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
                        $data_r2 = preg_split('/\./', $data_presensi[$keys_22][5]);
                        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
                        $transport = $transport + $data_presensi[$keys_22][6];
                    } else {
                        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_22][7]);
                        if($data_r3[0] == 'Izin'){
                            $izin = $izin + 1;
                        } elseif ($data_r3[0] == 'Cuti'){
                            $cuti = $cuti + 1;
                        } elseif ($data_r3[0] == 'Cuti Penting'){
                            $cuti_penting = $cuti_penting + 1;
                        } elseif ($data_r3[0] == 'Dispensasi'){
                            $dispensasi = $dispensasi + 1;
                        } elseif ($data_r3[0] == 'SDSD'){
                            $sdsd = $sdsd + 1;
                        } elseif ($data_r3[0] == 'STSD'){
                            $stsd = $stsd + 1;
                        } elseif ($data_r3[0] == 'Dinas Luar'){
                            $transport = $transport + 1;
                        }
                    }
                } else {
                    if(date('l', strtotime($tahun.'-'.$bulan_awal.'-22')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-22')) != 'Saturday' ){
                     $count_absen = $count_absen + 1;
                 }
             }

             if (array_key_exists($keys_23, $data_presensi)) {
                if($data_presensi[$keys_23][7] == null){
                    $data_r1 = preg_split('/\./', $data_presensi[$keys_23][4]);
                    $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
                    $data_r2 = preg_split('/\./', $data_presensi[$keys_23][5]);
                    $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
                    $transport = $transport + $data_presensi[$keys_23][6];
                } else {
                    $data_r3 = preg_split('/\:/', $data_presensi[$keys_23][7]);
                    if($data_r3[0] == 'Izin' || $data_r3[0] == 'Izin '){
                        $izin = $izin + 1;
                    } elseif ($data_r3[0] == 'Cuti' || $data_r3[0] == 'Cuti '){
                        $cuti = $cuti + 1;
                    } elseif ($data_r3[0] == 'Cuti Penting' || $data_r3[0] == 'Cuti Penting '){
                        $cuti_penting = $cuti_penting + 1;
                    } elseif ($data_r3[0] == 'Dispensasi' || $data_r3[0] == 'Dispensasi '){
                        $dispensasi = $dispensasi + 1;
                    } elseif ($data_r3[0] == 'SDSD' || $data_r3[0] == 'SDSD '){
                        $sdsd = $sdsd + 1;
                    } elseif ($data_r3[0] == 'STSD' || $data_r3[0] == 'STSD '){
                        $stsd = $stsd + 1;
                    } elseif ($data_r3[0] == 'Dinas Luar'){
                        $transport = $transport + 1;
                    }
                }
            } else {
                if(date('l', strtotime($tahun.'-'.$bulan_awal.'-23')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-23')) != 'Saturday' ){
                 $count_absen = $count_absen + 1;
             }
         }

         if (array_key_exists($keys_24, $data_presensi)) {
            if($data_presensi[$keys_24][7] == null){
                $data_r1 = preg_split('/\./', $data_presensi[$keys_24][4]);
                $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
                $data_r2 = preg_split('/\./', $data_presensi[$keys_24][5]);
                $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
                $transport = $transport + $data_presensi[$keys_24][6];
            } else {
                $data_r3 = preg_split('/\ : /', $data_presensi[$keys_24][7]);
                if($data_r3[0] == 'Izin'){
                    $izin = $izin + 1;
                } elseif ($data_r3[0] == 'Cuti'){
                    $cuti = $cuti + 1;
                } elseif ($data_r3[0] == 'Cuti Penting'){
                    $cuti_penting = $cuti_penting + 1;
                } elseif ($data_r3[0] == 'Dispensasi'){
                    $dispensasi = $dispensasi + 1;
                } elseif ($data_r3[0] == 'SDSD'){
                    $sdsd = $sdsd + 1;
                } elseif ($data_r3[0] == 'STSD'){
                    $stsd = $stsd + 1;
                } elseif ($data_r3[0] == 'Dinas Luar'){
                    $transport = $transport + 1;
                }
            }
        } else {
            if(date('l', strtotime($tahun.'-'.$bulan_awal.'-24')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-24')) != 'Saturday' ){
             $count_absen = $count_absen + 1;
         }
     }

     if (array_key_exists($keys_25, $data_presensi)) {
        if($data_presensi[$keys_25][7] == null){
            $data_r1 = preg_split('/\./', $data_presensi[$keys_25][4]);
            $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
            $data_r2 = preg_split('/\./', $data_presensi[$keys_25][5]);
            $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
            $transport = $transport + $data_presensi[$keys_25][6];
        } else {
            $data_r3 = preg_split('/\ : /', $data_presensi[$keys_25][7]);
            if($data_r3[0] == 'Izin'){
                $izin = $izin + 1;
            } elseif ($data_r3[0] == 'Cuti'){
                $cuti = $cuti + 1;
            } elseif ($data_r3[0] == 'Cuti Penting'){
                $cuti_penting = $cuti_penting + 1;
            } elseif ($data_r3[0] == 'Dispensasi'){
                $dispensasi = $dispensasi + 1;
            } elseif ($data_r3[0] == 'SDSD'){
                $sdsd = $sdsd + 1;
            } elseif ($data_r3[0] == 'STSD'){
                $stsd = $stsd + 1;
            } elseif ($data_r3[0] == 'Dinas Luar'){
                $transport = $transport + 1;
            }
        }
    } else {
        if(date('l', strtotime($tahun.'-'.$bulan_awal.'-25')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-25')) != 'Saturday' ){
         $count_absen = $count_absen + 1;
     }
 }

 if (array_key_exists($keys_26, $data_presensi)) {
    if($data_presensi[$keys_26][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_26][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_26][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_26][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_26][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_awal.'-26')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-26')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_27, $data_presensi)) {
    if($data_presensi[$keys_27][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_27][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_27][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_27][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_27][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_awal.'-27')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-27')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_28, $data_presensi)) {
    if($data_presensi[$keys_28][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_28][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_28][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_28][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_28][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_awal.'-28')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-28')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_29, $data_presensi)) {
    if($data_presensi[$keys_29][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_29][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_29][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_29][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_29][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_awal.'-29')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-29')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_30, $data_presensi)) {
    if($data_presensi[$keys_30][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_30][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_30][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_30][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_30][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_awal.'-30')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-30')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_31, $data_presensi)) {
    if($data_presensi[$keys_31][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_31][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_31][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_31][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_31][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_awal.'-31')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_awal.'-31')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_01, $data_presensi)) {
    if($data_presensi[$keys_01][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_01][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_01][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_01][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_01][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
   if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-01')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-01')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_02, $data_presensi)) {
    if($data_presensi[$keys_02][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_02][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_02][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_02][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_02][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-02')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-02')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}
if (array_key_exists($keys_03, $data_presensi)) {
    if($data_presensi[$keys_03][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_03][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_03][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_03][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_03][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-03')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-03')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}
if (array_key_exists($keys_04, $data_presensi)) {
    if($data_presensi[$keys_04][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_04][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_04][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_04][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_04][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_awal.'-04')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-04')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}
if (array_key_exists($keys_05, $data_presensi)) {
    if($data_presensi[$keys_05][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_05][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_05][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_05][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_05][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
   if(date('l', strtotime($tahun.'-'.$bulan_awal.'-05')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-05')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_06, $data_presensi)) {
    if($data_presensi[$keys_06][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_06][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_06][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_06][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_06][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-06')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-06')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_07, $data_presensi)) {
    if($data_presensi[$keys_07][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_07][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_07][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_07][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_07][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
   if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-07')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-07')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_08, $data_presensi)) {
    if($data_presensi[$keys_08][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_08][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_08][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_08][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_08][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-08')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-08')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_09, $data_presensi)) {
    if($data_presensi[$keys_09][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_09][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_09][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_09][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_09][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-09')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-09')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_10, $data_presensi)) {
    if($data_presensi[$keys_10][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_10][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_10][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_10][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_10][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
   if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-10')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-10')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_11, $data_presensi)) {
    if($data_presensi[$keys_11][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_11][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_11][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_11][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_11][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
   if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-11')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-11')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_12, $data_presensi)) {
    if($data_presensi[$keys_12][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_12][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_12][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_12][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_12][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-12')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-12')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_13, $data_presensi)) {
    if($data_presensi[$keys_13][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_13][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_13][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_13][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_13][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-13')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-13')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_14, $data_presensi)) {
    if($data_presensi[$keys_14][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_14][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_14][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_14][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_14][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-14')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-14')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_15, $data_presensi)) {
    if($data_presensi[$keys_15][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_15][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_15][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_15][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_15][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-15')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-15')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_16, $data_presensi)) {
    if($data_presensi[$keys_16][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_16][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_16][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_16][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_16][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-16')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-16')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_17, $data_presensi)) {
    if($data_presensi[$keys_17][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_17][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_17][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_17][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_17][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-17')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-17')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_18, $data_presensi)) {
    if($data_presensi[$keys_18][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_18][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_18][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_18][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_18][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-18')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-18')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_19, $data_presensi)) {
    if($data_presensi[$keys_19][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_19][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_19][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_19][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_19][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
   if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-19')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-19')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

if (array_key_exists($keys_20, $data_presensi)) {
    if($data_presensi[$keys_20][7] == null){
        $data_r1 = preg_split('/\./', $data_presensi[$keys_20][4]);
        $total_presensi_late = $total_presensi_late + ($data_r1[0]*60) + $data_r1[1];
        $data_r2 = preg_split('/\./', $data_presensi[$keys_20][5]);
        $total_presensi_early = $total_presensi_early + ($data_r2[0]*60) + $data_r2[1];
        $transport = $transport + $data_presensi[$keys_20][6];
    } else {
        $data_r3 = preg_split('/\ : /', $data_presensi[$keys_20][7]);
        if($data_r3[0] == 'Izin'){
            $izin = $izin + 1;
        } elseif ($data_r3[0] == 'Cuti'){
            $cuti = $cuti + 1;
        } elseif ($data_r3[0] == 'Cuti Penting'){
            $cuti_penting = $cuti_penting + 1;
        } elseif ($data_r3[0] == 'Dispensasi'){
            $dispensasi = $dispensasi + 1;
        } elseif ($data_r3[0] == 'SDSD'){
            $sdsd = $sdsd + 1;
        } elseif ($data_r3[0] == 'STSD'){
            $stsd = $stsd + 1;
        } elseif ($data_r3[0] == 'Dinas Luar'){
            $transport = $transport + 1;
        }
    }
} else {
    if(date('l', strtotime($tahun.'-'.$bulan_akhir.'-21')) != 'Sunday' && date('l', strtotime($tahun.'-'.$bulan_akhir.'-21')) != 'Saturday' ){
     $count_absen = $count_absen + 1;
 }
}

$data_default  = \App\DefaultPresensi::where('id_sidik_jari', '=', $data_raw2[0])->first();

if($stsd == 0 && $cuti == 0){
    $cuti_luar_tanggungan = 0;
    $cuti_tahunan         = 0;
} else {
    if($data_default->stsd == 7 && $data_default->sisa_cuti_tahunan == 0){
        $cuti_luar_tanggungan = $stsd + $cuti;
        $cuti_tahunan = 0;
    } elseif($data_default->stsd != 7 && $data_default->sisa_cuti_tahunan == 0){
        $temp = $data_default->stsd + $cuti + $stsd; 
        if($temp > 7){
            $cuti_luar_tanggungan = $temp - 7;
        } elseif($temp < 7){
            $stsd = $cuti + $stsd;
            $cuti_luar_tanggungan = 0;
        }
        $cuti_tahunan = 0;
    } elseif($data_default->stsd == 7 && $data_default->sisa_cuti_tahunan != 0){
        $temp = (int)$data_default->cuti_tahunan + $cuti + $stsd; 
        if($temp > 12){
            $cuti_luar_tanggungan = $temp - 12;
            $cuti_tahunan = 0;
        } elseif($temp < 12){
            $cuti_tahunan = $cuti + $stsd;
            $cuti_luar_tanggungan = 0;
        }
    } elseif($data_default->stsd != 7 && $data_default->sisa_cuti_tahunan != 0){
        $temp1 = (int)$data_default->cuti_tahunan + $cuti; 
        if($temp1 > 12){
            $temp2 = $temp1 - 12 + $stsd;
            if($temp2 > 7){
                $cuti_luar_tanggungan = $temp - 7;
            } else {
                $stsd = $stsd + $cuti;
                $cuti_luar_tanggungan = 0;
            }
            $cuti_tahunan = 0;
        } elseif($temp1 < $data_default->stsd){
            $cuti_tahunan = $cuti;
            $cuti_luar_tanggungan = 0;
        }

        $temp1 = (int)$data_default->stsd + $stsd; 
        if($temp1 > 7){
            $temp2 = $temp1 - 7 + $cuti;
            if($temp2 > 12){
                $cuti_luar_tanggungan = $temp - 12;
                $cuti_tahunan = 0;
            } else {
                $cuti_tahunan = $cuti + $stsd;
                $cuti_luar_tanggungan = 0;
            }
        } elseif($temp1 < $data_default->stsd){
            $stsd = $Stsd + $cuti;
            $cuti_luar_tanggungan = 0;
        }
    }
}

$jumlah_keterlambatan = $total_presensi_late + $total_presensi_early;

$hours = floor($total_presensi_late / 60 );
$minutes = floor(($total_presensi_late - ($hours * 60 )));
if($minutes<10){
    $total_presensi_late = $hours . '.0' . $minutes;
} else {
    $total_presensi_late = $hours . '.' . $minutes;
}

$hours = floor($total_presensi_early / 60 );
$minutes = floor(($total_presensi_early - ($hours * 60 )));
if($minutes<10){
    $total_presensi_early = $hours . '.0' . $minutes;
} else {
    $total_presensi_early = $hours . '.' . $minutes;
}

$hours = floor($jumlah_keterlambatan / 60 );
$minutes = floor(($jumlah_keterlambatan - ($hours * 60 )));
if($minutes<10){
    $jumlah_keterlambatan = $hours . '.0' . $minutes;
} else {
    $jumlah_keterlambatan = $hours . '.' . $minutes;
}

if($jumlah_keterlambatan < 8.00){
    $keterangan = null;
}elseif($jumlah_keterlambatan > 8.00 && $jumlah_keterlambatan < 16.00 ){
    $keterangan = '25%';
} elseif ($jumlah_keterlambatan > 16.00 && $jumlah_keterlambatan < 24.00 ){
    $keterangan = '50%';
} elseif ($jumlah_keterlambatan > 24.00 && $jumlah_keterlambatan < 32.00 ){
    $keterangan = '75%';
} elseif ($jumlah_keterlambatan > 32.00 && $jumlah_keterlambatan < 40.00 ){
    $keterangan = '100%';
} elseif ($jumlah_keterlambatan > 40.00 && $jumlah_keterlambatan < 48.00 ){
    $keterangan = '100% + 1H';
} elseif ($jumlah_keterlambatan > 48.00 && $jumlah_keterlambatan < 56.00 ){
    $keterangan = '100% + 2H';
} elseif ($jumlah_keterlambatan > 56.00 && $jumlah_keterlambatan < 64.00  ){
    $keterangan = '100% + 3H';
} elseif ($jumlah_keterlambatan > 64.00 && $jumlah_keterlambatan < 72.00  ){
    $keterangan = '100% + 4H';
} elseif ($jumlah_keterlambatan > 72.00 && $jumlah_keterlambatan < 80.00  ){
    $keterangan = '100% + 5H';
} elseif ($jumlah_keterlambatan > 80.00 && $jumlah_keterlambatan < 88.00  ){
    $keterangan = '100% + 6H';
} else {
    $keterangan = null;
}


$count_d = DB::table('presensibulan')->where([
    ['id_sidik_jari', '=', $data_raw2[0]],
    ['periode_presensi', '=', $data_raw2[1].' '.$data_raw2[2]],
])->count();
if($count_d > 0){

    $get_data = \App\PresensiBulan::where([
        ['id_sidik_jari', '=', $data_raw2[0]],
        ['periode_presensi', '=', $data_raw2[1].' '.$data_raw2[2]],
    ])->first();

    $get_data->update([
        'jumlah_absen' => $count_absen,
        'ijin'         => $izin,
        'cuti_tahunan' => $cuti,
        'cuti_penting' => $cuti_penting,
        'dispensasi'   => $dispensasi,
        'sdsd'         => $sdsd,
        'stsd'         => $stsd,
        'cuti_luar_tanggungan' => $cuti_luar_tanggungan,
        'total_late_presensi' => $total_presensi_late,
        'total_early_presensi' => $total_presensi_early,
        'jumlah_keterlambatan' => $jumlah_keterlambatan,
        'transport_presensi' => $transport,
        'keterangan'        => $keterangan
    ]);

} else {

    \App\PresensiBulan::create([
        'jumlah_absen' => $count_absen,
        'ijin'         => $izin,
        'cuti_tahunan' => $cuti,
        'cuti_penting' => $cuti_penting,
        'dispensasi'   => $dispensasi,
        'sdsd'         => $sdsd,
        'stsd'         => $stsd,
        'cuti_luar_tanggungan' => $cuti_luar_tanggungan,
        'id_sidik_jari' => $data_raw2[0],
        'periode_presensi' => $data_raw2[1].' '.$data_raw2[2],
        'total_late_presensi' => $total_presensi_late,
        'total_early_presensi' => $total_presensi_early,
        'jumlah_keterlambatan' => $jumlah_keterlambatan,
        'transport_presensi' => $transport,
        'keterangan'        => $keterangan
    ]);  

}                                  
}

$notification = array(
    'message' => 'Rekap Data Berhasil!',
    'alert-type' => 'success'
);

return back()->with($notification);

}

} else {

    $notification = array(
        'message' => 'Rentang tanggal melebihi kapasitas!',
        'alert-type' => 'error'
    );

    return back()->with($notification);
}
}

}

public function tampilkan_presensi(Request $request){

    $request = $request->all();

    if($request == null){

        $notification = array(
            'message' => 'Rentang tanggal tidak valid!',
            'alert-type' => 'error'
        );

        return redirect()->action('PresensiController@index')->with($notification);

    } else {
        $tanggal_awal = $request['dari_tanggal'];
        $tanggal_akhir = $request['sampai_tanggal'];
        $periode = $tanggal_awal. ' ' .$tanggal_akhir;

        $tanggal_awal_cek = DateTime::createFromFormat('Y-m-d',$tanggal_awal)->format('Y-m-d');
        $tanggal_awal_cek = new DateTime($tanggal_awal_cek);
        $tanggal_akhir_cek = DateTime::createFromFormat('Y-m-d',$tanggal_akhir)->format('Y-m-d');
        $tanggal_akhir_cek = new DateTime($tanggal_akhir_cek);

        $perbedaan = $tanggal_awal_cek->diff($tanggal_akhir_cek);
        $bulan = $perbedaan->m;
        $hari  = $perbedaan->d;

        if($bulan <= 0 && $hari <= 31){

            $count_presensi  = \App\PresensiBulan::where('periode_presensi',$periode)->count();

            if($count_presensi > 0){

                $data_presensi  = \App\PresensiBulan::where('periode_presensi',$periode)->get();
                $data_karyawan  = \App\Datakaryawan::all();

                foreach ($data_karyawan as $data) {

                    foreach ($data_presensi as $value) {

                        if( $value->id_sidik_jari == $data->id_sidik_jari){

                            if($value->keterangan == null){
                                $keterangan1 = null;
                                $keterangan2 = null;
                            } else  {
                                $data_r = preg_split('/ \+ /', $value->keterangan);
                                $count   = count($data_r);
                                if($count > 1){
                                   $keterangan1 = $data_r[0];
                                   $keterangan2 = $data_r[1];
                               } else {
                                   $keterangan1 = $data_r[0];
                                   $keterangan2 = null;
                               }
                           }

                           $data_presensi_blade[] = ([
                            'id_presensi'       => $value->id_presensi,
                            'periode_presensi'  => $value->periode_presensi,
                            'nama_karyawan'     => $data->nama_karyawan,
                            'id_sidik_jari'     => $data->id_sidik_jari,
                            'nik'               => $data->nik,
                            'divisi'            => $data->divisi,
                            'jumlah_absen' => $value->count_absen,
                            'ijin'         => $value->ijin,
                            'cuti_tahunan' => $value->cuti_tahunan,
                            'cuti_penting' => $value->cuti_penting,
                            'dispensasi'   => $value->dispensasi,
                            'sdsd'         => $value->sdsd,
                            'stsd'         => $value->stsd,
                            'cuti_luar_tanggungan' => $value->cuti_luar_tanggungan,
                            'sisa_cuti_tahunan' => $value->sisa_cuti_tahunan,
                            'total_late_presensi'  => $value->total_late_presensi,
                            'total_early_presensi' => $value->total_early_presensi,
                            'jumlah_keterlambatan' => $value->jumlah_keterlambatan,
                            'jumlah_absen'         => $value->jumlah_absen,
                            'transport_presensi'   => $value->transport_presensi,
                            'tambahan_presensi'    => $value->tambahan_presensi,
                            'keterangan1'          => $keterangan1,
                            'keterangan2'          => $keterangan2,
                        ]);

                       } 
                   }
               }

               $notification = array(
                'message' => 'Data Berhasil di Tampilkan',
                'alert-type' => 'success'
            );

               return view('Presensi.presensi', ['data_presensi_blade' => $data_presensi_blade, 'data_karyawan' => $data_karyawan, 'request' => $request])->with($notification);

           } else {
            $notification = array(
                'message' => 'Data Tidak Tersedia, Silahkan Kalkulasi terlebih dahulu!',
                'alert-type' => 'error'
            );

            return back()->with($notification);

        }
    } else {

        $notification = array(
            'message' => 'Rentang tanggal melebihi kapasitas!',
            'alert-type' => 'error'
        );

        return back()->with($notification);
    }

}

}

public function unduh_laporan($periode){
    if($periode == " "){
        $notification = array(
            'message' => 'Silahkan Tampilkan Data yang Ingin Anda Unduh!',
            'alert-type' => 'warning'
        );

        return back()->with($notification);

    } else {
        return Excel::download(new PresensiExport($periode), 'Late Early '.$periode.'.xlsx');
    }


}

public function unduh_rekap_laporan($periode){
    if($periode == " "){
        $notification = array(
            'message' => 'Silahkan Tampilkan Data yang Ingin Anda Unduh!',
            'alert-type' => 'warning'
        );

        return back()->with($notification);
    } else {
     return Excel::download(new PresensiRekapExport($periode), 'Presensi Rekap Bulan '.$periode.'.xlsx');
 }


}

public function unduh_default_presensi_laporan(){

    return Excel::download(new DefaultPresensiExport, 'rekappresensi.xlsx');
}

public function kalkulasi_rekap(Request $request){

    $request = $request->all();

    $tanggal_awal = $request['dari_tanggal'];
    $tanggal_akhir = $request['sampai_tanggal'];
    $periode = $tanggal_awal. ' ' .$tanggal_akhir;

    $tanggal_awal_cek = DateTime::createFromFormat('Y-m-d',$tanggal_awal)->format('Y-m-d');
    $tanggal_awal_cek = new DateTime($tanggal_awal_cek);
    $tanggal_akhir_cek = DateTime::createFromFormat('Y-m-d',$tanggal_akhir)->format('Y-m-d');
    $tanggal_akhir_cek = new DateTime($tanggal_akhir_cek);

    $perbedaan = $tanggal_awal_cek->diff($tanggal_akhir_cek);
    $bulan = $perbedaan->m;
    $hari  = $perbedaan->d;

    $count_d = DB::table('default_presensi')->where('periode_rekap', '=', $periode)->count();

    if( $count_d > 0){

        $notification = array(
            'message' => 'Data Telah Di Kalkulasi!',
            'alert-type' => 'warning'
        );

        return back()->with($notification);

    } else {

        if($bulan <= 0 && $hari <= 31){

            $count_presensi  = \App\PresensiBulan::where('periode_presensi',$periode)->count();

            if($count_presensi > 0){

                $data_presensi  = \App\PresensiBulan::where('periode_presensi',$periode)->get();
                $data_default  = \App\DefaultPresensi::all();

                foreach ($data_default as $key => $data) {
                    foreach ($data_presensi as $key => $value) {
                        if($data->id_sidik_jari == $value->id_sidik_jari){

                            $ijin = (int)$value->ijin;
                            $jumlah_absen = (int)$value->jumlah_absen;
                            $cuti_luar_tanggungan = (int)$value->cuti_luar_tanggungan;
                            $cuti_penting = (int)$value->cuti_penting;
                            $dispensasi = (int)$value->dispensasi;
                            $sdsd = (int)$value->sdsd;
                            $stsd = (int)$value->stsd;
                            $cuti_tahunan = (int)$value->cuti_tahunan;

                            if($stsd == 0 && $cuti_tahunan == 0){
                                $cuti_luar_tanggungan = 0;
                                $cuti_tahunan         = 0;
                            } else {
                                if($data->stsd == 7 && $data->sisa_cuti_tahunan == 0){
                                    $cuti_luar_tanggungan = $stsd + $cuti_tahunan;
                                    $cuti_tahunan = 0;
                                    $stsd = 7;
                                } elseif($data->stsd != 7 && $data->sisa_cuti_tahunan == 0){
                                    $temp = $data->stsd +$cuti_tahunan+ $stsd; 
                                    if($temp > 7){
                                        $cuti_luar_tanggungan = $temp - 7;
                                        $stsd = 7;
                                    } elseif($temp <= 7){
                                        $stsd =$cuti_tahunan+ $stsd;
                                        $cuti_luar_tanggungan = 0;
                                    }
                                    $cuti_tahunan = 0;
                                } elseif($data->stsd == 7 && $data->sisa_cuti_tahunan != 0){
                                    $temp = (int)$data->cuti_tahunan +$cuti_tahunan+ $stsd; 
                                    if($temp > 12){
                                        $cuti_luar_tanggungan = $temp - 12;
                                        $cuti_tahunan = 0;
                                    } elseif($temp <= 12){
                                        $cuti_tahunan =$cuti_tahunan+ $stsd;
                                        $cuti_luar_tanggungan = 0;
                                    }
                                    $stsd = 7;
                                } elseif($data->stsd != 7 && $data->sisa_cuti_tahunan != 0){
                                    $temp1 = (int)$data->cuti_tahunan + $cuti_tahunan; 
                                    if($temp1 > 12){
                                        $temp2 = $temp1 - 12 + $stsd;
                                        if($temp2 > 7){
                                            $cuti_luar_tanggungan = $temp - 7;
                                            $stsd = 7;
                                        } else {
                                            $stsd = $stsd + $cuti_tahunan;
                                            $cuti_luar_tanggungan = 0;
                                        }
                                        $cuti_tahunan = 0;
                                    } else {
                                        $cuti_tahunan = $cuti_tahunan;
                                        $cuti_luar_tanggungan = 0;
                                        $stsd = $stsd;
                                    }
                                }
                            }

                            $get_data = \App\DefaultPresensi::where('id_sidik_jari', '=', $data->id_sidik_jari)->first();

                            $get_data->update([
                                'periode_rekap' => $periode,
                                'ijin' => (int)$data->ijin + $ijin,
                                'jumlah_absen' => (int)$data->jumlah_absen + $jumlah_absen,
                                'cuti_luar_tanggungan' => (int)$data->cuti_luar_tanggungan + $cuti_luar_tanggungan,
                                'cuti_penting' => (int)$data->cuti_penting + $cuti_penting,
                                'dispensasi' => (int)$data->dispensasi + $dispensasi,
                                'sdsd' => (int)$data->sdsd + $sdsd,
                                'stsd' => (int)$data->stsd + $stsd,
                                'cuti_tahunan' => (int)$data->cuti_tahunan + $cuti_tahunan,
                                'sisa_cuti_tahunan' => (int)$data->sisa_cuti_tahunan - $cuti_tahunan,
                            ]);
                        }
                    }
                }

                $notification = array(
                    'message' => 'Data Berhasil di Kalkulasi!',
                    'alert-type' => 'success'
                );

                return back()->with($notification);

            } else {
                $notification = array(
                    'message' => 'Data Tidak Tersedia!',
                    'alert-type' => 'warning'
                );

                return back()->with($notification);

            }

        } else {

            $notification = array(
                'message' => 'Rentang tanggal melebihi kapasitas!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }
    }
}

public function standar_presensi(){

    $data_karyawan = \App\Datakaryawan::all();
    $default_presensi     = \App\DefaultPresensi::all();

    return view('Presensi.standar_presensi' , ['data_karyawan' => $data_karyawan, 'default_presensi' => $default_presensi]);
}

public function delete_standar_presensi ($id_default_presensi) {

    $default_presensi = \App\DefaultPresensi::find($id_default_presensi);
    $default_presensi->delete($default_presensi);


    $notification = array(
        'message' => 'Data Berhasil Dihapus',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);

}

public function update_standar_presensi(Request $request, $id_default_presensi){

    $default_presensi = \App\DefaultPresensi::find($id_default_presensi);
    $default_presensi->update($request->all());

    $notification = array(
        'message' => 'Data Berhasil Diupdate',
        'alert-type' => 'success'
    );

    return back() ->with($notification);

}

public function pengaturan_presensi(){

    $pengaturan_presensi= \App\PengaturanPresensi::find(1);
    return view('Presensi.pengaturan_presensi' , ['pengaturan_presensi' => $pengaturan_presensi]);
}

public function update_pengaturan_presensi(Request $request, $id_pengaturan_presensi){
    $pengaturan_presensi = \App\PengaturanPresensi::find($id_pengaturan_presensi);
    $pengaturan_presensi->update($request->all());

    $notification = array(
        'message' => 'Data Berhasil Diupdate',
        'alert-type' => 'success'
    );

    return back( ) ->with($notification);
}

public function kalkulasi_presensi_harian(){

    return response()->json(['success'=>'done']);

}

public function table_presensi(){

    return view('Presensi.table_view_presensi');

}

public function tampilkan_presensi_(){

    return view('Presensi.table_view_presensi');
}

}