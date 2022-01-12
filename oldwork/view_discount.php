<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h3 class="mt-4">Agent Comission </h3>
            <ol class="breadcrumb mb-4 py-2">
                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="view_agent_discount.php">Agent Name</a></li>
                <li class="breadcrumb-item active">Agent Comission </li>
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

    <div class="row py-3 pb-3">
        <div class="col-lg-1"></div>
            <div class="col-lg-10">

         <?php 
          $msg ='<div class="alert bg-success">
          <span class="closebtn" onclick= this.parentElement.style.display="none";>&times;</span> 
          <strong>Success!</strong> Data Insert Success.
          </div>'; 
            if(isset($_POST['discount_btn'])){
                $discount = $_POST['discount'];
                $hide_id = $_POST['hide_id'];
                $update ="UPDATE tbl_agent_discount SET discount ='$discount' WHERE id='$hide_id'";
                $run = mysqli_query($con,$update);
                if($run){
                    echo $msg;
                }else{
                    echo "not";
                }
            }
            if(isset($_POST['pay_btn'])){
                $hide_id = $_POST['hide_id'];
                $update ="UPDATE tbl_agent_discount SET status ='1' WHERE id='$hide_id'";
                $run = mysqli_query($con,$update);
                if($run){
                    echo $msg;
                }else{
                    echo "not";
                }
            }
        ?>
          <div class="row py-4 box_shadow">
              <button class="btn btn-primary py-2"> Agent Name:  <?php   echo $get_name = $_GET['id'];?>&nbsp; (Commission Settlement)</button>
                <table class="table  table-bordered mt-4">
                    <tr>
                        <th>Serial</th>
                        <th>Student Name</th>
                        <th>Mobile No</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $cont = 1;
                        $get_name = $_GET['id'];
                        $select_query = "SELECT * FROM  tbl_agent_discount WHERE agent_name='$get_name' ORDER BY  id DESC";
                        $run = mysqli_query($con,$select_query);
                        while($result = mysqli_fetch_array($run)){ 
                            $id = $result['id'];
                            $status = $result['status'];
                            ?>
                    <form action="" method="POST">
                        <tr>
                            <td><?php echo $cont++; ?></td>
                            <td><?php echo $result['student_name']?></td>
                            <td><?php echo $result['student_mobile']?></td>
                            <td class="w-25"><input required type="text" name="discount" value="<?php echo $result['discount']?>" class="form-control" placeholder="Enter Amount"> </td>
                            <td><input type="hidden"  name="hide_id" value="<?php echo $id; ?>">
                            <?php if($result['status']=='1'){ ?>
                               <input type="text" readonly class="btn btn-success btn-sm"  value="Paid">
                               &nbsp; &nbsp; <input type="hidden"  class="btn btn-primary btn-sm" value="Pay Now">
                           <?php }else{ ?>
                              <input type="submit" class="btn btn-success btn-sm" name="discount_btn" value="Save">
                              &nbsp; &nbsp; <input type="submit" class="btn btn-primary btn-sm" name="pay_btn" value="Pay Now"></td>
                         <?php  }?>

                         
                        </tr>
                    </form>
                    <?php } ?>
                </table>  
                <a href="view_agent_discount.php" class="btn btn-danger" >Close</a> 
                </div>
            </div>
        <div class="col-lg-1"></div>
    </div>
</div>
</main>
<?php require_once('footer.php')?>

                       
