

<title><?php echo $this->config->item('app_name') ?></title>



<div class="ads-grid">



    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Order History
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">

            <?php if ($this->session->flashdata('err') != null) { ?>
                <div class="form-group">
                    <div class="btn btn-danger"><?php echo $this->session->flashdata('err') ?></div>
                </div>
            <?php } else if ($this->session->flashdata('msg') != null) { ?>
                <div class="form-group">
                    <div class="btn btn-success"><?php echo $this->session->flashdata('msg') ?></div>
                </div>
            <?php } ?>


            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Booking Id</th>
                            <th>Order date</th>
                            <th>Order status</th>
                            <th>Gross Amount</th>
                            <th>GST Amount</th>
                            <th>Shipping Charge</th>
                            <th>Net Amount</th>
                            <th>Delivered</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($order as $o) {
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $o->order_id ?></td>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($o->order_date)) ?></td>
                                <td><?php echo $o->order_status ?></td>
                                <td><i class="fa fa-rupee" style="color: black"></i><?php echo $o->gross_amount ?></td>
                                <td><i class="fa fa-rupee" style="color: black"></i><?php echo $o->total_gst_amount ?></td>
                                <td><i class="fa fa-rupee" style="color: black"></i><?php echo $o->total_shipping_charge ?></td>
                                <td><i class="fa fa-rupee" style="color: black"></i><?php echo $o->transaction_amount ?></td>
                                <td><?php
                                    if ($o->delivered) {
                                        ?>
                                        <button onclick='window.location.href = "<?php echo base_url() ?>order/status?order_id=<?php echo $o->order_id ?>"' class="btn btn-secondary btn-sm">Yes</button>
                                        <?php
                                    } else {
                                        ?><button onclick='window.location.href = "<?php echo base_url() ?>order/status?order_id=<?php echo $o->order_id ?>"' class="btn btn-secondary btn-sm">No</button><?php
                                    }
                                    ?></td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
