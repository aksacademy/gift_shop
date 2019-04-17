

<title><?php echo $this->config->item('app_name') ?></title>
<script src="<?php echo base_url() ?>assets/user/js/jquery-2.1.4.min.js"></script>
<script>
    $(document).ready(function () {
        //set initial state.
        //$('#textbox1').val($(this).is(':checked'));

        $('#chk_shipping_address').change(function () {
            //alert('hihi');
            if ($(this).is(":checked")) {
                $('#shipping_name').val($('#billing_name').val());
                $('#shipping_address').val($('#billing_address').val());
                $('#shipping_email').val($('#billing_email').val());
                $('#shipping_mobile').val($('#billing_mobile').val());
            } else {
                $('#shipping_name').val('');
                $('#shipping_address').val('');
                $('#shipping_email').val('');
                $('#shipping_mobile').val('');
            }

        });
    });
</script>

<div class="ads-grid">

    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Shipping
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <form class="form-horizontal" action="<?php echo base_url() ?>order/confirm" method="post">
            <div class="row">

                <div class="col-sm-6">
                    <div class="form-group"><div class="col-sm-12"><h4>Billing Address</h4></div></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="billing_name" required="" id="billing_name" placeholder="Name" value="<?php echo $customer->name ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <textarea class="form-control" type="text" name="billing_address" required="" id="billing_address" placeholder="Address"><?php echo $customer->address ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="billing_email" required="" id="billing_email" placeholder="Enter email" value="<?php echo $customer->email ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12"> 
                            <input class="form-control" type="number" name="billing_mobile" required="" maxlength="10" id="billing_mobile" placeholder="Mobile" value="<?php echo $customer->mobile ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12"> 
                            <input class="form-control" type="number" name="billing_pincode" required="" maxlength="6" id="billing_pincode" placeholder="Pincode" value="<?php echo $customer->pincode ?>">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group"><div class="col-sm-12"><h4>Shipping Address</h4></div></div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input class="form-control" type="text" name="shipping_name" required="" id="shipping_name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12"> 
                            <textarea class="form-control" type="text" name="shipping_address" required="" id="shipping_address" placeholder="Address"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" class="form-control" name="shipping_email" required="" id="shipping_email" placeholder="Enter email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12"> 
                            <input class="form-control" type="text" name="shipping_mobile" required="" maxlength="10" id="shipping_mobile" placeholder="Mobile">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12"> 
                            <input class="form-control" type="hidden" name="shipping_pincode" placeholder="Pincode" value="<?php echo $_SESSION['pincode'] ?>">
                            <input class="form-control" type="number" disabled="" value="<?php echo $_SESSION['pincode'] ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <div class="checkbox">
                                <label><input type="checkbox" id="chk_shipping_address"> Same as Billing Address</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-10">
                            <button type="submit" class="submit check_out">Continue</button>
                        </div>
                    </div>
                    
                    <div class="checkout-right-basket">
                        
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
