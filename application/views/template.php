
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Kursus Mitra Utama</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicon-->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/favicon.ico">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- DataTables-->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/skins/_all-skins.min.css">
   <!-- daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap datepicker -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Bootstrap time Picker -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">
   <!-- daterange picker -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-daterangepicker/daterangepicker.css">
   <!-- bootstrap datepicker -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
   <!-- Bootstrap time Picker -->
   <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/timepicker/bootstrap-timepicker.min.css">


   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>M</b>U</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Mitra</b>Utama</span>
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
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url('assets/img/').$this->session->userdata('foto'); ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $this->session->userdata('nama')?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url('assets/img/').$this->session->userdata('foto'); ?>" class="img-circle" alt="User Image">

                  <p>
                    <?= $this->session->userdata('nama')?>
                    <small><?= $this->session->userdata('jabatan')?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?= base_url('dashboard')?>" class="btn btn-default btn-flat">Edit Profil</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('login/logout')?>" class="btn btn-default btn-flat">Log out</a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
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
            <img src="<?= base_url('assets/img/').$this->session->userdata('foto'); ?>" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?= $this->session->userdata('nama') ?></p>
            <a href="<?= base_url('dashboard')?>"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
          <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
          </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <?php if ($this->session->userdata('jabatan') == "Administrator") { ?>
            <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
              <a href="<?= base_url('/dashboard') ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
              <li <?=$this->uri->segment(1) == 'instruktur' ? 'class="active"' : '' ?>>
                <a href="<?= base_url('/instruktur') ?>"><i class="fa fa-user"></i> <span>Instruktur</span></a></li>
                <li <?=$this->uri->segment(1) == 'siswa' ? 'class="active"' : '' ?>>
                  <a href="<?= base_url('/siswa') ?>"><i class="fa fa-users"></i> <span>Siswa</span></a></li>
                  <li <?=$this->uri->segment(1) == 'pembayaran' ? 'class="active"' : '' ?>>
                    <a href="<?= base_url('/pembayaran') ?>"><i class="fa fa-money"></i> <span>Pembayaran</span></a></li>
                    <li <?=$this->uri->segment(1) == 'rekening' ? 'class="active"' : '' ?>>
                      <a href="<?= base_url('/rekening') ?>"><i class="fa fa-dollar"></i> <span>Rekening</span></a></li>
                      <li <?=$this->uri->segment(1) == 'sertifikat' ? 'class="active"' : 'class="hidden-xs"' ?>>
                        <a href="<?= base_url('/sertifikat') ?>"><i class="fa fa-certificate"></i> <span>Sertifikat</span></a></li>
                      <?php }else{ ?>
                        <li <?=$this->uri->segment(1) == 'dashboard2' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
                          <a href="<?= base_url('/dashboard2') ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
                          <li <?=$this->uri->segment(1) == 'peserta' ? 'class="active"' : '' ?>>
                            <a href="<?= base_url('/peserta') ?>"><i class="fa fa-users"></i> <span>Siswa</span></a></li>
                            <li <?=$this->uri->segment(1) == 'jadwal' ? 'class="active"' : '' ?>>
                              <a href="<?= base_url('/jadwal') ?>"><i class="fa fa-calendar"></i> <span>Jadwal</span></a></li>
                              <li <?=$this->uri->segment(1) == 'penilaian' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('/penilaian') ?>"><i class="fa fa-pencil"></i> <span>Penilaian</span></a></li>
                              <?php } ?>
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
                              <i class="fa <?= $title_icon; ?>"></i> <?= $title; ?>
                              <small>Control Panel</small>
                            </h1>
                            <ol class="breadcrumb">
                              <li><a href="<?= base_url().$this->uri->segment(1)?>"><i class="fa <?= $breadcrumb_icon; ?>"></i> <?= ucwords($this->uri->segment(1))?></a></li>
                              <li class="active"><?= $title; ?></li>
                            </ol>
                          </section>

                          <!-- Main content -->
                          <section class="content">
                            <?= $contents; ?>
                          </section>
                          <!-- /.content -->
                        </div>
                        <!-- /.content-wrapper -->

                        <footer class="main-footer no-print">
                          <div class="pull-right hidden-xs">
                            <b>Version</b> 1.0.0
                          </div>
                          <strong>Copyright &copy; 2019 <a href="#">Bima Febriansyah</a>.</strong> All rights
                          reserved.
                        </footer>

                        <!-- Control Sidebar -->
                        <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 <script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
 <!-- Bootstrap 3.3.7 -->
 <script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 <!-- SlimScroll -->
 <script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
 <!-- FastClick -->
 <script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
 <!-- AdminLTE App -->
 <script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
 <script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
 <script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
 <!-- InputMask -->
 <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
 <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
 <!-- bootstrap datepicker -->
 <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
 <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
    $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
    $('[data-mask]').inputmask()
    $('#datepicker').datepicker({
      format: 'yyyy-mm-dd',
      autoclose: true
    })
  })
</script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<?= $this->session->flashdata('message1');  ?>
</body>
</html>
