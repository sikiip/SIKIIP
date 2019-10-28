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

use Illuminate\Http\Request;

Route::get('/', function () {
	return redirect('/login');
});

Auth::routes();

Route::group(['middleware' => ['auth']],function(){

	Route::get('/home', 'BerandaController@index')->name('beranda');

	/*Data Karyawan*/
	Route::get('/datakaryawan', 'DatakaryawanController@index');
	Route::get('/datakaryawan/{nik}/rincian', 'DatakaryawanController@rincian');
	Route::get('/pengaturan_data_karyawan', 'DatakaryawanController@pengaturan_data_karyawan');

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

	Route::post('/datakaryawan/tambah/update/data_riwayat_pekerjaan','DatakaryawanController@tambah_data_pekerjaan')->name('tambah_data_pekerjaan');
	Route::post('/datakaryawan/{id}/update/data_riwayat_pekerjaan','DatakaryawanController@update_data_pekerjaan')->name('update_data_pekerjaan');
	Route::get('/datakaryawan/{id}/delete/data_riwayat_pekerjaan', 'DatakaryawanController@delete_data_pekerjaan')->name('delete_data_pekerjaan');
	Route::any('/datakaryawan/pengaturan_password', 'DatakaryawanController@pengaturan_password')->name('pengaturan_password');

	/*Presensi*/
	Route::get('/presensi', 'PresensiController@index')->name('presensi');
	Route::get('/standar_presensi', 'PresensiController@standar_presensi');
	Route::get('/pengaturan_presensi', 'PresensiController@pengaturan_presensi');
	Route::post('/presensi/import_file', 'PresensiController@import_file');
	Route::post('/presensi/rekap', 'PresensiController@kalkulasi_presensi');
	Route::get('/presensi/kalkulasi_presensi_harian', 'PresensiController@kalkulasi_presensi_harian')->name('kalkulasi_presensi_harian');
	Route::any('/presensi/tampilkan_presensi', 'PresensiController@tampilkan_presensi');
	Route::any('/presensi/{id_sidik_jari}/calendar', 'PresensiController@presensi_Calendar');
	Route::get('/presensi/table_presensi', 'PresensiController@table_presensi');

	Route::post('/presensi/calendar/update_presensi', 'PresensiController@update_presensi_Calendar_presensi')->name('update_presensi_Calendar_presensi');
	Route::post('/presensi/calendar/update_absen', 'PresensiController@update_presensi_Calendar_absen')->name('update_presensi_Calendar_absen');
	Route::post('/presensi/calendar/tambah_presensi', 'PresensiController@tambah_presensi_Calendar_presensi')->name('tambah_presensi_Calendar_absen');
	Route::post('/presensi/calendar/tambah_absen', 'PresensiController@tambah_presensi_Calendar_absen')->name('tambah_presensi_Calendar_absen');
	Route::post('/presensi/calendar/hapus_presensi_absen', 'PresensiController@hapus_presensi_absen')->name('hapus_presensi_absen');

	Route::post('/presensi/{id_presensi}/update', 'PresensiController@update_presensi')->name('update_presensi');
	Route::get('/presensi/{periode}/unduh_laporan', 'PresensiController@unduh_laporan')->name('unduh_laporan');
	Route::get('/presensi/{periode}/unduh_rekap_laporan', 'PresensiController@unduh_rekap_laporan')->name('unduh_rekap_laporan');
	Route::get('/presensi/unduh_default_presensi_laporan', 'PresensiController@unduh_default_presensi_laporan')->name('unduh_default_presensi_laporan');
	Route::post('/presensi/kalkulasi_rekap', 'PresensiController@kalkulasi_rekap')->name('kalkulasi_rekap');
	Route::get('/standar_presensi', 'PresensiController@standar_presensi');
	Route::get('/pengaturan_presensi', 'PresensiController@pengaturan_presensi');
	Route::post('/presensi/pengaturan_presensi/{id_pengaturan_presensi}/update', 'PresensiController@update_pengaturan_presensi')->name('update_pengaturan_presensi');
	Route::post('/presensi/standar_presensi/tambah_standar_presensi', 'PresensiController@tambah_standar_presensi');
	Route::get('/presensi/standar_presensi/{id_default_presensi}/delete', 'PresensiController@delete_standar_presensi');
	Route::post('/presensi/standar_presensi/{id_default_presensi}/update', 'PresensiController@update_standar_presensi');

	/*Penggajian*/
	Route::get('/penggajian', 'PenggajianController@index');
	Route::get('/standar_penggajian', 'PenggajianController@standar_penggajian');
	Route::get('/pengaturan_penggajian', 'PenggajianController@pengaturan_penggajian');
	Route::post('/penggajian/tambah_table', 'PenggajianController@tambah_table_gaji')->name('tambah_table_gaji');
	Route::post('/penggajian/import_file', 'PenggajianController@import_default');
	Route::any('/penggajian/tampilkan_gaji', 'PenggajianController@tampilkan_gaji');
	Route::post('/penggajian/{id_gaji}/edit', 'PenggajianController@update_gaji');
	Route::get('/standar_penggajian', 'PenggajianController@standar_penggajian');
	Route::get('/pengaturan_penggajian', 'PenggajianController@pengaturan_penggajian');
	Route::post('/penggajian/pengaturan_penggajian/{id_pengaturan_penggajian}/update', 'PenggajianController@update_pengaturan_penggajian')->name('update_pengaturan_penggajian');
	Route::get('/penggajian/{periode}/unduh_laporan_gaji', 'PenggajianController@unduh_laporan_gaji')->name('unduh_laporan_gaji');
	Route::post('/penggajian/pengaturan_penggajian/{id_pengaturan_penggajian}/update', 'PenggajianController@update_pengaturan_penggajian')->name('update_pengaturan_penggajian');
	Route::post('/penggajian/pengaturan_penggajian/ptkp/{id}/update', 'PenggajianController@update_ptkp')->name('update_ptkp');
	Route::post('/penggajian/pengaturan_penggajian/pkp/{id}/update', 'PenggajianController@update_pkp')->name('update_pkp');
	Route::post('/penggajian/pengaturan_penggajian/pkp/tambah_pkp', 'PenggajianController@tambah_pkp');
	Route::get('/penggajian/pengaturan_penggajian/pkp/{id}/delete', 'PenggajianController@delete_pkp');
	Route::post('/penggajian/pengaturan_penggajian/ptkp/tambah_ptkp', 'PenggajianController@tambah_ptkp');
	Route::get('/penggajian/pengaturan_penggajian/ptkp/{id}/delete', 'PenggajianController@delete_ptkp');
	Route::get('/penggajian/standar_penggajian/{id_default_gaji}/delete', 'PenggajianController@delete_standar_penggajian');
	Route::post('/penggajian/standar_penggajian/tambah_standar_penggajian', 'PenggajianController@tambah_standar_penggajian');
	Route::post('/penggajian/standar_penggajian/{id_default_gaji}/update', 'PenggajianController@update_standar_penggajian');
	Route::get('/penggajian/{nik}/{dari_tanggal}/{sampai_tanggal}/cetak_slip_gaji_karyawan', 'PenggajianController@cetak_slip_gaji_karyawan')->name('cetak_slip_gaji_karyawan');
	Route::post('/penggajian/buat_slip_gaji', 'PenggajianController@buat_slip_gaji')->name('buat_slip_gaji');

	/*Divisi*/
	Route::get('/divisi', 'DivisiController@index');
	Route::post('/divisi/tambah_divisi', 'DivisiController@tambah_divisi');
	Route::post('/divisi/{id_divisi}/update', 'DivisiController@update_divisi');
	Route::get('/divisi/{id_divisi}/delete', 'DivisiController@delete_divisi');

	/*persetujuan Izin*/
	Route::get('/persetujuan_izin', 'PersetujuanIzinController@index');
	Route::get('/persetujuan_izin/{id_persetujuan_izin}/izin_diterima', 'PersetujuanIzinController@izin_diterima_atasan');
	Route::get('/persetujuan_izin/{id_persetujuan_izin}/izin_ditolak', 'PersetujuanIzinController@izin_ditolak_atasan');
	Route::get('/persetujuan_izin/{id_persetujuan_izin}/izin_diterima_hr', 'PersetujuanIzinController@izin_diterima_hr');
	Route::get('/persetujuan_izin/{id_persetujuan_izin}/izin_ditolak_hr', 'PersetujuanIzinController@izin_ditolak_hr');

	/* Setting */
	Route::get('/setting', 'SettingController@index');


	/*Profil*/
	Route::get('/profil/{id}', 'ProfilController@index');
	Route::get('/edit/', 'ProfilController@Edit');

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

	Route::post('/profil/tambah/update/data_riwayat_pekerjaan', 'ProfilController@tambah_data_riwayat_pekerjaan')->name('tambah_data_riwayat_pekerjaan');
	Route::post('/profil/{id}/update/data_riwayat_pekerjaan','ProfilController@update_data_pekerjaan')->name('update_data_pekerjaan');
	Route::get('/profil/{id}/delete/data_riwayat_pekerjaan', 'ProfilController@delete_data_pekerjaan')->name('delete_data_pekerjaan');


	/*Gaji*/
	Route::get('/gaji/{id}', 'GajiController@index');
	Route::post('/gaji/{id}/tampilkan_gaji', 'GajiController@tampilkan_gaji')->name('tampilkan_gaji');
	Route::get('/gaji/{id}/{bulan}/{tahun}/cetak_slip_gaji', 'GajiController@cetak_slip_gaji')->name('cetak_slip_gaji');
	Route::get('/gaji/{id}///cetak_slip_gaji', 'GajiController@gagal_cetak_slip_gaji')->name('gagal_cetak_slip_gaji');

	/*Kontak Karyawab*/
	Route::get('/kontak_karyawan', 'KontakKaryawanController@index');

	/*Form Izin*/
	Route::get('/form_izin', 'FormIzinController@index');
	Route::post('/formizin/{id}/ajukan_izin', 'FormIzinController@ajukan_izin');

	// Form izin send email
	Route::post('sendemail ', 'FormIzinController@sendemail');
	Route::any('/image-crop/foto_profil', 'ProfilController@imageCropPost')->name('imageCropPost');

	//Pengaturan ENV.
	Route::get('/pengaturan_env', 'PengaturanEnvController@index');
	Route::get('/pengaturan_env/update', 'PengaturanEnvController@update');
});

