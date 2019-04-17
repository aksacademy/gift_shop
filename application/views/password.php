<script>
    function validate()
    {
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if (password != cpassword)
        {
            alert("Password and confirm password are not same");
            $("#cpassword").focus();
            return false;
        }
        return true;
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
                <h2 style="margin-bottom: 20px">Change Password</h2>
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
                <form action="<?php echo base_url() ?>customer/change_password" method="post">
                    <div class="form-group">
                        <!--<label>Name:</label>-->
                        <input type="password" class="form-control" name="password" required="" id="password" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <!--<label>Address:</label>-->
                        <input type="password" class="form-control" name="cpassword" required="" id="cpassword" placeholder="Enter confirm password">
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="return validate()">Change Password</button>
                </form>
            </div>


        </div>


        <!-- //contact -->
    </div>
</div>
