<?php 
class M_simpanan extends CI_Model{

	function tampil_jenis_simpanan($id){
		$this->db->select('*');
		$this->db->from('jenis_simpanan');
		$this->db->where('id_jenis',$id);
		return $this->db->get();
	}

	function cek_simpanan($id_anggota,$id_jenis){
		$this->db->select('*');
		$this->db->from('simpanan');
		$this->db->where('id_anggota',$id_anggota);
		$this->db->where('id_jenis',$id_jenis);
		$this->db->order_by('id_simpan','desc');
		return $this->db->get();
	}

	function tampil_anggota_by_id($id_anggota){
		$this->db->select('*');
		$this->db->from('anggota');
		$this->db->where('id_anggota',$id_anggota);
		return $this->db->get();
	}

	function tampil_simpanan(){
		$this->db->select('anggota.id_anggota,anggota.nama, simpanan.id_anggota, simpanan.id_jenis, simpanan.tgl_simpanan, simpanan.besar_simpanan, simpanan.keterangan, simpanan.bulan, simpanan.tahun, jenis_simpanan.id_jenis, jenis_simpanan.nama_simpanan');
		$this->db->from('simpanan');
		$this->db->join('anggota','anggota.id_anggota = simpanan.id_anggota', 'left');
		$this->db->join('jenis_simpanan','jenis_simpanan.id_jenis = simpanan.id_jenis', 'left');
		$query = $this->db->get();
		return $query;
	}

	function laporan_simpanan($id_anggota){
		$this->db->select('anggota.id_anggota,anggota.nama, simpanan.id_anggota, simpanan.id_jenis, simpanan.tgl_simpanan, simpanan.besar_simpanan, simpanan.keterangan, simpanan.bulan, simpanan.tahun, jenis_simpanan.id_jenis, jenis_simpanan.nama_simpanan');
		$this->db->from('simpanan');
		$this->db->join('anggota','anggota.id_anggota = simpanan.id_anggota', 'left');
		$this->db->join('jenis_simpanan','jenis_simpanan.id_jenis = simpanan.id_jenis', 'left');
		$this->db->where('anggota.id_anggota',$id_anggota);
		$query = $this->db->get();
		return $query;
	}

	function edit_jenis_simpanan($where,$table){
		return $this->db->get_where($table,$where);
	}
}
