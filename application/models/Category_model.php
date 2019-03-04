<?php

class Category_model extends CI_Model {

    public function get_all() {
        //$query = $this->db->query('select * from menu, category where menu.menu_id = category.menu_id');
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->join('category', 'menu.menu_id = category.menu_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function save($category) {
        $inserted = $this->db->insert('category', $category);
        return $inserted;
    }
    
    public function get_by_id($category_id) {
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('category');
        return $query->row();
    }
    
    public function update($category, $category_id)
    {
        $this->db->where('category_id', $category_id);
        $updated = $this->db->update('category', $category);
        return $updated;
    }
    
    public function delete($category_id)
    {
        $this->db->where('category_id', $category_id);
        $deleted = $this->db->delete('category');
        return $deleted;
    }

    public function get_by_menu_id($menu_id) {
        
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get('category');
        return $query->result();
    }
    
}
