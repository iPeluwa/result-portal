<?php
 include_once 'header.php';
include '../connection.php';

?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <!-- <li class="breadcrumb-item active">Blank Page</li> -->
      </ol>
        <button type="button"data-toggle="modal" data-target="#create" class="btn btn-primary">Select Session</button>
                
<div class="row">
        <div class="col-12">
        
     <h3>Third Term Result</h3>
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Subject </th>
                              <th>Test 1 (20 marks)</th>
                              <th>Test 2 (20 marks)</th>
                              <th>Exam (60 marks)</th>
                              <th>Total (100 marks)</th>
                              <th>Total (300 marks)</th>
                              <th>Percentage %</th>
                              <th>Grade</th>
                              <th>Remarks</th>

                          </tr>
                      </thead>
                      <?php 
                    include('session_pick.php');

                      $term_1 ="SELECT * FROM 
                      `term1`
                       WHERE
                        `student_id` = '$userid'
                       AND 
                       `session_id` = '$current_session_id'";

                      $term_2 ="SELECT * FROM
                      `term2`, `subjects` 
                      WHERE
                      `term2`.`student_id` = '$userid'
                       AND 
                       `term2`.`session_id` = '$current_session_id'";
                      
                      $term_3 ="SELECT * FROM
                      `term3`, `subjects` 
                      WHERE
                      `term3`.`student_id` = '$userid'
                       AND 
                       `term3`.`session_id` = '$current_session_id'
                       AND `subjects`.`id`=`term3`.`subject_id`";

                      

                      $term_3_result = mysqli_query($con,$term_3);

                      while ($term3 = mysqli_fetch_assoc($term_3_result)){ 

                      $term_2_result = mysqli_query($con,$term_2);
                      $term2 = mysqli_fetch_assoc($term_2_result);
                    
                      $term_1_result = mysqli_query($con,$term_1);
                      $term1 = mysqli_fetch_assoc($term_1_result);

                      $term1_test1 = $term1['note1'] + $term1['project1'] + $term1['test1']; 
                      $term1_test2 = $term1['note2'] + $term1['project2'] + $term1['test2']; 
                      $term1_exam =  $term1['exam'];

                      $term2_test1 = $term2['note1'] + $term2['project1'] + $term2['test1']; 
                      $term2_test2 = $term2['note2'] + $term2['project2'] + $term2['test2'];      
                      $term2_exam =  $term2['exam'];
                          
                      $term3_test1 = $term3['note1'] + $term3['project1'] + $term3['test1']; 
                      $term3_test2 = $term3['note2'] + $term3['project2'] + $term3['test2'];      
                      $term3_exam =  $term3['exam'];      

                      $term1_cal = $term1_test1 + $term1_test2 + $term1_exam;
                      $term2_cal = $term2_test1 + $term2_test2 + $term2_exam;
                      $term3_cal = $term3_test1 + $term3_test2 + $term3_exam;
                      $total = $term1_cal + $term2_cal + $term3_cal;

                      $ave_mid = ($total / 300) * 100 ; 

                       include('grading.php');
                       ?>
                      <tbody id="result_student">
                        <tr>
                                             <td><?php echo $term3['subject']; ?></td>
                                             <td><?php echo $term3_test1; ?></td>
                                             <td><?php echo $term3_test2;?></td>
                                             <td><?php echo $term3_exam;?></td>
                                             <td><?php echo $term3_cal;?> </td>
                                             <td><?php echo $total;?> </td>
                                              <td><?php echo $ave_mid;?>%</td>
                                              <td><?php echo $grade;?></td>
                                              <td><?php echo $remark;?></td>
                                             <tr><td colspan="10"></td></tr><?php
                        }
                      
                      
                        ?>
                        </tr>
                        <tr><td colspan="10"></td></tr>
            <tr style="height: 50px;line-height: 50px;text-align: center;margin-top: 5px;">
            <th>cumulative</th>

            <?php   $cum_term3_test1 = 0; $cum_term3_test2 = 0; $cum_term3_exam = 0;  
                    $term1_test1 = 0; $term1_test2 =  0; $term1_exam = 0; $total = 0;
                    $term2_test1 = 0; $term2_test2 =  0; $term2_exam = 0; $total = 0;
                      $result1 ="SELECT * FROM term3 WHERE student_id=$userid AND session_id = $current_session_id";
                      $query_result1 = mysqli_query($con,$result1);
                      while ($query1 = mysqli_fetch_assoc($query_result1))
                      {
                      $cum_term3_test1 += $query1['note1'] + $query1['project1'] + $query1['test1'] ;
                      $cum_term3_test2 += $query1['note2'] + $query1['project2'] + $query1['test2'];
                      $cum_term3_exam += $query1['exam'] ;

                      $term_1 ="SELECT * FROM 
                      `term1`
                       WHERE
                        `student_id` = '$userid'
                       AND 
                       `session_id` = '$current_session_id'";

                      $term_1_result = mysqli_query($con,$term_1);
                      $term1 = mysqli_fetch_assoc($term_1_result);

                      $term1_test1 += $term1['note1'] + $term1['project1'] + $term1['test1']; 
                      $term1_test2 += $term1['note2'] + $term1['project2'] + $term1['test2']; 
                      $term1_exam +=  $term1['exam'];
                          
                       $term_2 ="SELECT * FROM 
                      `term2`
                       WHERE
                        `student_id` = '$userid'
                       AND 
                       `session_id` = '$current_session_id'";

                      $term_2_result = mysqli_query($con,$term_1);
                      $term2 = mysqli_fetch_assoc($term_2_result);

                      $term2_test1 += $term2['note1'] + $term2['project1'] + $term2['test1']; 
                      $term2_test2 += $term2['note2'] + $term2['project2'] + $term2['test2']; 
                      $term2_exam +=  $term2['exam'];      
                      

                      }
                      echo "<th>". $cum_term3_test1 ."</th>";
                      echo "<th>". $cum_term3_test2 ."</th>";
                      echo "<th>". $cum_term3_exam ."</th>";
                       $total_term3 = $cum_term3_test1 + $cum_term3_test2 + $cum_term3_exam;
                      echo "<th>". $total_term3 ."</th>";
                      $total_term1 = $term1_test1 + $term1_test2 + $term1_exam;
                
                      $total_term2 = $term2_test1 + $term2_test2 + $term2_exam;
                      
                      $total_term1 = $term1_test1 + $term1_test2 + $term1_exam;

                      $total = $total_term1 + $total_term2 + $total_term2;
                      echo "<th colspan = '2'>". $total ."</th>";
                       $count = mysqli_num_rows($query_result1);
                       $ave_mid = ( ($total/$count) /300) *100;
                       echo "<th colspan = '2'>".$ave_mid."%"."</th>";

                      ?>
        
             </tr>
            </tbody>
          </table>
              <div class="col-md-4 ">       
         <button class='btn btn-success '  onclick="window.print()" >Print</button>
                        
                      </div>
        </div>
      </div>
</div>
</div>


      <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
           <!-- select session section -->
               <div class="col-10 offset-1" id="Select Session">
                  <form action="" method="post">
          
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Select Session</label>
                <select class="form-control" type="text" name="session_id">
                  <?php
                          $get = "SELECT * FROM session_available";
                          $query_get = mysqli_query($con,$get);
                          while ($array = mysqli_fetch_assoc($query_get)) {
                          echo "<option value='{$array['id']}'>{$array['session_name']}</option>";
                            }
                            ?>
                  </select>
                      </div>
         
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="choose_session">Choose</button>
        </div>
        </form>
            </div>
          </div>
          </div>
</div>


    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>