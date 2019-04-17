
<script>

    function filter_by_sub_category()
    {
        var sub_category = new Array();
        $.each($("input[name='sub_category[]']:checked"), function () {
            sub_category.push($(this).val());
        });
        fetch_result(sub_category);
    }
    function fetch_result(condition) {
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gift/filter',
            data: {
                condition: condition
            },
            success: function (response) {
                //alert(response);
                document.getElementById("gift").innerHTML = response;
            }
        });
    }

    function addToCart(gift_id)
    {
        //alert(id);
        //var ele = document.getElementById(id);
        var image = document.getElementById(gift_id + "_image").value;
        var title = document.getElementById(gift_id + "_title").value;
        var price = document.getElementById(gift_id + "_price").value;
        var gst = document.getElementById(gift_id + "_gst").value;
        //var quantity = document.getElementById(id + "_quantity").value;
        var quantity = 1;

        /*
         alert(id);
         alert(title);
         alert(price);
         alert(image);
         alert(gst);
         */
        $.ajax({
            type: 'post',
            url: '<?php echo base_url() ?>gift/store',
            data: {
                gift_id: gift_id,
                image: image,
                title: title,
                price: price,
                quantity: quantity,
                gst: gst
            },
            success: function (response) {
                //alert('response: '+response);
                //document.getElementById("total_items").value = response;
                //document.getElementById("total_items").innerHTML = response;
                alert('Item has been added to the cart');
            }
        });

    }

    //alert(this.brand_condition + ' AND ' + food_type_condition);
    //condition = condition.join(" AND ");

</script>

<!-- signin Model -->
<?php $this->load->view('signin'); ?>

<!--signup modal-->
<?php $this->load->view('signup'); ?>
<!-- banner -->

<!-- //banner -->

<!-- top Products -->



<title><?php echo $this->config->item('app_name') ?></title>





<div class="ads-grid">



    <div class="container">

        <?php if ($this->session->userdata('msg') != null) { ?>
            <div class="alert alert-success"><?php echo $this->session->userdata('msg') ?></div>
        <?php } ?>

        <!-- tittle heading -->
        <h3 class="tittle-w3l">Our Gift Items
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <!-- product left -->

        <!-- //product left -->
        <!-- product right -->
        <div class="side-bar col-md-3">

            <div class="search-hotel">
                <h3 class="agileits-sear-head">Search Here..</h3>
                <form action="<?php echo base_url() ?>gift/search" method="post">
                    <input type="search" placeholder="Gift name..." name="title" required="">
                    <input type="submit" value=" ">
                </form>
            </div>

            <?php if (isset($sub_category)) { ?>
                <div class="left-side">
                    <h3 class="agileits-sear-head">Sub Category</h3>
                    <ul>
                        <?php foreach ($sub_category as $sc) {
                            ?>
                            <li>
                                <input type="checkbox" name="sub_category[]" class="checked" onchange="filter_by_sub_category()" value="<?php echo $sc->sub_category_id ?>">
                                <span class="span"><?php echo $sc->sub_category_name ?></span>
                            </li>        
                        <?php }
                        ?>


                    </ul>
                </div>
            <?php } ?>

        </div>
        <div class="agileinfo-ads-display col-md-9">
            <div class="wrapper">
                <!-- first section (nuts) -->
                <div class="product-sec1-" id="gift">
                    <!--<h3 class="heading-tittle">Nuts</h3>-->
                    <?php foreach ($gift as $g) { ?>
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="<?php echo base_url() . $g->image ?>" alt="">

                                </div>
                                <div class="item-info-product ">
                                    <h4>
                                        <?php echo $g->title ?>
                                    </h4>
                                    <div class="info-product-price">
                                        <span class="item_price"><span class="fa fa-rupee"></span> <?php echo $g->price ?></span>
                                    </div>
                                    <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">

                                        <input type="hidden" id="<?php echo $g->gift_id ?>_title" value="<?php echo $g->title ?>">
                                        <input type="hidden" id="<?php echo $g->gift_id ?>_price" value="<?php echo $g->price ?>">
                                        <input type="hidden" id="<?php echo $g->gift_id ?>_image" value="<?php echo $g->image ?>">
                                        <input type="hidden" id="<?php echo $g->gift_id ?>_gst" value="<?php echo $g->gst ?>">
                                        <input type="button" onclick="addToCart(<?php echo $g->gift_id ?>)" value="Add to cart" class="button" />

                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php } ?>




                    <div class="clearfix"></div>
                </div>

            </div>
        </div>
        <!-- //product right -->
    </div>
</div>
