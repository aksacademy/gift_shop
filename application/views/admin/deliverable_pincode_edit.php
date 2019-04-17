<title>Deliverable Pincode | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Deliverable Pincode</h2>

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
                    <h2 class="panel-title">Edit Pincode</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" id="pincodeForm" method="post" action="<?php echo base_url() ?>admin/deliverable_pincode/update">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="pincode_id" value="<?php echo $deliverable_pincode->pincode_id ?>">
                                <input type="number" class="form-control input-sm mb-md" name="pincode" placeholder="Enter pincode" value="<?php echo $deliverable_pincode->pincode ?>">
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="<?php echo base_url() ?>admin/deliverable_pincode" class="btn btn-default">Cancel</a>
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
        $('#pincodeForm').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                pincode: {
                    validators: {
                        notEmpty: {
                            message: 'The pincode is required'
                        },
                        remote: {
                            url: '<?php echo base_url() ?>admin/deliverable_pincode/unique',
                            type: 'post',
                            data: {
                                pincode_id: <?php echo $deliverable_pincode->pincode_id ?>,
                            },
                            message: 'This pincode already exists'
                        }
                    }
                }
            }
        });
    });
</script>
