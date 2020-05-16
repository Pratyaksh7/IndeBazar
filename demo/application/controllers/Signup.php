<?php 

class Signup extends CI_Controller {

    public function index(){
        $this->load->helper('form');
        $this->load->view('signup');
    }

    public function signed_up_user()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username','User Name','required');
		$this->form_validation->set_rules('email','Email','required|valid_email');		
        $this->form_validation->set_rules('password','Password','required');
        $this->form_validation->set_rules('passwordConf','Password Confirmed','required');
        $this->form_validation->set_error_delimiters('<small class="text-danger"> ','</small>');

        if( $this->form_validation->run() )
        {
            $username = $this->input->post('username');
            $email = $this->input->post('email');
            $password = $this->input->post('password'); 
            $post = $this->input->post();
            unset($post['passwordConf']);
            unset($post['submit']);
            $this->load->model('usersmodel','users');
             if( $this->users->add_user($post) ) 
            { //successful flashdata
                $this->session->set_flashdata('signup_success','You addedd Successfully!');
                  return redirect('login');
            }
            else{
                    //Unsuccessful Flashdata
            }
                
        }

        else {
            $this->load->view('signup');
        }
        
    }

    public function add_user() {
        $this->load->helper('form');
    }
}