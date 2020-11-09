<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?php echo isset($title) ? $title : 'Dashboard' ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="themesdesign" name="author" />
    <meta name="url" content="<?php echo base_url() ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/backend/images/favicon.ico">


    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/metro/MetroJs.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/morris/morris.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/jvectormap/jquery-jvectormap-2.0.2.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/timepicker/tempusdominus-bootstrap-4.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/select2/select2.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/datatables/buttons.bootstrap4.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/plugins/datatables/responsive.bootstrap4.min.css') ?>">

    <?php
    if (isset($css) && $css) {
        foreach ($css as $data) {
            echo "<link href='" . base_url($data) . ".css' rel='stylesheet' type='text/css'>";
        }
    }
    ?>
    <link href="<?php echo base_url('assets/backend/css/bootstrap.min.css" rel="stylesheet') ?>" type="text/css">
    <link href="<?php echo base_url('assets/backend/plugins/animate/animate.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/backend/css/icons.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/backend/css/style.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('assets/backend/css/myStyle.css') ?>" rel="stylesheet" type="text/css">
    

</head>


<body class="fixed-left">
    <!-- login session variable======= -->
    <?php
    $myId = $this->session->userdata('myid');
    $myName = $this->session->userdata('myname');
    $myEmail = $this->session->userdata('myemail');
    ?>

    <div id="wrapper">
        <?php
        if ($myId) {
        ?>
            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center ar_logo_bg">
                        <a href="<?php echo base_url() ?>" class="logo"><img src="<?php echo base_url('assets/backend/images/logo.png') ?>" height="40" alt="logo"></a>
                    </div>
                </div>

                <div class="sidebar-inner slimscrollleft" id="sidebar-main">

                    <div id="sidebar-menu">
                        <div class="user-panel text-center">
                            <div class="master_class">
                                <span class="bg-1"></span>
                                <span class="bg-2"></span>
                                <span class="bg-3"></span>
                                <span class="bg-4"></span>
                                <span><i class="mdi mdi-settings-box"></i></span>
                            </div>
                            <div class="image">
                                <img src="<?php echo base_url('assets/backend/images/avatar.jpg') ?>" height="40" class="rounded-circle" alt="User Image">
                            </div>
                            <div class="info">
                                <p>Admin User</p>                      
                                <?php echo $myName; ?>
                                <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                            </div>
                        </div>
                        <ul>
                            <li class="">
                                <a href="<?php echo base_url() ?>" class="waves-effect waves-light">
                                    <i class="mdi mdi-view-dashboard"></i><span> Dashboard all </span>
                                    <!-- <span class="badge badge-pill badge-primary float-right">5</span> -->
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-light">
                                    <i class="ti-layout-accordion-list"></i><span>Sell</span>
                                    <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url('sell/add') ?>">New Sell</a></li>
                                    <li><a href="<?php echo base_url('sell') ?>">Manage Sell</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-light">
                                    <i class="ti-bag"></i><span>Product</span>
                                    <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url('category') ?> ">Category</a></li>
                                    <li><a href="<?php echo base_url('product/add') ?>  ">Add Product</a></li>
                                    <li><a href="<?php echo base_url('product') ?>">Manage Product</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-light">
                                    <i class="fa fa-handshake"></i><span>Customer</span>
                                    <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url('customer/add') ?> ">Add Customer</a></li>
                                    <li><a href="<?php echo base_url('customer') ?> ">Manage Customer</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-light">
                                    <i class="ti-user"></i><span>Supplier</span>
                                    <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url('supplier/add') ?>">Add Supplier</a></li>
                                    <li><a href="<?php echo base_url('supplier') ?> ">Manage Supplier</a></li>
                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect waves-light">
                                    <i class="ti-shopping-cart"></i><span>Purchase</span>
                                    <span class="float-right"><i class="mdi mdi-chevron-right"></i></span>
                                </a>
                                <ul class="list-unstyled">
                                    <li><a href="<?php echo base_url('product/add') ?>">Add Purchase</a></li>
                                    <li><a href="<?php echo base_url('product') ?>">Manage Purchase</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="<?php echo base_url('register') ?>" class="waves-effect waves-light">
                                    <i class="ti-user"></i><span>Registration</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <!-- Top Bar Start -->
                    <div class="topbar">
                        <nav class="navbar-custom">
                            <ul class="list-inline float-right mb-0">
                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="ti-email noti-icon"></i>
                                        <span class="badge badge-danger noti-icon-badge">5</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5><span class="badge badge-danger float-right">5</span>Messages</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="<?php echo base_url() ?>assets/backend/images/avatar.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                            <p class="notify-details"><b>Charles M. Jones</b><small class="">Dummy text of the printing and typesetting industry.</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="<?php echo base_url() ?>assets/backend/images/avatar.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                            <p class="notify-details"><b>Thomas J. Mimms</b><small class="">You have 87 unread messages</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon"><img src="<?php echo base_url() ?>assets/backend/images/avatar.jpg" alt="user-img" class="img-fluid rounded-circle" /> </div>
                                            <p class="notify-details"><b>Luis M. Konrad</b><small class="">It is a long established fact that a reader will</small></p>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            View All
                                        </a>
                                    </div>
                                </li>

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <i class="ti-bell noti-icon"></i>
                                        <span class="badge badge-success noti-icon-badge">9</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5><span class="badge badge-success float-right">9</span>Notification</h5>
                                        </div>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                            <p class="notify-details"><b>Your order is placed</b><small class="">Dummy text of the printing and typesetting industry.</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-message"></i></div>
                                            <p class="notify-details"><b>New Message received</b><small class="">You have 87 unread messages</small></p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-martini"></i></div>
                                            <p class="notify-details"><b>Your item is shipped</b><small class="">It is a long established fact that a reader will</small></p>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <!-- All-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            View All
                                        </a>
                                    </div>
                                </li>

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="<?php echo base_url() ?>assets/backend/images/avatar.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <div class="dropdown-item noti-title">
                                            <h5>Welcome</h5>
                                        </div>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle "></i> Profile</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-wallet "></i> My Wallet</a>
                                        <a class="dropdown-item" href="#"><span class="badge badge-primary float-right">3</span><i class="mdi mdi-settings "></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="<?php echo base_url('logout') ?>  "><i class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>
                                </li>
                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="float-left">
                                    <button class="button-menu-mobile open-left waves-light waves-effect">
                                        <i class="mdi mdi-menu"></i>
                                    </button>
                                </li>
                                <li class="ar_show_all_inventory_button">
                                    <ul>
                                        <li>
                                            <a href="<?php echo base_url('sell/add') ?>"><i class="ti-layout-accordion-list"></i><span>Sell</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('transaction') ?>"><i class="fa fa-money-bill-alt"></i><span>Transaction</span></a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('product/add')?>"><i class="ti-shopping-cart"></i><span>Purchase</span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </nav>
                    </div>
                    <!-- Top Bar End -->
                    <section class="ar-content page-content-wrapper">
                        <?php
                        if (isset($content)) {
                            echo $content;
                        }
                        ?>
                    </section><!-- Page content Wrapper -->

                </div> <!-- content -->

                <footer class="footer">
                    © 2020 Coderas@d by Themesdesign.
                </footer>

            </div>
            <!-- End Right content here -->
        <?php
        } else {
            if (isset($log_content)) {
                echo $log_content;
            }
        }
        ?>
    </div>


    <!-- END wrapper -->
    <script src="<?php echo base_url('assets/backend/js/jquery.min.js') ?>"></script>
    <script>
        $(document).ready(function () {
            
            // Image show instant start============  
            function readURLa(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#img_show').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#imgInp").change(function () {
                readURLa(this);
            });
        })
    </script>
    <script src="<?php echo base_url('assets/backend/js/custom/ar-custom.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/modernizr.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/detect.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/fastclick.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.slimscroll.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.blockUI.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/waves.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.nicescroll.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/jquery.scrollTo.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/js/sweetalert2.all.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/timepicker/moment.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/timepicker/tempusdominus-bootstrap-4.js') ?>"></script>    
    <script src="<?php echo base_url('assets/backend/plugins/timepicker/bootstrap-material-datetimepicker.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/select2/select2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/colorpicker/jquery-asColorPicker.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/colorpicker/jquery-asGradient.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/colorpicker/jquery-asColor.js') ?>"></script>

    <script src="<?php echo base_url('assets/backend/pages/form-advanced.js') ?>"></script>
    <!-- Required datatable js -->
    <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap4.min.js') ?>"></script>
    <!-- Buttons examples -->
    <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.buttons.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/buttons.bootstrap4.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/jszip.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/pdfmake.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/vfs_fonts.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/buttons.html5.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/buttons.print.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/buttons.colVis.min.js') ?>"></script>
    <!-- Responsive examples -->
    <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.responsive.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/backend/plugins/datatables/responsive.bootstrap4.min.js') ?>"></script>

    <!-- Datatable init js -->
    <script src="<?php echo base_url('assets/backend/pages/datatables.init.js')?>"></script>


    <!-- App js -->
    <script src="<?php echo base_url() ?>assets/backend/js/app.js"></script>
    <?php
    if (isset($js) && $js) {
        foreach ($js as $data) {
            echo "<script src='" . base_url($data) . ".js'></script>";
        }
    }
    ?>

</body>

</html>