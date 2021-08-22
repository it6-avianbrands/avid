<?php
	$breadcrumb = [];
	$breadcrumb[0]["title"] = "Merk";
	$breadcrumb[0]["url"] = route("merk.index");
?>

<!-- LAYOUT -->
@extends('layouts.main')

<!-- TITLE -->
@section('title', 'Merk')

<!-- CONTENT -->
@section('content')
    <div class="row mb-1">
        <div class="col-12 col-sm-6">
            <h3 class="title">Master Merk</h3>
            @include('layouts.elements.breadcrumb',array('breadcrumb' => $breadcrumb))                
        </div>
        <div class="col-12 col-sm-6">
            @include('layouts.elements.create_button')
        </div>
    </div>
    <div class="d-block d-sm-none mt-2"></div>
    <div class="card">
        <div class="card-body">
            @include('layouts.elements.notification')
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered dataTable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th class="font-weight-bold">Kode</th>
                            <th class="font-weight-bold">Deskripsi</th>
                            <th class="font-weight-bold">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

<!-- CSS -->
@section('css')

@endsection

<!-- JAVASCRIPT -->
@section('script')
<script>
    $(".dataTable").dataTable({
        processing: true,
        serverSide: false,
        ajax: "<?=url('merk/datatable');?>",
        columns: [
            {data: "MerkCode", name: "MerkCode"},
            {data: "MerkDesc", name: "MerkDesc"},			
            {data: "action", name: 'action', orderable: false, searchable: false}
        ],
        responsive: true,
        order : [[ 0, "desc" ]]
    });
</script>
@endsection