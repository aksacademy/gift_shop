<?php

class Gift_model extends CI_Model {

    public function get_all() {
        $query = $this->db->get('gift');
        return $query->result();
    }

    public function get_by_category_id($category_id) {

        $this->db->distinct();
        $this->db->select('gift.*');
        $this->db->from('gift');
        $this->db->join('gift_category', 'gift.gift_id=gift_category.gift_id');
        $this->db->where('category_id', $category_id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_featured() {
        $this->db->where('featured', 1);
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

    public function save_category($gift_category) {
        $inserted = $this->db->insert_batch('gift_category', $gift_category);
        return $inserted;
    }

    public function delete_category($gift_id) {
        $this->db->where('gift_id', $gift_id);
        $deleted = $this->db->delete('gift_category');
        return $deleted;
    }

    public function get_category($gift_id) {
        $this->db->where('gift_id', $gift_id);
        $query = $this->db->get('gift_category');
        return $query->result_array();
    }

    public function get_by_title($title) {
        $this->db->where("title like '%" . $title . "%'");
        $query = $this->db->get('gift');
        //echo $this->db->last_query();die;
        return $query->result();
    }
    
    public function get_by_filter($sub_category) {
        
        /*$this->db->where($condition);
        $query = $this->db->get('gift');*/
        $this->db->from('gift');
        $this->db->join('gift_category', 'gift.gift_id=gift_category.gift_id');
        $this->db->where_in('sub_category_id', $sub_category);
        $query = $this->db->get();
        //echo $this->db->last_query();die;
        return $query->result();
    }
    
    public function check_for_unique_gift($gift_id, $title) {
        $this->db->where_not_in('gift_id', $gift_id);
        $this->db->where('title', $title);
        $query = $this->db->get('gift');
        return $query->num_rows();
    }
}
