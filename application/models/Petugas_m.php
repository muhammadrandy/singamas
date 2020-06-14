<?php 

class Petugas_m extends CI_Model
{
    public function login($post)
    {
        $this->db->from('petugas');
        $this->db->where('username', $post['username']);
        $this->db->where('password', $post['password']);
        return $this->db->get();
    }
    public function getPetugas($id = null)
    {
        $this->db->from('petugas');
        if ($id != null) {
            $this->db->where('id_petugas', $id);
        }
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'nama_petugas' => $post['nama'],
            'username' => $post['username'],
            'password' => $post['password'],
            'telp' => $post['telepon'],
            'level' => $post['level']
        ];
        $this->db->insert('petugas', $data);
    }
    public function edit($id)
    {
        $post = $this->input->post(null,true);
        $data = [
            'nama_petugas' => $post['nama'],
            'username' => $post['username'],
            'password' => $post['password'],
            'telp' => $post['telepon'],
            'level' => $post['level']
        ];
        $this->db->where('id_petugas', $id);
        $this->db->update('petugas', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id_petugas', $id);
        $this->db->delete('petugas');
    }
}