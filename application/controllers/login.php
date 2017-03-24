<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
	}

	function index(){
		$this->load->view('v_login');
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->m_login->cek_login("petugas",$where)->num_rows();
		if ($cek != 0){
			$data_session = array(
				'nama' => $username,
				'status' => "login"
				);

			$this->session->set_userdata($data_session);
			redirect("petugas");
		}else{
			echo "Username atau Password Salah";
		}
	}

	function tambah_petugas(){
		$this->load->view('petugas/tambah_petugas');
	}

	function aksi_tambah_petugas(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$no_telp = $this->input->post('no_telp');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
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
			'keterangan' => $keterangan
		);


		$this->db->insert('petugas', $data);
		echo "<script>alert('Data Berhasil Dimasukan');</script>";
		header('location:'.base_url('login'));
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
