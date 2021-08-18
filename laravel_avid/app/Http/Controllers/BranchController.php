<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Http\JsonResponse;
use Datatables;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view ('branch.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view ('branch.update');
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
        $data = new Branch();
        $data->branch_code = $request->branch_code;
        $data->branch_desc = $request->branch_desc;
        $data->region_code = $request->region_code;
        $data->parent_code = $request->parent_code;
        $data->active = $request->active;
        $data->created_by = session("userinfo")["username"];
        $data->updated_by = session("userinfo")["username"];
		if($data->save()){
			return redirect()->route("branch.index")->with("success", "Data berhasil disimpan")->with("mode", "success");
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
		$data = Branch::find($id);
		if ($data->count() > 0){
            view()->share('data', $data);
			return view ('branch.view');
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
        $data = Branch::find($id);
        view()->share('data', $data);
        return view ('branch.update');
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
        $data = Branch::find($id);
        $data->branch_code = $request->branch_code;
        $data->branch_desc = $request->branch_desc;
        $data->region_code = $request->region_code;
        $data->parent_code = $request->parent_code;
        $data->active = $request->active;
        $data->created_by = session("userinfo")["username"];
        $data->updated_by = session("userinfo")["username"];
		if($data->save()){
			return redirect()->route("branch.index")->with("success", "Data berhasil disimpan")->with("mode", "success");
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
		$data = Branch::find($id);
    	$data->active = 0;
        $data->updated_by = session("userinfo")["username"];
        if($data->save()){
            session()->flash('success', 'Data berhasil dihapus');
            session()->flash('mode', 'success');
            return new JsonResponse(["status"=>true]);
        }
		return new JsonResponse(["status"=>false]);		
    }

	public function datatable() {	
		$data = Branch::where('active', '!=', 0);
        return Datatables::of($data)
			->addColumn('action', function ($data) {
                $view = "";
                $edit = "";
                $delete = "";
                $url = route("branch.show",["branch" => $data->id]);
                $url_edit = route("branch.edit",["branch" => $data->id]);
                
                if (canView()){
                    $view = "<a class='btn btn-md btn-icon-text btn-info' href='".$url."' title='View'><i class='mdi mdi-eye'></i> View</a>";
                }
                if (canEdit()){
                    $edit = "<a class='btn btn-md btn-icon-text btn-warning' href='".$url_edit."' title='Edit'><i class='mdi mdi-tooltip-edit'></i> Edit</a>";
                }
                if (canDelete()){
                    $delete = "<button data-url='".$url."' onclick='deleteData(this)' class='btn btn-md btn-icon-text btn-danger btn-delete' title='Delete'><i class='mdi mdi-delete'></i> Delete</button>";
                }

				return $view." ".$edit." ".$delete;
            })			
            ->rawColumns(['action'])
            ->make(true);
	}
     
}
