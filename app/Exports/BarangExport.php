<?php

namespace App\Exports;

use App\Models\Barang;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class BarangExport implements FromView
{
    public function view(): View
    {
        $barang = Barang::select(
            "KodeBarang",
            "KodeProduk",
            "NamaBarang",
            "KodeMerk",
            "KodeJenis",
            "KodeUkuran",
            "KodeModelSatuan",
            "SatuanColi",
            "DiscGroupBarang",
            "ProdukGroup"
        )->get();

        return view("excel.master.barang", [
            "header" => array_keys($barang->first()->getAttributes()),
            "data" => $barang
        ]);
    }
}