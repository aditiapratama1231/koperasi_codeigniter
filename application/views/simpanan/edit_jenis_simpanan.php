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
                            Ubah Data Jenis Simpanan
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <?php foreach($jenis_simpanan as $u) { ?>
                                    <form role="form" method="post" action="<?php echo base_url('simpanan/update_data_jenis_simpanan')?>">
                                        <div class="form-group">
                                            <label>Nama Jenis Simpanan</label>
                                            <input type="hidden" name="id_jenis" value="<?php echo $u->id_jenis ?>">
                                            <input type="text" readonly="true" name="nama_jenis_simpanan" value="<?php echo $u->nama_simpanan ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Besar Simpanan</label>
                                            <input type="text" name="besar_simpanan" value="<?php echo $u->besar_simpanan ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tipe Simpanan</label>
                                            <input type="text" readonly="true" name="tipe_simpanan" value="<?php echo $u->type ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" value="<?php echo $u->keterangan ?>" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Edit Data</button>
                                    </form>
                                    <?php } ?>
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

</body>

</html>