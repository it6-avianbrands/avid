<?php
    $userinfo = session("userinfo");
	$avatar = url("images/noprofileimage.png");
	if (isset($userinfo["avatar"])){
		$avatar = url($userinfo["avatar"]);
	}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="robots" content="all,follow">
        <meta name="author" content="AVIAN">
        <title>AVID | @yield('title')</title>
        <link rel="apple-touch-icon" href="<?=url('images/avian.png');?>">
        <link rel="shortcut icon" href="<?=url('images/avian.png');?>">

        <link rel="stylesheet" type="text/css" href="<?=url('vendors/datatables/datatables.min.css');?>"/>
 
        <link rel="stylesheet" href="<?=url('vendors/mdi/css/materialdesignicons.min.css');?>">
        <link rel="stylesheet" href="<?=url('vendors/base/vendor.bundle.base.css');?>">
        <link rel="stylesheet" href="<?=url('css/style.css');?>">
        <link rel="stylesheet" href="<?=url('css/custom.css');?>">
    </head>
    <body>
        <div class="container-scroller">
            <div class="horizontal-menu">
                @include('layouts.partials.header')
                @include('layouts.partials.menu')
            </div>
            <div class="container-fluid page-body-wrapper">
                <div class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                    @include('layouts.partials.footer')
                </div>
                <!-- page-body-wrapper ends -->
            </div>
        </div>

        <script src="<?=url('vendors/base/vendor.bundle.base.js');?>"></script>
        <script src="<?=url('js/template.js');?>"></script>
        <script src="<?=url('vendors/chart.js/Chart.min.js');?>"></script>
        <script src="<?=url('vendors/progressbar.js/progressbar.min.js');?>"></script>
        <script src="<?=url('vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js');?>"></script>
        <script src="<?=url('vendors/justgage/raphael-2.1.4.min.js');?>"></script>
        <script src="<?=url('vendors/justgage/justgage.js');?>"></script>
        <script src="<?=url('vendors/datatables/datatables.min.js');?>"></script>

        <script>
            function deleteData(dt){
                if (confirm("Apakah anda yakin menghapus data ini?")) {
                    $.ajax({
                        type:"POST",
                        url:$(dt).data("url"),
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "delete"
                        },				
                        success:function(response){
                            if(response.status){
                                location.reload();
                            }
                        },
                        error: function(response){
                            console.log(response);
                        }
                    });
                }
                return false;
            }
        </script>     
        @yield('script')
    </body>
</html>