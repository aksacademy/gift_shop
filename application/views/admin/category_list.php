<title>Category</title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Category</h2>

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
                    <h2 class="panel-title">Add Category</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="post" action="<?php echo base_url() ?>admin/category/save">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="text" class="form-control input-sm mb-md" name="category_name" placeholder="Enter category name">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Category List</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $srno = 1;
                    foreach ($category as $c) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $srno; ?></td>
                            <td><?php echo $c->category_name; ?>
                            </td>
                            <td class="actions">
                                <a href="<?php echo base_url() ?>admin/category/edit?id=<?php echo $c->category_id ?>"><i class="fa fa-pencil"></i></a>
                                <a onclick="return confirm('Do you really want to delete this record?')" href="<?php echo base_url() ?>admin/category/delete?id=<?php echo $c->category_id ?>"><i class="fa fa-trash-o"></i></a>
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
