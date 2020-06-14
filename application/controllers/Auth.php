<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
		$this->load->model('masyarakat_m');
	}
	public function proses()
	{
		$post = $this->input->post(null, TRUE);
		if (isset($post['login'])) {
			$query = $this->masyarakat_m->login($post);
			if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'nik' => $row->nik  
                );
				$this->session->set_userdata($params);
				$this->session->set_flashdata('loginsuccess', 'Selamat datang '.ucfirst($row->username));
            	redirect('dashboard');
			}else{
				$this->session->set_flashdata('loginfail', 'username / password salah');
            	redirect('#login');
			}
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('nik');
		redirect(base_url());
	}
}