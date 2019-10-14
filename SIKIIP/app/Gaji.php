<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'gaji';

    protected $primaryKey = 'id_gaji';

    protected $fillable = [
            'periode_gaji',
            'nik',
            'id_sidik_jari',
            'pengalaman_tanggal',
            'pengalaman_bulan',
            'gaji_pokok',
            'T_profesi',
            'T_jabatan',
            'T_kinerja',
            'T_khusus',
            'T_transport',
            'jumlah_absen',
            'hari_transportasi',
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
            'keterangan_potongan',
            'keterangan_tunjangan_transport',
            'jumlah_keterlambatan',
            'keterangan_disinsentif_insentif',
    ];
}
