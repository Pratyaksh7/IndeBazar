<?php

class Category extends CI_Controller {

    public function index() {
        $this->load->model('categoriesmodel','categories');
        $categories = $this->categories->display_categories();
        
        $this->load->view('category_list',['categories'=>$categories]);
    }

    public function add_category() {
        $this->load->view('add_category');
    }

    public function store_category()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('categoryName', 'Category Name','required');
        $this->form_validation->set_error_delimiters('<small class="text-danger"> ','</small>');

        if( $this->form_validation->run() )
        {
            $post = $this->input->post();
            unset($post['submit']);
            $this->load->model('categoriesmodel','categories');
            $this->categories->insert_category($post);

            return redirect('category/index');
        }
        else {
            return redirect('category/add_category');
        }
    }

    public function edit_category($category_id)
    {
        
        $this->load->model('categoriesmodel','categories');
        $category = $this->categories->edit_categories($category_id);
        $this->load->view('edit_category',['category'=>$category]);
    }

    public function update_category($category_id)
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('categoryName', 'Category Name','required');
        $this->form_validation->set_error_delimiters('<small class="text-danger"> ','</small>');

        if($this->form_validation->run() )
        {
            $post = $this->input->post();
            unset($post['submit']);
            $this->load->model('categoriesmodel','categories');
            $this->categories->update_categories($post,$category_id);

            return redirect('category/index');            
        }

        else {
            $this->load->view('edit_category',['id'=>$category_id]);
        }

    }

    public function delete_categories(){

        $data = $this->input->post('delete');
        $this->load->model('categoriesmodel','categories');
        $this->categories->delete_category($data);
        return redirect('category/index');
        // if ( $this->input->post('category') )
        // {
        //     $id = $this->input->post('checkbox_value');
        //         for($count = 0; $count < count($id); $count++)
        //         {   
        //             $this->load->model('categoriesmodel','categories');
        //             $this->categories->delete($id[$count]);
        //             $this->multiple_delete_model->delete($id[$count]);
        //         }
        //       return redirect('category/index');  
        // }

    }

    public function __construct()
    {
        parent::__construct();
         $this->load->helper('form');
         $this->load->view('header');
    }
}