<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $result['gift'] = $this->Gift_model->get_featured();
        
        $this->load->view('header', $result);
        $this->load->view('menu');
        $this->load->view('banner');
        $this->load->view('index');
        $this->load->view('footer');
    }

}
