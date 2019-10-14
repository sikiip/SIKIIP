<?php

namespace App\Http\Controllers;

use DB;
use File;
use HTML;
use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {   
        $data_karyawan = \App\Datakaryawan::where('id',$id)->first();
        $nik = $data_karyawan->nik;
        $data_familia = \App\DataFamilia::where('nik', $nik)->get();
        $riwayat_pendidikan = \App\RiwayatPendidikan::where('nik',$nik)->get();
        $foto_ijazah_sertifikat = \App\RiwayatPendidikan::where('nik',$nik)->get(['foto_ijazah_sertifikat','id_riwayat_pendidikan']);
        $riwayat_pekerjaan = \App\RiwayatPekerjaan::where('nik',$nik)->get();
        $foto_verklarin = \App\RiwayatPekerjaan::where('nik',$nik)->get(['foto_verklarin','id_riwayat_pekerjaan']);
        return view('Profil.profil', ['data_karyawan' => $data_karyawan, 'data_familia' => $data_familia, 'riwayat_pendidikan' => $riwayat_pendidikan, 'foto_ijazah_sertifikat' => $foto_ijazah_sertifikat, 'riwayat_pekerjaan' => $riwayat_pekerjaan, 'foto_verklarin' => $foto_verklarin]);

        //return view('Profil.profil');    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit_data_pribadi($nik){
        $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
            //dd($data_karyawan);
        return view('Profil.profil_edit_data_pribadi', ['data_karyawan' => $data_karyawan]);
    }

    public function edit_data_keluarga($nik){
        $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
        $data_familia  = \App\DataFamilia::where('nik',$nik)->get();
        return view('Profil.profil_edit_data_keluarga', ['data_karyawan' => $data_karyawan , 'data_familia' => $data_familia]);
    }

    public function edit_data_pendidikan($nik){
        $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
        $riwayat_pendidikan = \App\RiwayatPendidikan::where('nik',$nik)->get();
        $foto_ijazah_sertifikat = \App\RiwayatPendidikan::where('nik',$nik)->get(['foto_ijazah_sertifikat','id_riwayat_pendidikan']);
        return view('Profil.profil_edit_data_pendidikan', ['data_karyawan' => $data_karyawan , 'riwayat_pendidikan' => $riwayat_pendidikan , 'foto_ijazah_sertifikat' => $foto_ijazah_sertifikat]);
    }

    public function edit_data_riwayat_pekerjaan($nik){
        $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
        $riwayat_pekerjaan = \App\RiwayatPekerjaan::where('nik',$nik)->get();
        $foto_verklarin = \App\RiwayatPekerjaan::where('nik',$nik)->get(['foto_verklarin','id_riwayat_pekerjaan']);
        return view('Profil.profil_edit_data_riwayat_pekerjaan', ['data_karyawan' => $data_karyawan, 'riwayat_pekerjaan' => $riwayat_pekerjaan, 'foto_verklarin' => $foto_verklarin]);
    }


    public function update_data_pribadi(Request $request, $id){
            //Update data
        $data_karyawan = \App\Datakaryawan::find($id);
        $data_user     = \App\User::find($id);

        if($request->password == null){

        } else {

            $data_user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $data_karyawan->update($request->all());


        if ($request->hasFile('foto_karyawan')) {
                //Foto karyawan
            $request->file('foto_karyawan')->move(public_path().'/image/FotoKaryawan/', $request->file('foto_karyawan')->getClientOriginalName());
            $data_karyawan->foto_karyawan = $request->file('foto_karyawan')->getClientOriginalName();
                //save image
            $data_karyawan->save();
        }

        if ($request->hasFile('foto_kk')) {
                //Foto karyawan
            $request->file('foto_kk')->move(public_path().'/image/KKKTP/', $request->file('foto_kk')->getClientOriginalName());
            $data_karyawan->foto_kk = $request->file('foto_kk')->getClientOriginalName();
                //save image
            $data_karyawan->save();
        }

        if ($request->hasFile('foto_ktp')) {
                //Foto karyawan
            $request->file('foto_ktp')->move(public_path().'/image/KKKTP/', $request->file('foto_ktp')->getClientOriginalName());
            $data_karyawan->foto_ktp = $request->file('foto_ktp')->getClientOriginalName();
                //save image
            $data_karyawan->save();
        }

        if ($request->hasFile('foto_bpjs_ketenagakerjaan')) {
                //Foto karyawan
            $request->file('foto_bpjs_ketenagakerjaan')->move(public_path().'/image/BPJS/', $request->file('foto_bpjs_ketenagakerjaan')->getClientOriginalName());
            $data_karyawan->foto_bpjs_ketenagakerjaan = $request->file('foto_bpjs_ketenagakerjaan')->getClientOriginalName();
                //save image
            $data_karyawan->save();
        }

        if ($request->hasFile('foto_bpjs_kesehatan')) {
                //Foto karyawan
            $request->file('foto_bpjs_kesehatan')->move(public_path().'/image/BPJS/', $request->file('foto_bpjs_kesehatan')->getClientOriginalName());
            $data_karyawan->foto_bpjs_kesehatan = $request->file('foto_bpjs_kesehatan')->getClientOriginalName();
                //save image
            $data_karyawan->save();
        }

        if ($request->hasFile('foto_npwp')) {
                //Foto karyawan
            $request->file('foto_npwp')->move(public_path().'/image/NPWP/', $request->file('foto_npwp')->getClientOriginalName());
            $data_karyawan->foto_npwp = $request->file('foto_npwp')->getClientOriginalName();
                //save image
            $data_karyawan->save();
        }

            //ambil NIK
        $nik = \App\Datakaryawan::where('id', $id)->get('nik');
        $nik = $nik['0'];
        $nik = $nik['nik'];

            //notifikasi untuk toastr ketika password atau username salah
        $notification = array(
            'message' => 'Data Berhasil di Simpan!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);

    }

    public function update_data_familia(Request $request, $id) {

        $data_familia = \App\DataFamilia::find($id);
        $data_familia->update($request->all());


            //notifikasi untuk toastr ketika data berhasil di ubah
        $notification = array(
            'message' => 'Data Berhasil di Ubah!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);

    }

    public function tambah_data_familia(Request $request){

        \App\DataFamilia::create($request->all());

            //notifikasi untuk toastr ketika tambah data berhasil
        $notification = array(
            'message' => 'Data Berhasil di Tambah!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);

    }

    public function delete_data_familia($id){
        $data_familia = \App\DataFamilia::find($id);
        $data_familia->delete($data_familia);

            //notifikasi untuk toastr ketika data berhasil di hapus
        $notification = array(
            'message' => 'Data Berhasil di Hapus!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);
    }

    public function update_data_pendidikan(Request $request, $id) {

        $data_pendidikan = \App\RiwayatPendidikan::find($id);
        $data_pendidikan->update($request->all());

        if ($request->hasFile('foto_ijazah_sertifikat')) {
                //Foto karyawan
            $request->file('foto_ijazah_sertifikat')->move(public_path().'/image/IjazahSertifikat/', $request->file('foto_ijazah_sertifikat')->getClientOriginalName());
            $data_pendidikan->foto_ijazah_sertifikat = $request->file('foto_ijazah_sertifikat')->getClientOriginalName();
                //save image
            $data_pendidikan->save();
        }

        $notification = array(
            'message' => 'Data Berhasil di Ubah!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);
    }

    public function tambah_data_pendidikan(Request $request){

        if ($request->hasFile('foto_ijazah_sertifikat')) {
            $request = $request->all();

                //Foto karyawan
            $request['foto_ijazah_sertifikat']->move(public_path().'/image/IjazahSertifikat/', $request['foto_ijazah_sertifikat']->getClientOriginalName());
            $request['foto_ijazah_sertifikat'] = $request['foto_ijazah_sertifikat']->getClientOriginalName();
                //save image


            \App\RiwayatPendidikan::create($request);

            $notification = array(
                'message' => 'Data Berhasil di Simpan!',
                'alert-type' => 'success' 
            );

            return back()->with($notification);

        } else {

            $notification = array(
                'message' => 'Data Gagal di Simpan!',
                'alert-type' => 'error' 
            );

            return back()->with($notification);
        }
    }

    public function delete_data_pendidikan($id){
        $data_pendidikan = \App\RiwayatPendidikan::find($id);
        $data_pendidikan->delete($data_pendidikan);

        $notification = array(
            'message' => 'Data Berhasil di Hapus!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);

    }

    public function update_data_pekerjaan(Request $request, $id) {
            // dd($request->all());
        $data_pekerjaan = \App\RiwayatPekerjaan::find($id);
        $data_pekerjaan->update($request->all());

        if ($request->hasFile('foto_verklarin')) {
                //Foto karyawan
            $request->file('foto_verklarin')->move(public_path().'/image/Verklarin/', $request->file('foto_verklarin')->getClientOriginalName());
            $data_pekerjaan->foto_verklarin = $request->file('foto_verklarin')->getClientOriginalName();
                //save image
            $data_pekerjaan->save();
        }

        $notification = array(
            'message' => 'Data Berhasil di Ubah!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);

    }

    public function tambah_data_riwayat_pekerjaan(Request $request){

        if ($request->hasFile('foto_verklarin')) {
            $request = $request->all();
            
                //Foto karyawan
            $request['foto_verklarin']->move(public_path().'/image/Verklarin/', $request['foto_verklarin']->getClientOriginalName());
            $request['foto_verklarin'] = $request['foto_verklarin']->getClientOriginalName();
                //save image

            \App\RiwayatPekerjaan::create($request);

            $notification = array(
                'message' => 'Data Berhasil di Simpan!',
                'alert-type' => 'success' 
            );

            return back()->with($notification);

        } else {

            $notification = array(
                'message' => 'Data Gagal di Simpan!',
                'alert-type' => 'error' 
            );

            return back()->with($notification);
        }

    }

    public function delete_data_pekerjaan($id){
        $data_pekerjaan = \App\RiwayatPekerjaan::find($id);
        $data_pekerjaan->delete($data_pekerjaan);

        $notification = array(
            'message' => 'Data Berhasil di Ubah!',
            'alert-type' => 'success' 
        );

        return back()->with($notification);
    }

    public function imageCropPost(Request $request)
    {

        $data_user     = \App\User::find($request->id);

        $data = $request->image;

        list($type, $data) = explode(';', $data);

        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);

        $image_name= time().'300x300'.'.png';

        $path = public_path() . "/image/FotoProfil/" . $image_name;

        file_put_contents($path, $data);

        $data_user->foto_profil = $image_name;

        $data_user->save();

        return response()->json(['success'=>'done']);

    }
}
