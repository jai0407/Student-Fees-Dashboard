<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('portal/_partials/header');
?>
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?php echo base_url(); ?>assets/img/bimtech.png" alt="logo" width="250">
            </div>

            <div class="card card-primary">
              <div class="card-header"><h4>Reset Password</h4></div>

              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST" action="<?php echo site_url(); ?>portal/reset_password">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                    <div id="pwindicator" class="pwindicator">
                      <div class="bar"></div>
                      <div class="label"></div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Reset Password
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">Copyright &copy; <?php echo date('Y');?></div>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php $this->load->view('portal/_partials/js'); ?>