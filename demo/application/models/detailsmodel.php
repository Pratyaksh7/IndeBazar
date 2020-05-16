<?php

class DetailsModel extends CI_Model {

    public function insert_details($post,$user_id)
    {
        $data = array(
            'address'   =>  $post['address'],
            'phone'     =>  $post['phone']
        );
        
        return $this->db->where('id',$user_id)
                    ->insert('details',$data);
        
    }

    public function find_detail($user_id)
    {
        $q = $this->db->select(['id','address','phone'])
                    ->from('details')
                    ->where('id',$user_id)
                    ->get();
          return $q->row();          
    }

    public function add_details($user_id) {
        return $user_id;
    }

    public function update_detail($post,$user_id)
    {
        $data = array(
            'address'   =>  $post['address'],
            'phone'     =>  $post['phone']
        );
        
        return $this->db->where('id',$user_id)
                    ->update('details',$data);
    }

    public function delete_user($user_id){
        return $this->db->delete('details',['id'=>$user_id]);
                        
    }

}