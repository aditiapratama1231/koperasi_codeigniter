<?php
	class M_shu extends CI_Model{
		function total_shu(){
			$this->db->select('sum(besar_shu) as total_shu');
			$this->db->from('shu');
			return $this->db->get();
		}

		function anggota_angsuran_shu(){
			$this->db->select('angsuran.id_pinjaman,anggota.nama,shu.tgl_masuk,shu.besar_shu,shu.id_angsuran,anggota.id_anggota, sum(besar_shu) as besar_shu_anggota');
			$this->db->from('shu');
			$this->db->join('angsuran','angsuran.id_angsuran = shu.id_angsuran','inner');
			$this->db->join('pinjaman','pinjaman.id_pinjaman = angsuran.id_pinjaman','inner');
			$this->db->join('anggota','anggota.id_anggota = pinjaman.id_anggota');
			$this->db->group_by('anggota.id_anggota');
			$this->db->group_by('pinjaman.id_pinjaman');
			return $this->db->get();
		}
	}
?>