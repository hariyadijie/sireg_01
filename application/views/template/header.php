<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIREG DISDUKCAPIL BANTAENG</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/bower_components/select2/dist/css/select2.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/mystyle.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bower_components/font-awesome/css/font-awesome.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bower_components/fontawesome/css/all.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?= base_url('assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bower_components/datatables/dataTables.checkboxes.css'); ?>">
    <link rel="stylesheet"
        href="<?= base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/AdminLTE.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/tamacms/custom.css'); ?>">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet"
        href="<?= base_url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/skins/skin-blue.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('assets/plugins/pace/pace.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/jquery-nestable/jquery.nestable.css'); ?>">
    <!-- DataTables -->
    <link rel="stylesheet"
        href="<?= base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/iCheck/square/purple.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/plugins/alertify/css/alertify.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/bower_components/bootstrap-select/css/bootstrap-select.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/dist/css/tamacms/custom.css'); ?>">
    <!-- jQuery 3 -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> -->
    <!--<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">-->
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <!--<script src="" type="text/javascript"></script>-->
    <!-- Page level plugin CSS-->
    <!-- <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
    <!-- Custom styles for this template-->
    <!-- <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet"> -->
    <script src="<?php echo base_url(); ?>assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <!-- <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script> -->

    <script src="<?php echo base_url("assets/js/config_penduduk.js"); ?>"></script> <!-- Load file process.js -->
    <script src="<?php echo base_url("assets/js/jquery.min.js"); ?>"></script> <!-- Load library jquery -->

    <!-- <script>
    var baseurl = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
    var baseurl = "://".$_SERVER['HTTP_HOST'];
    var baseurl = str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
    // Buat variabel baseurl untuk nanti di akses pada file config.js
    </script> -->

    <style type="text/css">
    .pagination>li>a,
    .pagination>li>span {
        padding: 3px 10px !important;
    }
    </style>

    <script type="text/javascript">
    $(document).ready(function() {
        $("#table").DataTable({
            "language": {
                "url": "<?php echo base_url(); ?>/template/indonesian.json",
                "sEmptyTable": "Tidak ada data"
            }
        });
    });
    </script>

</head>

<body class="sidebar-mini hold-transition fixed skin-blue sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= base_url(); ?>" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <center><span class="logo-mini"><?= $this->config->item('sitename_mini') ?></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><?= $this->config->item('sitename') ?></span>
                </center>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <?php $user = $this->ion_auth->user()->row();?>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="user-image" src="<?= $this->ion_auth->user()->row()->image; ?> ">
                                <span
                                    class="hidden-xs"><?= $this->ion_auth->user()->row()->first_name; ?>&nbsp;<?= $user->last_name; ?></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img class="img-rounded" src="<?= $this->ion_auth->user()->row()->image; ?> ">
                                    <p>
                                        <?= $this->ion_auth->user()->row()->first_name; ?>&nbsp;<?= $user->last_name; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="<?= base_url(); ?>profile" class="btn btn-success btn-flat">Profil
                                            Pengguna</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?= base_url(); ?>auth/logout" class="btn btn-danger btn-flat">Sign
                                            out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img class="user-image" src="<?= $this->ion_auth->user()->row()->image; ?> ">
                    </div>
                    <div class="pull-left info">
                        <p><?= $this->ion_auth->user()->row()->first_name; ?>&nbsp;<?= $user->last_name; ?></p>
                        <a href="#"><?= $this->ion_auth->user()->row()->email; ?></a>
                    </div>
                </div>
                <!-- search form -->
                <form method="get" class="sidebar-form" id="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..." id="search-input">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <ul class="sidebar-menu list" id="menuList">
                </ul>
                <ul class="sidebar-menu list" id="menuSub">
                    <?php $menus = $this->layout->get_menu() ?>
                    <?php if (is_array($menus)) :
            foreach ($menus as $menu) : ?>
                    <li class="header"><?php echo $menu['label'] ?></li>
                    <?php if (is_array($menu['children'])) : ?>
                    <?php foreach ($menu['children'] as $menu2) : ?>
                    <li <?php echo $menu2['attr'] != '' ? ' id="' . $menu2['attr'] . '" ' : '' ?>
                        <?php echo is_array($menu2['children']) ? ' class="treeview" ' : '' ?>>
                        <?php if (is_array($menu2['children'])) : ?>
                        <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
                            <i class="<?php echo $menu2['icon'] ?>"></i> <span><?php echo $menu2['label'] ?></span><span
                                class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                        </a>
                        <ul class="treeview-menu">
                            <?php foreach ($menu2['children'] as $menu3) : ?>
                            <li class="<?= (is_array($menu3['children']))?'treeview':'';?>"
                                <?php echo $menu3['attr'] != '' ? ' id="' . $menu3['attr'] . '" ' : '' ?>>
                                <?php if (is_array($menu3['children'])) : ?>
                                <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>"
                                    class="name">
                                    <i class="<?php echo $menu3['icon'] ?>"></i>
                                    <span><?php echo $menu3['label'] ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php foreach ($menu3['children'] as $menu4) : ?>
                                    <li <?php echo $menu4['attr'] != '' ? ' id="' . $menu4['attr'] . '" ' : '' ?>>
                                        <a href="<?php echo $menu4['link'] != '#' ? base_url($menu4['link']) : '#' ?>"
                                            class="name">
                                            <i class="<?php echo $menu4['icon'] ?>"></i>
                                            <span><?php echo $menu4['label'] ?></span>
                                        </a>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                                <?php else : ?>
                                <a href="<?php echo $menu3['link'] != '#' ? base_url($menu3['link']) : '#' ?>"
                                    class="name">
                                    <i class="<?php echo $menu3['icon'] ?>"></i>
                                    <span><?php echo $menu3['label'] ?></span>
                                </a>
                                <?php endif ?>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <?php else : ?>
                        <a href="<?php echo $menu2['link'] != '#' ? base_url($menu2['link']) : '#' ?>" class="name">
                            <i class="<?php echo $menu2['icon'] ?>"></i> <span><?php echo $menu2['label'] ?>
                        </a>
                        <?php endif ?>
                    </li>
                    <?php endforeach ?>
                    <?php endif ?>
                    <?php endforeach ?>
                    <?php endif ?>

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- =============================================== -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    <?= $title; ?>
                    <small><?= $subtitle; ?></small>
                </h1>
                <?php $this->layout->breadcrumb($crumb) ?>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php $this->load->view($page); ?>