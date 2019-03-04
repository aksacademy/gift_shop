<title>Sub Category</title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Sub Category</h2>

    </header>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Sub Category</h2>
                </header>

                <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="post" action="<?php echo base_url() ?>admin/sub/category/update">
                        <div class="form-group">
                            <div class="col-md-4">

                                <select name="category_id" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <option>Select Category</option>
                                    <?php
                                    foreach ($category as $c) {
                                        if ($c->category_id == $sub_category->category_id) {
                                            ?>
                                            <option selected="" value="<?php echo $c->category_id; ?>"><?php echo $c->category_name; ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $c->category_id; ?>"><?php echo $c->category_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="sub_category_id" value="<?php echo $sub_category->sub_category_id ?>" />
                                <input type="text" class="form-control input-sm mb-md" name="sub_category_name" placeholder="Enter sub category name" value="<?php echo $sub_category->sub_category_name ?>">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary">Submit</button>
                                <a href="<?php echo base_url() ?>admin/sub/category" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>
</section>
