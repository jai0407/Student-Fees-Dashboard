<HTML>
	<HEAD>
		<META http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title><?php echo $title;?></title>
		<style type="text/css">
			body {margin-top: 0px;margin-left: 0px;}
			#page_1 {position:relative; overflow: hidden;margin: auto;padding: 0px;border: none;}
			#page_1 #id1_1 {border:none;margin: 70px 0px 0px 0px;padding: 0px;border:none;overflow: hidden;}
			table{
				width: 100%;
			}
			table tr td{
				padding: 5px;
			}
			table#tbl-footer td {
			    font-size: 12px;
			    margin: 0px;
			    line-height: 1;
			}
		</style>
	</head>	
	<body>
	<?php
		function numberTowords($num) { 
			$ones = array( 
				0 => "ZERO",
				1 => "ONE", 
				2 => "TWO", 
				3 => "THREE", 
				4 => "FOUR", 
				5 => "FIVE", 
				6 => "SIX", 
				7 => "SEVEN", 
				8 => "EIGHT", 
				9 => "NINE", 
				10 => "TEN", 
				11 => "ELEVEN", 
				12 => "TWELVE", 
				13 => "THIRTEEN", 
				14 => "FOURTEEN", 
				15 => "FIFTEEN", 
				16 => "SIXTEEN", 
				17 => "SEVENTEEN", 
				18 => "EIGHTEEN", 
				19 => "NINETEEN" 
			); 
					
			$tens = array( 
				1 => "TEN",
				2 => "TWENTY", 
				3 => "THIRTY", 
				4 => "FORTY", 
				5 => "FIFTY", 
				6 => "SIXTY", 
				7 => "SEVENTY", 
				8 => "EIGHTY", 
				9 => "NINETY" 
			); 
			
			$hundreds = array( 
				"HUNDRED", 
				"THOUSAND", 
				"MILLION", 
				"BILLION", 
				"TRILLION", 
				"QUADRILLION" 
			);

			$num 	   = number_format($num,2,".",","); 
			$num_arr   = explode(".",$num); 
			$wholenum  = $num_arr[0]; 
			$decnum    = $num_arr[1]; 
			$whole_arr = array_reverse(explode(",",$wholenum)); 
			
			krsort($whole_arr); 
			$rettxt    = ""; 
			
			foreach($whole_arr as $key => $i){ 
				if ( $i < 20 ) { 
					$rettxt .= ($i > 0) ? $ones[$i] : ""; 
				} else if ( $i > 20 && $i < 100 ) { 
					$rettxt .= (substr($i,0,1) > 0) ? $tens[substr($i,0,1)] : ""; 
					$rettxt .= (substr($i,1,1) > 0) ? " ".$ones[substr($i,1,1)] : ""; 
				} else { 
					$rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0]; 
					$rettxt .= (substr($i,1,1) > 0) ? " ".$tens[substr($i,1,1)] : ""; 
					$rettxt .= (substr($i,1,1) > 0) ? " " . $ones[substr($i,2,1)] : ""; 
				} 
				
				if($key > 0){ 
					$rettxt .= " ".$hundreds[$key]." "; 
				} 
			} 
			
			if($decnum > 0){ 
				$rettxt .= " and "; 
				if($decnum < 20){ 
					$rettxt .= $ones[$decnum]; 
				}elseif($decnum < 100){ 
					$rettxt .= $tens[substr($decnum,0,1)]; 
					$rettxt .= " ".$ones[substr($decnum,1,1)]; 
				} 
			} 

			return $rettxt; 
		} 

		// $invoice  = current($invoice_details);
		$count = 0;
		?>
		<div id="page_1">
			<div id="id1_1">
				<div class="p0 ft0" style="margin-bottom: 10px;text-align:center">
					<img src="<?php echo base_url();?>assets/img/bimtech.png" alt="logo" width="150">
				</div>
				<p>GSTIN: 09AAATB5507B1Z8</p>
				<table>
					<tr>
						<td colspan="8">
							<p style="text-align: center;"><u>FEES RECEIPT</u></p>
						</td>
					</tr>
					<tr>
						<td colspan="6"><p>Receipt No. : <span><?php echo ($invoice['Unique_Ref_Number']) ? $invoice['Unique_Ref_Number'] : 'NA';?></span></p></td>
						<td><p>Date</p></td>
						<td style="width: 115px;"><p>: <span><?php echo date('d-m-Y', strtotime($invoice['created_at']));?></span></p></td>
					</tr>
					<tr>
						<td colspan="8"><p>Received with thanks from Mr/Mrs <?php echo $user['first_name'];?> Roll Number <?php echo trim($user['roll_number']); ?>, <?php if($user['father_name']){ echo "Son of Mr /Mrs ".$user['father_name']; } ?> towards Fee for <span><?=$user['course']; ?>, <?=($invoice['student_session'])? $invoice['student_session'] :'2019-2021';?></span></p></td>
					</tr>
				</table>
				<table border="1" style="border-collapse: collapse;">
					<tr>
						<td>S.No</td>
						<td colspan="3">Fee Head</td>
						<td colspan="2">Installment</td>
						<td colspan="2">Amount</td>
					</tr>
					<?php if($invoice['tution_fee']>0){ ?>
					<tr>
						<td><?php echo ++$count;?></td>
						<td colspan="3">Tuition Fee</td>
						<td colspan="2">Installment No: <?php echo filter_var($invoice['semester_details'],FILTER_SANITIZE_NUMBER_INT);?></td>
						<td colspan="2"><?php echo $invoice['tution_fee'];?></td>
					</tr>
					<?php } if($invoice['mess_fee']>0){ ?>
					<tr>
						<td><?php echo ++$count;?></td>
						<td colspan="3">Mess Fee</td>
						<td colspan="2">Installment No: <?php echo filter_var($invoice['semester_details'],FILTER_SANITIZE_NUMBER_INT);?></td>>
						<td colspan="2"><?php echo $invoice['mess_fee'];?></td>
					</tr>
					<?php } if($invoice['hostel_fee']>0){ ?>
					<tr>
						<td><?php echo ++$count;?></td>
						<td colspan="3">Hostel Fee</td>
						<td colspan="2">Installment No: <?php echo filter_var($invoice['semester_details'],FILTER_SANITIZE_NUMBER_INT);?></td>
						<td colspan="2"><?php echo $invoice['hostel_fee'];?></td>
					</tr>
					<?php } if($invoice['medical_insurance_fee']>0){ ?>
					<tr>
						<td><?php echo ++$count;?></td>
						<td colspan="3">Medical Insurance Fee</td>
						<td colspan="2">Installment No: <?php echo filter_var($invoice['semester_details'],FILTER_SANITIZE_NUMBER_INT);?></td>
						<td colspan="2"><?php echo $invoice['medical_insurance_fee'];?></td>
					</tr>
					<?php } ?>
					<tr>
						<td>&nbsp;</td>
						<td colspan="3">&nbsp;</td>
						<td colspan="2">&nbsp;</td>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="3">&nbsp;</td>
						<td colspan="2">&nbsp;</td>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td colspan="3">&nbsp;</td>
						<td colspan="2">&nbsp;</td>
						<td colspan="2">&nbsp;</td>
					</tr>
					<tr>
						<td></td>
						<td colspan="3"><b>Total</b></td>
						<td colspan="2"></td>
						<td colspan="2"><b><?php echo $total = $invoice['tution_fee']+$invoice['mess_fee']+$invoice['hostel_fee']+$invoice['medical_insurance_fee']; ?></b></td>
					</tr>
				</table>
				<table id="tbl-footer">	
					<tr>
						<td>Payment Mode: <?php echo ($invoice['Payment_Mode']) ? str_replace('_', ' ', $invoice['Payment_Mode']) : "NA"; ?></td>
						<td>Payment Rs. <span><?php echo $total?></span></td>
						<td>Bank:<span>ICICI</span></td>
						<td>Date:<span><?php echo date('d-m-Y', strtotime($invoice['created_at']));?></span></td>
					</tr>
					<tr>
						<td colspan="4"><p>Pay in Words: <span>INR <?php echo numberTowords($total)?> RUPEES ONLY</span></p></td>
					</tr>
				</table>
				<p style="text-align: right;">For BIRLA INSTITUTE OF MANAGEMENT TECHNOLOGY</p>
				<p style="text-align: right;">Accounts Dept.</p>
				<div style="font-size: 12px;">
					<p style="margin:0px;">** Subject to settlement.</p>
				</div>
				<hr>
				<div style="text-align: center;font-weight: 600;font-size: 12px;">
					<p style="margin:0px;">(A Unit of Birla Academy of Art & Culture, Kolkata)</p>
					<p style="margin:0px;">Plot <span>No-5,</span> Knowledge <span>park-II</span></p>
					<p style="margin:0px;">Institutional Area, Greater Noida</p>
					<p style="margin:0px;">Uttar <span>pradesh-201306</span></p>
					<p style="margin:0px;">State Name : , Code : <span>E-Mail :</span> accounts@bimtech.ac.in</p>
				</div>
			</div>
		</div>
	</body>
</HTML>
<?php ?>