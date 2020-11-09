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
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <form action="<?php echo base_url('sell/store') ?>" class="form-vertical" method="post">
                    <div class="panel-heading">                      
                        <div class="form-group row m-0">
                            <label for="customer_name" class="col-sm-2 col-form-label"><b>Customer Name</b><i class="text-danger">*</i></label>
                            <div class="col-sm-3">                                
                                <select name="customer_id" class=" customers_id select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
                                    <option>Select Customer</option>
                                    <?php 
                                        foreach($customer as $data){
                                            echo "
                                                <option value='{$data->id}'>$data->name</option>
                                            ";
                                        }
                                    ?>
                                </select>
                                <?php if (form_error('order_no')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('order_no'); ?>
                                    </div>
                                <?php } ?>										
                            </div>
                            <label for="order_no" class="col-sm-2 col-form-label"><b>Order No</b><i class="text-danger">*</i></label>
                            <div class="col-sm-3">
                                <input type="text" readonly value='' name="order_no" class='order_no form-control'>					
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group row">                           
                            <div class="col-md-3">
                                <label for="product_id" class="col-form-label">Product Name <i class="text-danger">*</i></label>
                                <select id="product_id" name="product_id[]" class="select2 form-control mb-3 custom-select product_id" style="width: 100%; height:36px;">
                                    <option class="default_opt">Select Product</option>
                                    <?php 
                                        foreach($product as $data){
                                            echo "
                                                <option value='{$data->id}'>{$data->name}</option>
                                            ";
                                        }
                                    ?>
                                </select>									
                            </div>
                            <div class=" col-md-2" id="quantity">
                                <label for="quantity" class="col-form-label">Quantity <i class="text-danger">*</i></label>
                                <input type="number" name="quantity[]" min="0" autocomplete="off" class="quantity form-control text-right" placeholder="0 Pcs">
                            </div>
                            <div class=" col-md-2" id="price">
                                <label for="price" class="col-form-label">Price <i class="text-danger">*</i></label>
                                <input type="number" name="price[]" min="0" autocomplete="off" class="price form-control text-right" placeholder="0 Tk.">
                            </div>
                            <div class=" col-md-2" id="available_quantity">
                                <label for="available_quantity" class="col-form-label">Stock <i class="text-danger">*</i></label>
                                <input type="text" name="available_quantity" class="available_quantity form-control text-right" value="" readonly="">
                            </div>
                            <div class=" col-md-2">
                                <label for="datepicker-autoclose" class="invisible  col-form-label">Button<i class="text-danger"></i></label>
                                <input type="button" id="add-invoice-item" class="btn btn-info" name="add-invoice-item" value="Add New Item" tabindex="9">
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive col-md-8" style="margin-top: 10px">
                                <table class="table table-bordered table-hover" id="normalinvoice">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 10%;">SL.</i></th>
                                            <th class="text-center" style="width: 30%;">Product Name </i></th>
                                            <th class="text-center" style="width: 12%;">Qty</th>
                                            <th class="text-center" style="width: 15%;">Price</th>
                                            <th class="text-center" style="width: 15%;">Total</th>
                                            <th class="text-center" style="width: 13%;">Action</th>
                                        </tr>
                                    </thead>
                                    <form action="" method="post">
                                        <tbody id="addinvoiceItem">
                                            <tr class="">
                                                <td colspan="6" class="text-center">Show No Result</td>
                                            </tr>
                                        </tbody> 
                                    </form>                               
                                </table>
                            </div>
                            <div class="table-responsive col-md-4" style="margin-top: 10px">
                                <table class="table table-bordered table-hover" id="normalinvoice">
                                    <tr>
                                        <th class="text-center">Total</th>
                                        <td class="text-right"><input type="number" readonly placeholder='0 Tk.' class="border-0 form-control text-right total"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Discount</th>
                                        <td class="text-right"><input type="number" min='0' name="discount" id="discount" value='' placeholder='0 Tk.' class="border-0 form-control text-right" autocomplete="off"></td>  
                                    </tr> 
                                    <tr>
                                        <th class="text-center">Grand-Total</th>
                                        <td class="text-right"><input name='grand_total' type="number" readonly placeholder='0 Tk.' class="border-0 form-control text-right total" id="grandTotal"></td>
                                        <?php if (form_error('grand_total')) { ?>
                                            <div class="error-message">
                                                <?php echo form_error('grand_total'); ?>
                                            </div>
                                        <?php } ?>
                                    </tr>  
                                    <tr>
                                        <th class="text-center">Paid Amount</th>
                                        <td class="text-right"><input type="number" name='paid_amount' min='0' placeholder='0 Tk.' class="border-0 form-control text-right paid_amount" autocomplete="off"></td>
                                    </tr>  
                                    <tr>
                                        <th class="text-center">Due Amount</th>
                                        <td class="text-right"><input type="number" name='due_amount' readonly placeholder='0 Tk.' class="border-0 form-control text-right due_amount"></td>
                                    </tr>              
                                </table>
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</section>