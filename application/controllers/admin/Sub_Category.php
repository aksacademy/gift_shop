<?php

class Sub_Category extends CI_Controller{
    public function index()
    {
        $result['sub_category'] = $this->Sub_category_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        
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

        $category_id = $this->input->post('category_id');
        $sub_category_name = $this->input->post('sub_category_name');
        $sub_category = array(
            'category_id' => $category_id,
            'sub_category_name' => $sub_category_name
        );
        $inserted = $this->Sub_category_model->save($sub_category);
        if ($inserted > 0) {
            $this->session->set_flashdata('msg', "Sub category has been inserted successfully.");
        } else {
            $this->session->set_flashdata('err', "Sub category could not be inserted. Please try again later.");
        }
        redirect(base_url() . 'admin/sub/category');
    }

    public function edit() {

        $sub_category_id = $this->input->get('id');
        $result['sub_category'] = $this->Sub_category_model->get_by_id($sub_category_id);
        $result['category'] = $this->Category_model->get_all();
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/sub_category_edit', $result);
        $this->load->view('admin/footer');
    }

    public function update() {

        $sub_category_id = $this->input->post('sub_category_id');
        $category_id = $this->input->post('category_id');
        $sub_category_name = $this->input->post('sub_category_name');
        $sub_category = array(
            'category_id' => $category_id,
            'sub_category_name' => $sub_category_name
        );
        $updated = $this->Sub_category_model->update($sub_category, $sub_category_id);
        if ($updated > 0) {
            $this->session->set_flashdata('msg', "Sub category has been updated successfully.");
        } else {
            $this->session->set_flashdata('err', "Sub category could not be updated. Please try again later.");
        }
        redirect(base_url() . 'admin/sub/category');
    }

    public function delete() {

        $sub_category_id = $this->input->get('id');
        $deleted = $this->Sub_category_model->delete($sub_category_id);
        if ($deleted > 0) {
            $this->session->set_flashdata('msg', "Sub category has been deleted successfully.");
        } else {
            $this->session->set_flashdata('err', "Sub category could not be deleted. Please try again later.");
        }
        redirect(base_url() . 'admin/sub/category');
    }
    
}
