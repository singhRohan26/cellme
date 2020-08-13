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
                        <h4 class="mb-0 font-size-18">FAQ'S List</h4>
                        <div class="page-title-right">
                            <a href="<?php echo base_url('admin/settings/faqs/add'); ?>" class="btn btn-primary">Add FAQ's</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
             
            <div class="row">
                <div class="col-12">
                    <p id="error_msg"></p>
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if(!empty($faqs)) { 
                                        $i =1;
                                        foreach ($faqs as $faq) {
                                  ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td><?php if(!empty($faq['title'])) { echo $faq['title']; } ?></td>
                                        <td><?php if(!empty($faq['description'])) { $desc = strip_tags($faq['description']);

                                        if (strlen($desc) > 25) {
                                            $trimstring = substr($desc, 0, 50);
                                        } else {
                                            $trimstring = $desc;
                                        }
                                        echo $trimstring .' ....';
                                         } ?></td>
                                        <td>
                                            <select name="select" class="form-control form-control-primary fill seller_status" data-url="<?php echo base_url('setting/faqs-chnage-status/' . $faq['id']); ?>">
                                                <option value="0">Select status</option>
                                                <option value="Inactive" <?php if ($faq['status'] === 'Inactive') {
                                                                                echo "Selected";
                                                                            } ?>>Inactive</option>
                                                <option value="Active" <?php if ($faq['status'] === 'Active') {
                                                                            echo "Selected";
                                                                        } ?>>Active</option>
                                            </select>
                                        </td>
                                        <td><span>
                                        <a href="<?php echo base_url('settings/faq/view-details/'. $faq['id']); ?>"><i class="fa fa-eye fa-2x"></i></a>
                                        <a href="<?php echo base_url('setting/add_faqs/'. $faq['id']); ?>"><i class="fas fa-edit fa-2x"></i></a>
                                        <a href="<?php echo base_url('setting/delete-faqs/'. $faq['id']); ?>" class="finalDeactive"><i class="fa fa-trash fa-2x"></i></a>
                                         </span>
                                    
                                      </td>
                                    </tr>
                                    <?php } } else { ?>
                                        <tr>
                                            <td colspan="5" class="text-danger">
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