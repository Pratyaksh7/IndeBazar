<?php

class UsersModel extends CI_Model {
   
    public function login_valid($email, $password)
    {
        $q = $this->db->where(['email'=>$email, 'password'=>$password])
                        ->from('users')
                        ->get();
              
            if ($q->num_rows() ){
                
                return $q->row()->id;
            }                      
            else{
                return FALSE;
            }
    }

    public function add_user($post) {

        return $this->db->insert('users',$post);
    }

    public function search_single_user($search)
    {
        $q = $this->db->select(['id','username','email','password'])
                        ->from('users')
                        ->like('username',$search)
                        ->get();
            if( $q->num_rows() ){
                return $q->row();
            }   
            else {
                return FALSE;
            }         
    }

    public function display_users($limit, $offset) {
        $query = $this->db
                        ->select(['id','username','email'])
                        ->from('users')
                        ->limit( $limit, $offset )
                        ->get();
         return $query->result();               
    }

    public function count_all_users() {
        $query = $this->db
                        ->select(['id','username','email'])
                        ->from('users')
                        ->get();
             return $query->num_rows();           
    }

    public function delete_user($user_id)
    {
        return $this->db->delete('users',['id'=>$user_id]);
    }

}