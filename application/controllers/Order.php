<?php

class Order extends User_Controller {

    public function index() {
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $result['customer'] = $this->Customer_model->get_by_id($this->session->userdata('customer_id'));
        //$result['gift'] = $this->Gift_model->get_featured();

        $this->load->view('header', $result);
        $this->load->view('menu');
        //$this->load->view('banner');
        $this->load->view('shipping');
        $this->load->view('footer');
    }

    public function confirm() {
        $billing_name = $this->input->post('billing_name');
        $billing_address = $this->input->post('billing_address');
        $billing_email = $this->input->post('billing_email');
        $billing_mobile = $this->input->post('billing_mobile');
        $billing_pincode = $this->input->post('billing_pincode');
        $shipping_name = $this->input->post('shipping_name');
        $shipping_address = $this->input->post('shipping_address');
        $shipping_email = $this->input->post('shipping_email');
        $shipping_mobile = $this->input->post('shipping_mobile');
        $shipping_pincode = $this->input->post('shipping_pincode');
        $customer_id = $this->session->userdata('customer_id');
        /* $order_id = "";
          $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
          $len = strlen($domain);
          for ($i = 0; $i < 10; $i++) {
          $index = rand(0, $len - 1);
          $order_id = $order_id . $domain[$index];
          }
          echo $order_id; */

        $gross_amount = 0;
        $total_shipping_charge = 0;
        $total_gst_amount = 0;


        $order_id = time();

        foreach ($_SESSION['gift'] as $gift) {

            $gift_id = $gift['gift_id'];
            $gift_name = $gift['gift_name'];
            $gift_price = $gift['gift_price'];
            $gift_quantity = $gift['gift_quantity'];

            $amount = $gift_price * $gift_quantity;


            $gst_rate = $gift['gift_gst'];
            $gst_amount = $gst_rate * $amount / 100;
            $shipping_charge = $gift['gift_shipping_charge'] * $gift_quantity;
            $gift_amount = $amount + $gst_amount + $shipping_charge;



//  total order
            $gross_amount = $gross_amount + $amount;
            $total_shipping_charge = $total_shipping_charge + $shipping_charge;



            $total_gst_amount = $total_gst_amount + $gst_amount;


            $order_detail[] = array(
                'order_id' => $order_id,
                'gift_id' => $gift_id,
                'gift_name' => $gift_name,
                'gift_price' => $gift_price,
                'gift_quantity' => $gift_quantity,
                'gst_rate' => $gst_rate,
                'gst_amount' => $gst_amount,
                'shipping_charge' => $shipping_charge,
                'amount' => $gift_amount
            );
        }

        $net_amount = $gross_amount + $total_shipping_charge + $total_gst_amount;

        $order = array(
            'order_id' => $order_id,
            'billing_name' => $billing_name,
            'billing_address' => $billing_address,
            'billing_email' => $billing_email,
            'billing_mobile' => $billing_mobile,
            'billing_pincode' => $billing_pincode,
            'shipping_name' => $shipping_name,
            'shipping_address' => $shipping_address,
            'shipping_email' => $shipping_email,
            'shipping_mobile' => $shipping_mobile,
            'shipping_pincode' => $shipping_pincode,
            'customer_id' => $customer_id,
            'gross_amount' => $gross_amount,
            'total_shipping_charge' => $total_shipping_charge,
            'total_gst_amount' => $total_gst_amount,
            'net_amount' => $net_amount,
            'delivered' => 0,
            'order_date' => date('Y-m-d H:i:s')
        );



        $this->Order_model->save($order);
        $this->Order_model->save_detail($order_detail);

        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

// following files need to be included
        require_once(APPPATH . "paytm_lib/config_paytm.php");
        require_once(APPPATH . "paytm_lib/encdec_paytm.php");


        $checkSum = "";
        $paramList = array();

        $ORDER_ID = $order_id;
        $CUST_ID = $customer_id;
        $INDUSTRY_TYPE_ID = 'retail';
        $CHANNEL_ID = 'WEB';
        $TXN_AMOUNT = $net_amount;

// Create an array having all required parameters for creating checksum.
        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $ORDER_ID;
        $paramList["CUST_ID"] = $CUST_ID;
        $paramList["INDUSTRY_TYPE_ID"] = $INDUSTRY_TYPE_ID;
        $paramList["CHANNEL_ID"] = $CHANNEL_ID;
        $paramList["TXN_AMOUNT"] = $TXN_AMOUNT;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;

        $paramList["CALLBACK_URL"] = base_url() . "order/order_status";
        $paramList["MSISDN"] = $billing_mobile; //Mobile number of customer
        $paramList["EMAIL"] = $billing_email; //Email ID of customer
        $paramList["VERIFIED_BY"] = "EMAIL"; //
        $paramList["IS_USER_VERIFIED"] = "YES"; //
//Here checksum string will return by getChecksumFromArray() function.
        $checkSum = getChecksumFromArray($paramList, PAYTM_MERCHANT_KEY);
        echo "<html>
                <head>
                    <title>Merchant Check Out Page</title>
                </head>
                <body>
                    <center><h1>Please do not refresh this page...</h1></center>
                    <form method='post' action='" . PAYTM_TXN_URL . "' name='f1'>
                        <table border='0'>
                            <tbody>";
        foreach ($paramList as $name => $value) {
            echo '<input type="hidden" name="' . $name . '" value="' . $value . '">';
        }
        echo "<input type='hidden' name='CHECKSUMHASH' value='" . $checkSum . "'>
                            </tbody>
                        </table>
                        <script type='text/javascript'>
                            document.f1.submit();
                        </script>
                    </form>
                </body>
            </html>";



        //unset($_SESSION['gift']);
        //unset($_SESSION['pincode']);
        //$this->session->set_flashdata('msg', 'Your order has been placed successfully.');
        //redirect(base_url());
    }
    
