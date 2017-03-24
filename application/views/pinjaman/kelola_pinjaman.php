<?php 
	include 'header.php'
?>
<?php
	include 'nav-bar.php'
?>

<div id="page-wrapper" >
  <div class="header"> 
    <h1 class="page-header">
        Kelola  Pinjaman
    </h1>	
</div>
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
 					<div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Pinjaman
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                               <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Id Anggota</th>
                                            <th>Nama Anggota</th>
                                            <th>Jenis Pinjaman</th>
                                            <th>Besar Pinjaman</th>
                                            <th>Status</th>
                                            <th>Tgl Pengajuan</th>
                                            <th>Tgl Pelunasan</th>
                                            <th>Bunga</th>
                                            <th>Keterangan</th>
                                            <!-- <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    	foreach($pinjaman as $u) {
                                    ?>
                                       	<tr class="odd gradeX">
                                            <td><?php echo $u->id_anggota ?></td>
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->nama_kategori ?></td>
                                            <td><?php echo "Rp. &nbsp;".number_format($u->besar_pinjaman,"0",".",".") ?></td>
                                            <td><?php echo $u->status ?></td>
                                            <td><?php echo $u->tgl_pengajuan ?></td>
                                            <td><?php echo $u->tgl_pelunasan ?></td>
                                            <td><?php echo "Rp. &nbsp;".number_format($u->bunga,"0",".",".") ?></td>
                                            <td><?php echo $u->keterangan ?></td>
<!--                                             <td class="center">
                                            	<button class="btn btn-primary" onclick="window.location= '<?php echo base_url('pinjaman/pengajuan_peminjaman/'.$u->id_pinjaman) ?>'">Edit</button>
                                            </td> -->
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Download Report Pinjaman
                        </div>
                        <div class="panel-body">
                        <button class="btn btn-primary" onclick=location.href="<?php echo base_url('report/report_pinjaman') ?>">Download as PDF</button>
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
    
    