<!doctype html>
<html lang="en">
   
<head>
        <meta charset="utf-8" />
        <title><?php echo $title;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('public/admin/assets/images/favicon.ico');?>">

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url('public/admin/assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url('public/admin/assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url('public/admin/assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />

    </head>

    <body class="bg-primary bg-pattern">
       

        <div class="account-pages my-5 pt-5">
            <div class="container">
               
               <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="text-center">User Panel</h5>
                                    
                                    <div id="error_msg"></div>
                                    <?php 
                                        $content = array('id' => 'common-form', 'role' => "form", 'class' => "form-horizontal");
                                        echo form_open('User/doLogin', $content);
                                    ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mb-4">
                                                    <label for="email">Username</label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter username">
                                                </div>
                                                <div class="form-group mb-4">
                                                    <label for="password">Password</label>
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <!-- <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                        </div> -->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="text-md-right mt-3 mt-md-0">
                                                            <a href="<?php echo base_url('User/forgotPassword');?>" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    <div id="error_msg"></div>
                                <?php echo form_close();?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- end Account pages -->

        <!-- JAVASCRIPT -->
        <script src="<?php echo base_url('public/admin/assets/libs/jquery/jquery.min.js');?>"></script>
        <script src="<?php echo base_url('public/admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
        <script src="<?php echo base_url('public/admin/assets/libs/metismenu/metisMenu.min.js');?>"></script>
        <script src="<?php echo base_url('public/admin/assets/libs/simplebar/simplebar.min.js');?>"></script>
        <script src="<?php echo base_url('public/admin/assets/libs/node-waves/waves.min.js');?>"></script>

        <script src="<?php echo base_url('public/admin/assets/js/app.js');?>"></script>
        <script src="<?php echo base_url('public/admin/assets/js/event.js');?>"></script>

    </body>

</html>