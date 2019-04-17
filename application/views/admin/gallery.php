


<title>Gift Item Gallery | <?php echo $this->config->item('app_name'); ?></title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gift Item Gallery</h2>

    </header>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Upload Gallery for <?php echo $gift->title ?></h2>
                </header>
                <div class="panel-body">
                    <form action="<?php echo base_url() ?>admin/gift/upload_gallery" class="dropzone dz-square" id="dropzone-example">
                        <input type="hidden" name="gift_id" value="<?php echo $gift->gift_id ?>" />
                    </form>
                    
                </div>
                
            </section>    
            
        </div>
    </div>
    <section class="content-with-menu content-with-menu-has-toolbar media-gallery">

        <div class="content-with-menu-container">
            <div class="inner-body mg-main">

                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                    <?php
                    foreach ($gift_gallery as $gg) {
                        ?>
                        <div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
                            <div class="thumbnail">
                                <div class="thumb-preview">
                                    <a class="thumb-image" href="<?php echo base_url() . $gg->image ?>">
                                        <img src="<?php echo base_url() . $gg->image ?>" class="img-responsive" alt="Project">
                                    </a>
                                    <div class="mg-thumb-options">
                                        <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                        <div class="mg-toolbar">
                                            <div class="mg-group pull-right">
                                                <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                    <i class="fa fa-caret-up"></i>
                                                </button>
                                                <ul class="dropdown-menu mg-menu" role="menu">
                                                    <li>
                                                        <a href="#"><i class="fa fa-trash-o"></i> Delete</a>
                                                    </li>                                                
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

</section>

