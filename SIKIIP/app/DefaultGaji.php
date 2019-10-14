<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultGaji extends Model
{
    protected $table = 'default_gaji';

    protected $primaryKey = 'id_default_gaji';

    protected $fillable = [
            'nik',
            'pengalaman_tanggal',
            'pengalaman_bulan',
            'gaji_pokok',
            'T_profesi',
            'T_jabatan',
            'T_kinerja',
            'T_khusus',
            'T_transport',
            'basic_gaji_perhitungan_bpjs_kesehatan',
            'basic_gaji_perhitungan_bpjs_ketenagakerjaan',
            'insentif',
            'bonus',
            'masa_kerja',
            'status',
            'npwp',
            'potongan',
            'no_rek',
            'nama_bank',
    ];
}
