<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatPekerjaan extends Model
{
    protected $table = 'riwayatpekerjaan';

    protected $primaryKey = 'id_riwayat_pekerjaan';

    protected $fillable = [
        'nik','nama_perusahaan', 'jenis_industri', 'jabatan_akhir', 'periode_berakhir_kerja', 'gaji_akhir', 'alasan_berhenti', 'foto_verklarin',
    ];
}
