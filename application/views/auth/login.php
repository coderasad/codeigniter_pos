<!-- alert message here========== -->
<?php                                               
    $error_msg = $this->session->flashdata('error_msg'); 
    $success_msg = $this->session->flashdata('success_msg'); 
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
    if($success_msg){
        ?>
            <div class="alert alert-dismissible ar_model bg-info fade show text-white" role="alert">
                <strong><?php echo $success_msg ?> !</strong> 
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
                <div class="offset-6 col-sm-4">                
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
                                <h4>Admin Login </h4>
                            </div>
                        </div>
                        <form action="<?php echo base_url('login/check') ?>" method="post" novalidate>
                            <div class="panel-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <!-- <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email') ?>"> -->
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="admin@gmail.com">
                                        <?php if (form_error('email')) { ?>
                                            <div class="error-message">
                                                <?php echo form_error('email'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <!-- <input name="password" placeholder="Password" class="form-control" type="password"> -->
                                        <input name="password" placeholder="Password" class="form-control" type="password" value="Test@123">
                                        <?php if (form_error('password')) { ?>
                                            <div class="error-message">
                                                <?php echo form_error('password'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div> 
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="checkbox" name="remember_me" id="" class="mr-2">Remember me
                                        <small><a class="btn-link float-right" href="<?php echo base_url('reset-password')?>">Forget Your Password?</a></small>
                                    </div>
                                </div>                        
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn bg-orange btn-js">Login</button>
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