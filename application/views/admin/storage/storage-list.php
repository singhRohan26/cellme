<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <!-- <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Price Management</h4>
                         <div class="page-title-right">
                           <a href="<?php echo base_url('pricelist/add-price'); ?>" class="btn btn-primary">Add Price</a>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Upload Excel</button>
                        </div>
                    </div> -->
                </div>
            </div>
      
                    <div class="row">
                        <div class="col-lg-12 col-xl-8">
                            <div class="error_msg"></div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Device  Listing</h5>
                                </div>
                                <div class="card-block" id="content-wrapper" data-url="<?php echo base_url('storage/storage-wrapper'); ?>">
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-12 col-xl-4">

                            <div class="card">
                                <div class="card-header">
                                <?php if (empty($storage)) {?>
                                    <h5>Add Device Storage</h5>
                                <?php }else { ?> <h5>Update Device Storage</h5><?php } ?>

                                </div>
                                <div id="error_msg"></div>
                                <div class="card-block">
                                    <form method="post" id="common-form" action="<?php
                                    if (!empty($storage)) {

                                        echo base_url('storage/do-edit-storage/' . $storage['id']);
                                    } else {
                                        echo base_url('storage/do-add-storage');
                                    }
                                    ?>">
                                        <div class="form-group">
                                            <label for="device_name">Ram Sorage</label>
                                            <?php echo form_input(['name' => 'ram', 'placeholder' => 'Enter Ram Storage ', 'id' => 'ram', 'class' => 'form-control'], isset( $storage['ram']) ? $storage['ram'] : '') ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="device_name">Device Storage</label>
                                            <?php echo form_input(['name' => 'device', 'placeholder' => 'Enter Device Storage', 'id' => 'device', 'class' => 'form-control'], isset( $storage['storage']) ? $storage['storage'] : '') ?>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-primary" type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


               