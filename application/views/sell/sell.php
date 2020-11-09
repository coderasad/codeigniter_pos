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
        <h1>Manage Sell</h1>
        <small>Manage Your Sell</small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('') ?> "><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Sell</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('sell/add') ?>" class="btn btn-success">Add Sell</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Manage Sell </h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align:center">SL.</th>
                                    <th style="text-align:center">Sell No</th>
                                    <th style="text-align:center">Customer Name</th>
                                    <th style="text-align:center">Date</th>
                                    <th style="text-align:right">Total Amount</th>
                                    <th style="text-align:center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($orders as $key => $data){$id = $data->id;?>
                                        <tr>
                                            <td style="text-align:center"><?php echo $key+1 ?></td>
                                            <td style="text-align:center"><?php echo $data->order_no ?></td>
                                            <td style="text-align:center"><a href="<?php echo base_url('customer/ledger/').$data->id ?>"><?php echo $data->cname ?></a></td>
                                            <td style="text-align:center"><?php echo date('d-M-Y', strtotime($data->created_at)) ?></td>
                                            <td style="text-align:right"><?php echo $data->paid_amount + $data->due_amount + $data->discount?></td>
                                            <td>
                                                <center>                                                
                                                    <a href="<?php echo base_url('sell/edit/').$id; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                                    <a href="<?php echo base_url('sell/delete/').$id ?>" class="deleteSell btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </center>
                                            </td>
                                            <input type="hidden" name="customer_id" value="<?php echo $data->customer_id ?>">
                                        </tr>
                                    <?php }
                                ?>
                            </tbody>                                
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>