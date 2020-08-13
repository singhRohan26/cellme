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
                        <h4 class="mb-0 font-size-18">User Information</h4>
                        <div class="page-title-right">
                            <div class="page-title-right">
                                <a href="<?php echo base_url('booking'); ?>" class="btn btn-primary">Back</a>
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
                            <div class="row">
                                 <div class="col-lg-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-block">
                                            
                                                <div class="row form-group">
                                                <div class="col-3">                          
                                                    <label>User Name</label>
                                                </div>
                                                <div class="col-3">                                                
                                                    <?php if (!empty($booking_details['full_name'])) {
                                                        echo $booking_details['full_name'];
                                                    } ?>
                                                </div>
                                                <div class="col-3">                                                
                                                    <label>Email Id</label>
                                                </div>
                                                <div><?php  if (!empty($booking_details['email'])) {
                                                    echo $booking_details['email'];
                                                }?>
                                            </div>
                                          
                                            </div>

                                            <div class="row form-group">
                                            <div class="col-3">                          
                                               <label>Mobile Number</label>
                                           </div>
                                           <div class="col-3">                                                
                                              <?php if (!empty($booking_details['country_code'] || $booking_details['mobile_no'] )) {
                                                echo $booking_details['country_code'] . $booking_details['mobile_no'];
                                            } ?>
                                        </div>
                                        <div class="col-3">                          
                                           <label>Address</label>
                                       </div>
                                       <div class="col-3">                                                
                                         <?php if (!empty($booking_details['address'])) {
                                            echo $booking_details['address'];
                                        } ?>
                                    </div> 
                                    <div class="col-3">                          
                                           <label>Booking status</label>
                                       </div>
                                       <div class="col-3">                                                
                                         <?php if (!empty($booking_details['order_status'])) {
                                            echo $booking_details['order_status'];
                                        } ?>
                                    </div>
       
                                    
                                </div>  

                                        </div>
                                    </div>
                                </div>
                                

                            </div>

                              <h4 class="mb-0 font-size-18">Warranty Information</h4>
                            <div class="row">
                                <div class="col-lg-12 col-xl-12">

                                    <div class="card">
                                    
                                        
                                        <div class="card-block">
                                            
                            

                            <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Owner Name</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($warrenty['owner_name'])) {
                                            echo $warrenty['owner_name'];
                                        }
                                    
                                        ?>
                                    </div>
                                    <div class="col-3">                                                
                                        <label>Email Id</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($warrenty['email'])) {
                                         echo $warrenty['email'];
                                     }
                                      ?>
                                </div>
                                 </div>

                                 <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Model Number</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($warrenty['model_no'])) {
                                            echo $warrenty['model_no'];
                                        }
                                    
                                        ?>
                                    </div>
                                    <div class="col-3">                                                
                                        <label>Serial Number</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($warrenty['serial_no'])) {
                                         echo $warrenty['serial_no'];
                                     }
                                      ?>
                                </div>
                                 </div>
                                  <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Imei Number1</label>
                                    </div>
                                    <div class="col-3">                                             
                                       <?php if (!empty($warrenty['imei_1'])) {
                                            echo $warrenty['imei_1'];
                                        }
                                    
                                        ?>
                                    </div>
                                    <div class="col-3">                                                
                                        <label>Imei Number2</label>
                                    </div>
                                    <div class="col-3">                                             
                                       <?php if (!empty($warrenty['imei_2'])) {
                                         echo $warrenty['imei_2'];
                                     }
                                      ?>
                                </div>
                                 </div>
                                  <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Warranty Time </label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($warrenty['warranty_time'])) {
                                            echo $warrenty['warranty_time'];
                                        }
                                    
                                        ?>
                                    </div>
                                    <div class="col-3">                                                
                                        <label>DOP</label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($warrenty['dop'])) {
                                         echo $warrenty['dop'];
                                     }
                                      ?>
                                </div>
                                 </div>

                                 <div class="row form-group">
                                    
                                    <div class="col-3">                                                
                                        <label>Device Id </label>
                                    </div>
                                    <div class="col-3">                                             
                                        <?php if (!empty($warrenty['device_id'])) {
                                            echo $warrenty['device_id'];
                                        }
                                    
                                        ?>
                                    </div>
                                    <div class="col-3">                                                
                                        <label></label>
                                    </div>
                                    <div class="col-3">                                             
                                        <!-- <?php if (!empty($warrenty['dop'])) {
                                         echo $warrenty['dop'];
                                     }
                                      ?> -->
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