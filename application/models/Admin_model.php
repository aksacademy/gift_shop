<?php

class Admin_model extends CI_Model {

    public function validate($username, $password) {
        $this->db->where(array('username' => $username, 'password' => $password));
        $query = $this->db->get('admin');
        return $query->row();
    }
    
     public function update($admin, $username)
    {
        $this->db->where('username', $username);
        $updated = $this->db->update('admin', $admin);
        return $updated;
    }

}
