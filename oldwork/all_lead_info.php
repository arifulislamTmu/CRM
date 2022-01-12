<?php require_once('main_header.php')?>
  <?php require_once('left_sidebar.php')?>
  <!--  -------------- Main content Start---------------------------------------->

           


            <div id="layoutSidenav_content">
                <main>
               <style>
               .header_adr h4{
                   letter-spacing:4px;
               }
                   
               </style>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"></h1>
                        <ol class="breadcrumb mb-4 py-2">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">lead Information</li>
                        </ol>
                        <div class="row py-3 pb-3">
                            <div class="col-lg-1"></div>
                            <div class="col-lg-10 ">
                           <div class="row box_shadow d-flex container_print justify-content-center">
                             <div class="row print_logo_main pb-2">
                             <div class="print_logo  col-lg-3">
                            </div>
                            <div class="col-lg-7  print_logo_8 text-center">
                                <div class="header_adr">
                                    <h4>GEO PLUS CONSULTANCY</h4>
                                 <strong><b> Address - </b> 51/51-A Resourcful Paltan City (7th Floor), Dhaka-1000</strong>
                                </div>
                                <div class="header_email">
                                    <strong> <b> E-mail - </b> info@geoplusconsultancy.com</strong>
                                </div>
                                <div class="header_phone">
                                    <strong><b> Mobile - </b>+88 01644-679691</strong>
                                </div>
                           </div>
                           <div class="col-lg-2 print_logo_1">
                               <lable>Date-<?php echo date("Y/m/d");?></lable>
                            </div>
                             </div>
                           
                            <?php 
                            $getLead_id = $_GET['lead_id'];
                            $select_qu = "SELECT * FROM tbl_leadform1 WHERE lead_id ='$getLead_id' limit 1";
                            $run = mysqli_query($con,$select_qu);
                            while($rows = mysqli_fetch_array($run)){ ?>
                                
                              <div class="col-lg-12 justify-content-center bg-color py-2 d-flex"><h4>Lead Information Report </h4>
                            
                            </div>
                                  <div class="col-lg-12 "><h4>Student name: <?php echo $rows['student_name'];?></h4></div>
                                 <hr>
                                  <div class="col-lg-6 print_col_6 pb-3 mb-4">
                                  <table class="table table-striped table-hover border">
                                            <tbody>
                                                <tr class="table-primary">
                                                    <th style="width:45%"><strong>Date</strong></th>
                                                    <td style="width:10%"><strong> - </strong></td>
                                                    <th style="width:45%"><?php echo $rows['lead_date']?></th>
                                                </tr>
                                                <tr>
                                                    <td><strong>Mobile Number</strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php echo $rows['lead_mobile']?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Email</strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php echo $rows['lead_email']?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Source </strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php echo $rows['lead_source']?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Intake </strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php echo $rows['lead_intake']?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Assign User </strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php $assign_user = $rows['assign_user'];
                                                           $selet ="SELECT * FROM tbl_asign_branch Where branch_id='$assign_user'";
                                                            $run = mysqli_query($con,$selet); 
                                                            while($row = mysqli_fetch_array($run)){
                                                         echo $row['branch_name'];
                                                     }?>
                                                     </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Reminder </strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php echo $rows['lead_reminder']?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Comments </strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php echo $rows['lead_comments']?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Status </strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php echo $rows['lead_status']?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Remakrs </strong></td>
                                                    <td><strong> - </strong></td>
                                                    <td><?php echo $rows['lead_remaks']?></td>
                                                </tr>
                                            </tbody>

                                        </table>
                                        
                                  </div>
                                  <div class="col-lg-6 print_col_6 pb-2 mb-2">
                                        <table class="table table-striped table-hover border">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>Education</th>
                                                    <th>GPA</th>
                                                    <th>Year</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                               <tr>
                                                    <td><?php echo $rows['english_test']?></td>
                                                    <td> <?php echo $rows['lead_result']?></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td><?php echo $rows['lead_ssc1']?></td>
                                                    <td><?php echo $rows['lead_ssc1_gpa']?></td>
                                                    <td><?php echo $rows['lead_ssc1_year']?></td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td><?php echo $rows['lead_hsc']?></td>
                                                    <td><?php echo $rows['lead_hsc_gpa']?></td>
                                                    <td><?php echo $rows['lead_hsc_year']?></td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td><?php echo $rows['lead_diploma']?></td>
                                                    <td><?php echo $rows['lead_diploma_gpa']?></td>
                                                    <td><?php echo $rows['lead_diploma_year']?></td>
                                                  
                                                </tr>
                                                <tr>
                                                    <td><?php echo $rows['lead_bechalor']?></td>
                                                    <td><?php echo $rows['lead_bechalor_gpa']?></td>
                                                    <td><?php echo $rows['lead_bechalor_year']?></td>
                                                  
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="countinue eidt_buton d-flex py-5 justify-content-end">
                                            <a href="add_lead_edid.php?id=<?php echo $getLead_id;?>" class="btn btn-primary btn-lg eidt_buton ">Edit</a>
                                        </div>
                                  </div>
                               <?php  } ?>
                         <?php 
                            $getLead_id = $_GET['lead_id'];
                         
                            $select_qu = "SELECT * FROM tbl_second_lead WHERE lead_id ='$getLead_id' limit 1";
                            $run = mysqli_query($con,$select_qu);
                            if(mysqli_num_rows($run)>0){  while($rows = mysqli_fetch_array($run)){ ?>
                              
                                    <div class="col-lg-12 py-3 bg-color d-flex justify-content-center"> 
                                        <h5>Second Stage Lead Information</h5>
                                    </div>
                                      <div class="col-lg-4 py-2 secend_div ">
                                      <table class="table table-striped table-hover border ">
                                               <tbody>
                                                   <tr class="table-primary" >
                                                       <td style="width:45%"><strong>Skype ID </strong></td>
                                                       <td style="width:20%"><strong> - </strong></td>
                                                       <td style="width:35%"><?php echo $rows['skype_id']?></td>
                                                   </tr>
                                                   <tr>
                                                       <td><strong>WhatsApp </strong></td>
                                                       <td><strong> - </strong></td>
                                                       <td><?php echo $rows['whatsapp_id']?></td>
                                                   </tr>
                                                   <tr>
                                                       <td><strong>Applied Agent </strong></td>
                                                       <td><strong> - </strong></td>
                                                       <td><?php echo $rows['agent_name']?></td>
                                                   </tr>
                                                   
                                                   <tr>
                                                       <td><strong>Document List</strong></td>
                                                       <td><strong> - </strong></td>
                                                       <td><a target="_blank" href="<?php echo $rows['doc_list']?>">View Document</a></td>
                                                   </tr>
                                                   </tbody>
    
                                           </table>
                                       </div>
                                       <div class="col-lg-8 py-2 mb-5 secend_div ">
                                       <table class="table table-striped table-hover border">
                                                <thead>
                                                    <tr class="table-primary">
                                                        <th>University Name</th>
                                                        <th>Subject</th>
                                                        <th>Course Lavel</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                        <td><?php echo $rows['university_name1']?></td>
                                                        <td><?php echo $rows['subject_name1']?></td>
                                                        <td><?php echo $rows['course_lavel1']?></td>
                                                        <td><?php echo $rows['status1']?></td>
                                                      
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $rows['university_name2']?></td>
                                                        <td><?php echo $rows['subject_name2']?></td>
                                                        <td><?php echo $rows['course_lavel2']?></td>
                                                        <td><?php echo $rows['status2']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $rows['university_name3']?></td>
                                                        <td><?php echo $rows['subject_name3']?></td>
                                                        <td><?php echo $rows['course_lavel3']?></td>
                                                        <td><?php echo $rows['status3']?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?php echo $rows['university_name4']?></td>
                                                        <td><?php echo $rows['subject_name4']?></td>
                                                        <td><?php echo $rows['course_lavel4']?></td>
                                                        <td><?php echo $rows['status4']?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="countinue eidt_buton d-flex py-3 mb-5 justify-content-end Student">
                                                <a href="second_stage_edit.php?id=<?php echo $rows['lead_id']?>" class="btn btn-primary ">Edit</a>
                                            </div>
                                       </div>   
                              <?php } }else{ ?>
                                
                                <div class="col-lg-12 py-3 bg-color d-flex justify-content-center screan_hide"> 
                                    <h5>Second Stage Lead Information</h5>
                                </div>
                                  <div class="col-lg-4 secend_div py-2  screan_hide">
                                  <table class="table table-striped table-hover border ">
                                           <tbody>
                                           <tr class="table-primary" >
                                                       <td style="width:45%"><strong>Skype ID </strong></td>
                                                       <td style="width:20%"><strong> - </strong></td>
                                                       <td style="width:35%"><?php echo $rows['skype_id']?></td>
                                                   </tr>
                                                   <tr>
                                                       <td><strong>WhatsApp </strong></td>
                                                       <td><strong> - </strong></td>
                                                       <td><?php echo $rows['whatsapp_id']?></td>
                                                   </tr>
                                                   <tr>
                                                       <td><strong>Applied Agent </strong></td>
                                                       <td><strong> - </strong></td>
                                                       <td><?php echo $rows['agent_name']?></td>
                                                   </tr>
                                                     <tr>
                                                       <td><strong>Document List</strong></td>
                                                       <td><strong> - </strong></td>
                                                       <td><a target="_blank" href="<?php echo $rows['doc_list']?>">View Document</a></td>
                                                   </tr>
                                               </tbody>

                                       </table>
                                   </div>
                                   <div class="col-lg-8 secend_div py-2 mb-5 screan_hide">
                                   <table class="table table-striped table-hover border">
                                            <thead>
                                                <tr class="table-primary">
                                                    <th>University Name</th>
                                                    <th>Subject</th>
                                                    <th>Course Lavel</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                               <td>Incomplete</td>
                                               <td>Incomplete</td>
                                               <td>Incomplete</td>
                                               <td>Incomplete</td>
                                                  
                                          </tr>
                                                <tr>
                                                    <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                </tr>
                                                <tr>
                                                <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                </tr>
                                                <tr>
                                                    <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                    <td>Incomplete</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                   </div>   
                                   <?php  }?>
                           
                           

                         <?php 
                            $getLead_id = $_GET['lead_id'];
                            $select_qu = "SELECT * FROM tbl_third_lead WHERE lead_id ='$getLead_id' limit 1";
                            $run = mysqli_query($con,$select_qu);
                            if(mysqli_num_rows($run)>0){  while($rows = mysqli_fetch_array($run)){ ?>

                               <div class="col-lg-12 py-3 pt-4 bg-color  d-flex justify-content-center"> 
                                  <h5>Final Stage Lead Information</h5>
                                </div>
                                  <div class="col-lg-6 secend_div py-2">
                                  <table class="table  table-striped table-hover border ">
                                           
                                           <tbody>
                                               <tr class="table-primary">
                                                   <td style="width:45%"><strong>Offer letter Status </strong></td>
                                                   <td style="width:10%"><strong> - </strong></td>
                                                   <td style="width:45%"><?php echo $rows['Offer_status']?></td>
                                               </tr>
                                               <tr>
                                                   <td ><strong>Admission & Tuition Fees Payment </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['tuition_payment']?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>Pre CAS Interview </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['pre_cas_inter']?></td>
                                               </tr>
                                               <tr>
                                                   <td ><strong>Medical Report </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['medical_report'];?></td>
                                               </tr>
                                            </tbody>
                                       </table>
                                   </div>
                                   <div class="col-lg-6  secend_div py-2">
                                   <table class="table table-striped table-hover border ">
                                           
                                           <tbody>
                                          
                                           <tr class="table-primary">
                                                   <td style="width:45%"><strong>Bank Statement </strong></td>
                                                   <td style="width:10%"><strong> - </strong></td>
                                                   <td style="width:45%"><?php echo $rows['bank_stmnt']?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>VISA Processing Status</strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['visa_status']?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>CAS Letter Status </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['cash_status']?></td>
                                               </tr>
                                         </tbody>
                                   </table>
                                    <div class="countinue eidt_buton d-flex py-5 justify-content-end">
                                    <a href="third_stage_edit.php?id=<?php echo $rows['lead_id'];?>" class="btn btn-primary ">Edit</a>
                                    </div>
                                  </div>  
                         <?php } }else{?>
                            
                            <div class="col-lg-12 py-1 bg-color screan_hide d-flex justify-content-center"> 
                                  <h5>Final Stage Lead Information</h5>
                                </div>
                                  <div class="col-lg-6 py-3 secend_div screan_hide">
                                  <table class="table table-striped table-hover border ">
                                           
                                           <tbody>
                                               <tr class="table-primary">
                                                   <td style="width:45%"><strong>Offer letter Status </strong></td>
                                                   <td style="width:10%"><strong> - </strong></td>
                                                   <td style="width:45%"><?php echo $rows['Offer_status']?></td>
                                               </tr>
                                               <tr>
                                                   <td ><strong>Admission & Tuition Fees Payment </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['tuition_payment']?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>Pre CAS Interview </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['pre_cas_inter']?></td>
                                               </tr>
                                               <tr>
                                                   <td ><strong>Medical Report </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['medical_report']?></td>
                                               </tr>
                                             
                                            
                                            </tbody>

                                       </table>
                                   </div>
                                   <div class="col-lg-6 py-2 secend_div screan_hide">
                                   <table class="table table-striped table-hover border ">
                                           
                                           <tbody>
                                          
                                           <tr class="table-primary">
                                                   <td style="width:45%"><strong>Bank Statement </strong></td>
                                                   <td style="width:10%"><strong> - </strong></td>
                                                   <td style="width:45%"><?php echo $rows['bank_stmnt']?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>VISA Processing Status </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['visa_status']?></td>
                                               </tr>
                                               <tr>
                                                   <td><strong>CASH Letter Status </strong></td>
                                                   <td><strong> - </strong></td>
                                                   <td><?php echo $rows['cash_status']?></td>
                                               </tr>
                                         </tbody>
                                   </table>
                                  </div>  
                            
                            <?php } ?> 

                         <div class="col-lg-12 py-1 d-flex justify-content-end">
                                <div class="print_btn eidt_buton">
                                <button  id="print" class="btn btn-success">Print</button>
                            </div>
                         </div>
                      </div>
                </div>
            <div class="col-lg-1"></div>
        </div>
    </div>
