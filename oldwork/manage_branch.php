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
                            <li class="breadcrumb-item active">Added Branch</li>
                        </ol>
                        <div class="row py-3 pb-3">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10">
                                <?php 
                                  $msg ='<div class="alert bg-success">
                                  <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                                  <strong>Success!</strong> Data Insert Success.
                                  </div>'; 
                                  $msg2 ='<div class="alert bg-danger">
                                  <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
                                  <strong>Success!</strong> Data Delete Success.
                                  </div>'; 
                                if(isset($_POST['add_btn'])){
                                     $branch_name = $_POST['branch_name'];
                                     $inser = "INSERT INTO tbl_branch(branch_name)values('$branch_name')";
                                     $run =mysqli_query($con,$inser);
                                     if($run){
                                      echo $msg;
                                     }else{
                                         echo "Not insert ";
                                     }

                                }


                                if(isset($_GET['sub_id'])){
                                    $hissen = $_GET['sub_id'];
                                    $delete = "DELETE FROM tbl_branch WHERE id='$hissen'";
                                    $run =mysqli_query($con,$delete);
                                    if($run){
                                    echo $msg2;
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
                                                <input class="form-control" required name="branch_name" id="inputFirstName" type="text" placeholder="Enter your first name" />
                                                  <label for="inputFirstName">Add New Branch </label>
                                                 </div>
                                            </div>
                                            <div class="col-lg-4">
                                            <div class=""><button name="add_btn" class="btn btn-primary btn-lg mt-1" >Save</button></div>
                                         </form>
                                    </div>
                                        
                                    </div>
                                        

                                    </div>
                                    <div class="card-body">
                                        <table id="datatablesSimple">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Branch Name</th>
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
                                        $select_query = "SELECT * FROM tbl_branch  ORDER BY id DESC";
                                        $run = mysqli_query($con,$select_query);
                                         while($result = mysqli_fetch_array($run)){ ?>
                                        <tr>
                                            <td class="w-5"><?php echo $cont++;?></td>
                                             <td class="w-5"><?php echo $result['branch_name']?></td>
                                             <td class="w-5"><a class="btn btn-sm btn-danger" onclick="return confirm('You are Sure..?')" href="?sub_id=<?php echo $result['id']?> ">Delete</a></td>

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