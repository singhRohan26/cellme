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
        <div class="home-btn d-none d-sm-block">
            <a href="<?php echo base_url('User') ?>"><i class="mdi mdi-home-variant h2 text-white"></i></a>
        </div>

        <div class="account-pages my-5 pt-5">
            <div class="container">

                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="p-2">
                                    <h5 class="text-center">Reset Password</h5>
                                        <div id="error_msg"></div>
                                        <?php 
                                            $content = array('id' => 'common-form', 'class' => "form-horizontal");
                                            echo form_open('User/doForgotPassword', $content);
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group mt-4">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter email">
                                                </div>
                                                <div class="mt-4">
                                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Send Email</button>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    <?php echo form_close();?>
                                </div>
                                 <p id="nav">
                    
                </p>
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