<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']],function(){

	Route::get('/home', 'BerandaController@index')->name('beranda');

	/*Data Karyawan*/
	Route::get('/datakaryawan', 'DatakaryawanController@index');
	Route::get('/datakaryawan/{nik}/rincian', 'DatakaryawanController@rincian');

	Route::post('/datakaryawan/check_nik', 'DatakaryawanController@check_nik')->name('nik_available.check');
	Route::post('/datakaryawan/check_email', 'DatakaryawanController@check_email')->name('email_available.check');
	Route::post('/datakaryawan/check_id_sidik_jari', 'DatakaryawanController@check_id_sidik_jari')->name('id_sidik_jari_available.check');

	Route::post('/datakaryawan/tambah_karyawan', 'DatakaryawanController@tambah_data_karyawan')->name('tambah_data_karyawan');
	Route::get('/datakaryawan/{id}/delete/data_karyawan', 'DatakaryawanController@delete_data_karyawan')->name('delete_data_karyawan');

	Route::get('/datakaryawan/{nik}/edit/data_pribadi', 'DatakaryawanController@edit_data_pribadi')->name('edit_data_pribadi');
	Route::get('/datakaryawan/{nik}/edit/data_keluarga', 'DatakaryawanController@edit_data_keluarga')->name('edit_data_keluarga');
	Route::get('/datakaryawan/{nik}/edit/data_pendidikan', 'DatakaryawanController@edit_data_pendidikan')->name('edit_data_pendidikan');
	Route::get('/datakaryawan/{nik}/edit/data_riwayat_pekerjaan', 'DatakaryawanController@edit_data_riwayat_pekerjaan')->name('edit_data_riwayat_pekerjaan');

	Route::post('/datakaryawan/{id}/update/data_pribadi', 'DatakaryawanController@update_data_pribadi')->name('update_data_pribadi');

	Route::post('/datakaryawan/tambah/update/data_familia', 'DatakaryawanController@tambah_data_familia')->name('tambah_data_familia');
	Route::post('/datakaryawan/{id}/update/data_familia', 'DatakaryawanController@update_data_familia')->name('update_data_familia');
	Route::get('/datakaryawan/{id}/delete/data_familia', 'DatakaryawanController@delete_data_familia')->name('delete_data_familia');

	Route::post('/datakaryawan/tambah/update/data_pendidikan', 'DatakaryawanController@tambah_data_pendidikan')->name('tambah_data_pendidikan');
	Route::post('/datakaryawan/{id}/update/data_pendidikan','DatakaryawanController@update_data_pendidikan')->name('update_data_pendidikan');
	Route::get('/datakaryawan/{id}/delete/data_pendidikan', 'DatakaryawanController@delete_data_pendidikan')->name('delete_data_pendidikan');

	Route::post('/datakaryawan/tambah/update/data_riwayat_pekerjaan', 'DatakaryawanController@tambah_data_pekerjaan')->name('tambah_data_pekerjaan');
	Route::post('/datakaryawan/{id}/update/data_riwayat_pekerjaan','DatakaryawanController@update_data_pekerjaan')->name('update_data_pekerjaan');
	Route::get('/datakaryawan/{id}/delete/data_riwayat_pekerjaan', 'DatakaryawanController@delete_data_pekerjaan')->name('delete_data_pekerjaan');
	
	
	/*Presensi*/
	Route::get('/presensi', 'PresensiController@index');
	Route::post('/presensi/import_file', 'PresensiController@import_file');
	Route::post('/presensi/tampilkan_presensi', 'PresensiController@tampilkan_presensi');
	Route::post('/presensi/check_tanggal_tampilkan', 'PresensiController@tanggal_tampilkan_presensi')->name('tanggal_available.check');
	Route::post('/presensi/{id}/update/clock_in', 'PresensiController@update_clock_in')->name('update_clock_in');

	/*Penggajian*/
	Route::get('/penggajian', 'PenggajianController@index');

	/*persetujuan Izin*/
	Route::get('/persetujuan_izin', 'PersetujuanIzinController@index');

	/*Profil*/
	Route::get('/profil', 'ProfilController@index');
	Route::get('/edit', 'ProfilController@Edit');

	Route::get('/profil/{nik}/edit/data_pribadi', 'ProfilController@edit_data_pribadi')->name('edit_data_pribadi');
	Route::get('/profil/{nik}/edit/data_keluarga', 'ProfilController@edit_data_keluarga')->name('edit_data_keluarga');
	Route::get('/profil/{nik}/edit/data_pendidikan', 'ProfilController@edit_data_pendidikan')->name('edit_data_pendidikan');
	Route::get('/profil/{nik}/edit/data_riwayat_pekerjaan', 'ProfilController@edit_data_riwayat_pekerjaan')->name('edit_data_riwayat_pekerjaan');

	Route::post('/profil/{id}/update/data_pribadi', 'ProfilController@update_data_pribadi')->name('update_data_pribadi');

	Route::post('/profil/tambah/update/data_familia', 'ProfilController@tambah_data_familia')->name('tambah_data_familia');
	Route::post('/profil/{id}/update/data_familia', 'ProfilController@update_data_familia')->name('update_data_familia');
	Route::get('/profil/{id}/delete/data_familia', 'ProfilController@delete_data_familia')->name('delete_data_familia');

	Route::post('/profil/tambah/update/data_pendidikan', 'ProfilController@tambah_data_pendidikan')->name('tambah_data_pendidikan');
	Route::post('/profil/{id}/update/data_pendidikan','ProfilController@update_data_pendidikan')->name('update_data_pendidikan');
	Route::get('/profil/{id}/delete/data_pendidikan', 'ProfilController@delete_data_pendidikan')->name('delete_data_pendidikan');

	Route::post('/profil/tambah/update/data_riwayat_pekerjaan', 'ProfilController@tambah_data_pekerjaan')->name('tambah_data_pekerjaan');
	Route::post('/profil/{id}/update/data_riwayat_pekerjaan','ProfilController@update_data_pekerjaan')->name('update_data_pekerjaan');
	Route::get('/profil/{id}/delete/data_riwayat_pekerjaan', 'ProfilController@delete_data_pekerjaan')->name('delete_data_pekerjaan');
	

	/*Gaji*/
	Route::get('/gaji', 'GajiController@index');

	/*Kontak Karyawab*/
	Route::get('/kontak_karyawan', 'KontakKaryawanController@index');

	/*Form Izin*/
	Route::get('/form_izin', 'FormIzinController@index');

});