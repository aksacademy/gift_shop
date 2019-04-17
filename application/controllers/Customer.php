<?php

class Customer extends CI_Controller {

    public function profile() {
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $result['customer'] = $this->Customer_model->get_by_id($this->session->userdata('customer_id'));
        $this->load->view('header', $result);
        $this->load->view('menu');
        //$this->load->view('banner');
        $this->load->view('profile', $result);
        $this->load->view('footer');
    }

    public function change_profile() {
        $name = $this->input->post('name');
        $address = $this->input->post('address');
        $pincode = $this->input->post('pincode');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');

        $customer = array(
            "name" => $name,
            "address" => $address,
            "pincode" => $pincode,
            "mobile" => $mobile,
            "email" => $email,
        );
        $this->Customer_model->update($customer, $this->session->userdata('customer_id'));
        $this->session->set_userdata('name', $name);
        $this->session->set_flashdata('msg', 'Profile has been updated successfully.');
        redirect(base_url() . 'customer/profile');
    }

    public function password() {
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $this->load->view('header', $result);
        $this->load->view('menu', $result);
        $this->load->view('password');
        $this->load->view('footer');
    }

    public function change_password() {
        $password = $this->input->post('password');

        $customer = array(
            "password" => $password,
        );
        $this->Customer_model->update($customer, $this->session->userdata('customer_id'));
        $this->session->set_flashdata('msg', 'Password has been changed successfully.');
        redirect(base_url() . 'customer/password');
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
