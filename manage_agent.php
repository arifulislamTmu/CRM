<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->
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
 
  
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active"> Manage user</li>
                        </ol>
                        <div class="row py-3 pb-3">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                            <?php 
                                $msg ='<div class="alert bg-success">
                                <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                                <strong>Success!</strong> Data Insert Success.
                                </div>'; 
                                $msg2 ='<div class="alert bg-info">
                                <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                                <strong>Success!</strong> Data Update Success.
                                </div>'; 
                                if(isset($_POST['delete_btn'])){
                                $hissen = $_POST['hidden_id'];
                                $delete = "DELETE FROM tbl_agent WHERE id='$hissen'";
                                $run =mysqli_query($con,$delete);
                                if($run){
                                echo $msg;
                                }
                                }
                                    if(isset($_POST['update_btn'])){
                                    $hiden_up_id = $_POST['hiden_up_id'];
                                    $agent_name   = $_POST['agent_name'];
                                    $agent_mobile   = $_POST['agent_mobile'];
                                    $agent_info   = $_POST['agent_info'];

                                    $Update = "UPDATE tbl_agent SET agent_name='$agent_name',agent_mobile='$agent_mobile',agent_info='$agent_info' WHERE id='$hiden_up_id'";
                                    $run =mysqli_query($con,$Update);
                                    if($run){
                                    echo $msg2;
                                    }
                                    }
                                ?> 

                              <div class="row py-4 box_shadow">

                                 <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-table me-1"></i>
                                        Manage user Table
                                    </div>
                                
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Agent Name</th>
                                            <th>Mobile</th>
                                            <th>Other Info</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
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
                                          $select_query = "SELECT * FROM tbl_agent ORDER BY id DESC ";
                                          $run = mysqli_query($con,$select_query);
                                         while($result = mysqli_fetch_array($run)){ ?>
                                      <form action="" method="POST">
                                          <tr>
                                            <td class="w-5"><?php echo $cont++;?></td>
                                            <td class="w-5"><?php echo $result['agent_name']?></td>
                                            <td class="w-5"><?php echo $result['agent_mobile']?></td>
                                            <td class="w-5"><?php echo $result['agent_info']?></td>
                                            <td><input type="hidden" name="hidden_id" value="<?php echo $result['id']?>">
                                             <input type="submit" class="btn btn-sm btn-success " name="Edit_btn" value="Edit"/>
                                            <input type="submit" class="btn btn-sm btn-danger" onclick="return confirm('You are sure ..?')" name="delete_btn" value="Delete" /></td>
                                        </tr>
                                        </form>
                                        <?php }
                                        ?>
                                    
                                    </tbody>
                                </table>

                       <?php 
                          if(isset($_POST['Edit_btn'])){  $hissen = $_POST['hidden_id']; ?>
                                            
                                <div class="container">
                                <div class="row justify-content-center">
                                <div class="col-lg-9">
                                <div class="card shadow-lg border-0 rounded-lg mt-2">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Agent </h3></div>
                                    <div class="card-body">
                                        <div class="row mb-3 d-flex">
                                        <div class="col-md-12 col-lg-12">
                                            <form action="" method="POST">
                                           
                                            <div class="row">
                                            <?php 
                                              $select_query = "SELECT * FROM tbl_agent WHERE id='$hissen' ";
                                              $run = mysqli_query($con,$select_query);
                                                while($result = mysqli_fetch_array($run)){ ?>
                                            <div class="col-md-4 col-lg-4">
                                                    <div class="form-floating mb-3  mb-md-0">
                                                        <input class="form-control" value="<?php echo $result['agent_name']?>" required name="agent_name" id="inputFirstName" type="text" placeholder="Enter agent name" />
                                                        <label for="inputFirstName">Agent Name</label>
                                                    </div>
                                                </div>
                                               
                                                <div class="col-md-4 col-lg-4 ">
                                                    <div class="form-floating mb-3  mb-md-0">
                                                        <input class="form-control" name="agent_mobile" value="<?php echo $result['agent_mobile']?>" id="inputFirstName" type="number" placeholder="Enter agent name" />
                                                        <label for="inputFirstName">Mobile No</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-lg-4 ">
                                                    <div class="form-floating mb-3  mb-md-0">
                                                        <input class="form-control" name="agent_info" value="<?php echo $result['agent_info']?>" id="inputFirstName" type="text" placeholder="Enter agent name" />
                                                        <label for="inputFirstName">Other Information</label>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="mt-2 mb-0 d-flex py-4 justify-content-center">
                                                    <input type="hidden" name="hiden_up_id" value="<?php echo $result['id']?>">
                                                <div class=""><button name="update_btn" class="btn btn-primary btn-lg" >Update </button></div>
                                            </div>
                                            </form>
                                            <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"></div>
                                    </div>
                                 </div>
                              </div>
                             </div>
                          </div>

                       <?php }  ?>

                            </div>
                        </div>
                    </div>
                
                </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</main>
<?php require_once('footer.php')?>