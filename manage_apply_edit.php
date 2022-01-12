<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->
           <?php 
          
           ?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Manage Applied Agent</li>
                        </ol>
                        <div class="row py-3 pb-3">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <?php 
                                 
                                  $msg2 ='<div class="alert bg-info">
                                  <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                                  <strong>Success!</strong> Data Updated Success.
                                  </div>'; 
                                  
                                  if(isset($_POST['subject_btn'])){
                                    $get_id = $_GET['edit_id'];
                                    $app_agent_name  = $_POST['app_agent_name'];
                                    $app_agent_adres  = $_POST['app_agent_adres'];
                                    $app_agent_email  = $_POST['app_agent_email'];
                                    $app_agent_infor  = $_POST['app_agent_infor'];
                                      
                                    $insert_lead = "UPDATE  applied_agent SET  app_agent_name='$app_agent_name',app_agent_adres='$app_agent_adres',app_agent_email='$app_agent_email',app_agent_infor='$app_agent_infor' WHERE id='$get_id'";
                                    $query = mysqli_query($con,$insert_lead);
                                   if($query){
                                       echo $msg2;
                                   }else{
                                     echo "data not insert";
                                   }
                                }
                                ?>
                                <?php
                                  $get_id = $_GET['edit_id'];
                                  $select = "SELECT * FROM applied_agent WHERE id = '$get_id'"; 
                                  $run = mysqli_query($con,$select);
                                  while($result= mysqli_fetch_array($run)){ ?>

                              <div class="row py-4 box_shadow">
                                 <div class="card mb-4">
                                    <div class="card-body">
                                    <div class="row ">
                                        <div class="col-lg-6">
                                            <form action="" method="POST">
                                                <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" required name="app_agent_name" value="<?php echo $result['app_agent_name']?>" id="inputFirstName" type="text" />
                                                  <label for="inputFirstName">Applied agent name</label>
                                                 </div>
                                             </div>
                                           <div class="col-lg-6">
                                             <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" required name="app_agent_email" value=" <?php echo $result['app_agent_email']?>"  id="inputFirstName" type="email" />
                                                  <label for="inputFirstName">Email Address</label>
                                                 </div>
                                           </div>         
                                            <div class="col-lg-6 mt-3">
                                                 <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" required name="app_agent_adres" value="<?php echo $result['app_agent_adres']?>"  id="inputFirstName" type="text" />
                                                  <label for="inputFirstName">Applied Agent Address</label>
                                             </div>
                                            </div>
                                            <div class="col-lg-6 mt-3">
                                                 <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" required name="app_agent_infor"  value="<?php echo $result['app_agent_infor']?> " id="inputFirstName" type="text" />
                                                  <label for="inputFirstName">Other Info</label>
                                             </div>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-end">
                                            <div class=""><button name="subject_btn" class="btn btn-primary  mt-2" >Update</button></div>
                                         </form>
                                    </div>
                                        
                                    </div>
                                    </div>
                                  
                        </div>
                    </div>
                    
                    <?php   }?>
        
                </div>
    
            <div class="col-lg-1"></div>

      
        </div>

    </div>
</main>
<?php require_once('footer.php')?>