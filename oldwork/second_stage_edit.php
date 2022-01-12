<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="second_stage.php">Search Laed</a></li>
                            <li class="breadcrumb-item active">Update Second Stage Data</li>
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
 $getLead_id = $_GET['id'];
      $msg ='<div class="alert bg-success">
                <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                <strong>Success!</strong> Data Update Success.
            </div>';
            $msg2 ='<div class="alert bg-danger">
                <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                <strong>Warning!</strong> Data not updated...!
            </div>';
           if(isset($_POST['add_second_stage'])){

            $skype_id           = $_POST['skype_id'];
            $whatsapp_id        = $_POST['whatsapp_id'];
            $doc_list           = $_POST['doc_list'];
            $university_name1   = $_POST['university_name1'];
            $subject_name1      = $_POST['subject_name1'];
            $course_lavel1      = $_POST['course_lavel1'];
            $agent_name         = $_POST['agent_name'];
            $status1            = $_POST['status1'];

            $university_name2   = $_POST['university_name2'];
            $subject_name2      = $_POST['subject_name2'];
            $course_lavel2      = $_POST['course_lavel2'];
            $agent_name2         = $_POST['agent_name2'];
            $status2            = $_POST['status2'];

           

            $university_name3   = $_POST['university_name3'];
            $subject_name3      = $_POST['subject_name3'];
            $course_lavel3      = $_POST['course_lavel3'];
            $agent_name3         = $_POST['agent_name3'];
            $status3            = $_POST['status3'];

            $university_name4   = $_POST['university_name4'];
            $subject_name4      = $_POST['subject_name4'];
            $course_lavel4      = $_POST['course_lavel4'];
            $agent_name4         = $_POST['agent_name4'];
            $status4            = $_POST['status4'];

             $insert_lead = "UPDATE tbl_second_lead SET skype_id='$skype_id',whatsapp_id='$whatsapp_id',doc_list='$doc_list',
             university_name1='$university_name1',subject_name1='$subject_name1',course_lavel1='$course_lavel1',agent_name='$agent_name',status1='$status1',
             university_name2='$university_name2',subject_name2='$subject_name2',course_lavel2='$course_lavel2',agent_name2='$agent_name2',status2='$status2',
             university_name3='$university_name3',subject_name3='$subject_name3',course_lavel3='$course_lavel3',agent_name3='$agent_name3',status3='$status3',
             university_name4='$university_name4',subject_name4='$subject_name4',course_lavel4='$course_lavel4',agent_name4='$agent_name4',status4='$status4' WHERE lead_id ='$getLead_id'";
              $query = mysqli_query($con,$insert_lead);
              if($query){
                  echo $msg;
              }else{
                echo $msg2;
              }
           }
        
        ?>

  <!--  -------------- Main php end---------------------------------------->
