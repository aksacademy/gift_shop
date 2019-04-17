<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Item
 *
 * @author Kanu
 */
class Gift extends CI_Controller {

    public function index() {

        $category_id = $this->input->get('category');

        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $result['sub_category'] = $this->Sub_category_model->get_by_category_id($category_id);
        $result['gift'] = $this->Gift_model->get_by_category_id($category_id);

        $this->load->view('header', $result);
        $this->load->view('menu');
        $this->load->view('banner');
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function search() {

        $title = $this->input->post('title');
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $result['gift'] = $this->Gift_model->get_by_title($title);

        $this->load->view('header', $result);
        $this->load->view('menu');
        $this->load->view('banner');
        $this->load->view('index');
        $this->load->view('footer');
    }

    public function filter() {


        $condition = $this->input->post('condition');
        //print_r($condition);
        $gift = $this->Gift_model->get_by_filter($condition);
        ?>

        <?php foreach ($gift as $g) {
            ?>
            <div class="col-md-3 product-men">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        <img src="<?php echo base_url() . $g->image ?>" alt="">

                    </div>
                    <div class="item-info-product ">
                        <h4>
                            <?php echo $g->title ?>
                        </h4>
                        <div class="info-product-price">
                            <span class="item_price"><span class="fa fa-rupee"></span> <?php echo $g->price ?></span>
                        </div>
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

                            <input type="hidden" id="<?php echo $g->gift_id ?>_title" value="<?php echo $g->title ?>">
                            <input type="hidden" id="<?php echo $g->gift_id ?>_price" value="<?php echo $g->price ?>">
                            <input type="hidden" id="<?php echo $g->gift_id ?>_image" value="<?php echo $g->image ?>">
                            <input type="hidden" id="<?php echo $g->gift_id ?>_gst" value="<?php echo $g->gst ?>">
                            <input type="button" onclick="addToCart(<?php echo $g->gift_id ?>)" value="Add to cart" class="button" />

                        </div>

                    </div>
                </div>
            </div>
            <?php
        }
        ?>
        <?php
        //echo json_encode($gift);
    }

    public function store() {

        $gift_id = $this->input->post('gift_id');
        $gift_name = $this->input->post('title');
        $gift_price = $this->input->post('price');
        $gift_quantity = $this->input->post('quantity');
        $gift_image = $this->input->post('image');
        $gift_gst = $this->input->post('gst');

        if (!isset($_SESSION['gift'])) {
            $_SESSION['gift'] = array();
        }



        //print_r($_SESSION['gift']);
        //echo $gift_quantity;

        if (in_array($gift_id, array_column($_SESSION['gift'], 'gift_id'))) {
            //echo 'in';
            // search value in the array
            $ar = array_column($_SESSION['gift'], 'gift_id');
            //print_r($ar);
            $index = array_search($gift_id, $ar);
            $qty = $_SESSION['gift'][$index]['gift_quantity'] + $gift_quantity;
            $_SESSION['gift'][$index]['gift_quantity'] = $qty;
        } else {
            //echo 'in1';
            $_SESSION['gift'][] = array(
                'gift_id' => $gift_id,
                'gift_name' => $gift_name,
                'gift_price' => $gift_price,
                'gift_quantity' => $gift_quantity,
                'gift_gst' => $gift_gst,
                'gift_image' => $gift_image,
                'gift_shipping_charge' => 0,
            );
        }

        exit();
    }

    public function update_gifts() {
        $gift_id = $this->input->post('gift_id');
        $quantity = $this->input->post('quantity');

        $ar = array_column($_SESSION['gift'], 'gift_id');
        //print_r($ar);
        $index = array_search($gift_id, $ar);
        $_SESSION['gift'][$index]['gift_quantity'] = $quantity;
        //$qty = $_SESSION['gift'][$index]['gift_quantity'] + $gift_quantity;
        //$_SESSION['gift'][$index]['gift_quantity'] = $qty;
        exit();
    }

    public function delete_gifts() {
        $gift_id = $this->input->post('gift_id');
        $ar = array_column($_SESSION['gift'], 'gift_id');
        //print_r($ar);
        $index = array_search($gift_id, $ar);
        unset($_SESSION['gift'][$index]);
        sort($_SESSION['gift']);
        //$qty = $_SESSION['gift'][$index]['gift_quantity'] + $gift_quantity;
        //$_SESSION['gift'][$index]['gift_quantity'] = $qty;
        exit();
    }

    public function check_for_availability() {
        $pincode = $this->input->post('pincode');
        $row = $this->Deliverable_pincode_model->get_by_pincode($pincode);
        if ($row) {
            //echo 'true';
            $shipping_charge = $this->Shipping_charge_model->get_by_pincode($pincode);
            //echo json_encode($shipping_charge);
            foreach ($shipping_charge as $sc) {
                //echo $sc->gift_id.'-'.$sc->rate.'<br />';
                $gift_id_array = array_column($_SESSION['gift'], 'gift_id');
                if (in_array($sc->gift_id, $gift_id_array)) {
                    $gift_id_index = array_search($sc->gift_id, $gift_id_array);
                    $_SESSION['gift'][$gift_id_index]['gift_shipping_charge'] = $sc->rate;
                    //echo $gift_id_index.'--'.$sc->rate.'+';
                }
            }
            $_SESSION['pincode'] = $pincode;
            echo 'true';
        } else {
            unset($_SESSION['pincode']);
            echo 'false';
        }
        exit();        
    }

}
