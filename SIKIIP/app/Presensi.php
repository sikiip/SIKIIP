<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    protected $table = 'presensi';

    protected $primaryKey = 'id_presensi';

    protected $fillable = [
        'id_sidik_jari', 'tanggal_presensi', 'jam_clock_in','jam_clock_out','late_presensi','early_presensi','transport_presensi','tambahan_presensi','keterangan',
    ];

        public function datakaryawan()
    {
        return $this->belongsTo('App\DataKaryawan', 'id_sidik_jari');
    }
}
