<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function index()
	{
		$data['tanggapan'] = $this->db->query("SELECT * FROM tanggapan INNER JOIN pengaduan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan INNER JOIN petugas ON petugas.id_petugas = tanggapan.id_petugas INNER JOIN masyarakat ON masyarakat.nik = pengaduan.nik WHERE privasi = 'ya' AND status = 'selesai'");
		$this->load->view('front', $data);
	}
}
