<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$customer_name = '';
if ( $this->session->userdata['user_sassion'] ) {
  $user = $this->session->userdata['user_sassion'];
  $userdata = $this->Student->getUsers($user);
  $customer_name = $userdata[0]['first_name'].' '.$userdata[0]['last_name'];
}
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


  <div class="main-sidebar sidebar-style-2" >
    <aside id="sidebarz">
        <div class="sidebar-brand" style="padding-bottom: 20px;">
        <a href="<?php echo base_url(); ?>portal/dashboard"><img src="<?php echo base_url(); ?>assets/img/ASMS-logo.png" alt="logo" width="150"></a>
        <p style="padding: 4px;">Last Sync:12-10-21 | Time: 3.20 PM</p><hr/>
        <div class="section"></div>

      </div>
          <div class="sidebar-brand sidebar-brand-sm">
          <a href="<?php echo base_url(); ?>portal/dashboard">AAFT</a>
          </div>
            <div class="sidebar-brand" style="padding-top: 27px;padding-bottom: 82px;">
              <ul class="navbar-nav" style="align-items: flex-start; padding: 10px;background: aliceblue;">
            
                  <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link">
                    <!-- <img alt="image" style=" width: 30px;" src="<?php echo base_url(); ?>assets/img/avatar/avatar-1.png" class="rounded-circle mr-1"> -->
                    <div class="d-sm-none d-lg-inline-block"><?php echo $customer_name;?></div>
                   </a>
                  <!-- <div class="dropdown-menu dropdown-menu-right">
                      <a href="#" class="dropdown-item has-icon">
                      <i class="far fa-user"></i> Profile
                      </a>
                  <a href="<?php //echo base_url(); ?>portal/index" class="dropdown-item has-icon">
                      <i class="far fa-user"></i> Profile
                      </a>
                      <div class="dropdown-divider"></div>
                      <a href="<?php //echo base_url(); ?>portal/logout" class="dropdown-item has-icon text-danger">
                      <i class="fas fa-sign-out-alt"></i> Logout
                      </a>
                  </div> -->
                  </li>
            
                  <li class="nav-item active">
                      <a class="nav-link" href="#"><?php echo 'Roll NO: '.$userdata[0]['roll_number']; ?> <span class="sr-only"></span></a>
                  </li>
            
                   <li class="nav-item active">
                      <a class="nav-link" href="#"><?php echo 'Mobile No: '.$userdata[0]['mobile_number']; ?> <span class="sr-only"></span></a>
                  </li> 
              
                 <!--  <li><a href="#" class="nav-link"><?php //echo 'Mobile Number: '.$userdata[0]['mobile_number']; ?><span></span></a></li> -->
                              
              </ul>
            </div>
          </aside>
    
        <!--<li><a href="<?php // echo base_url(); ?>portal/change_password" class="nav-link"><i class="fas fa-key"></i><span>Change Password</span></a></li> -->

          <!--  <li><a href="<?php //echo base_url(); ?>portal/dashboard" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
        <li><a href="<?php echo base_url(); ?>portal/semester_details" class="nav-link"><i class="fas fa-info-circle"></i><span>Outstanding Fee's</span></a></li>
        <li><a href="<?php echo base_url(); ?>portal/transaction_details" class="nav-link"><i class="fas fa-globe-asia"></i><span>Transaction Details</span></a></li>
        <li><a href="<?php echo base_url(); ?>portal/profile" class="nav-link"><i class="fas fa-user"></i><span>Profile</span></a></li>
        <li><a href="<?php echo base_url(); ?>portal/change_password" class="nav-link"><i class="fas fa-key"></i><span>Change Password</span></a></li>-->
      
  

  
       <div class="sidebar-brand">
          <ul class="sidebar-menu">

            <br/><br/><br/>
             <!--     <li><a href="<?php echo base_url(); ?>portal/dashboard" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
          <li><a href="<?php echo base_url(); ?>portal/semester_details" class="nav-link"><i class="fas fa-info-circle"></i><span>Outstanding Fee's</span></a></li>
          <li><a href="<?php echo base_url(); ?>portal/transaction_details" class="nav-link"><i class="fas fa-globe-asia"></i><span>Transaction Details</span></a></li>  -->
          <li style="    color: white;
              background:antiquewhite;"><a href="<?php echo base_url(); ?>portal/profile" class="nav-link"><i class="fas fa-user"></i><span>Profile</span></a>

          </li>

          <li style=" color: white;
              background:antiquewhite;"><a href="<?php echo base_url(); ?>portal/logout" class="nav-link"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
          </li>
        </ul>

       </div>


             <br/><br/>

               
             <h6 class="card-title" data-backdrop="false" data-toggle="modal" data-target="#exampleModal" style="color: white; text-align: center; background: #6777ef; padding: 15px;">Query Form</h6>

          <div class="row">
             <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"> 

                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Query</h5>
                          <button type="button" class="btn btn-light" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                 
                      <div class="col-xl-12 justify-content-center" >
                             <hr />
                          <form class="forms-sample" style="padding: 25px;">
                            <div class="form-group row">
                                <h6>Name : Yash Dhakad</h6> 
                              </div>
                              <div class="form-group row">
                                <label class="form-check-label">Enter Your Query</label>
                                <input type="text" class="form-control"  placeholder="Enter your query">
                              </div>
                              <div class="form-group row">
                                <label class="form-check-label">Attached File</label>
                                  <input type="file" class="form-control"  placeholder="Selecct your file">
                              </div>
                             
                               <div class="form-group row">
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                                </div>
                            </form>
                      </div>

                    </div>

                 </div>
              </div>
          </div>

   
  
    </div>


     
                 
              


