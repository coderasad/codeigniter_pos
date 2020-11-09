<?php                                               
    $success_msg = $this->session->flashdata('success_msg'); 
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
        <i class="ti-dashboard"></i>

    </div>
    <div class="header-title">
        <h1>Dashboard</h1>
        <small>Home</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
</section>
<section class="content ar">
    <!-- First Counter -->
    <div class="row">
        <!-- Total Report -->
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="panel panel-bd lobidisable">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Todays Report</h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="message_innerx">
                        <div class="message_widgets">
                            <table class="table table-bordered font-weight-bold table-hover">
                                <tbody class="text-center">
                                    <tr>
                                    <th>Todays Report</th>
                                    <th>TK</th>
                                </tr>
                                <tr>
                                    <th>Total Sales</th>
                                    <td><?php 
                                        $price = 0;
                                        foreach($sell as $data){
                                            $price += $data->price;
                                        } echo $price
                                    ?>.00</td>
                                </tr>
                                <tr>
                                    <th>Total Purchase</th>
                                    <td><?php 
                                        $price = 0;
                                        foreach($product as $data){
                                            $price += $data->supplier_price;
                                        } echo $price
                                    ?>.00</td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <!-- Graft asbe akane -->
            </div>
        </div> 
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <!-- <canvas class="totalCustomer"></canvas> -->
                        <div class="small">Total Customer</div>
                        <h2 style="float: left;">
                            <span class="count-number"><?php echo $customer_count ?></span>
                            <span class="slight"><i class="fa fa-play fa-rotate-270 text-primary"> </i></span>
                        </h2>
                        <span>
                            <img src="<?php echo base_url('assets/backend/images/category/customer.png')?>" style="width: 25%; float: right;">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <div class="small">Total Product</div>
                        <h2 style="float: left;">
                            <span class="count-number"><?php echo $product_count ?></span> 
                            <span class="slight"><i class="fa fa-play fa-rotate-270 text-primary"> </i></span>
                        </h2>                            
                        <span>
                            <img src="<?php echo base_url('assets/backend/images/category/products-icon-3.jpg')?>" style="width: 25%; float: right;">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <div class="small">Total Supplier</div>
                        <h2 style="float: left;">
                            <span class="count-number"><?php echo $supplier_count ?></span> 
                            <span class="slight"><i class="fa fa-play fa-rotate-270 text-primary"> </i> </span>
                        </h2>
                        <span>
                            <img src="<?php echo base_url('assets/backend/images/category/supplier.png')?>" style="width: 35%; float: right;">
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <div class="small">Total Invoice</div>
                        <h2 style="float: left;">
                            <span class="count-number"><?php echo $orders_count ?> </span>
                            <span class="slight"> <i class="fa fa-play fa-rotate-270 text-primary"> </i> </span>
                        </h2>
                        <span>
                            <img src="<?php echo base_url('assets/backend/images/category/invoice.png')?>" style="width: 25%; float: right;">
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Second Counter -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">              
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="slight" style="margin-left: 70px;">
                                <img src="<?php echo base_url('assets/backend/images/category/pos_invoice.png')?>" height="40" width="40">
                            </span>
                        </h2>
                        <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="#">Create POS Invoice</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('assets/backend/images/category/invoice.png')?>" height="45" width="45"> </span></h2>
                        <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('sell/add') ?> ">Create New Invoice</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('assets/backend/images/category/product.png')?>" height="45" width="45"> </span></h2>
                        <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('product/add') ?> ">Add Product</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('assets/backend/images/category/customer.png')?>" height="45" width="45"> </span></h2>
                        <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('customer/add') ?>">Add Customer</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Third Counter -->
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('assets/backend/images/category/sale.png')?>" height="45" width="45"> </span></h2>
                        <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('sell') ?> ">Sales Report</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('assets/backend/images/category/purchase.png')?>" height="45" width="45"> </span></h2>
                        <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="<?php echo base_url('product') ?> ">Purchase Report</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('assets/backend/images/category/stock.png')?>" height="40"> </span></h2>
                        <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="#">Stock Report</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
            <div class="panel panel-bd">
                <div class="panel-body">
                    <div class="statistic-box">
                        <h2><span class="slight" style="margin-left: 70px;"><img src="<?php echo base_url('assets/backend/images/category/account.png')?>" height="40"></span></h2>
                        <div class="small" style="font-size: 17px;margin-top: 20px;text-align: center;"><a href="#">Todays Report</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>