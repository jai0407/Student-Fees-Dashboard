 <?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('portal/_partials/header');
?>
<style type="text/css">
  .table:not(.table-sm):not(.table-md):not(.dataTable) td, .table:not(.table-sm):not(.table-md):not(.dataTable) th {
    padding: 0px 10px !important;
}
</style>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
             <button class="btn btn-danger btn-sm col-xs-2 margin-left" style="color: white;">
             <a href="<?php echo base_url(); ?>portal/dashboard" class="previous" style="color: white;">
            &laquo; Back
           </a>
           </button>
          </>
            <h1 style="padding: 10px;"><?php echo $title; ?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?php echo $title; ?></div>
            </div>
          </div>

          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">Student ID</th>
                            <th>Student Course</th>
                          <!--   <th>Semester Details</th> -->
                             <th>Student Semester</th>
                            <th>Tution Fees</th>
                            <th>Mess Fees</th>
                            <th>Hostel Fees</th>
                            <th>Medical Fee Fees</th>
                           <!--  <th>Exam Fees</th>
                            <th>Re-Exam Fees</th>
                             <th>Re-Evaluation Fees</th>
                            <th>Fine Charged</th> -->
                              <th>Payment Date</th>
                            <th>Status</th>
                            <th>Action</th>
                            
                          </tr>
                        </thead>

                                          <tbody>
                                                <?php
                                                if (!empty($semester_fee_tbl_paid_log)) {
                                                    foreach ($semester_fee_tbl_paid_log as $paid_fee) : ?>
                                                     <tr>
                                                            <td>
                                                                <?php
                                                                echo $paid_fee->student_id;
                                                                ?>
                                                            </td>  
                                                             <td>
                                                                <?php
                                                                echo $paid_fee->student_course;
                                                                ?>
                                                            </td>
                                                             <td>
                                                                <?php
                                                                echo $paid_fee->student_semester;
                                                                ?>
                                                            </td>
                                                             <td>
                                                                <?php
                                                                echo $paid_fee->tution_fee;
                                                                ?>
                                                            </td>
                                                             <td>
                                                                <?php
                                                                echo $paid_fee->mess_fee;
                                                                ?>
                                                            </td>
                                                             <td>
                                                                <?php
                                                                echo $paid_fee->hostel_fee;
                                                                ?>
                                                            </td>
                                                        
                                                             <td>
                                                                <?php
                                                                echo $paid_fee->medical_insurance_fee;
                                                                ?>
                                                            </td>
                                                               <td>
                                                                <?php
                                                                $date = $paid_fee->payment_date;
                                                                 echo date("d F, Y", strtotime($date));
                                                                ?>
                                                            </td>
                                                             <td>
                                                                <?php
                                                                echo $paid_fee->payment_status;
                                                                ?>
                                                            </td>   

                                                            <td>Download Receipt</td>

                                              </tr>
                                                <?php endforeach;
                                                } else {
                                                    echo "There have no data";
                                                } ?>

                         </tbody>
                      
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
<?php $this->load->view('portal/_partials/footer'); ?>