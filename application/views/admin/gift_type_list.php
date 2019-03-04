<title>Gift Type</title>

<script>
    function fetch_sub_category(category_id)
    {
        //alert(category_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>admin/sub_category/get_by_category_id',
            data: {
                category_id: category_id
            },
            success: function (response) {

                response = JSON.parse(response);
                //alert(response);
                $("#sub_category_id").empty();
                $("#sub_category_id").append("<option>Select Sub Category</option>");
                for (var i = 0; i < response.length; i++)
                {
                    $("#sub_category_id").append("<option value=" + response[i]['sub_category_id'] + ">" + response[i]['sub_category_name'] + "</option>");
                }
            }
        });
    }
    function save()
    {

        var gift_type_name = $("#gift_type_name").val();
        var gift_type_id = $("#gift_type_id").val();
        var category_id = $("#category_id").val();
        var sub_category_id = $("#sub_category_id").val();
        if (gift_type_id == 0)
        {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>admin/gift_type/save',
                data: {
                    category_id: category_id,
                    sub_category_id: sub_category_id,
                    gift_type_name: gift_type_name
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
                url: '<?php echo base_url() ?>admin/gift_type/update',
                data: {
                    gift_type_id: gift_type_id,
                    gift_type_name: gift_type_name
                },
                async: false,
                success: function (response) {
                    alert(response);
                }
            });
        }
        $("#gift_type_name").val("");
        $("#gift_type_id").val(0);
        fetch_gift_type(sub_category_id);

    }
    function edit(gift_type_id)
    {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>admin/gift_type/edit',
            data: {
                gift_type_id: gift_type_id
            },
            success: function (response) {

                response = JSON.parse(response);
                $("#gift_type_name").val(response['gift_type_name']);
                $("#gift_type_id").val(response['gift_type_id']);
            }
        });

    }

    function delete1(gift_type_id)
    {
        //alert(gift_type_id);
        var confirm1 = confirm('Do you really want to delete this record?');
        if (confirm1)
        {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>admin/gift_type/delete',
                data: {
                    gift_type_id: gift_type_id
                },
                async: false,
                success: function (response) {
                    alert(response);

                    fetch_gift_type($("#sub_category_id").val());
                }
            });
        }


    }

    function fetch_gift_type(sub_category_id)
    {
        //alert(sub_category_id);
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>admin/gift_type/get_by_sub_category_id',
            data: {
                sub_category_id: sub_category_id
            },
            success: function (response) {

                response = JSON.parse(response);
                $("#record").empty();
                for (var i = 0; i < response.length; i++)
                {
                    var newRow = $("<tr>");
                    var cols = "";

                    cols += '<td>' + (i + 1) + '</td>';
                    cols += '<td>' + response[i]['gift_type_name'];
                    +'</td>';
                    cols += '<td class="actions"><a href="#" onclick="edit(' + response[i]['gift_type_id'] + ')"><i class="fa fa-pencil"></i></a>';
                    cols += '<a href="#" onclick="delete1(' + response[i]['gift_type_id'] + ')"><i class="fa fa-trash-o"></i></a></td>';
                    newRow.append(cols);
                    $("#record").append(newRow);
                }
            }
        });
    }

</script>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gift Type</h2>

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
                    <h2 class="panel-title">Add Gift Type</h2>
                </header>

                <div class="panel-body">
                    <form class="form-horizontal form-bordered">
                        <div class="form-group">
                            <div class="col-md-3">

                                <select name="category_id" id="category_id" data-plugin-selectTwo class="form-control populate input-sm mb-md" onchange="fetch_sub_category(this.value)">
                                    <option>Select Category</option>
                                    <?php foreach ($category as $c) {
                                        ?><option value="<?php echo $c->category_id; ?>"><?php echo $c->category_name; ?></option><?php ?>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-3">

                                <select name="sub_category_id" id="sub_category_id" data-plugin-selectTwo class="form-control populate input-sm mb-md" onchange="fetch_gift_type(this.value)">
                                    <option>Select Sub Category</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="hidden" name="gift_type_id" id="gift_type_id" value="0">
                                <input type="text" class="form-control input-sm mb-md" name="gift_type_name" id="gift_type_name" placeholder="Enter gift type name">
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
                        <th>Gift Type Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="record">


                </tbody>
            </table>
        </div>
    </section>
</section>
