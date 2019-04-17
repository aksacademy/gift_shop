<?php
class Deliverable_pincode_model extends CI_Model{

    public function get_all()
    {
        $query = $this->db->get('deliverable_pincode');
        return $query->result();
    }
    
    public function get_by_id($pincode_id)
    {
        $this->db->where('pincode_id', $pincode_id);
        $query = $this->db->get('deliverable_pincode');
        return $query->row();
    }
    
    public function get_by_pincode($pincode)
    {
        $this->db->where('pincode', $pincode);
        $query = $this->db->get('deliverable_pincode');
        return $query->row();
    }
    
    public function save($deliverable_pincode)
    {
        $inserted = $this->db->insert('deliverable_pincode', $deliverable_pincode);
        return $inserted;
    }
    
    public function update($deliverable_pincode, $pincode_id)
    {
        $this->db->where('pincode_id', $pincode_id);
        $updated = $this->db->update('deliverable_pincode', $deliverable_pincode);
        return $updated;
    }
    
    public function delete($pincode_id)
    {
        $this->db->where('pincode_id', $pincode_id);
        $deleted = $this->db->delete('deliverable_pincode');
        return $deleted;
    }
    
    public function check_for_unique_pincode($pincode_id, $pincode) {
        $this->db->where_not_in('pincode_id', $pincode_id);
        $this->db->where('pincode', $pincode);
        $query = $this->db->get('deliverable_pincode');
        return $query->num_rows();
    }
}
