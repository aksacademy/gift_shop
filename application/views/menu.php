<div class="ban-top">
    <div class="container">
        <!--<div class="agileits-navi_search">
            <form action="#" method="post">
                <select id="agileinfo-nav_search" name="agileinfo_search" required="">
                    <option value="">All Categories</option>
                    <option value="Kitchen">Kitchen</option>
                    <option value="Household">Household</option>
                    <option value="Snacks &amp; Beverages">Snacks & Beverages</option>
                    <option value="Personal Care">Personal Care</option>
                    <option value="Gift Hampers">Gift Hampers</option>
                    <option value="Fruits &amp; Vegetables">Fruits & Vegetables</option>
                    <option value="Baby Care">Baby Care</option>
                    <option value="Soft Drinks &amp; Juices">Soft Drinks & Juices</option>
                    <option value="Frozen Food">Frozen Food</option>
                    <option value="Bread &amp; Bakery">Bread & Bakery</option>
                    <option value="Sweets">Sweets</option>
                </select>
            </form>
        </div>-->
        <div class="top_nav_left">
            <!--<nav class="navbar navbar-default">-->
            <nav class="">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                                aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active">
                                <a class="nav-stylehead" href="<?php echo base_url() ?>">Home
                                </a>
                            </li>

                            <?php
                            foreach ($menu as $m) {
                                ?>
                                <li class="dropdown">
                                    <a class="nav-stylehead dropdown-toggle" href="#" data-toggle="dropdown">
                                        <?php echo $m->menu_name ?>
                                        <b class="caret"></b>
                                    </a>
                                    <ul class="dropdown-menu agile_short_dropdown">
                                        <?php
                                        foreach ($category as $c) {
                                            if ($m->menu_id == $c->menu_id) {
                                                ?>
                                                <li>
                                                    <a href="<?php echo base_url() ?>gift?category=<?php echo $c->category_id ?>"><?php echo $c->category_name ?></a>
                                                </li>
                                                <?php
                                            }
                                            ?>

                                        <?php } ?>      
                                    </ul>
                                </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>