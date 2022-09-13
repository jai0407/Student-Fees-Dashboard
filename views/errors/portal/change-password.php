<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('portal/_partials/header');
	?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header"><h1><?php echo $title; ?></h1></div>

			<div class="section-body">
				<form method="POST" action="<?php echo site_url(); ?>portal/auth_change_password">
                  <div class="form-group">
                    <label for="password">New Password</label>
                    <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <label for="password-confirm">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="confirm-password" tabindex="2" required>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" style="max-width: 150px;">Reset Password</button>
                  </div>
                </form>
			</div>
		</section>
	</div>
<?php $this->load->view('portal/_partials/footer'); ?>