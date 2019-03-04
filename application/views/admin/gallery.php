<link rel="stylesheet" href="<?php echo base_url() ?><?php echo base_url() ?>assets/admin/admin/vendor/dropzone/css/basic.css" />
<link rel="stylesheet" href="<?php echo base_url() ?><?php echo base_url() ?>assets/admin/admin/vendor/dropzone/css/dropzone.css" />
<script src="<?php echo base_url() ?><?php echo base_url() ?>assets/admin/admin/vendor/dropzone/dropzone.js"></script>
<title>Gift Item</title>
<section role="main" class="content-body">
    <header class="page-header">
        <h2>Gift Item</h2>

    </header>
    <?php if ($this->session->flashdata('msg') != null) {
        ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
        </div>


        <?php
    } else if ($this->session->flashdata('err') != null) {
        ?>
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong><?php echo $this->session->flashdata('err'); ?></strong>
        </div>    

        <?php
    }
    ?>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    <h2 class="panel-title">Upload Gallery</h2>
                </header>
                <div class="panel-body">
                    <div class="form-horizontal form-bordered">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label><strong>Category </strong><br /><?php echo $category->category_name; ?></label>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Sub Category </strong><br /><?php echo $sub_category->sub_category_name; ?></label>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Gift Type Name </strong><br /><?php echo $gift_type->gift_type_name; ?></label>
                            </div>
                            <div class="col-md-3">
                                <label><strong>Gift Name </strong><br /><?php echo $gift->title; ?></label>
                            </div>
                        </div>
                    </div>
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

                <div class="inner-toolbar clearfix">
                    <ul>
                        <li>
                            <a href="#" id="mgSelectAll"><i class="fa fa-check-square"></i> <span data-all-text="Select All" data-none-text="Select None">Select All</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pencil"></i> Edit</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-trash-o"></i> Delete</a>
                        </li>
                        <li class="right" data-sort-source data-sort-id="media-gallery">
                            <ul class="nav nav-pills nav-pills-primary">
                                <li>
                                    <label>Filter:</label>
                                </li>
                                <li class="active">
                                    <a data-option-value="*" href="#all">All</a>
                                </li>
                                <li>
                                    <a data-option-value=".document" href="#document">Documents</a>
                                </li>
                                <li>
                                    <a data-option-value=".image" href="#image">Images</a>
                                </li>
                                <li>
                                    <a data-option-value=".video" href="#video">Videos</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="row mg-files" data-sort-destination data-sort-id="media-gallery">
                    <div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo base_url() ?>assets/admin/images/projects/project-1.jpg">
                                    <img src="<?php echo base_url() ?>assets/admin/images/projects/project-1.jpg" class="img-responsive" alt="Project">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-option checkbox-custom checkbox-inline">
                                            <input type="checkbox" id="file_1" value="1">
                                            <label for="file_1">SELECT</label>
                                        </div>
                                        <div class="mg-group pull-right">
                                            <a href="#">EDIT</a>
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mg-title text-semibold">SEO<small>.png</small></h5>
                            <div class="mg-description">
                                <small class="pull-left text-muted">Design, Websites</small>
                                <small class="pull-right text-muted">07/10/2014</small>
                            </div>
                        </div>
                    </div>
                    <div class="isotope-item col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo base_url() ?>assets/admin/images/projects/project-2.jpg">
                                    <img src="<?php echo base_url() ?>assets/admin/images/projects/project-2.jpg" class="img-responsive" alt="Project">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-option checkbox-custom checkbox-inline">
                                            <input type="checkbox" id="file_2" value="1">
                                            <label for="file_2">SELECT</label>
                                        </div>
                                        <div class="mg-group pull-right">
                                            <a href="#">EDIT</a>
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mg-title text-semibold">Blog<small>.png</small></h5>
                            <div class="mg-description">
                                <small class="pull-left text-muted">PSDs, Projects</small>
                                <small class="pull-right text-muted">07/10/2014</small>
                            </div>
                        </div>
                    </div>
                    <div class="isotope-item video col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo base_url() ?>assets/admin/images/projects/project-5.jpg">
                                    <img src="<?php echo base_url() ?>assets/admin/images/projects/project-5.jpg" class="img-responsive" alt="Project">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-option checkbox-custom checkbox-inline">
                                            <input type="checkbox" id="file_3" value="1">
                                            <label for="file_3">SELECT</label>
                                        </div>
                                        <div class="mg-group pull-right">
                                            <a href="#">EDIT</a>
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mg-title text-semibold">Friends<small>.png</small></h5>
                            <div class="mg-description">
                                <small class="pull-left text-muted">Projects, Vacation</small>
                                <small class="pull-right text-muted">07/10/2014</small>
                            </div>
                        </div>
                    </div>
                    <div class="isotope-item image col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo base_url() ?>assets/admin/images/projects/project-4.jpg">
                                    <img src="<?php echo base_url() ?>assets/admin/images/projects/project-4.jpg" class="img-responsive" alt="Project">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-option checkbox-custom checkbox-inline">
                                            <input type="checkbox" id="file_4" value="1">
                                            <label for="file_4">SELECT</label>
                                        </div>
                                        <div class="mg-group pull-right">
                                            <a href="#">EDIT</a>
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mg-title text-semibold">Life<small>.png</small></h5>
                            <div class="mg-description">
                                <small class="pull-left text-muted">Images, Photos</small>
                                <small class="pull-right text-muted">07/10/2014</small>
                            </div>
                        </div>
                    </div>
                    <div class="isotope-item video col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo base_url() ?>assets/admin/images/projects/project-5.jpg">
                                    <img src="<?php echo base_url() ?>assets/admin/images/projects/project-5.jpg" class="img-responsive" alt="Project">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-option checkbox-custom checkbox-inline">
                                            <input type="checkbox" id="file_5" value="1">
                                            <label for="file_5">SELECT</label>
                                        </div>
                                        <div class="mg-group pull-right">
                                            <a href="#">EDIT</a>
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mg-title text-semibold">Poetry<small>.png</small></h5>
                            <div class="mg-description">
                                <small class="pull-left text-muted">Websites</small>
                                <small class="pull-right text-muted">07/10/2014</small>
                            </div>
                        </div>
                    </div>
                    <div class="isotope-item document col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo base_url() ?>assets/admin/images/projects/project-6.jpg">
                                    <img src="<?php echo base_url() ?>assets/admin/images/projects/project-6.jpg" class="img-responsive" alt="Project">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-option checkbox-custom checkbox-inline">
                                            <input type="checkbox" id="file_6" value="1">
                                            <label for="file_6">SELECT</label>
                                        </div>
                                        <div class="mg-group pull-right">
                                            <a href="#">EDIT</a>
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mg-title text-semibold">Fun<small>.png</small></h5>
                            <div class="mg-description">
                                <small class="pull-left text-muted">Documentation, Projects</small>
                                <small class="pull-right text-muted">07/10/2014</small>
                            </div>
                        </div>
                    </div>
                    <div class="isotope-item col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo base_url() ?>assets/admin/images/projects/project-7.jpg">
                                    <img src="<?php echo base_url() ?>assets/admin/images/projects/project-7.jpg" class="img-responsive" alt="Project">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-option checkbox-custom checkbox-inline">
                                            <input type="checkbox" id="file_7" value="1">
                                            <label for="file_7">SELECT</label>
                                        </div>
                                        <div class="mg-group pull-right">
                                            <a href="#">EDIT</a>
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mg-title text-semibold">Family<small>.png</small></h5>
                            <div class="mg-description">
                                <small class="pull-left text-muted">Documentation</small>
                                <small class="pull-right text-muted">07/10/2014</small>
                            </div>
                        </div>
                    </div>
                    <div class="isotope-item image col-sm-6 col-md-4 col-lg-3">
                        <div class="thumbnail">
                            <div class="thumb-preview">
                                <a class="thumb-image" href="<?php echo base_url() ?>assets/admin/images/projects/project-1.jpg">
                                    <img src="<?php echo base_url() ?>assets/admin/images/projects/project-1.jpg" class="img-responsive" alt="Project">
                                </a>
                                <div class="mg-thumb-options">
                                    <div class="mg-zoom"><i class="fa fa-search"></i></div>
                                    <div class="mg-toolbar">
                                        <div class="mg-option checkbox-custom checkbox-inline">
                                            <input type="checkbox" id="file_8" value="1">
                                            <label for="file_8">SELECT</label>
                                        </div>
                                        <div class="mg-group pull-right">
                                            <a href="#">EDIT</a>
                                            <button class="dropdown-toggle mg-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa fa-caret-up"></i>
                                            </button>
                                            <ul class="dropdown-menu mg-menu" role="menu">
                                                <li><a href="#"><i class="fa fa-download"></i> Download</a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h5 class="mg-title text-semibold">Hapiness<small>.png</small></h5>
                            <div class="mg-description">
                                <small class="pull-left text-muted">Websites</small>
                                <small class="pull-right text-muted">07/10/2014</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
