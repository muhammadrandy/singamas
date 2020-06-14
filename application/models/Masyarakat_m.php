<?php 

class Masyarakat_m extends CI_Model
{
    public function login($post)
    {
        $this->db->from('masyarakat');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        return $this->db->get();
    }
    public function getMasyarakat($id = null)
    {
        $this->db->from('masyarakat');
        if ($id != null) {
        	$this->db->where('nik', $id);
        }
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'nik' => $post['nik'],
            'nama' => $post['nama'],
            'username' => $post['usernames'],
            'password' => $post['passwords'],
            'telp' => $post['telepon']
        ];
        $this->db->insert('masyarakat', $data);
    }
    public function edit($nik)
    {
        $post = $this->input->post(null,true);
        $data = [
            'nama' => $post['nama'],
            'username' => $post['username'],
            'password' => $post['password'],
            'telp' => $post['telp']
        ];
        $this->db->where('nik', $nik);
        $this->db->update('masyrakat', $data);
    }
    public function hapus($nik)
    {
        $this->db->where('nik', $nik);
        $this->db->delete('masyrakat');
    }
}