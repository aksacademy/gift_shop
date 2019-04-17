<?php

class Gift extends Admin_Controller {

    public function index() {

        $result['gift'] = $this->Gift_model->get_all();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/gift_list', $result);
        $this->load->view('admin/footer');
    }

    /* public function list_() {
      //$result['sub_category'] = $this->Sub_category_model->get_all();

      $category_id = $this->input->get_post('category_id');
      $sub_category_id = $this->input->get_post('sub_category_id');
      $gift_type_id = $this->input->get_post('gift_type_id');
      $result['category'] = $this->Category_model->get_by_id($category_id);
      $result['sub_category'] = $this->Sub_category_model->get_by_id($sub_category_id);
      $result['gift_type'] = $this->Gift_type_model->get_by_id($gift_type_id);
      $result['gift'] = $this->Gift_model->get_by_gift_type_id($gift_type_id);


      $this->load->view('admin/header');
      $this->load->view('admin/sidebar');
      $this->load->view('admin/gift_list', $result);
      $this->load->view('admin/footer');
      }
     */

    public function add() {
        //$result['sub_category'] = $this->Sub_category_model->get_all();
        $result['category'] = $this->Category_model->get_all();

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/gift_add', $result);
        $this->load->view('admin/footer');
    }

    public function save() {

        $config['upload_path'] = 'upload/'; //
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        //  if error is generated, return to that page with error message
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('err', $this->upload->display_errors());
            print_r($this->upload->display_errors());
            echo 'Gift could not be be added. Please try again later.';
        } else {
            $uploaded_data = $this->upload->data();
            $image = $config['upload_path'] . $uploaded_data['file_name'];
            $title = $this->input->post('title');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $gst = $this->input->post('gst');
            $featured = $this->input->post('featured');

            $gift = array(
                "title" => $title,
                "description" => $description,
                "price" => $price,
                "gst" => $gst,
                "featured" => $featured,
                "image" => $image,
            );

            $inserted = $this->Gift_model->save($gift);
            if ($inserted > 0) {
                $this->session->set_flashdata('msg', 'Gift has been inserted successfully');
                //$this->session->set_flashdata('msg', "Sub category has been inserted successfully.");
            } else {
                $this->session->set_flashdata('err', 'Gift could not be be inserted. Please try again later.11');
            }
            redirect(base_url() . 'admin/gift');
        }
    }

    public function edit() {

        $gift_id = $this->input->get('id');
        $result['gift'] = $this->Gift_model->get_by_id($gift_id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/gift_edit', $result);
        $this->load->view('admin/footer');
    }

    public function update() {

        $gift_id = $this->input->post('gift_id');
        $title = $this->input->post('title');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $gst = $this->input->post('gst');
        $featured = $this->input->post('featured');

        $gift = array(
            "title" => $title,
            "description" => $description,
            "price" => $price,
            "gst" => $gst,
            "featured" => $featured,
        );

        $updated = $this->Gift_model->update($gift, $gift_id);
        if ($updated > 0) {
            $this->session->set_flashdata('msg', 'Gift has been updated successfully');
            //$this->session->set_flashdata('msg', "Sub category has been inserted successfully.");
        } else {
            $this->session->set_flashdata('err', 'Gift could not be be updated. Please try again later.11');
        }
        redirect(base_url() . 'admin/gift');
    }

    public function delete() {

        $gift_id = $this->input->get('id');
        $gift = $this->Gift_model->get_by_id($gift_id);
        $delete = $this->Gift_model->delete($gift_id);
        if ($delete > 0) {
            $this->session->set_flashdata('msg', 'Gift has been deleted successfully');
        } else {
            $this->session->set_flashdata('err', 'Gift could not be be deleted. Please try again later.11');
        }
        redirect(base_url() . 'admin/gift');
    }

    public function gallery() {
        //$result['sub_category'] = $this->Sub_category_model->get_all();

        $gift_id = $this->input->get('id');

        $result['gift_gallery'] = $this->Gift_model->get_gallery($gift_id);
        $result['gift'] = $this->Gift_model->get_by_id($gift_id);

        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/gallery', $result);
        $this->load->view('admin/footer');
    }

    public function upload_gallery() {

        $config['upload_path'] = 'upload/gallery/';
        if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, TRUE);
        }

        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $uploaded_data = $this->upload->data();
            $image = $config['upload_path'] . $uploaded_data['file_name'];
            //$about = $this->input->post('about');
            $gift_id = $this->input->post('gift_id');
            $gallery = array(
                "gift_id" => $gift_id,
                "image" => $image
            );
            $this->Gift_model->upload_gallery($gallery);
        }
    }

    public function category() {

        $gift_id = $this->input->get('id');
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $result['sub_category'] = $this->Sub_category_model->get_all();
        $result['gift'] = $this->Gift_model->get_by_id($gift_id);
        $result['gift_category'] = $this->Gift_model->get_category($gift_id);
        $this->load->view('admin/header');
        $this->load->view('admin/sidebar');
        $this->load->view('admin/gift_category', $result);
        $this->load->view('admin/footer');
    }

    public function save_category() {

        $category = $this->input->post('category');
        $gift_id = $this->input->post('gift_id');
        foreach ($category as $c) {
            $c1 = explode(',', $c);
            $menu_id = $c1[0];
            $category_id = $c1[1];
            $sub_category_id = $c1[2];
            $gift_category[] = array(
                'gift_id' => $gift_id,
                'menu_id' => $menu_id,
                'category_id' => $category_id,
                'sub_category_id' => $sub_category_id
            );
        }

        $this->Gift_model->delete_category($gift_id);

        $inserted = $this->Gift_model->save_category($gift_category);
        if ($inserted > 0) {
            $this->session->set_flashdata('msg', 'Gift category has been saved successfully');
            //$this->session->set_flashdata('msg', "Sub category has been inserted successfully.");
        } else {
            $this->session->set_flashdata('err', 'Gift category could not be be saved. Please try again later.11');
        }
        redirect(base_url() . 'admin/gift');
    }

    public function unique() {
        $gift_id = $this->input->post('gift_id');
        $title = $this->input->post('title');
        $total_record = $this->Gift_model->check_for_unique_gift($gift_id, $title);
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
