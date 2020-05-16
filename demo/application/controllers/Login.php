<?php

class Login extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('login');

	}
	public function user_login()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_rules('email','Email','required|valid_email');		
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<small class="text-danger"> ','</small>');

		if ($this->form_validation->run() )
		{
			$email = $this->input->post('email');
            $password = $this->input->post('password'); 
			// validation Sucessful
			$this->load->model('usersmodel');

			if( $this->usersmodel->login_valid($email,$password) )
			{
				$id = $this->usersmodel->login_valid($email,$password); // because login_valid function returns the id
				$this->load->library('session');
				$this->session->set_userdata('user_id',$id);


				// $this->load->view('dashboard');
				return redirect('dashboard/index');
			}
			else{
				echo"Password do not match";
				 //authentication Failed
			}

			
		}
		else{
			//validation Unsuccessful
			$this->load->view('login');
		
		}
	}

	public function user_logout() {

		$this->session->unset_userdata('user_id');
		return redirect('login');
	}


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
}
