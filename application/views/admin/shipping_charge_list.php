<title>Shipping Charge | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Shipping Charge</h2>

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

    <section class="panel">
        <header class="panel-heading">
            <div class="panel-actions">
                <a href="<?php echo base_url() ?>admin/gift/add" class="fa fa-plus"></a>
            </div>

            <h2 class="panel-title">Shipping Charge for <strong><?php echo $gift->title ?></strong></h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pincode</th>
                        <th>Rate</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $srno = 1;
                    foreach ($shipping_charge as $sc) {
                        ?>
                    <form action="<?php echo base_url() ?>admin/shipping_charge/save" method="post">
                        <input type="hidden" name="gift_id" value="<?php echo $gift->gift_id ?>" />
                        <input type="hidden" name="pincode" value="<?php echo $sc->pincode ?>" />
                        <tr>
                            <th scope="row"><?php echo $srno; ?></th>
                            <td><?php echo $sc->pincode; ?></td>
                            <td>
                                <input name="rate" type="number" class="form-control input-sm mb-md" value="<?php echo $sc->rate ?>" placeholder="Enter shipping rate" />
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </td>
                        </tr>
                    </form>
                    <?php
                    $srno++;
                }
                ?>



                </tbody>
            </table>
        </div>
    </section>
</section>
