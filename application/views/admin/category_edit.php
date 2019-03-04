<title>Category | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Category</h2>

    </header>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Category</h2>
                </header>

                <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="post" action="<?php echo base_url() ?>admin/category/update">
                        <div class="form-group">
                            <div class="col-md-4">

                                <select name="menu_id" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <option>Select Menu</option>
                                    <?php
                                    foreach ($menu as $m) {
                                        if ($m->menu_id == $category->menu_id) {
                                            ?>
                                            <option selected="" value="<?php echo $m->menu_id; ?>"><?php echo $m->menu_name; ?></option>
                                            <?php
                                        } else {
                                            ?>
                                            <option value="<?php echo $m->menu_id; ?>"><?php echo $m->menu_name; ?></option>
                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="category_id" value="<?php echo $category->category_id ?>" />
                                <input type="text" class="form-control input-sm mb-md" name="category_name" placeholder="Enter category name" value="<?php echo $category->category_name ?>">
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
