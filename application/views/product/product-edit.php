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
        <h1>Product Edit</h1>
        <small>Product Edit</small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('product') ?>">Product</a></li>
            <li class="active">Product Edit</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('product') ?>" class="btn btn-info">Manage Product</a>
                <a href="<?php echo base_url('product/add') ?>" class="btn btn-success">Add Product</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Product Edit </h4>
                    </div>
                </div>
                <?php 
                    foreach($product as $data){?>
                        <form action="<?php echo base_url('product/update/').$data->id ?>" method="post" novalidate >                    
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="name" class="col-sm-4 col-form-label">Product Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <input value="<?php echo $data->name ?>" class="form-control" required="" name="name" type="text" id="name" placeholder="Product Name">
                                        </div>                                        
                                    </div>
                                </div> 
                                <div class="col-sm-6">
                                    <div class="form-group row">                                        
                                        <label for="qr_code" class="col-sm-4 col-form-label">Barcode/QR-code <i class="text-danger"></i></label>
                                        <div class="col-sm-8">
                                            <input value="<?php echo $data->qr_code ?>" class="form-control" name="qr_code" type="text" id="qr_code" placeholder="Barcode/QR-code">
                                        </div>                                      
                                    </div>
                                </div> 
                            </div> 

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group row">
                                        <label for="category_id"  class="col-sm-4 col-form-label">Category Name<i class="text-danger">*</i></label>
                                        <div class="col-sm-8">
                                            <select class="form-control" required="" id="category_id" name="category_id">
                                                <option value="">Select Category</option>
                                                <?php  
                                                    foreach($category as $cdata){?>
                                                        <option value="<?php echo $cdata->id?>" <?php echo ($data->category_id == $cdata->id) ? 'selected':''; ?> ><?php echo $cdata->name?></option>
                                                    <?php }
                                                ?>
                                            </select>
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
                                                    foreach($brand as $bdata){?>
                                                        <option value="<?php echo $bdata->id?>"<?php echo ($data->brand_id == $bdata->id) ? 'selected':''; ?>><?php echo $bdata->name?></option>
                                                    <?php }
                                                ?>                                            
                                            </select>
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
                                                    <textarea class="form-control" name="details" id="details" rows="3" placeholder="Details" tabindex="2"><?php echo $data->details ?></textarea>
                                                </div>
                                            </div> 
                                        </div>                                                               
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="image" class="col-sm-2 col-form-label">Image </label>
                                                <img id="img_show" class="col-sm-2" src="<?php echo base_url($data->image) ?>" alt="">
                                                <div class="col-sm-8">
                                                    <input id="imgInp" type="file" name="image" class="form-control" id="image" tabindex="4">
                                                    <input type="hidden" name='old_img' value="<?php echo $data->image ?>">
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
                                                <input value="<?php echo $data->sell_price ?>" class="form-control text-right" name="sell_price" type="number" required="" placeholder="Sell Price" tabindex="6" min="0">
                                            </td>
                                            <td class="">
                                                <input value="<?php echo $data->supplier_price ?>" type="number" tabindex="7" class="form-control text-right" name="supplier_price" placeholder="Supplier Price" required="" min="0">
                                            </td>
                                            <td class="text-right">
                                                <input value="<?php echo $data->model ?>" type="text" tabindex="8" class="form-control" name="model" placeholder="Model" required="">
                                            </td>
                                            <td class="text-right">
                                                <input value="<?php echo $data->quantity ?>" type="number" tabindex="8" class="form-control text-right" name="quantity" placeholder="Quantity" required="">
                                            </td>
                                            <td class="text-right">
                                                <select name="supplier_id" class="form-control" required="" tabindex="9">
                                                    <option value="">Select Supplier</option>
                                                    <?php  
                                                        foreach($supplier as $sdata){?>
                                                            <option value="<?php echo $sdata->id?>"<?php echo ($data->supplier_id == $sdata->id) ? 'selected':''; ?>><?php echo $sdata->name?></option>
                                                        <?php }
                                                    ?>
                                                </select>
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
                    <?php }
                ?>
            </div>
        </div>
    </div>
</section>