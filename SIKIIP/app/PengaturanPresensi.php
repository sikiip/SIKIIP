<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PengaturanPresensi extends Model
{
    protected $table = 'pengaturan_presensi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'email_hrd', 'clock_in_normal', 'clock_out_normal', 'transport_normal' , 'clock_in_ramadhan' , 'clock_out_ramadhan' , 'transport_ramadhan' , 'lupa_clock_in_out',
    ];
}