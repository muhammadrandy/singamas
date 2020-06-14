<?php 
Class Utility{

	protected $ci;

	function __construct()
	{
		$this->ci =& get_instance();
	}

	function user_login()
	{
		$this->ci->load->model('masyarakat_m');
		$nik = $this->ci->session->userdata('nik');
		return $this->ci->masyarakat_m->getMasyarakat($nik)->row();
	}
	function petugas_login()
	{
		$this->ci->load->model('petugas_m');
		$petugas = $this->ci->session->userdata('id_petugas');
		return $this->ci->petugas_m->getPetugas($petugas)->row();
	}
	function print($html, $filename, $paper, $orientation)
	{
		$dompdf = new Dompdf\Dompdf;
		$dompdf->loadHTML($html);
		$dompdf->setPaper($paper, $orientation);
		$dompdf->render();
		$dompdf->stream($filename, array('Attachment' => 0));

	}

}

?>