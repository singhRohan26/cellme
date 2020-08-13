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
                        <h4 class="mb-0 font-size-18">User Information</h4>
                        <div class="page-title-right">
                            <div class="page-title-right">
                            <a href="<?php echo base_url('admin/users'); ?>" class="btn btn-primary">Back</a>
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
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Name</h5>
                                        <input type="text" name="name" class="form-control" id="name" value=" <?php if(!empty($User_information['full_name'])) { echo $User_information['full_name'];}?>" readonly  style="width:-webkit-fill-available;">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Email</h5>
                                        <input type="text" name="email" class="form-control" id="email" value="<?php if(!empty($User_information['email'])) { echo $User_information['email'];}?>" readonly style="width:-webkit-fill-available;"> 
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Mobile Number</h5>
                                        <input type="text" name="name" class= "form-control" id="name" value=" <?php if(!empty($User_information['mobile_no'])) { echo $User_information['mobile_no'];}?>" readonly  style="width:-webkit-fill-available;">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Address</h5>
                                        <input type="text" name="name" class= "form-control" id="name" value=" <?php if(!empty($User_information['address'])) { echo $User_information['address'];}?>" readonly  style="width:-webkit-fill-available;">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Post Code</h5>
                                        <input type="text" name="name" class= "form-control" id="name" value=" <?php if(!empty($User_information['pin_no'])) { echo $User_information['pin_no'];}?>" readonly  style="width:-webkit-fill-available;">
                                    </div>
                                </div>
                                <!-- <div class="col-sm-4">
                                    <div class="form-group">
                                        <h5 class="font-size-14">Weight</h5>
                                        <input type="text" name="name" class= "form-control" id="name" value=" <?php if(!empty($User_information['weight'])) { echo $User_information['weight'];}?>" readonly  style="width:-webkit-fill-available;">
                                    </div>
                                </div>
                                <div class="col-sm-4">
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
                                </div> -->
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