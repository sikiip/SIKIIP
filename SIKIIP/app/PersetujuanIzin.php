<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersetujuanIzin extends Model
{
    //
        protected $table = 'persetujuanizin';

     	protected $primaryKey = 'id_persetujuan_izin';

        protected $fillable = [
       'nik', 'tanggal_mulai_izin', 'tanggal_akhir_izin','tipe_izin', 'alasan_izin', 'keterangan_izin',
   ];
}
