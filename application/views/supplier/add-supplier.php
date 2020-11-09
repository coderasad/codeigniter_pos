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
        <h1>Add Supplier</h1>
        <small>Add new Supplier</small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('supplier') ?>">Supplier</a></li>
            <li class="active">Add Supplier</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('supplier') ?>" class="btn btn-info">Manage Supplier</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Add Supplier </h4>
                    </div>
                </div>
                <form action="<?php echo base_url('supplier/store') ?>" method="post" novalidate >
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="supplier_name" class="col-sm-3 col-form-label text-right">Supplier Name <i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="supplier_name" id="supplier_name" type="text" placeholder="Supplier Name" required="" tabindex="1"  value="<?php echo set_value('Supplier_name') ?>">
                                <?php if (form_error('supplier_name')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('supplier_name'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobile" class="col-sm-3 col-form-label text-right">Supplier Mobile<i class="text-danger">*</i></label></label>
                            <div class="col-sm-6">
                                <input class="form-control" name="mobile" id="mobile" type="text" placeholder="Supplier Mobile" min="0" tabindex="3" value="<?php echo set_value('mobile') ?>">
                                <?php if (form_error('mobile')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('mobile'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="brand_id" class="col-sm-3 col-form-label text-right">Brand Name<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                                <select class="form-control" id="brand_id" name='brand_id'>                                    
                                    <option value="0">Select Brand</option>
                                    <?php  
                                        foreach($brand as $data){?>
                                            <option value="<?php echo $data->id?>"><?php echo $data->name?></option>
                                        <?php }
                                    ?>
                                    <?php if (form_error('brand_id')) { ?>
                                        <div class="error-message">
                                            <?php echo form_error('brand_id'); ?>
                                        </div>
                                    <?php } ?>
                                </select>                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="test" class="col-sm-3 col-form-label text-right">Category Name<i class="text-danger">*</i></label>
                            <div class="col-sm-6">
                            <select class="test" id="test" name='category_id' multiple="multiple">
                                <?php  
                                    foreach($category as $data){?>
                                        <option value="<?php echo $data->id?>"><?php echo $data->name?></option>
                                    <?php }
                                ?>
                            </select>  
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address " class="col-sm-3 col-form-label text-right">Supplier Address</label>
                            <div class="col-sm-6">
                                <textarea class="form-control" name="address" id="address " rows="3" placeholder="Supplier Address" tabindex="4"><?php echo set_value('address') ?></textarea>                               
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="due_balance" class="col-sm-3 col-form-label text-right">Opening Balance</label>
                            <div class="col-sm-6">
                                <input class="form-control" name="due_balance" id="due_balance" type="number" placeholder="Previous Balance" value="<?php echo set_value('due_balance') ?>">                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-text-input" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-6">
                                <input type="submit" id="add-Supplier" class="btn btn-info" name="add-Supplier" value="Save">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>