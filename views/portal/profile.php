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
						  	<label for="roll_no">Student ID</label>
						  	<input id="roll_no" type="text" readonly="" class="form-control" name="roll_no" value="<?php echo $userdata[0]['student_unique_id']; ?>">
						</div>
				  	</div>


				  	  	<div class="row">
						<div class="form-group col-md-6">
						  	<label for="user_name">Username</label>
						
						  	<input id="user_name" type="text" class="form-control" name="user_name" value="<?php echo $userdata[0]['user_name']; ?>" >
						</div>
						<div class="form-group col-md-6">
						  	<label for="x_student_reg_number">Student Registration Number</label>
						  	<input id="x_student_reg_number" type="text" readonly="" class="form-control" name="x_student_reg_number" value="<?php echo $userdata[0]['x_student_reg_number']; ?>">
						</div>
				  	</div>

				  	<div class="row">
						<div class="form-group col-md-6">
							<label for="email">Email</label>
						  	<input id="email" type="email" readonly="" disabled="" class="form-control" name="email" value="<?php echo $userdata[0]['email']; ?>">
						</div>
						<div class="form-group col-md-6">
						  	<label for="mobile_number">Mobile Number</label>
						  	<input id="mobile_number" readonly="" type="text" class="form-control" name="mobile_number"  value="<?php echo $userdata[0]['mobile_number']; ?>">
						</div>
					</div>

					<div class="row">
				  		<div class="form-group col-md-6">
							<label for="course">Course</label>
						  	<input id="course" type="text" <?php if($userdata[0]['course']) { echo ""; } ?> class="form-control" name="course" value="<?php echo $userdata[0]['course']; ?>">
						</div>
				  		<div class="form-group col-md-6">
						  	<label for="batch">Batch</label>
						  	<input id="batch" type="text" class="form-control" name="batch"  value="<?=(isset($userdata[0]['batch']) && !empty($userdata[0]['batch']))? $userdata[0]['batch']: ''?>">
						</div>
						
					</div>

					<div class="row">
				  		<div class="form-group col-md-6">
							<label for="gender">Gender</label>
						  	<input id="gender" type="text" readonly="" class="form-control" name="gender" value="<?php echo $userdata[0]['gender']; ?>">
						</div>
				  		<div class="form-group col-md-6">
							<label for="birth_date">Date of birth</label>
						  	<input id="birth_date" readonly="" type="text" class="form-control" name="birth_date" value="<?php $date = $userdata[0]['birth_date'];
						  	echo date("d F, Y", strtotime($date)); ?>">
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