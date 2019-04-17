<?php

class Login extends CI_Controller {

    public function index() {
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $result['gift'] = $this->Gift_model->get_featured();

        $this->load->view('header', $result);
        $this->load->view('menu');
        $this->load->view('banner');
        $this->load->view('login');
        $this->load->view('footer');
    }

    public function validate() {

        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $row = $this->Customer_model->validate($email, $password);
        if ($row) {
//print_r($row);
            $this->session->set_userdata('customer_id', $row->customer_id);
            $this->session->set_userdata('name', $row->name);
            $this->session->set_userdata('role', 'customer');
            redirect(base_url());
        } else {
            $this->session->set_flashdata('err', "Invalid username or password");
            redirect(base_url().'login');
        }
    }

    public function logout() {
        //$this->session->sess_destroy();
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role');
        $this->session->set_flashdata('err', "You are logout successfully");
        redirect(base_url().'login');
    }

}
