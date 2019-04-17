<script>
    function validate()
    {
        //alert(state_id);
        var valid = false;
        $.ajax({
            url: '<?php echo base_url() ?>register/unique',
            type: 'post',
            async: false,
            data: {
                'customer_id': 0,
                'email': $("#email").val()
            },
            success: function (response) {
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
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body modal-body-sub_agile">
                <div class="main-mailposi">
                    <span class="fa fa-envelope-o" aria-hidden="true"></span>
                </div>
                <div class="modal_body_left modal_body_left1">
                    <h3 class="agileinfo_sign">Sign Up</h3>
                    
                    <form action="<?php echo base_url() ?>register" method="post" id="registrationForm">
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Name" name="name" required="">
                        </div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Address" name="address" required="">
                        </div>
                        <div class="styled-input agile-styled-input-top">
                            <input type="text" placeholder="Pincode" name="pincode" maxlength="6" required="">
                        </div>
                        <div class="styled-input">
                            <input type="email" placeholder="E-mail" name="email" id="email" required="">
                        </div>
                        <div class="styled-input">
                            <input type="text" placeholder="Mobile" name="mobile" maxlength="10" required="">
                        </div>
                        <div class="styled-input">
                            <input type="password" placeholder="Password" name="password" id="password1" required="">
                        </div>
                        <input type="submit" value="Sign Up" onclick="return validate()">
                    </form>
                    
                </div>
            </div>
        </div>
        <!-- //Modal content-->
    </div>
</div>
