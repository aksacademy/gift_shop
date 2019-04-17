<?php

class Deliverable_pincode extends Admin_Controller {

    public function index() {

        $result['deliverable_pincode'] = $this->Deliverable_pincode_model->get_all();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/deliverable_pincode_list', $result);
        $this->load->view('admin/footer');
    }

    public function save() {

        $pincode = $this->input->post('pincode');
        $deliverable_pincode = array(
            'pincode' => $pincode
        );
        $inserted = $this->Deliverable_pincode_model->save($deliverable_pincode);
        if ($inserted > 0) {
            $this->session->set_flashdata('msg', "Deliverable pincode has been inserted successfully.");
        } else {
            $this->session->set_flashdata('err', "Deliverable pincode could not be inserted. Please try again later.");
        }
        redirect(base_url() . 'admin/deliverable_pincode/index');
    }

    public function edit() {

        $pincode_id = $this->input->get('id');
        $result['deliverable_pincode'] = $this->Deliverable_pincode_model->get_by_id($pincode_id);

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/deliverable_pincode_edit', $result);
        $this->load->view('admin/footer');
    }

    public function update() {

        $pincode_id = $this->input->post('pincode_id');
        $pincode = $this->input->post('pincode');
        $deliverable_pincode = array(
            'pincode' => $pincode
        );
        $updated = $this->Deliverable_pincode_model->update($deliverable_pincode, $pincode_id);
        if ($updated > 0) {
            $this->session->set_flashdata('msg', "Deliverable pincode has been updated successfully.");
        } else {
            $this->session->set_flashdata('err', "Deliverable pincode could not be updated. Please try again later.");
        }
        redirect(base_url() . 'admin/deliverable_pincode/index');
    }

    public function delete() {

        $pincode_id = $this->input->get('id');
        $deleted = $this->Deliverable_pincode_model->delete($pincode_id);
        if ($deleted > 0) {
            $this->session->set_flashdata('msg', "Deliverable pincode has been deleted successfully.");
        } else {
            $this->session->set_flashdata('err', "Deliverable pincode could not be deleted. Please try again later.");
        }
        redirect(base_url() . 'admin/deliverable_pincode/index');
    }

    public function unique() {
        $pincode_id = $this->input->post('pincode_id');
        $pincode = $this->input->post('pincode');
        $total_record = $this->Deliverable_pincode_model->check_for_unique_pincode($pincode_id, $pincode);
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
