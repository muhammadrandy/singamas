<?php 
class Pengaduan_m extends CI_Model
{
    public function getPengaduan($id = null)
    {
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        if ($id != null) {
            $this->db->where('pengaduan.id_pengaduan', $id);
        }
        return $this->db->get();
    }
    public function getNikPengaduan($nik = null)
    {
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        if ($nik != null) {
            $this->db->where('pengaduan.nik', $nik);
        }
        return $this->db->get();
    }
    public function getpengaduandetail($id = null)
    {
        $this->db->from('pengaduan');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        $this->db->join('tanggapan', 'tanggapan.id_pengaduan = pengaduan.id_pengaduan');
        $this->db->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas');
        if ($id != null) {
            $this->db->where('pengaduan.id_pengaduan', $id);
        }
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'tgl_pengaduan' => $post['tanggal'],
            'nik' => $this->utility->user_login()->nik,
            'isi' => $post['isi'],
            'foto' => $post['foto'],
            'status' => 'belum',
            'privasi' => $post['privasi']
        ];
        $this->db->insert('pengaduan', $data);
    }
    public function edit($post)
    {
        $data = [            
            'privasi' => $post['privasi']
        ];
        if ($post['foto'] != null) {
            $data['foto'] = $post['foto'];
        }
        if ($post['isi'] != null) {
            $data['isi'] = $post['isi'];
        }else{
            $data['isi'] = $post['isip'];
        }
        $this->db->where('id_pengaduan', $post['id_pengaduan']);
        $this->db->update('pengaduan', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id_pengaduan', $id);
        $this->db->delete('pengaduan');
    }
    public function getstatus($post)
    {
        $this->db->query("UPDATE pengaduan SET status = '$post[status]' WHERE id_pengaduan = '$post[id_pengaduan]'");
    }
    public function selesai($id)
    {
        $data = [            
            'status' => 'selesai'
        ];
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }
    public function belum($id)
    {
        $data = [            
            'status' => 'belum'
        ];
        $this->db->where('id_pengaduan', $id);
        $this->db->update('pengaduan', $data);
    }
}