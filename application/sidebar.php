

            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">

                            <li>
                                <a href="<?php echo base_url('admin/dashboard');?>" class="waves-effect">
                                    <!-- <i class="mdi mdi-view-dashboard"></i><span class="badge badge-pill badge-success float-right">3</span> -->
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url('admin/users');?>" class=" waves-effect">
                                    <span>Account Management</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('pricelist');?>" class=" waves-effect">
                                    <span>Pricing Management</span>
                                </a>
                            </li>
                           														<li>                                <a href="<?php echo base_url('booking');?>" class=" waves-effect">                                    <span>Booking Management</span>                                </a>                            </li>                            <li>                                <a href="<?php echo base_url('admin/notification');?>" class=" waves-effect">                                    <span>Notification</span>                                </a>                            </li>
                           
                              <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <!-- <i class="mdi mdi-email-multiple-outline"></i> -->
                                    <span>Device</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url('device/listing')?>">Add device</a></li>
                                    <li><a href="<?php echo base_url('storage/list')?>">Add Sorage</a></li>
                                </ul>
                            </li>                          

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <!-- <i class="mdi mdi-email-multiple-outline"></i> -->
                                    <span>Settings</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="<?php echo base_url('settings/term-and-conditions')?>">Terms and Conditions</a></li>
                                    <li><a href="<?php echo base_url('settings/faqs')?>">FAQ's</a></li>
                                     <li><a href="<?php echo base_url('settings/about-us')?>">About Us</a></li>
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