<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Portal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load model
        $this->load->model('Student');
        $this->load->model('Semester_details');
        $this->load->helper('cookie');
    }

    public function index()
    {
        if ($this->session->userdata('user_sassion')) {
            redirect(site_url().'portal/dashboard');
        } else {
            $data = array( 'title' => "Login" );
            $this->load->view('portal/auth-login', $data);
        }
    }

    public function profile()
    {
        if ($this->session->userdata('user_sassion')) {
            $user = $this->session->userdata('user_sassion');
            $userdata = $this->Student->getUsers($user);
            $data = array( 'title' => "Profile", 'userdata' => $userdata );
            $this->load->view('portal/profile', $data);
        } else {
            redirect(site_url());
        }
    }

    public function auth_forgot_password()
    {
        $data = array( 'title' => "Forgot Password" );
        $this->load->view('portal/auth-forgot-password', $data);
    }

    public function change_password()
    {
        $data = array( 'title' => "Forgot Password" );
        $this->load->view('portal/change-password', $data);
    }
    
    public function forgot_password()
    {
        $data = array( 'title' => "Forgot Password" );

        require_once(APPPATH.'third_party/phpmailer_emails/class.phpmailer.php');
        require_once(APPPATH.'third_party/phpmailer_emails/class.pop3.php');
        require_once(APPPATH.'third_party/phpmailer_emails/class.smtp.php');

        $from_email = "fees@bimtech.ac.in";
        $user_pass  = '9811575430';
        $to_email   = $this->input->post('email');

        $mail = new PHPMailer();
        $mail->IsSMTP(); /* we are going to use SMTP */
        $mail->Mailer     = 'smtp';
        $mail->SMTPAuth   = true; /* enabled SMTP authentication */
        $mail->SMTPSecure = "tls";  /* prefix for secure protocol to connect to the server */
        $mail->Host       = "smtp.gmail.com";      /* setting GMail as our SMTP server */
        $mail->Port       = 587;                   /* SMTP port to connect to GMail */
        $mail->Username   = 'fees@bimtech.ac.in';  /* user email address */
        $mail->Password   = '9811575430';            /* password in GMail */
        $mail->SetFrom('fees@bimtech.ac.in', 'Bimtech');  /* Who is sending */
        $mail->isHTML(true);
        $mail->Subject    = "Forgot Password - Bimtech";
        $mBody            = 'Forgot password reset here. url: '.site_url().'portal/auth_reset_password';
        $mail->Body       = $mBody;
        $mail->MsgHTML($mBody);
        $mail->AddAddress($to_email, $to_email);
        
        if (!$mail->Send()) {
            $this->session->set_flashdata("error", "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo);
        } else {
            $this->session->set_flashdata("success", "Email sent successfully.");
        }
    
        redirect(site_url().'portal/auth_forgot_password');
    }

    public function dashboard()
    {
        if ($this->session->userdata('user_sassion')) {
            $user = $this->session->userdata('user_sassion');
            $userdata = $this->Student->getUsers($user);
            $data = array( 'title' => "Dashboard", 'userdata' => $userdata );
            $this->load->view('portal/index', $data);
        } else {
            redirect(site_url());
        }
    }

    public function auth_reset_password()
    {
        $data = array( 'title' => "Reset Password" );
        $this->load->view('portal/auth-reset-password', $data);
    }

    public function semester_details()
    {
        if ($this->session->userdata('user_sassion')) {
            $user = $this->session->userdata('user_sassion');
            $userdata = $this->Student->getUsers($user);

            $data_semester = $this->Semester_details->getSemesterFee($userdata[0]['student_unique_id'], '');
            $data = array( 'title' => "Installment Detail", 'userdata' => $userdata, 'Semester_details' => $data_semester );

         $data['semester_fee_tbl'] = $this->Semester_details->getSemesterFeeDeatails();

            $this->load->view('portal/semester-details', $data);
        } else {
            redirect(site_url());
        }
    }

    public function transaction_details()
    {
        if ($this->session->userdata('user_sassion')) {
            $user = $this->session->userdata('user_sassion');
            $userdata = $this->Student->getUsers($user);
            $transaction_details = $this->Semester_details->getTransactionDetails($userdata[0]['id']);
            $data = array( 'title' => "Transaction List", 'userdata' => $userdata, 'transaction_details' => $transaction_details );

             $data['semester_fee_tbl_paid_log'] = $this->Semester_details->getPaidFeeDeatails();

             // echo "<pre>";
             //  print_r($data['semester_fee_tbl_paid_log']);
             // die('TESTING');


            $this->load->view('portal/transaction-details', $data);
        } else {
            redirect(site_url());
        }
    }

    public function process()
    {
        $role = $this->input->post('role');
        $user = $this->input->post('email');
        $pass = $this->input->post('password');
        $data = $this->Student->checkUsers($user, $pass);
        if ($data) {
            $userdata = array('user_sassion'  => $user, 'user_role'=>$role);
            $this->session->set_userdata($userdata);
            if($role=='staff')
            {
                redirect(site_url().'staff/dashboard');
            }
            elseif ($role=='department') {
                redirect(site_url().'department/dashboard');
             } 
            else {
                redirect(site_url().'portal/dashboard');
            }
            
            
        } else {
            $data['error'] = 'Your Account is Invalid';
            redirect(site_url());
        }
    }

    public function update()
    {
        $user['first_name']       = $this->input->post('first_name');
        $user['batch']       = $this->input->post('batch');
        //$user['roll_no']       = $this->input->post('roll_no');
        $user['x_student_reg_number']       = $this->input->post('x_student_reg_number');

        $user['mobile_number']    = $this->input->post('mobile_number');
        // $user['alternate_number'] = $this->input->post('alternate_number');
        // $user['landline']         = $this->input->post('landline');
        $user['gender']         = $this->input->post('gender');
        $user['course']           = $this->input->post('course');
        $user['email']            = $this->session->userdata('user_sassion');
        $data = $this->Student->updateUser($user);
        if ($data) {
            redirect(site_url().'portal/profile');
        } else {
            $data['error'] = 'Your data is not saved';
            redirect(site_url());
        }
    }

    public function auth_change_password()
    {
        if ($this->input->post('password') != '') {
            $user['password'] = $this->input->post('password');

            $data = $this->Student->updateUser($user);
            if ($data) {
                redirect(site_url().'portal/change_password');
            } else {
                $data['error'] = 'Your data is not saved';
                redirect(site_url().'portal/change_password');
            }
        }
    }
    
    public function logout()
    {
        $this->session->unset_userdata('user_sassion');
        redirect(site_url());
    }

    public function reset_password()
    {
        $user['email'] = $this->input->post('email');
        $user['password'] = $this->input->post('password');
        $data = $this->Student->updateUser($user);
        
        if ($data) {
            redirect(site_url().'portal/dashboard');
        } else {
            $data['error'] = 'Your data is not saved';
            redirect(site_url());
        }
    }
    
    public function eazypayu_aes128Encrypt($plaintext, $key)
    {
        $cipher = "aes-128-ecb";
        if (in_array($cipher, openssl_get_cipher_methods())) {
            $ivlen = openssl_cipher_iv_length($cipher);
            $iv = openssl_random_pseudo_bytes($ivlen);
            $ciphertext = openssl_encrypt($plaintext, $cipher, $key, $options = 0, $iv);
            return $ciphertext;
        }
    }

    public function payment()
    {
      //  $sem_trans_id = $this->input->get('id');

      //  if ($sem_trans_id > 0) {
        //    $data_semester = $this->Semester_details->getSemesterFeeUseingID($sem_trans_id);
       //     $data = array( 'title' => "Payment" , 'fee' => $data_semester);
            $this->load->view('portal/payment');
     //   } else {
       //     redirect('/portal/semester_details');
       // }
    }

    public function fees_pay()
    {
        $data   = base64_decode($this->input->get('q'));
        $param  = array();
        foreach (explode('&', $data) as $key => $value) {
            $parameter = explode('=', $value);
            $param[$parameter[0]] = $parameter[1];
        }

        $user     = $this->session->userdata('user_sassion');
        $userdata = $this->Student->getUsers($user);

        $amount          = $param['total'];
        $merchant_id     = "300499";
        $key             = "3034880504901000";
        $reference_no    = uniqid($userdata[0]['roll_number']."_")."_".$amount;
        $sub_merchant_id = "300499";
        $return_url      = "https://feeportal.bimtech.ac.in/portal/returndata";
        $paymode         = "9";
        
        $transaction = array(
            'student_id'            => $userdata[0]['id'],
            'tution_fee'            => $param['turion_fee'],
            'mess_fee'              => $param['mess_fee'],
            'hostel_fee'            => $param['hostel_fee'],
            'medical_insurance_fee' => $param['medical_fee'],
            'semester_details'      => $param['student_sem'],
            'transaction_id'        => $param['f_id'],
            'ReferenceNo'           => $reference_no,
            'student_course'        => $param['student_course'],
            'student_session'       => $param['student_session'],
        );
        $transdata = $this->Semester_details->storeTransactionDetails($transaction);

        $user_name=substr($userdata[0]['first_name'],0,30);

        $mandatory_fields   = $reference_no ."|".$sub_merchant_id ."|".$amount."|".$user_name."|".$userdata[0]['roll_number']."|Semester";
        
        $opt_fields         = "";
        
        $e_sub_merchant_id  = $this->eazypayu_aes128Encrypt($sub_merchant_id, $key);
        $e_reference_no     = $this->eazypayu_aes128Encrypt($reference_no, $key);
        $e_amount           = $this->eazypayu_aes128Encrypt($amount, $key);
        $e_return_url       = $this->eazypayu_aes128Encrypt($return_url, $key);
        $e_paymode          = $this->eazypayu_aes128Encrypt($paymode, $key);
        $e_mandatory_fields = $this->eazypayu_aes128Encrypt($mandatory_fields, $key);
        
        $button_code = 'https://eazypay.icicibank.com/EazyPG?merchantid='.strval($merchant_id).'&mandatory fields='.strval($e_mandatory_fields).'&optional fields='.strval($opt_fields).'&returnurl='.strval($e_return_url).'&Reference No='.strval($e_reference_no).'&submerchantid='.strval($e_sub_merchant_id).'&transaction amount='.strval($e_amount).'&paymode='.strval($e_paymode).'"';
        
        // echo 'https://eazypay.icicibank.com/EazyPG?merchantid='.$merchant_id.'&mandatory fields='.$mandatory_fields.'&optional fields='.$opt_fields.'&returnurl='.$return_url.'&Reference No='.$reference_no.'&submerchantid='.$sub_merchant_id.'&transaction amount='.$amount.'&paymode='.$paymode.'"';
        // echo "<br>";
        // echo $button_code;
        redirect($button_code);
    }

    public function returndata()
    {
        //echo "<pre>"; var_dump($_REQUEST); echo "</pre>"; exit(); die();
        $invoice_details = $this->Semester_details->storeInvoiiceResponse($_REQUEST);
        
        $status                = (isset($_REQUEST['Response_Code']) && $_REQUEST['Response_Code'] == 'E000') ? 'Paid' : 'Not Paid';
        $Unique_Ref_Number     = array_key_exists("Unique_Ref_Number", $_REQUEST) ? $_REQUEST['Unique_Ref_Number'] : "";
        $Service_Tax_Amount    = array_key_exists("Service_Tax_Amount", $_REQUEST) ? $_REQUEST['Service_Tax_Amount'] : "";
        $Processing_Fee_Amount = array_key_exists("Processing_Fee_Amount", $_REQUEST) ? $_REQUEST['Processing_Fee_Amount'] : "";
        $Transaction_Amount    = array_key_exists("Transaction_Amount", $_REQUEST) ? $_REQUEST['Transaction_Amount'] : "";
        $Transaction_Date      = array_key_exists("Transaction_Date", $_REQUEST) ? $_REQUEST['Transaction_Date'] : "";
        $Total_Amount          = array_key_exists("Total_Amount", $_REQUEST) ? (float)$_REQUEST['Total_Amount'] : "";
        
        $request = array(
            'Response_Code'         => $_REQUEST['Response_Code'],
            'Unique_Ref_Number'     => $Unique_Ref_Number,
            'Service_Tax_Amount'    => $Service_Tax_Amount,
            'Processing_Fee_Amount' => $Processing_Fee_Amount,
            'Transaction_Amount'    => date('Y-m-d', strtotime($Transaction_Amount)),
            'Transaction_Date'      => $Transaction_Date,
            'Interchange_Value'     => $_REQUEST['Interchange_Value'],
            'TDR'                   => $_REQUEST['TDR'],
            'Payment_Mode'          => $_REQUEST['Payment_Mode'],
            'SubMerchantId'         => $_REQUEST['SubMerchantId'],
            'ID'                    => $_REQUEST['ID'],
            'RS'                    => $_REQUEST['RS'],
            'TPS'                   => $_REQUEST['TPS'],
            'mandatory_fields'      => $_REQUEST['mandatory_fields'],
            'optional_fields'       => $_REQUEST['optional_fields'],
            'RSV'                   => $_REQUEST['RSV'],
            'Total_Amount'          => $Total_Amount,
            'status'                => $status,
        );
        
        $datafields = explode("|", $_REQUEST['mandatory_fields']);
        if (!empty($datafields) && isset($datafields[4])) {
            $rollno = $datafields[4];
        } else {
            $d_data = explode("_", $datafields[0]);
            $rollno = $d_data[0];
        }

        $userfields = $this->Student->getUserbyrollnumber($rollno);
        $update = $this->Semester_details->updateTransactionDetails($request, $_REQUEST['ReferenceNo']);
        // $session_userdata = base64_decode(htmlentities($this->input->cookie('User_session', true)));
        $session_user = $userfields[0]['email'];
        $userdata = array('user_sassion'  => $userfields[0]['email']);
        $this->session->set_userdata($userdata);
        if ($status == 'Paid') {
            
            $student = $this->Semester_details->getTransactionDetailsWithRef($_REQUEST['ReferenceNo']);
            $student_sem = $this->Semester_details->getSemesterFeeUseingID($student[0]['transaction_id']);
            
            $tution_fee_paid = $student_sem[0]['tution_fee_paid'] + $student[0]['tution_fee'];
            $mess_fee_paid = $student_sem[0]['mess_fee_paid'] + $student[0]['mess_fee'];
            $hostel_fee_paid = $student_sem[0]['hostel_fee_paid'] + $student[0]['hostel_fee'];
            $medical_insurance_fee_paid = $student_sem[0]['medical_insurance_fee_paid'] + $student[0]['medical_insurance_fee'];
            //$student_fee = $student_sem[0]['tution_fee']+$student_sem[0]['mess_fee']+$student_sem[0]['hostel_fee']+$student_sem[0]['medical_insurance_fee'];
            //$student_paid_fee = $tution_fee_paid+$mess_fee_paid+$hostel_fee_paid+$medical_insurance_fee_paid;
            //$fee_status =  $student_paid_fee >= $student_fee ? "Paid" : "Not Paid";


            $studentSemUpdate = array(
                'tution_fee_paid'            => $tution_fee_paid,
                'mess_fee_paid'              => $mess_fee_paid,
                'hostel_fee_paid'            => $hostel_fee_paid,
                'medical_insurance_fee_paid' => $medical_insurance_fee_paid,
                'payment_status'             => 'Paid',
                'payment_refno'              => $student[0]['Unique_Ref_Number'],
                'payment_date'               => date('Y-m-d', strtotime($Transaction_Date)),
            );

            $data = $this->Semester_details->updateStudentSemesterDetails($studentSemUpdate, $student[0]['transaction_id']);
                
            $invoice_details = $this->Semester_details->getInvoice($student[0]['trans_id']);

            $userdetail = $this->Student->getUsers($session_user);

            $pre_transactions = $this->Semester_details->get_installment_details($invoice_details[0]['student_id'], $invoice_details[0]['semester_details'], $invoice_details[0]['trans_id']);

            $installment = array(
                'tution_fee' => 0,
                'mess_fee' => 0,
                'hostel_fee' => 0,
                'medical_insurance_fee' => 0
            );
            if (!empty($pre_transactions)) {
                foreach ($pre_transactions as $key => $transaction) {
                    if ($transaction['tution_fee'] > 0) {
                        $installment['tution_fee'] += 1;
                    }

                    if ($transaction['mess_fee'] > 0) {
                        $installment['mess_fee'] += 1;
                    }

                    if ($transaction['hostel_fee'] > 0) {
                        $installment['hostel_fee'] += 1;
                    }

                    if ($transaction['medical_insurance_fee'] > 0) {
                        $installment['medical_insurance_fee'] += 1;
                    }
                }
            }

            $invoice_details[0]['installment'] = $installment;

            $invoice_data = array( 'title' => "Invoice" , 'invoice' => $invoice_details[0], 'user'=>$userdetail[0], );
            $mesg = $this->load->view('portal/invoice_print', $invoice_data, true);
            
            $this->load->library('pdf');
            
            $dompdf = new PDF();
            $dompdf->load_html($mesg);
            $dompdf->set_paper('A4', 'portrait');
            $dompdf->set_option('isHtml5ParserEnabled', true);
            $dompdf->set_option('isRemoteEnabled', true); 
            $dompdf->render();
            // $dompdf->stream('test.pdf', array("Attachment"=>0));
            $output = $dompdf->output();
            file_put_contents('upload_invoices/'.$_REQUEST['ReferenceNo'].'.pdf', $output);

            require_once(APPPATH.'third_party/phpmailer_emails/class.phpmailer.php');
            require_once(APPPATH.'third_party/phpmailer_emails/class.pop3.php');
            require_once(APPPATH.'third_party/phpmailer_emails/class.smtp.php');

            $from_email = "fees@bimtech.ac.in";
            $user_pass  = '9811575430';
            $to_email   = $userdetail[0]['email'];
            
            $mail = new PHPMailer();
            $mail->IsSMTP(); /* we are going to use SMTP */
            $mail->Mailer     = 'smtp';
            $mail->SMTPAuth   = true; /* enabled SMTP authentication */
            $mail->SMTPSecure = "tls";  /* prefix for secure protocol to connect to the server */
            $mail->Host       = "smtp.gmail.com";      /* setting GMail as our SMTP server */
            $mail->Port       = 587;                   /* SMTP port to connect to GMail */
            $mail->Username   = 'fees@bimtech.ac.in';  /* user email address */
            $mail->Password   = '9811575430';            /* password in GMail */
            $mail->SetFrom('fees@bimtech.ac.in', 'Bimtech');  /* Who is sending */
            $mail->isHTML(true);
            $mail->Subject    = "Transction Successfull";
            $mBody            = 'Your payment Is successfully Done.This is your transaction ID:- '.$_REQUEST['ReferenceNo'];
            $mail->Body       = $mBody;
            $mail->MsgHTML($mBody);
        
            $mail->AddAddress($to_email, $to_email);
            $mail->addCC("fees@bimtech.ac.in");
            
            $mail->AddAttachment('upload_invoices/'.$_REQUEST['ReferenceNo'].'.pdf');
            if (!$mail->Send()) {
                echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent ";
            }
        }
        
        redirect(site_url().'portal/semester_details');
    }

    public function invoice($id)
    {
        if ($id > 0) {
            $user = $this->session->userdata('user_sassion');
            $userdata = $this->Student->getUsers($user);
            
            $invoice_details = $this->Semester_details->getInvoice($id);

            $pre_transactions = $this->Semester_details->get_installment_details($invoice_details[0]['student_id'], $invoice_details[0]['semester_details'], $invoice_details[0]['trans_id']);

            $installment = array(
                'tution_fee' => 0,
                'mess_fee' => 0,
                'hostel_fee' => 0,
                'medical_insurance_fee' => 0
            );
            if (!empty($pre_transactions)) {
                foreach ($pre_transactions as $key => $transaction) {
                    if ($transaction['tution_fee'] > 0) {
                        $installment['tution_fee'] += 1;
                    }

                    if ($transaction['mess_fee'] > 0) {
                        $installment['mess_fee'] += 1;
                    }

                    if ($transaction['hostel_fee'] > 0) {
                        $installment['hostel_fee'] += 1;
                    }

                    if ($transaction['medical_insurance_fee'] > 0) {
                        $installment['medical_insurance_fee'] += 1;
                    }
                }
            }

            $invoice_details[0]['installment'] = $installment;

            $data = array( 'title' => "Invoice" , 'invoice' => $invoice_details[0], 'user'=>$userdata[0], );

            // echo "<pre>";

            // print_r($data);

            // die('-ss');

            $this->load->view('portal/invoice', $data);
        } else {
            redirect(site_url().'portal/transaction_details');
        }
    }

    function mail_test()
    {
         require_once(APPPATH.'third_party/phpmailer_emails/class.phpmailer.php');
            require_once(APPPATH.'third_party/phpmailer_emails/class.pop3.php');
            require_once(APPPATH.'third_party/phpmailer_emails/class.smtp.php');

            $from_email = "fees@bimtech.ac.in";
            $user_pass  = '9811575430';
            $to_email   = 'sahu.suraj@hotmail.com';
            
            $mail = new PHPMailer();
            $mail->IsSMTP(); /* we are going to use SMTP */
            $mail->Mailer     = 'smtp';
            $mail->SMTPAuth   = true; /* enabled SMTP authentication */
            $mail->SMTPSecure = "tls";  /* prefix for secure protocol to connect to the server */
            $mail->Host       = "smtp.gmail.com";      /* setting GMail as our SMTP server */
            $mail->Port       = 587;                   /* SMTP port to connect to GMail */
            $mail->Username   = 'fees@bimtech.ac.in';  /* user email address */
            $mail->Password   = '9811575430';            /* password in GMail */
            $mail->SetFrom('fees@bimtech.ac.in', 'Bimtech');  /* Who is sending */
            $mail->isHTML(true);
            $mail->Subject    = "Transction Successfull";
            $mBody            = 'Your payment Is successfully Done.This is your transaction ID:- 2123_6009844f2c347_2 (copy)';
            $mail->Body       = $mBody;
            $mail->MsgHTML($mBody);
        
            $mail->AddAddress($to_email, $to_email);
            $mail->addCC("suraj.ampleebusiness@gmail.com");
            $mail->addCC("yash.amplewebservices@gmail.com");
            
            $mail->AddAttachment('upload_invoices/2123_6009844f2c347_2.pdf');
            if (!$mail->Send()) {
                echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message sent ";
            }
    }
}
