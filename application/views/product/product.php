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
        <h1>Manage Product</h1>
        <small>Manage your Product</small>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Product</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="m-b-10" style="float: right;">
                <a href="<?php echo base_url('product/add') ?>" class="btn btn-success">Add Product</a>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>Manage Product</h4>
                </div>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="dataTableExample2" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>SL.</th>
                                <th>Product</th>
                                <th>Model</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Supplier Name</th>
                                <th class="text-right">Sell Price</th>
                                <th class="text-right">Supplier Price</th>
                                <th class="text-right">Quantity</th>
                                <!-- <th>Images</th> -->
                                <th style="text-align: center; width : 130px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                foreach($product as $data){?>
                                    <tr>
                                        <td><?php echo $num++; ?></td>
                                        <td><?php echo $data->name; ?></td>
                                        <td><?php echo $data->model; ?></td>
                                        <td><?php echo $data->cname; ?></td>
                                        <td><?php echo $data->bname; ?></td>
                                        <td><?php echo $data->spname; ?></td>
                                        <td class="text-right"><?php echo $data->sell_price; ?></td>
                                        <td class="text-right"><?php echo $data->supplier_price; ?></td>
                                        <td class="text-right"><?php echo $data->quantity; ?></td>
                                        <!-- <td><img height="50" width="50" src="<?php echo base_url($data->image) ?>" alt=""></td> -->
                                        <td>
                                            <center>                                                
                                                <a href="<?php $id = $data->id; echo base_url('product/edit/').$id; ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="left" title="Update"><i class="fa fa-pencil-alt" aria-hidden="true"></i></a>
                                                <a href="<?php echo base_url('product/delete/').$id ?>" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete this item?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
</section>