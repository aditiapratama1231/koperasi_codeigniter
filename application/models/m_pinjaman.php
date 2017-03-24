<?php 
class M_pinjaman extends CI_Model{
	function max_saldo($id_anggota){
		$this->db->select('sum(besar_simpanan) as besar_simpanan');
		$this->db->from('simpanan');
		$this->db->where('id_anggota',$id_anggota);
		return $this->db->get();
	}

	function cek_anggota_status_baru(){
		$this->db->select('anggota.id_anggota,anggota.nama,pinjaman.besar_pinjaman,pinjaman.id_anggota,pinjaman.id_pinjaman,pinjaman.status,pinjaman.tgl_pengajuan,pinjaman.keterangan,kategori_pinjaman.nama_kategori');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','left');
		$this->db->join('kategori_pinjaman','pinjaman.id_kategori = kategori_pinjaman.id_kategori','left');
		$this->db->where('pinjaman.status','Baru');
		return $this->db->get();
	}

	function cek_anggota_status_acc(){
		$this->db->select('anggota.id_anggota,anggota.nama,pinjaman.besar_pinjaman,pinjaman.id_anggota,pinjaman.tgl_pelunasan,pinjaman.tgl_acc_pengajuan,pinjaman.id_pinjaman,pinjaman.status,pinjaman.tgl_pengajuan,pinjaman.keterangan,pinjaman.bunga,kategori_pinjaman.nama_kategori');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','left');
		$this->db->join('kategori_pinjaman','pinjaman.id_kategori = kategori_pinjaman.id_kategori','left');
		$this->db->where('pinjaman.status','Acc');
		return $this->db->get();
	}

	function cek_anggota_status(){
		$this->db->select('anggota.id_anggota,anggota.nama,pinjaman.besar_pinjaman,pinjaman.id_anggota,pinjaman.tgl_pelunasan,pinjaman.tgl_acc_pengajuan,pinjaman.id_pinjaman,pinjaman.status,pinjaman.tgl_pengajuan,pinjaman.keterangan,pinjaman.bunga,kategori_pinjaman.nama_kategori');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','left');
		$this->db->join('kategori_pinjaman','pinjaman.id_kategori = kategori_pinjaman.id_kategori','left');
		// $this->db->where('pinjaman.status','Acc','pinjaman.status','Lunas');
		// $this->db->where('pinjaman.status','Lunas');
		return $this->db->get();
	}

	function kelola_pinjaman(){
		$this->db->select('anggota.id_anggota,anggota.nama,pinjaman.besar_pinjaman,pinjaman.id_anggota,pinjaman.tgl_pelunasan,pinjaman.tgl_acc_pengajuan,pinjaman.id_pinjaman,pinjaman.status,pinjaman.tgl_pengajuan,pinjaman.keterangan,pinjaman.bunga,kategori_pinjaman.nama_kategori');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','left');
		$this->db->join('kategori_pinjaman','pinjaman.id_kategori = kategori_pinjaman.id_kategori','left');
		$this->db->where_not_in('pinjaman.status','Tolak');
		// $this->db->where('pinjaman.status','Lunas');
		return $this->db->get();
	}

	function laporan_pinjaman($id_anggota){
		$this->db->select('anggota.id_anggota,anggota.nama,pinjaman.besar_pinjaman,pinjaman.id_anggota,pinjaman.tgl_pelunasan,pinjaman.tgl_acc_pengajuan,pinjaman.id_pinjaman,pinjaman.status,pinjaman.tgl_pengajuan,pinjaman.keterangan,pinjaman.bunga,kategori_pinjaman.nama_kategori');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','left');
		$this->db->join('kategori_pinjaman','pinjaman.id_kategori = kategori_pinjaman.id_kategori','left');
		$this->db->where('anggota.id_anggota',$id_anggota);
		$this->db->where('pinjaman.status','Acc');
		return $this->db->get();
	}


	function aksi_anggota_status_baru($id_pinjaman){
		$this->db->select('anggota.id_anggota,anggota.nama,pinjaman.besar_pinjaman,pinjaman.id_anggota,pinjaman.id_pinjaman,pinjaman.status,pinjaman.tgl_pengajuan,pinjaman.keterangan,kategori_pinjaman.nama_kategori,kategori_pinjaman.id_kategori,kategori_pinjaman.jumlah_bulan');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','left');
		$this->db->join('kategori_pinjaman','pinjaman.id_kategori = kategori_pinjaman.id_kategori','left');
		$this->db->where('pinjaman.status','Baru');
		$this->db->where('pinjaman.id_pinjaman',$id_pinjaman);
		return $this->db->get();
	}

	function cek_status_pinjaman(){
		$this->db->select('id_anggota');
		$this->db->from('kategori_pinjaman');
		$this->db->where('status','Baru');
		return $this->db->get()->result();
	}

	function cek_anggota_lunas_belum(){
		$query = $this->db->query('select * from cek_anggota_lunas');
		return $query;
	}

	function cek_anggota_lunas(){
		$this->db->select('anggota.id_anggota,anggota.nama,pinjaman.id_anggota,pinjaman.status');
		$this->db->from('anggota');
		$this->db->join('pinjaman','anggota.id_anggota = pinjaman.id_anggota','left');
		$this->db->where('pinjaman.status','Lunas');
		return $this->db->get();
	}

	function cek_anggota_simpanan(){
		$this->db->select('anggota.id_anggota,anggota.nama,simpanan.id_anggota');
		$this->db->from('anggota');
		$this->db->join('simpanan','anggota.id_anggota = simpanan.id_anggota','inner');
		// $this->db->where('pinjaman.status',);
		$this->db->group_by('anggota.id_anggota');
		return $this->db->get();
	}

}