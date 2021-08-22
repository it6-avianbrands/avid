<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
    protected $table = 'tbUkuran';
    protected $primaryKey = 'UkuranCode';
    protected $keyType = 'string';
    protected $connection = 'CONFIG';
    public $timestamps = false;
    
}
