

<title>Dashboard | <?php echo $this->config->item('app_name') ?></title>

<section role="main" class="content-body">
    <header class="page-header">
        <h2>Dashboard</h2>

        
    </header>

    
    <div class="row">
        
        <div class="col-md-6 col-lg-12 col-xl-6">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-primary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-primary">
                                        <i class="fa fa-life-ring"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">New Order</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_new_order ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?php echo base_url().'admin/order/new_' ?>" class="text-muted text-uppercase">(view all)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-secondary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-secondary">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Pending Order</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_pending_order ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?php echo base_url().'admin/order/pending' ?>" class="text-muted text-uppercase">(VIEW ALL)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-tertiary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-tertiary">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Completed Orders</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_completed_order ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?php echo base_url().'admin/order/completed' ?>" class="text-muted text-uppercase">(VIEW ALL)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <section class="panel panel-featured-left panel-featured-quartenary">
                        <div class="panel-body">
                            <div class="widget-summary">
                                <div class="widget-summary-col widget-summary-col-icon">
                                    <div class="summary-icon bg-quartenary">
                                        <i class="fa fa-shopping-cart"></i>
                                    </div>
                                </div>
                                <div class="widget-summary-col">
                                    <div class="summary">
                                        <h4 class="title">Canceled Order</h4>
                                        <div class="info">
                                            <strong class="amount"><?php echo $total_canceled_order ?></strong>
                                        </div>
                                    </div>
                                    <div class="summary-footer">
                                        <a href="<?php echo base_url().'admin/order/canceled' ?>" class="text-muted text-uppercase">(VIEW ALL)</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
