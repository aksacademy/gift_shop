<?php

class Order_model extends CI_Model {

    public function save($order) {
        $this->db->insert('order_', $order);
    }

    public function update($order, $order_id) {
        $this->db->where('order_id', $order_id);
        $this->db->update('order_', $order);
    }

    public function save_detail($order_detail) {
        $this->db->insert_batch('order_detail', $order_detail);
    }
    
    public function get_by_customer_id($customer_id) {
        $this->db->where('customer_id', $customer_id);
        $this->db->order_by('transaction_date', 'desc');
        $query = $this->db->get('order_');
        return $query->result();
    }

    public function get_new() {
        $query = $this->db->query("select * from order_ where order_status = 'confirmed' and delivered!=1 and order_id not in (select order_id from order_status where order_status.order_id = order_.order_id) order by transaction_date desc");
        //$query = $this->db->query("select * from order_ where order_status = 'confirmed' and delivered!=1 order_id not in (select order_id from order_status where order_status.order_id = order_.order_id) order by transaction_date desc");
        //echo $this->db->last_query();
        //die;
        return $query->result();
    }

    public function get_pending() {
        $query = $this->db->query("select * from order_ where order_status = 'confirmed' and delivered!=1 and order_id in (select order_id from order_status where order_status.order_id = order_.order_id) order by transaction_date desc");
        //echo $this->db->last_query();
        //die;
        return $query->result();
    }
    
    public function get_completed() {
        $query = $this->db->query("select * from order_ where order_status = 'confirmed' and delivered=1");
        //echo $this->db->last_query();
        //die;
        return $query->result();
    }
    
    public function get_canceled() {
        $query = $this->db->query("select * from order_ where order_status = 'failed'");
        //echo $this->db->last_query();
        //die;
        return $query->result();
    }

    public function get_by_id($order_id) {
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('order_');
        return $query->row();
    }

    public function get_detail_by_order_id($order_id) {
        $this->db->where('order_id', $order_id);
        $query = $this->db->get('order_detail');


        return $query->result();
    }

    public function get_status_by_order_id($order_id) {
        $this->db->where('order_id', $order_id);
        $this->db->order_by('order_status_date', 'desc');
        $query = $this->db->get('order_status');
        return $query->result();
    }

    public function save_order_status($order_status) {
        $this->db->insert('order_status', $order_status);
        return $this->db->insert_id();
    }


}
