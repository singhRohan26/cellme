

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
                                    <h4 class="mb-0 font-size-18">Change Password</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard');?>">Dashboard</a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Change Password</a></li>
                                            <!-- <li class="breadcrumb-item active">Form Elements</li> -->
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3"></div>
                                            <div class="col-md-6">
                                                <div id="error_msg"></div>
                                                <?php 
                                                    $content = array('id' => 'common-form', 'role' => "form");
                                                    echo form_open('admin/doChangePass', $content);
                                                ?>
                                                <div class="form-group">
                                                    <h5 class="font-size-14">Old Password</h5>
                                                    <input class="form-control" type="password" name="opass" id="opass" placeholder="Old Password">
                                                </div>
                                           
                                                <div class="form-group">
                                                    <h5 class="font-size-14">New Password</h5>
                                                    <input class="form-control" name="npass" id="npass" type="password" placeholder="New Password">
                                                </div>
                                            
                                                <div class="form-group">
                                                    <h5 class="font-size-14">Confirm Password</h5>
                                                    <input class="form-control" type="password" name="cpass" id="cpass" placeholder="Confirm Password">
                                                </div>
                                                <button class="btn btn-primary">Submit</button>
                                                <?php echo form_close();?>
                                            </div>
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
