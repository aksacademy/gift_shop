<?php

class Category extends Admin_Controller{
    public function index()
    {
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all_with_menu();
        
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/category_list', $result);
        $this->load->view('admin/footer');
    }

    public function get_by_menu_id() {
        $menu_id = $this->input->post('menu_id');
        $category = $this->Category_model->get_by_menu_id($menu_id);
        echo json_encode($category);
    }
    
    public function save() {

        $menu_id = $this->input->post('menu_id');
        $category_id = $this->input->post('category_id');
        $category_name = $this->input->post('category_name');
        $category = array(
            'menu_id' => $menu_id,
            'category_name' => $category_name
        );
        $inserted = $this->Category_model->save($category);
        if ($inserted > 0) {
            $this->session->set_flashdata('msg', "Category has been inserted successfully.");
        } else {
            $this->session->set_flashdata('err', "Category could not be inserted. Please try again later.");
        }
        redirect(base_url() . 'admin/category');
    }

    public function edit() {

        $category_id = $this->input->get('id');
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_by_id($category_id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/category_edit', $result);
        $this->load->view('admin/footer');
    }

    public function update() {

        $category_id = $this->input->post('category_id');
        $menu_id = $this->input->post('menu_id');
        $category_name = $this->input->post('category_name');
        $category = array(
            'menu_id' => $menu_id,
            'category_name' => $category_name
        );
        $updated = $this->Category_model->update($category, $category_id);
        if ($updated > 0) {
            $this->session->set_flashdata('msg', "Category has been updated successfully.");
        } else {
            $this->session->set_flashdata('err', "Category could not be updated. Please try again later.");
        }
        redirect(base_url() . 'admin/category');
    }

    public function delete() {

        $category_id = $this->input->get('id');
        $deleted = $this->Category_model->delete($category_id);
        if ($deleted > 0) {
            $this->session->set_flashdata('msg', "Category has been deleted successfully.");
        } else {
            $this->session->set_flashdata('err', "Category could not be deleted. Please try again later.");
        }
        redirect(base_url() . 'admin/category');
    }
    
    
    public function unique() {
        $category_id = $this->input->post('category_id');
        $category_name = $this->input->post('category_name');
        $menu_id = $this->input->post('menu_id');
        $total_record = $this->Category_model->check_for_unique_category($category_id, $category_name, $menu_id);
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
