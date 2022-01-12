<?php require_once('database/connect.php')?>
<?php if(!isset($_SESSION['userName'])){
    echo"<script>window.location='login.php'</script>";
}else{
    $userName = $_SESSION['userName'];
  $select_qu ="SELECT * FROM tbl_admin WHERE user_name ='$userName'";
  $run = mysqli_query($con,$select_qu);
  while($rows = mysqli_fetch_array($run)){
     $assign_user_id = $_SESSION['assign_user_id'] = $rows['id'];  
     $role_id = $_SESSION['role_id'] = $rows['role'];  
      
  }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>GEO PLUS</title>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
      
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
           <!-- Navbar Brand-->
           <a class="navbar-brand ps-3" href="index.php"><strong> Dashboard </strong></a>
       
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
             <div class="company_name d-flex justify-content-center">
                <a href="index.php" style="color: white; font-size: 20px; text-decoration: none; margin-left: 50px; letter-spacing: 3px; font-style: italic;"><strong>GEO</strong> Plus</a>
                
            </div>

            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="dropdown ">
                 <a style="color: white; font-size: 25px; text-decoration: none;"  class="nav-link" id="navbarDropdown"role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fas fa-bell"> </i>
                   <?php
                      $form_id= "";
                      $curr_assing_id = $_SESSION['assign_user_id'];
                        $select ="SELECT * FROM tbl_notification";
                        $ron = mysqli_query($con,$select);
                       
                        while($row = mysqli_fetch_array($ron)){
                           $form_id = $row['form_id'];
                        }
             
                        if($curr_assing_id==$form_id){
                            $select_m ="SELECT * FROM tbl_notification WHERE form_id='$form_id'";
                            $ron_qu = mysqli_query($con,$select_m);
                            $msg_count = mysqli_num_rows($ron_qu);
                            echo "<b style='color: red; font-size:15px;'> $msg_count</b>";
                        }
                        ?>
                       </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                      
                       <div class="card-body" style="width: 250px;">
                           <?php
                                 if($curr_assing_id==$form_id){
                                    $select_m ="SELECT * FROM tbl_notification WHERE form_id='$form_id'";
                                    $ron_qu = mysqli_query($con,$select_m);
                                    while($row= mysqli_fetch_array($ron_qu)){ ?>
                                    <form action="" method="POST">
                                      <p class="card-text text-center "><?php  echo $row['messages']; ?></p>
                                     
                                  <?php } }?>
                                  <button class="btn btn-success" name="data_del">Ok</button>
                               </form>
                               
                               <?php if(isset($_POST['data_del'])){
                                         $del_msg ="DELETE FROM `tbl_notification` WHERE `tbl_notification`.`form_id` ='$form_id'";
                                         $run = mysqli_query($con,$del_msg);
                                         
                                        }?>
                            </div>
                       
                     </ul>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!"><?php echo $userName ;?></a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><?php if(isset($_SESSION['userName'])){ ?>
                         <a class="dropdown-item" href="logout.php">Logout</a>
                      <?php }else{ ?>
                         <a class="dropdown-item" href="login.php">Login</a>
                      <?php } ?></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- header section End -->