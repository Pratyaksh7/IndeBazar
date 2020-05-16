<?php

class CategoriesModel extends CI_Model {

    public function insert_category($post)
    {
       return $this->db->insert('categories',$post);
    }

    public function display_categories()
    {
        $q= $this->db
                    ->select(['id','categoryName'])
                    ->from('categories')
                    ->get();
            return $q->result();
    }

    public function edit_categories($category_id)
    {
        $q = $this->db
                ->select(['id','categoryName','description'])
                ->from('categories')
                ->where('id',$category_id)
                ->get();
        return $q->row();
    }

    public function update_categories($post,$category_id)
    {  
        return $this->db->where('id',$category_id)
                    ->update('categories',$post);
    }

    public function delete_category($data)
    {
        if (!empty($data)) {
             $this->db->where_in('id', $data)
                        ->delete('categories');
        }
        
    }

    public function get_all_categories_list()
    {
        $q = $this->db->select(['categoryName'])
                        ->from('categories')
                        ->get();
            return $q->result();            
    }
}