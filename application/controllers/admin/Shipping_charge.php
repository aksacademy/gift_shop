<?php

class Shipping_charge extends Admin_Controller {

    public function index() {

        $gift_id = $this->input->get('id');
        $result['shipping_charge'] = $this->Shipping_charge_model->get_all($gift_id);
        $result['gift'] = $this->Gift_model->get_by_id($gift_id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/shipping_charge_list', $result);
        $this->load->view('admin/footer');
    }

    public function save() {

        $gift_id = $this->input->post('gift_id');
        $rate = $this->input->post('rate');
        $pincode = $this->input->post('pincode');
        
        $this->Shipping_charge_model->delete($gift_id, $pincode);
        $shipping_charge = array(
            'gift_id' => $gift_id,
            'pincode' => $pincode,
            'rate' => $rate
        );
        $inserted = $this->Shipping_charge_model->save($shipping_charge);
        if ($inserted > 0) {
            $this->session->set_flashdata('msg', "Shiping charge has been saved successfully.");
        } else {
            $this->session->set_flashdata('err', "Shiping charge could not be saved. Please try again later.");
        }
        redirect(base_url() . 'admin/shipping_charge?id='.$gift_id);
    }
}
