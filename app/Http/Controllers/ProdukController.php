<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Validator;

class ProdukController extends Controller
{
    public function listProduk()
    {
        $produk = Produk::all();
        return response()->json($produk);
    }

    public function findProdukByID($id)
    {
        $produk = Produk::find($id);
        return response()->json($produk);
    }

    public function searchProdukByFilter($filter, $search)
    {
        $produk = Produk::where($filter, "like", "%".$search."%")->get();
        return response()->json($produk);
    }

    public function addProduk(Request $request)
    {
        $rules = [
            "KodeProduk" => "required|unique:Produk",
            "KeteranganProduk" => "required",
            "InisialProduk" => "required|unique:Produk"
        ];

        $messages = validation_rules();

        $validation = Validator::make($request->all(), $rules, $messages);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }

        $produk = Produk::create($request->all());

        return response()->json([
            "status" => true,
            "message" => "Add Produk success.",
            "data" => $produk
        ]);
    }

    public function editProduk($id, Request $request)
    {
        $requests = $request->except(["KodeProduk"]);

        $rules = [
            "KeteranganProduk" => "required"
        ];

        $messages = validation_rules();

        $validation = Validator::make($requests, $rules, $messages);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }

        Produk::find($id)->update($requests);

        return response()->json([
            "status" => true,
            "message" => "Edit Produk success.",
            "data" => ""
        ]);
    }

    public function deleteProduk($id)
    {
        Produk::find($id)->delete();

        return response()->json([
            "status" => true,
            "message" => "Delete Produk success.",
            "data" => ""
        ]);
    }
}
