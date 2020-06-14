<?php 

    function alreadyLogin()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('nik');
        if ($userSession) {
            redirect('dashboard');
        }
    }
    function notLogin()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('nik');
        if (!$userSession) {
            redirect(base_url());
        }
    }
    function alreadyLoginPetugas()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('id_petugas');
        if ($userSession) {
            redirect('sistem/dashboard');
        }
    }
    function notLoginPetugas()
    {
        $ci =& get_instance();
        $userSession = $ci->session->userdata('id_petugas');
        if (!$userSession) {
            redirect('sistem/login');
        }
    }
    function checkAdmin()
    {
        $ci =& get_instance();
        $ci->load->library('utility');
        if ($ci->utility->petugas_login()->level != 'admin') {
            redirect('sistem/dashboard');
        }
    }
    function idr($rp)
    {
        $result = "Rp ".number_format($rp);
        return $result;
    }
    function tanggal($tanggal){
        $bulan = array (1 => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        $pecahkan = explode('-', $tanggal);
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

    
?>