    public function order_status() {

        header("Pragma: no-cache");
        header("Cache-Control: no-cache");
        header("Expires: 0");

// following files need to be included
        require_once(APPPATH . "paytm_lib/config_paytm.php");
        require_once(APPPATH . "paytm_lib/encdec_paytm.php");

        $paytmChecksum = "";
        $paramList = array();
        $isValidChecksum = "FALSE";

        $paramList = $_POST;
        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


        if ($isValidChecksum == "TRUE") {

            if ($_POST["STATUS"] == "TXN_SUCCESS") {
                $order_status = 'confirmed';
                $this->session->set_flashdata('msg', 'Thanks for your order. Order is confirmed.');
                unset($_SESSION['gift']);
                unset($_SESSION['pincode']);
            } else {
                $order_status = 'failed';
                $this->session->set_flashdata('err', 'Order is not confirmed. Please try again later.');
            }

            if (isset($_POST) && count($_POST) > 0) {

                $order_id = $_POST['ORDERID'];
                $mid = $_POST['MID'];
                $transaction_id = $_POST['TXNID'];
                $transaction_amount = $_POST['TXNAMOUNT'];
                $payment_mode = null;
                if (isset($_POST['PAYMENTMODE'])) {
                    $payment_mode = $_POST['PAYMENTMODE'];
                }
                $currency = $_POST['CURRENCY'];
                $transaction_date = null;
                if (isset($_POST['TXNDATE'])) {
                    $transaction_date = $_POST['TXNDATE'];
                }
                $transaction_status = $_POST['STATUS'];


                $response_code = $_POST['RESPCODE'];
                $response_message = $_POST['RESPMSG'];
                $gateway_name = null;
                if (isset($_POST['GATEWAYNAME'])) {
                    $gateway_name = $_POST['GATEWAYNAME'];
                }
                $bank_transaction_id = $_POST['BANKTXNID'];
                $bank_name = null;
                if (isset($_POST['BANKNAME'])) {
                    $bank_name = $_POST['BANKNAME'];
                }


                $order = array(
                    'mid' => $mid,
                    'transaction_id' => $transaction_id,
                    'transaction_amount' => $transaction_amount,
                    'payment_mode' => $payment_mode,
                    'currency' => $currency,
                    'transaction_date' => $transaction_date,
                    'transaction_status' => $transaction_status,
                    'response_code' => $response_code,
                    'response_message' => $response_message,
                    'gateway_name' => $gateway_name,
                    'bank_transaction_id' => $bank_transaction_id,
                    'bank_name' => $bank_name,
                    'order_status' => $order_status
                );

                $this->Order_model->update($order, $order_id);
            } else {
                
            }
        } else {
            //echo "<b>Checksum mismatched.</b>";
            $this->session->set_flashdata('err', 'Order is not confirmed. Please try again later.');
            //Process transaction as suspicious.
        }

        redirect(base_url().'order/history');
    }

    public function history() {
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $result['order'] = $this->Order_model->get_by_customer_id($this->session->userdata('customer_id'));
        $this->load->view('header', $result);
        $this->load->view('menu');
        $this->load->view('order_history');
        $this->load->view('footer');
    }

    public function status() {
        $result['menu'] = $this->Menu_model->get_all();
        $result['category'] = $this->Category_model->get_all();
        $order_id = $this->input->get('order_id');
        $result['order'] = $this->Order_model->get_by_id($order_id);
        $result['order_status'] = $this->Order_model->get_status_by_order_id($order_id);
        $this->load->view('header', $result);
        $this->load->view('menu');
        $this->load->view('order_status');
        $this->load->view('footer');
    }


}
