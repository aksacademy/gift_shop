
<!-- start: sidebar -->
<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            <?php echo $this->config->item('app_name') ?>
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li>
                        <a href="<?php echo base_url() ?>admin/dashboard">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/deliverable_pincode">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>Deliverable Area</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/menu">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>Menu</span>
                        </a>
                    </li>

                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Category</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url() ?>admin/category">
                                    Main Category
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/sub/category">
                                    Sub Category
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Gift</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url() ?>admin/gift/add">
                                    Add Gift
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/gift">
                                    Gift List
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-parent">
                        <a>
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Order</span>
                        </a>
                        <ul class="nav nav-children">
                            <li>
                                <a href="<?php echo base_url() ?>admin/order/new_">
                                    New Order
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/order/pending">
                                    Pending Order
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/order/completed">
                                    Completed Order
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>admin/order/canceled">
                                    Canceled Order
                                </a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </nav>

            

            
        </div>

    </div>

</aside>
<!-- end: sidebar -->