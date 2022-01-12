<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!-- side Nav section END ```````````````````````````-->
  <!--  -------------- Main content Start---------------------------------------->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Edit Lead Information</h3>
                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Lead Info</li>
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

   <!--  -------------- Main php insert start---------------------------------------->
   <?php
    $getLead_id = $_GET['id'];
   $assing_id = $_SESSION['assign_user_id'];
      $msg ='<div class="alert bg-success">
                <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                <strong>Success!</strong> Data  Successfuly Updated.
            </div>';
          $msg2 ='<div class="alert bg-danger">
            <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
            <strong>Warning! </strong> Data not updated....!
        </div>';
           if(isset($_POST['lead_form'])){
             $lead_date     = $_POST['lead_date'];
             $lead_source     = $_POST['lead_source'];
            //  $select_agent_name     = $_POST['select_agent_name'];
             $student_name  = $_POST['student_name'];
             $lead_mobile   = $_POST['lead_mobile'];
             $lead_email    = $_POST['lead_email'];
             $english_test  = $_POST['english_test'];
             $lead_result   = $_POST['lead_result'];
             $lead_intake   = $_POST['lead_intake'];
             $lead_comments = $_POST['lead_comments'];
             $assign_user = $_POST['assign_user'];
             $lead_status   = $_POST['lead_status'];
           $lead_reminder = $_POST['lead_reminder'];
             $lead_remaks   = $_POST['lead_remaks'];
             $lead_ssc1     = $_POST['lead_ssc1'];
             $lead_ssc1_gpa = $_POST['lead_ssc1_gpa'];
             $lead_ssc1_year= $_POST['lead_ssc1_year'];
             $lead_hsc      = $_POST['lead_hsc'];
             $lead_hsc_gpa  = $_POST['lead_hsc_gpa'];
             $lead_hsc_year = $_POST['lead_hsc_year'];
             $lead_diploma  = $_POST['lead_diploma'];
             $lead_diploma_gpa = $_POST['lead_diploma_gpa'];
             $lead_diploma_year = $_POST['lead_diploma_year'];
             $lead_bechalor     = $_POST['lead_bechalor'];
             $lead_bechalor_gpa = $_POST['lead_bechalor_gpa'];
             $lead_bechalor_year= $_POST['lead_bechalor_year'];
       
            if($assing_id == $assign_user){
            }else{
            $insert_msg ="UPDATE tbl_notification SET to_id='$assing_id',form_id='$assign_user', messages='You got a new Customer : $student_name' WHERE form_id='$assign_user'"; 
            $run = mysqli_query($con,$insert_msg);
            }
              $insert_lead = "UPDATE tbl_leadform1 SET  lead_date='$lead_date',lead_source='$lead_source',select_agent_name='0',student_name='$student_name',lead_mobile='$lead_mobile',lead_email='$lead_email',english_test='$english_test',lead_result='$lead_result',lead_intake='$lead_intake',lead_comments='$lead_comments',assign_user='$assign_user',lead_status='$lead_status',lead_reminder='$lead_reminder',lead_remaks='$lead_remaks',lead_ssc1='$lead_ssc1',lead_ssc1_gpa='$lead_ssc1_gpa',lead_ssc1_year='$lead_ssc1_year',lead_hsc='$lead_hsc',lead_hsc_gpa='$lead_hsc_gpa',lead_hsc_year='$lead_hsc_year',lead_diploma='$lead_diploma',lead_diploma_gpa='$lead_diploma_gpa',lead_diploma_year='$lead_diploma_year',lead_bechalor='$lead_bechalor',lead_bechalor_gpa='$lead_bechalor_gpa',lead_bechalor_year='$lead_bechalor_year',role='0' WHERE lead_id = '$getLead_id'";
              $query = mysqli_query($con,$insert_lead);
              if($query){
                  echo $msg;
              }else{
                echo  $msg2 ;
              }
           }
        
        ?>

  <!--  -------------- Main php end---------------------------------------->
         <?php  
           $select ="SELECT  * FROM tbl_leadform1 WHERE lead_id='$getLead_id'";
           $run = mysqli_query($con,$select);
           while($result= mysqli_fetch_array($run)){ ?>
            <div class="row py-3 pb-3">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                 <form action="" method="POST">
                    <div class="row py-4 box_shadow">
                        <div class="col-lg-3 mb-3">
                            <label for="date" class="form-label">Select Date</label>
                            <input type="text" class="form-control" id="date" name="lead_date" value="<?php echo $result['lead_date'];?>" aria-describedby="emailHelp">
                        </div>

                        <div class="col-lg-3 mb-3">
                        <label for="exampleInputEmail1" class="form-label">Select Source</label>
                            <select id="selectBox" onchange="changeFunc();" name="lead_source" class="form-control" aria-label=".form-select-lg example">
                                <option value="Incomplete">Open this select menu</option>
                                <?php 
                                 $select ="SELECT * FROM  tbl_agent";
                                 $rn = mysqli_query($con,$select);
                                 while($rows = mysqli_fetch_array($rn)){?>
                                      <option <?php if($rows['agent_name']==$result['lead_source']){ ?>selected="select" <?php } ?>value="<?php echo $rows['agent_name']?>"><?php echo $rows['agent_name']?></option>
                               <?php } ?>
                            </select>
                           <!-- <input name="dd_number" class="form-control" type="text" style="display: none" id="textboxes">  -->
                        <!-- <div class="pt-2">
                            <select name="select_agent_name" class="form-control pm-1" type="text" style="display: none" id="textboxes" aria-label=".form-select-lg example">
                                <option value="N/A">Select Agent Name</option>
                               <?php 
                                 $select ="SELECT * FROM  tbl_asign_branch";
                                 $rn = mysqli_query($con,$select);
                                 while($rows = mysqli_fetch_array($rn)){?>
                                      <option value="<?php echo $rows['branch_name']?>"><?php echo $rows['branch_name']?></option>
                               <?php } ?>
                                </select>
                          </div>   -->
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Name</label>
                            <input type="text" class="form-control" required name="student_name" value="<?php echo $result['student_name'];?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-lg-3 mb-3">
                        <label for="Mobile" class="form-label">Mobile Number</label>
                        <input type="number" class="form-control"name="lead_mobile" value="<?php echo $result['lead_mobile'];?>" required id="Mobile">
                        </div>
                        <div class="col-lg-3 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="lead_email"value="<?php echo $result['lead_email'];?>" id="email">
                        </div>
                        <div class="col-lg-3 mb-3">
                        <label for="exampleInputEmail1" class="form-label">English Test</label>
                        <select class="form-select form-control mb-3" name="english_test" aria-label=".form-select-lg example">
                                <option value="<?php echo $result['english_test']?>" selected><?php echo $result['english_test']?></option>
                                <option value="IELTS">IELTS</option>
                                <option value="IELTS Accademic">IELTS Accademic</option>
                                <option value="TOEFEL">TOEFEL</option>
                                <option value="MOI">MOI</option>
                                <option value="Internal Test">Internal Test</option>
                                <option value="OIETC">OIETC</option>
                                <option value="PTE">PTE</option>
                                <option value="DUOLINGO">DUOLINGO</option>
                                <option value="IELTS UKVI">IELTS UKVI</option>
                            </select>
                        </div>
                        <div class="col-lg-3 mb-3">
                            <label for="result" class="form-label"> Result</label>
                            <input type="text" class="form-control" value="<?php echo $result['lead_result'];?>"name="lead_result" id="result">
                            </div>

                            <div class="col-lg-3 mb-3">
                            <label for="Intake" class="form-label">Intake</label>
                            <select class="form-select form-control mb-3" name="lead_intake" aria-label=".form-select-lg example">
                            <option value="<?php echo $result['lead_intake']?>" selected><?php echo $result['lead_intake']?></option>
                                <option value="January">January</option>
                                <option value="May">May</option>
                                <option value="Sepetmber">Sepetmber</option>
                                </select>
                            </div>
                            <div class="col-lg-3 mb-3">
                                <label for="Intake" class="form-label">Comments</label>
                                <select class="form-select form-control mb-3" name="lead_comments" aria-label=".form-select-lg example">
                                <option value="<?php echo $result['lead_comments']?>" selected><?php echo $result['lead_comments']?></option>
                                    <option value="Interested">Interested</option>
                                    <option value="Not interested">Not interested</option>
                                    <option value="Thinking">Thinking</option>
                                    </select>
                                </div>
                               
                                <div class="col-lg-3 mb-3">
                                    <label for="2" class="form-label">Assign User</label>
                                    <select class="form-select form-control mb-3" name="assign_user" aria-label=".form-select-lg example">
                                    <option value="<?php echo $assing_id;?>" selected>Select Status</option>
                                     <?php
                                       $select ="SELECT * FROM tbl_asign_branch";
                                       $run = mysqli_query($con,$select);
                                       while($rows = mysqli_fetch_array($run)){?>
                                            <option <?php if($rows['branch_id']== $result['assign_user']){ ?> selected="select" <?php } ?> value="<?php echo $rows['branch_id']?>"><?php echo $rows['branch_name']?></option>
                                       <?php }
                                      ?>
                                  </select>
                               </div>
                                <div class="col-lg-3 mb-3">
                                    <label for="Intake" class="form-label">Status</label>
                                    <select class="form-select form-control mb-3" name="lead_status"aria-label=".form-select-lg example">
                                    <option value="<?php echo $result['lead_status']?>" selected><?php echo $result['lead_status']?></option>
                                        <option value="Call Later">Call Later </option>
                                        <option value="Processing">Processing</option>
                                        <option value="Go for Next">Go for Next</option>
                                     </select>
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                    <label for="reminder" class="form-label">Reminder</label>
                                    <input type="date" class="form-control" name="lead_reminder" value="<?php echo $result['lead_reminder'];?>"id="reminder" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-lg-3 mb-3">
                                        <label for="details" class="form-label">Remarks</label>
                                        <textarea class="form-control" name="lead_remaks" id="details" rows="2"><?php echo $result['lead_remaks'];?></textarea>
                                    </div>
                        <div class="col-lg-9 mb-3">
                            <div id="hidden_div">
                            <div class="row">
                            <div class="col-lg-4 mb-3">
                                <label for="Intake" class="form-label">Education</label>
                                <select class="form-select form-control mb-3" name="lead_ssc1" aria-label=".form-select-lg example">
                                <option value="<?php echo $result['lead_ssc1']?>" selected><?php echo $result['lead_ssc1']?></option>
                                    <option value="SSC"> SSC </option>
                                    <option value="SSC(Voc)"> SSC(voc) </option>
                                    <option value="SSC(Madrasah)"> SSC(madrasah) </option>
                                    <option value="SSC/equivalent"> SSC/equivalent </option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="Test" class="form-label">Result(Gpa)</label>
                                    <input type="text" class="form-control"name="lead_ssc1_gpa" value="<?php echo $result['lead_ssc1_gpa'];?>"id="Test" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <div class="row">
                                            <div class="col-lg-8">
                                            <label for="Test" class="form-label">Passing Year</label>
                                            <input type="text" class="form-control" id="Test" name="lead_ssc1_year" value="<?php echo $result['lead_ssc1_year'];?>" aria-describedby="emailHelp">
                                            </div>
                                            <div class="col-lg-4 d-flex" style="margin-top: 32px;">
                                                <input type="button" class="form-control btn-sm btn-outline-success" style="font-size:20px; font-weight:bold;margin-right:4px"value="+"id="btn1">
                                                <!-- <input type="button" class="form-control btn-sm btn-outline-danger"style="font-size:20px; font-weight:bold;margin-right:4px" value="-" id="sub_btn2"> -->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
        <!-- ======================hidden_div1============================== -->
                            <div id="hidden_div1">
                                <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <select class="form-select form-control mb-3" name="lead_hsc" aria-label=".form-select-lg example">
                                    <option value="<?php echo $result['lead_hsc']?>" selected><?php echo $result['lead_hsc']?></option>
                                        <option value="HSC"> HSC </option>
                                        <option value="HSC(Voc)"> HSC(voc) </option>
                                        <option value="HSC(Madrasah)"> HSC(madrasah) </option>
                                        <option value="HSC/equivalent"> HSC/equivalent </option>
                                     </select>
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <input type="text" class="form-control" id="Test" name="lead_hsc_gpa" value="<?php echo $result['lead_hsc_gpa'];?>"  placeholder="GPA" aria-describedby="emailHelp">
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <div class="row">
                                                <div class="col-lg-8">
                                  
                                                <input type="text" class="form-control" id="Test" name="lead_hsc_year"  value="<?php echo $result['lead_hsc_year'];?>" placeholder="Year"aria-describedby="emailHelp">
                                                </div>
                                                <div class="col-lg-4 d-flex">
                                                    <input type="button" class="form-control btn-sm btn-outline-success" style="font-size:20px; font-weight:bold;margin-right:4px"value="+" id="btn2"> 
                                                    <input type="button" class="form-control btn-sm btn-outline-danger"style="font-size:20px; font-weight:bold;margin-right:4px" value="-" id="sub_btn2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ======================hidden_div2============================== -->
                                <div id="hidden_div2">
                                    <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <select class="form-select form-control mb-3" name="lead_diploma" aria-label=".form-select-lg example">
                                        <option value="<?php echo $result['lead_diploma']?>" selected><?php echo $result['lead_diploma']?></option>
                                            <option value="Diploma">Diploma</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 mb-3">
                                            <input type="text" class="form-control" id="Test" name="lead_diploma_gpa" value="<?php echo $result['lead_diploma_gpa'];?>" placeholder="GPA" aria-describedby="emailHelp">
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                                <div class="row">
                                                    <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="Test" name="lead_diploma_year" value="<?php echo $result['lead_diploma_year'];?>" placeholder="Year" aria-describedby="emailHelp">
                                                    </div>
                                                    <div class="col-lg-4 d-flex">
                                                        <input type="button" class="form-control btn-sm btn-outline-success"  style="font-size:20px; font-weight:bold;margin-right:4px"value="+" id="btn3">
                                                        <input type="button" class="form-control btn-sm btn-outline-danger"style="font-size:20px; font-weight:bold;margin-right:4px" value="-" id="sub_btn3">
                                                   
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <!-- ======================hidden_div3============================== -->
                                    <div id="hidden_div3">
                                        <div class="row">
                                        <div class="col-lg-4 mb-3">
                                          
                                            <select class="form-select form-control mb-3" name="lead_bechalor" aria-label=".form-select-lg example">
                                            <option value="<?php echo $result['lead_bechalor']?>" selected><?php echo $result['lead_bechalor']?></option>
                                                <option value="Bachelor/Degree">Bachelor/Degree </option>
                                                <option value="BBA">BBA</option>
                                                <option value="BSC">BSC</option>
                                                <option value="LLB">LLB</option>
                                                <option value="other">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-4 mb-3">
                                           
                                                <input type="text" class="form-control" id="Test" name="lead_bechalor_gpa"  value="<?php echo $result['lead_bechalor_gpa'];?>"  placeholder="GPA" aria-describedby="emailHelp">
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                          
                                                        <input type="text" class="form-control" name="lead_bechalor_year"  value="<?php echo $result['lead_bechalor_year'];?>"  placeholder="Year"id="Test" aria-describedby="emailHelp">
                                                        </div>
                                                        <div class="col-lg-4 d-flex">
                                                            <input type="button" class="form-control btn-sm btn-outline-success"  style="font-size:20px; font-weight:bold;margin-right:4px"value="+" id="btn4">
                                                            <input type="button" class="form-control btn-sm btn-outline-danger"style="font-size:20px; font-weight:bold;margin-right:4px" value="-" id="sub_btn4">
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       </div>
                                          <div class="mb-3 justify-content-end d-flex">
                                            <button type="submit" name="lead_form" class="btn btn-primary">Update</button>
                                          </div>
                                        </div>
                                      </form>
                                
                            </div>
                            <div class="col-lg-1"></div>
                       </div>
                       <?php  }  ?>
                    </div>
                </main>
                  <!--  -------------- Main content End---------------------------------------->
 

        <script>
            function changeFunc() {
                var selectBox = document.getElementById("selectBox");
                var selectedValue = selectBox.options[selectBox.selectedIndex].value;
                if (selectedValue=="not_listed"){
                $('#textboxes').show();
                }

           }
   
            document.getElementById("btn1").addEventListener("click",function(){
              var box1 = document.getElementById("hidden_div1");
              if(box1){
                  box1.style.display="block";
                }
            });
            document.getElementById("btn2").addEventListener("click",function(){
              var box1 = document.getElementById("hidden_div2");
              if(box1){
                  box1.style.display="block";
              }
            });
            document.getElementById("btn3").addEventListener("click",function(){
              var box1 = document.getElementById("hidden_div3");
              if(box1){
                  box1.style.display="block";
              }
            });
            document.getElementById("btn4").addEventListener("click",function(){
              var box1 = document.getElementById("hidden_div4");
              if(box1){
                  box1.style.display="block";
              }
            });
            document.getElementById("sub_btn2").addEventListener("click",function(){
              var box1 = document.getElementById("hidden_div1");
              if(box1){
                  box1.style.display="none";
              }
            });
            document.getElementById("sub_btn3").addEventListener("click",function(){
              var box1 = document.getElementById("hidden_div2");
              if(box1){
                  box1.style.display="none";
              }
            });
            document.getElementById("sub_btn4").addEventListener("click",function(){
              var box1 = document.getElementById("hidden_div3");
              if(box1){
                  box1.style.display="none";
              }
            });

      </script>

<?php require_once('footer.php')?>