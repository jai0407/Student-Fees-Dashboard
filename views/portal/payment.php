<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('portal/_partials/header');
?>
<style type="text/css">
    * {
    margin: 0;
    padding: 0
}

html {
    height: 100%
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset .form-card {
    background: white;
    border: 0 none;
    border-radius: 0px;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    padding: 20px 40px 30px 40px;
    box-sizing: border-box;
    width: 94%;
    margin: 0 3% 20px 3%;
    position: relative
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform fieldset .form-card {
    text-align: left;
    color: #9E9E9E
}

#msform input,
#msform textarea {
    padding: 0px 8px 4px 8px;
    border: none;
    border-bottom: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: none;
    font-weight: bold;
    border-bottom: 2px solid skyblue;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #fc544b;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button:hover,
#msform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
}

select.list-dt {
    border: none;
    outline: 0;
    border-bottom: 1px solid #ccc;
    padding: 2px 5px 3px 5px;
    margin: 2px
}

select.list-dt:focus {
    border-bottom: 2px solid skyblue
}

.card {
    z-index: 0;
    border: none;
    border-radius: 0.5rem;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #2C3E50;
    margin-bottom: 10px;
    font-weight: bold;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #000000
}

#progressbar li {
    list-style-type: none;
    font-size: 12px;
    width: 25%;
    float: left;
    position: relative
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f023"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f09d"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f00c"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 18px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: skyblue
}

.radio-group {
    position: relative;
    margin-bottom: 25px
}

.radio {
    display: inline-block;
    width: 204;
    height: 104;
    border-radius: 0;
    background: lightblue;
    box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
    box-sizing: border-box;
    cursor: pointer;
    margin: 8px 2px
}

.radio:hover {
    box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
}

.radio.selected {
    box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
}

.fit-image {
    width: 100%;
    object-fit: cover
}
</style>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>

    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2" style="margin-top: 7rem !important;">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Fee Payment</strong></h2>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form id="msform">
                                <!-- progressbar -->
                              <!--  <ul id="progressbar" style="margin-left: 14rem;">
                                    <li class="active" id="account"><strong>Account</strong></li>
                                   <li id="payment"><strong>Payment</strong></li>
                                   
                                </ul>  -->
                                <fieldset>
                                    
                                    <div class="form-card">

                                        <h2 class="fs-title">Fee Information :</h2>    <hr/>