</main>
<script src="js/jquery.min.js"></script>
      <script src="js/printThis.js"></script>
      <script>
      $('#print').click(function(){
        $('.container_print').printThis({
                  debug: false,               // show the iframe for debugging
                  importCSS: true,            // import parent page css
                  importStyle: false,         // import style tags
                  printContainer: true,       // print outer container/$.selector
                  loadCSS: "https://edu.webxpo.org/css/styles.css",                // path to additional css file - use an array [] for multiple
                  pageTitle: "",              // add title to print page
                  removeInline: false,        // remove inline styles from print elements
                  removeInlineSelector: "*",  // custom selectors to filter inline styles. removeInline must be true
                  printDelay: 333,            // variable print delay
                  header:"",               // prefix to html
                  footer: null,               // postfix to html
                  base: false,                // preserve the BASE tag or accept a string for the URL
                  formValues: true,           // preserve input/form values
                  canvas: false,              // copy canvas content
                  doctypeString: '<!DOCTYPE html>', // enter a different doctype for older markup
                  removeScripts: false,       // remove script tags from print content
                  copyTagClasses: false,      // copy classes from the html & body tag
                  beforePrintEvent: null,     // callback function for printEvent in iframe
                  beforePrint: null,          // function called before iframe is filled
                  afterPrint: null            // function called before iframe is removed
        });
      })
      </script>
<?php require_once('footer.php')?>


