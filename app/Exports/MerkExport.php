<?php

namespace App\Exports;

use App\Models\Merk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MerkExport implements FromView
{
    public function view(): View
    {
        $merk = Merk::select(
            "KodeMerk",
            "KeteranganMerk"
        )->get();

        return view("excel.master.merk", [
            "header" => array_keys($merk->first()->getAttributes()),
            "data" => $merk
        ]);
    }
}