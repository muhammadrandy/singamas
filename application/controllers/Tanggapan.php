<?php 
class Tanggapan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['tanggapan_m', 'masyarakat_m', 'pengaduan_m']);
    }
    public function index()
    {
        $nik = $this->utility->user_login()->nik;
		$data['tanggapan'] = $this->tanggapan_m->getTanggapanNik($nik);
        $this->template->load('template', 'tanggapan/data', $data);
    }
    public function detail($id)
    {
        $data['row'] = $this->tanggapan_m->getTanggapan($id)->row();
        $this->template->load('template', 'tanggapan/detail', $data);
    }
}