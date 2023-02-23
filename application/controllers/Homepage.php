<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {

	public function index()
	{

        $data['title'] = 'Test Belajar Codeigniter 3';
		$data['user'] = $this->session->userdata('id');
        
		$this->load->view('templates/v_header', $data);
		$this->load->view('v_homepage', $data);
		$this->load->view('templates/v_footer', $data);

	}
}