<br/>
                                
                                        <h6>Tution Fees: <?php //echo $fee[0]['tution_fee']; ?> </h6>
                                        <input type="text" name="TutionFee" placeholder="Tution Fee" value="0" onchange="Count()" />
                                        <h6>Mess Fees:<?php //echo $fee[ ]['mess_fee']; ?></h6>
                                        <input type="text" name="MessFee" placeholder="Mess Fee" value="0" onchange="Count()" /> 
                                        <h6>Hostel Fees:<?php //echo $fee[ ]['hostel_fee']; ?></h6>
                                        <input type="text" name="HostelFee" placeholder="Hostel Fee" value="0" onchange="Count()" />
                                        <h6>Medical Insurance Fees:<?php //echo $fee[ ]['medical_insurance_fee']; ?></h6>
                                         <input type="text" name="MedicalInsuranceFee" placeholder="Medical Insurance Fee" value="0" onchange="Count()" />
                                         <h6>Exam Fees:<?php //echo $fee[ ]['medical_insurance_fee']; ?></h6>
                                        <input type="text" name="MedicalInsuranceFee" placeholder="Medical Insurance Fee" value="0" onchange="Count()" />
                                         <h6>Re-Exam Fees:<?php //echo $fee[ ]['medical_insurance_fee']; ?></h6>
                                        <input type="text" name="MedicalInsuranceFee" placeholder="Medical Insurance Fee" value="0" onchange="Count()" />
                                        <h6>Re-Evaluation Fees:<?php //echo $fee[ ]['medical_insurance_fee']; ?></h6>
                                        <input type="text" name="MedicalInsuranceFee" placeholder="Medical Insurance Fee" value="0" onchange="Count()" />
                                        <h6>Fine Charged:<?php //echo $fee[ ]['medical_insurance_fee']; ?></h6>
                                        <input type="text" name="MedicalInsuranceFee" placeholder="Medical Insurance Fee" value="0" onchange="Count()" />
                          
                                    </div> 
                                    <input type="button" name="next" class="next action-button" style="background-color: #ed3237" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Payment Information</h2>
                                        <!-- <div class="radio-group">
                                            <div class='radio' data-value="credit"><img src="https://i.imgur.com/XzOzVHZ.jpg" width="200px" height="100px"></div>
                                            <div class='radio' data-value="paypal"><img src="https://i.imgur.com/jXjwZlj.jpg" width="200px" height="100px"></div> <br>
                                        </div> <label class="pay">Card Holder Name*</label> <input type="text" name="holdername" placeholder="" /> -->
                                        <!-- <div class="row">
                                            <div class="col-9"> <label class="pay">Card Number*</label> <input type="text" name="cardno" placeholder="" /> </div>
                                            <div class="col-3"> <label class="pay">CVC*</label> <input type="password" name="cvcpwd" placeholder="***" /> </div>
                                        </div> -->
                                        <div class="row">
                                            <div class="col-3"> <label class="pay">Total Amount</label> </div>
                                            <div class="col-6">  <input type="tamt" name="tamt" value="10" readonly /> </div>
                                        </div>
                                       <input type="button" name="previous" class="previous action-button-previous" value="Previous" /> 
                                    <input type="button" name="make_payment" class="next action-button" value="Confirm" onclick="datasubmit()"/>
                                </fieldset>
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function () {
        var current_fs, next_fs, previous_fs; //fieldsets
        var opacity;

        $(".next").click(function () {
            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //Add Class Active
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate(
                { opacity: 0 },
                {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        next_fs.css({ opacity: opacity });
                    },
                    duration: 600,
                }
            );
        });

        $(".previous").click(function () {
            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //Remove class active
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();

            //hide the current fieldset with style
            current_fs.animate(
                { opacity: 0 },
                {
                    step: function (now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            display: "none",
                            position: "relative",
                        });
                        previous_fs.css({ opacity: opacity });
                    },
                    duration: 600,
                }
            );
        });

        $(".radio-group .radio").click(function () {
            $(this).parent().find(".radio").removeClass("selected");
            $(this).addClass("selected");
        });

        $(".submit").click(function () {
            return false;
        });
    });

</script>
<script>
    function Count(){
        var mess_fee, hostel_fee, tution_fee, total;

        turion_fee = parseInt(document.getElementsByName('TutionFee')[0].value);
        mess_fee = parseInt(document.getElementsByName('MessFee')[0].value);
        hostel_fee = parseInt(document.getElementsByName('HostelFee')[0].value);
        medical_fee = parseInt(document.getElementsByName('MedicalInsuranceFee')[0].value);
        total = turion_fee+mess_fee+hostel_fee+medical_fee;
        document.getElementsByName('total')[0].value = total;
        document.getElementsByName('tamt')[0].value = total;
    }

    function datasubmit(){
        var mess_fee, hostel_fee, tution_fee, total;

        turion_fee = parseInt(document.getElementsByName('TutionFee')[0].value);
        mess_fee = parseInt(document.getElementsByName('MessFee')[0].value);
        hostel_fee = parseInt(document.getElementsByName('HostelFee')[0].value);
        medical_fee = parseInt(document.getElementsByName('MedicalInsuranceFee')[0].value);

        var total = parseInt(document.getElementsByName('total')[0].value);
        var str = "turion_fee="+turion_fee+"&mess_fee="+mess_fee+"&hostel_fee="+hostel_fee+"&medical_fee="+medical_fee+"&total="+total+"&student_id=<?php echo $fee[0]['student_id']; ?>&student_sem=<?php echo $fee[0]['student_semester']; ?>&student_course=<?php echo $fee[0]['student_course']; ?>&student_session=<?php echo $fee[0]['student_session']; ?>&f_id=<?php echo $fee[0]['f_id']; ?>";
        alert(str);
        alert(btoa(str));
        return false;
        window.location.href = '<?php site_url() ?>fees_pay?q='+btoa(str);
    }
</script>
<?php $this->load->view('portal/_partials/js'); ?>