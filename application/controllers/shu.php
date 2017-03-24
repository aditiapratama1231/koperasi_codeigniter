<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shu extends CI_Controller {
	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
		$this->load->model('m_shu');
			$this->load->helper('url');
	}

	function index(){
		$data['total_shu'] = $this->m_shu->total_shu()->result();
		$data['shu'] = $this->m_shu->anggota_angsuran_shu()->result();

		$this->load->view('shu/kelola_shu',$data);
	}
}