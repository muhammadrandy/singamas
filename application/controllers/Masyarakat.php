<?php 
class Masyarakat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('masyarakat_m');
    }
    public function tambah()
    {
        $post = $this->input->post(null,true);
        if (isset($post['tambah'])) {
            $ceknik = $this->db->query("SELECT * FROM masyarakat WHERE nik = '$post[nik]'")->num_rows();
            $cekuser = $this->db->query("SELECT * FROM masyarakat WHERE username = '$post[usernames]'")->num_rows();
            if ($ceknik > 0) {
                $this->session->set_flashdata('ceknik', 'Nik sudah ada');
                redirect('#daftar');
            }elseif ($cekuser > 0) {
                $this->session->set_flashdata('cekuser', 'Username sudah ada');
                redirect('#daftar');
            }else{
                $this->masyarakat_m->tambah($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('daftar', 'Silahkan login');
                }
                redirect('#login');
            }

        }
    }
}