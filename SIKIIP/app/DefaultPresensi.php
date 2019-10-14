<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultPresensi extends Model
{
    protected $table = 'default_presensi';

    protected $primaryKey = 'id_default_presensi';

    protected $fillable = [
            'id_sidik_jari',
            'periode_rekap',
            'ijin',
            'jumlah_absen',
            'cuti_diluar_tanggungan',
            'cuti_penting',
            'dispensasi',
            'sdsd',
            'stsd',
            'cuti_tahunan',
            'sisa_cuti_tahunan',
            'keterangan',
            'keterangan_cuti',
    ];
}
