<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use App\Models\Jenis;
use App\Models\Ukuran;
use Illuminate\Http\Request;
use Validator;

class MJUController extends Controller
{
    public function listMerk()
    {
        $merk = Merk::all();
        return response()->json($merk);
    }

    public function findMerkByID($id)
    {
        $merk = Merk::find($id);
        return response()->json($merk);
    }

    public function searchMerkByFilter($filter, $search)
    {
        $merk = Merk::where($filter, "like", "%".$search."%")->get();
        return response()->json($merk);
    }

    public function addMerk(Request $request)
    {
        /*$validation = Validator::make($request->all(), [
            "KodeMerk" => "required|unique:Merk",
            "KeteranganMerk" => "required",
        ]);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }*/

        $merk = Merk::create($request->all());

        return response()->json([
            "status" => true,
            "message" => "Add Merk success.",
            "data" => $merk
        ]);
    }

    public function editMerk($id, Request $request)
    {
        /*$validation = Validator::make($request->all(), [
            "KodeMerk" => "required|unique:Merk",
            "KeteranganMerk" => "required",
        ]);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }*/

        Merk::find($id)->update($request->all());

        return response()->json([
            "status" => true,
            "message" => "Edit Merk success.",
            "data" => ""
        ]);
    }

    public function deleteMerk($id)
    {
        Merk::find($id)->delete();

        return response()->json([
            "status" => true,
            "message" => "Delete Merk success.",
            "data" => ""
        ]);
    }

    public function listJenis()
    {
        $jenis = Jenis::all();
        return response()->json($jenis);
    }

    public function findJenisByID($id)
    {
        $jenis = Jenis::find($id);
        return response()->json($jenis);
    }

    public function searchJenisByFilter($filter, $search)
    {
        $jenis = Jenis::where($filter, "like", "%".$search."%")->get();
        return response()->json($jenis);
    }

    public function addJenis(Request $request)
    {
        /*$validation = Validator::make($request->all(), [
            "KodeJenis" => "required|unique:Jenis",
            "KeteranganJenis" => "required",
        ]);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }*/

        $jenis = Jenis::create($request->all());

        return response()->json([
            "status" => true,
            "message" => "Add Jenis success.",
            "data" => $jenis
        ]);
    }

    public function editJenis($id, Request $request)
    {
        /*$validation = Validator::make($request->all(), [
            "KodeJenis" => "required|unique:Jenis",
            "KeteranganJenis" => "required",
        ]);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }*/

        Jenis::find($id)->update($request->all());

        return response()->json([
            "status" => true,
            "message" => "Edit Jenis success.",
            "data" => ""
        ]);
    }

    public function deleteJenis($id)
    {
        Jenis::find($id)->delete();

        return response()->json([
            "status" => true,
            "message" => "Delete Jenis success.",
            "data" => ""
        ]);
    }

    public function listUkuran()
    {
        $ukuran = Ukuran::all();
        return response()->json($ukuran);
    }

    public function findUkuranByID($id)
    {
        $ukuran = Ukuran::find($id);
        return response()->json($ukuran);
    }

    public function searchUkuranByFilter($filter, $search)
    {
        $ukuran = Ukuran::where($filter, "like", "%".$search."%")->get();
        return response()->json($ukuran);
    }

    public function addUkuran(Request $request)
    {
        /*$validation = Validator::make($request->all(), [
            "KodeUkuran" => "required|unique:Ukuran",
            "KeteranganUkuran" => "required",
        ]);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }*/

        $ukuran = Ukuran::create($request->all());

        return response()->json([
            "status" => true,
            "message" => "Add Ukuran success.",
            "data" => $ukuran
        ]);
    }

    public function editUkuran($id, Request $request)
    {
        /*$validation = Validator::make($request->all(), [
            "KodeUkuran" => "required|unique:Ukuran",
            "KeteranganUkuran" => "required",
        ]);

        if ($validation->fails()) 
        {
            return response()->json([
                "status" => false,
                "message" => $validation->errors()
            ], 422);
        }*/

        Ukuran::find($id)->update($request->all());

        return response()->json([
            "status" => true,
            "message" => "Edit Ukuran success.",
            "data" => ""
        ]);
    }

    public function deleteUkuran($id)
    {
        Ukuran::find($id)->delete();

        return response()->json([
            "status" => true,
            "message" => "Delete Ukuran success.",
            "data" => ""
        ]);
    }
}
