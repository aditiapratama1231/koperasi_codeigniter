<?php 
class M_petugas extends CI_Model{
	function tampil_data_petugas(){
		return $this->db->get('petugas');
	}
}