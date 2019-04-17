<?php

class Menu extends Admin_Controller {

    public function index() {

        $result['menu'] = $this->Menu_model->get_all();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/menu_list', $result);
        $this->load->view('admin/footer');
    }

    public function save() {

        $menu_name = $this->input->post('menu_name');
        $menu = array(
            'menu_name' => $menu_name
        );
        $inserted = $this->Menu_model->save($menu);
        if ($inserted > 0) {
            $this->session->set_flashdata('msg', "Menu has been inserted successfully.");
        } else {
            $this->session->set_flashdata('err', "Menu could not be inserted. Please try again later.");
        }
        redirect(base_url() . 'admin/menu/index');
    }

    public function edit() {

        $menu_id = $this->input->get('id');
        $result['menu'] = $this->Menu_model->get_by_id($menu_id);

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/menu_edit', $result);
        $this->load->view('admin/footer');
    }

    public function update() {

        $menu_id = $this->input->post('menu_id');
        $menu_name = $this->input->post('menu_name');
        $menu = array(
            'menu_name' => $menu_name
        );
        $updated = $this->Menu_model->update($menu, $menu_id);
        if ($updated > 0) {
            $this->session->set_flashdata('msg', "Menu has been updated successfully.");
        } else {
            $this->session->set_flashdata('err', "Menu could not be updated. Please try again later.");
        }
        redirect(base_url() . 'admin/menu/index');
    }

    public function delete() {

        $menu_id = $this->input->get('id');
        $deleted = $this->Menu_model->delete($menu_id);
        if ($deleted > 0) {
            $this->session->set_flashdata('msg', "Menu has been deleted successfully.");
        } else {
            $this->session->set_flashdata('err', "Menu could not be deleted. Please try again later.");
        }
        redirect(base_url() . 'admin/menu/index');
    }

    public function unique() {
        $menu_id = $this->input->post('menu_id');
        $menu_name = $this->input->post('menu_name');
        $total_record = $this->Menu_model->check_for_unique_menu($menu_id, $menu_name);
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
