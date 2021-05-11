<?php
 include_once 'header.php';
include '../connection.php';
include 'student_insert.php';


?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php?id=<?php echo $child_id;?>">Dashboard</a>
        </li>
        <!-- <li class="breadcrumb-item active">Blank Page</li> -->
      </ol>
        <button type="button"data-toggle="modal" data-target="#create" class="btn btn-primary">Select Session</button>
          <button type="button"data-toggle="modal" data-target="#child" class="btn btn-primary offset-8">Select Child</button>

<div class="row">
        <div class="col-12">
                         
     <h3>Second Term Result</h3>
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Subject </th>
                              <th>Test 1 (20 marks)</th>
                              <th>Test 2 (20 marks)</th>
                              <th>Exam (60 marks)</th>
                              <th>Total (100 marks)</th>
                              <th>Total (200 marks)</th>
                              <th>Percentage %</th>
                              <th>Grade</th>
                              <th>Remarks</th>

                          </tr>
                      </thead>
                      <?php 
                        //by default the it displays the current session
                         include('session_pick.php');

                      $term_1 ="SELECT * FROM 
                      `term1`
                       WHERE
                        `student_id` = '$student_id'
                       AND 
                       `session_id` = '$current_session_id'";

                      $term_2 ="SELECT * FROM
                      `term2`, `subjects` 
                      WHERE
                      `term2`.`student_id` = '$student_id'
                       AND 
                       `term2`.`session_id` = '$current_session_id'
                       AND `subjects`.`id`=`term2`.`subject_id`";

                      

                      $term_2_result = mysqli_query($con,$term_2);

                      while ($term2 = mysqli_fetch_assoc($term_2_result)){ 

                      $term_1_result = mysqli_query($con,$term_1);
                      $term1 = mysqli_fetch_assoc($term_1_result);

                      $term1_test1 = $term1['note1'] + $term1['project1'] + $term1['test1']; 
                      $term1_test2 = $term1['note2'] + $term1['project2'] + $term1['test2']; 
                      $term1_exam =  $term1['exam'];

                      $term2_test1 = $term2['note1'] + $term2['project1'] + $term2['test1']; 
                      $term2_test2 = $term2['note2'] + $term2['project2'] + $term2['test2'];      
                      $term2_exam =  $term2['exam'];

                      $term1_cal = $term1_test1 + $term1_test2 + $term1_exam;
                      $term2_cal = $term2_test1 + $term2_test2 + $term2_exam;
                      $total = $term1_cal + $term2_cal;

                      $ave_mid = ($total / 200) * 100 ; 

                       include('grading.php');
                       ?>
                      <tbody id="result_student">
                        <tr>
                                             <td><?php echo $term2['subject']; ?></td>
                                             <td><?php echo $term2_test1; ?></td>
                                             <td><?php echo $term2_test2;?></td>
                                             <td><?php echo $term2_exam;?></td>
                                             <td><?php echo $term2_cal;?> </td>
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

            <?php   $cum_term2_test1 = 0; $cum_term2_test2 = 0; $cum_term2_exam = 0;  
                    $term1_test1 = 0; $term1_test2 =  0; $term1_exam = 0; $total = 0;
                      $result1 ="SELECT * FROM term2 WHERE student_id=$student_id AND session_id = $current_session_id";
                      $query_result1 = mysqli_query($con,$result1);
                      while ($query1 = mysqli_fetch_assoc($query_result1))
                      {
                      $cum_term2_test1 += $query1['note1'] + $query1['project1'] + $query1['test1'] ;
                      $cum_term2_test2 += $query1['note2'] + $query1['project2'] + $query1['test2'];
                      $cum_term2_exam += $query1['exam'] ;

                      $term_1 ="SELECT * FROM 
                      `term1`
                       WHERE
                        `student_id` = '$student_id'
                       AND 
                       `session_id` = '$current_session_id'";

                      $term_1_result = mysqli_query($con,$term_1);
                      $term1 = mysqli_fetch_assoc($term_1_result);

                      $term1_test1 += $term1['note1'] + $term1['project1'] + $term1['test1']; 
                      $term1_test2 += $term1['note2'] + $term1['project2'] + $term1['test2']; 
                      $term1_exam +=  $term1['exam'];
                      

                      }
                      echo "<th>". $cum_term2_test1 ."</th>";
                      echo "<th>". $cum_term2_test2 ."</th>";
                      echo "<th>". $cum_term2_exam ."</th>";
                       $total_term2 = $cum_term2_test1 + $cum_term2_test2 + $cum_term2_exam;
                      echo "<th>". $total_term2 ."</th>";
                      $total_term1 = $term1_test1 + $term1_test2 + $term1_exam;

                      $total = $total_term1 + $total_term2;
                      echo "<th colspan = '2'>". $total ."</th>";
                       $count = mysqli_num_rows($query_result1);
                       $ave_mid = ( ($total/$count) /200) *100;
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


     <div class="modal fade" id="child" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label for="exampleConfirmPassword">Select Child</label>
                <select class="form-control" type="text" name="child_id">
                  <?php
                          $get = "SELECT * FROM `student` WHERE `parent_id` = '$userid'";
                          $query_get = mysqli_query($con,$get);

                          while ($array = mysqli_fetch_assoc($query_get)) {
                          echo "<option value='{$array['id']}'>{$array['fname']}". " " . "{$array['lname']}" ."</option>";
                            }
                            ?>
                  </select>
                      </div>
         
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="choose_child">Choose</button>
        </div>
        </form>
            </div>
          </div>
          </div>
</div>
<?php
if(isset($_POST['choose_child'])){
    $child_id = $_POST['child_id']; 

      echo '<script> window.location.href="student_result_term2.php?id='.$child_id.'";</script>';

}
?>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>