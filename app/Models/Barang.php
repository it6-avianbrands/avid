<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

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
        'Warna',
        'Produk',
        'Merk',
        'Jenis',
        'Ukuran',
        'ModelSatuan',
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
