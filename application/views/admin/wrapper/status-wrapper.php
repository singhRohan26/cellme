<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"></h4>


  </div>
  <div id="error_msg"></div>
  <?php if($status == 'Follow-up'){ ?> 
   <form method="post" action="<?php echo base_url('admin/booking/Follow-up/' . $user_id .'/' .$device_id); ?>" id="common-form">
   <?php } else { ?>
     <form method="post" action="<?php echo base_url('admin/booking/addprice/' . $user_id .'/' .$device_id); ?>" id="editProfile">

     <?php  } ?>

     <div class="modal-body">   
      <?php if($status == 'Follow-up'){ ?>        
        <div class="form-group">
          <label for="message">Enter message for Follow-up</label></br>
          <input id="message"  name = "message" class="form-control message" type="text" placeholder="Enter message for Follow-up" />
          <input id="status" name="status" type="hidden" value="<?php echo $status ?>">

        </div>
      <?php } ?>

      <?php if($status == 'Received-error'){ ?>    
        <div class="form-group">
          <label for="message">Enter New price</label></br>
          <input id="price"  name = "price" class="form-control price" type="text" placeholder="Enter Device New Price" />
          <input id="status" name="status" type="hidden" value="<?php echo $status ?>">
        </div>
        <div class="form-group">
          <label class="form-label" for="field-2">Error Image</label>
          <div class="controls">
            <input type="file" name="image_url" id="image_url" class="image_url form-control">
          </div>
          </div>

        <?php } ?>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-success']); ?>
      </div>
    </form>
  </div>