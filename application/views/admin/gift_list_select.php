<title>Gift Item</title>
<script src="<?php echo base_url() ?>assets/admin/vendor/jquery/jquery.js"></script>
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
                //alert(response);
                $("#gift_type_id").empty();
                $("#gift_type_id").append("<option>Select Gift Type</option>");
                for (var i = 0; i < response.length; i++)
                {
                    $("#gift_type_id").append("<option value=" + response[i]['gift_type_id'] + ">" + response[i]['gift_type_name'] + "</option>");
                }
            }
        });
    }

</script>
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
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Fetch list of Gift Item</h2>
                </header>

                <div class="panel-body">
                    <form id="gift" method="post" action="<?php echo base_url() ?>admin/gift/list_" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="col-md-3">
                                <label><strong>Select Category</strong></label>
                                <select name="category_id" id="category_id" data-plugin-selectTwo class="form-control populate input-sm mb-md" onchange="fetch_sub_category(this.value)">
                                    <option>Select Category</option>
                                    <?php foreach ($category as $c) {
                                        ?><option value="<?php echo $c->category_id; ?>"><?php echo $c->category_name; ?></option><?php ?>

                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Select Sub Category</strong></label>
                                <select name="sub_category_id" id="sub_category_id" data-plugin-selectTwo class="form-control populate input-sm mb-md" onchange="fetch_gift_type(this.value)">
                                    <option>Select Sub Category</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Select Gift Type</strong></label>
                                <select name="gift_type_id" id="gift_type_id" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <option>Select Gift Type</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <br />
                                <button class="btn btn-primary">Submit</button>
                            </div>

                            

                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>

</section>
