<?php

namespace App\Http\Controllers;

use App\Exports\BarangExport;
use App\Exports\ProdukExport;
use App\Exports\MerkExport;
use App\Exports\JenisExport;
use App\Exports\UkuranExport;
use Illuminate\Http\Request;
use Excel;

class ReportController extends Controller
{
    public function exportBarang() 
    {
        return Excel::download(new BarangExport, 'Barang.xlsx');
    }

    public function exportProduk() 
    {
        return Excel::download(new ProdukExport, 'Produk.xlsx');
    }

    public function exportMerk() 
    {
        return Excel::download(new MerkExport, 'Merk.xlsx');
    }

    public function exportJenis() 
    {
        return Excel::download(new JenisExport, 'Jenis.xlsx');
    }

    public function exportUkuran() 
    {
        return Excel::download(new UkuranExport, 'Ukuran.xlsx');
    }
}