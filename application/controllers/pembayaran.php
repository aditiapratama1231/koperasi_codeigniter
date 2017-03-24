<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
		$this->load->model('m_pembayaran');
			$this->load->helper('url');
	}

	function tambah_pembayaran(){
		$data['kategori_pinjam'] = $this->db->get('kategori_pinjaman')->result();
		$data['anggota'] = $this->m_pembayaran->tampil_data_anggota_pembayaran()->result();
		// $data['anggota'] = $this->db->get('anggota')->result();

		// $this->load->view('pinjaman/pengajuan_pinjaman',$data);
		$this->load->view('pembayaran/tambah_pembayaran',$data);
	}

	function kelola_pembayaran(){
		$data['angsuran'] = $this->m_pembayaran->tampil_data_anggota_sudah_pembayaran()->result();

		$this->load->view('pembayaran/kelola_pembayaran',$data);
	}

	function aksi_pembayaran(){
		$id_pinjaman = $this->input->post('id_pinjaman');
		$angsuran_ke = $this->input->post('angsuran_ke');
		$tgl_pembayaran = $this->input->post('tgl_pembayaran');
		$tgl_jatuh_tempo = $this->input->post('tgl_jatuh_tempo');
		$besar_angsuran = $this->input->post('besar_angsuran');
		$denda = $this->input->post('denda');
		$jumlah_bayar = $this->input->post('jumlah_bayar');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'id_pinjaman' => $id_pinjaman,
			'angsuran_ke' => $angsuran_ke,
			'tgl_pembayaran' => $tgl_pembayaran,
			'tgl_jatuh_tempo' => $tgl_jatuh_tempo,
			'besar_angsuran' => $besar_angsuran,
			'denda' => $denda,
			'jumlah_bayar' => $jumlah_bayar,
			'keterangan' => $keterangan
			);
		
		$id = $this->m_pembayaran->get_id_angsuran('angsuran',$data);

		$q = $this->m_pembayaran->data_pinjaman($id_pinjaman);
		foreach($q->result_array() as $res){
			$besar_pinjaman = $res['besar_pinjaman'];
			$bulan = $res['jumlah_bulan'];
			$bunga = $res['bunga'];
			$tgl_pinjam = $res['tgl_pinjam'];
			// $besar = $res['besar_simpanan'];
		}

		$cek_jumlah_bulan = $this->m_pembayaran->cek_jumlah_bulan($id_pinjaman);
		foreach($cek_jumlah_bulan->result_array() as $res){
				$jumlah_bulan = $res['jumlah_bulan'];
		}

		// $jumlah_bulan = $jumlah_bulan - 1;
		if($angsuran_ke == $jumlah_bulan){
			$data = array(
				'status' => "Lunas"
				);

			$where = array(
				'id_pinjaman' =>$id_pinjaman
				);

			$this->db->where($where);
			$this->db->update('pinjaman',$data);
			header('location:'.base_url('pinjaman/kelola_pinjaman'));	
		}
		else{
			header('location:'.base_url('pinjaman/kelola_pinjaman'));
		}

		$angsuran_bersih = ($besar_pinjaman/$bulan);
		$jumlah_bayar = $besar_angsuran + $denda;
		$besar_shu = $jumlah_bayar - $angsuran_bersih;

		$data_shu = array(
			'id_angsuran' => $id,
			'tgl_masuk' => $tgl_pembayaran,
			'besar_shu' => $besar_shu
			);

		$this->db->insert('shu',$data_shu);

		// echo '<pre>'; print_r($data_shu); echo'</pre>';
		header('location:'.base_url('pembayaran/kelola_pembayaran'));
	
	}

	function pembayaran_ajax(){
		$id_pinjaman = $this->input->get('id_pinjaman');
		$q = $this->m_pembayaran->data_pinjaman($id_pinjaman);
		foreach($q->result_array() as $res){
			$besar_pinjaman = $res['besar_pinjaman'];
			$bulan = $res['jumlah_bulan'];
			$bunga = $res['bunga'];
			$tgl_pinjam = $res['tgl_pinjam'];
			// $besar = $res['besar_simpanan'];
		}
		$count_angsuran = $this->m_pembayaran->data_angsuran_ke($id_pinjaman);
		foreach($count_angsuran->result_array() as $res){
			$angsuran_ke = $res['kebut'];
			$tgl_pembayaran = $res['tgl_pembayaran'];
		}
		// $angsuran = $this->db->get('angsuran',$id_pinjaman);
		// $cek = $count_angsuran->num_rows();
		// $angsuran_ke = 2;
		if($angsuran_ke == 0){
			$angsuran_ke = 1;
			$tgl_jatuh_tempo = date('Y-m-d', strtotime($tgl_pinjam.' + 1 month'));
		}
		else{
			$angsuran_ke = $angsuran_ke + 1;
			$tgl_jatuh_tempo = date('Y-m-d', strtotime($tgl_pinjam.' + '.$angsuran_ke.'month'));
		}

		$tgl_sekarang = date('Y-m-d');
		$tgl_1 = strtotime($tgl_sekarang);
		$tgl_2 = strtotime($tgl_jatuh_tempo); 

		if($tgl_1 > $tgl_2){
			$denda = 10000;
		}
		else{
			$denda = 0;
		}
		
		
		$besar_angsuran = ($besar_pinjaman/$bulan)+$bunga;

		$jumlah_bayar = $besar_angsuran + $denda;

		$besar_angsuran_rupiah = "Rp.".number_format($besar_angsuran,"0",".",".");
		$denda_rupiah = "Rp.".number_format($denda,"0",".",".");
		$jumlah_bayar_rupiah = "Rp.".number_format($jumlah_bayar,"0",".",".");
		// echo "<label>Besar Angsuran</label>";
		// echo "<input type='text' name='saldo' class='form-control' readonly='true' value='$rupiah' >";
		// echo "
  //           <div class='form-group'>
  //               <label>Nama Anggota</label>
  //               <select name='id_anggota' class='form-control' onchange='get_data_saldo(this.value)' required>
  //                   <option>...</option>";
  //               foreach($anggota as $res) { 
  //      echo "             <option value='".$res->id_pinjaman."'>$res->nama</option>";
  //               } 
  //       echo "        </select>
  //           </div>";
        echo "<div class='form-group'>";
		echo "<label>Besar Angsuran</label>
			<input type='text' name='besar_angsuran_rupiah' class='form-control' readonly='true' value='$besar_angsuran_rupiah' >
			<input type='hidden' name='besar_angsuran' value='$besar_angsuran'>
			</div>";
         echo"<div class='form-group'>
            	<label>Angsuran Ke-</label>
            	<input type='text' name='angsuran_ke' class='form-control' readonly='true' value='$angsuran_ke'>
        	</div>";
        echo "<div class='form-group'>
        		<label>Tanggal Pembayaran</label>
        		<input type='text' name='tgl_pembayaran' class='form-control' readonly='true' value='$tgl_sekarang'>
        	</div>";
        echo "<div class='form-group'>
        		<label>Tanggal Jatuh Tempo</label>
        		<input type='text' name='tgl_jatuh_tempo' class='form-control' readonly='true' value='$tgl_jatuh_tempo'>
        	</div>";
        echo "<div class='form-group'>
        		<label>Denda</label>
        		<input type='text' name='denda_rupiah' class='form-control' readonly='true' value='$denda_rupiah'>
        		<input type='hidden' name='denda' value='$denda'>
        	</div>";
        echo "<div class='form-group'>
        		<label>Jumlah Bayar</label>
        		<input type='text' name='jumlah_bayar_rupiah' class='form-control' readonly='true' value='$jumlah_bayar_rupiah'>
        		<input type='hidden' name='jumlah_bayar' value='$jumlah_bayar'>
        	</div>";
	}
}