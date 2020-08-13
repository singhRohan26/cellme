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
                        <h4 class="mb-0 font-size-18">Terms and Conditions</h4>
                        <div class="page-title-right">
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
                             <!--    <div class="col-md-2"></div> -->
                                <div class="col-md-12">
                                    <div id="error_msg"></div>
                                    <?php
                                    $content = array('id' => 'common-form', 'role' => "form");
                                    echo form_open('setting/update-terms/'. $msg['id'], $content);
                                    ?>
                                    <div class="form-group">
                                        <h5 class="font-size-14">Title</h5>
                                        <input type="text" name="title" class="title form-control" id="title" value="<?php if(!empty($msg['title'])) { echo $msg['title'];}?>" style="width:-webkit-fill-available;"> 
                                    </div>
                                    <div class="form-group">
                                        <h5 class="font-size-14">Description </h5>
                                        <textarea name="description" class="summernote description form-control" id="description" rows='5' style="width:-webkit-fill-available;"> <?php if(!empty($msg['description'])) { echo $msg['description'];}?></textarea>
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
    <!-- End Page-content -->