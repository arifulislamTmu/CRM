<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->
         <?php 
            $cont = 1;
            $select_query = "SELECT * FROM tbl_leadform1 WHERE tbl_leadform1.assign_user='$assign_user_id' OR tbl_leadform1.role='$role_id' ORDER BY tbl_leadform1.lead_id DESC ";
            $run = mysqli_query($con,$select_query);
         
         ?>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>

                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Lead Info</li>
                        </ol>
                        <div class="row py-3 pb-3">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                              <div class="row py-4 box_shadow">

                                 <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Search Lead Information 
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
                                            <th>Intake</th>
                                            <th>Action</th>
                             
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </tfoot>
                                    <style>
                                        a{
                                        font-size: 15px;
                                        color: #2980b9;
                                        font-weight: bold;
                                        }
                                    </style>
                                    <tbody>
                                        <?php 
                                         while($result = mysqli_fetch_array($run)){ 
                                            if($result['lead_status'] == 'Go for Next'){
                                            }else{  ?>
                                        <tr>
                                            <td class="w-5"><?php echo $cont++;?></td>
                                            <td class="w-5"><?php echo $result['lead_date']?></td>
                                            <td class="w-5"><?php echo $result['lead_source']?></td>
                                            <td class="w-10"><a href="all_lead_info.php?lead_id=<?php echo $result['lead_id']?>"><?php echo $result['student_name']?> &NonBreakingSpace;<i class="fas fa-external-link-alt "></i></a></td>
                                            <td class="w-10"><?php echo $result['lead_mobile']?></td>
                                            <td class="w-5"><?php echo $result['lead_intake']?></td>
                                            <td class="w-5"><a class="btn btn-sm btn-success "href="add_lead_edid.php?id=<?php echo $result['lead_id']?> ">Add Informatin</a></td>

                                        </tr>
                                        <?php } }
                                        ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</main>
<?php require_once('footer.php')?>