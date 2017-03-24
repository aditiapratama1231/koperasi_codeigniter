<?php 
    include 'header.php'
?>
<?php
    include 'nav-bar.php'
?>

        <div id="page-wrapper">
          <div class="header"> 
            <h1 class="page-header">
                Kelola Pengajuan Pinjaman
            </h1>                 
        </div>
        <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Ajuan Pinjaman
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                <?php foreach($pinjaman as $res){ ?>
                                    <form role="form" method="post" action="<?php echo base_url('pinjaman/aksi_pengajuan_peminjaman')?>">
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <input type="hidden" name="id_pinjaman" value="<?php echo $res->id_pinjaman ?>">
                                            <input type="hidden" name="jumlah_bulan" value="<?php echo $res->jumlah_bulan ?>">
                                            <input type="text" class="form-control" name="nama_anggota" value="<?php echo $res->nama ?>" readonly="true">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pinjaman</label>
                                            <input type="text" class="form-control" name="jenis_pinjaman" value="<?php echo $res->nama_kategori ?>" readonly="true" >
                                        </div>
                                        <div class="form-group">
                                            <label>Besar Pinjaman</label>
                                            <input type="text" name="besar_pinjaman" value="<?php echo $res->besar_pinjaman ?>" readonly="true" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pengajuan</label>
                                            <input type="text" name="tgl_pengajuan" id="tgl_pengajuan" class="form-control" readonly="true" value="<?php echo $res->tgl_pengajuan ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal acc Pengajuan</label>
                                            <input type="text" name="tgl_acc_pengajuan" id="tgl_pelunasan" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Ubah Status</label>
                                            <select name="status" class="form-control" required="true">
                                                <option value="Acc">Terima</option>
                                                <option value="Tolak">Tolak</option>
                                        </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
            $('#tgl_pengajuan').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
            $('#tgl_acc').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
            $('#tgl_pelunasan').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
            $('#tgl_pinjam').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });  
        function get_data_saldo(value){
            $.ajax({
                url: "<?php echo base_url('pinjaman/max_saldo_pinjaman_ajax') ?>",
                type: "GET",
                data: "id_anggota="+value,
                success: function(ajaxdata){
                    $("#div-max-pinjam").empty();
                    $("#div-max-pinjam").html(ajaxdata);
                }
            });
        }           
        </script>

</body>
</html>