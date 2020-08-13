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
                        <h4 class="mb-0 font-size-18">Users List</h4>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (!empty($users)) {
                                        $i = 1;
                                        foreach ($users as $user) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><img src="<?php
                                                    if (!empty($user['image_url'])) {
                                                        echo base_url('uploads/users-profile/' . $user['image_url']);
                                                    } else {
                                                        echo base_url('public/admin/assets/images/users/img_avatar1.png');
                                                    }
                                                    ?>" width="80px" height="80px" class="img-thumbnail rounded-circle" alt="Image Not Found"></td>
                                                <td><?php
                                                    if (!empty($user['full_name'])) {
                                                        echo $user['full_name'];
                                                    }
                                                    ?></td>
                                                <td><?php
                                                    if (!empty($user['email'])) {
                                                        echo $user['email'];
                                                    }
                                                    ?></td>
                                                <td>
                                                    <select name="select" class="form-control form-control-primary fill seller_status" data-url="<?php echo base_url('users/chnage-status/' . $user['user_id']); ?>">
                                                        <option value="0">Select status</option>
                                                        <option value="Inactive" <?php
                                                        if ($user['status'] === 'Inactive') {
                                                            echo "Selected";
                                                        }
                                                        ?>>Blocked</option>
                                                        <option value="Active" <?php
                                                        if ($user['status'] === 'Active') {
                                                            echo "Selected";
                                                        }
                                                        ?>>Unblocked</option>
                                                    </select>
                                                </td>
                                                <td><a href="<?php echo base_url('admin/users/view-user-info/' . $user['user_id']); ?>" class="btn btn-primary">View Details <i class="fa fa-eye"></i></a></td>
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
    <!-- End Page-content -->