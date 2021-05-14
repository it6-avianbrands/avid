<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Validator;

class BarangController extends Controller
{
    public function listBarang()
    {
        $barang = Barang::all();
        return response()->json($barang);
    }

    public function findBarangByID($id)
    {
        $barang = Barang::find($id);
        return response()->json($barang);
    }

    public function findBarangByName($name)
    {
        $barang = Barang::where($name);
        return response()->json($barang);
    }

    public function addBarang(Request $request)
    {
        /*$validation = Validator::make($request->all(), [
            "KodeBarang" => "required|unique:Barang",
            "KodeProduk" => "required|exists:Produk",
            "NamaBarang" => "required",
            "KodeWarna" => "required|exists:Warna",
            "KodeMerk" => "required|exists:Merk",
            "KodeJenis" => "required|exists:Jenis",
            "KodeUkuran" => "required|exists:Ukuran",
            "KodeModelSatuan" => "required|exists:ModelSatuan",
            "KodeSatuan" => "required|exists:Satuan",
            "SatuanColi" => "required|exists:Satuan,KodeSatuan",
            "DiscGroupBarang" => "required|exists:DiscGroup,KodeDiscGroup",
            "ProdukGroup" => "required|exists:ProdukGroup,KodeProdukGroup",
            "Group1" => "required",
            "Group2" => "required",
            "Group3" => "required",
            "Group4" => "required",
            "GroupA" => "required",
            "GroupB" => "required",
            "GroupC" => "required",
            "GroupD" => "required",
            "GroupDX" => "required"
        ]);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }*/

        $barang = Barang::create($request->except(["KodeSatuan", "QtySatuan", "BeratSatuan", "QtyColi"]));

        return response()->json([
            "status" => true,
            "message" => "Add Barang success.",
            "data" => $barang
        ]);
    }

    public function editBarang($id, Request $request)
    {
        /*$validation = Validator::make($request->all(), [
            "KodeProduk" => "required|exists:Produk",
            "NamaBarang" => "required",
            "KodeWarna" => "required|exists:Warna",
            "KodeMerk" => "required|exists:Merk",
            "KodeJenis" => "required|exists:Jenis",
            "KodeUkuran" => "required|exists:Ukuran",
            "KodeModelSatuan" => "required|exists:ModelSatuan",
            "KodeSatuan" => "required|exists:Satuan",
            "SatuanColi" => "required|exists:Satuan,KodeSatuan",
            "DiscGroupBarang" => "required|exists:DiscGroup,KodeDiscGroup",
            "ProdukGroup" => "required|exists:ProdukGroup,KodeProdukGroup",
            "Group1" => "required",
            "Group2" => "required",
            "Group3" => "required",
            "Group4" => "required",
            "GroupA" => "required",
            "GroupB" => "required",
            "GroupC" => "required",
            "GroupD" => "required",
            "GroupDX" => "required"
        ]);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }*/

        Barang::find($id)->update($request->except(["KodeBarang", "KodeSatuan", "QtySatuan", "BeratSatuan", "QtyColi"]));

        return response()->json([
            "status" => true,
            "message" => "Edit Barang success.",
            "data" => ""
        ]);
    }

    public function deleteBarang($id)
    {
        Barang::find($id)->delete();

        return response()->json([
            "status" => true,
            "message" => "Delete Barang success.",
            "data" => ""
        ]);
    }
}
