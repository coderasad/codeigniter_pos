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
        <h1>Manage Customer</h1>
        <small>Manage your customer</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Customer</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('customer') ?>" class="btn btn-info">Manage Customer</a>
                <a href="<?php echo base_url('customer/add') ?>" class="btn btn-success">Add Customer</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Manage Customer </h4>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dataTableExample2xx" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>SL.</th>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Mobile</th>
                                    <th style="text-align:right !Important">Balance</th>
                                    <th style="text-align:center !Important">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    foreach($customer as $data){$id = $data->id;?>
                                        <tr>
                                            <td><?php echo $num++ ?></td>
                                            <td><a href="#"><?php echo $data->name ?></a></td>
                                            <td><?php echo $data->address ?></td>
                                            <td><?php echo $data->phone ?></td>
                                            <td align="right"><?php echo $data->due_balance?></td> 
                                            <td>
                                                <center>                                                
                                                    <a href="<?php echo base_url('customer/edit/').$id; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                                    <a href="<?php echo base_url('customer/delete/').$id ?>" class="deleteCustomer btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php }
                                ?>
                            </tbody>                                
                        </table>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-end">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>