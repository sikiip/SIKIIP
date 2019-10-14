<?php

namespace App;

use App\DataFamilia;
use Illuminate\Database\Eloquent\Model;

class DataKaryawan extends Model
{
    protected $table = 'datakaryawan';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nik','id_sidik_jari', 'nama_karyawan', 'email', 'divisi', 'masa_kerja', 'alamat_ktp', 'alamat_tinggal', 'tempat_lahir', 'tanggal_lahir', 'no_telp', 'no_ktp', 'foto_kk', 'foto_ktp', 'no_bpjs_ketenagakerjaan', 'foto_bpjs_ketenagakerjaan', 'no_bpjs_kesehatan', 'foto_bpjs_kesehatan', 'no_npwp','nama_bank','no_rekening','nama_rekening','foto_npwp', 'no_telp_darurat', 'hub_no_telp_darurat', 'status_hubungan', 'status_kerja', 'alasan_resign', 'tanggal_resign', 'foto_karyawan',
    ];

    public function datafamilia()
    {
        return $this->hasMany('App\DataFamilia');
    }

    public function presensi()
    {
        return $this->hasMany('App\Presensi');
    }
}
