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
                        <h4 class="mb-0 font-size-18">Price Management</h4>
                         <div class="page-title-right">
                           <a href="<?php echo base_url('admin/pricelist/add-price'); ?>" class="btn btn-primary">Add Price</a>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                 <div class="excel" style="text-align: right;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Upload Excel</button>
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
                                        <th>Mobile_Id</th>
                                        <th>Model Number</th>
                                        <th>Model Checkmend</th>
                                        <th>Working Price</th>
                                        <th>Not Working Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    if (!empty($device_detail)) {
                                        $i = 1;
                                        foreach ($device_detail as $deviselist) {
                                         // print_r($deviselist);die;
                                        
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php if (!empty($deviselist['mb_id'])) {
                                                    echo $deviselist['mb_id'];
                                                } ?></td>
                                                <td><?php
                                                if (!empty($deviselist['mb_model_no'])) {
                                                    echo $deviselist['mb_model_no'];
                                                }
                                                ?></td>
                                                <td><?php
                                                if (!empty($deviselist['mb_model_checkmend'])) {
                                                    echo $deviselist['mb_model_checkmend'];
                                                }
                                                ?></td>
                                                 <td><?php
                                                if (!empty($deviselist['mb_working_price'])) {
                                                    echo $deviselist['mb_working_price'];
                                                }
                                                ?></td>
                                                 <td><?php
                                                if (!empty($deviselist['mb_not_working_price'])) {
                                                    echo $deviselist['mb_not_working_price'];
                                                }
                                                ?></td>

                                                <td>
                                            <a href="<?php echo base_url('admin/pricelist/view-price/' . $deviselist['id']); ?>" class="btn btn-primary">View Details <i class="fa fa-eye"></i></a>
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
    <!-- End Page-content -->
    <div class="container">

  <!-- Modal -->
   <div id="error_msg"></div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
        </div>
        <div class="modal-body">
            <?php 
             $content = array('id' => 'workout-form', 'role' => "form");
             echo form_open('pricelist/add-excel/', $content);?>
        
           <div class="form-group">
            <h5 class="font-size-14"> Upload Excel</h5>
            <input type="file" name="file" class="pack_price form-control" id="file" style="width:-webkit-fill-available;" />
             <button class="btn btn-primary">Submit</button>
        </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </form>
      </div>
      
    </div>
  </div>
  
</div>