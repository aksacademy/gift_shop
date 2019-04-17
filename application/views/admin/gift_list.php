<title>Gift Item | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gift Item</h2>

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

            <h2 class="panel-title">List of Gift Items</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Gst Rate (%)</th>
                        <th>Featured</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $srno = 1;
                    foreach ($gift as $g) {
                        ?>
                        <tr>
                            <td><?php echo $srno ?></td>
                            <td><?php echo $g->title ?></td>
                            <td><span class="fa fa-rupee"> <?php echo $g->price ?></span></td>
                            <td><?php echo $g->gst ?></span></td>
                            <td><?php
                                if ($g->featured == true) {
                                    echo 'Yes';
                                } else {
                                    echo 'No';
                                }
                                ?></td>
                            <td class="actions">
                                <a href="<?php echo base_url() ?>admin/gift/edit?id=<?php echo $g->gift_id ?>"><i class="fa fa-pencil"></i></a>
                                <a onclick="return confirm('Do you really want to delete this record?')" href="<?php echo base_url() ?>admin/gift/delete?id=<?php echo $g->gift_id ?>"><i class="fa fa-trash-o"></i></a>
                                <a href="<?php echo base_url() ?>admin/gift/gallery?id=<?php echo $g->gift_id ?>"><i class="fa fa-image"></i></a>
                                <a href="<?php echo base_url() ?>admin/shipping_charge?id=<?php echo $g->gift_id ?>"><i class="fa fa-rupee"></i></a>
                                <a href="<?php echo base_url() ?>admin/gift/category?id=<?php echo $g->gift_id ?>"><i class="fa fa-list"></i></a>
                            </td>
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
