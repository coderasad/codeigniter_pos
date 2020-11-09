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
        <h1>Add Sell</h1>
        <small>Add New Invoice</small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('Sell') ?>">Sell</a></li>
            <li class="active">New Sell</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('Sell') ?>" class="btn btn-info">Manage Sell</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>New Sell</h4>
                    </div>
                </div>
                <form action="<?php echo base_url('sell/store') ?>" class="form-vertical" method="post">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-8" id="payment_from_old_customer" style="display: block;">
                                <div class="form-group row">
                                    <label for="customer_name" class="col-sm-3 col-form-label">Customer Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
										<select name="customer_id" class="select2 form-control mb-3 custom-select" style="width: 100%; height:36px;">
											<option>Select Customer</option>
											<?php 
												foreach($customer as $data){
													echo "
														<option value='{$data->id}'>$data->name</option>
													";
												}
											?>
										</select>										
                                    </div>
                                    <div class=" col-sm-3">
                                        <input id="new_customer_show_btn" type="button" class="btn btn-info" name="customer_confirm" value="New Customer">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8" id="payment_from_new_customer" style="display: none;">
                                <div class="form-group row">
                                    <label for="customer_name_others" class="col-sm-3 col-form-label">Customer Name <i class="text-danger">*</i></label>
                                    <div class="col-sm-6">
                                        <input autofill="off" type="text" size="100" name="customer_name_others" placeholder="Customer Name" id="customer_name_others" class="form-control">
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="button" id="old_customer_show_btn" class="btn btn-info" name="customer_confirm_others" value="Old Customer">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="customer_name_others_address" class="col-sm-3 col-form-label">Phone </label>
                                    <div class="col-sm-6">
                                        <input type="text" size="100" name="customer_name_others_address" class=" form-control" placeholder="Phone" id="customer_name_others_address">
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Date <i class="text-danger">*</i></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="sell_date" class="form-control" placeholder="mm/dd/yyyy" id="datepicker-autoclose" autocomplete="off"> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="normalinvoice">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="20%">Product Name <i class="text-danger">*</i></th>
                                        <th class="text-center" width="10%">Available Product</th>
                                        <th class="text-center" width="10%">Quantity</th>
                                        <th class="text-center" width="10%">Rate <i class="text-danger">*</i></th>
                                        <th class="text-center" width="10%">Discount/Pcs. </th>
                                        <th class="text-center" width="10%">Total</th>
                                        <th class="text-center" width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="addinvoiceItem">
                                    <tr>
                                        <td style="width: 220px">                                            
                                            <select id="product_id_1" name="product_id" class="select2 form-control mb-3 custom-select product_id" style="width: 100%; height:36px;">
                                                <option>Select Product</option>
                                                <?php 
													foreach($product as $data){
														echo "
															<option value='{$data->id}'>{$data->name}</option>
														";
													}
												?>
                                            </select>
                                        </td>
                                        <td id="available_quantity_1"> 
                                            <input type="text" name="available_quantity" class="form-control text-right" value="" readonly="">
                                        </td>
                                        <td> 
                                            <input type="number" name="quantity[]" id="quantity_1" min="0" autocomplete="off" class="total_qntt_1 form-control text-right" placeholder="0 Pcs">
                                        </td>
                                        <td style="width: 85px">
                                            <input type="number" name="rate[]" min="0" id="rate_1" placeholder="0.00" class="price_item1 price_item form-control text-right">
                                        </td>
                                        <!-- Discount -->
                                        <td>
                                            <input type="number" name="discount[]" id="discount_1" class="form-control text-right" value="" min="0" tabindex="7" placeholder="0.00">
                                        </td>

                                        <td style="width: 100px">
                                            <input class="total_price form-control text-right" type="text" name="total_price[]" id="total_price_1" value="" tabindex="-1" readonly="readonly"  placeholder="0.00">
                                        </td>

                                        <td>                                            
                                            <button style="text-align: right;" class="btn btn-danger" type="button" value="Delete">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                                
                                <tfoot>
                                    <tr>
                                        <td style="text-align:right;" colspan="5"><b>Total Discount:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="total_discount_ammount" class="form-control text-right" name="total_discount" tabindex="" value="0.00" readonly="readonly">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5" style="text-align:right;"><b>Grand Total:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" tabindex="" class="form-control text-right" name="grand_total_price" value="0.00" readonly="readonly">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <input type="button" id="add-invoice-item" class="btn btn-info" name="add-invoice-item" value="Add New Item" tabindex="9">
                                        </td>
                                        <td style="text-align:right;" colspan="4"><b>Paid Amount:</b></td>
                                        <td class="text-right">
                                            <input type="number" id="paidAmount" class="form-control text-right" name="paid_amount" min="0" value="" placeholder="0.00" tabindex="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="center">
                                            <input type="submit" id="add-invoice" class="btn btn-success" name="add-invoice" value="Submit" tabindex="">
                                            <!-- <input type="button" id="full_paid_tab" class="btn btn-warning" name="" value="Full Paid"> -->
                                        </td>
                                        <td style="text-align:right;" colspan="4"><b>Due:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="dueAmmount" class="form-control text-right" name="due_amount" value="0.00" readonly="readonly">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </form>   
            </div>
        </div>
    </div>
</section>