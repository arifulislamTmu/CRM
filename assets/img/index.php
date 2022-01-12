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
                                    <div class="card-body">Total Students ( <?php $select ="SELECT count(lead_id) AS total FROM tbl_leadform1";
                                                                            $run = mysqli_query($con,$select);
                                                                            $value = mysqli_fetch_assoc($run);
                                                                            echo @$value['total'];
                                                                            ?> )</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
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
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"> Visa Success (<?php $select ="SELECT count(lead_id) AS total FROM tbl_third_lead where visa_status ='VISA Success'";
                                                                            $run = mysqli_query($con,$select);
                                                                            $value = mysqli_fetch_assoc($run);
                                                                            echo @$value['total'];
                                                                            ?>)</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">Visa Succes</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Visa Refused</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
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
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                DataTable
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
                                         while($result = mysqli_fetch_array($run)){ ?>
                                        <tr>
                                            <td class="w-5"><?php echo $cont++;?></td>
                                            <td class="w-5"><?php echo $result['lead_date']?></td>
                                            <td class="w-5"><?php echo $result['lead_source']?></td>
                                            <td class="w-10"><a href="all_lead_info.php?lead_id=<?php echo $result['lead_id']?>"><?php echo $result['student_name']?> &NonBreakingSpace;<i class="fas fa-external-link-alt "></i></a></td>
                                            <td class="w-10"><?php echo $result['lead_mobile']?></td>
                                            <td class="w-5"><?php echo $result['english_test']?></td>
                                            <td class="w-5"><?php echo $result['lead_intake']?></td>
                                            <td class="w-5"><?php echo $result['lead_status']?></td>
                                            <?php if($result['lead_reminder']=='0000-00-00'){ ?>
                                                <td style="color:black; font-size: 12px;" class="w-5">No Reminder</td>
                                           <?php }else{ ?>
                                                <td style="font-size: 14px; margin-top:2px" class="w-5 badge bg-danger"><?php echo $result['lead_reminder']?></td>
                                         <?php }?>
                                            
                                            <td class="w-5"><a onclick="return confirm('You Are sure..?')" href="?id=<?php echo $result['lead_id']?>">Delete</a></td>

                                        </tr>
                                        <?php }
                                        ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                  <!--  -------------- Main content End---------------------------------------->
<?php require_once('footer.php')?>