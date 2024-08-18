<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistem Informasi Gudang</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/template') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/template') ?>/bower_components/font-awesome/css/font-awesome.min.css" />
    <!-- Ionicons -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/template') ?>/bower_components/Ionicons/css/ionicons.min.css" />
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/css/AdminLTE.min.css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/dist/css/skins/_all-skins.min.css" />
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?= base_url('assets/template') ?>/bower_components/morris.js/morris.css" />
    <!-- jvectormap -->

    <!-- Date Picker -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/template') ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
    <!-- Daterange picker -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/template') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/template') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" />
    <!-- Data Tables -->
    <link
        rel="stylesheet"
        href="<?= base_url('assets/template') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue layout-top-nav">
    <header class="main-header ">
        <nav class="navbar navbar-static-top ">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="<?= base_url('data_kategori') ?>" class="navbar-brand"><b>Sistem Informasi Gudang</b></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?= $this->uri->segment(1) == 'data_kategori' ? 'active' : '' ?>"><a href="<?= base_url("data_kategori") ?>">Data Kategori <span class="sr-only">(current)</span></a></li>
                        <li class="<?= $this->uri->segment(1) == 'data_barang' ? 'active' : '' ?>"><a href="<?= base_url("data_barang") ?>">Data Barang</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

            </div>
        </nav>
    </header>