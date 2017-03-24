<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pinjaman extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
		$this->load->model('m_pinjaman');
			$this->load->helper('url');
	}

	function pengajuan_pinjaman(){
		// $q = $this->db->get('pinjaman');
		// 	foreach($q->result_array() as $res){
		// 		$id_anggota = $res['id_anggota'];
		// 	}
		// $status = "Lunas";
		// $cek_anggota = 
		// echo "<pre>"; print_r($data['anggota']); echo"</pre>";


		// $data['anggota'] = $cek_anggota;
		// // $data['simpanan'] = $this->m_pinjaman->cek_saldo();

		$cek_anggota_belum_lunas = $this->m_pinjaman->cek_anggota_lunas_belum();
		foreach($cek_anggota_belum_lunas->result_array() as $res){
				$belum_lunas = $res['lunas'];
		}

		// if($belum_lunas == 1){
		// 	$data['anggota'] = $this->m_pinjaman->cek_anggota_lunas_belum();
		// }
		// else{
		// 	$data['anggota'] = $this->m_pinjaman->cek_anggota_status_acc();
		// }

		$data['kategori_pinjam'] = $this->db->get('kategori_pinjaman')->result();
		// $data['anggota'] = $this->m_pinjaman->cek_anggota_simpanan();
		$data['anggota'] = $this->m_pinjaman->cek_anggota_lunas_belum();
		$this->load->view('pinjaman/pengajuan_pinjaman',$data);
	}

	function kelola_pinjaman(){
		$data['pinjaman'] = $this->m_pinjaman->kelola_pinjaman()->result();
		$this->load->view('pinjaman/kelola_pinjaman',$data);
	}

	function max_saldo_pinjaman_ajax(){
		$id_anggota = $this->input->get('id_anggota');
		$q = $this->m_pinjaman->max_saldo($id_anggota);
		foreach($q->result_array() as $res){
			$besar = $res['besar_simpanan'];
		}
		$rupiah = "Rp.".number_format($besar,"0",".",".");
		echo "<label>Saldo Simpanan Saat ini</label>";
		echo "<input type='text' name='saldo' class='form-control' readonly='true' value='$rupiah' >";
	}

	function aksi_pengajuan_pinjaman(){
		$id_anggota = $this->input->post('id_anggota');
		$id_kategori = $this->input->post('id_kategori');
		$besar_pinjaman = $this->input->post('besar_pinjaman');
		$tgl_pengajuan = $this->input->post('tgl_pengajuan');
		$keterangan = $this->input->post('keterangan');

		$bunga = (($besar_pinjaman*2.5)/100);

		$data = array(
			'id_anggota' => $id_anggota,
			'id_kategori' => $id_kategori,
			'besar_pinjaman' => $besar_pinjaman,
			'tgl_pengajuan' => $tgl_pengajuan,
			'status' => "Baru",
			'bunga' => $bunga,
			'keterangan' => $keterangan
			);

		$this->db->insert('pinjaman',$data);
		// echo '<pre>'; print_r($data); echo'</pre>';
		header('location:'.base_url('pinjaman/daftar_acc_peminjaman'));
	}

	function daftar_acc_peminjaman(){
		$data['pinjaman'] = $this->m_pinjaman->cek_anggota_status_baru()->result();
		// echo '<pre>'; print_r($data['pinjaman']); echo'</pre>';
		$this->load->view('pinjaman/daftar_acc_pinjaman',$data);
	}

	function pengajuan_peminjaman($id_pinjaman){
		$data['pinjaman'] = $this->m_pinjaman->aksi_anggota_status_baru($id_pinjaman)->result();
		$this->load->view('pinjaman/aksi_pengajuan_pinjaman',$data);
	}

	function aksi_pengajuan_peminjaman(){
		$id_pinjaman = $this->input->post('id_pinjaman');
		$tgl_acc_pengajuan = $this->input->post('tgl_acc_pengajuan');
		$bulan = $this->input->post('jumlah_bulan');
		$tgl_pinjam = date('Y-m-d', strtotime($tgl_acc_pengajuan.' + 7 days'));
		$tgl_pelunasan = date('Y-m-d', strtotime($tgl_pinjam.' + '.$bulan.'month'));

		$status = $this->input->post('status');
		if($status == "Acc"){
			$data = array(
				'status' => $status,
				'tgl_acc_pengajuan' => $tgl_acc_pengajuan,
				'tgl_pinjam' => $tgl_pinjam,
				'tgl_pelunasan' => $tgl_pelunasan
				);

			$where = array(
				'id_pinjaman' =>$id_pinjaman
				);

			$this->db->where($where);
			$this->db->update('pinjaman',$data);
			header('location:'.base_url('pinjaman/daftar_acc_peminjaman'));
		}
		elseif($status == "Tolak"){
			$data = array(
				'status' => $status
				);

			$where = array(
				'id_pinjaman' =>$id_pinjaman
				);

			$this->db->where($where);
			$this->db->update('pinjaman',$data);
			header('location:'.base_url('pinjaman/daftar_acc_peminjaman'));
		}
	}



}

?>