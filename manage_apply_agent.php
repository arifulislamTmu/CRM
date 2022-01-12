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
                                  <strong>Success!</strong> Data Insert Success.
                                  </div>'; 
                                  
                                  if(isset($_POST['subject_btn'])){
                                    $app_agent_name  = $_POST['app_agent_name'];
                                    $app_agent_adres  = $_POST['app_agent_adres'];
                                    $app_agent_email  = $_POST['app_agent_email'];
                                    $app_agent_infor  = $_POST['app_agent_infor'];
                                      
                                    $insert_lead = "INSERT INTO  applied_agent(app_agent_name,app_agent_adres,app_agent_email,app_agent_infor)
                                                         VALUES('$app_agent_name','$app_agent_adres','$app_agent_email','$app_agent_infor')";
                                    $query = mysqli_query($con,$insert_lead);
                                   if($query){
                                       echo $msg2;
                                   }else{
                                     echo "data not insert";
                                   }
                                }
                                if(isset($_REQUEST['sub_id'])){
                                    $hissen = $_GET['sub_id'];
                                    $delete = "DELETE FROM applied_agent WHERE id='$hissen'";
                                    $run =mysqli_query($con,$delete);
                                    if($run){
                                   
                                    }
                                  }
                                ?>
                              <div class="row py-4 box_shadow">
                                 <div class="card mb-4">
                                    <div class="card-header">
                                    <div class="row ">
                                        <div class="col-lg-4">
                                            <form action="" method="POST">
                                                <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" required name="app_agent_name" id="inputFirstName" type="text" />
                                                  <label for="inputFirstName">Applied agent name</label>
                                                 </div>
                                             </div>
                                           <div class="col-lg-3">
                                             <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" required name="app_agent_email" id="inputFirstName" type="email" />
                                                  <label for="inputFirstName">Email Address</label>
                                                 </div>
                                           </div>         
                                            <div class="col-lg-3">
                                                 <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" required name="app_agent_adres" id="inputFirstName" type="text" />
                                                  <label for="inputFirstName">Applied Agent Address</label>
                                             </div>
                                            </div>
                                            <div class="col-lg-2">
                                                 <div class="form-floating mb-3 mb-md-0">
                                                <input class="form-control" required name="app_agent_infor" id="inputFirstName" type="text" />
                                                  <label for="inputFirstName">Other Info</label>
                                             </div>
                                            </div>
                                            <div class="col-lg-12 d-flex justify-content-end">
                                            <div class=""><button name="subject_btn" class="btn btn-primary  mt-2" >Save</button></div>
                                         </form>
                                    </div>
                                        
                                    </div>
                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Applied Agent </th>
                                            <th>Email Address </th>
                                            <th>Agent Address</th>
                                            <th>Other Information </th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        
                                    </tfoot>
                                    <style>
                                        a{
                                        text-decoration: none;
                                        font-size: 15px;
                                        color: #000;
                                        font-weight: bold;
                                        }
                                    </style>
                                    <tbody>
                                        <?php 
                                        $cont = 1;
                                        $select_query = "SELECT * FROM applied_agent  ORDER BY id DESC";
                                        $run = mysqli_query($con,$select_query);
                                         while($result = mysqli_fetch_array($run)){ ?>
                                        <tr>
                                            <td class="w-5"><?php echo $cont++;?></td>
                                             <td class="w-5"><?php echo $result['app_agent_name']?></td>
                                             <td class="w-5"><?php echo $result['app_agent_email']?></td>
                                             <td class="w-5"><?php echo $result['app_agent_adres']?></td>
                                             <td class="w-5"><?php echo $result['app_agent_infor']?></td>
                                             <td class="w-5">
                                              <?php if($role_id=='0'){ ?>
                                                <a class="btn btn-sm btn-success" href="manage_apply_edit.php?edit_id=<?php echo $result['id']?>">Edit</a>
                                                <a class="btn btn-sm btn-danger" onclick="return confirm('You are Sure..?')" href="?sub_id=<?php echo $result['id']?> ">Delete</a>
                                             
                                          <?php }else{  }?>
                                              </td>
                                           </tr>
                                        <?php }
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