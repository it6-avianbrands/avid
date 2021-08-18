<?php
	$breadcrumb = [];
	$breadcrumb[0]["title"] = "Modul";
	$breadcrumb[0]["url"] = route("module.index");
	$breadcrumb[1]["title"] = "Create";
	$breadcrumb[1]["url"] = route("module.create");
	if (isset($data)){
		$breadcrumb[1]["title"] = "Edit";
		$breadcrumb[1]["url"] = route("module.edit",["module" => $data->id]);
	}
    
    $mode = "Create";
    if (isset($data)){
        $mode = "Edit";
    }

    $code = old("code");
    $description = old("description");
    $active = old("active");
    $url = old("url");
    $method = "POST";
    $mode = "Create";
    $form_url = route("module.index");
    if (isset($data)){
        $code = $data->code;
        $description = $data->description;
        $active = $data->active;
        $url = $data->url;
        $method = "PUT";
        $mode = "Edit";
        $form_url = route("module.update",["module" => $data->id]);
    }
?>

@extends('layouts.main')

@section('title', 'Modul')

@section('content')
    <div class="row mb-1">
        <div class="col-12 col-sm-6">
            <h3 class="title">Master Modul | <?=$mode;?></h3>
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
                    <label class="col-sm-3 col-form-label">Kode</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Kode" name="code" required="required" autofocus value="<?=$code;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Menu</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="Nama Menu" name="description" required="required" value="<?=$description;?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">URL</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" placeholder="URL" name="url" required="required" value="<?=$url;?>">
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
