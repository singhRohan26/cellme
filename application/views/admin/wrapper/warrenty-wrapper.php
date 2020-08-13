<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"></h4>


  </div>
  <div id="error_msg"></div>
 
     <form method="post" action="<?php echo base_url('admin/warrenty-repair/update/' . $user_id .'/' .$device_id .'/' .$status); ?>" id="editProfile">

     <div class="modal-body">     
        <div class="form-group">
          <label class="form-label" for="field-2">Image</label>
          <div class="controls">
            <input type="file" name="image_url" id="image_url" class="image_url form-control">
          </div>
          </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
        <?php echo form_submit(['name'=>'submit','value'=>'Submit','class'=>'btn btn-success']); ?>
      </div>
    </form>
  </div>