

<title><?php echo $this->config->item('app_name') ?></title>
<script>
    function updateItem(id)
    {

        var c = confirm('Do you really want to update this gift?');
        if (!c)
        {
            return false;
        }

        //alert('gift..id..'+id);

        //var ele = document.getElementById(id);
        var quantity = document.getElementById(id + "_quantity").value;
        //alert(quantity);

        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gift/update_gifts',
            data: {
                gift_id: id,
                quantity: quantity
            },
            success: function (response) {
                location.reload(true);
                //document.getElementById("total_gifts").value = response;
                //document.getElementById("total_gifts").innerHTML = response;
                //alert('Item has been added to the cart');
            }
        });
    }
    function deleteItem(id)
    {

        //alert(id);
        var c = confirm('Do you really want to delete this gift?');
        if (!c)
        {
            return false;
        }
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gift/delete_gifts',
            data: {
                gift_id: id,
            },
            success: function (response) {
                location.reload(true);
                //document.getElementById("total_gifts").value = response;
                //document.getElementById("total_gifts").innerHTML = response;
                //alert('Item has been added to the cart');
            }
        });
    }

    function check_for_availability()
    {
        if ($("#pincode").val() == '')
        {
            alert('Please insert pincode');
        } else {
            $.ajax({
                type: 'post',
                url: '<?php echo base_url() ?>gift/check_for_availability',
                data: {
                    pincode: $("#pincode").val(),
                },
                success: function (response) {
                    //alert(response);
                    if (response == 'true')
                    {
                        location.reload(true);
                    } else {
                        alert('delivery not available');
                    }
                }
            });
        }

    }

</script>




<div class="ads-grid">

    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Checkout
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="checkout-right">

            <?php
            $total_gifts = 0;
            if (isset($_SESSION['gift'])) {
                foreach ($_SESSION['gift'] as $gift) {
                    $total_gifts = $total_gifts + $gift['gift_quantity'];
                }
            }
            ?>

            <h4>Your shopping cart contains:
                <span><span><?php echo $total_gifts ?> Gifts</span></span>
            </h4>
            <?php
            $pincode = '';
            if (isset($_SESSION['pincode'])) {
                $pincode = $_SESSION['pincode'];
            }
            ?>
            <?php if (isset($_SESSION['gift'])) {
                ?>
                <div class="form-inline">
                    <div class="form-group">
                        <input type="number" class="form-control col-sm-12" name="pincode" id="pincode" placeholder="Enter pincode" value="<?php echo $pincode ?>">
                    </div>
                    <div class="form-group"> 
                        <button type="button" class="btn btn-default" onclick="check_for_availability()">Check</button>
                    </div>
                </div>
                <?php
            }
            ?>
            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Product</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Amount</th>
                            <th>GST(%)</th>
                            <th>GST Amount</th>
                            <th>Shipping Charge</th>
                            <th>Amount</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $total_amount = 0;
                        if (isset($_SESSION['gift'])) {
                            foreach ($_SESSION['gift'] as $gift) {


                                $image = base_url() . $gift['gift_image'];
                                $name = $gift['gift_name'];
                                $price = $gift['gift_price'];
                                $quantity = $gift['gift_quantity'];
                                $amount = $price * $quantity;
                                $gst_rate = $gift['gift_gst'];
                                $gst_amount = $gst_rate * $amount / 100;
                                $shipping_charge = $gift['gift_shipping_charge'];
                                $total_shipping_charge = $shipping_charge * $quantity;
                                $sub_total = $amount + $gst_amount + $total_shipping_charge;
                                $total_amount = $total_amount + $sub_total;
                                ?>
                                <tr class="rem1">
                                    <td class="invert"><?php echo $i ?></td>
                                    <td class="invert-image"><img width="50px" src="<?php echo $image ?>" alt=" " class="img-responsive"></td>
                                    <td class="invert"><?php echo $name ?></td>
                                    <td class="invert"><span class="fa fa-rupee-sign"></span><?php echo $price ?></td>
                                    <td class="invert">                                           
                                        <input type="number" min="1" id="<?php echo $gift['gift_id'] ?>_quantity" style="width: 50px" value="<?php echo $quantity ?>">
                                        <div class="fa fa-save" onclick="updateItem(<?php echo $gift['gift_id'] ?>)"> </div>                                           
                                    </td>
                                    <td class="invert"><span class="fa fa-rupee-sign"></span><?php echo $amount ?></td>
                                    <td class="invert"><?php echo $gst_rate ?></td>
                                    <td class="invert"><span class="fa fa-rupee-sign"></span><?php echo $gst_amount ?></td>
                                    <td class="invert"><span class="fa fa-rupee-sign"></span><?php echo $shipping_charge . '*' . $quantity . '=' . $total_shipping_charge ?></td>
                                    <td class="invert"><span class="fa fa-rupee-sign"></span><?php echo $sub_total ?></td>
                                    <td class="invert">
                                        <div class="fa fa-trash" onclick="deleteItem(<?php echo $gift['gift_id'] ?>)"> </div>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                            <tr class="rem1">
                                <th colspan="9" class="text-right">Total Amount</th>
                                <th colspan="2" class="text-left"><span class="fa fa-rupee-sign"></span><?php echo $total_amount ?></th>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="checkout-right">
                <?php if (isset($_SESSION['pincode'])) { ?>
                    <div class="checkout-right-basket pull-right">
                        <a href="<?php echo base_url() ?>order">Checkout </a>
                    </div>
                <?php } ?>
                <div class="clearfix"> </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>
