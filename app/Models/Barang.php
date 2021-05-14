<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'Barang';

    protected $primaryKey = 'KodeBarang';

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'KodeBarang',
        'NamaBarang',
        'Keterangan',
        'Barcode',
        'KodeWarna',
        'KodeProduk',
        'KodeMerk',
        'KodeJenis',
        'KodeUkuran',
        'KodeModelSatuan',
        'SatuanColi',
        'DiscGroupBarang',
        'ProdukGroup',
        'Group1',
        'Group2',
        'Group3',
        'Group4',
        'GroupA',
        'GroupB',
        'GroupC',
        'GroupD',
        'GroupDX',
        'IsHadiah',
        'IsBarangCabang',
    ];
}
