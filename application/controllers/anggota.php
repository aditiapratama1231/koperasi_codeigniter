<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
		$this->load->model('m_anggota');
			$this->load->helper('url');
	}	

	function index(){
		$data['anggota'] = $this->m_anggota->tampil_data_anggota()->result();
		$this->load->view('anggota/kelola_anggota',$data);
	}

	function ampun(){
		$data['anggota'] = $this->m_anggota->tampil_data_anggota()->result();
		$this->load->view('shu/kelola_shu',$data);
	}
	function tambah_anggota(){
		$this->load->view('anggota/tambah_anggota');
	}

	function aksi_tambah_anggota(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$tgl_daftar = $this->input->post('tgl_daftar');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'username' => $username,
			'password' => $password,
			'nama' => $nama,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'j_kelamin' => $jenis_kelamin,
			'tgl_pendaftaran' => $tgl_daftar,
			'keterangan' => $keterangan
		);

		$bulan = date('m',strtotime($tgl_daftar));
		$tahun = date('Y',strtotime($tgl_daftar));

		$id = $this->m_anggota->get_id_anggota('anggota',$data);
		
		$data_simpan = array(
				'id_anggota' => $id,
				'tgl_simpanan' => $tgl_daftar,
				'id_jenis' => "2",
				'besar_simpanan' => 50000,
				'keterangan' => "Pembayaran saat mendaftar",
				'bulan' => $bulan,
				'tahun' => $tahun
		);	

		$this->db->insert('simpanan',$data_simpan);
		
			// echo '<pre>'; print_r($data_simpan); echo'</pre>';
		header('location:'.base_url('anggota'));

		// echo "<script type='javascript/text'>";
		// echo "alert('Data Anggota Berhasil Tersimpan');";
		// echo "window.location.href='".base_url('anggota')."';";
		// echo "</script>";

	}

	function edit($id){
		$where = array('id_anggota' => $id);
		$data['anggota'] = $this->m_anggota->edit_data_anggota($where,'anggota')->result();
		$this->load->view('anggota/edit_anggota',$data);
	}

	function update_data(){
		$id = $this->input->post('id_anggota');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			'no_telp' => $no_telp,
			'tempat_lahir' => $tempat_lahir,
			'tanggal_lahir' => $tanggal_lahir,
			'j_kelamin' => $jenis_kelamin,
			'keterangan' => $keterangan
		);

		$where = array(
			'id_anggota' => $id
		);

		// $this->m_anggota->update_data_anggota($where,$data,'anggota');
		$this->db->where($where);
		$this->db->update('anggota',$data);
		header('location:'.base_url('anggota'));
	}


	private	function tgl_indo($tgl){
	    $ubah = gmdate($tgl, time()+60*60*8);
	    $pecah = explode("-",$ubah);
	    $tanggal = $pecah[2];
	    $bulan = bulan($pecah[1]);
	    $tahun = $pecah[0];
	    return $tanggal.' '.$bulan.' '.$tahun;
	}
}
