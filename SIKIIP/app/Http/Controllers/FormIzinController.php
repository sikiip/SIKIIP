<?php

namespace App\Http\Controllers;

use DB;
use App\Divisi;
use App\PersetujuanIzin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FormIzinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_formizin = \App\PersetujuanIzin::all();

        return view('FormIzin.form_izin', ['data_formizin' => $data_formizin]);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function ajukan_izin (Request $request , $id)
    {
        $default = \App\PengaturanPresensi::find(1);
        $default_email_hrd = $default->email_hrd;
        $data_karyawan     = \App\DataKaryawan::find($id);
        $divisi_karyawan   = $data_karyawan->divisi;
        $atasan            = \App\Divisi::where('nama_divisi', $divisi_karyawan)->first();
        $data_             = preg_split('/\,/', $atasan['nik']);
        $count_data        = count($data_);

        \App\PersetujuanIzin::create([
            'nik' => $data_karyawan->nik,
            'tanggal_mulai_izin' => $request->tanggal_mulai_izin,
            'tanggal_akhir_izin' => $request->tanggal_akhir_izin,
            'tipe_izin' => $request->tipe_izin,
            'alasan_izin' => $request->alasan_izin,
            'keterangan_izin' => 'Diproses',
        ]);

        $last = DB::table('persetujuanizin')->latest('id_persetujuan_izin')->first();

        if($count_data > 1) {
            $i = 0;
            while($i < $count_data){
                $data_atasan  = \App\DataKaryawan::where('nik',$data_[$i])->first();
                $email_atasan = $data_atasan['email'];

                $data  = array(
                    'nama' => $data_karyawan['nama_karyawan'],
                    'id_persetujuan_izin' => $last->id_persetujuan_izin,
                    'nama_atasan' => $data_atasan['nama_karyawan'],
                    'divisi' =>$data_karyawan['divisi'],
                    'nik' => $data_karyawan['nik'],
                    'tanggal_mulai' => $request->tanggal_mulai_izin,
                    'tanggal_akhir' => $request->tanggal_akhir_izin,
                    'tipe_izin' => $request->tipe_izin,
                    'alasan' => $request->alasan_izin,
                );

                //Kirim Email
                Mail::send('Email.send_email_izin',$data, function($mail) use ($email_atasan)
                {
                    $mail->to($email_atasan,  'no-reply')
                    ->subject("Pengajuan Izin");
                    $mail->from('refakerr@gmail.com','Admin-SIKIIP');
                });

                $i++;
            }

        } else {

            $data_atasan  = \App\DataKaryawan::where('nik',$data_)->first();
            $email_atasan = $data_atasan['email'];

            $data  = array(
                'nama' => $data_karyawan['nama_karyawan'],
                'id_persetujuan_izin' => $last->id_persetujuan_izin,
                'nama_atasan' => $data_atasan['nama_karyawan'],
                'divisi' =>$data_karyawan['divisi'],
                'nik' => $data_karyawan['nik'],
                'tanggal_mulai' => $request->tanggal_mulai_izin,
                'tanggal_akhir' => $request->tanggal_akhir_izin,
                'tipe_izin' => $request->tipe_izin,
                'alasan' => $request->alasan_izin,
            );

            //Kirim Email
            Mail::send('Email.send_email_izin',$data, function($mail) use ($email_atasan)
            {
                $mail->to($email_atasan,  'no-reply')
                ->subject("Pengajuan Izin");
                $mail->from('refakerr@gmail.com','Admin-SIKIIP');
            });

        }

        //Kirim Email Notif ke HRD
        Mail::send('Email.email_notif1_hrd',$data, function($mail) use ($default_email_hrd)
        {
            $mail->to($default_email_hrd,  'no-reply')
            ->subject("Pengajuan Izin");
            $mail->from('refakerr@gmail.com','Admin-SIKIIP');
        });

        //Cek Error
        if(Mail::failures()) 
        {
            $notification = array(
                'message' => 'Email Gagal Dikirim!',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        } else {

            $notification = array(
                'message' => 'Email Berhasil Dikirim',
                'alert-type' => 'success'
            );

            return back()->with($notification);   
        }

    }       

}
