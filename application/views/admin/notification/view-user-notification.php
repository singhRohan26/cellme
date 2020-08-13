<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
             <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                    <i class="fas fa-book-open">Notification</i>

                            <div class="page-title-right">
                            <a href="<?php echo base_url('admin/notification'); ?>" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- start page title -->
           

            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                            <tr>
                               <th>S.No.</th>
                                <th>Title</th>
                                <th>Body</th>
                                <th>Date And Time</th>
                            </tr>
                        </thead>

                             <tbody>
                            <?php
                                if (!empty($notifications)) {
                                    $i = 1;
                                    foreach ($notifications as $notification) {
                                        ?>
                            <tr>
                                <td style="width: 20px;"><?php echo $i; ?></td>
                                <td><?php echo $notification['title']; ?></td>
                                <td title="<?php echo $notification['body']; ?>"><?php echo substr($notification['body'],0 ,90); ?>...</td>
                                <td><?php echo $notification['created_at']; ?></td>
                            </tr>
                            <?php
                                $i++;
                            }
                        } ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div> <!-- container-fluid -->
</div>
    <!-- End Page-content -->
    <div class="modal fade" id="viewjob" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" id="viewjob_wrapper">
            
        </div>
    </div>
</div>
   