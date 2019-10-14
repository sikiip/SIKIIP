<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PKPProgresif extends Model
{
    protected $table = 'pkp_progresif';

    protected $primaryKey = 'id';

    protected $fillable = [
       'min_income','max_income','tarif_pajak',
    ];
}