<div class="row py-3 pb-3">
<div class="col-lg-1"></div>
<?php 
  $select = "SELECT * FROM tbl_second_lead WHERE lead_id='$getLead_id'";
  $run= mysqli_query($con,$select);
  while($result= mysqli_fetch_array($run)){ ?>
<div class="col-lg-10">
    <form action="" method="POST">
        <div class="row py-4 box_shadow">
            <div class="col-lg-4 mb-3">
                <label for="skype" class="form-label">Skype ID</label>
                <input type="text" name="skype_id" class="form-control" id="skype"  value="<?php echo $result['skype_id']?>" aria-describedby="emailHelp">
                </div>
                <div class="col-lg-4 mb-3">
                <label for="WhatsApp" class="form-label">WhatsApp</label>
                <input type="text"  name="whatsapp_id"  value="<?php echo $result['whatsapp_id']?>" class="form-control" id="WhatsApp" aria-describedby="emailHelp">
                </div>
             
                <div class="col-lg-4 mb-3">
                    <label for="list" class="form-label">Document List</label>
                    <input type="text" name="doc_list"  value="<?php echo $result['doc_list']?>"class="form-control" id="list" aria-describedby="emailHelp">
                </div>

        <!-- =================hide div 1================================== -->
        <div id="main">
        <div class="row">
                <div class="col-lg-3 mb-3">
                <label for="agent" class="form-label">Select University</label>
                <select  class="form-control" name="university_name1" id="agent">
                <option value="Incomplete">Select University Name </option>
                    <?php 
                      $select ="SELECT * FROM tbl_university";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                        <option <?php if($rows['university_name']== $result['university_name1']){ ?> selected="select" <?php } ?> value="<?php echo $rows['university_name']?>"><?php echo $rows['university_name']?></option>
                     <?php }
                    ?>
                </select>
                </div>
                <div class="col-lg-2 mb-3">
                <label for="agent" class="form-label">Select Subject</label>
                <select  class="form-control" name="subject_name1" id="agent">
                <option value="Incomplete">Select Subject</option>
                    <?php 
                      $select ="SELECT * FROM tbl_subject";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                      <option <?php if($rows['subject_name']== $result['subject_name1']){ ?> selected="select" <?php } ?> value="<?php echo $rows['subject_name']?>"><?php echo $rows['subject_name']?></option>
                     <?php }
                    ?>
                    
                </select>
                </div>
                
                <div class="col-lg-2 mb-3">
                <label for="Lavel" class="form-label">Course Lavel</label>
                <select  class="form-control" name="course_lavel1" id="agent">
                            <option value="<?php echo $result['course_lavel1']?>"><?php echo $result['course_lavel1']?></option>
                            <option value="Incompele">Select course lavel</option>
                            <option value="SSC">SSC</option>
                            <option value="SSC/(Equivalent)">SSC/(Equivalent)</option>
                            <option value="HSC">HSC </option>
                            <option value="HSC/(Equivalent)">HSC/(Equivalent)</option>
                            <option value="DIPLOMA">DIPLOMA</option>
                            <option value="Under Graduation ">Under Graduation </option>
                            <option value="Graduation">Graduation</option>
                            <option value="Post Graduation">Post Graduation</option>
                            <option value="Ph.D"> Ph.D</option>
                        </select>
                </div>
                <div class="col-lg-2 mb-3">
                <label for="agent" class="form-label">Applied Agent</label>
                <select  class="form-control" name="agent_name" id="agent">
                    <option value="Incomplete">Select Agent </option>
                    <?php 
                      $select ="SELECT * FROM applied_agent";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                       <option <?php if($rows['app_agent_name']==$result['agent_name']){ ?> selected="select" <?php } ?> value="<?php echo $rows['app_agent_name']?>"><?php echo $rows['app_agent_name']?></option>
                     <?php }
                    ?>
                </select>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-8">
                        <label for="agent" class="form-label">Select Status</label>
                        <select  class="form-control" name="status1" id="agent">
                        <option value="<?php echo $result['status1']?>"><?php echo $result['status1']?></option>
                            <option value="Incomplete">Select status</option>
                            <option value="Processing">Processing</option>
                            <option value="Submitted">Submitted</option>
                            <option value="Approved">Approved</option>
                            <option value="Selected">Selected</option>
                        </select>
                        </div>
                        <div class="col-lg-4">
                        <label for="Lavel" class="form-label"> </label>
                            <input type="button" class="form-control btn-sm btn-outline-success"  style="font-size:20px; font-weight:bold;margin-right:4px"value="+" id="btn1">
                     </div>
                    </div>
                </div>
                </div>
            </div>
                <!-- =================hide div 2================================== -->
                <div id="hide_div2">
                <div class="row">
                <div class="col-lg-3 mb-3">
                
                    <select  class="form-control" name="university_name2" id="agent">
                    <option value="Incomplete">Select University Name </option>
                    <?php 
                      $select ="SELECT * FROM tbl_university";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                      <option <?php if($rows['university_name']== $result['university_name2']){ ?> selected="select" <?php } ?> value="<?php echo $rows['university_name']?>"><?php echo $rows['university_name']?></option>
                   
                     <?php }
                    ?>
                    
                    </select>
                </div>
                <div class="col-lg-2 mb-3">
    
                    <select  class="form-control" name="subject_name2" id="agent">
                    <option value="Incomplete">Select Subject</option>
                    <?php 
                      $select ="SELECT * FROM tbl_subject";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                       <option <?php if($rows['subject_name']== $result['subject_name2']){ ?> selected="select" <?php } ?> value="<?php echo $rows['subject_name']?>"><?php echo $rows['subject_name']?></option>
                    
                     <?php }
                    ?>
                    </select>
                </div>
                <div class="col-lg-2 mb-3">
                <select  class="form-control" name="course_lavel2" id="agent">
                           <option value="<?php echo $result['course_lavel2']?>"><?php echo $result['course_lavel2']?></option>
                            <option value="Incompele">Select course lavel </option>
                            <option value="SSC">SSC</option>
                            <option value="SSC/(Equivalent)">SSC/(Equivalent)</option>
                            <option value="HSC">HSC </option>
                            <option value="HSC/(Equivalent)">HSC/(Equivalent)</option>
                            <option value="DIPLOMA">DIPLOMA</option>
                            <option value="Under Graduation ">Under Graduation </option>
                            <option value="Graduation">Graduation</option>
                            <option value="Post Graduation">Post Graduation</option>
                            <option value="Ph.D"> Ph.D</option>
                        </select>
                    </div>
            <div class="col-lg-2 mb-3">
                <select  class="form-control" name="agent_name2" id="agent">
                    <option value="Incomplete">Select Agent </option>
                    <?php 
                      $select ="SELECT * FROM applied_agent";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                       <option <?php if($rows['app_agent_name']==$result['agent_name2']){ ?> selected="select" <?php } ?> value="<?php echo $rows['app_agent_name']?>"><?php echo $rows['app_agent_name']?></option>
                     <?php }
                    ?>
                </select>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-8">
                    
                            <select  class="form-control" name="status2" id="agent">
                            <option value="<?php echo $result['status2']?>"><?php echo $result['status2']?></option>
                                <option value="Incomplete">Select status</option>
                                <option value="Processing">Processing</option>
                                <option value="Submitted">Submitted</option>
                                <option value="Approved">Approved</option>
                                <option value="Selected">Selected</option>
                               
                            </select>
                        </div>
                    <div class="col-lg-4 d-flex">
                         <input type="button" class="form-control btn-sm btn-outline-success"  style="font-size:20px; font-weight:bold;margin-right:4px"value="+" id="btn2">
                         <input type="button" class="form-control btn-sm btn-outline-danger"style=" font-size:20px;font-weight:bold;margin-right:4px" value="-" id="sub_btn2">
                    </div>
                 
                    </div>
                </div>
                </div>
            </div>
                <!-- =================hide div 3================================== -->
                <div id="hide_div3">
                <div class="row">
            
                <div class="col-lg-3 mb-3">
        
                    <select  class="form-control" name="university_name3" id="agent">
                    <option value="Incomplete">Select University Name </option>
                    <?php 
                      $select ="SELECT * FROM tbl_university";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                        <option <?php if($rows['university_name']== $result['university_name1']){ ?> selected="select" <?php } ?> value="<?php echo $rows['university_name']?>"><?php echo $rows['university_name']?></option>
                   
                       <?php }
                    ?>
                    
                    </select>
                </div>
                <div class="col-lg-2 mb-3">
                    
                    <select  class="form-control" name="subject_name3" id="agent">
                    <option value="Incomplete">Select Subject</option>
                    <?php 
                      $select ="SELECT * FROM tbl_subject";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                       <option <?php if($rows['subject_name']== $result['subject_name3']){ ?> selected="select" <?php } ?> value="<?php echo $rows['subject_name']?>"><?php echo $rows['subject_name']?></option>
                    
                      <?php }
                    ?>
                        
                    </select>
                </div>
                <div class="col-lg-2 mb-3">
                <select  class="form-control" name="course_lavel3" id="agent">
                <option value="<?php echo $result['course_lavel3']?>"><?php echo $result['course_lavel3']?></option>
                           
                            <option value="Incompele">Select course lavel </option>
                            <option value="SSC">SSC</option>
                            <option value="SSC/(Equivalent)">SSC/(Equivalent)</option>
                            <option value="HSC">HSC </option>
                            <option value="HSC/(Equivalent)">HSC/(Equivalent)</option>
                            <option value="DIPLOMA">DIPLOMA</option>
                            <option value="Under Graduation ">Under Graduation </option>
                            <option value="Graduation">Graduation</option>
                            <option value="Post Graduation">Post Graduation</option>
                            <option value="Ph.D"> Ph.D</option>
                        </select>
                  
                </div>
                <div class="col-lg-2 mb-3">
                <select  class="form-control" name="agent_name3" id="agent">
                    <option value="Incomplete">Select Agent </option>
                    <?php 
                      $select ="SELECT * FROM applied_agent";
                      $run = mysqli_query($con,$select);
                      while($rows = mysqli_fetch_array($run)){ ?>
                       <option <?php if($rows['app_agent_name']==$result['agent_name3']){ ?> selected="select" <?php } ?> value="<?php echo $rows['app_agent_name']?>"><?php echo $rows['app_agent_name']?></option>
                     <?php }
                    ?>
                </select>
                </div>
                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-lg-8">
                            
                            <select  class="form-control" name="status3" id="agent">
                            <option value="<?php echo $result['status3']?>"><?php echo $result['status3']?></option>
                            <option value="Incomplete">Select status</option>
                            <option value="Processing">Processing</option>
                            <option value="Submitted">Submitted</option>
                            <option value="Approved">Approved</option>
                            <option value="Selected">Selected</option>
                            
                            </select>
                        </div>
                        <div class="col-lg-4 d-flex">
                            <input type="button" class="form-control btn-sm btn-outline-success"  style="font-size:20px; font-weight:bold;margin-right:4px"value="+" id="btn3">
                            <input type="button" class="form-control btn-sm btn-outline-danger"style="font-size:20px; font-weight:bold;margin-right:4px" value="-" id="sub_btn3">
                        </div>
                   
                    </div>
                </div>
                </div>
                </div>

                        <!-- =================hide div 4================================== -->
                        <div id="hide_div4">
                        <div class="row">
                    
                        <div class="col-lg-3 mb-3">
                
                            <select  class="form-control" name="university_name4" id="agent">
                            <option value="Incomplete">Select University Name </option>
                            <?php 
                            $select ="SELECT * FROM tbl_university";
                            $run = mysqli_query($con,$select);
                            while($rows = mysqli_fetch_array($run)){ ?>
                                <option <?php if($rows['university_name'] == $result['university_name4']){ ?> selected="select" <?php } ?> value="<?php echo $rows['university_name']?>"><?php echo $rows['university_name']?></option>
                   
                               <?php }
                            ?>
                            
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                            
                            <select  class="form-control" name="subject_name4" id="agent">
                            <option value="Incomplete">Select Subject</option>
                                <?php 
                                $select ="SELECT * FROM tbl_subject";
                                $run = mysqli_query($con,$select);
                                while($rows = mysqli_fetch_array($run)){ ?>
                                   <option <?php if($rows['subject_name']== $result['subject_name4']){ ?> selected="select" <?php } ?> value="<?php echo $rows['subject_name']?>"><?php echo $rows['subject_name']?></option>
                    
                                  <?php }
                                ?>
                                            
                            </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                        <select  class="form-control" name="course_lavel4" id="agent">
                        <option value="<?php echo $result['course_lavel4']?>"><?php echo $result['course_lavel4']?></option>
                           
                            <option value="Incompele">Select course lavel </option>
                            <option value="SSC">SSC</option>
                            <option value="SSC/(Equivalent)">SSC/(Equivalent)</option>
                            <option value="HSC">HSC </option>
                            <option value="HSC/(Equivalent)">HSC/(Equivalent)</option>
                            <option value="DIPLOMA">DIPLOMA</option>
                            <option value="Under Graduation ">Under Graduation </option>
                            <option value="Graduation">Graduation</option>
                            <option value="Post Graduation">Post Graduation</option>
                            <option value="Ph.D"> Ph.D</option>
                        </select>
                        </div>
                        <div class="col-lg-2 mb-3">
                        <select  class="form-control" name="agent_name4" id="agent">
                            <option value="Incomplete">Select Agent </option>
                            <?php 
                            $select ="SELECT * FROM applied_agent";
                            $run = mysqli_query($con,$select);
                            while($rows = mysqli_fetch_array($run)){ ?>
                            <option <?php if($rows['app_agent_name']==$result['agent_name4']){ ?> selected="select" <?php } ?> value="<?php echo $rows['app_agent_name']?>"><?php echo $rows['app_agent_name']?></option>
                            <?php }
                            ?>
                        </select>
                        </div>

                        <div class="col-lg-3">
                            <div class="row">
                                <div class="col-lg-8">
                                    
                                  <select  class="form-control" name="status4" id="agent">
                                  <option value="<?php echo $result['status4']?>"><?php echo $result['status4']?></option>
                                    <option value="Incomplete">Select status</option>
                                    <option value="Processing">Processing</option>
                                    <option value="Submitted">Submitted</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Selected">Selected</option>
                                 </select>
                                </div>
                                <div class="col-lg-4 d-flex">
                                    <input type="button" class="form-control btn-sm btn-outline-success"  style="font-size:20px; font-weight:bold;margin-right:4px"value="+" id="btn4">
                                    <input type="button" class="form-control btn-sm btn-outline-danger"style="font-size:20px; font-weight:bold;margin-right:4px" value="-" id="sub_btn4">
                                </div>

                            </div>
                        </div>
                        </div>
                  </div>
          
                <div class="mb-3 justify-content-end d-flex">
                <button type="submit" name="add_second_stage"class="btn btn-primary">Update</button>
                </div>
            </div>
      </form>
    </div>
    <?php } ?>
<div class="col-lg-1"></div>
</div>
</div>
</main>
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

            document.getElementById("sub_btn2").addEventListener("click",function(){
              var box1 = document.getElementById("hide_div2");
              if(box1){
                  box1.style.display="none";
              }
            });
            document.getElementById("sub_btn3").addEventListener("click",function(){
              var box1 = document.getElementById("hide_div3");
              if(box1){
                  box1.style.display="none";
              }
            });
            document.getElementById("sub_btn4").addEventListener("click",function(){
              var box1 = document.getElementById("hide_div4");
              if(box1){
                  box1.style.display="none";
              }
            });


      </script> 
<?php require_once('footer.php')?>