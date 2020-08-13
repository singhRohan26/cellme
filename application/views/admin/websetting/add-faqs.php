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
                        <h4 class="mb-0 font-size-18">FAQ'S ADD</h4>
                        <div class="page-title-right">
                            <!-- <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">FAQ'S ADD</a></li>
                            </ol> -->
                            <div class="page-title-right">
                            <a href="<?php echo base_url('admin/settings/faqs'); ?>" class="btn btn-primary">Back</a>
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
                                    <div id="error_msg"></div>
                                    <?php
                                    $content = array('id' => 'common-form', 'role' => "form");
                                    if(!empty($faqs)){
                                        echo form_open('setting/do-update-faqs/'.$faqs['id'], $content);
                                    }else{
                                    echo form_open('setting/do-add-faqs/', $content);
                                    }
                                    ?>
                                    <div class="form-group">
                                        <h5 class="font-size-14">Title</h5>
                                        <textarea name="title" class="title form-control" id="title" rows='2' style="width:-webkit-fill-available;"> <?php if(!empty($faqs['title'])) { echo $faqs['title'];}?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <h5 class="font-size-14">Description </h5>
                                        <textarea name="description" class="description description form-control" id="description" rows='5' style="width:-webkit-fill-available;"> <?php if(!empty($faqs['description'])) { echo $faqs['description'];}?></textarea>
                                    </div>
                                    <?php if(!empty($faqs)){?>
                                <button class="btn btn-primary">Update</button>
                                   <?php } ?>
                                   <?php if(empty($faqs)){?>
                                     <button class="btn btn-primary">Submit</button>
                                  <?php } ?>
                                  
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