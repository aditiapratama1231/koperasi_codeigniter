<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simpanan extends CI_Controller {
	function __construct(){
		parent::__construct();
		if($this->session->userdata('status') != "login"){
			redirect("login");
		}
		$this->load->model('m_simpanan');
		 $this->load->helper('url'); 
	}

	function index(){
		$data['anggota'] = $this->db->get('anggota');
		$data['jenis_simpan'] = $this->db->get('jenis_simpanan');
		// $this->load->view('simpanan/tambah_simpanan',$data);
		$this->load->view('simpanan/transaksi_simpanan',$data);
		}

	function transaksi_simpan(){

		$id_anggota = $this->input->post('id_anggota');
		$id_jenis = $this->input->post('id_jenis');

		$data = array(
			'id_anggota' => $id_anggota,
			'id_jenis' => $id_jenis
			);

		// echo '<pre>'; print_r($data); echo'</pre>';
		header('location:'.base_url('simpanan/transaksi_simpan_next/'.$id_anggota.'/'.$id_jenis));

		// $this->load->view('simpanan/transaksi_simpanan');
	}

	function jenis_simpanan(){
		$data['jenis_simpan'] = $this->db->get('jenis_simpanan');
		$this->load->view('simpanan/jenis_simpanan',$data);
	}

	function transaksi_simpan_next(){

		$id_anggota = $this->uri->segment(3);
		$id_jenis = $this->uri->segment(4);

		$data['id_anggota'] = $id_anggota;
		$data['id_jenis'] = $id_jenis;

		$q = $this->m_simpanan->tampil_jenis_simpanan($id_jenis);
			foreach($q->result_array() as $res){
				$data['id_jenis'] = $res['id_jenis'];
				$data['nama_simpanan'] = $res['nama_simpanan'];
				$data['besar_simpanan'] = $res['besar_simpanan'];
				$data['tipe_simpanan'] = $res['type'];
				$data['keterangan'] = $res['keterangan'];
			}

		$view = '';
		if($data['nama_simpanan'] == 'Pokok'){
			$data['anggota'] = $this->m_simpanan->tampil_anggota_by_id($id_anggota);
			$data['jenis_simpan'] = $this->m_simpanan->tampil_jenis_simpanan($id_jenis);
			$q = $this->m_simpanan->cek_simpanan($id_anggota,$id_jenis);
			$res = $q->num_rows();
			if($res == 0){
				$q = $this->m_simpanan->tampil_anggota_by_id($id_anggota);
				$res = $q->row();
				$tanggal_daftar = $res->tgl_pendaftaran;
				$data['bulan'] = date('m',strtotime($tanggal_daftar));
				$data['tahun'] = date('Y',strtotime($tanggal_daftar));
				$view = 'simpanan_pokok_belum';
			}
			else{
				$view = 'simpanan_pokok_sudah';
			}
		}

		elseif($data['nama_simpanan'] == 'Wajib'){
			$data['anggota'] = $this->m_simpanan->tampil_anggota_by_id($id_anggota);
			$data['jenis_simpan'] = $this->m_simpanan->tampil_jenis_simpanan($id_jenis);
			$q = $this->m_simpanan->cek_simpanan($id_anggota,$id_jenis);
			$cek = $q->num_rows();

			if($cek!=0){
				$res = $q->row();

				if($res->bulan==12){
					$data['bulan'] = 1;
					$data['tahun'] = $res->tahun+1;
				}
				else{
					$data['bulan'] = $res->bulan+1;
					$data['tahun'] = $res->tahun;
				}

			}
			else{
				$q = $this->m_simpanan->tampil_anggota_by_id($id_anggota);
				$res = $q->row();
				$tanggal_daftar = $res->tgl_pendaftaran;
				$data['bulan'] = date('m',strtotime($tanggal_daftar));
				$data['tahun'] = date('Y',strtotime($tanggal_daftar));
			}

			$view = 'simpanan_wajib';
		}
		elseif($data['nama_simpanan'] == 'Sukarela'){
			$data['anggota'] = $this->m_simpanan->tampil_anggota_by_id($id_anggota);
			$data['jenis_simpan'] = $this->m_simpanan->tampil_jenis_simpanan($id_jenis);
			
			$q = $this->m_simpanan->tampil_anggota_by_id($id_anggota);
			$res = $q->row();
			$tanggal_daftar = $res->tgl_pendaftaran;
			$data['bulan'] = date('m',strtotime($tanggal_daftar));
			$data['tahun'] = date('Y',strtotime($tanggal_daftar));

			$view = 'simpanan_sukarela';
		}

		$this->load->view('simpanan/'.$view,$data);

		// $this->load->view('simpanan/transaksi_simpanan');

	}

	function aksi_tambah_jenis_simpanan(){
		$nama_simpanan = $this->input->post('nama_simpanan');
		$besar_simpanan = $this->input->post('besar_simpanan');
		$tipe_simpanan = $this->input->post('type');
		$keterangan = $this->input->post('keterangan');

		$data = array(
				'nama_simpanan' => $nama_simpanan,
				'besar_simpanan' => $besar_simpanan,
				'type' => $tipe_simpanan,
				'keterangan' =>$keterangan
			);

		$this->db->insert('jenis_simpanan',$data);
		// echo '<pre>'; print_r($data); echo'</pre>';
			header('location:'.base_url('simpanan/jenis_simpan'));

	}

	function aksi_simpan(){
			$id_anggota = $this->input->post('id_anggota');
			// $nama_anggota = $this->input->post('nama_anggota');
			$tgl_simpan = $this->input->post('tgl_simpan');
			$id_simpan = $this->input->post('id_jenis');
			$besar_simpan = $this->input->post('besar_simpanan');
			$keterangan = $this->input->post('keterangan');
			$bulan = $this->input->post('bulan');
			$tahun = $this->input->post('tahun');

			$data = array(
					'id_anggota' => $id_anggota,
					'tgl_simpanan' => $tgl_simpan,
					'id_jenis' => $id_simpan,
					'besar_simpanan' => $besar_simpan,
					'keterangan' => $keterangan,
					'bulan' => $bulan,
					'tahun' => $tahun
				);

			$this->db->insert('simpanan',$data);
			// echo '<pre>'; print_r($data); echo'</pre>';
			header('location:'.base_url('simpanan/kelola_simpanan'));
		}

		function kelola_simpanan(){
			// $data['simpanan'] = $this->m_simpanan->tampil_simpanan();
			$this->load->model('m_simpanan');
			$data['simpanan'] = $this->m_simpanan->tampil_simpanan()->result();
			// print_r($data['simpanan']);
			$this->load->view('simpanan/kelola_simpanan',$data);
		}

	function edit($id_jenis){
		$where = array('id_jenis' => $id_jenis);
		$data['jenis_simpanan'] = $this->m_simpanan->edit_jenis_simpanan($where,'jenis_simpanan')->result();
		$this->load->view('simpanan/edit_jenis_simpanan',$data);
		echo "s";
	}

	function update_data_jenis_simpanan(){
		$id_jenis = $this->input->post('id_jenis');
		$nama_jenis_simpanan =  $this->input->post('nama_jenis_simpanan');
		$besar_simpanan = $this->input->post('besar_simpanan');
		$tipe_simpanan = $this->input->post('tipe_simpanan');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'nama_simpanan' => $nama_jenis_simpanan,
			'besar_simpanan' => $besar_simpanan,
			'type' => $tipe_simpanan,
			'keterangan' => $keterangan
			);

		$where = array(
			'id_jenis' => $id_jenis
			);

		$this->db->where($where);
		$this->db->update('jenis_simpanan',$data);
		header('location:'.base_url('simpanan/jenis_simpanan'));
	}
}

?>	