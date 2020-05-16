<?php

class ProductsModel extends CI_Model {

    public function insert_product($post)
    {
       return $this->db->insert('products',$post);
    }

    public function display_products() 
    {
        $q = $this->db->select()
                        ->from('products')
                        ->get();
            return $q->result();               
    }

    public function edit_products($product_id) 
    {
        $q = $this->db->select()
                       ->from('products')
                        ->where('id',$product_id)
                        ->get();
            return $q->row();
    }

    public function update_products($post,$product_id)
    {
        return $this->db->where('id',$product_id)
                    ->update('products',$post);
    }

    public function delete_product($data)
    {
        if (!empty($data)) {
            $this->db->where_in('id', $data)
                       ->delete('products');
       }
    }
}