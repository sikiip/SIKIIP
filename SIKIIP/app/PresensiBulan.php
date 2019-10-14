<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PresensiBulan extends Model
{
    protected $table = 'presensibulan';

    protected $primaryKey = 'id_presensi';

    protected $fillable = [
        'id_sidik_jari','periode_presensi','transport_presensi','tambahan_presensi','keterangan','total_early_presensi','total_late_presensi','jumlah_keterlambatan', 'jumlah_absen', 'ijin','cuti_penting','cuti_luar_tanggungan','dispensasi', 'sdsd','stsd', 'cuti_tahunan'
    ];

        public function datakaryawan()
    {
        return $this->belongsTo('App\DataKaryawan', 'id_sidik_jari');
    }
}
