<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikan extends Model
{
    protected $table = 'riwayatpendidikan';

    protected $primaryKey = 'id_riwayat_pendidikan';

    protected $fillable = [
        'nik','jenjang_pendidikan', 'nama_sekolah', 'kota_sekolah', 'jurusan_pendidikan', 'periode_pendidikan', 'foto_ijazah_sertifikat',
    ];
}
