<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('portal/_partials/header');
	?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header"><h1><?php echo $title; ?></h1></div>

			<div class="section-body">
				<form method="POST" action="<?php echo site_url(); ?>portal/update">
				  	<div class="row">
						<div class="form-group col-md-6">
						  	<label for="first_name">Name</label>
						
						  	<input id="first_name" type="text" class="form-control" name="first_name" value="<?php echo $userdata[0]['first_name']; ?>" >
						</div>
						<div class="form-group col-md-6">
						  	<label for="roll_no">Roll No.</label>
						  	<input id="roll_no" type="text" readonly="" class="form-control" name="roll_no" value="<?php echo $userdata[0]['roll_number']; ?>">
						</div>
				  	</div>

				  	<div class="row">
						<div class="form-group col-md-6">
							<label for="email">UserName</label>
						  	<input id="email" type="email" readonly="" disabled="" class="form-control" name="email" value="<?php echo $userdata[0]['email']; ?>">
						</div>
						<div class="form-group col-md-6">
						  	<label for="mobile_number">Mobile Number</label>
						  	<input id="mobile_number" readonly="" type="text" class="form-control" name="mobile_number"  value="<?php echo $userdata[0]['mobile_number']; ?>">
						</div>
					</div>

					<div class="row">
				  		<div class="form-group col-md-6">
							<label for="alternate_number">Alternate Number</label>
						  	<input id="alternate_number" type="text" <?php if($userdata[0]['alternate_number']) { echo ""; } ?> class="form-control" name="alternate_number" value="<?php echo $userdata[0]['alternate_number']; ?>">
						</div>
				  		<div class="form-group col-md-6">
						  	<label for="landline">Landline</label>
						  	<input id="landline" type="text" class="form-control" name="landline"  value="<?=(isset($userdata[0]['landline']) && !empty($userdata[0]['landline']))? $userdata[0]['landline']: ''?>">
						</div>
						
					</div>

					<div class="row">
				  		<div class="form-group col-md-6">
							<label for="category">Category</label>
						  	<input id="category" type="text" readonly="" class="form-control" name="category" value="<?php echo $userdata[0]['category']; ?>">
						</div>
				  		<div class="form-group col-md-6">
							<label for="course">Course</label>
						  	<input id="course" readonly="" type="text" class="form-control" name="course" value="<?php echo $userdata[0]['course']; ?>">
						</div>
					</div>
					
				  	<div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block" style="max-width: 100px">Save</button>
				  	</div>
				</form>
			</div>
		</section>
	</div>
<?php $this->load->view('portal/_partials/footer'); ?>