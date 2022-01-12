<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h5 class="mt-4">manage user</h5>
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
                            $delete = "DELETE FROM tbl_admin WHERE id='$get_id'";
                            $run = mysqli_query($con,$delete);
                            if($run){
                             echo $msg2;
                            }

                          }
                        
                        ?>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                User Datatable
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>User name</th>
                                            <th>User mobile</th>
                                            <th>User password</th>
                                            <th>Branch Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $cont = 1;
                                         $select_query = " SELECT * FROM `tbl_admin`";
                                         $run = mysqli_query($con,$select_query);
                                         while($result = mysqli_fetch_array($run)){ ?>
                                        <tr>
                                            <td class="w-5"><?php echo $cont++;?></td>
                                            <td class="w-5"><?php echo $result['user_name']?></td>
                                             <td class="w-5"><?php echo $result['user_mobile']?></td>
                                            <td class="w-5"><?php echo $result['user_password']?></td>
                                            <td class="w-5"><?php echo $result['branch_name2']?></td>
                                            <td class="w-5"><a class="btn btn-sm btn-success" href="">Edit</a> <a onclick="return confirm('You are sure...?')" class="btn btn-sm btn-danger" href="?id=<?php echo $result['id']?>">Delete</a></td>
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