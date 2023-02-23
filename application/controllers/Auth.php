<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function loginPage(){

        $data['title'] = 'Login Page';
        
        $this->load->view('templates/v_header', $data);
		$this->load->view('v_login', $data);
        $this->load->view('templates/v_footer', $data);

    }

    public function sendLogin(){

        $this->load->model('Auth_model');

        $this->Auth_model->check_user();

    }

    public function logout(){
        
        $this->session->sess_destroy();

        redirect('homepage');

    } 

    public function error(){

        redirect('homepage');

    } 

}
