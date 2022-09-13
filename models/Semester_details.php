<?php 


if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Semester_details extends CI_Model {

    function getSemesterFee($user = ''){
        $response = array();
        $this->db->select('*');
        if($user){
    		$this->db->where(['student_id' => $user]);
        }

        $q = $this->db->get('semester_fee_tbl');
        $response = $q->result_array();
        return $response;
    }

    function getSemesterFeeUseingID($id){
        $response = array();
        
        $this->db->select('*');
        $this->db->where(['f_id' => $id]);
        
        $q = $this->db->get('semester_fee_tbl');
        $response = $q->result_array();
        return $response;
    }

    function getTransactionDetails($user = NULL){
        $response = array();
        $this->db->select('*');
        if($user){
            $this->db->where(['student_id' => $user]);
        }

        $q = $this->db->get('transaction_tbl');
        $response = $q->result_array();
        return $response;
    }

    function getTransactionDetailsWithRef($ref_no){
        $response = array();
        $this->db->select('*');
        if($ref_no){
            $this->db->where('ReferenceNo',$ref_no);
        }

        $q = $this->db->get('transaction_tbl');
        $response = $q->result_array();
        return $response;
    }

    function getInvoice( $_ress ) {
        $this->db->select('*');
        $this->db->where('trans_id', $_ress);
        $q = $this->db->get('transaction_tbl');
        $response = $q->result_array();
        
        return $response;
    }

    function storeInvoiiceResponse($request){
        $data['response'] = json_encode($request);
        $this->db->insert('talley_transaction_tbl',$data);
    }

    function storeTransactionDetails($request){
        $response = $this->db->insert('transaction_tbl',$request);
        return $response;
    }

    function updateTransactionDetails($request,$ref_no){
        $this->db->where('ReferenceNo', $ref_no);
        $response = $this->db->update('transaction_tbl',$request);
        return $response;
    }

    function updateStudentSemesterDetails($request,$trans_id){
        $this->db->where('f_id', $trans_id);
        $response = $this->db->update('semester_fee_tbl',$request);
        return $response;
    }

    function get_installment_details($student_id='', $semester='', $trans_id = '')
    {
        if ($student_id > 0 && $semester != '' && $trans_id != '' ) {
            $this->db->select('*');
            $this->db->where('student_id', $student_id);
            $this->db->where('semester_details', $semester);
            $this->db->where('status', 'Paid');
            $this->db->where('trans_id <', $trans_id);
            $q = $this->db->get('transaction_tbl');
            $response = $q->result_array();           
            return $response;
        }

        return array();
    }

   function getPaidFeeDeatails()
    {
        $this->db->select('student_tbl.* , semester_fee_tbl_paid_log.*');
        $this->db->from('student_tbl');
        $this->db->JOIN('semester_fee_tbl_paid_log', 'student_tbl.id = semester_fee_tbl_paid_log.student_id', 'LEFT');
          $query = $this->db->get();

        if ($query->num_rows() != 0) {
          return $query->result();
        } else {
          return false;
        }

     }

        function getSemesterFeeDeatails()
    {
        $this->db->select('student_tbl.* , semester_fee_tbl.*');
         $this->db->from('student_tbl');
         $this->db->JOIN('semester_fee_tbl', 'student_tbl.id = semester_fee_tbl.student_id', 'LEFT');
        $query = $this->db->get();

        if ($query->num_rows() != 0) {
          return $query->result();
        } else {
          return false;
        }

     }


}