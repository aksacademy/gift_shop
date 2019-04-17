<?php

class My_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

}

class Admin_Controller extends My_Controller {

    public function __construct() {
        parent::__construct();

        
        
        if ($this->session->userdata('role') == null) {
            redirect(base_url() . 'admin');
        } else if ($this->session->userdata('role') == 'customer') {
            redirect(base_url() . 'welcome');
        }
        // Your own constructor code
    }

}

class User_Controller extends My_Controller {

    public function __construct() {
        parent::__construct();

        if ($this->session->userdata('role') == null) {
            redirect(base_url() . 'login');
        } else if ($this->session->userdata('role') == 'admin') {
            redirect(base_url() . 'admin/dashboard');
        }
    }

}
