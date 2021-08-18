<?php
	$breadcrumb = [];
	$breadcrumb[0]["title"] = "Modul";
	$breadcrumb[0]["url"] = route("module.index");
    
    if (isset($data)){
        $breadcrumb[1]["title"] = "View";
        $breadcrumb[1]["url"] = route("module.show",["module" => $data->id]);
    }
    

    $code = "";
    $description = "";
    $active = "";
    $url = "";
    $created_at = "";
    $updated_at = "";
    $created_by = "";
    $updated_by = "";
    if (isset($data)){
        $code = $data->code;
        $description = $data->description;
        $active = $data->active;
        $url = $data->url;
        $created_at = date('d-m-Y H:i:s', strtotime($data->created_at));
        $updated_at = date('d-m-Y H:i:s', strtotime($data->updated_at));
        $created_by = $data->created_by;
        $updated_by = $data->updated_by;
    }

?>

@extends('layouts.main')

@section('title', 'Modul')

@section('content')
    <div class="row mb-1">
        <div class="col-12 col-sm-6">
            <h3 class="title">Master Modul | View</h3>
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
                    <label class="col-sm-3 col-form-label">Kode</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="<?=$code;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Menu</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" disabled value="<?=$description;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">URL</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" disabled value="<?=$url;?>">
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
