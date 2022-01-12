<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!-- side Nav section END ```````````````````````````-->
  <!--  -------------- Main content Start---------------------------------------->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Add user</h3>
                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">added user</li>
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
      $msg ='<div class="alert bg-success">
                <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                <strong>Success!</strong> Data Updated Success.
            </div>';
          $msg2 ='<div class="alert bg-danger">
            <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
            <strong>Warning! </strong> NOT Success...!
        </div>';
        $gt_id = $_GET['id'];
           if(isset($_POST['create_user'])){
             $user_name     = $_POST['user_name'];
             $user_email     = $_POST['user_email'];
             $user_mobile     = $_POST['user_mobile'];
             $password   = $_POST['password'];
             $branch_name2   = $_POST['branch_name2'];
              $user_role   = $_POST['user_role'];
      
                $insert_reg = "UPDATE tbl_asign_branch SET branch_name='$user_name' WHERE branch_id='$gt_id'";
                $query = mysqli_query($con,$insert_reg);
               $insert_lead = "UPDATE tbl_admin SET user_name='$user_name',user_email='$user_email',user_mobile='$user_mobile',user_password='$password',branch_name2='$branch_name2',role='$user_role' WHERE id='$gt_id'";
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
    <div class="col-lg-10">
        <div class="container">
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card shadow-lg border-0 rounded-lg mt-2">
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Update Account</h3></div>
           <?php
            $gt_id = $_GET['id'];
            $select_query = " SELECT * FROM `tbl_admin` WHERE id ='$gt_id'";
            $run = mysqli_query($con,$select_query);
            while($result = mysqli_fetch_array($run)){ ?>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="user_name" value="<?php echo $result['user_name']?>" required id="inputFirstName" type="text" placeholder="Enter your first name" />
                                <label for="inputFirstName">User name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" name="user_email"id="inputEmail" value="<?php echo $result['user_email']?>" type="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputPasswordConfirm"  name="user_mobile"  value="<?php echo $result['user_mobile']?>"  type="number" placeholder="mobile number" />
                                <label for="inputPasswordConfirm">User Mobile</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" required id="inputPasswordConfirm" name="password"  type="password"  value="<?php echo $result['user_mobile']?>" placeholder="Confirm password" />
                                <label for="inputPasswordConfirm">Confirm Password</label>
                            </div>
                        </div> 
                         <div class="col-md-6">
                            <div class=" mt-3 mb-md-0">
                                <select class="form-select"  name='branch_name2'aria-label="Default select example">
                                  <option selected>Select Branch</option>
                                 <?php 
                                   $select = "SELECT * FROM tbl_branch";
                                   $run =mysqli_query($con,$select);
                                   while($res = mysqli_fetch_array($run)){ ?>
                                     <option <?php if($res['branch_name']==$result['branch_name2']){ ?> selected="select"<?php }?> value="<?php echo $res['branch_name']?>"><?php echo $res['branch_name']?></option>
                                   <?php } ?>
                                 
                                </select>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class=" mt-3 mb-md-0">
                                <select class="form-select" required  name='user_role'aria-label="Default select example">
                                  <option value="<?php echo $result['role']?>" selected><?php if($result['role']=='0'){echo"Admin";}else{echo"Creator";}?></option>
                                  <option value="1">Creator</option>
                                 <option value="0">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button name="create_user" class="btn btn-primary btn-block" >Update user</button></div>
                    </div>
                </form>
            </div>
            <?php }?>
            <div class="card-footer text-center py-3">
                <div class="small"></div>
            </div>
        </div>
    </div>
</div>
</div>     
</div>
<div class="col-lg-1"></div>
    </div>
</div>
</main>
    
<?php require_once('footer.php')?>

