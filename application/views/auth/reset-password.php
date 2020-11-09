<?php                                               
    $error_msg = $this->session->flashdata('error_msg'); 
    if($error_msg){
        ?>
            <div class="alert alert-danger alert-dismissible fade show ar_model" role="alert">
            <strong><?php echo $error_msg ?> !</strong> 
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php
    }                       
?>
<!-- end page title end breadcrumb -->
<div class="ar-flex-center">
    <div class="">
        <section class="content">
            <div class="row">
                <div class="offset-4 col-sm-4">                
                    <?php 
                        if(isset($msg) && $msg){?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong><?php echo $msg ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>  
                        <?php }
                    ?>
                    <div class="panel panel-bd lobidrag">
                        <div class="panel-heading">
                            <div class="panel-title text-center">
                                <h4>Your Email </h4>
                            </div>
                        </div>
                        <form action="<?php echo base_url('check-account') ?>" method="post" novalidate>
                            <div class="panel-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email') ?>">
                                        <?php if (form_error('email')) { ?>
                                            <div class="error-message">
                                                <?php echo form_error('email'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>                      
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn bg-orange btn-js">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>