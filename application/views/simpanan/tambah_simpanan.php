<?php 
    include 'header.php'
?>
<?php
    include 'nav-bar.php'
?>
        <div id="page-wrapper">
          <div class="header"> 
            <h1 class="page-header">
                Kelola Simpanan
            </h1>                 
        </div>
        <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tambah Anggota Koperasi
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" action="<?php echo base_url('simpanan/aksi_simpan')?>">
                                        <div class="form-group">
                                            <label>Data Anggota</label>
                                            <select id="search" name="data_anggota" class="form-control" data-live-search="true">
                                                <option>...</option>
                                            <?php foreach ($anggota->result() as $res) { ?>
                                                <option value="<?php echo $res->id_anggota; ?>"><?php echo $res->nama; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Simpan</label>
                                            <input type="text" name="tgl_simpan" id="tgl_lahir" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Simpanan</label>
                                            <select name="jenis_simpan" class="form-control">
                                                <option>...</option>
                                            <?php foreach ($jenis_simpan->result() as $res) { ?>
                                                <option value="<?php echo $res->id_jenis; ?>"><?php echo $res->nama_simpanan; ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Besar Simpanan</label>
                                            <input type="text" name="besar_simpan" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="<?php echo base_url('assets/js/jquery-1.10.2.js') ?>"></script>
    <!-- Bootstrap Js -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
     
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url('assets/js/jquery.metisMenu.js')?>"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    
    
    <script src="assets/js/easypiechart.js"></script>
    <script src="assets/js/easypiechart-data.js"></script>
    
     <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
    
    <!-- Custom Js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="<?php echo base_url('assets/js/custom-scripts.js')?>"></script>
    <script src="<?php echo base_url('assets/js/login.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap-datepicker2.js');?>"></script>
        <script type="text/javascript">
            $('#tgl_lahir').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            $("#search").select2();
        });
        </script>

</body>

</html>