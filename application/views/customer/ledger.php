<!-- alert message here  -->
<?php
	$error_msg = $this->session->flashdata('error_msg');
	$success_msg = $this->session->flashdata('success_msg');
	if ($error_msg) {?>
		<div class="alert alert-danger alert-dismissible fade show ar_model" role="alert">
			<strong><?php echo $error_msg ?> !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php }
	if ($success_msg) {?>
		<div class="alert alert-dismissible ar_model bg-info fade show text-white" role="alert">
			<strong><?php echo $success_msg ?> !</strong>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php }
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header-icon">
        <i class="ti-notepad"></i>
    </div>
    <div class="header-title">
        <h1>Customer Ledger</h1>
        <small>Manage Customer Ledger</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('sell') ?>">Sell</a></li>
            <li class="active">Customer Ledger</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="d-flex justify-content-between panel-title">
                        <h4>Customer Ledger</h4>
                        <button id="print" class="bg-orange border-0 float-right"><i class="fa fa-print" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="panel-body print_area" id="print_area>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                            <?php
                                foreach ($customer as $key => $data) { ?>
                                    <h4 class="mb-1">Customer Name : <span><?php echo $data->name ?></span></h4>
									<p class="font-16 mb-1 mt-2 ">Phone : <?php echo $data->phone ?></p>  
                                    <p class="font-16 mb-1">Address : <?php echo $data->address ?></p>                                  
                                    <p class="font-16 mb-0">Sell Date : <?php echo date('d-M-Y', strtotime($data->sdate)) ?></p> 
                                <?php }
                            ?>
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <div class="m-b-30">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center">Sell No</th>
                                                <th style="text-align:center">Product Name</th>
                                                <th style="text-align:right">Quantity</th>
                                                <th style="text-align:right">price</th>
                                                <th style="text-align:right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($sell as $key => $data) { ?>
                                                <tr>
                                                    <td style="text-align:center"><?php echo $data->order ?></td>
                                                    <td style="text-align:center"><?php echo $data->pname ?></td>
                                                    <td style="text-align:right"><?php echo $data->quantity ?></td>
                                                    <td style="text-align:right"><?php echo $data->price ?></td>
                                                    <td style="text-align:right"><?php echo $data->quantity * $data->price ?></td>
                                                </tr>
                                            <?php }
                                            ?>
                                            <?php 
                                                foreach($orders as $data){?>
                                                    <tr>
                                                        <td colspan="4" style="text-align:right"><b>Grand Total</b></td>
                                                        <td colspan="" style="text-align:right"><b><?php echo $data->paid_amount + $data->due_amount + $data->discount ?></b></td>
													</tr>
													<tr class="font-weight-bold text-primary">
                                                        <td colspan="4" style="text-align:right">Discount Amount</td>
                                                        <td colspan="" style="text-align:right"><?php echo $data->discount ?></td>
                                                    </tr>
													<tr class="font-weight-bold text-success">
                                                        <td colspan="4" style="text-align:right">Paid Amount</td>
                                                        <td colspan="" style="text-align:right"><?php echo $data->paid_amount ?></td>
                                                    </tr>
													<tr class="font-weight-bold text-danger">
                                                        <td colspan="4" style="text-align:right">Due Amount</td>
                                                        <td colspan="" style="text-align:right"><?php echo $data->due_amount ?></td>
                                                    </tr>
                                                <?php }
                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div>
    </div>
</section>