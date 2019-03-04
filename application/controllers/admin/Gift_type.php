<?php

class Gift_type extends CI_Controller {

    public function index() {
        //$result['sub_category'] = $this->Sub_category_model->get_all();
        $result['category'] = $this->Category_model->get_all();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/gift_type_list', $result);
        $this->load->view('admin/footer');
    }

    public function get_by_sub_category_id() {
        $sub_category_id = $this->input->post('sub_category_id');
        $gift_type = $this->Gift_type_model->get_by_sub_category_id($sub_category_id);
        echo json_encode($gift_type);
    }

    public function save() {

        $category_id = $this->input->post('category_id');
        $sub_category_id = $this->input->post('sub_category_id');
        $gift_type_name = $this->input->post('gift_type_name');
        $gift_type = array(
            'category_id' => $category_id,
            'sub_category_id' => $sub_category_id,
            'gift_type_name' => $gift_type_name
        );
        $inserted = $this->Gift_type_model->save($gift_type);
        if ($inserted > 0) {
            echo 'Gift type has been added successfully';
            //$this->session->set_flashdata('msg', "Sub category has been inserted successfully.");
        } else {
            echo 'Gift type could not be be added. Please try again later.';
            //$this->session->set_flashdata('err', "Sub category could not be inserted. Please try again later.");
        }
        //redirect(base_url() . 'admin/sub/category');
    }

    public function edit() {

        $gift_type_id = $this->input->post('gift_type_id');
        $gift_type = $this->Gift_type_model->get_by_id($gift_type_id);
        echo json_encode($gift_type);
    }

    public function update() {

        $gift_type_id = $this->input->post('gift_type_id');
        $gift_type_name = $this->input->post('gift_type_name');
        $gift_type = array(
            'gift_type_name' => $gift_type_name
        );
        $updated = $this->Gift_type_model->update($gift_type, $gift_type_id);
        if ($updated > 0) {
            echo("Gift type has been updated successfully.");
        } else {
            echo("Gift type could not be updated. Please try again later.");
        }
        //redirect(base_url() . 'admin/sub/category');
    }
    
    public function delete() {

        $gift_type_id = $this->input->post('gift_type_id');
        $delete = $this->Gift_type_model->delete($gift_type_id);
        if ($delete > 0) {
            echo("Gift type has been deleted successfully.");
        } else {
            echo("Gift type could not be deleted. Please try again later.");
        }
        //redirect(base_url() . 'admin/sub/category');
    }
}
