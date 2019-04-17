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
                    <form class="form-horizontal form-bordered" id="categoryForm" method="post" action="<?php echo base_url() ?>admin/category/update">
                        <div class="form-group">
                            <div class="col-md-4">

                                <select name="menu_id" id="menu_id" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <option value="">Select Menu</option>
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
                                <input type="text" class="form-control input-sm mb-md" name="category_name" id="category_name" placeholder="Enter category name" value="<?php echo $category->category_name ?>">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?php echo base_url() ?>admin/category" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>
</section>

<script>
                $(document).ready(function () {
                    $('#categoryForm').formValidation({
                        framework: 'bootstrap',
                        icon: {
                            valid: 'glyphicon glyphicon-ok',
                            invalid: 'glyphicon glyphicon-remove',
                            validating: 'glyphicon glyphicon-refresh'
                        },
                        fields: {
                            menu_id: {
                                validators: {
                                    notEmpty: {
                                        message: 'The menu name is required'
                                    },
                                    remote: {
                                        url: '<?php echo base_url() ?>admin/category/unique',
                                        type: 'post',
                                        data: function (validator) {
                                            return{
                                                category_id: <?php echo $category->category_id ?>,
                                                category_name: validator.getFieldElements('category_name').val(),
                                            };

                                            //category_id: 12
                                        },
                                        message: 'This category already exists'
                                    }
                                }
                            },
                            category_name: {
                                validators: {
                                    notEmpty: {
                                        message: 'The category name is required'
                                    },
                                    remote: {
                                        url: '<?php echo base_url() ?>admin/category/unique',
                                        type: 'post',
                                        data: function (validator) {
                                            return{
                                                category_id: <?php echo $category->category_id ?>,
                                                menu_id: validator.getFieldElements('menu_id').val(),
                                            };

                                            //category_id: 12
                                        },
                                        message: 'This category already exists'
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
