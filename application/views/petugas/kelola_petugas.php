<?php 
    include 'header.php'
?>
<?php
    include 'nav-bar.php'
?>

<div id="page-wrapper" >
  <div class="header"> 
    <h1 class="page-header">
        Kelola Petugas
    </h1>   
</div>
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Daftar Petugas Koperasi
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
                                            <th>Keterangan</th>
<!--                                             <th>Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($petugas as $u) {
                                    ?>
                                        <tr class="odd gradeX">
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->no_telp ?></td>
                                            <td><?php echo $u->alamat ?></td>
                                            <td><?php echo $u->tempat_lahir.",".$u->tanggal_lahir ?></td>
                                            <td><?php echo $u->j_kelamin ?></td>
                                            <td><?php echo $u->keterangan ?></td>
<!--                                             <td class="center">
                                                <button class="btn btn-primary" onclick="window.location= '<?php echo base_url('anggota/edit/'.$u->id_anggota) ?>'">Edit</button>
                                            </td> -->
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
    
   