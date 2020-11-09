<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header-icon">
        <i class="ti-dashboard"></i>

    </div>
    <div class="header-title">
        <h1>Register</h1>
        <small>Home</small>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Register</li>
        </ol>
    </div>
</section>
<!-- end page title end breadcrumb -->
<section class="content">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-bd lobidrag">
                <div class="panel-heading">
                    <div class="panel-title">
                        <h4>Add Registration </h4>
                    </div>
                </div>
                <form action="<?php echo base_url('register/check') ?>" method="post" novalidate enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="name" placeholder="Full Name" class="form-control" type="text" value="<?php echo set_value('name') ?>">
                                <?php if (form_error('name')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('name'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email') ?>">
                                <div id="error-message"> </div>
                                <?php if (form_error('email')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('email'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="phone" placeholder="Mobile Number" class="form-control" type="text" value="<?php echo set_value('phone') ?>">
                                <?php if (form_error('phone')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('phone'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <select class="form-control" name="city_id">
                                    <option value='0'>Choose City</option>
                                    <?php
                                        foreach ($city as $data) {
                                            echo " <option value='{$data->id}'>{$data->name}</option>";
                                        }
                                    ?>
                                </select>
                                <?php if (form_error('city_id')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('city_id'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="password" placeholder="Password" class="form-control" type="password">
                                <?php if (form_error('password')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="re-password" placeholder="Retype Password" class="form-control" type="password">
                                <?php if (form_error('re-password')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('re-password'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input name="pic" class="form-control" type="file">
                                <?php if (form_error('pic')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('pic'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-6">
                                <input name="gender" type="radio" value="1"> Male
                                <input name="gender" type="radio" value="2"> Female
                                <?php if (form_error('gender')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('gender'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="form-group col-md-12">
                                <textarea name="address" cols="35" rows="5" class="form-control" placeholder="Address"></textarea>
                                <?php if (form_error('address')) { ?>
                                    <div class="error-message">
                                        <?php echo form_error('address'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 form-group">
                                <div class="custom-checkbox custom-control">
                                    <input class="form-check-input" name="condition" type="checkbox" value="1" id="check2" value="<?php echo set_value('condition', '1') ?>">
                                    <label class="form-check-label" for="check2">
                                        <small>By clicking Submit, you agree to our Terms & Conditions.</small>
                                    </label>
                                    <?php if (form_error('condition')) { ?>
                                        <div class="error-message">
                                            <?php echo form_error('condition'); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <button type="submit" class="btn bg-orange">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>