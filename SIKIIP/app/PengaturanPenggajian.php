<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengaturanPenggajian extends Model
{
	protected $table = 'pengaturan_penggajian';

	protected $primaryKey = 'id_pengaturan_penggajian';

	protected $fillable = [
		'biaya_tunjangan_profesi_housekeeping_driver', 'bpjs_kesehatan_perusahaan', 'bpjs_kesehatan_karyawan', 'bpjs_ketenagakerjaan_JKK' , 'bpjs_ketenagakerjaan_JKM' , 'bpjs_ketenagakerjaan_JHT' , 'default_iuran' , 'default_biaya_jabatan1', 'default_biaya_jabatan2',
	];
    //
}
