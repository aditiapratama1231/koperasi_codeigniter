<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
		$this->load->model('m_petugas');
			$this->load->helper('url');
	}

	function index(){
		$data['petugas'] = $this->m_petugas->tampil_data_petugas()->result();
		$this->load->view('petugas/kelola_petugas',$data);
	}


}