<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('portal/_partials/header');

?>
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
                            <th class="text-center">#</th>
                            <th>Semesters</th>
                            <th>Course Fees</th>
                            <th>Hostel Fees</th>
                            <th>Transport Fees</th>
                            <th>Exam Fees</th>
                            <th>Re-Exam Fees</th>
                             <th>Re-Evaluation Fees</th>
                            <th>Fine Charged</th>
                            <th>Due Date</th>
                            <th>Action</th>
                          </tr>
                        </thead>

                        <tbody>
                         <tr>
                           <td>1</td>
                           <td>SEM1</td>
                           <td>50000</td>
                           <td>4000</td>
                           <td>3000</td>
                           <td>12000</td>
                          <td>50000</td>
                           <td>4000</td>
                           <td>Due</td>
                           <td>12-04-2021</td>
                            <td><a href="<?php echo base_url(); ?>portal/payment">PAY NOW</a></td>

                         </tr>
                          <tr>
                           <td>2</td>
                           <td>SEM2</td>
                           <td>50000</td>
                           <td>4000</td>
                           <td>3000</td>
                           <td>12000</td>
                             <td>50000</td>
                           <td>4000</td>
                           <td>Due</td>
                           <td>12-04-2021</td>
                            <td><a href="<?php echo base_url(); ?>portal/payment">PAY NOW</a></td>

                         </tr>
                             <tr>
                           <td>3</td>
                           <td>SEM3</td>
                           <td>50000</td>
                           <td>4000</td>
                           <td>3000</td>
                           <td>12000</td>
                             <td>50000</td>
                           <td>4000</td>
                           <td>Due</td>
                           <td>12-04-2021</td>
                            <td><a href="<?php echo base_url(); ?>portal/payment">PAY NOW</a></td>

                         </tr>
                             <tr>
                           <td>4</td>
                           <td>SEM4</td>
                           <td>50000</td>
                           <td>4000</td>
                           <td>3000</td>
                             <td>50000</td>
                           <td>4000</td>
                           <td>12000</td>
                           <td>Due</td>
                           <td>12-04-2021</td>
                           <td><a href="<?php echo base_url(); ?>portal/payment">PAY NOW</a></td>

                         </tr>

                         </tbody>



                       <!-- <tbody>                                 
                          <?php foreach ($Semester_details as $key => $value) { 
                            $index = $key+1; ?>
                          <tr>
                            <td><?php echo $index; ?></td>
                            <td><?php echo $value['student_semester'] ?></td>
                            <td><?php echo $value['tution_fee'] ?></td>
                            <td><?php echo $value['mess_fee'] ?></td>
                            <td><?php echo $value['hostel_fee'] ?></td>
                            <td><?php echo $value['medical_insurance_fee'] ?></td>
                            <td><?php echo $value['payment_status'] ?></td>
                            <td><?php echo date('d-m-Y', strtotime($value['due_date'])); ?></td>
                            <td>
                              <?php if($value['payment_status'] != "Paid"){ ?>
                              <a href="payment?id=<?php echo $value['f_id'];?>"
                              <?php 
                                $diff=date_diff(date_create(date('Y-m-d')),date_create($value['due_date']));
                                echo $diff->format("%R%a")<0 ? "disabled" : "" ;
                              ?>
                             class="btn btn-primary">Pay</a></td>
                             
                              <?php 
                                }
                              ?>
                          </tr>
                        <?php } ?>
                        </tbody> -->
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