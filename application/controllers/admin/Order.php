<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {

    public function new_() {

        $result['order'] = $this->Order_model->get_new();
        $result['order_type'] = 'new';

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order_list', $result);
        $this->load->view('admin/footer');
    }

    public function pending() {

        $result['order'] = $this->Order_model->get_pending();
        $result['order_type'] = 'pending';
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order_list', $result);
        $this->load->view('admin/footer');
    }

    public function completed() {
        $result['order'] = $this->Order_model->get_completed();
        $result['order_type'] = 'completed';
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order_list', $result);
        $this->load->view('admin/footer');
    }

    public function canceled() {
        $result['order'] = $this->Order_model->get_canceled();
        $result['order_type'] = 'canceled';
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order_list', $result);
        $this->load->view('admin/footer');
    }

    public function detail() {

        $order_id = $this->input->get('order_id');
        $result['order'] = $this->Order_model->get_by_id($order_id);
        $result['order_detail'] = $this->Order_model->get_detail_by_order_id($order_id);

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order_detail', $result);
        $this->load->view('admin/footer');
    }

    public function status() {

        $order_id = $this->input->get('order_id');
        $result['order'] = $this->Order_model->get_by_id($order_id);
        $result['order_status'] = $this->Order_model->get_status_by_order_id($order_id);

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/order_status', $result);
        $this->load->view('admin/footer');
    }

    public function save_order_status() {

        $order_id = $this->input->post('order_id');
        $description = $this->input->post('description');
        $delivered = $this->input->post('delivered');
        $order_status = array(
            'order_id' => $order_id,
            'description' => $description,
            'order_status_date' => date('Y-m-d H:i:s')
        );
        $inserted = $this->Order_model->save_order_status($order_status);
        if ($inserted > 0) {
            $this->session->set_flashdata('msg', "Order status has been inserted successfully.");
            $order = array(
                'delivered' => $delivered
            );
            $this->Order_model->update($order, $order_id);
        } else {
            $this->session->set_flashdata('err', "Order status could not be inserted. Please try again later.");
        }
        redirect(base_url() . 'admin/order/status?order_id=' . $order_id);
    }

}
