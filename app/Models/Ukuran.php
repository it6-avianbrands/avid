<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ukuran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Ukuran';

    protected $primaryKey = 'KodeUkuran';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'KodeUkuran',
        'KeteranganUkuran',
    ];
}
