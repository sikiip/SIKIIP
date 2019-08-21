<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataFamilia extends Model
{
    protected $table = 'datafamilia';

    protected $primaryKey = 'id_familia';

    protected $fillable = [
        'nik','nama_familia', 'jenis_hubungan', 'tempat_lahir_familia', 'tanggal_lahir_familia', 'jenis_kelamin_familia',
    ];

    public function datakaryawanfamilia()
    {
        return $this->belongsTo('App\DataFamilia');
    }
}
