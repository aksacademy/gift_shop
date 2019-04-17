<title><?php echo ucfirst($order_type) ?> Order | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2><?php echo ucfirst($order_type) ?> Order</h2>

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
    <!--<div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Filter Order</h2>
                </header>

                <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="post" action="">
                        <div class="form-group">
                            <div class="col-md-4">

                                
                            </div>
                            <div class="col-md-4">
                                
                            </div>
                            <div class="col-md-3">
                                
                            </div>
                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>-->
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title"><?php echo ucfirst($order_type) ?> Order </h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Id</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($order as $o) {
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i ?></th>
                            <td><?php echo $o->order_id ?></td>
                            <td><?php echo $o->shipping_name ?></td>
                            <td><?php echo $o->shipping_address . ', ' . $o->shipping_pincode ?></td>
                            <td><?php echo $o->shipping_email ?></td>
                            <td><?php echo $o->shipping_mobile ?></td>
                            <td class="actions">
                                <a title="Order detail" href="<?php echo base_url() ?>admin/order/detail?order_id=<?php echo $o->order_id ?>"><span class="fa fa-list"></span></a>
                                <a title="Order status" href="<?php echo base_url() ?>admin/order/status?order_id=<?php echo $o->order_id ?>"><span class="fa fa-road"></span></a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</section>
