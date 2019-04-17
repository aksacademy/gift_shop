<?php

class Login extends CI_Controller {

    public function index() {
        $this->load->view('admin/login');
    }

    public function validate() {

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $row = $this->Admin_model->validate($username, $password);
        
        if ($row) {

            $this->session->set_userdata('role', 'admin');
            $this->session->set_userdata('username', $username);
            redirect(base_url() . 'admin/dashboard');
        } else {
            $this->session->set_flashdata('err', "Invalid username or password");
            redirect(base_url() . 'admin');
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('err', "You are logout successfully.");
        //echo $this->session->flashdata('err');
        redirect(base_url() . 'admin');
    }

}
