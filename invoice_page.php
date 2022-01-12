<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->
<div id="layoutSidenav_content">
        <main>
            <div class="container d-flex justify-content-center px-4 mt-5">
                 <div class="col-lg-8 mt-5">
                 <div class="row border container_print ">
                     <div class="col-lg-9 container_print9 mt-4 py-3">
                       <h5 style="color: #2980b9; font-weight:700;">GEO PLUS <span>CONSULTANCY</span></h5>
                        <span>8 Boston Lofts, Sweyne Avenue,<br> Southend on Sea, SS2 6FR, UK</span> 
                        <br>
                        <label>info@geoplusconsultancy.com</label>
                        <br>
                        <label>+44 7903 206123</label>
                     </div>
                     <?php 
                     error_reporting(0);
                       
                       $getLed_id =$_GET['lead_id'];
                       $select = "SELECT * FROM `tbl_third_lead`  
                       INNER JOIN tbl_second_lead ON tbl_third_lead.lead_id = tbl_second_lead.lead_id
                       INNER JOIN tbl_leadform1 ON tbl_third_lead.lead_id = tbl_leadform1.lead_id 
                       WHERE tbl_third_lead.lead_id='$getLed_id'";
                       $run = mysqli_query($con,$select);
                       while($result = mysqli_fetch_array($run)){ ?>
       
                     <div class="col-lg-3 container_print3 mt-4 py-3">
                       <h5>INVOICE</h5>
                       <strong>Date : <?php echo date('M d, Y');?></strong>
                       <br>
                        <strong>Invoice No : <?php echo $result['invoice']?></strong> 
                     </div> 
                     <div class="col-lg-6 ml-2">
                       <h5>Bill To</h5>
                       <label><?php 
                                  $select = "SELECT * FROM applied_agent";
                                  $run = mysqli_query($con,$select);
                                  while($rs = mysqli_fetch_array($run)){
                                    $agent_name =  $rs['app_agent_name'];
                              
                                    if($agent_name==$result['agent_name']){

                                      echo $result['agent_name'];
                                      if($result['agent_name']){ ?>
                                      <br>
                                        <?php echo $rs['app_agent_adres'];?>
                                        <br>
                                      <?php  echo $rs['app_agent_email']; ?>
                                      <br>
                                      <?php  echo $rs['app_agent_infor'];?>
                                   <?php  }
                                    }elseif($agent_name==$result['agent_name2']){
                                      echo $result['agent_name2'];
                                      if($result['agent_name2']){  ?>
                                      <br>
                                        <?php echo $rs['app_agent_adres'];?>
                                        <br>
                                        <?php  echo $rs['app_agent_email']; ?>
                                        <br>
                                        <?php  echo $rs['app_agent_infor'];?>
                                   <?php 
                                      }

                                    }elseif($agent_name==$result['agent_name3']){

                                      echo $result['agent_name3'];
                                      if($result['agent_name3']){ ?>
                                       <br>
                                      <?php echo $rs['app_agent_adres'];?>
                                      <br>
                                      <?php  echo $rs['app_agent_email']; ?>
                                      <br>
                                      <?php  echo $rs['app_agent_infor'];?>
                                       
                                       
                                    <?php  }
                                    }elseif($agent_name==$result['agent_name4']){
                                      echo $result['agent_name4'];
                                      if($result['agent_name4']){ ?>
                                       <br>
                                        <?php echo $rs['app_agent_adres'];?>
                                        <br>
                                        <?php  echo $rs['app_agent_email']; ?>
                                         <br>
                                        <?php  echo $rs['app_agent_infor'];?>
                                   <?php   }
                                    }
                                  } ?></label>
                       </div>
            <style>
                table{
                width: 98%;
                height: 200px;
                border-color: skyblue;
                margin:0 auto;
               
                }
                
                thead tr th{
                  border:2px solid skyblue;
              
                }
                tbody tr td{
                  border:2px solid skyblue;
             
                  }
              
            @media print {
                table{
                width: 98%;
                height: 300px;
                border-color: skyblue;
                margin:0 auto;
               
                }
              .container_print{width: 97%;margin:30px; display: flex;}
              .container_print9{width: 68%; margin-left:4px;}
              .container_print3{width: 30%;}
              #print{display: none;}
            }
            </style>
                     <div class="col-lg-12">
                         <table>
                            <thead style="Background:#ecf0f1;">
                                 <tr>
                                    <th style="width:16%;text-align:center" >Student Name</th>
                                    <th style="width:30%;text-align:center" >Description</th>
                                    <th style="width:10%;text-align:center" >Paid  Fees</th>
                                    <th style="width:12%;text-align:center" >Comission</th>
                                    <th style="width:10%;text-align:center" >Payable</th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td style=" padding-bottom:200px; ">&nbsp; <?php echo $result['student_name']?></td>
                                     <td style=" padding-bottom:120px;"> <?php echo $result['university_name1']?> 
                                                                          <br><?php echo $result['subject_name1']?>
                                                                           <br><?php echo $result['course_lavel1']?> 
                                                                         </td>
                                     <td style=" padding-bottom:200px;"> &nbsp;&nbsp;<?php echo $result['paid_amount']?></td>
                                     <td style=" padding-bottom:200px;"> &nbsp;&nbsp;<?php echo $result['comission']?>%</td>
                                     <td style=" padding-bottom:200px;"> &nbsp;&nbsp; <?php echo $result['paid_amount']*$result['comission']/100?></td>
                                 </tr>
                                 
                             </tbody>
                             <tfoot>
                             <tr>
                               <td class="border-0"></td>  <td class="border-0"></td> <td class="border-0"></td><td style="text-align:right; border:0px solid skyblue"><b>Total</b></td><td style="text-align:center; border:0px solid skyblue; "> <b><?php echo $result['paid_amount']*$result['comission']/100?></b></td>
                            </tr>
                            <tr>
                                <td></td> <td></td> <td class="border-0"></td><td style="text-align:right; border:0px solid skyblue;">Received</td><td style="text-align:center; border:0px solid skyblue;"> <?php echo $result['ricived_amount']?></td>
                            </tr>
                            <tr>
                                <td></td> <td></td><td class="border-0"></td><td style="text-align:right;  border:0px solid skyblue">Due </td><td style="text-align:center; border:0px solid skyblue;"> <?php echo $result['paid_amount']*$result['comission']/100-$result['ricived_amount'];?></td>
                            </tr>
                            <tr>
                              <td></td><td></td><td class="border-0"></td><td style="text-align:right; border:0px solid skyblue"><b>Net Payable</b></td><td style="text-align:center; border:0px solid skyblue;"> <b><?php echo $result['paid_amount']*$result['comission']/100-$result['ricived_amount'];?></b></td>
                            </tr>
                            <tr>
                              <td colspan="2" style="border: 2px solid skyblue; height:100px">
                                    <div class="header" style="Background:skyblue" >
                                      <strong>Remarks</strong>
                                    </div>
                                    <div class="body_remarks" style="height:100px">
                                      <p><?php echo $result['remarks'];?></p>
                                    </div>
                              </td>
                            </tr>
                         </tfoot>
                         </table>
                    
                     </div>
                     <div class="div py-2 d-flex justify-content-end">
                     <button id="print" class="btn btn-success"><i class="fas fa-print"></i> Print</button>
                     </div>
                     <?php  } ?>
                 </div>
             </div>
       </div>

    </main>
    <script src="js/jquery.min.js"></script>
      <script src="js/printThis.js"></script>
      <script>
      $('#print').click(function(){
        $('.container_print').printThis();
      })
      </script>

<?php require_once('footer.php')?>