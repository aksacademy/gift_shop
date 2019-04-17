<title>Order Status | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Order Status</h2>

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

                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label><strong>Order Id: </strong><?php echo $order->order_id ?></label>
                        </div>
                        <div class="col-sm-5">
                            <label><strong>Order Date: </strong><?php echo date('d/m/Y H:i:s', strtotime($order->order_date)) ?></label>
                        </div>
                        <div class="col-sm-3">
                            <label><strong>Order Status: </strong><?php
                                if ($order->delivered) {
                                    echo 'Delivered';
                                } else {
                                    echo 'Not Delivered';
                                }
                                ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label><strong>Name: </strong><?php echo $order->shipping_name ?></label>
                        </div>
                        <div class="col-sm-9">
                            <label><strong>Address: </strong><?php echo $order->shipping_address . ', ' . $order->shipping_pincode ?></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label><strong>Email: </strong><?php echo $order->shipping_email ?></label>
                        </div>
                        <div class="col-sm-3">
                            <label><strong>Mobile: </strong><?php echo $order->shipping_mobile ?></label>
                        </div>
                    </div>
            </section>    
        </div>
    </div>

    <?php if ($order->order_status == 'confirmed' && !$order->delivered) { ?>
        <div class="row">
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        <h2 class="panel-title">New Order Status</h2>
                    </header>

                    <div class="panel-body">


                        <form class="form-horizontal form-bordered" id="orderStatusForm" method="post" action="<?php echo base_url() ?>admin/order/save_order_status">
                            <div class="form-group">
                                <div class="col-md-7">
                                    <input type="hidden" name="order_id" value="<?php echo $order->order_id ?>">
                                    <input type="text" class="form-control input-sm mb-md" name="description" placeholder="Enter description of order status">
                                </div>
                                <div class="col-md-3">

                                    <select name="delivered" class="form-control input-sm mb-md">
                                        <option value="">Select Order Status</option>
                                        <option value="0">Open</option>
                                        <option value="1">Close</option>

                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </section>    
            </div>
        </div>
    <?php } ?>
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Order Status</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Description</th>
                        <th>Status Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $srno = 1;
                    foreach ($order_status as $os) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $srno ?></td>
                            <td><?php echo $os->description ?></td>
                            <td><?php echo date('d/m/Y H:i:s', strtotime($os->order_status_date)); ?></td>
                        </tr>
                        <?php
                        $srno++;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </section>
</section>
<script>
    $(document).ready(function () {
        $('#orderStatusForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                description: {
                    validators: {
                        notEmpty: {
                            message: 'Please insert order status description'
                        },
                    }
                },
                delivered: {
                    validators: {
                        notEmpty: {
                            message: 'Please select order status'
                        },
                    }
                }
            }
        });
    });
</script>
