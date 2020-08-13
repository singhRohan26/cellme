<style> 
.tim {
  
  animation-name: example;
  animation-duration: 1s;
  animation-iteration-count:1000000
}

@keyframes example {
  from {color: red;}
  to {color: yellow;}
}
</style>
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
                                <a href="<?php echo base_url('User/dispatchedPhoneList'); ?>" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            
            
            <div class="pcoded-inner-content">

                <div class="main-body">
                    <div class="page-wrapper">

                        <div class="page-body">
                            <?php if($dispatch['order_status'] == 'Received-error') { ?>
            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-block">
                            <div class="row form-group">
                                    <div class="col-3">                                                
                                        <label class="tim">Would you like to accept the new price or want the phone back? The new price is $<?php echo $dispatch['price'];  ?></label>
                                    </div>
                                    <div class="col-3">  
                                    <select class="form-control" id="request" name="request" data-url="<?php echo base_url('User/changeStatus/'.$dispatch['device_id']) ?>">
                                        <option>Choose your action</option>
                                        <option value="Accepted">Accept New price</option>
                                        <option value="Return">Want phone back</option>
                                        
                                    </select>
                                    
                                 </div>
                                    
                                 </div>

                        </div>
                        

                    </div>

                </div>
            </div>
            <?php } ?>
            
            <?php if($dispatch['order_status'] == 'Follow-up') { ?>
            <div class="row">
                                <div class="col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-block">
                            <div class="row form-group">
                                    <div class="col-3">                                                
                                        <label class="text-danger">This is the follow-up message to remind of the price by the admin</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($dispatch['message'])) {
                                            echo $dispatch['message'];
                                        }
                                    
                                        ?>
                                    </div>
                                    
                                 </div>

                        </div>
                        

                    </div>

                </div>
            </div>
            <?php } ?>
                            
                            <div class="row">
                                 <div class="col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-block">
                                            
                                                <div class="row form-group">
                                                <div class="col-3">                          
                                                    <label>User Name</label>
                                                </div>
                                                <div class="col-3">                                                
                                                    <?php if (!empty($userData['full_name'])) {
                                                        echo $userData['full_name'];
                                                    } ?>
                                                </div>
                                                <div class="col-3">                                                
                                                    <label>Email Id</label>
                                                </div>
                                                <div><?php  if (!empty($userData['email'])) {
                                                    echo $userData['email'];
                                                }?>
                                            </div>
                                          
                                            </div>

                                            <div class="row form-group">
                                            <div class="col-3">                          
                                               <label>Mobile Number</label>
                                           </div>
                                           <div class="col-3">                                                
                                              <?php if (!empty($userData['country_code'] || $userData['mobile_no'] )) {
                                                echo $userData['country_code'] . $userData['mobile_no'];
                                            } ?>
                                        </div>
                                        <div class="col-3">                          
                                           <label>Address</label>
                                       </div>
                                       <div class="col-3">                                                
                                         <?php if (!empty($userData['address'])) {
                                            echo $userData['address'];
                                        } ?>
                                    </div> 
                                    <div class="col-3">                          
                                           <label>Booking status</label>
                                       </div>
                                       <div class="col-3">                                                
                                         <?php if (!empty($dispatch['order_status'])) {
                                            echo $dispatch['order_status'];
                                        } ?>
                                    </div>
       
                                    
                                </div>  

                                        </div>
                                    </div>
                                </div>
                                

                            </div>

                              <h4 class="mb-0 font-size-18">Device Information</h4>
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">

                                    <div class="card">
                                    
                                        
                                        <div class="card-block">
                                            
                            

                            <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Device Name</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($dispatch['device_name'])) {
                                            echo $dispatch['device_name'];
                                        }
                                    
                                        ?>
                                    </div>
                                    
                                 </div>

                                 <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Model Number</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($dispatch['model_no'])) {
                                            echo $dispatch['model_no'];
                                        }
                                    
                                        ?>
                                    </div>
                                    <div class="col-3">                                                
                                        <label>Processor</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($dispatch['processor'])) {
                                         echo $dispatch['processor'];
                                     }
                                      ?>
                                </div>
                                 </div>
                                  <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Imei Number</label>
                                    </div>
                                    <div class="col-3">                                             
                                       <?php if (!empty($dispatch['imei'])) {
                                            echo $dispatch['imei'];
                                        }
                                    
                                        ?>
                                    </div>
                                    
                                 </div>
                                 

                                 <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Device Id </label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($dispatch['device_id'])) {
                                            echo $dispatch['device_id'];
                                        }
                                    
                                        ?>
                                    </div>
                                    <div class="col-3">                                                
                                        <label></label>
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
    <!-- End Page-content