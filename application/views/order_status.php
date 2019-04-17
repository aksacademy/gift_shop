

<title><?php echo $this->config->item('app_name') ?></title>



<div class="ads-grid">

    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Order Status
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>

        <br />
        <div class="checkout-right">
            <table class="basic" border='0' width='100%' cellpadding='20' cellspacing='5'>
                <tbody>
                    <tr>
                        <td valign='top'>
                            <label><strong>Order Id: </strong><?php echo $order->order_id ?></label><br />
                            <label><strong>Order Date: </strong><?php echo date('d/m/Y H:i:s', strtotime($order->order_date)) ?></label><br />
                            <label><strong>Order Status: </strong><?php
                                if ($order->delivered) {
                                    echo 'Delivered';
                                } else {
                                    echo 'Not Delivered';
                                }
                                ?></label>
                        </td>
                        <td valign='top'>
                            <label><strong>Name: </strong><?php echo $order->shipping_name ?></label><br />
                            <label><strong>Address: </strong><?php echo $order->shipping_address . ', ' . $order->shipping_pincode ?></label><br />
                            <label><strong>Email: </strong><?php echo $order->shipping_email ?></label><br />
                            <label><strong>Mobile: </strong><?php echo $order->shipping_mobile ?></label>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>

        <br />
        <!-- //tittle heading -->
        <div class="checkout-right">


            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Description</th>
                            <th>Status date</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($order_status as $os) {
                            ?>
                            <tr>
                                <td><?php echo $i ?></td>
                                <td><?php echo $os->description ?></td>
                                <td><?php echo date('d/m/Y H:i:s', strtotime($os->order_status_date)); ?></td>
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
