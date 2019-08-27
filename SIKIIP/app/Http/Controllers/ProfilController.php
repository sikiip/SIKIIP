<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Profil.profil');    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit_data_pribadi($nik){
            $nik = 160196;
            $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
            return view('Profil.profil_edit_data_pribadi', ['data_karyawan' => $data_karyawan]);

             // return view('Profil.profil_edit_data_pribadi');
    }

        public function edit_data_keluarga($nik){
            $nik = 160196;
            $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
            $data_familia  = \App\DataFamilia::where('nik',$nik)->get();
            return view('Profil.profil_edit_data_keluarga', ['data_karyawan' => $data_karyawan , 'data_familia' => $data_familia]);
    }

        public function edit_data_pendidikan($nik){
             $nik = 160196;
            $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
            $riwayat_pendidikan = \App\RiwayatPendidikan::where('nik',$nik)->get();
            $foto_ijazah_sertifikat = \App\RiwayatPendidikan::where('nik',$nik)->get(['foto_ijazah_sertifikat','id_riwayat_pendidikan']);
            return view('Profil.profil_edit_data_pendidikan', ['data_karyawan' => $data_karyawan , 'riwayat_pendidikan' => $riwayat_pendidikan , 'foto_ijazah_sertifikat' => $foto_ijazah_sertifikat]);
    }

        public function edit_data_riwayat_pekerjaan($nik){
             $nik = 160196;
            $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
            $riwayat_pekerjaan = \App\RiwayatPekerjaan::where('nik',$nik)->get();
            $foto_verklarin = \App\RiwayatPekerjaan::where('nik',$nik)->get(['foto_verklarin','id_riwayat_pekerjaan']);
            return view('Profil.profil_edit_data_riwayat_pekerjaan', ['data_karyawan' => $data_karyawan, 'riwayat_pekerjaan' => $riwayat_pekerjaan, 'foto_verklarin' => $foto_verklarin]);
    }

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
