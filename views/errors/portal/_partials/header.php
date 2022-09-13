<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title><?php echo $title; ?></title>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/fontawesome/css/all.min.css">
<?php if ($this->uri->segment(2) == "bootstrap_card") { ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/chocolat/portal/css/chocolat.css">
<?php }elseif ($this->uri->segment(2) == "bootstrap_modal") { ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/prism/prism.css">
<?php }elseif ($this->uri->segment(2) == "auth_login") { ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/modules/bootstrap-social/bootstrap-social.css">
<?php } ?>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/components.css">
</head>

<?php
if ($this->uri->segment(2) != "" && $this->uri->segment(2) != "index" && $this->uri->segment(2) != "auth_forgot_password" && $this->uri->segment(2) != "auth_reset_password" && $this->uri->segment(2) != "errors_404") {
	$this->load->view('portal/_partials/layout');
	$this->load->view('portal/_partials/sidebar');
}
?>