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
                <strong>Success!</strong> Data Insert Success.
            </div>';
          $msg2 ='<div class="alert bg-danger">
            <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
            <strong>Warning! </strong>User Name Already Exist....!
        </div>';
           if(isset($_POST['create_user'])){
             $user_name     = $_POST['user_name'];
             $user_email     = $_POST['user_email'];
             $user_mobile     = $_POST['user_mobile'];
             $password   = $_POST['password'];
             $branch_name2   = $_POST['branch_name2'];
              $user_role   = $_POST['user_role'];
      
             $select_qur = "SELECT * FROM tbl_admin WHERE user_name ='$user_name'";
              $run = mysqli_query($con,$select_qur);
              $chack = mysqli_num_rows($run)>0;
             if($chack){
                echo $msg2;
             }else{
                $insert_reg = "INSERT INTO  tbl_asign_branch(branch_name)VALUES('$user_name')";
                $query = mysqli_query($con,$insert_reg);
               $insert_lead = "INSERT INTO  tbl_admin(user_name,user_email,user_mobile,user_password,branch_name2,role)VALUES('$user_name','$user_email','$user_mobile','$password','$branch_name2','$user_role')";
               $query = mysqli_query($con,$insert_lead);
              if($query){
                  echo $msg;
              }else{
                echo "data not insert";
              }
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
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" name="user_name" required id="inputFirstName" type="text" placeholder="Enter your first name" />
                                <label for="inputFirstName">User name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control" name="user_email"id="inputEmail" type="email" placeholder="name@example.com" />
                                <label for="inputEmail">Email address</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                    <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" id="inputPasswordConfirm" name="user_mobile" type="number" placeholder="mobile number" />
                                <label for="inputPasswordConfirm">User Mobile</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control" required id="inputPasswordConfirm" name="password" type="password" placeholder="Confirm password" />
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
                                     <option value="<?php echo $res['branch_name']?>"><?php echo $res['branch_name']?></option>
                                   <?php } ?>
                                 
                                </select>
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class=" mt-3 mb-md-0">
                                <select class="form-select" required  name='user_role'aria-label="Default select example">
                                  <option value=" " selected>Select User Role</option>
                                  <option value="1">Creator</option>
                                 <option value="0">Admin</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 mb-0">
                        <div class="d-grid"><button name="create_user" class="btn btn-primary btn-block" >Create user</button></div>
                    </div>
                </form>
            </div>
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

