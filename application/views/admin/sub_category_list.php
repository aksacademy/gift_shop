<title>Sub Category | <?php echo $this->config->item('app_name'); ?></title>

<script>
    function fetch_category(menu_id)
    {
        //alert(category_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>admin/category/get_by_menu_id',
            data: {
                menu_id: menu_id
            },
            success: function (response) {

                response = JSON.parse(response);
                //alert(response);
                $("#category_id").empty();
                $("#category_id").append("<option value=''>Select Category</option>");
                for (var i = 0; i < response.length; i++)
                {
                    $("#category_id").append("<option value=" + response[i]['category_id'] + ">" + response[i]['category_name'] + "</option>");
                }
            }
        });
    }
    function save()
    {

        var sub_category_name = $("#sub_category_name").val();
        var sub_category_id = $("#sub_category_id").val();
        var menu_id = $("#menu_id").val();
        var category_id = $("#category_id").val();
        if (sub_category_id == 0)
        {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>admin/sub/category/save',
                data: {
                    menu_id: menu_id,
                    category_id: category_id,
                    sub_category_name: sub_category_name
                },
                async: false,
                success: function (response) {
                    alert(response);

                }
            });
        } else
        {

            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>admin/sub/category/update',
                data: {
                    sub_category_id: sub_category_id,
                    sub_category_name: sub_category_name
                },
                async: false,
                success: function (response) {
                    alert(response);
                }
            });
        }
        $("#sub_category_name").val("");
        $("#sub_category_id").val(0);
        fetch_sub_category(category_id);

    }
    function edit(sub_category_id)
    {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>admin/sub/category/edit',
            data: {
                sub_category_id: sub_category_id
            },
            success: function (response) {

                response = JSON.parse(response);
                $("#sub_category_name").val(response['sub_category_name']);
                $("#sub_category_id").val(response['sub_category_id']);
            }
        });

    }

    function delete1(sub_category_id)
    {
        //alert(sub_category_id);
        var confirm1 = confirm('Do you really want to delete this record?');
        if (confirm1)
        {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>admin/sub/category/delete',
                data: {
                    sub_category_id: sub_category_id
                },
                async: false,
                success: function (response) {
                    alert(response);

                    fetch_sub_category($("#category_id").val());
                }
            });
        }


    }

    function fetch_sub_category(category_id)
    {
        //alert(sub_category_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>admin/sub_category/get_by_category_id',
            data: {
                category_id: category_id
            },
            success: function (response) {

                response = JSON.parse(response);
                $("#record").empty();
                for (var i = 0; i < response.length; i++)
                {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td>' + (i + 1) + '</td>';
                    cols += '<td>' + response[i]['sub_category_name'];
                    +'</td>';
                    cols += '<td class="actions"><a href="#" onclick="edit(' + response[i]['sub_category_id'] + ')"><i class="fa fa-pencil"></i></a>';
                    cols += '<a href="#" onclick="delete1(' + response[i]['sub_category_id'] + ')"><i class="fa fa-trash-o"></i></a></td>';
                    newRow.append(cols);
                    $("#record").append(newRow);
                }
            }
        });
    }

</script>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Sub Category</h2>

    </header>

    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Add Sub Category </h2>
                </header>

                <div class="panel-body">
                    <form class="form-horizontal form-bordered" id="subCategoryForm">
                        <div class="form-group">
                            <div class="col-md-3">

                                <select name="menu_id" id="menu_id" data-plugin-selectTwo class="form-control populate input-sm mb-md" onchange="fetch_category(this.value)">
                                    <option value="">Select Menu</option>
                                    <?php foreach ($menu as $m) {
                                        ?><option value="<?php echo $m->menu_id; ?>"><?php echo $m->menu_name; ?></option><?php ?>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-3">

                                <select name="category_id" id="category_id" data-plugin-selectTwo class="form-control populate input-sm mb-md" onchange="fetch_sub_category(this.value)">
                                    <option value="">Select Category</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="sub_category_id" id="sub_category_id" value="0">
                                <input type="text" class="form-control input-sm mb-md" name="sub_category_name" id="sub_category_name" placeholder="Enter sub category name">
                            </div>
                            <div class="col-md-2">
                                <button type="button" onclick="save()" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>
    <section class="panel">
        <header class="panel-heading">
            <h2 class="panel-title">Sub Category List</h2>
        </header>
        <div class="panel-body">
            <table class="table table-bordered table-striped mb-none" id="datatable-default1">
                <thead>
                    <tr>
                        <th>Sr. No</th>
                        <th>Sub Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="record">


                </tbody>
            </table>
        </div>
    </section>
</section>

<script>
    $(document).ready(function () {
        $('#subCategoryForm').formValidation({
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
                            url: '<?php echo base_url() ?>admin/sub_category/unique',
                            type: 'post',
                            data: function (validator) {
                                return{
                                    sub_category_id: validator.getFieldElements('sub_category_id').val(),
                                    sub_category_name: validator.getFieldElements('sub_category_name').val(),
                                    category_id: validator.getFieldElements('category_id').val(),
                                };

                                //category_id: 12
                            },
                            message: 'This sub category already exists'
                        }
                    }
                },
                category_id: {
                    validators: {
                        notEmpty: {
                            message: 'The menu name is required'
                        },
                        remote: {
                            url: '<?php echo base_url() ?>admin/sub_category/unique',
                            type: 'post',
                            data: function (validator) {
                                return{
                                    sub_category_id: validator.getFieldElements('sub_category_id').val(),
                                    sub_category_name: validator.getFieldElements('sub_category_name').val(),
                                    menu_id: validator.getFieldElements('menu_id').val(),
                                };

                                //category_id: 12
                            },
                            message: 'This sub category already exists'
                        }
                    }
                },
                sub_category_name: {
                    validators: {
                        notEmpty: {
                            message: 'The sub category name is required'
                        },
                        remote: {
                            url: '<?php echo base_url() ?>admin/sub_category/unique',
                            type: 'post',
                            data: function (validator) {
                                return{
                                    sub_category_id: validator.getFieldElements('sub_category_id').val(),
                                    category_id: validator.getFieldElements('category_id').val(),
                                    menu_id: validator.getFieldElements('menu_id').val(),
                                };

                                //category_id: 12
                            },
                            message: 'This sub category already exists'
                        }
                    }
                }
            }
        });
    });
</script>