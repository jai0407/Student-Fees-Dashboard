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
             <a href="<?php echo base_url(); ?>department/dashboard" class="previous" style="color: white;">
            &laquo; Back
           </a>
           </button>
          </>
            <h1 style="padding: 10px;">Fee Paid</h1>
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
                            <th class="text-center">#</th>
                            <th>Unique Ref. Number</th>
                          <!--   <th>Semester Details</th> -->
                             <th>Course Fees</th>
                            <th>Hostel Fees</th>
                            <th>Transport Fees</th>
                            <th>Exam Fees</th>
                            <th>Re-Exam Fees</th>
                             <th>Re-Evaluation Fees</th>
                            <th>Fine Charged</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                          <tbody>
                         <tr>
                           <td>1</td>
                         <td>Cs17101</td> 
                           <td>4000</td>
                           <td>50000</td>
                           <td>4000</td>
                           <td>3000</td>
                           <td>12000</td>
                            <td>4000</td>
                           <td>123000Rs</td>
                           <td>Paid</td>
                           <td>Download</td>

                         </tr>
                         <tr>
                           <td>2</td>
                           <td>Cs17102</td>
                           <td>4000</td>
                           <td>50000</td>
                           <td>4000</td>
                           <td>3000</td>
                           <td>12000</td>
                           <td>123000Rs</td>
                            <td>4000</td>
                           <td>Paid</td>
                           <td>Download</td>

                         </tr>

                         </tbody>
                       <!-- <tbody>  
                          <?php 
                          if (!empty($transaction_details)) {
                            foreach ($transaction_details as $key => $transaction) { 
                              $index = $key+1;
                              ?>                               
                              <tr>
                                <td><?php echo $index;?></td>
                                <td><?php echo $transaction['Unique_Ref_Number'] == ''? "NONE": $transaction['Unique_Ref_Number'] ;?></td>
                                <td><?php echo $transaction['semester_details'];?></td>
                                <td><?php echo $transaction['tution_fee'];?></td>
                                <td><?php echo $transaction['mess_fee'];?></td>
                                <td><?php echo $transaction['hostel_fee'];?></td>
                                <td><?php echo $transaction['medical_insurance_fee'];?></td>
                                <td><?php echo $transaction['Total_Amount'];?></td>
                                <td><?php echo ($transaction['status']) ? $transaction['status'] : "Payment Failed";?></td>
                                <td>
                                  <?php 
                                    if ($transaction['Unique_Ref_Number'] != "" && $transaction['status']=='Paid') {
                                      ?>
                                      <a href="<?php echo site_url().'portal/invoice/'.$transaction['trans_id']; ?>" class="btn btn-primary" target="_blank">Receipt Download</a></td>
                                      <?php    
                                    }
                                  ?>
                              </tr>
                          <?php } 
                          }
                        ?>
                        </tbody>  -->
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