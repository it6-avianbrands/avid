<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'tbMerk';
    protected $primaryKey = 'MerkCode';
    protected $keyType = 'string';
    protected $connection = 'CONFIG';
    public $timestamps = false;
    
}
