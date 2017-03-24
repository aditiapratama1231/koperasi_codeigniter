<?php 
class M_anggota extends CI_Model{
	function tampil_data_anggota(){
		return $this->db->get('anggota');
	}

	function edit_data_anggota($where,$table){
		return $this->db->get_where($table,$where);
	}

	function update_data_anggota($where,$data,$table){
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	function get_id_anggota($table,$data){
	    $query = $this->db->insert($table, $data);
	    return $this->db->insert_id();// return last insert id
	}

}