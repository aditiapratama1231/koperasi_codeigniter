        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
<!--                  <li>
                        <a href="<?php echo base_url('petugas') ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>  -->
                    <li>
                        <a href="#"><i class="fa fa-table"></i>Petugas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('petugas') ?>">Kelola Petugas</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i>Anggota<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('anggota/tambah_anggota') ?>">Tambah Anggota</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('anggota') ?>">Kelola Anggota</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-share"></i>Simpanan Anggota<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('simpanan') ?>">Tambah Simpanan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('simpanan/jenis_simpanan') ?>">Kelola Jenis Simpanan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('simpanan/kelola_simpanan') ?>">Kelola Simpanan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-reply"></i>Pinjaman Anggota<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('pinjaman/kelola_pinjaman') ?>">Kelola Pinjaman</a>
                            </li>
<!--                             <li>
                                <a href="#">Second Level Link</a>
                            </li> -->
                            <li>
                                <a href="">Tambah Pinjaman<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="<?php echo base_url('pinjaman/pengajuan_pinjaman') ?>">Pengajuan Pinjaman</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('pinjaman/daftar_acc_peminjaman') ?>">Persetujuan Pinjaman</a>
                                    </li>
<!--                                     <li>
                                        <a href="#">Third Level Link</a>
                                    </li> -->

                                </ul>

                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-share"></i>Pembayaran Pinjaman<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="<?php echo base_url('pembayaran/tambah_pembayaran') ?>">Bayar Pinjaman</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('pembayaran/kelola_pembayaran') ?>">Kelola Pembayaran</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url('shu') ?>"><i class="fa fa-money"></i>Sisa Hasil Usaha</a>
                    </li>
                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
      