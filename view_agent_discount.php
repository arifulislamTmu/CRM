<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->

            <div id="layoutSidenav_content">
                <main>
                    <div class="container px-4">
                        
                        <h4 class="mt-4">Agent Table</h4>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Data Table 
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th class="w-25">Serial</th>
                                            <th class="w-50">Agent Name</th>
                                            <th class="w-25">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $cont = 1;
                                         $select_query = "SELECT DISTINCT agent_name FROM  tbl_agent";
                                         $run = mysqli_query($con,$select_query);
                                         while($result = mysqli_fetch_array($run)){  ?>
                                        <tr><?php  if($result['agent_name']=='Facebook' OR  $result['agent_name']=='Website'){
                                                } else{ ?><td class="w-25"><?php echo $cont++;?></td><td><?php echo $result['agent_name']; ?></td>
                                                 
                                            <td class="w-25"><a class="btn btn-outline-success btn-sm" href="view_discount.php?id=<?php echo $result['agent_name'];?> ">View Student</a></td>
                                        </tr>
                                        <?php }  }
                                        ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                  <!--  -------------- Main content End---------------------------------------->
<?php require_once('footer.php')?>