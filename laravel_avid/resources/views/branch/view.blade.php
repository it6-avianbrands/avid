<?php
	$breadcrumb = [];
	$breadcrumb[0]["title"] = "Cabang";
	$breadcrumb[0]["url"] = route("branch.index");
    
    if (isset($data)){
        $breadcrumb[1]["title"] = "View";
        $breadcrumb[1]["url"] = route("branch.show",["branch" => $data->id]);
    }

    $branch_code = "";
    $branch_desc = "";
    $region_code = "";
    $parent_code = "";
    $active = "";
    $created_at = "";
    $updated_at = "";
    $created_by = "";
    $updated_by = "";
    if (isset($data)){
        $branch_code = $data->branch_code;
        $branch_desc = $data->branch_desc;
        $region_code = $data->region_code;
        $parent_code = $data->parent_code;
        $active = $data->active;
        $created_at = date('d-m-Y H:i:s', strtotime($data->created_at));
        $updated_at = date('d-m-Y H:i:s', strtotime($data->updated_at));
        $created_by = $data->created_by;
        $updated_by = $data->updated_by;
    }

?>

@extends('layouts.main')

@section('title', 'Cabang')

@section('content')
    <div class="row mb-1">
        <div class="col-12 col-sm-6">
            <h3 class="title">Master Cabang | View</h3>
            @include('layouts.elements.breadcrumb',array('breadcrumb' => $breadcrumb))                
        </div>
        <div class="col-12 col-sm-6">
            @include('layouts.elements.back_button')
        </div>
    </div>
    <div class="d-block d-sm-none mt-2"></div>
    <div class="card">
        <div class="card-body">
            {{ Form::open() }}
            <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kode Cabang</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="<?=$branch_code;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Cabang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" disabled value="<?=$branch_desc;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Induk</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="<?=$parent_code;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Wilayah</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="<?=$region_code;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-6">
                        @include('layouts.elements.status_view')
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Dibuat Tanggal</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="<?=$created_at;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Dibuat Oleh</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="<?=$created_by;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Diedit Tanggal</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="<?=$updated_at;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Diedit Oleh</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="<?=$updated_by;?>">
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
