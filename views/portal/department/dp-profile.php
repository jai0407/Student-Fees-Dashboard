<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('portal/_partials/header');
	?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
       <div class="section-header"><h1>Profile</h1></div>
			<div class="section-body">
				<form method="POST" action="#">
				  	<div class="row">
						<div class="form-group col-md-6">
						  	<label for="first_name">Name</label>
						
						  	<input id="first_name" type="text" class="form-control" name="first_name" value="Kishor Dhakad" >
						</div>
						<div class="form-group col-md-6">
						  	<label for="roll_no">Email</label>
						  	<input id="roll_no" type="text" readonly="" class="form-control" name="roll_no" value="kishor1@gmail.com">
						</div>
				  	</div>

				  	<div class="row">
						<div class="form-group col-md-6">
							<label for="email">UserName</label>
						  	<input id="email" type="email" readonly="" disabled="" class="form-control" name="email" value="Kishor_12">
						</div>
						<div class="form-group col-md-6">
						  	<label for="mobile_number">Mobile Number</label>
						  	<input id="mobile_number" readonly="" type="text" class="form-control" name="mobile_number"  value="989898855">
						</div>
					</div>

					<div class="row">
				  		<div class="form-group col-md-6">
							<label for="alternate_number">Alternate Number</label>
						  	<input id="alternate_number" type="text"  class="form-control" name="alternate_number" value="343356536">
						</div>
				  		<div class="form-group col-md-6">
						  	<label for="landline">Landline</label>
						  		<input id="alternate_number" type="text"  class="form-control" name="alternate_number" value="+544559747">
						</div>
						
					</div>

					<div class="row">
				  		<div class="form-group col-md-6">
							<label for="category">Category</label>
						  	<input id="category" type="text" readonly="" class="form-control" name="category" value="India">
						</div>
				  		<div class="form-group col-md-6">
							<label for="course">Category</label>
						  	<input id="course" readonly="" type="text" class="form-control" name="course" value="Department">
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