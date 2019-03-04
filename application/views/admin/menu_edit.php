<title>Menu</title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Menu</h2>

    </header>
    
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Edit Menu</h2>
                </header>
                <div class="panel-body">
                    <form class="form-horizontal form-bordered" method="post" action="<?php echo base_url() ?>admin/menu/update">
                        <div class="form-group">
                            <div class="col-md-4">
                                <input type="hidden" name="menu_id" value="<?php echo $menu->menu_id ?>" />
                                <input type="text" class="form-control input-sm mb-md" name="menu_name" placeholder="Enter menu name" value="<?php echo $menu->menu_name ?>">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary">Submit</button>
                                <a href="<?php echo base_url() ?>admin/menu" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </section>    
        </div>
    </div>
</section>
