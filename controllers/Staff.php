<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Staff extends CI_Controller
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
       
        redirect(site_url().'staff/dashboard');
    }
    public function dashboard()
    {
       	$user = $this->session->userdata('user_sassion');
        $userdata = $this->Student->getUsers($user);
        $data = array( 'title' => "Dashboard", 'userdata' => $userdata );
        $this->load->view('portal/staff/index'); 
    }
     public function outstanding_fees()
    {
        if ($this->session->userdata('user_sassion')) {
            $user = $this->session->userdata('user_sassion');
            $userdata = $this->Student->getUsers($user);

            $data_semester = $this->Semester_details->getSemesterFee($userdata[0]['roll_number'], '');
            $data = array( 'title' => "Installment Detail", 'userdata' => $userdata, 'Semester_details' => $data_semester );
            $this->load->view('portal/staff/outstanding-fees', $data);
        } else {
            redirect(site_url());
        }
    }

    public function fee_paid()
    {
        if ($this->session->userdata('user_sassion')) {
            $user = $this->session->userdata('user_sassion');
            $userdata = $this->Student->getUsers($user);
            $transaction_details = $this->Semester_details->getTransactionDetails($userdata[0]['id']);
            $data = array( 'title' => "Transaction List", 'userdata' => $userdata, 'transaction_details' => $transaction_details );
            $this->load->view('portal/staff/fee-paid', $data);
        } else {
            redirect(site_url());
        }
    }

        public function staff_profile()
    {
        // if ($this->session->userdata('user_sassion')) {
        //     $user = $this->session->userdata('user_sassion');
        //     $userdata = $this->Student->getStaff($user);
        //     $data = array( 'title' => "Profile", 'userdata' => $userdata );
            $this->load->view('portal/staff/staff-profile');
        // } else {
        //     redirect(site_url());
        // }
    }
}










