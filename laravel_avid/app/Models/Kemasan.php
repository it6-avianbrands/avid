<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kemasan extends Model
{
    protected $table = 'tbKemasan';
    protected $primaryKey = 'KemasanCode';
    protected $keyType = 'string';
    protected $connection = 'CONFIG';
    public $timestamps = false;
    
}
