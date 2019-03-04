<?php

class Brand extends CI_Controller {

    public function index() {

        $result['brand'] = $this->Brand_model->get_all();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/brand_list', $result);
        $this->load->view('admin/footer');
    }

    public function save() {

        $brand_name = $this->input->post('brand_name');
        $brand = array(
            'brand_name' => $brand_name
        );
        $inserted = $this->Brand_model->save($brand);
        if ($inserted > 0) {
            $this->session->set_flashdata('msg', "Brand has been inserted successfully.");
        } else {
            $this->session->set_flashdata('err', "Brand could not be inserted. Please try again later.");
        }
        redirect(base_url() . 'admin/brand/index');
    }

    public function edit() {

        $brand_id = $this->input->get('id');
        $result['brand'] = $this->Brand_model->get_by_id($brand_id);

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/brand_edit', $result);
        $this->load->view('admin/footer');
    }

    public function update() {

        $brand_id = $this->input->post('brand_id');
        $brand_name = $this->input->post('brand_name');
        $brand = array(
            'brand_name' => $brand_name
        );
        $updated = $this->Brand_model->update($brand, $brand_id);
        if ($updated > 0) {
            $this->session->set_flashdata('msg', "Brand has been updated successfully.");
        } else {
            $this->session->set_flashdata('err', "Brand could not be updated. Please try again later.");
        }
        redirect(base_url() . 'admin/brand/index');
    }

    public function delete() {

        $brand_id = $this->input->get('id');
        $deleted = $this->Brand_model->delete($brand_id);
        if ($deleted > 0) {
            $this->session->set_flashdata('msg', "Brand has been deleted successfully.");
        } else {
            $this->session->set_flashdata('err', "Brand could not be deleted. Please try again later.");
        }
        redirect(base_url() . 'admin/brand/index');
    }

}
