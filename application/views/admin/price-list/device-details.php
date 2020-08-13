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
                        <h4 class="mb-0 font-size-18">Device Infromation</h4>
                        <div class="page-title-right">
                            <div class="page-title-right">
                            <a href="<?php echo base_url('admin/pricelist'); ?>" class="btn btn-primary">Back</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="assig_list boxs">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Mobile Id :- <?php if(!empty($devicedetail['mb_id'])) { echo $devicedetail['mb_id'];}?></h5>
                                      
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Model Number :- <?php if(!empty($devicedetail['mb_model_no'])) { echo $devicedetail['mb_model_no'];}?> </h5>
                                         
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Model Checkmand : <?php if(!empty($devicedetail['mb_model_checkmend'])) { echo $devicedetail['mb_model_checkmend'];}?>
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Working Price : <?php if(!empty($devicedetail['mb_working_price'])) { echo $devicedetail['mb_working_price'];}?></h5>
                                        
                                    </div>
                                </div>
                            
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Working Price : <?php if(!empty($devicedetail['mb_not_working_price'])) { echo $devicedetail['mb_not_working_price'];}?></h5>
                                        
                                    </div>
                                </div>
                                
                                <!--div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Goals</h5>
                                        <input type="text" name="name" class= "form-control" id="name" value=" <?php if(!empty($User_information['goals'])) { echo $User_information['goals'];}?>" readonly  style="width:-webkit-fill-available;">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="font-size-14">favourites</h5>
                                        <input type="text" name="name" class= "form-control" id="name" value=" <?php if(!empty($User_information['favourites'])) { echo $User_information['favourites'];}?>" readonly  style="width:-webkit-fill-available;">
                                    </div>
                                </div>
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