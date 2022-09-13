<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('portal/_partials/header');

?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">

            <button class="btn btn-danger btn-sm col-xs-2 margin-left" style="color: white;">
             <a href="<?php echo base_url(); ?>staff/dashboard" class="previous" style="color: white;">
            &laquo; Back
           </a>
           </button>
          </>
            <h1 style="padding: 10px;">Outstanding Fees</h1>
            <div class="section-header-breadcrumb">
              <!-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><?php echo $title; ?></div> -->

            </div>
                    <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="header-right">
                        <form action="#" method="POST" class="form-sample" id="date-filter">
                                <div class="datepicker-range">
                         <input style="padding: 3px;" type="text" name="created_at" id="created_at" class="date-picker" value="#">
                        <!-- To <input type="date" name="date_at" id="date_at" class="date-picker" value="#"> -->
                        <input type="submit" style="padding: 1px;width:60px" name="filter" id="filter" value="filter" class="btn btn-info">
                                </div>
                            </form>
                        </div>
                    </div>    
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
                            <th class="text-center">ID</th>
                           <!--  <th>ID</th> -->
                            <th>User ID</th>
                             <th>Name</th>
                            <th>Date</th>
                            <!-- <th>Transport Fees</th> -->
                            <th>Email</th>
                            <th>Department</th>
                         
                          
                            
                          </tr>
                        </thead>

                        <tbody>
                         <tr>
                           <td>1</td>
                           <td>0112CS021</td>
                           <td>Suraj Kumar</td>
                           <td>12-04-2021</td>
                           <td>suraj1@gmail.com</td>
                           <td>Computer Science</td>
                          
                            

                         </tr>
                          <tr>
                           <td>2</td>
                           <td>0112CS022</td>
                           <td>Kishor Dhakad</td>
                           <td>08-03-2021</td>
                           <td>kishorkmk@gmail.com</td>
                           <td>Civil</td>
                            

                         </tr>
                             <tr>
                           <td>3</td>
                            <td>0112CS023</td>
                           <td>Atul singh</td>
                           <td>14-09-2021</td>
                           <td>atulkmk@gmail.com</td>
                           <td>Machenical</td>

                         </tr>
                             <tr>
                           <td>4</td>
                           <td>0112CS024</td>
                           <td>Jai Jaiswal</td>
                           <td>04-07-2021</td>
                           <td>jaijaiswal.1@gmail.com</td>
                             <td>Information Technology</td>
                          
                        

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