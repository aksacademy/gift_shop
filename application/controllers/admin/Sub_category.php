<?php

class Sub_category extends Admin_Controller {

    public function index() {
        //$result['sub_category'] = $this->Sub_category_model->get_all();
        $result['menu'] = $this->Menu_model->get_all();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/sub_category_list', $result);
        $this->load->view('admin/footer');
    }

    public function get_by_category_id() {
        $category_id = $this->input->post('category_id');
        $sub_category = $this->Sub_category_model->get_by_category_id($category_id);
        echo json_encode($sub_category);
    }

    public function save() {

        $menu_id = $this->input->post('menu_id');
        $category_id = $this->input->post('category_id');
        $sub_category_name = $this->input->post('sub_category_name');
        $sub_category = array(
            'menu_id' => $menu_id,
            'category_id' => $category_id,
            'sub_category_name' => $sub_category_name
        );
        $inserted = $this->Sub_category_model->save($sub_category);
        if ($inserted > 0) {
            echo 'Sub category has been added successfully';
            //$this->session->set_flashdata('msg', "Sub category has been inserted successfully.");
        } else {
            echo 'Sub category could not be be added. Please try again later.';
            //$this->session->set_flashdata('err', "Sub category could not be inserted. Please try again later.");
        }
        //redirect(base_url() . 'admin/sub/category');
    }

    public function edit() {

        $sub_category_id = $this->input->post('sub_category_id');
        $sub_category = $this->Sub_category_model->get_by_id($sub_category_id);
        echo json_encode($sub_category);
    }

    public function update() {

        $sub_category_id = $this->input->post('sub_category_id');
        $sub_category_name = $this->input->post('sub_category_name');
        $sub_category = array(
            'sub_category_name' => $sub_category_name
        );
        $updated = $this->Sub_category_model->update($sub_category, $sub_category_id);
        if ($updated > 0) {
            echo("Gift type has been updated successfully.");
        } else {
            echo("Gift type could not be updated. Please try again later.");
        }
        //redirect(base_url() . 'admin/sub/category');
    }
    
    public function delete() {

        $sub_category_id = $this->input->post('sub_category_id');
        $delete = $this->Sub_category_model->delete($sub_category_id);
        if ($delete > 0) {
            echo("Gift type has been deleted successfully.");
        } else {
            echo("Gift type could not be deleted. Please try again later.");
        }
        //redirect(base_url() . 'admin/sub/category');
    }
    
    public function unique() {
        $menu_id = $this->input->post('menu_id');
        $category_id = $this->input->post('category_id');
        $sub_category_id = $this->input->post('sub_category_id');
        $sub_category_name = $this->input->post('sub_category_name');
        
        $total_record = $this->Sub_category_model->check_for_unique_sub_category($sub_category_id, $sub_category_name, $category_id, $menu_id);
        //if(count)
        $valid = true;
        if ($total_record > 0) {
            $valid = false;
        }
        echo json_encode(array(
            'valid' => $valid
        ));
    }
}
