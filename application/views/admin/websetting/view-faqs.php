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
                        <h4 class="mb-0 font-size-18">FAQ'S DETAILS</h4>
                        <div class="page-title-right">
                            <!-- <!-- <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">FAQ'S DETAILS</a></li>
                                <!-- <li class="breadcrumb-item active">Form Elements</li>
                            </o> -->
                            <div class="page-title-right">
                            <a href="<?php echo base_url('settings/faqs'); ?>" class="btn btn-primary">Back</a>
                        </div>
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
                                    <div class="form-group">
                                        <h5 class="font-size-14">Title</h5>
                                        <input type="text" name="title" class="title form-control" id="title" value="<?php if(!empty($faqsdetails['title'])) { echo $faqsdetails['title'];}?>" readonly style="width:-webkit-fill-available;"> 
                                    </div>
                                    <div class="form-group">
                                        <h5 class="font-size-14">Description </h5>
                                        <textarea name="description" class="form-control" id="description" rows='10' style="width:-webkit-fill-available;" readonly> <?php if(!empty($faqsdetails['description'])) { echo strip_tags($faqsdetails['description']);}?></textarea>
                                    </div>
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