<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogsData extends Model
{
    protected $connection = 'mysql2';

    protected $table = 'logs';

	protected $primaryKey = 'id';
}
