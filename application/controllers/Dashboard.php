<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		notLogin();
		$this->load->model(['pengaduan_m', 'tanggapan_m']);
		$nik = $this->utility->user_login()->nik;
		$data['pengaduan'] = $this->pengaduan_m->getNikPengaduan($nik)->num_rows();
		$data['tanggapan'] = $this->tanggapan_m->getTanggapanNik($nik)->num_rows();
		$this->template->load('template', 'dashboard', $data);
	}
}
