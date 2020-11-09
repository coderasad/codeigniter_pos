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
        <h1>Add Purchase</h1>
        <small>Add new Purchase</small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('purchase') ?>">Purchase</a></li>
            <li class="active">Add Purchase</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('purchase') ?>" class="btn btn-info">Manage Purchase</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Add Purchase</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="<?php echo base_url('purchase/store') ?>" class="form-vertical" id="insert_purchase" name="insert_purchase" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="supplier_sss" class="col-sm-3 col-form-label">Supplier<i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-6">
                                        <select name="supplier_id" id="supplier_sss" class="form-control " required="" tabindex="1"> 
                                            <option value=" ">Select One</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                    </div>
                                </div> 
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label">Purchase Date<i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" tabindex="2" class="form-control datepicker hasDatepicker" name="purchase_date" value="2020-09-26" id="date" required="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="invoice_no" class="col-sm-3 col-form-label">Purchase No<i class="text-danger">*</i>
                                    </label>
                                    <div class="col-sm-9">
                                        <input type="text" tabindex="3" class="form-control" name="chalan_no" placeholder="Purchase No" id="invoice_no" required="">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="adress" class="col-sm-4 col-form-label">Details                                    </label>
                                    <div class="col-sm-8">
                                        <textarea class="form-control" tabindex="4" id="adress" name="purchase_details" placeholder=" Details" rows="1"></textarea>
                                    </div>
                                </div> 
                            </div>
                        </div>

                        <div class="table-responsive" style="margin-top: 10px">
                            <table class="table table-bordered table-hover" id="purchaseTable">
                                <thead>
                                    <tr>
                                        <th class="text-center">Item Information<i class="text-danger">*</i></th> 
                                        <th class="text-center">Stock/Qnt</th>
                                        <th class="text-center">Carton <i class="text-danger">*</i></th>
                                        <th class="text-center">Item/Cartoon </th>
                                        <th class="text-center">Quantity </th>
                                        <th class="text-center">Rate<i class="text-danger">*</i></th>
                                        <th class="text-center">Total</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="addPurchaseItem">
                                    <tr>
                                        <td class="span3 supplier_load">
                                            Please Select Supplier                                            <!-- <select class="form-control supplier"></select> -->
                                        </td>

                                        <td>
                                            <input type="text" id="" class="form-control text-right stock_ctn_1" placeholder="Stock/Qnt" readonly="">
                                        </td>

                                        <td class="text-right">
                                            <input type="number" name="cartoon[]" required="" id="qty_item_1" class="form-control text-right qty_calculate" placeholder="0.00" value="" min="0" tabindex="6">
                                        </td>

                                        <td class="text-right">   
                                            <input type="text" name="cartoon_item[]" value="" readonly="readonly" id="ctnqntt_1" class="form-control ctnqntt1 text-right" placeholder="Item/Cartoon">
                                        </td>

                                        <td class="text-right">
                                            <input type="text" name="product_quantity[]" readonly="readonly" id="total_qntt_1" class="form-control text-right" placeholder="0.00">
                                        </td>
                                        <td class="">
                                            <input type="text" name="product_rate[]" onkeyup="quantity_calculate(1);" onchange="quantity_calculate(1);" id="price_item_1" class="form-control price_item1 text-right" placeholder="0.00" value="" min="0" tabindex="7">
                                        </td>
                                        <td class="text-right">
                                            <input class="form-control total_price text-right" type="text" name="total_price[]" id="total_price_1" value="0.00" tabindex="-1" readonly="readonly">
                                        </td>
                                        <td>
                                            <button style="text-align: right;" class="btn btn-danger red" type="button" value="Delete" onclick="deleteRow(this)" tabindex="8">Delete</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2">
                                            <input type="button" id="add-invoice-item" class="btn btn-info" name="add-invoice-item" onclick="addPurchaseInputField('addPurchaseItem');" value="Add New Item" tabindex="9">

                                            <input type="hidden" name="baseUrl" class="baseUrl" value="https://wholesalenew.bdtask.com/newholesale/">
                                        </td>
                                        <td style="text-align:right;" colspan="4"><b>Grand Total:</b></td>
                                        <td class="text-right">
                                            <input type="text" id="grandTotal" tabindex="-1" class="text-right form-control" name="grand_total_price" value="0.00" readonly="readonly">
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <input type="submit" id="add-purchase" class="btn custom_btn custom_fontcolor btn-large" name="add-purchase" value="Submit" tabindex="10">
                                <input type="submit" value="Submit And Add Another One" name="add-purchase-another" class="btn btn-large btn-success" id="add-purchase-another" tabindex="11">
                            </div>
                        </div>
                        </form> 
                </div>
            </div>
        </div>
    </div>
</section>