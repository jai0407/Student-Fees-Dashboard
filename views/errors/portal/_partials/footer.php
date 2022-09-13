<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
	.footer-msg{
		font-size: 18px;
		color: #ff0000;
		text-align: center;
	}
	@media (max-width: 6768{
		.footer-msg{
			font-size: 18px;
			color: #ff0000;
			text-align: left;
		}
	}
</style>
<div class="container">
	<p class="footer-msg">Please verify your personal details before making Payment</p>
</div>
		<footer class="main-footer">
			<div class="footer-left">
				Copyright &copy; <?php echo date('Y'); ?>  
			</div>
			<div class="footer-right"></div>
	  	</footer>
	</div>
</div>
<?php $this->load->view('portal/_partials/js'); ?>