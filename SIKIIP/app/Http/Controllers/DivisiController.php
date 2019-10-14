<?php

namespace App\Http\Controllers;

use DB;
use App\Divisi;
use Illuminate\Support\Facades\Mail;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Input;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_karyawan = \App\DataKaryawan::all();
        $data_divisi   = \App\Divisi::all();

        foreach ($data_divisi as $key => $value) {

            $data = preg_split('/\,/', $value->nik);
            $count_data = count($data);

            if($count_data > 1) {
                $i = 0;
                $nama_atasan = array();
                $email_atasan = array();
                while($i < $count_data){
                    $data_karyawan = \App\DataKaryawan::where('nik',$data[$i])->first();
                    $nama_atasan[$i] = $data_karyawan['nama_karyawan'];
                    $email_atasan[$i] = $data_karyawan['email'];
                    $i++;
                }

                $nama_atasan = implode(',', $nama_atasan);
                $email_atasan = implode(',', $email_atasan);
                
            } else {

                $data_karyawan = \App\DataKaryawan::where('nik',$data)->first();
                $nama_atasan = $data_karyawan['nama_karyawan'];
                $email_atasan = $data_karyawan['email'];

            }

            $divisi[] = ([
                'id_divisi'   => $value->id_divisi,
                'nama_divisi' => $value->nama_divisi,
                'nik'         => $value->nik,
                'nama_atasan' => $nama_atasan,
                'email'       => $email_atasan,
           ]);

        }

        return view('Divisi.divisi' , ['divisi' => $divisi]);

    }

     public function tambah_divisi (Request $request)
    {
        
        \App\Divisi::create([
            'nama_divisi' => $request->nama_divisi,
            'nik' => $request->nik,
            
        ]);

        $notification = array(
            'message' => 'Data Berhasil Diinput',
            'alert-type' => 'success'
        );

        return back( ) ->with($notification);


    }

    public function delete_divisi($id_divisi) {

        $divisi = \App\Divisi::find($id_divisi);
        $divisi->delete($divisi);


        $notification = array(
            'message' => 'Data Berhasil Dihapus',
            'alert-type' => 'success'
        );

        return back( ) ->with($notification);


        // $divisi = \App\Divisi::find($id_divisi);
        // return view('divisi/edit', ['divisi' => $divisi]);

    }

    public function update_divisi(Request $request, $id_divisi){
        $divisi = \App\Divisi::find($id_divisi);
        $divisi->update($request->all());

        $notification = array(
            'message' => 'Data Berhasil Diupdate',
            'alert-type' => 'success'
        );

        return back( ) ->with($notification);

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
