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
       
        
     <h3>First Term Result</h3>
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Subject </th>
                              <th>Test 1 (20 marks)</th>
                              <th>Note</th>
                              <th>Project</th>
                              <th>Test</th>
                              <th>Exam (60 marks)</th>
                              <th>Total (100 marks)</th>
                              <th>Percentage %</th>
                              <th>Grade</th>
                              <th>Remarks</th>

                          </tr>
                      </thead>

                      <?php 
                       //by default the it displays the current session
                           include('session_pick.php');
                      $result ="SELECT * 
                      FROM `term1`,`subjects`
                      WHERE
                      `term1`.`student_id` = '$student_id'
                       AND 
                       `term1`.`session_id` = '$current_session_id'
                       AND
                       `subjects`.`id` = `term1`.`subject_id`";
                      $query_result = mysqli_query($con,$result);

                      while ($query = mysqli_fetch_assoc($query_result)){

                      $first_half_term = $query['note1'] + $query['project1'] + $query['test1']; 
                      $second_half_term = $query['note2'] + $query['project2'] + $query['test2'] + $query['exam'] ;

                      $total = $first_half_term + $second_half_term;
                      $ave_mid = ($total / 100 ) * 100;// percentage of result 

                          include('grading.php');
                       ?>
                      <tbody id="result_student">
                        <tr>
                            <td><?php echo $query['subject']; ?></td>
                                             <td><?php echo $first_half_term; ?></td>
                                             <td><?php echo $query['note2'];?></td>
                                             <td><?php echo $query['project2'];?></td>
                                             <td><?php echo $query['test2'];?></td>
                                             <td><?php echo $query['exam'];?></td>
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

                     <?php $a = 0; $b = 0; $c = 0; $d = 0;$e = 0;$total = 0;
                      $result1 ="SELECT * FROM term1 WHERE student_id=$student_id AND session_id = $current_session_id";
                      $query_result1 = mysqli_query($con,$result1);
                      while ($query1 = mysqli_fetch_assoc($query_result1))
                      {
                      $a += $query1['note1'] + $query1['project1'] + $query1['test1'];
                      $b += $query1['note2'];
                      $c += $query1['project2'];
                      $d += $query1['test2'];
                      $e += $query1['exam'];
                      $total = $a + $b + $c + $d + $e;

                     }
                      echo "<th>".$a. "</th>";
                      echo "<th>".$b. "</th>";
                      echo "<th>".$c. "</th>";
                      echo "<th>".$d. "</th>";
                      echo "<th>".$e. "</th>";
                      echo "<th colspan = '2'>".$total. "</th>";

                      $count = mysqli_num_rows($query_result1);
                      $ave_mid = $total/$count;
                      echo "<th colspan = '2'>".$ave_mid."%" ."</th>";
                     
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
       <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>


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
                <select class="form-control" type="text" name="child_id">
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

      echo '<script> window.location.href="student_result_term1.php?id='.$child_id.'";</script>';

}
?>
   