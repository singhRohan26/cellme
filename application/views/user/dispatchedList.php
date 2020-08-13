<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                 <div class="card-header">
                <i class="fas fa-book-open"></i>
                <a class="notify" href="#"> Phones sent for sellme</a>
            </div>
            <p class="error_msg"></p>
            </div>

            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                            <tr>
                                
                                <th>Sno.</th>
                                <th>Device Name</th>
                                <th>Model No.</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                              <tbody>
                            <?php
                            $a=1;
                            foreach($sellme as $sell){ ?>
                            <tr>
                                <td><?php echo $a; ?></td>
                                <td><?php echo $sell['device_name']; ?></td>
                                <td><?php echo $sell['model_no']; ?></td>
                                <td><?php echo $sell['order_status']; ?></td>
                                <td><a href="<?php echo base_url('User/dispatchedInfo/'.$sell['device_id']) ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                            </tr>
                            <?php  $a++;  } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
    <!-- End Page-content -->