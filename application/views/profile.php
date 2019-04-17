<script>
    function validate()
    {
        var valid = false;
        $.ajax({
            url: '<?php echo base_url() ?>customer/unique',
            type: 'post',
            async: false,
            data: {
                'customer_id': <?php echo $this->session->userdata('customer_id') ?>,
                'email': $("#email").val()
            },
            success: function (response) {
                //alert(response);
                if (response == 1)
                {
                    valid = true;
                } else {
                    alert('This email address already exists. Please insert different one');
                    $("#email").focus();
                    valid = false;
                }

            }
        });

        return valid;
    }

</script>


<title><?php echo $this->config->item('app_name') ?></title>
<div class="contact-w3l">
    <div class="container">
        <!-- tittle heading -->

        <!-- //tittle heading -->
        <!-- contact -->

        <div class="row">

            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h2 style="margin-bottom: 20px">Edit Profile</h2>
                <?php if ($this->session->flashdata('msg') != null) { ?>
                    <div class="form-group">
                        <div class="btn btn-success"><?php echo $this->session->flashdata('msg') ?></div>
                    </div>
                <?php } else if ($this->session->flashdata('err') != null) {
                    ?>
                    <div class="form-group">
                        <div class="btn btn-danger"><?php echo $this->session->flashdata('err') ?></div>
                    </div>
                <?php }
                ?>
                <form action="<?php echo base_url() ?>customer/change_profile" method="post">
                    <div class="form-group">
                        <!--<label>Name:</label>-->
                        <input type="text" class="form-control" name="name" required="" placeholder="Enter name" value="<?php echo $customer->name ?>">
                    </div>
                    <div class="form-group">
                        <!--<label>Address:</label>-->
                        <textarea class="form-control" name="address" required="" placeholder="Enter address"><?php echo $customer->address ?></textarea>
                    </div>
                    <div class="form-group">
                        <!--<label>Pincode:</label>-->
                        <input type="text" class="form-control" name="pincode" required="" maxlength="6" placeholder="Enter pincode" value="<?php echo $customer->pincode ?>"></input>
                    </div>
                    <div class="form-group">
                        <!--<label>Mobile:</label>-->
                        <input type="text" class="form-control" name="mobile" required="" maxlength="10" placeholder="Enter mobile" value="<?php echo $customer->mobile ?>">
                    </div>
                    <div class="form-group">
                        <!--<label>Email:</label>-->
                        <input type="email" class="form-control" name="email" id="email" required="" placeholder="Enter email" value="<?php echo $customer->email ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return validate()">Update Profile</button>
                </form>
            </div>




        </div>


        <!-- //contact -->
    </div>
</div>
