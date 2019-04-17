<title>Category | <?php echo $this->config->item('app_name'); ?></title>
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
                    <form class="form-horizontal form-bordered" id="categoryForm" method="post" action="<?php echo base_url() ?>admin/category/save">
                        <div class="form-group">
                            <div class="col-md-4">

                                <select name="menu_id" id="menu_id" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) {
                                        ?><option value="<?php echo $m->menu_id; ?>"><?php echo $m->menu_name; ?></option><?php
                                        ?>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" class="form-control input-sm mb-md" name="category_name" id="category_name" placeholder="Enter category name">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
                        <th>Menu Name</th>
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
                            <td><?php echo $srno ?></td>
                            <td><?php echo $c->menu_name ?> 
                            </td>
                            <td><?php echo $c->category_name ?>
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
                                                category_id: 0,
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
                                                category_id: 0,
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
