<?php
	$breadcrumb = [];
	$breadcrumb[0]["title"] = "Jenis";
	$breadcrumb[0]["url"] = route("jenis.index");
?>

<!-- LAYOUT -->
@extends('layouts.main')

<!-- TITLE -->
@section('title', 'Jenis')

<!-- CONTENT -->
@section('content')
    <div class="row mb-1">
        <div class="col-12 col-sm-6">
            <h3 class="title">Master Jenis</h3>
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
        ajax: "<?=url('jenis/datatable');?>",
        columns: [
            {data: "JenisCode", name: "JenisCode"},
            {data: "JenisDesc", name: "JenisDesc"},			
            {data: "action", name: 'action', orderable: false, searchable: false}
        ],
        responsive: true,
        order : [[ 0, "desc" ]]
    });
</script>
@endsection