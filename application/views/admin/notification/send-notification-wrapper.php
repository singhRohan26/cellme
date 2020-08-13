<form method="post" id="send-notification" action="<?php echo base_url('admin/do-send-notification'); ?>">
    <div class="row">
        <p class="error_msg"></p>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo form_input(['name' => 'user', 'id' => 'user','readonly'=>'readonly','class' => 'form-control'],$user_name); ?>
            </div>
        </div>
        <input type="hidden" value="<?php echo $user_id; ?>" name="user_id"/>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="title">Title</label>
                <?php echo form_input(['name' => 'title', 'id' => 'title', 'class' => 'form-control']) ?>
            </div>
        </div>
    </div>
    <span class="err"></span>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="description">Message</label>
                <?php echo form_textarea(['name' => 'body', 'id' => 'body', 'rows' => '5', 'class' => 'form-control']) ?>
            </div>
        </div>

    </div>
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Submit</button>
    </div>
</form>