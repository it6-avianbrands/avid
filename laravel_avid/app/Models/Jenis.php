<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'tbJenis';
    protected $primaryKey = 'JenisCode';
    protected $keyType = 'string';
    protected $connection = 'CONFIG';
    public $timestamps = false;
    
}
