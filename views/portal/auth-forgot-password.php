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
              <div class="card-header"><h4>Forgot Password</h4></div>
              <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>
              <?php }elseif($this->session->flashdata('error')){ ?>
                <div class="alert alert-danger">
                  <a href="#" class="close" data-dismiss="alert">&times;</a>
                  <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
              <?php } ?>
              <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                <form method="POST" action="<?php echo site_url(); ?>portal/forgot_password">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">Forgot Password</button>
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