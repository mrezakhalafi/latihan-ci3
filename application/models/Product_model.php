<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function get_product() {
        
        $this->db->select("*");
        $this->db->from('product_list');
        $user = $this->db->get()->result_array();

        return $user;

    }
}