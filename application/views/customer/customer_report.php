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
        <h1>Customer Report</h1>
        <small>Manage Customer Report</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="<?php echo base_url('customer') ?>">Customer</a></li>
            <li class="active">Customer Report</li>
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
                        <h4>Customer Report Details</h4>
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
                                                <th style="text-align:center">Date</th>
                                                <th style="text-align:center">Sell No</th>
                                                <th style="text-align:center">Receipt No</th>
                                                <th style="text-align:right">pay</th>
                                                <th style="text-align:right">due</th>
                                                <th style="text-align:right">Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $balance = 0;
                                                foreach($orders as $key => $data){ 
                                                    $balance = $balance + $data->paid_amount - $data->due_amount; ?>
                                                    <tr>
                                                        <td style="text-align:center"><?php echo date('d-M-Y', strtotime($data->created_at)) ?></td>
                                                        <td style="text-align:center"><?php echo $data->order_no ?></td>
                                                        <td style="text-align:center"><?php echo $data->receipt_no ?></td>
                                                        <td style="text-align:right"><?php echo $data->paid_amount ?></td>
                                                        <td style="text-align:right"><?php echo $data->due_amount ?></td>
                                                        <td style="text-align:right"><?php echo $balance ?>.00</td>
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