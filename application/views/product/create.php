<!-- alert message here  -->
<?php
$error_msg = $this->session->flashdata('error_msg');
$success_msg = $this->session->flashdata('success_msg');
if ($error_msg) {
?>
    <div class="alert alert-danger alert-dismissible fade show ar_model" role="alert">
        <strong><?php echo $error_msg ?> !</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
if ($success_msg) {
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
        <h1>Product</h1>
        <small>Add new product</small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('product') ?>">Product</a></li>
            <li class="active">New Product</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('product') ?>" class="btn btn-info">Manage Product</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Add new product</h4>
                    </div>
                </div>
                <form action="<?php echo base_url('product/store') ?>" novalidate method="post" class="form-vertical" id="insert_product" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label">Product Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input class="form-control" name="name" type="text" id="name" placeholder="Product Name" value="<?php echo set_value('name') ?>">
                                        <?php if (form_error('name')) { ?>
                                            <div class="error-message">
                                                <?php echo form_error('name'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="qr_code" class="col-sm-4 col-form-label">Barcode/QR-code <i class="text-danger"></i></label>
                                    <div class="col-sm-8">
                                        <input value="<?php echo set_value('qr_code') ?>" class="form-control" name="qr_code" type="text" id="qr_code" placeholder="Barcode/QR-code">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="category_id" class="col-sm-4 col-form-label">Category Name<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" required="" id="category_id" name="category_id">
                                            <option value="">Select Category</option>
                                            <?php
                                            foreach ($category as $data) { ?>
                                                <option value="<?php echo $data->id ?>"><?php echo $data->name ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        <?php if (form_error('category_id')) { ?>
                                            <div class="error-message">
                                                <?php echo form_error('category_id'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="brand_id" class="col-sm-4 col-form-label">Brand Name<i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="brand_id" required="" name="brand_id">
                                            <option value="">Select Brand</option>
                                            <?php
                                            foreach ($brand as $data) { ?>
                                                <option value="<?php echo $data->id ?>"><?php echo $data->name ?></option>
                                            <?php }
                                            ?>
                                        </select>
                                        <?php if (form_error('brand_id')) { ?>
                                            <div class="error-message">
                                                <?php echo form_error('brand_id'); ?>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="details" class="col-sm-4 col-form-label">Details</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" name="details" id="details" rows="3" placeholder="Details" tabindex="2"><?php echo set_value('details') ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Image </label>
                                            <img id="img_show" class="col-sm-2" src="" alt="">
                                            <div class="col-sm-8">
                                                <input id="imgInp" type="file" name="image" class="form-control" id="image" tabindex="4">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <!-- <th class="text-center">Product Per Cartoon <i class="text-danger">*</i></th> -->
                                        <th class="text-center">Sell Price <i class="text-danger">*</i></th>
                                        <th class="text-center">Supplier Price <i class="text-danger">*</i></th>
                                        <th class="text-center">Model <i class="text-danger">*</i></th>
                                        <th class="text-center">Quantity <i class="text-danger">*</i></th>
                                        <th class="text-center">Supplier <i class="text-danger">*</i></th>
                                    </tr>
                                </thead>
                                <tbody id="form-actions">
                                    <tr class="">
                                        <!-- <td class="">
                                            <input class="form-control text-right" name="" type="number" required="" placeholder="Product Per Cartoon" tabindex="6" min="0">
                                        </td> -->
                                        <td class="">
                                            <input class="form-control text-right" name="sell_price" type="number" required="" placeholder="Sell Price" tabindex="6" min="0" value="<?php echo set_value('sell_price') ?>">
                                            <?php if (form_error('sell_price')) { ?>
                                                <div class="error-message">
                                                    <?php echo form_error('sell_price'); ?>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="">
                                            <input type="number" tabindex="7" class="form-control text-right" name="supplier_price" placeholder="Supplier Price" required="" min="0" value="<?php echo set_value('supplier_price') ?>">
                                            <?php if (form_error('supplier_price')) { ?>
                                                <div class="error-message">
                                                    <?php echo form_error('supplier_price'); ?>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <input type="text" tabindex="8" class="form-control" name="model" placeholder="Model" value="<?php echo set_value('model') ?>">
                                            <?php if (form_error('model')) { ?>
                                                <div class="error-message">
                                                    <?php echo form_error('model'); ?>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <input type="number" tabindex="8" class="form-control text-right" name="quantity" placeholder="Quantity" value="<?php echo set_value('quantity') ?>">
                                            <?php if (form_error('quantity')) { ?>
                                                <div class="error-message">
                                                    <?php echo form_error('quantity'); ?>
                                                </div>
                                            <?php } ?>
                                        </td>
                                        <td class="text-right">
                                            <select name="supplier_id" class="form-control" required="" tabindex="9">
                                                <option value="">Select Supplier</option>
                                                <?php
                                                foreach ($supplier as $data) { ?>
                                                    <option value="<?php echo $data->id ?>"><?php echo $data->name ?></option>
                                                <?php }
                                                ?>
                                            </select>
                                            <?php if (form_error('supplier_id')) { ?>
                                                <div class="error-message">
                                                    <?php echo form_error('supplier_id'); ?>
                                                </div>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add-product" class="btn btn-info custom_fontcolor btn-large" name="add-product" value="Save" tabindex="10">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>