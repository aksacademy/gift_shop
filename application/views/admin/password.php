<title>Change Password | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Change Password</h2>

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
                    <h2 class="panel-title">Change Password</h2>
                </header>

                <div class="panel-body">
                    <form class="form-horizontal form-bordered" id="passwordForm" method="post" action="<?php echo base_url() ?>admin/account/change_password">
                        <div class="form-group">
                            <div class="col-md-5">
                                <input type="password" class="form-control input-sm mb-md" name="password" placeholder="Enter new password">
                            </div>
                            <div class="col-md-5">
                                <input type="password" class="form-control input-sm mb-md" name="cpassword" placeholder="Enter confirm password">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary">Change</button>
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
        // The maximum number of options

        $('#passwordForm')
                .formValidation({
                    framework: 'bootstrap',
                    icon: {
                        valid: 'glyphicon glyphicon-ok',
                        invalid: 'glyphicon glyphicon-remove',
                        validating: 'glyphicon glyphicon-refresh'
                    },
                    fields: {
                        password: {
                            validators: {
                                notEmpty: {
                                    message: 'Please insert new password'
                                },
                            }
                        },
                        cpassword: {
                            validators: {
                                identical: {
                                    field: 'password',
                                    message: 'The new password and confirm password are not the same'
                                }
                            }
                        }


                    }
                })
    });
</script>
