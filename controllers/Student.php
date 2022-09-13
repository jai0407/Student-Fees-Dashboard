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
        redirect(site_url().'portal/dashboard',$data);
    }

}