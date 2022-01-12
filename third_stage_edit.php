<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Update Lead Information</h3>
                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="third_stage.php">Search Laed</a></li>
                            <li class="breadcrumb-item active">Update Third Stage Data</li>
                        </ol>
            <style>
                .alert {
                padding: 20px;
                background-color: #f44336;
                color: white;
                }

                .closebtn {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
                }

                .closebtn:hover {
                color: black;
                }
          </style>

 <?php
  $getLead_id = $_GET['lead_id'];
      $msg ='<div class="alert bg-success">
                <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                <strong>Success!</strong> Data Updated Success.
            </div>';
           if(isset($_POST['add_third_stage'])){

                $Offer_status       = $_POST['Offer_status'];
                $cash_status        = $_POST['cash_status'];
                $bank_stmnt         = $_POST['bank_stmnt'];
                $medical_report     = $_POST['medical_report'];
                $tuition_payment    = $_POST['tuition_payment'];
                $pre_cas_inter      = $_POST['pre_cas_inter'];
                $visa_status        = $_POST['visa_status'];
                $total_fee        = $_POST['total_fee'];
                $paid_amount        = $_POST['paid_amount'];
                $due_amount        = $_POST['due_amount'];
          
             $insert_lead = "UPDATE tbl_third_lead SET Offer_status='$Offer_status',cash_status ='$cash_status',total_fee='$total_fee',paid_amount='$paid_amount',due_amount='$due_amount',bank_stmnt='$bank_stmnt',
             medical_report='$medical_report',tuition_payment='$tuition_payment',pre_cas_inter='$pre_cas_inter',visa_status='$visa_status' WHERE lead_id='$getLead_id'";
                          
              $query = mysqli_query($con,$insert_lead);
              if($query){
                  echo $msg;
              }else{
                echo "data not insert";
              }
           }
        ?>

