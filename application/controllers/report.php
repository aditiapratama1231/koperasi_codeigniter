<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller 
{
  function __construct(){
    parent::__construct();
    if($this->session->userdata('status') != "login"){
      redirect("login");
    }
    $this->load->model('m_simpanan');
    $this->load->model('m_pinjaman');
    $this->load->model('m_pembayaran');
    $this->load->model('m_shu');
    $this->load->helper('url');
  }

  // function index()
  // {
  //   $data['onclick_report'] = site_url()."report/cetak/"; // button report
  //   $this->load->view('transaksi_view', $data);
  // }

  function report_simpanan()
  {

    // ambil data dengan memanggil fungsi di model
    $temp_rec = $this->m_simpanan->tampil_simpanan();
    $num_rows = $temp_rec->num_rows();

    if($num_rows > 0) // jika data ada di database
    {
      // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
      $a=new reportProduct();
      // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
      // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
      $a->setKriteria("simpanan");
      // judul report
      $a->setNama("LAPORAN SIMPANAN SEMUA ANGGOTA ");
      // buat halaman
      $a->AliasNbPages();
      // Potrait ukuran A4
      $a->AddPage("P","A4");
      // $a->Header();

      // ambil data dari database
      $data=$temp_rec->row();

      // $a->Ln(2); // spasi enter
      // $a->SetFont('Arial','B',8); // set font,size,dan properti (B=Bold)
      // $a->Cell(0,4,'Kode Barang : '.$data->id_anggota,0,1,'L');
      // $a->Cell(0,4,'Nama Barang : '.$data->nama,0,1,'L');
      // $a->Cell(0,4,'Harga Satuan : '.number_format($data->besar_simpanan,"0",".","."),0,1,'L');
      $a->Ln(2);
      // $a->setLeftMargin(35,0);
      $a->SetFont('Arial','',8);
      // set lebar tiap kolom tabel transaksi
      $a->SetWidths(array(7,45,25,30,30,30,10,10));
      // set align tiap kolom tabel transaksi
      $a->SetAligns(array("C","C","C","C","C","C"));
      $a->SetFont('Arial','B',7);
      $a->Ln(5);
      // set nama header tabel transaksi
      $a->cell(2);
      $a->Cell(7,7,'No.',1,0,'C');
      $a->Cell(45,7,'NAMA ANGGOTA',1,0,'C');
      $a->Cell(25,7,'JENIS SIMPANAN',1,0,'C');
      $a->Cell(30,7,'BESAR SIMPANAN',1,0,'C');
      $a->Cell(30,7,'TANGGAL SIMPANAN',1,0,'C');
      $a->Cell(30,7,'KETERANGAN',1,0,'C');
      $a->Cell(10,7,'BULAN',1,0,'C');
      $a->Cell(10,7,'TAHUN',1,0,'C');
      $a->Ln(7);

      $a->SetFont('Arial','',8);
      $rec = $temp_rec->result();
      $n=0;
      foreach($rec as $r)
      {
        $n++;
        $a->cell(2);
        $a->Row(array(($n), 
          $r->nama, 
          $r->nama_simpanan, 
          "Rp.".number_format($r->besar_simpanan,"0",".","."),
          date("d-m-Y", strtotime($r->tgl_simpanan)),
          $r->keterangan,
          $r->bulan,
          $r->tahun
          ));
      }

      $a->Output("Laporan_simpanan.pdf","I");
    }
    else // jika data kosong
    {
      redirect('report');
    }

    exit();
  }

  function report_pinjaman()
  {

    // ambil data dengan memanggil fungsi di model
    $temp_rec = $this->m_pinjaman->cek_anggota_status();
    $num_rows = $temp_rec->num_rows();

    if($num_rows > 0) // jika data ada di database
    {
      // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
      $a=new reportProduct();
      // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
      // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
      $a->setKriteria("pinjaman");
      // judul report
      $a->setNama("LAPORAN PINJAMAN SEMUA ANGGOTA ");
      // buat halaman
      $a->AliasNbPages();
      // Potrait ukuran A4
      $a->AddPage("P","A4");
      // $a->Header();

      // ambil data dari database
      $data=$temp_rec->row();

      // $a->Ln(2); // spasi enter
      // $a->SetFont('Arial','B',8); // set font,size,dan properti (B=Bold)
      // $a->Cell(0,4,'Kode Barang : '.$data->id_anggota,0,1,'L');
      // $a->Cell(0,4,'Nama Barang : '.$data->nama,0,1,'L');
      // $a->Cell(0,4,'Harga Satuan : '.number_format($data->besar_simpanan,"0",".","."),0,1,'L');
      $a->Ln(2);
      // $a->setLeftMargin(35,0);
      $a->SetFont('Arial','',8);
      // set lebar tiap kolom tabel transaksi
      $a->SetWidths(array(7,25,25,25,13,23,23,15,25));
      // set align tiap kolom tabel transaksi
      $a->SetAligns(array("C","C","C","C","C","C"));
      $a->SetFont('Arial','B',7);
      $a->Ln(5);
      // set nama header tabel transaksi
      $a->cell(2);
      $a->Cell(7,7,'No.',1,0,'C');
      $a->Cell(25,7,'NAMA ANGGOTA',1,0,'C');
      $a->Cell(25,7,'JENIS PINJAMAN',1,0,'C');
      $a->Cell(25,7,'BESAR PINJAMAN',1,0,'C');
      $a->Cell(13,7,'STATUS',1,0,'C');
      $a->Cell(23,7,'TGL PENGAJUAN',1,0,'C');
      $a->Cell(23,7,'TGL PELUNASAN',1,0,'C');
      $a->Cell(15,7,'BUNGA',1,0,'C');
      $a->Cell(25,7,'KETERANGAN',1,0,'C');
      $a->Ln(7);

      $a->SetFont('Arial','',8);
      $rec = $temp_rec->result();
      $n=0;
      foreach($rec as $r)
      {
        $n++;
        $a->cell(2);
        $a->Row(array(($n), 
          $r->nama, 
          $r->nama_kategori, 
          "Rp.".number_format($r->besar_pinjaman,"0",".","."),
          $r->status,
          date("d-m-Y", strtotime($r->tgl_pengajuan)),
          date("d-m-Y", strtotime($r->tgl_pelunasan)),
          "Rp.".number_format($r->bunga,"0",".","."),
          $r->keterangan
          ));
      }

      $a->Output("Laporan_pinjaman.pdf","I");
    }
    else // jika data kosong
    {
      redirect('report');
    }

    exit();
  }

 function report_pembayaran()
  {

    // ambil data dengan memanggil fungsi di model
    $temp_rec = $this->m_pembayaran->tampil_data_anggota_sudah_pembayaran();
    $num_rows = $temp_rec->num_rows();

    if($num_rows > 0) // jika data ada di database
    {
      // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
      $a=new reportProduct();
      // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
      // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
      $a->setKriteria("angsuran");
      // judul report
      $a->setNama("LAPORAN PEMBAYARAN SEMUA ANGGOTA ");
      // buat halaman
      $a->AliasNbPages();
      // Potrait ukuran A4
      $a->AddPage("P","A4");
      // $a->Header();

      // ambil data dari database
      $data=$temp_rec->row();

      // $a->Ln(2); // spasi enter
      // $a->SetFont('Arial','B',8); // set font,size,dan properti (B=Bold)
      // $a->Cell(0,4,'Kode Barang : '.$data->id_anggota,0,1,'L');
      // $a->Cell(0,4,'Nama Barang : '.$data->nama,0,1,'L');
      // $a->Cell(0,4,'Harga Satuan : '.number_format($data->besar_simpanan,"0",".","."),0,1,'L');
      $a->Ln(2);
      // $a->setLeftMargin(35,0);
      $a->SetFont('Arial','',8);
      // set lebar tiap kolom tabel transaksi
      $a->SetWidths(array(7,25,20,25,25,23,13,20,25));
      // set align tiap kolom tabel transaksi
      $a->SetAligns(array("C","C","C","C","C","C"));
      $a->SetFont('Arial','B',7);
      $a->Ln(5);
      // set nama header tabel transaksi
      $a->cell(2);
      $a->Cell(7,7,'No.',1,0,'C');
      $a->Cell(25,7,'NAMA ANGGOTA',1,0,'C');
      $a->Cell(20,7,'ANGSURAN KE',1,0,'C');
      $a->Cell(25,7,'TGL PEMBAYARAN',1,0,'C');
      $a->Cell(25,7,'TGL JATUH TEMPO',1,0,'C');
      $a->Cell(23,7,'BESAR ANGSRN',1,0,'C');
      $a->Cell(13,7,'DENDA',1,0,'C');
      $a->Cell(20,7,'JUMLAH BAYAR',1,0,'C');
      $a->Cell(25,7,'KETERANGAN',1,0,'C');
      $a->Ln(7);

      $a->SetFont('Arial','',8);
      $rec = $temp_rec->result();
      $n=0;
      foreach($rec as $r)
      {
        $n++;
        $a->cell(2);
        $a->Row(array(($n), 
          $r->nama, 
          $r->angsuran_ke,
          date("d-m-Y", strtotime($r->tgl_pembayaran)),
          date("d-m-Y", strtotime($r->tgl_jatuh_tempo)), 
          "Rp.".number_format($r->besar_angsuran,"0",".","."),
          "Rp.".number_format($r->denda,"0",".","."),
          "Rp.".number_format($r->jumlah_bayar,"0",".","."),
          $r->keterangan
          ));
      }

      $a->Output("Laporan_pembayaran.pdf","I");
    }
    else // jika data kosong
    {
      redirect('report');
    }

    exit();
  }

 function report_shu()
  {

    // ambil data dengan memanggil fungsi di model
    $temp_rec = $this->m_shu->anggota_angsuran_shu();
    $num_rows = $temp_rec->num_rows();

    $total_shu = $this->m_shu->total_shu();

    if($num_rows > 0) // jika data ada di database
    {
      // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
      $a=new reportProduct();
      // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
      // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
      $a->setKriteria("shu");
      // judul report
      $a->setNama("LAPORAN SHU");
      // buat halaman
      $a->AliasNbPages();
      // Potrait ukuran A4
      $a->AddPage("P","A4");
      // $a->Header();

      // ambil data dari database
      $data=$temp_rec->row();

      // $a->Ln(2); // spasi enter
      // $a->SetFont('Arial','B',8); // set font,size,dan properti (B=Bold)
      // $a->Cell(0,4,'Kode Barang : '.$data->id_anggota,0,1,'L');
      // $a->Cell(0,4,'Nama Barang : '.$data->nama,0,1,'L');
      // $a->Cell(0,4,'Harga Satuan : '.number_format($data->besar_simpanan,"0",".","."),0,1,'L');
      foreach($total_shu->result() as $r){
        $judul = $r->total_shu;
      }
      $a->cell(50);
      $a->Cell(-10,20, 'TOTAL SHU =', 'C');
      $a->Cell(120,20,  "Rp.".number_format($judul,"0",".","."), '0', 1, 'C');
      $a->Ln(2);
      // $a->setLeftMargin(35,0);
      $a->SetFont('Arial','',8);
      // set lebar tiap kolom tabel transaksi
      $a->SetWidths(array(7,25,20,25,25,23,13,20,25));
      // set align tiap kolom tabel transaksi
      $a->SetAligns(array("C","C","C","C","C","C"));
      $a->SetFont('Arial','B',7);
      $a->Ln(5);
      // set nama header tabel transaksi
      $a->cell(35);
      $a->Cell(7,7,'No.',1,0,'C');
      $a->Cell(25,7,'NAMA ANGGOTA',1,0,'C');
      $a->Cell(20,7,'ID ANGSURAN',1,0,'C');
      $a->Cell(25,7,'BESAR SHU',1,0,'C');
      $a->Cell(25,7,'TGL MASUK',1,0,'C');
      $a->Ln(7);

      $a->SetFont('Arial','',8);
      $rec = $temp_rec->result();
      $n=0;
      foreach($rec as $r)
      {
        $n++;
        $a->cell(35);
        $a->Row(array(($n), 
          $r->nama, 
          $r->id_angsuran,
          "Rp.".number_format($r->besar_shu,"0",".","."),
          date("d-m-Y", strtotime($r->tgl_masuk))
          // $r->keterangan
          ));
      }

      $a->Output("Laporan_pembayaran.pdf","I");
    }
    else // jika data kosong
    {
      redirect('report');
    }

    exit();
  }

  function report_simpanan_anggota($id_anggota)
  {

    // ambil data dengan memanggil fungsi di model
    $temp_rec = $this->m_simpanan->laporan_simpanan($id_anggota);
    $num_rows = $temp_rec->num_rows();

    if($num_rows > 0) // jika data ada di database
    {
      // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
      $a=new reportProduct();
      // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
      // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
      $a->setKriteria("simpanan");
      // judul report
      foreach($temp_rec->result() as $r){
        $nama_anggota = $r->nama;
      }
      $a->setNama("Laporan Simpanan Anggota");
      // buat halaman
      $a->AliasNbPages();
      // Potrait ukuran A4
      $a->AddPage("P","A4");
      // $a->Header();

      // ambil data dari database
      $data=$temp_rec->row();

      $a->Ln(2); // spasi enter
      $a->SetFont('Arial','B',8); // set font,size,dan properti (B=Bold)
      $a->Cell(0,4,'Id Anggota : '.$data->id_anggota,0,1,'L');
      $a->Cell(0,4,'Nama Anggota : '.$data->nama,0,1,'L');
      // $a->Cell(0,4,'Harga Satuan : '.number_format($data->besar_simpanan,"0",".","."),0,1,'L');
      $a->Ln(2);
      // $a->setLeftMargin(35,0);
      $a->SetFont('Arial','',8);
      // set lebar tiap kolom tabel transaksi
      $a->SetWidths(array(7,45,25,30,30,30,10,10));
      // set align tiap kolom tabel transaksi
      $a->SetAligns(array("C","C","C","C","C","C"));
      $a->SetFont('Arial','B',7);
      $a->Ln(5);
      // set nama header tabel transaksi
      $a->cell(2);
      $a->Cell(7,7,'No.',1,0,'C');
      $a->Cell(45,7,'NAMA ANGGOTA',1,0,'C');
      $a->Cell(25,7,'JENIS SIMPANAN',1,0,'C');
      $a->Cell(30,7,'BESAR SIMPANAN',1,0,'C');
      $a->Cell(30,7,'TANGGAL SIMPANAN',1,0,'C');
      $a->Cell(30,7,'KETERANGAN',1,0,'C');
      $a->Cell(10,7,'BULAN',1,0,'C');
      $a->Cell(10,7,'TAHUN',1,0,'C');
      $a->Ln(7);

      $a->SetFont('Arial','',8);
      $rec = $temp_rec->result();
      $n=0;
      foreach($rec as $r)
      {
        $n++;
        $a->cell(2);
        $a->Row(array(($n), 
          $r->nama, 
          $r->nama_simpanan, 
          "Rp.".number_format($r->besar_simpanan,"0",".","."),
          date("d-m-Y", strtotime($r->tgl_simpanan)),
          $r->keterangan,
          $r->bulan,
          $r->tahun
          ));
      }

      $a->Output("Laporan_simpanan.pdf","I");
    }
    else // jika data kosong
    {
      redirect('report');
    }

    exit();
  }

  function report_pinjaman_anggota($id_anggota)
  {

    // ambil data dengan memanggil fungsi di model
    $temp_rec = $this->m_pinjaman->laporan_pinjaman($id_anggota);
    $num_rows = $temp_rec->num_rows();

    if($num_rows > 0) // jika data ada di database
    {
      // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
      $a=new reportProduct();
      // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
      // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
      $a->setKriteria("pinjaman");
      // judul report
      foreach($temp_rec->result() as $r){
        $nama_anggota = $r->nama;
      }
      $a->setNama("LAPORAN PINJAMAN ANGGOTA ");
      // buat halaman
      $a->AliasNbPages();
      // Potrait ukuran A4
      $a->AddPage("P","A4");
      // $a->Header();

      // ambil data dari database
      $data=$temp_rec->row();

      $a->Ln(2); // spasi enter
      $a->SetFont('Arial','B',8); // set font,size,dan properti (B=Bold)
      $a->Cell(0,4,'Id Anggota : '.$data->id_anggota,0,1,'L');
      $a->Cell(0,4,'Nama Anggota : '.$data->nama,0,1,'L');
      // $a->Cell(0,4,'Harga Satuan : '.number_format($data->besar_simpanan,"0",".","."),0,1,'L');
      $a->Ln(2);
      // $a->setLeftMargin(35,0);
      $a->SetFont('Arial','',8);
      // set lebar tiap kolom tabel transaksi
      $a->SetWidths(array(7,25,25,25,13,23,23,15,25));
      // set align tiap kolom tabel transaksi
      $a->SetAligns(array("C","C","C","C","C","C"));
      $a->SetFont('Arial','B',7);
      $a->Ln(5);
      // set nama header tabel transaksi
      $a->cell(2);
      $a->Cell(7,7,'No.',1,0,'C');
      $a->Cell(25,7,'NAMA ANGGOTA',1,0,'C');
      $a->Cell(25,7,'JENIS PINJAMAN',1,0,'C');
      $a->Cell(25,7,'BESAR PINJAMAN',1,0,'C');
      $a->Cell(13,7,'STATUS',1,0,'C');
      $a->Cell(23,7,'TGL PENGAJUAN',1,0,'C');
      $a->Cell(23,7,'TGL PELUNASAN',1,0,'C');
      $a->Cell(15,7,'BUNGA',1,0,'C');
      $a->Cell(25,7,'KETERANGAN',1,0,'C');
      $a->Ln(7);

      $a->SetFont('Arial','',8);
      $rec = $temp_rec->result();
      $n=0;
      foreach($rec as $r)
      {
        $n++;
        $a->cell(2);
        $a->Row(array(($n), 
          $r->nama, 
          $r->nama_kategori, 
          "Rp.".number_format($r->besar_pinjaman,"0",".","."),
          $r->status,
          date("d-m-Y", strtotime($r->tgl_pengajuan)),
          date("d-m-Y", strtotime($r->tgl_pelunasan)),
          "Rp.".number_format($r->bunga,"0",".","."),
          $r->keterangan
          ));
      }

      $a->Output("Laporan_pinjaman.pdf","I");
    }
    else // jika data kosong
    {
      redirect('report');
    }

    exit();
  }

   function report_pembayaran_anggota($id_anggota)
  {

    // ambil data dengan memanggil fungsi di model
    $temp_rec = $this->m_pembayaran->laporan_pembayaran($id_anggota);
    $num_rows = $temp_rec->num_rows();

    if($num_rows > 0) // jika data ada di database
    {
      // memanggil (instantiasi) class reportProduct di file print_rekap_helper.php
      $a=new reportProduct();
      // anda dapat membuat report lainnya dalam satu file print_rekap_helper.php
      // dengan cukup mengubah setKriteria dan membuat kondisi (elseif) di file print_rekap_helper.php
      $a->setKriteria("angsuran");

      foreach($temp_rec->result() as $r){
        $nama_anggota = $r->nama;
      }
      // judul report
      $a->setNama("LAPORAN PEMBAYARAN ANGGOTA ");
      // buat halaman
      $a->AliasNbPages();
      // Potrait ukuran A4
      $a->AddPage("P","A4");
      // $a->Header();

      // ambil data dari database
      $data=$temp_rec->row();
      // $angsuran_ke =  $data->angsuran_ke + 1 ;

      $a->Ln(2); // spasi enter
      $a->SetFont('Arial','B',8); // set font,size,dan properti (B=Bold)
      $a->Cell(0,4,'Id Anggota : '.$data->id_anggota,0,1,'L');
      $a->Cell(0,4,'Nama Anggota : '.$data->nama,0,1,'L');
      // $a->Cell(0,4,'Angsuran Sekarang : Ke-'.$angsuran_ke,0,1,'L');
      // $a->Cell(0,4,'Harga Satuan : '.number_format($data->besar_simpanan,"0",".","."),0,1,'L');
      $a->Ln(2);
      // $a->setLeftMargin(35,0);
      $a->SetFont('Arial','',8);
      // set lebar tiap kolom tabel transaksi
      $a->SetWidths(array(7,25,20,25,25,23,13,20,25));
      // set align tiap kolom tabel transaksi
      $a->SetAligns(array("C","C","C","C","C","C"));
      $a->SetFont('Arial','B',7);
      $a->Ln(5);
      // set nama header tabel transaksi
      $a->cell(2);
      $a->Cell(7,7,'No.',1,0,'C');
      $a->Cell(25,7,'NAMA ANGGOTA',1,0,'C');
      $a->Cell(20,7,'ANGSURAN KE',1,0,'C');
      $a->Cell(25,7,'TGL PEMBAYARAN',1,0,'C');
      $a->Cell(25,7,'TGL JATUH TEMPO',1,0,'C');
      $a->Cell(23,7,'BESAR ANGSRN',1,0,'C');
      $a->Cell(13,7,'DENDA',1,0,'C');
      $a->Cell(20,7,'JUMLAH BAYAR',1,0,'C');
      $a->Cell(25,7,'KETERANGAN',1,0,'C');
      $a->Ln(7);

      $a->SetFont('Arial','',8);
      $rec = $temp_rec->result();
      $n=0;
      foreach($rec as $r)
      {
        $n++;
        $a->cell(2);
        $a->Row(array(($n), 
          $r->nama, 
          $r->angsuran_ke,
          date("d-m-Y", strtotime($r->tgl_pembayaran)),
          date("d-m-Y", strtotime($r->tgl_jatuh_tempo)), 
          "Rp.".number_format($r->besar_angsuran,"0",".","."),
          "Rp.".number_format($r->denda,"0",".","."),
          "Rp.".number_format($r->jumlah_bayar,"0",".","."),
          $r->keterangan
          ));
      }

      $a->Output("Laporan_pembayaran.pdf","I");
    }
    else // jika data kosong
    {
      redirect('report');
    }

    exit();
  }

}
?>