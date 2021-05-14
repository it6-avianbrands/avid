<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Kabupaten';

    protected $primaryKey = 'KodeKabupaten';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'KodeKabupaten',
        'KeteranganKabupaten',
    ];
}
