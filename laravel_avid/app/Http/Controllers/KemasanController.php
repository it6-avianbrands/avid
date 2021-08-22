<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kemasan;
use Illuminate\Http\JsonResponse;
use Datatables;

class KemasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('master.kemasan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('master.kemasan.update');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = new Kemasan();
        $data->KemasanCode = $request->KemasanCode;
        $data->KemasanDesc = $request->KemasanDesc;
        $data->CreatedBy = session("userinfo")["username"];
        $data->ModifiedBy = session("userinfo")["username"];
		if($data->save()){
			return redirect()->route("kemasan.index")->with("success", "Data berhasil disimpan")->with("mode", "success");
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
		$data = Kemasan::find($id);
		if ($data->count() > 0){
            view()->share('data', $data);
			return view ('master.kemasan.view');
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Kemasan::find($id);
        view()->share('data', $data);
        return view ('master.kemasan.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = Kemasan::find($id);
        //$data->KemasanCode = $request->KemasanCode;
        $data->KemasanDesc = $request->KemasanDesc;
        $data->CreatedBy = session("userinfo")["username"];
        $data->ModifiedBy = session("userinfo")["username"];
		if($data->save()){
			return redirect()->route("kemasan.index")->with("success", "Data berhasil disimpan")->with("mode", "success");
		}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
		$data = Kemasan::find($id);
        $data->ModifiedBy = session("userinfo")["username"];
        if($data->save()){
            session()->flash('success', 'Data berhasil dihapus');
            session()->flash('mode', 'success');
            return new JsonResponse(["status"=>true]);
        }
		return new JsonResponse(["status"=>false]);		
    }

	public function datatable() {	
		$data = Kemasan::all();
        return Datatables::of($data)
			->addColumn('action', function ($data) {
                $view = "";
                $edit = "";
                $delete = "";
                $url = route("kemasan.show",["kemasan" => $data->KemasanCode]);
                $url_edit = route("kemasan.edit",["kemasan" => $data->KemasanCode]);
                
                if (canView()){
                    $view = "<a class='btn btn-md btn-icon-text btn-info' href='".$url."' title='View'><i class='mdi mdi-eye'></i> View</a>";
                }
                if (canEdit()){
                    $edit = "<a class='btn btn-md btn-icon-text btn-warning' href='".$url_edit."' title='Edit'><i class='mdi mdi-tooltip-edit'></i> Edit</a>";
                }
                if (canDelete()){
                    $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-md btn-icon-text btn-danger btn-delete' title='Delete' disabled><i class='mdi mdi-delete'></i> Delete</button>";
                }

				return $view." ".$edit." ".$delete;
            })			
            ->rawColumns(['action'])
            ->make(true);
	}
     
}
