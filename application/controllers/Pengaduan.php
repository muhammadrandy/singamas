<?php 
class Pengaduan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        notLogin();
        $this->load->model(['pengaduan_m', 'masyarakat_m', 'tanggapan_m']);
    }
    public function index()
    {
        $data['pengaduan'] = $this->pengaduan_m->getNikPengaduan($this->utility->user_login()->nik);
        $this->template->load('template', 'pengaduan/data', $data);
    }
    public function tambah()
    {
        $pengaduan = new stdClass();
        $pengaduan->id_pengaduan = null;
        $pengaduan->tgl_pengaduan = null;
        $pengaduan->isi = null;
        $pengaduan->foto = '';
        $pengaduan->privasi = null;
        $data = [
            'page' => 'tambah',
            'row' => $pengaduan
        ];
        $this->template->load('template', 'pengaduan/tambah', $data);
    }
    public function edit($id)
    {
        $query = $this->pengaduan_m->getPengaduan($id);
        if ($query->num_rows() > 0) {
            $pengaduan = $query->row();
            $data = [
                'page' => 'edit',
                'row' => $pengaduan 
            ];
            $this->template->load('template', 'pengaduan/edit', $data);
        }else{
            $this->session->set_flashdata('warning', 'Data tidak ditemukan');
            redirect('pengaduan');
        }
    }
    public function proses()
    {
        $post = $this->input->post(null,true);
        $config['upload_path']          = './uploads/pengaduan/';
        $config['allowed_types']        = 'jpg|png|jpeg';
        $config['max_size']             = 200000;
        $config['file_name']            = 'pengaduan-'.date('ymd').'-'.substr(md5(rand()),0,10);
        $this->load->library('upload', $config);
        if (isset($post['tambah'])) {
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {
                    $post['foto'] = $this->upload->data('file_name');
                    $this->pengaduan_m->tambah($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'ditambahkan');
                    }
                    redirect('pengaduan');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errorimg', $error);
                    redirect('pengaduan/tambah');
                }
                
            } else {
                $post['foto'] = 'notfound.jpg';
                $this->pengaduan_m->tambah($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'ditambahkan');
                }
                redirect('pengaduan');
            }
            

        } else if (isset($post['edit'])) {
            if (@$_FILES['foto']['name'] != null) {
                if ($this->upload->do_upload('foto')) {

                    $pengaduan = $this->pengaduan_m->getpengaduan($post['id_pengaduan'])->row();
                    if ($pengaduan->foto != null) {
                        $replace = './uploads/pengaduan/'.$pengaduan->foto;
                        unlink($replace);   
                    }

                    $post['foto'] = $this->upload->data('file_name');
                    $this->pengaduan_m->edit($post);
                    if ($this->db->affected_rows() > 0) {
                        $this->session->set_flashdata('success', 'diubah');
                    }
                    redirect('pengaduan');
                } else {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('errorimg', $error);
                    redirect('pengaduan/edit/'.$post['id_pengaduan']);
                }
                
            } else {
                $post['foto'] = null;
                $this->pengaduan_m->edit($post);
                if ($this->db->affected_rows() > 0) {
                    $this->session->set_flashdata('success', 'diubah');
                }
                redirect('pengaduan');
            }

        }
    }
    public function detail($id)
    {
        $data['row'] = $this->tanggapan_m->getTanggapanPengaduan($id)->row();
        $this->template->load('template', 'pengaduan/detail', $data);
    }
    public function hapus($id)
    {
        $pengaduan = $this->pengaduan_m->getPengaduan($id)->row();
        if ($pengaduan->foto != null) {
            $replace = './uploads/pengaduan/'.$pengaduan->foto;
            unlink($replace);   
        }
        $this->pengaduan_m->hapus($id);
        if ($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'dihapus');
        }
        redirect('pengaduan');
    }
}