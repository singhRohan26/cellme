

<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                <li>
                    <a href="<?php echo base_url('admin/dashboard');?>" class="waves-effect">
                         <i class="mdi mdi-view-dashboard"></i>
                        <!--<i class="fa fa-tachometer" aria-hidden="true"></i>-->
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('admin/users');?>" class=" waves-effect">
                     <i class="fa fa-industry"></i>
                     <span>Account Management</span>
                 </a>
             </li>
             <li>
                <a href="<?php echo base_url('admin/pricelist');?>" class=" waves-effect">
                    <i class="fas fa-rupee-sign"></i>
                    <span>Pricing Management</span>
                </a>
            </li>
              <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
             <i class="fas fa-cogs"></i> 
            <span>Booking Management</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="<?php echo base_url('admin/booking')?>"><i class="fa fa-columns"></i>Sell Me Booking</a></li>
            <li><a href="<?php echo base_url('admin/warrenty-repair')?>"><i class="fa fa-columns"></i>Sell Me Warranty</a></li>
        </ul>
    </li>
    
         <li class="nav-item <?php if($title=='Notification'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?php echo base_url('admin/notification'); ?>">
                <i class="fas fa-bell"></i>
                <span>Notification</span>
            </a>
        </li> 
       <!--  <li class="nav-item <?php if($title=='Notification'){ echo 'active'; } ?>">
            <a class="nav-link" href="<?php echo base_url('admin/order/status'); ?>">
                <i class="fas fa-bell"></i>
                <span>order status</span>
            </a>
        </li> -->
       

      <!--  <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="mdi mdi-email-multiple-outline"></i> -->
            
       <!--  </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="<?php echo base_url('admin/device/listing')?>">Add device</a></li>
             <li><a href="<?php echo base_url('admin/storage/list')?>">Add Sorage</a></li> -->
       

    <li>
        <a href="javascript: void(0);" class="has-arrow waves-effect">
            <i class="fas fa-cogs"></i>
            <span>Settings</span>
        </a>
        <ul class="sub-menu" aria-expanded="false">
            <li><a href="<?php echo base_url('admin/settings/term-and-conditions')?>"><i class="fas fa-certificate"></i>Terms and Conditions</a></li>
            <li><a href="<?php echo base_url('admin/settings/faqs')?>"><i class="far fa-question-circle"></i>FAQ's</a></li>
            <li><a href="<?php echo base_url('admin/settings/about-us')?>"><i class="fas fa-certificate"></i>About Us</a></li>
        </ul>
    </li>
</ul>
<!-- 
                        <div class="sidebar-section mt-5 mb-3">
                            <h6 class="text-reset font-weight-medium">
                                Project Completed
                                <span class="float-right">67%</span>
                            </h6>
                            <div class="progress mt-3" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 67%" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div> -->
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->