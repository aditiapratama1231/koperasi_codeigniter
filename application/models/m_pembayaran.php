<?php 
class M_pembayaran extends CI_Model{
	function tampil_data_anggota_pembayaran(){
		$this->db->select('anggota.nama,pinjaman.id_pinjaman');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','inner');
		$this->db->where('pinjaman.status','Acc');
		return $this->db->get();
	}

	function tampil_data_anggota_sudah_pembayaran(){
		$this->db->select('anggota.nama,anggota.id_anggota,pinjaman.id_pinjaman,angsuran.angsuran_ke,angsuran.tgl_pembayaran,angsuran.tgl_jatuh_tempo,angsuran.besar_angsuran,angsuran.denda,angsuran.jumlah_bayar,angsuran.keterangan');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','inner');
		$this->db->join('angsuran','angsuran.id_pinjaman = pinjaman.id_pinjaman','inner');
		// $this->db->where('pinjaman.status','Acc');
		return $this->db->get();
	}

	function laporan_pembayaran($id_anggota){
		$this->db->select('anggota.nama,anggota.id_anggota,pinjaman.id_pinjaman,angsuran.angsuran_ke,angsuran.tgl_pembayaran,angsuran.tgl_jatuh_tempo,angsuran.besar_angsuran,angsuran.denda,angsuran.jumlah_bayar,angsuran.keterangan');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','inner');
		$this->db->join('angsuran','angsuran.id_pinjaman = pinjaman.id_pinjaman','inner');
		$this->db->where('anggota.id_anggota',$id_anggota);
		$this->db->where('pinjaman.status','Acc');
		return $this->db->get();
	}

	function data_pinjaman($id_pinjaman){
		$this->db->select('*');
		$this->db->from('pinjaman');
		$this->db->join('kategori_pinjaman','pinjaman.id_kategori = kategori_pinjaman.id_kategori');
		$this->db->where('pinjaman.id_pinjaman',$id_pinjaman);
		return $this->db->get();
	}

	function data_angsuran_ke($id_pinjaman){
		$this->db->select('count(id_pinjaman) as kebut, tgl_pembayaran');
		$this->db->from('angsuran');
		$this->db->where('id_pinjaman',$id_pinjaman);
		return $this->db->get();
	}

	function get_id_angsuran($table,$data){
	    $query = $this->db->insert($table, $data);
	    return $this->db->insert_id();// return last insert id
	}

	function cek_jumlah_bulan($id_pinjaman){
		$this->db->select('pinjaman.id_pinjaman,pinjaman.id_kategori,pinjaman.id_anggota,kategori_pinjaman.id_kategori,kategori_pinjaman.jumlah_bulan');
		$this->db->from('pinjaman');
		$this->db->join('kategori_pinjaman','pinjaman.id_kategori = kategori_pinjaman.id_kategori');
		$this->db->where('pinjaman.id_pinjaman',$id_pinjaman);
		return $this->db->get();
	}

}