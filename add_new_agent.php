<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!-- side Nav section END ```````````````````````````-->
  <!--  -------------- Main content Start---------------------------------------->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h3 class="mt-4">Added Agent</h3>
                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">added agent</li>
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
            <strong>Warning! </strong>Agent Name Already Exist....!
        </div>';
      
           if(isset($_POST['university_btn'])){
            $agent_name   = $_POST['agent_name'];
            $agent_mobile   = $_POST['agent_mobile'];
            $agent_info   = $_POST['agent_info'];

            $select ="SELECT * FROM tbl_agent where agent_name='$agent_name'";
            $run = mysqli_query($con,$select);
            if(mysqli_num_rows($run)>0){  
                echo $msg2;
            }else{
                $insert_lead = "INSERT INTO  tbl_agent(agent_name,agent_mobile,agent_info)VALUES('$agent_name','$agent_mobile','$agent_info')";
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
            <div class="card-header"><h3 class="text-center font-weight-light my-4">Added Agent </h3></div>
            <div class="card-body">
              <div class="row mb-3 d-flex">
              <div class="col-md-12 col-lg-12">
                  <form action="" method="POST">
                  <div class="row">
                  <div class="col-md-4 col-lg-4">
                            <div class="form-floating mb-3  mb-md-0">
                                <input class="form-control" required name="agent_name" id="inputFirstName" type="text" placeholder="Enter agent name" />
                                <label for="inputFirstName">Agent Name</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 ">
                            <div class="form-floating mb-3  mb-md-0">
                                <input class="form-control" name="agent_mobile" id="inputFirstName" type="number" placeholder="Enter agent name" />
                                <label for="inputFirstName">Mobile No</label>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4 ">
                          <div class="form-floating mb-3  mb-md-0">
                              <input class="form-control" name="agent_info" id="inputFirstName" type="text" placeholder="Enter agent name" />
                              <label for="inputFirstName">Other Information</label>
                          </div>
                      </div>
                      </div>
                        <div class="mt-2 mb-0 d-flex py-4 justify-content-center">
                        <div class=""><button name="university_btn" class="btn btn-primary btn-lg" >Save </button></div>
                    </div>
                    </form>
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
</div>
<div class="col-lg-1"></div>
    </div>
</div>
</main>
    
<?php require_once('footer.php')?>

