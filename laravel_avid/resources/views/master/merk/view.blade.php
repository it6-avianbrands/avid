@php
	$breadcrumb = [];
	$breadcrumb[0]["title"] = "Merk";
	$breadcrumb[0]["url"] = route("merk.index");
    
    if (isset($data)){
        $breadcrumb[1]["title"] = "View";
        $breadcrumb[1]["url"] = route("merk.show",["merk" => $data->MerkCode]);
    }
    
    $form_data = [
        "code" => isset($data) ? $data->MerkCode : "",
        "description" => isset($data) ? $data->MerkDesc : "",
        "created_date" => isset($data) ? date('d-m-Y H:i:s', strtotime($data->CreatedDate)) : "",
        "modified_date" => isset($data) ? date('d-m-Y H:i:s', strtotime($data->ModifiedDate)) : "",
        "created_by" => isset($data) ? $data->CreatedBy : "",
        "modified_by" => isset($data) ? $data->ModifiedBy : ""
    ];

@endphp

@extends('layouts.main')

@section('title', 'Merk')

@section('content')
    <div class="row mb-1">
        <div class="col-12 col-sm-6">
            <h3 class="title">Master Merk | View</h3>
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
                    <label class="col-sm-3 col-form-label">Kode Merk</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="{{ $form_data["code"] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nama Merk</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control" disabled value="{{ $form_data["description"] }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Dibuat Tanggal</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="{{ $form_data["created_date"] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Dibuat Oleh</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="{{ $form_data["created_by"] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Diedit Tanggal</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="{{ $form_data["modified_date"] }}">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Diedit Oleh</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" disabled value="{{ $form_data["modified_by"] }}">
                    </div>
                </div>

            {{ Form::close() }}
        </div>
    </div>
@endsection
