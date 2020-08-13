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
                        <h4 class="mb-0 font-size-18">Warranty Repair List</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Image</th>
                                        <th>User Name</th>
                                        <th>Email ID</th>
                                        <th>Booking Date & Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (!empty($warrenty)) {
                                        $i = 1;
                                        foreach ($warrenty as $warrentydata) { ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="<?php
                                                if (!empty($warrentydata['image_url'])) {
                                                    echo base_url('uploads/users-profile/' . $warrentydata['image_url']);
                                                    } else {
                                                        echo base_url('public/admin/assets/images/users/img_avatar1.png');
                                                    }
                                                    ?>" width="80px" height="80px" class="img-thumbnail rounded-circle" alt="Image Not Found"></td>

                                                    <td><?php if (!empty($warrentydata['full_name'])) {
                                                        echo $warrentydata['full_name'];
                                                    } ?></td>
                                                    <td><?php
                                                    if (!empty($warrentydata['email'])) {
                                                        echo $warrentydata['email'];
                                                    }
                                                    ?></td>
                                                <td><?php
                                                    if (!empty($warrentydata['created_at'])) {
                                                        echo $warrentydata['created_at'];
                                                    }
                                                    ?></td>
                                                    <td>
                                                         <?php echo form_dropdown(['name' => 'order_status', 'id' => 'order_status', 'class' => 'form-control warrnty_status', 'data-url' => base_url('admin/warrenty-repair/status_wrapper/' .$warrentydata['user_id']. '/' .$warrentydata['device_id'])], ['Phone sent' => 'Phone sent', 'Pending' => 'Pending', 'Received' => 'Received','Received-error' => 'Received-error', 'Fixed/Returned' => 'Fixed/Returned', 'Replaced/ return' =>'Replaced/ return', 'Return without fix'=> 'Return without fix'], $warrentydata['order_status']); ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/warrenty-repair/view/' . $warrentydata['device_id']); ?>" data-toggle="tooltip" data-placement="top" class="btn btn-primary" title="View Booking">view <i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                            <?php
                                            $i++;
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="7" class="text-danger">
                                    <center><?php echo "No record found here.!"; ?></center>
                                    </td>
                                    </tr>
                                <?php } ?>                                     
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- container-fluid -->
        </div>
        <div class="chan_pass">
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <div class="modal-content" id="mdl_cntnt">

                    </div>
                </div>
            </div>
        </div>