<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->model('User_model');
		$this->load->library('form_validation');
        $this->isLogin();
	}

	public function index()
	{

        $data['title'] = 'List User Cooluniverse.io';

        $data['list_user'] = $this->User_model->get_user();

        $this->load->view('templates/v_header', $data);
		$this->load->view('user/v_index_user', $data);
        $this->load->view('templates/v_footer', $data);

	}

    public function formAdd()
	{

        $data['title'] = 'Add User Form';
        
        $this->load->view('templates/v_header', $data);
		$this->load->view('user/v_add_user', $data);
        $this->load->view('templates/v_footer', $data);

	}

    public function sendAdd()
	{

        $this->form_validation->set_rules('first_name','First Name','trim|required');
        $this->form_validation->set_rules('last_name','Last Name','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');

        if ($this->form_validation->run() == false) {

			$data['title'] = 'Add User Form';
            
            $this->load->view('templates/v_header', $data);
            $this->load->view('user/v_add_user', $data);
            $this->load->view('templates/v_footer', $data);

		}else{

            $firstName = $this->input->post('first_name', true);
            $lastName = $this->input->post('last_name', true);
            $email = $this->input->post('email', true);
            $password = $this->input->post('password', true);

            $photo = $_FILES['photo']['name'];

            $config = array();
            $config['allowed_types'] = 'jpg|png|pdf|doc';
            $config['max_size'] = '2048';
            $config['upload_path'] = './images/'; 

            $this->load->library('upload', $config, 'photo');
            $this->photo->initialize($config);
            $upload_photo = $this->photo->do_upload('photo');

            $photo_name = $this->photo->data('file_name');

            $data = [
                "pin" => rand(100000000000000,999999999999999),
                "first_name" => $firstName,
                "last_name" => $lastName,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_BCRYPT),
                "profile_picture" => $photo_name
            ];

            $this->db->insert('user_list', $data);
            redirect('user');
        }
            
	}

    public function formEdit()
	{

        $data['title'] = 'Edit User Form';

        $id = $this->input->get('id',true);

        $this->db->where('id', $id);
        $data['user'] = $this->db->get('user_list')->row_array();
        
        $this->load->view('templates/v_header', $data);
		$this->load->view('user/v_edit_user', $data);
        $this->load->view('templates/v_footer', $data);

	}

    public function sendEdit()
	{

        $id = $this->input->post('id',true);
        $firstName = $this->input->post('first_name', true);
        $lastName = $this->input->post('last_name', true);
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $photo = $_FILES['photo']['name'];

        if ($photo){

            $config = array();
            $config['allowed_types'] = 'jpg|png|pdf|doc';
            $config['max_size'] = '2048';
            $config['upload_path'] = './images/'; 

            $this->load->library('upload', $config, 'photo');
            $this->photo->initialize($config);
            $upload_photo = $this->photo->do_upload('photo');

            $photo_name = $this->photo->data('file_name');

            $data = [
                "pin" => rand(100000000000000,999999999999999),
                "first_name" => $firstName,
                "last_name" => $lastName,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT),
                "profile_picture" => $photo_name
            ];

        }else{

            $data = [
                "pin" => rand(100000000000000,999999999999999),
                "first_name" => $firstName,
                "last_name" => $lastName,
                "email" => $email,
                "password" => password_hash($password, PASSWORD_DEFAULT)
            ];

        }

        $this->db->where('id', $id);
        $this->db->update('user_list', $data);

        redirect('user');
        
	}

    public function delete()
	{

        $id = $this->input->get('id',true);

        $this->db->where('id', $id);
        $this->db->delete('user_list');

        redirect('user');
        
	}

    public function isLogin(){

        $is_login = $this->session->userdata('id');

        if (!$is_login){
            redirect('Homepage');
        }

    }
}
