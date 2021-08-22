@php
	$breadcrumb = [];
	$breadcrumb[0]["title"] = "Ukuran";
	$breadcrumb[0]["url"] = route("ukuran.index");
	$breadcrumb[1]["title"] = "Create";
	$breadcrumb[1]["url"] = route("ukuran.create");
	if (isset($data)){
		$breadcrumb[1]["title"] = "Edit";
		$breadcrumb[1]["url"] = route("ukuran.edit",["ukuran" => $data->UkuranCode]);
	}

    $form_data = [
        "code" => isset($data) ? $data->UkuranCode : old("code"),
        "description" => isset($data) ? $data->UkuranDesc : old("description")
    ];

    $form_settings = [
        "method" => isset($data) ? "PUT" : "POST",
        "mode" => isset($data) ? "Edit" : "Create",
        "url" => isset($data) ? route("ukuran.update", ["ukuran" => $data->UkuranCode]) : route("ukuran.index")
    ]

    /*$code = old("code");
    $description = old("description");
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
    }*/
@endphp

@extends('layouts.main')

@section('title', 'Ukuran')

@section('content')
    <div class="row mb-1">
        <div class="col-12 col-sm-6">
            <h3 class="title">Master Ukuran | {{ $form_settings['mode'] }}</h3>
            @include('layouts.elements.breadcrumb',array('breadcrumb' => $breadcrumb))                
        </div>
        <div class="col-12 col-sm-6">
            @include('layouts.elements.back_button')
        </div>
    </div>
    <div class="d-block d-sm-none mt-2"></div>
    <div class="card">
        <div class="card-body">
            {{ Form::open(['url' => $form_settings['url'], 'method' => $form_settings['method']]) }}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Kode Ukuran</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="Kode" name="UkuranCode" required="required" {{ isset($data) ? "disabled" : "autofocus" }} value="{{ $form_data['code'] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Ukuran</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" placeholder="Nama" name="UkuranDesc" required="required" {{ isset($data) ? "autofocus" : "" }} value="{{ $form_data['description'] }}">
                    </div>
                </div>
                @include('layouts.elements.submit_button')
            {{ Form::close() }}
        </div>
    </div>
@endsection
