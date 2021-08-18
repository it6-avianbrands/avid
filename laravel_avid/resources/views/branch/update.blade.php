<?php
	$breadcrumb = [];
	$breadcrumb[0]["title"] = "Cabang";
	$breadcrumb[0]["url"] = route("branch.index");
	$breadcrumb[1]["title"] = "Create";
	$breadcrumb[1]["url"] = route("branch.create");
	if (isset($data)){
		$breadcrumb[1]["title"] = "Edit";
		$breadcrumb[1]["url"] = route("branch.edit",["branch" => $data->id]);
	}
    
    $mode = "Create";
    if (isset($data)){
        $mode = "Edit";
    }

    $branch_code = old("branch_code");
    $branch_desc = old("branch_desc");
    $region_code = old("region_code");
    $parent_code = old("parent_code");
    $active = old("active");
    $method = "POST";
    $mode = "Create";
    $form_url = route("branch.index");
    if (isset($data)){
        $branch_code = $data->branch_code;
        $branch_desc = $data->branch_desc;
        $region_code = $data->region_code;
        $parent_code = $data->parent_code;
        $active = $data->active;
        $method = "PUT";
        $mode = "Edit";
        $form_url = route("branch.update",["branch" => $data->id]);
    }
?>

@extends('layouts.main')

@section('title', 'Cabang')

@section('content')
    <div class="row mb-1">
        <div class="col-12 col-sm-6">
            <h3 class="title">Master Cabang | <?=$mode;?></h3>
            @include('layouts.elements.breadcrumb',array('breadcrumb' => $breadcrumb))                
        </div>
        <div class="col-12 col-sm-6">
            @include('layouts.elements.back_button')
        </div>
    </div>
    <div class="d-block d-sm-none mt-2"></div>
    <div class="card">
        <div class="card-body">
            {{ Form::open(['url' => $form_url, 'method' => $method]) }}
                {!! csrf_field() !!}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kode Cabang</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Kode Cabang" name="branch_code" required="required" autofocus value="<?=$branch_code;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Cabang</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="Nama Cabang" name="branch_desc" required="required" value="<?=$branch_desc;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Induk</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Induk" name="parent_code" required="required" value="<?=$parent_code;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Wilayah</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Wilayah" name="region_code" required="required" value="<?=$region_code;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Status: </label>
                    <div class="col-sm-3">
                        @include('layouts.elements.status_form')
                    </div>
                </div>
                @include('layouts.elements.submit_button')
            {{ Form::close() }}
        </div>
    </div>
@endsection
