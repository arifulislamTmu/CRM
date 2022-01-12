<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->
   
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Students ( <?php $select ="SELECT count(lead_id) AS total FROM tbl_leadform1 WHERE role='$role_id'";
                                                                            $run = mysqli_query($con,$select);
                                                                            $value = mysqli_fetch_assoc($run);
                                                                            echo @$value['total'];
                                                                            ?> )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                 
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card  text-white mb-4" style="background-color:#6c5ce7">
                                    <div class="card-body">Applied Student ( <?php $select ="SELECT count(lead_id) AS total FROM tbl_second_lead where status1='Selected'";
                                                                            $run = mysqli_query($con,$select);
                                                                            $value = mysqli_fetch_assoc($run);
                                                                            echo @$value['total'];
                                                                            ?> )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                 
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> Visa Success ( <?php $select ="SELECT count(lead_id) AS total FROM tbl_third_lead where visa_status ='VISA Success'";
                                                                            $run = mysqli_query($con,$select);
                                                                            $value = mysqli_fetch_assoc($run);
                                                                            echo @$value['total'];
                                                                            ?> )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                 
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card text-white mb-4" style="background-color:#2c3e50;">
                                    <div class="card-body">Total University ( <?php $select ="SELECT count(university_name) AS total FROM tbl_university";
                                                                            $run = mysqli_query($con,$select);
                                                                            $value = mysqli_fetch_assoc($run);
                                                                            echo @$value['total'];
                                                                            ?> )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">

                                    </div>
                                </div>
                            </div>
                        </div>
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
                           $msg2 ='<div class="alert bg-danger">
                           <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                           <strong>Warning! </strong>Deleted Success....!
                           </div>';
                          if(isset($_GET['id'])){

                            $get_id = $_GET['id'];
                            $delete = "DELETE FROM tbl_leadform1 WHERE lead_id='$get_id'";
                            $run = mysqli_query($con,$delete);
                            if($run){
                             echo $msg2;
                            }

                          }
                        
                        ?>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                       Daily Lead  Chart
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                       Monthly Lead Chart
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header bg-dark ">
                                
                              <h5 style="color:white"><i class="fas fa-table me-1"></i> First lead Information</h5>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Date</th>
                                            <th>Source</th>
                                            <th>Student Name</th>
                                            <th>Mobile No</th>
                                            <th>English Test</th>
                                            <th>Intake</th>
                                            <th>Status</th>
                                            <th>Reminder</th>
                                            <th>Action</th>
                             
                                        </tr>
                                    </thead>
                                 
                                    <style>
                                        a{
                                        font-size: 15px;
                                        color: #2980b9;
                                        font-weight: bold;
                                        }
                                    </style>
                                    <tbody>
                                        <?php 
                                        $cont = 1;
                                         $select_query = "SELECT * FROM tbl_leadform1 WHERE assign_user='$assign_user_id' OR role='$role_id' ORDER BY `lead_id` DESC ";
                                         $run = mysqli_query($con,$select_query);
                                         while($result = mysqli_fetch_array($run)){ 
                                             
                                             if($result['lead_status'] == 'Go for Next'){

                                             }else{
                                             ?>
                                        <tr>
                                            <td class="w-5"><?php echo $cont++;?></td>
                                            <td class="w-5"><?php echo $result['lead_date']?></td>
                                            <td class="w-5"><?php echo $result['lead_source']?></td>
                                            <td class="w-10"><a href="all_lead_info.php?lead_id=<?php echo $result['lead_id']?>"><?php echo $result['student_name']?> &NonBreakingSpace;<i class="fas fa-external-link-alt "></i></a></td>
                                            <td class="w-10"><?php echo $result['lead_mobile']?></td>
                                            <td class="w-5"><?php echo $result['english_test']?></td>
                                            <td class="w-5"><?php echo $result['lead_intake']?></td>
                                            <td class="w-5"><?php echo $result['lead_status']?></td>
                                            <?php if($result['lead_reminder']==''){ ?>
                                                <td style="color:black; font-size: 12px;" class="w-5">No Reminder</td>
                                           <?php }else{ ?>
                                                <td style="font-size: 14px; margin-top:2px" class="w-5 badge bg-danger"><?php echo $result['lead_reminder']?></td>
                                         <?php }?>
                                            
                                            <td class="w-5"><a onclick="return confirm('You Are sure..?')" href="?id=<?php echo $result['lead_id']?>">Delete</a></td>

                                        </tr>
                                        <?php } }
                                        ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>

             <div class="card my-5">
                <div class="card-header bg-primary">
                <h5 style="color:white"><i class="fas fa-table me-1"></i> Second Stage Lead Information</h5>
                </div>
                <div class="card-body">
                    <table id="myTable" class="table  table-hover table-bordered border" >
                        <thead>
                            <th>Student Name</th>
                            <th>Skype Id</th>
                            <th>WhatsApp</th>
                            <th>Agent Name</th>
                            <th>Document List</th>
                        </thead>
                        <tbody>
                            <?php 
                              $select ="SELECT * FROM `tbl_leadform1` 
                              INNER JOIN tbl_second_lead ON tbl_leadform1.lead_id = tbl_second_lead.lead_id ";
                              $run = mysqli_query($con,$select);
                              while($result = mysqli_fetch_array($run)){ 
                                if($result['status1'] == 'Selected'){

                                }else{
                                  ?>
                                <tr>
                                    <td><a href="all_lead_info.php?lead_id=<?php echo $result['lead_id']?>"><?php echo $result['student_name']?> &NonBreakingSpace;<i class="fas fa-external-link-alt "></i></a></td>
                                    <td><?php echo $result['skype_id']?></td>
                                    <td><?php echo $result['whatsapp_id']?></td>
                                    <td><?php echo $result['agent_name']?></td>
                                    <td><a target="_blank" href="<?php echo $result['doc_list']?>">View Document</a></td>
                             </tr>
                             <?php } } ?>
                           
                        </tbody>
                    </table>
             
                </div>
            </div>

            <div class="card my-5">
                <div class="card-header bg-success">
                <h5 style="color:white"><i class="fas fa-table me-1"></i> Third Stage Lead Information</h5>
                </div>
                <div class="card-body">
                    <table id="myTable2" class="table  table-hover table-bordered border" >
                        <thead>
                            <th>Student Name</th>
                            <th>Offer Status</th>
                            <th>CAS Status</th>
                            <th>Bank Stetment</th>
                            <th>Tuition Payment</th>
                            <th>Visa Status</th>
                        </thead>
                        <tbody>
                            <?php 
                              $select ="SELECT * FROM `tbl_leadform1` 
                              INNER JOIN tbl_second_lead ON tbl_leadform1.lead_id = tbl_second_lead.lead_id 
                               INNER JOIN tbl_third_lead ON tbl_leadform1.lead_id = tbl_third_lead.lead_id ";
                              $run = mysqli_query($con,$select);
                              while($result = mysqli_fetch_array($run)){
                                if($result['visa_status'] == 'VISA Success'){

                                }else{
                                  ?>
                                <tr>
                                    <td><?php echo $result['student_name']?></td>
                                    <td><?php echo $result['Offer_status']?></td>
                                    <td><?php echo $result['cash_status']?></td>
                                    <td><?php echo $result['bank_stmnt']?></td>
                                    <td><?php echo $result['tuition_payment']?></td>
                                    <td><?php echo $result['visa_status ']?></td>
                             </tr>
                             <?php }  }?>
                           
                        </tbody>
                    </table>
             
                </div>
            </div>


    </div>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
          <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
       <script>
           $(document).ready( function () {
    $('#myTable').DataTable();
} );

$(document).ready( function () {
    $('#myTable2').DataTable();
} );
       </script>
<?php require_once('footer.php')?>