<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('cart');
        $this->isLogin();
	}

	public function index()
	{

        $data['title'] = 'List Produk Cooluniverse.io';

        $data['list_product'] = $this->Product_model->get_product();

        function rupiah($angka){
	
            $hasil_rupiah = number_format($angka,2,',','.');
            return $hasil_rupiah;
         
        }

        $this->load->view('templates/v_header', $data);
		$this->load->view('product/v_index_product', $data);
        $this->load->view('templates/v_footer', $data);

	}

    public function addCart()
	{

        $data['title'] = 'List Produk Cooluniverse.io';
        $id = $this->input->get('id');
        $quantity = $this->input->get('qty');

        $this->db->select("*");
        $this->db->from('product_list');
        $this->db->where('id',$id);
        $product = $this->db->get()->row_array();

        $productSingle = array(
            'id'      => $product['ID'],
            'code'    => $product['CODE'],
            'name'    => $product['NAME'],
            'price'   => $product['PRICE'],
            'media'   => $product['MEDIA'],
            'qty'   => $quantity
        );

        $this->cart->insert($productSingle);
        redirect('Product/listCart');

	}

    public function listCart()
    {

        $data['title'] = 'List My Cart';

        $data['cart'] = $this->cart->contents();
        $data['total_items'] = $this->cart->total_items();

        function rupiah($angka){
	
            $hasil_rupiah = number_format($angka,2,',','.');
            return $hasil_rupiah;
         
        }

        $this->load->view('templates/v_header', $data);
        $this->load->view('product/v_index_cart', $data);
        $this->load->view('templates/v_footer', $data);

    }

    public function deleteCart()
    {

        $id = $this->input->get('id');
        $this->cart->remove($id);
        redirect('Product/listCart');

    }

    public function addQuantity(){

        $id = $this->input->get('id');
        $quantity = $this->input->get('qty') + 1;
        
        $data = array(
            'rowid' => $id,
            'qty'   => $quantity
        );
    
        $this->cart->update($data);
        redirect('Product/listCart');

    }

    public function minQuantity(){

        $id = $this->input->get('id');
        $quantity = $this->input->get('qty') - 1;
        
        $data = array(
            'rowid' => $id,
            'qty'   => $quantity
        );
    
        $this->cart->update($data);
        redirect('Product/listCart');

    }

    public function isLogin(){

        $is_login = $this->session->userdata('id');

        if (!$is_login){
            redirect('Homepage');
        }

    }

}