<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function index()
    {
      // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'singamasonline@gmail.com',  // Email gmail
            'smtp_pass'   => 'singamasonline19',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];


        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        $post = $this->input->post(null,true);
        if (isset($post['kirimpesan'])) {
        	$this->email->from($post['email'], $post['namamail']);

	        $this->email->to('singamasonline@gmail.com'); 

	        $this->email->subject($post['subjek']);

	        $this->email->message($post['pesan']);

            if ($this->email->send()) {
                $this->session->set_flashdata('mail', 'Pesan terkirim');
            	redirect('#kontak');
            }

        }
    }
}