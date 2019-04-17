<!-- signin Model -->
<?php $this->load->view('signin'); ?>

<!--signup modal-->
<?php $this->load->view('signup'); ?>
<!-- banner -->

<!-- //banner -->

<!-- top Products -->



<title><?php echo $this->config->item('app_name') ?></title>
<div class="contact-w3l">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Login
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        <!-- contact -->
        <div class="contact agileits">
            
            <div class="contact-agileinfo">
                
                <div class="contact-form wthree">
                    <?php if ($this->session->flashdata('err') != null) {
                        ?>
                            <div class="alert alert-danger"><?php echo $this->session->flashdata('err') ?></div>
                            <?php
                    } ?>
                    
                    <form action="<?php echo base_url().'login/validate' ?>" method="post">
                        <div class="">
                            <input class="form-control" type="email" name="email" placeholder="Email" required="">
                        </div>
                        <div class="">
                            <input class="form-control" type="password" name="password" placeholder="Password" required="">
                        </div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
                
            </div>
        </div>
        <!-- //contact -->
    </div>
</div>
