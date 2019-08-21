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
	Route::get('/datakaryawan', 'DatakaryawanController@index')->name('datakaryawan');
	Route::get('/datakaryawan/{nik}/rincian', 'DatakaryawanController@rincian');
	Route::get('/datakaryawan/{id}/delete/data_karyawan', 'DatakaryawanController@delete_data_karyawan')->name('delete_data_karyawan');
	Route::post('/datakaryawan/checknik', 'DatakaryawanController@checknik')->name('nik_available.check');
	Route::post('/datakaryawan/checkemail', 'DatakaryawanController@checkemail')->name('email_available.check');
	Route::post('/datakaryawan/tambah_karyawan', 'DatakaryawanController@tambah_data_karyawan')->name('tambah_data_karyawan');

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

	/*Penggajian*/
	Route::get('/penggajian', 'PenggajianController@index');

	/*persetujuan Izin*/
	Route::get('/persetujuan_izin', 'PersetujuanIzinController@index');

	/*Profil*/
	Route::get('/profil', 'ProfilController@index');
	Route::get('/edit', 'ProfilController@Edit');

	/*Gaji*/
	Route::get('/gaji', 'GajiController@index');

	/*Kontak Karyawab*/
	Route::get('/kontak_karyawan', 'KontakKaryawanController@index');

	/*Form Izin*/
	Route::get('/form_izin', 'FormIzinController@index');

});