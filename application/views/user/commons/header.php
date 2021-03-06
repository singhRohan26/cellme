
<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/apaxy/layouts/vertical/<?php echo base_url('admin/dashboard');?> by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Jan 2020 13:21:36 GMT -->
<head>
        <meta charset="utf-8" />
        <title><?php echo $title;?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url('public/admin/assets/images/cellme.png');?>">
        <!-- DataTables -->
        <link href="<?php echo base_url('public/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/admin/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css'); ?>" />

        <!-- Responsive datatable examples -->
        <link href="<?php echo base_url('public/admin/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css'); ?>" />  
        <!-- slick css -->
        <link href="<?php echo base_url('public/admin/assets/libs/slick-slider/slick/slick.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/admin/assets/libs/slick-slider/slick/slick-theme.css');?>" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="<?php echo base_url('public/admin/assets/libs/jqvmap/jqvmap.min.css');?>" rel="stylesheet" />

        <!-- Bootstrap Css -->
        <link href="<?php echo base_url('public/admin/assets/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="<?php echo base_url('public/admin/assets/css/icons.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="<?php echo base_url('public/admin/assets/css/app.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('public/admin/assets/css/style.css');?>" rel="stylesheet" type="text/css" />
        
         <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">

    </head>

    <body data-sidebar="dark">
         <div class="loader" style="display: none;"></div>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="<?php echo base_url('admin/dashboard');?>" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('public/admin/');?>assets/images/logo-sm-dark.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('public/admin/');?>assets/images/logo-dark.png" alt="" height="20">
                                </span>
                            </a>

                            <a href="<?php echo base_url('admin/dashboard');?>" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?php echo base_url('public/admin/');?>assets/images/logo-sm-light.png" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?php echo base_url('public/admin/');?>assets/images/logo.png" alt="" height="100" width="150">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="mdi mdi-backburger"></i>
                        </button>

                        <!-- App Search-->
                        
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="<?php if(!empty($admin_info['image_url'])){  echo base_url('uploads/admin-profile/'.$admin_info['image_url']); }else{ echo base_url('public/admin/assets/images/users/avatar-1.jpg'); }?>"
                                    alt="Header Avatar">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo $userData['full_name']; ?></span>
                                <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <!-- item-->
                                 <a class="dropdown-item" href="<?php echo base_url('User/editProfile') ?>"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Edit Profile</a>
                                 
                                <a class="dropdown-item" href="<?php echo base_url('User/changePassword') ?>"><i class="mdi mdi-face-profile font-size-16 align-middle mr-1"></i> Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url('User/logout') ?>"><i class="mdi mdi-logout font-size-16 align-middle mr-1"></i> Logout</a>
                            </div>
                        </div>
            
                    </div>
                </div>
            </header>