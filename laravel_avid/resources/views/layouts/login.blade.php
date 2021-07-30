<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <meta name="author" content="AVIAN">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" href="<?=url('images/avian.png');?>">
    <link rel="shortcut icon" href="<?=url('images/avian.png');?>">

    <link rel="stylesheet" href="<?=url('vendors/mdi/css/materialdesignicons.min.css');?>">
    <link rel="stylesheet" href="<?=url('vendors/base/vendor.bundle.base.css');?>">
    <link rel="stylesheet" href="<?=url('css/style.css');?>">
</head>
    <body>
        <div class="container-scroller">
            <div class="container-fluid page-body-wrapper full-page-wrapper">
                <div class="main-panel">
                    <div class="content-wrapper d-flex align-items-center auth px-0">
                        @yield('content')
                    </div>
                </div>
            <!-- content-wrapper ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>

        <script src="<?=url('vendors/base/vendor.bundle.base.js');?>"></script>
        <script src="<?=url('js/template.js');?>"></script>
    </body>
</html>
