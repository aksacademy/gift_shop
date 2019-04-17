<?php

class Dashboard extends Admin_Controller{
    public function index()
    {
        
        $new_order = $this->Order_model->get_new();
        $pending_order = $this->Order_model->get_pending();
        $completed_order = $this->Order_model->get_completed();
        $canceled_order = $this->Order_model->get_canceled();
        
        
        $result['total_new_order'] = count($new_order);
        $result['total_pending_order'] = count($pending_order);
        $result['total_completed_order'] = count($completed_order);
        $result['total_canceled_order'] = count($canceled_order);
        //echo count($item);
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/dashboard', $result);
        $this->load->view('admin/footer');
    }
}
