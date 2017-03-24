<?php 
	include 'header.php'
?>
<?php
	include 'nav-bar.php'
?>

<div id="page-wrapper" >
  <div class="header"> 
    <h1 class="page-header">
        Kelola Pembayaran
    </h1>	
</div>
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
 					<div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Pembayaran Anggota
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Anggota</th>
                                            <th>Nama Anggota</th>
                                            <th>Angsuran Ke</th>
                                            <th>Tgl Pembayaran</th>
                                            <th>Tgl Jatuh Tempo</th>
                                            <th>Besar Angsuran</th>
                                            <th>Denda</th>
                                            <th>Jumlah Bayar</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	foreach($angsuran as $u) {
                                    ?>
                                       	<tr class="odd gradeX">
                                            <td><?php echo $u->id_anggota ?></td>
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->angsuran_ke ?></td>
                                            <td><?php echo $u->tgl_pembayaran ?></td>
                                            <td><?php echo $u->tgl_jatuh_tempo ?></td>
                                            <td><?php echo  "Rp.".number_format($u->besar_angsuran,"0",".",".") ?></td>
                                            <td><?php echo  "Rp.".number_format($u->denda,"0",".",".") ?></td>
                                            <td><?php echo  "Rp.".number_format($u->jumlah_bayar,"0",".",".") ?></td>
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
                             Download Report Pembayaran
                        </div>
                        <div class="panel-body">
                        <button class="btn btn-primary" onclick=location.href="<?php echo base_url('report/report_pembayaran') ?>">Download as PDF</button>
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
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- Custom Js -->
    <script src="<?php echo base_url('assets/js/custom-scripts.js'); ?>"></script>
    
   