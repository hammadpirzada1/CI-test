<div>
  <h3>Admin Login</h3>
  <br>
  <?php echo validation_errors(); ?>
  <?php if($error = $this->session->flashdata('login_failed')): ?>
    <div class="alert alert-dismissible alert-danger">
      <?= $error ?>
    </div>
  <?php endif; ?>
</div>
<?php echo form_open('login/admin_login'); ?>
  <div class="form-group">
      <label for="Username">Username</label>
      <?php echo form_input(['name'=>'username', 'class'=>'form-control', 'placeholder'=>'Username', 'id'=>'Username', 'value'=>set_value('username')]); ?>
    </div>
  <div class="form-group">
    <label for="Password">Password</label>
    <?php echo form_password(['name'=>'password', 'class'=>'form-control', 'placeholder'=>'Password', 'id'=>'Password']); ?>
  </div>
  <!-- <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <?php echo form_reset(['name'=>'reset', 'value'=>'Reset', 'class'=>'btn btn-secondary']); ?>
  <?php echo form_submit(['name'=>'submit', 'value'=>'Login', 'class'=>'btn btn-primary']) ?>
<?php echo form_close(); ?>