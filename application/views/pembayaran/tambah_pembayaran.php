<?php 
    include 'header.php'
?>
<?php
    include 'nav-bar.php'
?>

        <div id="page-wrapper">
          <div class="header"> 
            <h1 class="page-header">
                Kelola Pembayaran
            </h1>                 
        </div>
        <div id="page-inner"> 
              <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Daftar Pembayaran Anggota
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" action="<?php echo base_url('pembayaran/aksi_pembayaran')?>">
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <select name="id_pinjaman" class="form-control" onchange="get_data_saldo(this.value)" required="true">
                                                <option>...</option>
                                            <?php foreach($anggota as $res) { ?>
                                                <option value="<?php echo $res->id_pinjaman ?>"><?php echo $res->nama ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div-besar-angsuran">
                                            <label>Besar Angsuran yang Harus di Bayar</label>
                                            <input type="text" name="besar_angsuran" class="form-control" readonly="true">
                                        </div>
                                        <div class="form-group" id="div-angsuran-ke">
                                            <label>Angsuran Ke-</label>
                                            <input type="text" name="angsuran_ke" readonly="true" class="form-control">
                                        </div>
                                        <div class="form-group" id="div-tgl-pembayaran">
                                            <label>Tanggal Pembayaran</label>
                                            <input type="text" name="tgl_pembayaran" id="tgl_pengajuan" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                                        </div>
                                        <div class="form-group" id="div-tgl-jatuh-tempo">
                                            <label>Tanggal Jatuh Tempo</label>
                                            <input type="text" name="tgl_jatuh_tempo" readonly="true" class="form-control">
                                        </div>
                                        <div class="form-group" id="div-denda">
                                            <label>Denda</label>
                                            <input type="text" name="denda" readonly="true" class="form-control">
                                        </div>
                                        <div class="form-group" id="div-jumlah-bayar">
                                            <label>Jumlah Bayar</label>
                                            <input type="text" name="jumlah_bayar" readonly="true" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <textarea class="form-control" name="keterangan" rows="3" style="resize: none;"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Ajukan Pinjaman</button>
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
                url: "<?php echo base_url('pembayaran/pembayaran_ajax') ?>",
                type: "GET",
                data: "id_pinjaman="+value,
                success: function(ajaxdata){
                    $("#div-besar-angsuran").empty();
                    $("#div-angsuran-ke").empty();
                    $("#div-tgl-pembayaran").empty();
                    $("#div-tgl-jatuh-tempo").empty();
                    $("#div-denda").empty();
                    $("#div-jumlah-bayar").empty();
                    $("#div-besar-angsuran").html(ajaxdata);
                }
            });
        }           
        </script>

</body>
</html>