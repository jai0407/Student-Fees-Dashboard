<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('portal/_partials/header');
?>
<body style="background-color: #eceffb;">
  <div id="app">
    <section class="section">
      <div class="container mt-4">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand" style="margin:15px;">
              <img src="<?php echo base_url(); ?>assets/img/ASMS-logo.png" alt="logo" width="200">
            </div>

            <div class="card card-danger">
              <div class="card-header" style="min-height: 35px"><h4>Login</h4></div>
              <?php if($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
              <?php } ?>
              <div class="card-body" style="padding-top: 5px;">
                <form method="POST" action="<?php echo site_url(); ?>portal/process" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">Please fill in your email</div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                    	<label for="password" class="control-label">Password</label>
                      <div class="float-right"><a href="<?php echo base_url(); ?>portal/auth_forgot_password" class="text-small">Forgot Password?</a></div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">please fill in your password</div>
                  </div>

                  <div class="form-group">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-control">
                      <option value="student">Student</option>
                      <option value="staff">Staff</option>
                      <option value="department">Department</option>
                    </select>
                    <div class="invalid-feedback">Please fill in your email</div>
                  </div>

                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer" style=" margin-top: 20px; margin-bottom: 20px;">Copyright &copy; <?php echo date('Y');?></div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('portal/_partials/js'); ?>