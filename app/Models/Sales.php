<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sales extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'Sales';

    protected $primaryKey = 'KodeSales';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'KodeSales',
        'NamaSales',
        'Keterangan',
        'Alamat1',
        'Alamat2',
        'KodeCabang',
        'Kota',
        'KodePos',
        'NoTelepon',
        'NoHP',
        'Email',
        'NoKTP',
        'NoNPWP',
        'IsAktif',
        'IsTransfer',
        'TglGabung',
    ];
}
