<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    
    protected $table = 'Kecamatan';

    protected $primaryKey = 'KodeKecamatan';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'KodeKecamatan',
        'KeteranganKecamatan',
    ];
}
