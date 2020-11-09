<!-- alert message here  -->
<?php                                               
    $error_msg = $this->session->flashdata('error_msg'); 
    $success_msg = $this->session->flashdata('success_msg'); 
    if($error_msg){?>
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
		<h1>Add receipt</h1>
		<small>Add new receipt</small>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
			<li class="active">Add receipt</li>
		</ol>
	</div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="m-b-10" style="float: right;">
				<a href="<?php echo base_url('customer/add') ?>" class="btn btn-success">Payment</a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="panel panel-bd lobidrag">
				<div class="panel-heading">
					<div class="panel-title">
						<h4>Add receipt</h4>
					</div>
				</div>
				<div class="panel-body">
					<form action="<?php echo base_url('transaction/store') ?>" method="POST" novalidate>
						<div class="form-group row">
							<label class="col-sm-3 col-form-label">Choose transaction</label>
							<div class="switch col-sm-3">
								<input type="radio" name="transectio_type" id="weekSW-0" value="1">
								<label for="weekSW-0" id="yes"><i class="fa fa-credit-card" aria-hidden="true"></i>
									<strong>Payment</strong></label>
								<input type="radio" name="transectio_type" id="weekSW-1" value="2" checked="checked">
								<label for="weekSW-1" id="no"><i class="fa fa-credit-card" aria-hidden="true"></i><strong> Receipt</strong></label>
							</div>	
							<label class="col-sm-2 col-form-label">Receipt No</label>
							<div class="col-sm-2">
								<input type="text" class='form-control' name="receipt_no" value="<?php echo $rand ?>" readonly>
							</div>
						</div>
						<div class="form-group row">
							<label for="first_name" class="col-sm-2 col-form-label">Date<i class="text-danger">*</i></label>
							<div class="col-sm-4">
								<input class="form-control" name="date" id="datepicker-autoclose" type="text" autocomplete="off" placeholder="mm/dd/yyyy" required="" value="" tabindex="1">
								<?php if (form_error('date')) { ?>
									<div class="error-message">
										<?php echo form_error('date'); ?>
									</div>
								<?php } ?>  
							</div>							
							<!-- Supplier payment====== -->
							<label for="description" class="col-sm-2 col-form-label supplierID">Supplier Name</label>
							<div class="col-sm-4 supplierID">
								<select name="supplier_id" class="form-control supplier_id" required="" >
									<option value="">Select Supplier</option>
									<?php
										foreach($supplier as $data){
											echo "<option value='{$data->id}'>{$data->name}</option>";
										}
									?>
								</select>
							</div>
							<!-- Customer payment====== -->
							<label for="description" class="col-sm-2 col-form-label customerID">Customer Name</label>
							<div class="col-sm-4 customerID">
								<select required="" name="customer_id" class="form-control customer_id" data-placeholder="Customer Name">
									<option value="">Select Customer</option>
									<?php
										foreach($customer as $data){
											echo "<option value='{$data->id}'>{$data->name}</option>";
										}
									?>
								</select>
							</div>
						</div>				

						<div class="form-group row">
							<label for="" class="col-sm-2 col-form-label">Transaction Mood</label>
							<div class="col-sm-4">
								<select name="payment_type" id="transection_mood" class="form-control" tabindex="5">
									<option value="1"> Cash </option>
									<option value="2"> Cheque </option>
								</select>
							</div>
							<!-- amount div -->
							<label for="" class="col-sm-2 col-form-label">Amount</label>
							<div class="col-sm-2 due_amount">
								<input class="form-control" name="amount" type="number" max='' placeholder="Amount">
								<?php if (form_error('amount')) { ?>
									<div class="error-message">
										<?php echo form_error('amount'); ?>
									</div>
								<?php } ?>   
							</div>  
							<div  class="col-sm-2 customer_due">
							</div>
						</div>
						<div id="bank_info_hide" style="display: none;">
							<div class="form-group row">
								<label for="cheque_or_pay_order_no" class="col-sm-2 col-form-label">Cheque No <i class="text-danger"> * </i> </label>
								<div class="col-sm-4">
									<input type="text" id="cheque_no" class="form-control" name="cheque_no" placeholder="Cheque No" tabindex="8">
								</div>
							</div>
							<div class="form-group row">
								<label for="bank_name" class="col-sm-2 col-form-label">Bank Name <i
										class="text-danger">*</i></label>
								<div class="col-sm-4">
									<select required=""  name="bank_name" id="bank_name" class="form-control" style="width: 100%"
										tabindex="10">
										<option value=''>-- Select Bank --</option>
										<option value="DBBL">DBBL bank</option>
										<option value="AMS"> AMS bank</option>
										<option value="Islami"> Islami bank limited</option>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-2" style="margin-top:5px ">
								<input type="submit" id="add-customer"
									class="btn btn-info" value="Submit">
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</section>
