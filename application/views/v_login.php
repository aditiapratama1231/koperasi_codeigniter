<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Masuk - Koperasi Simpan Pinjam</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/login-style.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel="stylesheet" />
    <link href="<?php echo base_url('assets/css/datepicker2.css'); ?>" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<div class="login-page">
  <div class="form">
    <img src="<?php echo base_url('assets/img/logo-koperasi.png'); ?>" width="110px" height="105px">
      <h4>Koperasi Simpan Pinjam</h4>
    <form class="register-form" method="post" action="login/aksi_tambah_petugas">
      <input type="text" name="username" placeholder="Username"/>
      <input type="password" name="password" placeholder="password"/>
      <input type="text" name="nama" placeholder="Nama Petugas"/>
      <input type="text" name="alamat" placeholder="Alamat"/>
      <input type="text" name="no_telp" placeholder="No Telepon"/>
      <input type="text" name="tempat_lahir" placeholder="Tempat Lahir"/>
      <input type="text" name="tanggal_lahir" id="tgl_lahir" placeholder="Tanggal Lahir"/>
      <div class="content-left">
          <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Pria" style="float: right;" />
            Pria
     </div>
     <div class="content-right"> 
          <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Wanita""/>
            Wanita
    </div>  
      <button type="Submit">create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>
    <form class="login-form" method="post" action="login/aksi_login">
      <input type="text" name="username" placeholder="Username"/>
      <input type="password" name="password" placeholder="Password"/>
      <button>login</button>
      <p class="message"><a href="#"></a></p>
    </form>
  </div>
</div>

<script src="<?php echo base_url('assets/js/jquery-1.11.1.js');?>"></script>
<!-- BOOTSTRAP SCRIPTS  -->
<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/js/login.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker2.js');?>"></script>
    <script type="text/javascript">
        $('#tgl_lahir').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true
        });
    </script>