<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Account
 *
 * @author Kanu
 */
class Account extends CI_Controller {

    public function password() {

        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/password');
        $this->load->view('admin/footer');
    }

    public function change_password() {

        $password = $this->input->post('password');
        $admin = array(
            'password' => $password
        );
        $udpated = $this->Admin_model->update($admin, $this->session->userdata('username'));
        if ($udpated > 0) {
            $this->session->set_flashdata('msg', "Password has been changed successfully.");
        } else {
            $this->session->set_flashdata('err', "Password could not be changed. Please try again later.");
        }
        redirect(base_url() . 'admin/account/password');
    }

}
