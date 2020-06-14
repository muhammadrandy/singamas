<?php 
class Tanggapan_m extends CI_Model
{
    public function getTanggapan($id = null)
    {
        $this->db->from('tanggapan');
        $this->db->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan');
        $this->db->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        if ($id != null) {
            $this->db->where('id_tanggapan', $id);
        }
        return $this->db->get();
    }
    public function getTanggapanPengaduan($id = null)
    {
        $this->db->from('tanggapan');
        $this->db->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan');
        $this->db->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        if ($id != null) {
            $this->db->where('pengaduan.id_pengaduan', $id);
        }
        return $this->db->get();
    }
    public function getTanggapanNik($nik)
    {
        $this->db->from('tanggapan');
        $this->db->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan');
        $this->db->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        $this->db->where('masyarakat.nik', $nik);
        return $this->db->get();
    }
    public function tambah($post)
    {
        $data = [
            'id_pengaduan' => $post['id_pengaduan'],
            'tgl_tanggapan' => $post['tanggal'],
            'tanggapan' => $post['tanggapan'],
            'id_petugas' => $post['id_petugas']
        ];
        $this->db->insert('tanggapan', $data);
    }
    public function edit($post)
    {
        if ($post['tanggapan'] == '') {
            $tanggapan = $post['isitanggapan'];
        }else{
            $tanggapan = $post['tanggapan'];
        }
        $data = [            
            'tanggapan' => $tanggapan,
        ];
        $this->db->where('id_tanggapan', $post['id_tanggapan']);
        $this->db->update('tanggapan', $data);
    }
    public function hapus($id)
    {
        $this->db->where('id_tanggapan', $id);
        $this->db->delete('tanggapan');
    }
    public function gettanggapanpetugas($id)
    {
        $this->db->from('tanggapan');
        $this->db->join('pengaduan', 'pengaduan.id_pengaduan = tanggapan.id_pengaduan');
        $this->db->join('petugas', 'petugas.id_petugas = tanggapan.id_petugas');
        $this->db->join('masyarakat', 'masyarakat.nik = pengaduan.nik');
        $this->db->where('tanggapan.id_petugas', $id);
        return $this->db->get();
    }
}