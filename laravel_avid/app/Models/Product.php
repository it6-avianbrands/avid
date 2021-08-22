<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbProduct';
    protected $primaryKey = 'ProductCode';
    protected $keyType = 'string';
    protected $connection = 'CONFIG';
    public $timestamps = false;
    
}
