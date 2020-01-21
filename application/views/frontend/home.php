<?= $this->session->flashdata('message');  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Kursus Mengemudi - Mitra Utama</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Favicon-->
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url() ?>assets/img/favicon.ico">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
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

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo base_url('home') ?>" class="navbar-brand"><b>Mitra</b>Utama</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <li <?=$this->uri->segment(1) == 'home' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>><a href="<?php echo base_url('home') ?>"><i class="fa fa-home"> Home</i></a></li>
              <?php 
              if ($this->session->userdata('aktif') == TRUE) {
                echo '<li><a href="profile"><i class="fa fa-user"> Profile</i></a></li>';
              }else{
                echo '<li>
                <a href="#" data-toggle="modal" data-target="#login">
                <!-- The user image in the navbar-->
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span>Login</span>
                </a>
                </li>
                <li>
                <a href="#" data-toggle="modal" data-target="#register">
                <!-- The user image in the navbar-->
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span>Register</span>
                </a>
                </li>';
              }
              ?>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
          <?php if ($this->session->userdata('aktif') == TRUE): ?>
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="<?= base_url('assets/img/').$this->session->userdata('foto')?>" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?= $this->session->userdata('nama')?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="<?= base_url('assets/img/').$this->session->userdata('foto')?>" class="img-circle" alt="User Image">

                      <p>
                        <?= $this->session->userdata('nama')?>
                        <small><?= $this->session->userdata('jabatan')?></small>
                      </p>
                    </li>
                    <!-- Menu Body -->
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="<?= base_url('profile')?>" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?= base_url('login/logout')?>" class="btn btn-default btn-flat">Log Out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div> 
          <?php endif ?>
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <style>
      .container-fluid {
        padding: 60px 50px;
      }
      .logo-small {
        color: #3c8dbc;
        font-size: 50px;
      }
      .logo {
        color: #3c8dbc;
        font-size: 200px;
      }
      .bg-grey {
        background-color: #f6f6f6;
      }
      .bg-white {
        background-color: #f6f6f6;
      }
      .carousel-control.right, .carousel-control.left {
        background-image: none;
        color: #3c8dbc;
      }
      .carousel-indicators li {
        border-color: #3c8dbc;
      }
      .carousel-indicators li.active {
        background-color: #3c8dbc;
      }
      .item h4 {
        font-size: 19px;
        line-height: 1.375em;
        font-weight: 400;
        font-style: italic;
        margin: 70px 0;
      }
      .item span {
        font-style: normal;
      }
      .ins {
        color: #f6f6f6;
      }
    </style>

    <div class="container-fluid">
      <div class="jumbotron text-center">
        <h1>Mitra Utama Mengemudi</h1>      
        <p>Sebuah Kursus Mengemudi di Kota Pontianak, Terpercaya dan Terjamin</p>
      </div>    
    </div>

    <div id="about" class="container-fluid bg-grey">
      <div class="row">
        <div class="col-sm-8">
          <h2>Tentang Perusahaan</h2><br>
          <h4>Mitra Utama adalah Lembaga Kursus Mengemudi yang terletak di Kota Pontianak tepatnya di Jl. Sumatera tepat disebelah Bakso Ikan Telur Asin.</h4><br>
          <p>Berawal dari perkumpulan instruktur mengemudi yang kemudian membentuk lembaga kursus yang bernama CV. Bina Sarana Mengemudi. Mitra Utama merupakan lembaga yang sebelumnya menyatu dengan CV. Bina Sarana, namun saat ini bediri sendiri, bertujuan untuk melatih seseorang untuk dapat mengendarai mobil dengan baik dan benar, dan telah mendapatkan SK Dinas No. 72/KEP/2018.</p>
          <br>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-signal logo"></span>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <img src="<?= base_url('assets/img/mobil.jpg') ?>" alt="Los Angeles">
          </div>

          <div class="item">
            <img src="<?= base_url('assets/img/mobil.jpg') ?>" alt="Chicago">
          </div>

          <div class="item">
            <img src="<?= base_url('assets/img/mobil.jpg') ?>" alt="New York">
          </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <div id="services" class="container-fluid text-center bg-grey">
      <h2>LAYANAN</h2>
      <h4>Kami Menawarkan</h4>
      <br>
      <div class="row slideanim">
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-user logo-small"></span>
          <h4>INSTRUKTUR</h4>
          <p>Terbaik dan Berpengalaman</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-certificate logo-small"></span>
          <h4>SERTIFIKAT</h4>
          <p>Bukti telah memenuhi persyaratan mengemudi</p>
        </div>
        <div class="col-sm-4">
          <span class="glyphicon glyphicon-credit-card logo-small"></span>
          <h4>SIM</h4>
          <p>Langsung mendapatkan Surat Izin Mengemudi</p>
        </div>
      </div>
    </div>

    <div class="container-fluid text-center">
      <h2 class="ins">Instruktur</h2><br>
      <h4 class="ins">Terbaik dan Berpengalaman</h4>
      <div class="row text-center slideanim">
        <?php foreach ($instruktur as $i) { ?>
          <div class="col-sm-4">
            <div class="thumbnail">
              <img src="<?= base_url('assets/img/').$i->foto ?>" alt="Paris" width="200" height="150">
              <p><strong><?= $i->nm_instruktur ?></strong></p>
              <p>Instruktur</p>
              <p>Instruktur Terbaik dan Berpengalaman, Mengajari dengan sabar dan penuh tanggung jawab.</p>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <div class="container-fluid text-center bg-grey">
      <h2>Testimoni</h2>
      <div id="myCarouse2" class="carousel slide text-center" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarouse2" data-slide-to="0" class="active"></li>
          <li data-target="#myCarouse2" data-slide-to="1"></li>
          <li data-target="#myCarouse2" data-slide-to="2"></li>
          <li data-target="#myCarouse2" data-slide-to="3"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <h4>"Instruktur Terbaik dan Berpengalaman"<br><span>Admin</span></h4>
          </div>
          <?php foreach ($testi as $t) {?>
            <div class="item">
              <h4>"<?= $t->testimoni?>"<br><span><?= $t->nm_peserta?></span></h4>
            </div>
          <?php } ?>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarouse2" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarouse2" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>

    <iframe width="1350" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=X84J%2B5Q%20Kec.%20Pontianak%20Sel.%2C%20Kota%20Pontianak%2C%20Kalimantan%20Barat&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

    <div class="modal modal fade" id="login">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Login</h4>
            </div>
            <div class="modal-body">
              <form method="post" action="<?= base_url('auth/action')?>">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password">
                </div>
                <span><a href="#" data-toggle="modal" data-target="#forgot" data-dismiss="modal">Lupa Password</a></span><br>
                <span>Belum punya akun? <a href="#" data-dismiss="modal" data-toggle="modal" data-target="#register">Daftar!</a></span>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-default">Login</button>
              </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.content-wrapper -->

      <div class="modal modal fade" id="register">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Register</h4>
              </div>
              <div class="modal-body">
                <form method="post" action="<?= base_url('home/reg')?>">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" required="" class="form-control" id="nama" placeholder="Nama" value="<?= set_value('nama') ?>">
                  </div>
                  <div class="form-group">
                    <label for="jns_kel">Jenis Kelamin</label><br>
                    <select name="jns_kel" class="form-control" >
                      <option value="Laki-Laki">Laki-Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="tmpt_lahir">Tempat Lahir</label>
                    <input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" placeholder="Tempat Lahir" required="" value="<?= set_value("tmpt_lahir")?>">
                  </div>
                  <div class="form-group">
                    <label for="tgl_lahir">Tanggal Lahir</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="tgl_lahir" placeholder="Tanggal Lahir" type="text" required="" value="<?= set_value('tgl_lahir') ?>" id="datepicker" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="Pekerjaan">Pekerjaan</label>
                    <input type="text" class="form-control" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan" required="" value="<?= set_value("pekerjaan")?>">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" name="alamat" required="" placeholder="Alamat"><?= set_value('alamat') ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="no_telp">Nomor Telepon</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon" required="" value="<?= set_value("no_telp")?>">
                  </div>
                  <div class="form-group <?php echo form_error('username') ? 'has-error' : null ?>">
                    <label for="username">Username</label>
                    <input type="username" class="form-control" name="username" id="username" placeholder="Username" required="" value="<?= form_error('username') ? '' : set_value("username")?>">
                    <span class="help-block"><?php echo validation_errors(); ?></span>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <span>Sudah Punya Akun? <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">Login!</a></span>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-default">Daftar</button>
                </div>
              </form>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

        <div class="modal fade" id="forgot">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Lupa Password</h4>
                </div>
                <div class="modal-body">
                  <p>Silahkan hubungi admin untuk mereset ulang password anda.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
            <div class="container">
              <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
              </div>
              <strong>Copyright &copy; 2019 <a href="https://bimafebri.blogspot.com">Bima Febriansyah</a>.</strong> All rights
              reserved.
            </div>
            <!-- /.container -->
          </footer>
        </div>
        <div class="modal fade" id="wrong">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pemberitahuan</h4>
                </div>
                <div class="modal-body">
                  <p>Username atau Password Salah</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>

        <div class="modal fade" id="warning">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pemberitahuan</h4>
                </div>
                <div class="modal-body">
                  <p>Password yang anda masukan salah saat mencoba merubah password. Silahkan <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">Login</a> kembali untuk melanjutkan.</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>

        <div class="modal fade" id="finally">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pemberitahuan</h4>
                </div>
                <div class="modal-body">
                  <p>Selesai, Pembayaran akan diproses dalam waktu 3x24 jam. Mohon tunggu ya&hellip;</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>

        <div class="modal fade" id="succes">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pemberitahuan</h4>
                </div>
                <div class="modal-body">
                  <p>Akun Berhasil Dibuat, Login untuk melanjutkan. <a href="#" data-toggle="modal" data-target="#login" data-dismiss="modal">Klik Disini!</a></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
        </div>

        <div class="modal fade" id="failed">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Pemberitahuan</h4>
                </div>
                <div class="modal-body">
                  <p>Akun anda telah melakukan 3x pembayaran tidak valid, akun anda nonaktif secara permanen!</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
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
        <!-- InputMask -->
        <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <!-- bootstrap datepicker -->
        <script src="<?php echo base_url() ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
        <script>
          $(function(){
            $('#datemask').inputmask('yyyy-mm-dd', { 'placeholder': 'yyyy-mm-dd' })
            $('[data-mask]').inputmask()
            $('#datepicker').datepicker({
              format: 'yyyy-mm-dd',
              autoclose: true
            })
          })
        </script>
        <?= $this->session->flashdata('message');  ?>
      </body>
      </html>
