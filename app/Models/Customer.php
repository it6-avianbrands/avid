<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'Customer';

    protected $primaryKey = 'KodeCustomer';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'KodeCustomer',
        'TypeCustomer',
        'NamaCustomer',
        'Keterangan',
        'Alamat1',
        'Alamat2',
        'KodeCabang',
        'KodeWilayah',
        'KodePropinsi',
        'KodeKabupaten',
        'KodeKecamatan',
        'Kelurahan',
        'KodePos',
        'NoTelepon',
        'NoHP',
        'Email',
        'Kontak',
        'NoKTP',
        'NPWP',
        'NamaPKP',
        'AlamatPKP',
        'LimitTotal',
        'HargaGroupCustomer',
        'DiscGroupCustomer',
        'IsAktif',
        'IsExport',
        'TglGabung',
    ];
}
