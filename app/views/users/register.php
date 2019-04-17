<?php require APPROOT . '/views/inc/header.php'; ?>

<h2>Create An Account</h2>
<p>Please fill this form to register with us</p>
<form action="<?php echo URLROOT; ?>/users/register" method="post">
  <div class="form-group">
		<label>Name:<sup>*</sup></label>
      <input type="text" name="name" class="form-control<?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
      <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
  </div>
  <div class="form-group">
      <label>Email Address:<sup>*</sup></label>
      <input type="text" name="email" class="form-control<?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
      <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
  </div>
  <div class="form-group">
      <label>Password:<sup>*</sup></label>
      <input type="password" name="password" class="form-control<?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
      <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
  </div>
  <div class="form-group">
      <label>Confirm Password:<sup>*</sup></label>
      <input type="password" name="confirm_password" class="form-control<?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
      <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
  </div>

  <div class="form-row">
    <div>
      <input type="submit" class="btn btn-success" value="Register">
    </div>
    <div>
      <a href="<?php echo URLROOT; ?>/users/login" class="btn ">Have an account? Login</a>
    </div>
  </div>
</form>

<?php require APPROOT . '/views/inc/footer.php'; ?>
