<?php

class Customer_model extends CI_Model {

    public function save($customer) {
        $this->db->insert('customer', $customer);
        return $this->db->insert_id();
    }
    
    public function update($customer, $customer_id) {
        $this->db->where('customer_id', $customer_id);
        $this->db->update('customer', $customer);
    }
    
    public function validate($email, $password) {
        $this->db->where(array('email' => $email, 'password' => $password));
        $query = $this->db->get('customer');
        //echo $this->db->last_query();
        return $query->row();
    }
    
    public function get_by_id($customer_id)
    {
        $this->db->where('customer_id', $customer_id);
        $query = $this->db->get('customer');
        return $query->row();
    }
    
    public function check_for_unique_email($customer_id, $email) {
        $this->db->where_not_in('customer_id', $customer_id);
        $this->db->where('email', $email);
        $query = $this->db->get('customer');
        return $query->num_rows();
    }
}
