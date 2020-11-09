<!-- alert message here  -->
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
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header-icon">
        <i class="ti-notepad"></i>
    </div>
    <div class="header-title">
        <h1>Add Customer</h1>
        <small>Add new customer</small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('customer') ?>">Customer</a></li>
            <li class="active">Add Customer</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('customer') ?>" class="btn btn-info">Manage Customer</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Add Customer </h4>
                    </div>
                </div>
                <form action="<?php echo base_url('customer/store') ?>" method="post" novalidate >
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="customer_name" class="col-sm-3 col-form-label text-right">Customer Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="customer_name" id="customer_name" type="text" placeholder="Customer Name" required="" tabindex="1"  value="<?php echo set_value('customer_name') ?>">
                                <?php if (form_error('customer_name')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('customer_name'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label text-right">Customer Email<i class="text-danger">*</i></label></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="email" id="email" type="email" placeholder="Customer Email" tabindex="2" value="<?php echo set_value('email') ?>">
                                <?php if (form_error('email')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-3 col-form-label text-right">Customer Mobile<i class="text-danger">*</i></label></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="mobile" id="mobile" type="text" placeholder="Customer Mobile" min="0" tabindex="3" value="<?php echo set_value('mobile') ?>">
                                <?php if (form_error('mobile')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('mobile'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address " class="col-sm-3 col-form-label text-right">Customer Address</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="address" id="address " rows="3" placeholder="Customer Address" tabindex="4"><?php echo set_value('address') ?></textarea>                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="due_balance" class="col-sm-3 col-form-label text-right">Opening Balance</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="opening_balance" id="opening_balance" type="number" placeholder="Opening Balance" value="<?php echo set_value('opening_balance') ?>">                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-customer" class="btn btn-info" name="add-customer" value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>