<?php

class Register extends CI_Controller {

    public function index() {
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $pincode = $this->input->post('pincode');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        
        $item = array(
            "name" => $name,
            "address" => $address,
            "pincode" => $pincode,
            "mobile" => $mobile,
            "email" => $email,
            "password" => $password,
            "created_at" => date('Y-m-d')
        );
        $customer_id = $this->Customer_model->save($item);
        $this->session->set_userdata('customer_id', $customer_id);
        $this->session->set_userdata('name', $name);
        $this->session->set_userdata('role', 'customer');
        redirect(base_url());
    }
    
    public function unique() {
        $customer_id = $this->input->post('customer_id');
        $email = $this->input->post('email');
        $total_record = $this->Customer_model->check_for_unique_email($customer_id, $email);
        //if(count)
        $valid = true;
        if ($total_record > 0) {
            $valid = false;
        }
        echo $valid;
    }

}
