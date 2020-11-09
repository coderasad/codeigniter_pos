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
            <li><a href="<?php echo base_url('customer') ?>">Customer</a></li>
            <li class="active">Customer Ledger Details</li>
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
                        <h4>Customer Ledger Details</h4>
                        <button id="print" class="bg-orange border-0 float-right"><i class="fa fa-print" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div class="panel-body print_area" id="print_area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                            <?php
                                foreach ($customer as $key => $data) { ?>
                                    <h4 class="mb-1">Customer Name : <span><?php echo $data->name ?></span></h4>
									<p class="font-16 mb-1 mt-2 ">Phone : <?php echo $data->phone ?></p>  
                                    <p class="font-16 mb-1">Address : <?php echo $data->address ?></p>                           
                                <?php }
                            ?>
                            </div> 
                        </div>
                        <div class="col-md-12">
                            <div class="m-b-30">
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-striped table-hover dataTable no-footer" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center">SL No</th>
                                                <th style="text-align:center">Sell No</th>
                                                <th style="text-align:center">Date</th>
                                                <th style="text-align:right">Paid Amount</th>
                                                <th style="text-align:right">Due Amount</th>
                                                <th style="text-align:right">Discount</th>
                                                <th style="text-align:right">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $paid = 0;$due=0;$dis=0; 
                                                foreach($orders as $key => $data){?>
                                                    <tr>
                                                        <td style="text-align:center"><?php echo $key + 1 ?></td>
                                                        <td style="text-align:center"><a href="<?php echo base_url('customer/ledger/'.$data->id) ?>"><?php echo $data->order_no ?></a></td>
                                                        <td style="text-align:center"><?php echo date('d-M-Y', strtotime($data->created_at)) ?></td>
                                                        <td style="text-align:right"><?php echo $data->paid_amount ?></td>
                                                        <td style="text-align:right"><?php echo $data->due_amount ?></td>
                                                        <td style="text-align:right"><?php echo $data->discount ?></td>
                                                        <td style="text-align:right"><?php echo $data->paid_amount + $data->due_amount + $data->discount ?>.00</td>
                                                    </tr>
                                                <?php $paid += $data->paid_amount;$due += $data->due_amount;$dis += $data->discount;}
                                            ?>
                                            <!-- <tr style="font-weight: bold;">
                                                <td style="text-align:right" colspan="3">Grand Total</td>
                                                <td style="text-align:right"><?php echo $paid ?>.00</td>
                                                <td class='text-danger' style="text-align:right"><?php echo $due ?>.00</td>
                                                <td style="text-align:right"><?php echo $dis ?>.00</td>
                                                <td style="text-align:right"><?php echo $paid+$due+$dis ?>.00</td>
                                            </tr> -->
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