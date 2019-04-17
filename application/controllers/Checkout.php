<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Checkout
 *
 * @author Kanu
 */
class Checkout extends User_Controller{
    public function index()
    {
        
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        
        $this->load->view('header', $result);
        $this->load->view('menu');
        $this->load->view('banner');
        $this->load->view('checkout');
        $this->load->view('footer');
        
        
    }
    
    
}
