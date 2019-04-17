<?php

class Shipping_charge_model extends CI_Model {

    public function get_all($gift_id) {
        $this->db->select('shipping_charge.rate, deliverable_pincode.pincode');
        $this->db->from('deliverable_pincode');
        $this->db->join('shipping_charge', 'deliverable_pincode.pincode = shipping_charge.pincode and gift_id = ' . $gift_id, 'left');
        $query = $this->db->get();

        //echo $this->db->last_query();die;
        return $query->result();
    }
    
    public function get_by_pincode($pincode) {
        $this->db->where('pincode', $pincode);
        $query = $this->db->get('shipping_charge');
        return $query->result();
    }

    public function delete($gift_id, $pincode) {
        $this->db->where(array('gift_id' => $gift_id, 'pincode' => $pincode));
        $this->db->delete('shipping_charge');
    }

    public function save($shipping_charge) {
        $inserted = $this->db->insert('shipping_charge', $shipping_charge);
        return $inserted;
    }

}
