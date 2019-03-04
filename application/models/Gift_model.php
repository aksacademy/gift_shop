<?php

class Gift_model extends CI_Model {

    public function get_all() {
        $query = $this->db->get('gift');
        return $query->result();
    }

    public function get_by_gift_type_id($gift_type_id) {

        $this->db->where('gift_type_id', $gift_type_id);
        $query = $this->db->get('gift');
        return $query->result();
    }

    public function get_by_id($gift_id) {

        $this->db->where('gift_id', $gift_id);
        $query = $this->db->get('gift');
        return $query->row();
    }

    public function save($gift) {
        $inserted = $this->db->insert('gift', $gift);
        return $inserted;
    }

    public function update($gift, $gift_id) {
        $this->db->where('gift_id', $gift_id);
        $updated = $this->db->update('gift', $gift);
        return $updated;
    }

    public function delete($gift_id) {
        $this->db->where('gift_id', $gift_id);
        $deleted = $this->db->delete('gift');
        return $deleted;
    }

    public function get_gallery($gift_id) {
        $this->db->where('gift_id', $gift_id);
        $query = $this->db->get('gift_gallery');
        return $query->result();
    }
    
    public function upload_gallery($gallery) {
        $this->db->insert('gift_gallery', $gallery);
    }

}
