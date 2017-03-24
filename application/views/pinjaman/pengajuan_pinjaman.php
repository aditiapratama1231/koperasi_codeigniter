<?php 
    include 'header.php'
?>
<?php
    include 'nav-bar.php'
?>

        <div id="page-wrapper">
          <div class="header"> 
            <h1 class="page-header">
                Kelola Pinjaman
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
                                    <form role="form" method="post" action="<?php echo base_url('pinjaman/aksi_pengajuan_pinjaman')?>">
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <select name="id_anggota" class="form-control" onchange="get_data_saldo(this.value)" required="true">
                                                <option>...</option>
                                            <?php foreach($anggota->result() as $res) { ?>
                                                <option value="<?php echo $res->id_anggota ?>"><?php echo $res->nama ?></option>
                                            <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pinjaman</label>
                                            <select name="id_kategori" class="form-control" required="true">
                                                <?php foreach($kategori_pinjam as $res) { ?>
                                                <option value="<?php echo $res->id_kategori ?>"><?php echo $res->nama_kategori ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group" id="div-max-pinjam">
                                            <label>Saldo Simpanan Saat ini</label>
                                            <input type="text" name="saldo" class="form-control" readonly="true">
                                        </div>
                                        <div class="form-group">
                                            <label>Besar Pinjaman</label>
                                                <div class="input-group">
                                                <div class="input-group-addon">Rp.</div>
                                                <input type="text" name="besar_pinjaman" id="besar_pinjaman" class="form-control" required>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pengajuan</label>
                                            <input type="text" name="tgl_pengajuan" id="tgl_pengajuan" class="form-control" value="<?php echo date('Y-m-d'); ?>">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label>Tanggal Acc</label>
                                            <input type="text" name="tgl_acc" id="tgl_acc" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pinjam</label>
                                            <input type="text" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Pelunasan</label>
                                            <input type="text" name="tgl_pinjam" id="tgl_pelunasan" class="form-control">
                                        </div> -->
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
    <script src="<?php echo base_url('assets/js/jquery.mask.js');?>"></script>
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

        // $('#besar_pinjaman').mask('000.000.000',{reverse: true});

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