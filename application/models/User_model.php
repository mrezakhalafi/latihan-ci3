<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function get_user() {
        
        $this->db->select("*");
        $this->db->from('user_list');
        return $this->db->get()->result_array();

    }
}