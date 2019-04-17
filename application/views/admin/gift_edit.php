<title>Gift Item | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gift Item</h2>

    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Gift</h2>
                </header>

                <div class="panel-body">
                    <form action="<?php echo base_url() ?>admin/gift/update" id="giftForm" method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="col-md-6">
                                <label><strong>Title</strong></label>
                                <input type="hidden" name="gift_id" value="<?php echo $gift->gift_id ?>" />
                                <input type="text" class="form-control input-sm mb-md" name="title" id="title" placeholder="Enter gift title" value="<?php echo $gift->title ?>">
                            </div>
                            <div class="col-md-3">
                                <label><strong>Price</strong></label>
                                <input type="number" class="form-control input-sm mb-md" name="price" id="price" placeholder="Enter gift price" value="<?php echo $gift->price ?>">
                            </div>
                            <div class="col-md-3">
                                <label><strong>GST Rate (%)</strong></label>
                                <input type="number" class="form-control input-sm mb-md" name="gst" id="gst" placeholder="Enter gst rate" value="<?php echo $gift->gst ?>">
                            </div>
                            <div class="col-md-12">
                                <label><strong>Description</strong></label>
                                <textarea class="form-control input-sm mb-md" rows="5" name="description" id="description" placeholder="Enter gift description"><?php echo $gift->description ?></textarea>
                            </div>

                            <div class="col-md-3">
                                <label><strong>Is this featured gift?</strong></label>
                                <select name="featured" id="featured" data-plugin-selectTwo class="form-control populate input-sm mb-md">
                                    <?php
                                    if ($gt->featured) {
                                        ?>
                                        <option value="">Select option</option>
                                        <option value="1" selected="">Yes</option>
                                        <option value="0">No</option>
                                        <?php
                                    } else {
                                        ?>
                                        <option value="">Select option</option>
                                        <option value="1">Yes</option>
                                        <option value="0" selected="">No</option>
                                        <?php
                                    }
                                    ?>

                                </select>

                            </div>
                            <div class="col-md-3">
                                <br />
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?php echo base_url() ?>admin/gift" class="btn btn-default" type="button">Cancel</a>
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
        $('#giftForm')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        title: {
                            validators: {
                                notEmpty: {
                                    message: 'The gift name required and cannot be empty'
                                },
                                remote: {
                                    url: '<?php echo base_url() ?>admin/gift/unique',
                                    type: 'post',
                                    data: {
                                        gift_id: <?php echo $gift->gift_id ?>,
                                    },
                                    message: 'This gift already exists'
                                }
                            }
                        },
                        description: {
                            validators: {
                                notEmpty: {
                                    message: 'The gift description is required and cannot be empty'
                                }
                            }
                        },
                        price: {
                            validators: {
                                notEmpty: {
                                    message: 'The gift price is required and cannot be empty'
                                }
                            }
                        },
                        gst: {
                            validators: {
                                notEmpty: {
                                    message: 'The gift gst rate is required and cannot be empty'
                                }
                            }
                        },
                        featured: {
                            validators: {
                                notEmpty: {
                                    message: 'Please select whether gift is featured or not'
                                }
                            }
                        },
                        image: {
                            validators: {
                                notEmpty: {
                                    message: 'Please select image for gift'
                                },
                                file: {
                                    extension: 'jpg,jpeg,png',
                                    type: 'image/jpeg, image/png',
                                    maxSize: 700 * 1024,
                                    message: 'Please select image of maximum 700 KB'
                                }
                            }
                        },
                    }
                });
    });
</script>
