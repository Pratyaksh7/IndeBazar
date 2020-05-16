<?php 

class Dashboard extends CI_Controller {

    public function index(){
        
        if( ! $this->session->userdata('user_id') )
            return redirect('login');

            
        $this->load->model('usersmodel','users');

        $this->load->library('pagination');
        $config = [
            'base_url'      =>  base_url('dashboard/index'),
            'per_page'      =>  5,
            'total_rows'    =>  $this->users->count_all_users(),
        ];

        $this->pagination->initialize($config);

        $users = $this->users->display_users($config['per_page'],$this->uri->segment(3));
        $data['infos'] = $this->users->display_users($config['per_page'],$this->uri->segment(3));
        $this->load->view('dashboard',$data);


    }

    public function search_user() {

        $this->load->model('usersmodel','users');
        $this->load->library('pagination');
        $config = [
            'base_url'      =>  base_url('dashboard/index'),
            'per_page'      =>  5,
            'total_rows'    =>  $this->users->count_all_users(),
        ];

        $this->pagination->initialize($config);

        $search = $this->input->post('search');
        
       
        $data['infos'][] = $this->users->search_single_user($search);
        
        $this->load->view('dashboard',$data);
    }

    public function add_user_details($user_id) {
        
        $this->load->view('add_detail',['id'=> $user_id]);
    }

    public function store_user_details($user_id) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('phone','Phone Number','required|numeric|exact_length[10]');
        $this->form_validation->set_error_delimiters('<small class="text-danger"> ','</small>');

        if( $this->form_validation->run() )
        {
            $post = $this->input->post();
            unset($post['submit']);
            $this->load->model('detailsmodel','details');
          $this->details->insert_details($post,$user_id);


            return redirect('dashboard/index');
        }

        else {
            $this->load->view('add_detail',['id'=>$user_id]);
        }
    }

    public function edit_user_details($user_id)
    {
        $this->load->model('detailsmodel','details');
        $detail = $this->details->find_detail($user_id);
        $this->load->view('edit_detail',['detail'=> $detail]);

    }

    public function update_user_details($user_id) {

        $this->load->library('form_validation');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('phone','Phone Number','required|numeric|exact_length[10]');
        $this->form_validation->set_error_delimiters('<small class="text-danger"> ','</small>');

        if ( $this->form_validation->run() )
        {
            //form validation valid
            $post = $this->input->post();
            unset($post['submit']);
            $this->load->model('detailsmodel','details');
            $this->details->update_detail($post,$user_id);

            return redirect('dashboard/index');
        }
        else {
            // form validation error 
            $this->load->view('edit_detail',['id'=>$user_id]);
        }

    }

    public function delete_user($user_id){
        $this->load->model('detailsmodel','details');
        $this->details->delete_user($user_id);
        $this->load->model('usersmodel','users');
        $this->users->delete_user($user_id);

        return redirect('dashboard/index');
        
    } 
    

    public function __construct()
    {
        parent::__construct();
         $this->load->helper('form');
         $this->load->view('header');
    }
}