<?php 
    include 'header.php'
?>
<?php
    include 'nav-bar.php'
?>

<div id="page-wrapper" >
  <div class="header"> 
    <h1 class="page-header">
        Kelola Simpanan
    </h1>   
</div>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Data Anggota 
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama Anggota</th>
                                            <th>No Telepon</th>
                                            <th>Alamat</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Status</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($anggota->result() as $u) {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->no_telp ?></td>
                                            <td><?php echo $u->alamat ?></td>
                                            <td><?php echo $u->tempat_lahir ?></td>
                                            <td><?php echo $u->j_kelamin ?></td>
                                            <td><?php echo $u->status ?></td>
                                            <td><?php echo $u->keterangan ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 Simpanan Wajib
                             </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form" method="post" action="<?php echo base_url('simpanan/aksi_simpan')?>">
                                        <?php foreach($anggota->result() as $res){ ?>
                                        <div class="form-group">
                                            <label>Nama Anggota</label>
                                            <input type="text" name="nama_anggota" class="form-control" disabled="true" value="<?php echo $res->nama ?>" required>
                                            <input type="hidden" name="id_anggota" value="<?php echo $res->id_anggota ?>">
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Tanggal Simpan</label>
                                            <input type="text" name="tgl_simpan" id="tgl_lahir" class="form-control" value="<?php echo date('Y-m-d'); ?>" required>
                                        </div>
                                        <?php foreach($jenis_simpan->result() as $res){ ?>
                                        <div class="form-group">
                                            <label>Jenis Simpanan</label>
                                            <input type="text" name="jenis_simpan" class="form-control" disabled="true" value="<?php echo $res->nama_simpanan ?>" required>
                                            <input type="hidden" name="id_jenis" value="<?php echo $res->id_jenis ?>">
                                        </div>
                                        <?php } ?>
                                        <div class="form-group">
                                            <label>Besar simpanan</label>
                                                <div class="input-group">
                                                    <div class="input-group-addon">Rp.</div>
                                                    <input type="text" name="besar_simpanan" id="besar_simpanan" class="form-control" required>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Bulan Ke-</label>
                                            <input type="text" readonly="true" name="bulan" class="form-control" value="<?php echo $bulan ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tahun ke</label>
                                            <input type="text" readonly="true" name="tahun" class="form-control" value="<?php echo $tahun ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                    </div>
            </div>
        </div>
    </div>

     <script src="<?php echo base_url('assets/js/jquery-1.10.2.js'); ?>"></script>
      <!-- Bootstrap Js -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <!-- Metis Menu Js -->
    <script src="<?php echo base_url('assets/js/jquery.metisMenu.js');?>"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="<?php echo base_url('assets/js/dataTables/jquery.dataTables.js')?>"></script>
    <script src="<?php echo base_url('assets/js/dataTables/dataTables.bootstrap.js');?>"></script>
<!--         <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script> -->
         <!-- Custom Js -->
    <script src="<?php echo base_url('assets/js/custom-scripts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.mask.js');?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker2.js');?>"></script>
        <script type="text/javascript">
            $('#tgl_lahir').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true
            });
             // $('#besar_simpanan').mask('000.000.000',{reverse: true});
        </script>