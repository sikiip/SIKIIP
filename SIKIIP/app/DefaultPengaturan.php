<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultPengaturan extends Model
{
    protected $table = 'default';

    protected $primaryKey = 'id_default';

    protected $fillable = [
        'nama_default', 'nilai_default',
    ];
}
