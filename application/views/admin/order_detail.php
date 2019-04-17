<title>Order Detail | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>New Order</h2>

    </header>
    <?php if ($this->session->flashdata('msg') != null) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
        </div>


        <?php
    } else if ($this->session->flashdata('err') != null) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php echo $this->session->flashdata('err'); ?></strong>
        </div>    

        <?php
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Order Detail</h2>
                </header>


            </section>    
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tabs">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#shipping" data-toggle="tab">Shipping Detail</a>
                    </li>
                    <li>
                        <a href="#billing" data-toggle="tab">Billing Detail</a>
                    </li>
                    <li>
                        <a href="#order" data-toggle="tab">Order Detail</a>
                    </li>
                    <li>
                        <a href="#gift" data-toggle="tab">Gift Detail</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="shipping" class="tab-pane active">
                        <div class="form-group">
                            <label><strong>Name: </strong><span class="fa fa-user"></span> <?php echo $order->shipping_name ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong>Address: </strong><span class="fa fa-map-marker"></span> <?php echo $order->shipping_address . ', ' . $order->shipping_pincode ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong>Email: </strong><span class="fa fa-envelope"></span> <?php echo $order->shipping_email ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong>Mobile: </strong><span class="fa fa-mobile"></span> <?php echo $order->shipping_mobile ?></label>
                        </div>
                    </div>
                    <div id="billing" class="tab-pane">
                        <div class="form-group">
                            <label><strong>Name: </strong><span class="fa fa-user"></span> <?php echo $order->billing_name ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong>Address: </strong><span class="fa fa-map-marker"></span> <?php echo $order->billing_address . ', ' . $order->billing_pincode ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong>Email: </strong><span class="fa fa-envelope"></span> <?php echo $order->billing_email ?></label>
                        </div>
                        <div class="form-group">
                            <label><strong>Mobile: </strong><span class="fa fa-mobile"></span> <?php echo $order->billing_mobile ?></label>
                        </div>
                    </div>
                    <div id="order" class="tab-pane">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label><strong>Order Id: </strong><?php echo $order->order_id ?></label>
                            </div>
                            <div class="col-md-9">
                                <label><strong>Order Date: </strong><?php echo date('d/m/Y H:i:s', strtotime($order->order_date)) ?></label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-3">
                                <label><strong>Gross Amount: </strong><span class="fa fa-rupee"></span> <?php echo $order->gross_amount ?></label>
                            </div>
                            <div class="col-md-3">
                                <label><strong>GST Amount: </strong><span class="fa fa-rupee"></span> <?php echo $order->total_gst_amount ?></label>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Shipping Charge: </strong><span class="fa fa-rupee"></span> <?php echo $order->total_shipping_charge ?></label>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Net Amount: </strong><span class="fa fa-rupee"></span> <?php echo $order->net_amount ?></label>
                            </div>
                        </div>
                    </div>
                    <div id="gift" class="tab-pane">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label><strong>Gift Title </strong></label>
                            </div>
                            <div class="col-md-6">
                                <label><strong>Quantity </strong></label>
                            </div>
                        </div>
                        <?php foreach ($order_detail as $od) {
                            ?>
                            <div class="form-group">
                                <div class="col-md-6">
                                    <label><?php echo $od->gift_name ?></label>
                                </div>
                                <div class="col-md-6">
                                    <label><?php echo $od->gift_quantity ?></label>
                                </div>
                            </div>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
