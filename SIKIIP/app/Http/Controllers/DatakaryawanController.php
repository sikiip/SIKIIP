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

class DatakaryawanController extends Controller
{

    public function index(){

        // $data_karyawan = DB::table('dataKaryawan')
        //        ->leftJoin('riwayatpendidikan', 'datakaryawan.nik', '=', 'riwayatpendidikan.nik')
        //        ->get();

    	$data_karyawan = \App\DataKaryawan::all();
        $riwayat_pendidikan = \App\RiwayatPendidikan::all();
    	
        return view('Datakaryawan.Datakaryawan', ['data_karyawan' => $data_karyawan, 'riwayat_pendidikan' => $riwayat_pendidikan]);
    }

        public function rincian($nik){
        	$data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
        	$data_familia  = \App\DataFamilia::where('nik',$nik)->get();
        	$riwayat_pendidikan = \App\RiwayatPendidikan::where('nik',$nik)->get();
        	$riwayat_pekerjaan = \App\RiwayatPekerjaan::where('nik',$nik)->get();
        	$foto_ijazah_sertifikat = \App\RiwayatPendidikan::where('nik',$nik)->get(['foto_ijazah_sertifikat','id_riwayat_pendidikan']);
        	$foto_verklarin = \App\RiwayatPekerjaan::where('nik',$nik)->get(['foto_verklarin','id_riwayat_pekerjaan']);
          	return view('Datakaryawan.datakaryawan_rincian', ['data_karyawan' => $data_karyawan , 'data_familia' => $data_familia, 'riwayat_pekerjaan' => $riwayat_pekerjaan, 'riwayat_pendidikan' => $riwayat_pendidikan, 'foto_ijazah_sertifikat' => $foto_ijazah_sertifikat, 'foto_verklarin' => $foto_verklarin]);
    }

        public function check_nik(Request $request){
            if($request->get('nik')){
                $nik = $request->get('nik');
                $data = DB::Table("dataKaryawan")->where('nik', $nik)->count();
                if($data > 0){
                    echo 'not_unique';
                } else {
                    echo 'unique';
                }
            }
    }

        public function check_email(Request $request){
            if($request->get('email')){
                $email = $request->get('email');
                $data = DB::Table("dataKaryawan")->where('email', $email)->count();
                if($data > 0){
                    echo 'not_unique';
                } else {
                    echo 'unique';
                }
            }
    }

            public function check_id_sidik_jari(Request $request){
            if($request->get('id_sidik_jari')){
                $id_sidik_jari = $request->get('id_sidik_jari');
                $data = DB::Table("dataKaryawan")->where('id_sidik_jari', $id_sidik_jari)->count();
                if($data > 0){
                    echo 'not_unique';
                } else {
                    echo 'unique';
                }
            }
    }

        public function tambah_data_karyawan(Request $request){
            
            \App\DataKaryawan::create($request->all());

            $request = $request->all();

            \App\User::create([
            'nama_karyawan' => $request['nama_karyawan'],
            'email' => $request['email'],
            'role' => $request['role'],
            'password' => Hash::make($request['password']),
            ]);
            
            //notifikasi untuk toastr ketika password atau username salah
            $notification = array(
                'message' => 'Data Berhasil di Simpan!',
                'alert-type' => 'success' 
            );

            return back()->with($notification);
    }

        public function delete_data_karyawan($id){
            $users = \App\User::find($id);
            $users->delete($users);
            $data_karyawan = \App\DataKaryawan::find($id);
            $nik = $data_karyawan->nik;
            $data_karyawan->delete($data_karyawan);
            $data_familia = \App\DataFamilia::find($nik);
            $data_pendidikan = \App\RiwayatPendidikan::find($nik);
            $data_pekerjaan = \App\RiwayatPekerjaan::find($nik);
            if($data_familia){
                $data_familia->delete($data_familia);
            }
            
            if($data_pendidikan){
                $data_pendidikan->delete($data_pendidikan);
            }
            
            if($data_pekerjaan){
                $data_pekerjaan->delete($data_pekerjaan);
            }
            
            //notifikasi untuk toastr ketika password atau username salah
            $notification = array(
                'message' => 'Data Berhasil di Hapus!',
                'alert-type' => 'success' 
            );

            return back()->with($notification);
    }

        public function edit_data_pribadi($nik){
        	$data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
          	return view('Datakaryawan.datakaryawan_edit_data_pribadi', ['data_karyawan' => $data_karyawan]);
    }

        public function edit_data_keluarga($nik){
            $data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
        	$data_familia  = \App\DataFamilia::where('nik',$nik)->get();
          	return view('Datakaryawan.datakaryawan_edit_data_keluarga', ['data_karyawan' => $data_karyawan , 'data_familia' => $data_familia]);
    }

        public function edit_data_pendidikan($nik){
        	$data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
        	$riwayat_pendidikan = \App\RiwayatPendidikan::where('nik',$nik)->get();
            $foto_ijazah_sertifikat = \App\RiwayatPendidikan::where('nik',$nik)->get(['foto_ijazah_sertifikat','id_riwayat_pendidikan']);
          	return view('Datakaryawan.datakaryawan_edit_data_pendidikan', ['data_karyawan' => $data_karyawan , 'riwayat_pendidikan' => $riwayat_pendidikan , 'foto_ijazah_sertifikat' => $foto_ijazah_sertifikat]);
    }

        public function edit_data_riwayat_pekerjaan($nik){
        	$data_karyawan = \App\Datakaryawan::where('nik',$nik)->first();
        	$riwayat_pekerjaan = \App\RiwayatPekerjaan::where('nik',$nik)->get();
            $foto_verklarin = \App\RiwayatPekerjaan::where('nik',$nik)->get(['foto_verklarin','id_riwayat_pekerjaan']);
          	return view('Datakaryawan.datakaryawan_edit_data_riwayat_pekerjaan', ['data_karyawan' => $data_karyawan, 'riwayat_pekerjaan' => $riwayat_pekerjaan, 'foto_verklarin' => $foto_verklarin]);
    }

        public function update_data_pribadi(Request $request, $id){

            //Update data
            $data_karyawan = \App\Datakaryawan::find($id);
           
            $data_karyawan->update($request->all());

            //Update Email Pada Table users
            $email  = $request->input('email'); 

            User::where('id', $id)->update([
                        'email' => $email,                
            ]);


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

            if ($request->hasFile('foto_bpjs')) {
                //Foto karyawan
                $request->file('foto_bpjs')->move(public_path().'/image/BPJS/', $request->file('foto_bpjs')->getClientOriginalName());
                $data_karyawan->foto_bpjs = $request->file('foto_bpjs')->getClientOriginalName();
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

        public function tambah_data_pekerjaan(Request $request){
            
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
}
