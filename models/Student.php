<?php 


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Model {

	function getUsers( $user = Null ) {
 
		$response = array();
 
		// Select record
		$this->db->select('*');
		$this->db->where(['email' => $user]);
		$q = $this->db->get('student_tbl');
		$response = $q->result_array();

		return $response;
	}


	function getUserbyrollnumber( $user = Null ) {
 
		$response = array();

		// Select record
		$this->db->select('*');
		$this->db->where('roll_number', $user);
		$q = $this->db->get('student_tbl');
		$response = $q->result_array();
		return $response;
	}

	function checkUsers($email , $password ) {
 
		$response = array();
 
		// Select record
		$this->db->select('*');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$response = $this->db->count_all_results('student_tbl');
		return $response;
	}

	function updateUser($user = array()) {
		$response = array();
		$array = array('email' => $user['email']);
		$this->db->where($array);
		
		$response = $this->db->update('student_tbl', $user);
		return $response;
	}



	
}