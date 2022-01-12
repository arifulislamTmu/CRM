<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->
   
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Search Page</h1>
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
                                $delete = "DELETE FROM tbl_second_lead WHERE lead_id='$get_id'";
                                $run = mysqli_query($con,$delete);
                                $delete = "DELETE FROM tbl_third_lead WHERE lead_id='$get_id'";
                                $run = mysqli_query($con,$delete);
                                
                             echo $msg2;
                            }

                          }
                        
                        ?>
                        
                        <div class="card mb-4">
                            <div class="card-header bg-dark ">
                                
                              <h5 style="color:white"><i class="fas fa-table me-1"></i> Search Student Information</h5>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Source</th>
                                            <th>Student Name</th>
                                            <th>Mobile No</th>
                                            <th>English Test</th>
                                            <th>Applied Agent</th>

                                            <th>Status</th>
                                            <th>Reminder</th>
                                            <th>Invoice</th>
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
                                         $select_query = "SELECT * FROM `tbl_leadform1` 
                                         INNER JOIN tbl_second_lead ON tbl_leadform1.lead_id = tbl_second_lead.lead_id 
                                          INNER JOIN tbl_third_lead ON tbl_leadform1.lead_id = tbl_third_lead.lead_id ";
                                         $run = mysqli_query($con,$select_query);
                                         while($result = mysqli_fetch_array($run)){ ?>
                                        <tr>
                                            <td class="w-5"><?php echo $cont++;?></td>
                                            <td class="w-5"><?php echo $result['lead_source']?></td>
                                            <td class="w-10"><a href="all_lead_info.php?lead_id=<?php echo $result['lead_id']?>"><?php echo $result['student_name']?> &NonBreakingSpace;<i class="fas fa-external-link-alt "></i></a></td>
                                            <td class="w-10"><?php echo $result['lead_mobile']?></td>
                                            <td class="w-5"><?php echo $result['english_test']?></td>
                                            <td class="w-5"><?php echo $result['agent_name']?></td>
                                            <td class="w-5"><?php echo $result['lead_status']?></td>
                                            
                                            <?php if($result['lead_reminder']==''){ ?>
                                                <td style="color:black; font-size: 12px;" class="w-5">No Reminder</td>
                                           <?php }else{ ?>
                                                <td style="font-size: 14px; margin-top:2px" class="w-5 badge bg-danger"><?php echo $result['lead_reminder']?></td>
                                         <?php }?>
                                            <td class="w-5"><?php echo $result['invoice']?></td>
                                            <td class="w-5"><a onclick="return confirm('You Are sure..?')" href="?id=<?php echo $result['lead_id']?>">Delete</a></td>

                                        </tr>
                                        <?php }  ?>
                                    
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