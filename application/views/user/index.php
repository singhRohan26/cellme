

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Hello, <?php echo $userData['full_name']; ?></h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Cellme</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                            <div class="row">
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card">
                                        <a href="#">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="font-size-14">Total Phones sent for sell</h5>
                                                </div>
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="dripicons-box"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <h4 class="m-0 align-self-center"><?php echo $sellmeCount;  ?></h4>
                                            <p class="mb-0 mt-3 text-muted"> </p>
                                        </div>
                                    </a>
                                    </div>
                                </div>

        
                                <div class="col-sm-6 col-xl-3">
                                    <div class="card">
                                         <a href="">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h5 class="font-size-14">Total Phones sent for warranty repair</h5>
                                                </div>
                                                <div class="avatar-xs">
                                                    <span class="avatar-title rounded-circle bg-primary">
                                                        <i class="dripicons-briefcase"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <h4 class="m-0 align-self-center"><?php echo $warrantyCount;  ?></h4>
                                            <p class="mb-0 mt-3 text-muted"> </p>
                                            
                                        </div>
                                    </a>
                                    </div>
                                </div>

                            
        
                            </div>
                            <!-- end row -->


                      
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

              