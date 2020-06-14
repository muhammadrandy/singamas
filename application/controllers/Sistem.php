<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sistem extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model(['pengaduan_m', 'masyarakat_m', 'tanggapan_m', 'petugas_m']);
    }

	//Authentication

	public function login()
	{
		alreadyLoginPetugas();
		$this->load->view('admin/login');
	}
	public function processlogin()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->petugas_m->login($post);
			if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'id_petugas' => $row->id_petugas,
                    'level' => $row->level   
                );
				$this->session->set_userdata($params);
				if ($row->level == 'admin') {
                    $level = "Administrator";
                }elseif ($row->level == 'petugas') {
                    $level = "Petugas";
                }
				$this->session->set_flashdata('loginsuccess', 'Selamat datang '.$level);
            	redirect('sistem/dashboard');
			}else{
				$this->session->set_flashdata('loginfail', 'username / password salah');
            	redirect('sistem/login');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('id_petugas');
		redirect('sistem/login');
	}

	//Dashboard

	public function index()
	{
		notLoginPetugas();
		$level = $this->utility->petugas_login()->level;
		$id = $this->utility->petugas_login()->id_petugas;
		$data['pengaduan'] = $this->pengaduan_m->getpengaduan()->num_rows();
		$data['petugas'] = $this->petugas_m->getpetugas()->num_rows();
		$data['masyarakat'] = $this->masyarakat_m->getmasyarakat()->num_rows();
		if ($level == 'admin') {
			$data['tanggapan'] = $this->tanggapan_m->gettanggapan()->num_rows();
		} else{
			$data['tanggapan'] = $this->tanggapan_m->gettanggapanpetugas($id)->num_rows();
		}
		$this->template->load('admin/template', 'admin/dashboard', $data);
	}
	public function dashboard()
	{
		notLoginPetugas();
		$level = $this->utility->petugas_login()->level;
		$id = $this->utility->petugas_login()->id_petugas;
		$data['pengaduan'] = $this->pengaduan_m->getpengaduan()->num_rows();
		$data['petugas'] = $this->petugas_m->getpetugas()->num_rows();
		$data['masyarakat'] = $this->masyarakat_m->getmasyarakat()->num_rows();
		if ($level == 'admin') {
			$data['tanggapan'] = $this->tanggapan_m->gettanggapan()->num_rows();
		} else{
			$data['tanggapan'] = $this->tanggapan_m->gettanggapanpetugas($id)->num_rows();
		}
		$this->template->load('admin/template', 'admin/dashboard', $data);
	}

	//Pengaduan

    public function pengaduan($menu, $id = null)
    {
    	notLoginPetugas();
    	if ($menu == 'data') {
	        $data['pengaduan'] = $this->pengaduan_m->getpengaduan();
	        $this->template->load('admin/template', 'admin/pengaduan/data', $data);

    	}elseif ($menu == 'proses') {

    		$post = $this->input->post(null,true);
	        if (isset($post['submit'])) {
	        	$this->tanggapan_m->tambah($post);
	        	$this->pengaduan_m->getstatus($post);
	            if ($this->db->affected_rows() > 0) {
	                $this->session->set_flashdata('success', 'disimpan');
	                redirect('sistem/pengaduan/data');
	            }
	        }

    	}elseif ($menu == 'prosespengaduan' && $id != null) {
    		
    		$data['row'] = $this->pengaduan_m->getpengaduan($id)->row();
        	$this->template->load('admin/template', 'admin/pengaduan/form', $data);

    	}elseif ($menu == 'selesai' && $id != null) {

    		$this->pengaduan_m->selesai($id);
	        if ($this->db->affected_rows() > 0) {
	                $this->session->set_flashdata('success', 'diselesaikan');
	        }
	        redirect('sistem/pengaduan/data');

    	}elseif ($menu == 'detail' && $id != null) {

    		$data['row'] = $this->pengaduan_m->getpengaduandetail($id)->row();
        	$this->template->load('admin/template', 'admin/pengaduan/detail', $data);
	        
    	}
    }

    //Tanggapan

    public function tanggapan($menu, $id = null)
    {
    	notLoginPetugas();
    	if ($menu == 'data') {

	        $id = $this->utility->petugas_login()->id_petugas;
	        if ($this->utility->petugas_login()->level == 'petugas') {
	            $data['tanggapan'] = $this->tanggapan_m->gettanggapanpetugas($id);
	        }else{
	            $data['tanggapan'] = $this->tanggapan_m->gettanggapan();
	        }
	        $this->template->load('admin/template', 'admin/tanggapan/data', $data);

    	}elseif ($menu == 'edit' && $id != null) {

	        $query = $this->tanggapan_m->gettanggapan($id);
	        if ($query->num_rows() > 0) {
	            $tanggapan = $query->row();
	            $data = [
	                'page' => 'edit',
	                'row' => $tanggapan 
	            ];
	            $this->template->load('admin/template', 'admin/tanggapan/edit', $data);
	        }else{
	            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
	            redirect('sistem/tanggapan/data');
	        }

    	}elseif ($menu == 'proses') {

	        $post = $this->input->post(null,true);
	        if (isset($post['submit'])) {
	            $row = $this->pengaduan_m->getpengaduan($post['id_pengaduan'])->row();
	        	$this->tanggapan_m->edit($post);
	            if ($row->status != $post['status']) {
	        	   $this->pengaduan_m->getstatus($post);
	            }
	            if ($this->db->affected_rows() > 0) {
	                $this->session->set_flashdata('success', 'disimpan');
	                redirect('sistem/tanggapan/data');
	            }
	        }

    	}elseif ($menu == 'prosestanggapan' && $id != null) {

	    	$data['row'] = $this->tanggapan_m->gettanggapan($id)->row();
	        $this->template->load('admin/template', 'admin/tanggapan/form', $data);

    	}elseif ($menu == 'detail' && $id != null) {

	        $data['row'] = $this->tanggapan_m->gettanggapan($id)->row();
	        $this->template->load('admin/template', 'admin/tanggapan/detail', $data);

    	}elseif ($menu == 'hapus' && $id != null) {

	        $row = $this->tanggapan_m->gettanggapan($id)->row();
	        $this->pengaduan_m->belum($row->id_pengaduan);
	        $this->tanggapan_m->hapus($id);
	        if ($this->db->affected_rows() > 0) {
	                $this->session->set_flashdata('success', 'dihapus');
	        }
	        redirect('sistem/tanggapan/data');

    	}
    }

    //Petugas

    public function petugas($menu, $id = null)
    {
    	notLoginPetugas();
    	checkAdmin();
    	if ($menu == 'data') {

	        $data['petugas'] = $this->petugas_m->getpetugas();
	        $this->template->load('admin/template', 'admin/petugas/data', $data);

    	}elseif ($menu == 'tambah') {

	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[petugas.nama_petugas]');
	        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
	        $this->form_validation->set_rules('level', 'Level', 'required');
	        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[petugas.username]|min_length[5]');
	        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
	        $this->form_validation->set_rules('passwordconf', 'Konfirmasi password', 'required|matches[password]', array('matches' => '%s tidak sesuai'));
	        $this->form_validation->set_message('required', '%s tidak boleh kosong');
	        $this->form_validation->set_message('min_length', '%s minimal 5 karakter');
	        $this->form_validation->set_message('is_unique', '%s ini sudah dipakai');
	        if ($this->form_validation->run() == FALSE) {   
	            $this->template->load('admin/template', 'admin/petugas/tambah');
	        }else{
	            $post = $this->input->post(null,true);
	            $this->petugas_m->tambah($post);
	            if ($this->db->affected_rows() > 0) {
	                $this->session->set_flashdata('success', 'ditambahkan');
	                redirect('sistem/petugas/data');
	            }
	        }

    	}elseif ($menu == 'edit' && $id != null) {

	        $this->load->library('form_validation');
	        $this->form_validation->set_rules('nama', 'Nama', 'required');
	        $this->form_validation->set_rules('telepon', 'Telepon', 'required');
	        $this->form_validation->set_rules('level', 'Level', 'required');
	        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
	        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
	        $this->form_validation->set_rules('passwordconf', 'Konfirmasi password', 'required|matches[password]', array('matches' => '%s tidak sesuai'));
	        $this->form_validation->set_message('required', '%s tidak boleh kosong');
	        $this->form_validation->set_message('min_length', '%s minimal 5 karakter');
	        $this->form_validation->set_message('is_unique', '%s ini sudah dipakai');
	        if ($this->form_validation->run() == FALSE) { 
	            $query = $this->petugas_m->getpetugas($id); 
	            if ($query->num_rows() > 0) {
	                $data['row'] = $query->row();
	                $this->template->load('admin/template', 'admin/petugas/edit', $data);
	            }else{
	                $this->session->set_flashdata('warning', 'Data tidak ditemukan');
	                redirect('sistem/petugas/data');
	            } 
	        }else{
	            $this->petugas_m->edit($id);
	            if ($this->db->affected_rows() > 0) {
	                $this->session->set_flashdata('success', 'diubah');
	                redirect('sistem/petugas/data');
	            }
	        }

    	}elseif ($menu == 'hapus' && $id != null) {

	        if ($this->utility->petugas_login()->id_petugas == $id) {
	            $this->session->set_flashdata('userfail', 'User sedang digunakan');
	            redirect('sistem/petugas');
	        }
	        $this->petugas_m->hapus($id);
	        if ($this->db->affected_rows() > 0) {
	            $this->session->set_flashdata('success', 'dihapus');
	                redirect('sistem/petugas/data');
	        }  

    	}
    }
    //Report

    public function report($menu)
    {
    	notLoginPetugas();
    	if ($menu == 'pengaduan') {

    		$data['detail'] = '';
	        $data['awal'] = '';
	        $data['akhir'] = '';
	        $post = $this->input->post(NULL, TRUE);
	        if (isset($post['cari'])) {
	            $awal = $post['awal'];
	            $akhir = $post['akhir'];
	            $data['pengaduan'] = $this->db->query("SELECT * FROM pengaduan INNER JOIN masyarakat ON masyarakat.nik = pengaduan.nik WHERE tgl_pengaduan BETWEEN '$awal' AND '$akhir'");
	            if ($awal == $akhir) {
	                $data['detail'] = tanggal($awal);
	            }else{
	                $data['detail'] = tanggal($awal).' - '.tanggal($akhir); 

	            }
	            $data['awal'] = $awal;
	            $data['akhir'] = $akhir;
	            $cek = $data['pengaduan']->num_rows();;
	            if ($cek == 0) {
	                $this->session->set_flashdata('warning', 'Data tidak ditemukan');
	               redirect('sistem/report/pengaduan');
	            }
	        }else{
	     
	            $data['pengaduan'] = $this->pengaduan_m->getPengaduan();
	        }
	        $this->template->load('admin/template', 'admin/report/pengaduan', $data);

    	}elseif ($menu == 'tanggapan') {

    		$data['detail'] = '';
	        $data['awal'] = '';
	        $data['akhir'] = '';
	        $post = $this->input->post(NULL, TRUE);
	        if (isset($post['cari'])) {
	            $awal = $post['awal'];
	            $akhir = $post['akhir'];
	            $data['tanggapan'] = $this->db->query("SELECT * FROM tanggapan INNER JOIN pengaduan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan INNER JOIN petugas ON petugas.id_petugas = tanggapan.id_petugas INNER JOIN masyarakat ON masyarakat.nik = pengaduan.nik WHERE tgl_tanggapan BETWEEN '$awal' AND '$akhir'");
	            if ($awal == $akhir) {
	                $data['detail'] = tanggal($awal);
	            }else{
	                $data['detail'] = tanggal($awal).' - '.tanggal($akhir); 


	            }
	            $data['awal'] = $awal;
	            $data['akhir'] = $akhir;
	            $cek = $data['tanggapan']->num_rows();
	            if ($cek == 0) {
	                $this->session->set_flashdata('warning', 'Data tidak ditemukan');
	                redirect('sistem/report/tanggapan');
	            }
	        }else{
	            $data['tanggapan'] = $this->tanggapan_m->getTanggapan();
	        }
	        $this->template->load('admin/template', 'admin/report/tanggapan', $data);

    	}elseif ($menu == 'printPengaduan') {

    		$awal = $this->uri->segment(4);
	        $akhir = $this->uri->segment(5);
	        $data['awal'] = $awal;
	        $data['akhir'] = $akhir;
	        $data['petugas'] = $this->utility->petugas_login()->level;
	        if ($awal == null) {
	            $data['pengaduan'] = $this->pengaduan_m->getPengaduan()->result();
	        }else{  
	            $data['pengaduan'] = $this->db->query("SELECT * FROM pengaduan INNER JOIN masyarakat ON masyarakat.nik = pengaduan.nik WHERE tgl_pengaduan BETWEEN '$awal' AND '$akhir'")->result();
	        }
	        $html = $this->load->view('admin/report/printPengaduan', $data, true);
        	$this->utility->print($html, 'pengaduan', 'A4', 'potrait');

    	}elseif ($menu == 'printTanggapan') {
    		
	        $awal = $this->uri->segment(4);
	        $akhir = $this->uri->segment(5);
    		$data['awal'] = $awal;
	        $data['akhir'] = $akhir;
	        $data['petugas'] = $this->utility->user_login()->level;
	        if ($awal == null) {
	            $data['tanggapan'] = $this->tanggapan_m->getTanggapan()->result();
	        }else{  
	            $data['tanggapan'] = $this->db->query("SELECT * FROM tanggapan INNER JOIN pengaduan ON pengaduan.id_pengaduan = tanggapan.id_pengaduan INNER JOIN petugas ON petugas.id_petugas = tanggapan.id_petugas INNER JOIN masyarakat ON masyarakat.nik = pengaduan.nik WHERE tgl_tanggapan BETWEEN '$awal' AND '$akhir'")->result();
	        }
	        $html = $this->load->view('admin/report/printTanggapan', $data, true);
	        $this->utility->print($html, 'Tanggapan', 'A4', 'potrait');

    	}
        
    }

}