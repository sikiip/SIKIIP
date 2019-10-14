<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use \App\Divisi;
use \App\Presensi;
use \App\DataKaryawan;
use \App\PersetujuanIzin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PersetujuanIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data_formizin = DB::table('persetujuanizin')->leftJoin('datakaryawan', 'persetujuanizin.nik', '=', 'datakaryawan.nik')->get(['persetujuanizin.nik','id_persetujuan_izin','nama_karyawan','divisi', 'tanggal_mulai_izin' , 'tanggal_akhir_izin',
            'tipe_izin', 'alasan_izin', 'keterangan_izin' ]);
        // $data_karyawan = \App\DataKaryawan::all();

        return view('PersetujuanIzin.persetujuan_izin', ['data_formizin' => $data_formizin ]);
    }

    public function izin_diterima_atasan($id_persetujuan_izin){

        $email_hrd     = \App\PengaturanPresensi::find(1);
        
        $default_email_hrd = $email_hrd->email_hrd;
        $data_izin = DB::table('persetujuanizin')->where('id_persetujuan_izin', $id_persetujuan_izin)->update(['keterangan_izin' => 'Diterima']);
        $data_pengizin = \App\PersetujuanIzin::find($id_persetujuan_izin);
        $data_karyawan = \App\DataKaryawan::where('nik', $data_pengizin->nik)->first();
        $divisi_karyawan   = $data_karyawan->divisi;
        $atasan        = \App\Divisi::where('nama_divisi', $divisi_karyawan)->first();
        $nik_atasan    = $atasan->nik;
        $data_atasan   = \App\DataKaryawan::where('nik', $nik_atasan)->first();
        $email_atasan  = $data_atasan->email;

        $data  = array(
                'nama' => $data_karyawan->nama_karyawan,
                'keterangan_izin' => 'Menerima',
                'nama_atasan' => $data_atasan['nama_karyawan'],
                'divisi' =>$data_karyawan->divisi,
                'nik' => $data_karyawan->nik,
                'tanggal_mulai' => $data_pengizin->tanggal_mulai_izin,
                'tanggal_akhir' => $data_pengizin->tanggal_akhir_izin,
                'tipe_izin' => $data_pengizin->tipe_izin,
                'alasan' => $data_pengizin->alasan_izin,
                );

        //Kirim Email Notif ke Atasan
        Mail::send('Email.email_notif_atasan',$data, function($mail) use ($email_atasan)
        {
            $mail->to($email_atasan,  'no-reply')
                 ->subject("Pengajuan Izin");
            $mail->from('refakerr@gmail.com','Admin-SIKIIP');
        });

        //Kirim Email Notif ke HRD
        Mail::send('Email.email_notif2_hrd',$data, function($mail) use ($default_email_hrd)
        {
            $mail->to($default_email_hrd,  'no-reply')
                 ->subject("Pengajuan Izin");
            $mail->from('refakerr@gmail.com','Admin-SIKIIP');
        });

        return redirect()->away('https://mail.google.com');
    }

    public function izin_ditolak_atasan($id_persetujuan_izin){
        
        $email_hrd     = \App\PengaturanPresensi::find(1);
        
        $default_email_hrd = $email_hrd->email_hrd;
        $data_izin = DB::table('persetujuanizin')->where('id_persetujuan_izin', $id_persetujuan_izin)->update(['keterangan_izin' => 'Ditolak']);
        $data_pengizin = \App\PersetujuanIzin::find($id_persetujuan_izin);
        $data_karyawan = \App\DataKaryawan::where('nik', $data_pengizin->nik)->first();
        $divisi_karyawan   = $data_karyawan->divisi;
        $atasan        = \App\Divisi::where('nama_divisi', $divisi_karyawan)->first();
        $nik_atasan    = $atasan->nik;
        $data_atasan   = \App\DataKaryawan::where('nik', $nik_atasan)->first();
        $email_atasan  = $data_atasan->email;

        $data  = array(
                'nama' => $data_karyawan->nama_karyawan,
                'keterangan_izin' => 'Menolak',
                'nama_atasan' => $data_atasan->nama_karyawan,
                'divisi' =>$data_karyawan->divisi,
                'nik' => $data_karyawan->nik,
                'tanggal_mulai' => $data_pengizin->tanggal_mulai_izin,
                'tanggal_akhir' => $data_pengizin->tanggal_akhir_izin,
                'tipe_izin' => $data_pengizin->tipe_izin,
                'alasan' => $data_pengizin->alasan_izin,
                );

        //Kirim Email Notif ke Atasan
        Mail::send('Email.email_notif_atasan',$data, function($mail) use ($email_atasan)
        {
            $mail->to($email_atasan,  'no-reply')
                 ->subject("Pengajuan Izin");
            $mail->from('refakerr@gmail.com','Admin-SIKIIP');
        });

        //Kirim Email Notif ke HRD
        Mail::send('Email.email_notif2_hrd',$data, function($mail) use ($default_email_hrd)
        {
            $mail->to($default_email_hrd,  'no-reply')
                 ->subject("Pengajuan Izin");
            $mail->from('refakerr@gmail.com','Admin-SIKIIP');
        });

        return redirect()->away('https://mail.google.com');
    }

    public function izin_diterima_hr($id_persetujuan_izin){
        
        $data_pengizin = \App\PersetujuanIzin::find($id_persetujuan_izin);
        $data_karyawan = \App\DataKaryawan::where('nik', $data_pengizin->nik)->first();
        $email         = $data_karyawan->email;
        $tanggal_presensi = $data_pengizin->tanggal_mulai_izin;

        $data  = array(
                'nama' => $data_karyawan->nama_karyawan,
                'keterangan_izin' => $data_pengizin->keterangan_izin,
                'divisi' =>$data_karyawan->divisi,
                'nik' => $data_karyawan->nik,
                'tanggal_mulai' => $data_pengizin->tanggal_mulai_izin,
                'tanggal_akhir' => $data_pengizin->tanggal_akhir_izin,
                'tipe_izin' => $data_pengizin->tipe_izin,
                'alasan' => $data_pengizin->alasan_izin,
                );

        if($data_pengizin->tipe_izin == 'Telat'){

            \App\Presensi::create([
                    'id_sidik_jari'      => $data_karyawan->id_sidik_jari,
                    'tanggal_presensi'   => $tanggal_presensi,
                    'info_clock_in'      => $data_pengizin->tipe_izin.' : '.$data_pengizin->alasan_izin,
            ]);

        } else {

            while (strtotime($tanggal_presensi) <= strtotime($data_pengizin->tanggal_akhir_izin)) {
                
                \App\Presensi::create([
                    'id_sidik_jari'    => $data_karyawan->id_sidik_jari,
                    'tanggal_presensi' => $tanggal_presensi,
                    'keterangan_presensi'=> $data_pengizin->tipe_izin.' : '.$data_pengizin->alasan_izin,
            ]);

                $tanggal_presensi = date ("Y-m-d", strtotime("+1 day", strtotime($tanggal_presensi)));
            }

        }
            

        //Kirim Email Notif ke Atasan
        Mail::send('Email.email_notif_pengaju',$data, function($mail) use ($email)
        {
            $mail->to($email,  'no-reply')
                 ->subject("Pengajuan Izin");
            $mail->from('refakerr@gmail.com','Admin-SIKIIP');
        });

        $data_pengizin->delete($data_pengizin);

        $notification = array(
            'message' => 'Email Berhasil Dikirim',
            'alert-type' => 'success'
        );

        return back()->with($notification); 
    }

    public function izin_ditolak_hr($id_persetujuan_izin){
        
        $data_pengizin = \App\PersetujuanIzin::find($id_persetujuan_izin);
        $data_karyawan = \App\DataKaryawan::where('nik', $data_pengizin->nik)->first();
        $email         = $data_karyawan->email;

        $data  = array(
                'nama' => $data_karyawan->nama_karyawan,
                'keterangan_izin' => $data_pengizin->keterangan_izin,
                'divisi' =>$data_karyawan->divisi,
                'nik' => $data_karyawan->nik,
                'tanggal_mulai' => $data_pengizin->tanggal_mulai_izin,
                'tanggal_akhir' => $data_pengizin->tanggal_akhir_izin,
                'tipe_izin' => $data_pengizin->tipe_izin,
                'alasan' => $data_pengizin->alasan_izin,
                );


        //Kirim Email Notif ke Atasan
        Mail::send('Email.email_notif_pengaju',$data, function($mail) use ($email)
        {
            $mail->to($email,  'no-reply')
                 ->subject("Pengajuan Izin");
            $mail->from('refakerr@gmail.com','Admin-SIKIIP');
        });

        $data_pengizin->delete($data_pengizin);

        $notification = array(
            'message' => 'Email Berhasil Dikirim',
            'alert-type' => 'success'
        );

        return back()->with($notification); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
