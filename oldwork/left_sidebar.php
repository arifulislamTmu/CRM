<!-- side Nav section strat ```````````````````````````-->
      <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Add_student_info" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                  Manage Lead 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="Add_student_info" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add_lead_info.php">Add Information</a>
                                    <a class="nav-link" href="second_stage.php">Second Stage lead</a>
                                    <a class="nav-link" href="third_stage.php"> Third Stage lead</a>
                                    <a class="nav-link" href="forth_stage.php"> Forth Stage lead</a>
                                </nav>
                            </div>
                            <?php 
                              $select = "SELECT * FROM tbl_admin WHERE role = '0' AND id ='$assign_user_id'";
                              $run= mysqli_query($con,$select);
                              while($rows = mysqli_fetch_array($run)){ ?>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                 Manage User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="register.php">Added new user</a>
                                    <a class="nav-link" href="manage_user.php">Manage user</a>
                                    <a class="nav-link" href="manage_branch.php">Manage Branch</a>
                                 
                                </nav>
                            </div>
                            <?php  } ?>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Manageu" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-university"></i></div>
                                Manage university
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="Manageu" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="manage_university.php">Manage University</a>
                                    <a class="nav-link" href="manage_subject.php">Manage Subject</a>
                                    <a class="nav-link" href="manage_apply_agent.php">Manage Applied Agent </a>
                                </nav>
                            </div>
                         <?php 
                              $select = "SELECT * FROM tbl_admin WHERE role = '0' AND id ='$assign_user_id'";
                              $run= mysqli_query($con,$select);
                              while($rows = mysqli_fetch_array($run)){ ?>
                             <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#ManageAgent" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>
                                 Manage Agent
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="ManageAgent" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="add_new_agent.php">Added New Agent</a>
                                    <a class="nav-link" href="manage_agent.php"> Manage Agent</a>
                                    <a class="nav-link" href="view_agent_discount.php"> Agent Report</a>
                                
                                </nav>
                            </div>
                     <?php  } ?>
                            <!-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#Managediscount" aria-expanded="false" aria-controls="collapseLayouts">-->
                            <!--    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>-->
                                
                            <!--    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>-->
                            <!--</a>-->
                            <!--<div class="collapse" id="Managediscount" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">-->
                            <!--    <nav class="sb-sidenav-menu-nested nav">-->
                                   
                            <!--    </nav>-->
                            <!--</div>-->
                           </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                         GEO Plus
                    </div>
                </nav>
            </div>
  <!-- side Nav section END ```````````````````````````-->