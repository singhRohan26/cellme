============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">

                        <h4 class="mb-0 font-size-18">Add Mobile Device</h4>

                        <div class="page-title-right">
                            <a href="<?php echo base_url('admin/pricelist'); ?>" class="btn btn-primary">Back</a>
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
                                <!-- <div class="col-md-2"></div> -->
                                <div class="col-md-12">
                                    <div id="error_msg"></div>
                                    <?php
                                    $content = array('id' => 'workout-form', 'role' => "form");
                                    echo form_open('admin/pricelist/do-add-device', $content);

                                    ?>
                                    <div class="form-group">
                                        <h5 class="font-size-14">Mobile Id</h5>
                                        <input type="text" name="mobile_id" class="pack_name form-control" id="mobile_id" placeholder="Enter Mobile Id" style="width:-webkit-fill-available;" />
                                    </div>

                                    <div class="form-group">
                                        <h5 class="font-size-14">Model Number</h5>
                                        <input type="text" name="model_no" class="pack_name form-control" id="model_no" placeholder ="Enter Model Number" style="width:-webkit-fill-available;" />
                                    </div>

                                    <div class="form-group">
                                        <h5 class="font-size-14">Model Checkmend</h5>
                                        <input type="text" name="model_checkmend" class="pack_name form-control" id="model_checkmend" placeholder ="Enter Model Checkmend" style="width:-webkit-fill-available;" />
                                    </div>
                                    <div class="form-group">
                                        <h5 class="font-size-14"> Working Price</h5>
                                        <input type="text" name="working_price" class="pack_name form-control" id="working_price" placeholder ="Enter Working Price" style="width:-webkit-fill-available;" />
                                    </div>
                                    <div class="form-group">
                                        <h5 class="font-size-14"> Not Working Price</h5>
                                        <input type="text" name="not_working_price" class="pack_name form-control" id="not_working_price" placeholder ="Enter Not Working Price" style="width:-webkit-fill-available;" />
                                    </div>


                                    <button class="btn btn-primary">Submit</button>

                                    <?php echo form_close(); ?>
                                </div>
                                <!--  <div class="col-md-2"></div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content