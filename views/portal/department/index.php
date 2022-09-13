<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	$this->load->view('portal/_partials/header');
	?>
	<!-- Main Content -->
	<div class="main-content">
		<section class="section">
			<div class="section-header"></div>
			<?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success">
		            <a href="#" class="close" data-dismiss="alert">&times;</a>
		            <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
		        </div>
              <?php } ?>
			<div class="section-body">
				<h1>Department</h1>
				<div class="row">
		            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
		              	<a href="<?php echo base_url(); ?>department/outstanding_fees">
		              		<div class="card card-statistic-1">
				             <div class="card-wrap bg-primary">
		                  			<div class="card-header" style="padding-bottom: 40px;padding-top: 40px;">
		                    			<h4 style="font-size: 17px;text-align: center; color: white;">Outstanding Fees</h4>
		                  			</div>
		                		</div>
		              		</div>
		          		</a>
		            </div>
		            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
		              	<a href="<?php echo base_url(); ?>department/fee_paid">
		              		<div class="card card-statistic-1">
				              
				                <div class="card-wrap bg-danger">
				                  	<div class="card-header" style="padding-bottom: 40px;padding-top: 40px;">
				                   		<h4 style="font-size: 17px;text-align: center; color: white;">FEE PAID & RECEIPT</h4>
				                  	</div>
				                </div>
		              		</div>
		              	</a>
		            </div>
		                       
	          	</div>
			</div>
		</section>


     
	</div>



<?php $this->load->view('portal/_partials/footer'); ?>