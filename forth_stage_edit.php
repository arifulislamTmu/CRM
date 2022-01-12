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
  $invoice =  date("Y").$getLead_id ;
      $msg ='<div class="alert bg-success">
                <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                <strong>Success!</strong> Data Updated Success.
            </div>';
           if(isset($_POST['add_third_stage'])){
                $re_amount             = $_POST['re_amount'];
                $cunt_due_total        = $_POST['cunt_due_total'];
                $new_contat            = $_POST['new_contat'];
                $comission             = $_POST['comission'];
                $ricived_amount        = $_POST['ricived_amount'];
                $remarks               = $_POST['remarks'];
                      
             $insert_lead = "UPDATE tbl_third_lead SET re_amount='$re_amount',due_amount ='$cunt_due_total',
             new_contat='$new_contat',comission='$comission',ricived_amount='$ricived_amount',remarks='$remarks',invoice='$invoice'  WHERE lead_id='$getLead_id'";
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
                <div class="col-lg-3 mb-3">
                    <label for="agent" class="form-label">Total Tuition fees</label>
                    <input type="text" name="total_fee" id="total_free" readonly value="<?php echo $result['total_fee']; ?>" class="form-control">
                    </div>
                    <div class="col-lg-3 mb-3">
                    <label for="agent" class="form-label">Due Amount</label>
                    <input type="text" name="due_amount" id="total_due" value="<?php echo $result['due_amount']; ?>" readonly class="form-control">
                </div>
                <div class="col-lg-3 mb-3">
                    <label for="agent" class="form-label">Re-Payment Amount</label>
                    <input type="text" name="re_amount" id="paid_amount"  class="form-control">
                    </div>
                    <div class="col-lg-3 mb-3">
                    <label for="agent" class="form-label">Current Due</label>
                    <input type="text" name="cunt_due_total" id="total"  class="form-control">
                    </div>
                    <div class="col-lg-3 mb-3">
                    <label for="agent" class="form-label">New Contact Info</label>
                    <input type="text" name="new_contat" id=""  class="form-control">
                    </div>
                    <div class="col-lg-3 mb-3">
                    <label for="agent" class="form-label">Reminder Date</label>
                      <input type="text" value="<?php echo $result['riminder_date'];?>"readonly  class="form-control">
                    </div>
                    <div class="col-lg-3 mb-3">
                    <label for="agent" class="form-label" style="color:#0984e3; font-weight:700; "> Comission(%)</label>
                      <input type="text" required name="comission"   class="form-control">
                    </div>
                    <div class="col-lg-3 mb-3">
                    <label for="agent" class="form-label" style="color:#0984e3; font-weight:700; ">Received Amount </label>
                      <input type="text" name="ricived_amount"   class="form-control">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label for="agent" class="form-label" style="color:#0984e3; font-weight:700; ">Remarks</label>
                        <textarea name="remarks" class="form-control" rows="2"></textarea>
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
    	var x = Number($("#total_due").val());
    	var y = Number($("#paid_amount").val());
    	var total=x - y;

    	$('#total').val(total);

    });
});
</script>

<?php require_once('footer.php')?>