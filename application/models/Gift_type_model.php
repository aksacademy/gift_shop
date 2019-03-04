<?php

class Gift_type_model extends CI_Model {
    
    public function get_by_id($gift_type_id) {
        $this->db->where('gift_type_id', $gift_type_id);
        $query = $this->db->get('gift_type');
        return $query->row();
    }
    
    public function get_by_sub_category_id($sub_category_id) {
        
        $this->db->where('sub_category_id', $sub_category_id);
        $query = $this->db->get('gift_type');
        return $query->result();
    }

    public function save($gift_type)
    {
        $inserted = $this->db->insert('gift_type', $gift_type);
        return $inserted;
    }
        
    public function update($gift_type, $gift_type_id)
    {
        $this->db->where('gift_type_id', $gift_type_id);
        $updated = $this->db->update('gift_type', $gift_type);
        return $updated;
    }
    
    public function delete($gift_type_id)
    {
        $this->db->where('gift_type_id', $gift_type_id);
        $deleted = $this->db->delete('gift_type');
        return $deleted;
    }
}
