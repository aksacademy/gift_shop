<!doctype html>
<html class="fixed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/dropzone/css/basic.css" />
        <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/vendor/dropzone/css/dropzone.css" />
        <script src="<?php echo base_url() ?>assets/admin/vendor/dropzone/dropzone.js"></script>

    </head>
    <body>
        <section class="body">

            <!-- start: header -->
            

            <div class="inner-wrapper">
                <!-- start: sidebar -->
                

                <section role="main" class="content-body">
                    
                    

                    

                    <div class="row">
                        <div class="col-xs-12">
                            <section class="panel">
                                <header class="panel-heading">
                                    <div class="panel-actions">
                                        <a href="#" class="fa fa-caret-down"></a>
                                        <a href="#" class="fa fa-times"></a>
                                    </div>

                                    <h2 class="panel-title">File Upload Drag'n Drop</h2>
                                </header>
                                <div class="panel-body">
                                    <form action="/upload" class="dropzone dz-square" id="dropzone-example"></form>
                                </div>
                            </section>
                        </div>
                    </div>

                </section>
            </div>

            
        </section>

        
        <script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap-markdown/js/markdown.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap-markdown/js/to-markdown.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap-markdown/js/bootstrap-markdown.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/codemirror/lib/codemirror.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/codemirror/addon/selection/active-line.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/codemirror/addon/edit/matchbrackets.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/codemirror/mode/javascript/javascript.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/codemirror/mode/xml/xml.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/codemirror/mode/htmlmixed/htmlmixed.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/codemirror/mode/css/css.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/summernote/summernote.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
        <script src="<?php echo base_url() ?>assets/admin/vendor/ios7-switch/ios7-switch.js"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="<?php echo base_url() ?>assets/admin/javascripts/theme.js"></script>

        <!-- Theme Custom -->
        <script src="<?php echo base_url() ?>assets/admin/javascripts/theme.custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="<?php echo base_url() ?>assets/admin/javascripts/theme.init.js"></script>


        <!-- Examples -->
        <script src="<?php echo base_url() ?>assets/admin/javascripts/forms/examples.advanced.form.js" /></script>

</body>
</html>