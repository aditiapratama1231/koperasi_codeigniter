<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Petugas - Koperasi Simpan Pinjam</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/datepicker2.css'); ?>" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">

                    <img src="<?php echo base_url('assets/img/logo.png') ?>" />
                </a>

            </div>

            <div class="left-div">
                <i class="fa fa-user-plus login-icon" ></i>
        </div>
            </div>
        </div>
    <!-- LOGO HEADER END-->
<!--     <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.html">Dashboard</a></li>
                            <li><a href="ui.html">Kelola Petugas</a></li>
                            <li><a href="table.html">Kelola Simpanan</a></li>
                            <li><a href="forms.html">Kelola Pinjaman</a></li>
                             <li><a href="login.html">Login Page</a></li>
                            <li><a href="blank.html">Blank Page</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section> -->
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
              <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Tambah Petugas Koperasi</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12   ">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Petugas
                        </div>
                        <div class="panel-body">
                       <?php echo form_open('login/aksi_tambah_petugas'); ?>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Anggota</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Anggota" />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <textarea class="form-control" style="resize:none; height:150px;" name="alamat"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">No Telepon</label>
                            <input type="text" class="form-control" name="no_telp" placeholder="No Telepon" />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" />
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input type="text" id="tgl_lahir" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" />
                          </div>
                         <div class="form-group">
                           <label for="exampleInputEmail1">Jenis Kelamin</label><br>
                             <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="pria" />
                                Pria
                             <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="wanita" />
                                Wanita
                         </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <textarea class="form-control" style="resize:none; height:150px;" name="keterangan"></textarea>
                          </div>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        <?php echo form_close(); ?>
                      </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 SMKN 1 CIMAHI | By : Aditia Pratama</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.1.js');?>"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker2.js');?>"></script>
    <script type="text/javascript">
        $('#tgl_lahir').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    </script>
</body>
</html>
