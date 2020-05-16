<?php

class Product extends CI_Controller {

    public function index() {

        
        // echo"<pre>";
        // print_r($categories); exit;
        $this->load->model('productsmodel','products');
        $products = $this->products->display_products();
        $this->load->view('product_list',['products'=>$products]);
    }

    public function add_product() {
        $this->load->model('categoriesmodel','categories');
        $categories = $this->categories->get_all_categories_list();
        $this->load->view('add_product',['categories'=>$categories]);
    }

    public function store_product()
    {
        $config = [
            'upload_path'       =>      './uploads',
            'allowed_types'     =>      'jpg|jpeg|png|gif|JPG',
        ];
        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('productName','Product Name','required');
        $this->form_validation->set_rules('model','Model ','required');
        $this->form_validation->set_rules('price','Price','required');
        $this->form_validation->set_rules('category','Category','required');
        $this->form_validation->set_error_delimiters('<small class="text-danger"> ','</small>');

        if( $this->form_validation->run() && $this->upload->do_upload('image') )
        {
            $post = $this->input->post();
            unset($post['submit']);
            $data= $this->upload->data();
			$image_path= base_url("uploads/".$data['raw_name'].$data['file_ext']);
			$post['image_path'] = $image_path;
           
            $this->load->model('productsmodel','products');
            $this->products->insert_product($post);

            return redirect('product/index');
        }
        else {
            return redirect('product/add_product');
        }
    }

    public function edit_product($product_id)
    {
        $this->load->model('categoriesmodel','categories');
        $categories = $this->categories->get_all_categories_list();
        $this->load->model('productsmodel','products');
        $product = $this->products->edit_products($product_id);
        $this->load->view('edit_product',['product'=>$product,'categories'=>$categories]);
    }

    public function update_product($product_id)
    {
        $config = [
            'upload_path'       =>      './uploads',
            'allowed_types'     =>      'jpg|jpeg|png|gif|JPG',
        ];
        $this->load->library('upload', $config);

        $this->load->library('form_validation');
        $this->form_validation->set_rules('productName','Product Name','required');
        $this->form_validation->set_rules('model','Model ','required');
        $this->form_validation->set_rules('category','Category','required');
        $this->form_validation->set_rules('price','Price','required');
        $this->form_validation->set_error_delimiters('<small class="text-danger"> ','</small>');

        if( $this->form_validation->run() && $this->upload->do_upload('image') )
        {
            $post = $this->input->post();
            unset($post['submit']);
            $data= $this->upload->data();
			$image_path= base_url("uploads/".$data['raw_name'].$data['file_ext']);
            $post['image_path'] = $image_path;

            $this->load->model('productsmodel','products');
            $this->products->update_products($post,$product_id); 
            
            return redirect('product/index');            

        }
        else {
            $this->load->view('edit_product',['id'=>$product_id]);
        }
    }

    public function delete_products()
    {
        $data = $this->input->post('delete');
        $this->load->model('productsmodel','products');
        $this->products->delete_product($data);
        return redirect('product/index');
    }

    public function __construct() 
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->view('header');
    }
}