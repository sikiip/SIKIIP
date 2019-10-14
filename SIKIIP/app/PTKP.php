<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PTKP extends Model
{
    protected $table = 'ptkp';

    protected $primaryKey = 'id';

    protected $fillable = [
        'status','tarif_bulan','tarif_tahun',
    ];
}
