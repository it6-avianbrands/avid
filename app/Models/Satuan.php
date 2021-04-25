<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    
    protected $table = 'Satuan';

    protected $primaryKey = 'KodeSatuan';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'KodeSatuan',
        'KeteranganSatuan',
    ];
}
