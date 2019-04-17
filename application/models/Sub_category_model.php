<?php

class Sub_category_model extends CI_Model {

    public function get_all() {
        $query = $this->db->get('sub_category');
        return $query->result();
    }

    public function get_by_category_id($category_id) {

        $this->db->where('category_id', $category_id);
        $query = $this->db->get('sub_category');
        return $query->result();
    }

    public function save($sub_category) {
        $inserted = $this->db->insert('sub_category', $sub_category);
        return $inserted;
    }

    public function get_by_id($sub_category_id) {
        $this->db->where('sub_category_id', $sub_category_id);
        $query = $this->db->get('sub_category');
        return $query->row();
    }

    public function update($sub_category, $sub_category_id) {
        $this->db->where('sub_category_id', $sub_category_id);
        $updated = $this->db->update('sub_category', $sub_category);
        return $updated;
    }

    public function delete($sub_category_id) {
        $this->db->where('sub_category_id', $sub_category_id);
        $deleted = $this->db->delete('sub_category');
        return $deleted;
    }

    public function check_for_unique_sub_category($sub_category_id, $sub_category_name, $category_id, $menu_id) {
        $this->db->where_not_in('sub_category_id', $sub_category_id);
        $this->db->where(array('sub_category_name' => $sub_category_name, 'category_id' => $category_id, 'menu_id' => $menu_id));
        $query = $this->db->get('sub_category');
        return $query->num_rows();
    }

}
