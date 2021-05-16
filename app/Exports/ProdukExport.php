<?php

namespace App\Exports;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProdukExport implements FromView
{
    public function view(): View
    {
        $produk = Produk::select(
            "KodeProduk",
            "InisialProduk",
            "KeteranganProduk"
        )->get();

        return view("excel.master.produk", [
            "header" => array_keys($produk->first()->getAttributes()),
            "data" => $produk
        ]);
    }
}