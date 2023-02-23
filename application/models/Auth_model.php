<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

    public function check_user() {
        
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $this->db->select("*");
        $this->db->from('user_list');
        $this->db->where('email',$email);
        $user = $this->db->get()->row_array();

        if ($user){

            if (password_verify($password, $user['PASSWORD'])){
                
                $data = [
                    'id' => $user['ID'],
                    'first_name' => $user['FIRST_NAME'],
                    'last_name' => $user['LAST_NAME'],
                    'email' => $user['EMAIL'],
                    'password' => $user['PASSWORD']
                ];

                $this->session->set_userdata($data);
                redirect('homepage');

            }else{
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('Auth/loginPage');
            }

        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Account not found!</div>');
            redirect('Auth/loginPage');
        }

    }
}