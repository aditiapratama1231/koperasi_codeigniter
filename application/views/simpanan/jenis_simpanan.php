<?php 
	include 'header.php'
?>
<?php
	include 'nav-bar.php'
?>

<div id="page-wrapper" >
  <div class="header"> 
    <h1 class="page-header">
        Kelola Jenis Simpanan
    </h1>	
</div>
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
 					<div class="panel panel-default">
                        <div class="panel-heading">
                             Data Jenis Simpanan
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nama Simpanan</th>
                                            <th>Besar Simpanan</th>
                                            <th>Tipe Simpanan</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	foreach($jenis_simpan->result() as $u) {
                                    ?>
                                       	<tr class="odd gradeX">
                                            <td><?php echo $u->nama_simpanan ?></td>
                                            <td><?php echo "Rp.".number_format($u->besar_simpanan,"0",".",".") ?></td>
                                            <td><?php echo $u->type ?></td>
                                            <td><?php echo $u->keterangan ?></td>
                                            <td>
                                                <button class="btn btn-primary" onclick="window.location= '<?php echo base_url('simpanan/edit/'.$u->id_jenis) ?>'">Edit</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
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
    
   