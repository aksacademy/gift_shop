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
                    <h2 class="panel-title">Edit Gift</h2>
                </header>

                <div class="panel-body">
                    <form action="<?php echo base_url() ?>admin/gift/update" id="gift" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="col-md-3">
                                <label><strong>Select Category</strong></label>
                                <input type="hidden" name="gift_id" value="<?php echo $gift->gift_id ?>" />
                                <select name="category_id" id="category_id" data-plugin-selectTwo class="form-control populate input-sm mb-md" onchange="fetch_sub_category(this.value)">
                                    <option>Select Category</option>
                                    <?php
                                    foreach ($category as $c) {
                                        if ($c->category_id == $gift->category_id) {
                                            ?><option selected="" value="<?php echo $c->category_id; ?>"><?php echo $c->category_name; ?></option><?php ?>
                                            <?php
                                        } else {
                                            ?><option value="<?php echo $c->category_id; ?>"><?php echo $c->category_name; ?></option><?php ?>
                                            <?php
                                        }
                                    }
                                    ?>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Select Sub Category</strong></label>
                                <select name="sub_category_id" id="sub_category_id" data-plugin-selectTwo class="form-control populate input-sm mb-md" onchange="fetch_gift_type(this.value)">
                                    <option>Select Sub Category</option>
                                    <?php
                                    foreach ($sub_category as $sc) {
                                        if ($sc->sub_category_id == $gift->sub_category_id) {
                                            ?><option selected="" value="<?php echo $sc->sub_category_id; ?>"><?php echo $sc->sub_category_name; ?></option><?php ?>
                                            <?php
                                        } else {
                                            ?><option value="<?php echo $sc->sub_category_id; ?>"><?php echo $sc->sub_category_name; ?></option><?php ?>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Select Gift Type</strong></label>
                                <select name="gift_type_id" id="gift_type_id" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <option>Select Gift Type</option>
                                    <?php
                                    foreach ($gift_type as $gt) {
                                        if ($gt->gift_type_id == $gift->gift_type_id) {
                                            ?><option selected="" value="<?php echo $gt->gift_type_id; ?>"><?php echo $gt->gift_type_name; ?></option><?php ?>
                                            <?php
                                        } else {
                                            ?><option value="<?php echo $gt->gift_type_id; ?>"><?php echo $gt->gift_type_name; ?></option><?php ?>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Title</strong></label>
                                <input type="text" class="form-control input-sm mb-md" name="title" id="title" placeholder="Enter gift title" value="<?php echo $gift->title ?>">
                            </div>

                            <div class="col-md-12">
                                <label><strong>Description</strong></label>
                                <textarea class="form-control input-sm mb-md" rows="5" name="description" id="description" placeholder="Enter gift description"><?php echo $gift->description ?></textarea>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Price</strong></label>
                                <input type="number" class="form-control input-sm mb-md" name="price" id="price" placeholder="Enter gift price" value="<?php echo $gift->price ?>">
                            </div>
                            <div class="col-md-3">
                                <label><strong>Is this featured gift?</strong></label>
                                <select name="featured" id="featured" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <?php
                                    if ($gt->featured) {
                                        ?>
                                        <option value="1" selected="">Yes</option>
                                        <option value="0">No</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="1">Yes</option>
                                        <option value="0" selected="">No</option>
                                        <?php
                                    }
                                    ?>

                                </select>

                            </div>
                            <div class="col-md-3">
                                <br />
                                <button class="btn btn-primary">Submit</button>
                                <a href="" class="btn btn-default" type="button">Cancel</a>
                            </div>

                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>

</section>
