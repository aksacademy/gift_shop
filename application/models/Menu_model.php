<?php

class Menu_model extends CI_Model {

    public function get_all() {
        $query = $this->db->get('menu');
        return $query->result();
    }
    
    public function get_by_id($menu_id)
    {
        $this->db->where('menu_id', $menu_id);
        $query = $this->db->get('menu');
        return $query->row();
    }
    
    public function save($menu)
    {
        $inserted = $this->db->insert('menu', $menu);
        return $inserted;
    }
    
    public function update($menu, $menu_id)
    {
        $this->db->where('menu_id', $menu_id);
        $updated = $this->db->update('menu', $menu);
        return $updated;
    }
    
    public function delete($menu_id)
    {
        $this->db->where('menu_id', $menu_id);
        $deleted = $this->db->delete('menu');
        return $deleted;
    }
}
