<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$customer_name = '';
if ( $this->session->userdata['user_sassion'] ) {
	$user = $this->session->userdata['user_sassion'];
	$userdata = $this->Student->getUsers($user);
	$customer_name = $userdata[0]['first_name'].' '.$userdata[0]['last_name'];
}
?>

<body>
  	<div id="app">
		<div class="main-wrapper main-wrapper-1">
	  		<div class="navbar-bg" style="background-color: #fc544b;"></div>
			  	<nav class="navbar navbar-expand-lg main-navbar">
			  		<ul class="navbar-nav mr-3">
			            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
			        </ul>
			        <h1 style="color: white;">Dashboard</h1>
				<!-- 	<ul class="navbar-nav navbar-right ml-5">
				  		<li class="dropdown">
				  			<a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
								<img alt="image" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
								<div class="d-sm-none d-lg-inline-block"><?php echo $customer_name;?></div>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
							  	<a href="#" class="dropdown-item has-icon">
									<i class="far fa-user"></i> Profile
							  	</a>
							 	<a href="<?php //echo base_url(); ?>portal/index" class="dropdown-item has-icon">
									<i class="far fa-user"></i> Profile
							  	</a>
							  	<div class="dropdown-divider"></div>
							  	<a href="<?php echo base_url(); ?>portal/logout" class="dropdown-item has-icon text-danger">
									<i class="fas fa-sign-out-alt"></i> Logout
							  	</a>
							</div>
				  		</li>
				  		<li class="nav-item active">
					        <a class="nav-link" href="#"><?php //echo 'Roll NO: '.$userdata[0]['roll_number']; ?> <span class="sr-only"></span></a>
					    </li>
					    <li class="nav-item active">
					        <a class="nav-link" href="#"><?php //echo 'Mobile Number: '.$userdata[0]['mobile_number']; ?> <span class="sr-only"></span></a>
					    </li>
					</ul> -->
			  	</nav>