<div class="row py-3 pb-3">
<div class="col-lg-1"></div>
<?php 
  $select = "SELECT * FROM tbl_third_lead WHERE lead_id='$getLead_id'";
  $run= mysqli_query($con,$select);
  while($result= mysqli_fetch_array($run)){ ?>
<div class="col-lg-10">
    <form action="" method="POST">
        <div class="row py-4 box_shadow">
                <div class="col-lg-2 mb-3">
                <label for="agent" class="form-label">Offer letter Status</label>
                <select  class="form-control" required name="Offer_status" id="agent">
                   <option value="<?php echo $result['Offer_status']?>"><?php if($result['Offer_status']==''){echo"Select Menu";}else{echo $result['Offer_status'];}?></option>
                    <option value="Incomplete"> Select Offer </option>
                    <option value="Conditional  Issued">Conditional  Issued</option>
                    <option value="Unconditional Issued">Unconditional Issued</option>
                    <option value="Applied">Applied </option>
                
                </select>
                </div>
                <div class="col-lg-4 mb-3">
                <label for="agent" class="form-label">Admission & Tuition Fees Payment
                </label>
                <select  class="form-control" name="tuition_payment" id="agent">
                <option value="<?php echo $result['tuition_payment']?>"> <?php if($result['tuition_payment']==''){echo"Select Menu";}else{ echo $result['tuition_payment'];}?></option>
                    <option value="Incomplete"> Select Payment </option>
                    <option value="Payment Pending ">Payment Pending </option>
                    <option value="Payment Completed ">Payment Completed </option>
                </select>
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="agent" class="form-label">Total Tuition fees</label>
                    <input type="text" name="total_fee" id="total_free" value="<?php echo $result['total_fee']; ?>" class="form-control">
                    </div>
                    <div class="col-lg-2 mb-3">
                    <label for="agent" class="form-label">Paid Amount</label>
                    <input type="text" name="paid_amount" id="paid_amount" value="<?php echo $result['paid_amount']; ?>" class="form-control">
                    </div>
                    <div class="col-lg-2 mb-3">
                    <label for="agent" class="form-label">Due Amount</label>
                    <input type="text" name="due_amount" id="total" value="<?php echo $result['due_amount']; ?>" class="form-control">
                </div>
                <div class="col-lg-3 mb-3">
                <label for="agent" class="form-label">Pre CAS Interview</label>
                <select  class="form-control" name="pre_cas_inter" id="agent">
                <option value="<?php echo $result['pre_cas_inter']?>"> <?php if($result['pre_cas_inter']==''){echo"Select Menu";}else{ echo $result['pre_cas_inter']; }?></option>
                    <option value="Incomplete"> Select CAS Interview</option>
                    <option value="Booking">Booking</option>
                    <option value="Pass">Pass</option>
                    <option value="Rebooked">Rebooked</option>
                </select>
                </div>
                <div class="col-lg-2 mb-3">
                <label for="agent" class="form-label">Medical Report
                </label>
                <select  class="form-control" name="medical_report" id="agent">
                <option value="<?php echo $result['medical_report']?>"> <?php echo $result['medical_report']?></option>
                    <option value="Incomplete">Select Report </option>
                    <option value="Booking">Booking </option>
                    <option value="Received">Received </option>
                    <option value="Pending">Pending</option>
                </select>
                </div>
                <div class="col-lg-3 mb-3">
                <label for="agent" class="form-label">Bank Statement</label>
                <select  class="form-control" name="bank_stmnt" id="agent">
                <option value="<?php echo $result['bank_stmnt']?>"> <?php echo $result['bank_stmnt']?></option>
                    <option value="Incomplete"> Select Statement</option>
                    <option value="Received">Received</option>
                    <option value="Pending">Pending</option>
                </select>
                </div>
                <div class="col-lg-3 mb-3">
                <label for="agent" class="form-label">CAS Applied</label>
                <select  class="form-control" name="cash_status" id="agent">
                <option value="<?php echo $result['cash_status']?>"> <?php echo $result['cash_status']?></option>

                    <option value="Incomplete"> CAS Status </option>
                    <option value="Processing"> Processing</option>
                    <option value="Received">Received</option>
                </select>
                </div>
                <div class="col-lg-3 mb-3">
                <label for="agent" class="form-label">VISA Processing Status
                </label>
                <select  class="form-control" name="visa_status" id="agent">
                <option value="<?php echo $result['visa_status']?>"> <?php echo $result['visa_status']?></option>

                    <option value="Incomplete"> Select Status</option>
                    <option value="Applied"> Applied </option>
                    <option value="VISA Success">VISA Success </option>
                    <option value="VISA Refused"> VISA Refused</option>
                </select>
                </div>
                <div class="mb-3 justify-content-end d-flex">
                <button type="submit" name="add_third_stage" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
    </div>
    <?php } ?>
<div class="col-lg-1"></div>
</div>
</div>
</main>
                  <!--  -------------- Main content End---------------------------------------->
                  <script src="js/jquery-3.5.0.min.js"></script>
	<script>
		$(document).ready(function(){
    	// Get value on keyup funtion
    	$("#total_free, #paid_amount").keyup(function(){

    	var total=0;
    	var x = Number($("#total_free").val());
    	var y = Number($("#paid_amount").val());
    	var total=x - y;

    	$('#total').val(total);

    });
});
</script>

        <script>
            document.getElementById("btn1").addEventListener("click",function(){
              var box1 = document.getElementById("hide_div2");
              if(box1){
                  box1.style.display="block";
                }
            });
            document.getElementById("btn2").addEventListener("click",function(){
              var box1 = document.getElementById("hide_div3");
              if(box1){
                  box1.style.display="block";
              }
            });
            document.getElementById("btn3").addEventListener("click",function(){
              var box1 = document.getElementById("hide_div4");
              if(box1){
                  box1.style.display="block";
              }
            });
            document.getElementById("btn4").addEventListener("click",function(){
              var box1 = document.getElementById("hide_div5");
              if(box1){
                  box1.style.display="block";
              }
            });

      </script>
<?php require_once('footer.php')?>