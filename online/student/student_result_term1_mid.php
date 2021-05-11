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
          <h3>First Mid-term Result</h3>
                  <table class="table table-striped table-bordered table-hover">
                      <thead>
                          <tr>
                              <th>Subject</th>
                              <th>Note(5 marks)</th>
                              <th>Project(5 marks) </th>
                              <th>Test(10 marks)</th>
                              <th>Total (20 marks)</th>
                              <th>Percentage %</th>
                              <th>Grade</th>
                              <th>Remarks</th>
                          </tr>
                      </thead>

                    <?php 
                        //by default the it displays the current session
                           include('session_pick.php');

                            $result ="SELECT * FROM 
                            `term1`,`subjects` 
                               WHERE 
                            `term1`.`student_id`='$userid'  
                            AND 
                            `term1`.`session_id` = '$current_session_id'
                            AND
                            `subjects`.`id` = `term1`.`subject_id`";


                      $result_query = mysqli_query($con,$result);
                                       
                        while($row = mysqli_fetch_assoc($result_query)){
                      $result_sum = $row['note1'] + $row['project1'] + $row['test1'];
                      $ave_mid = ($result_sum / 20) * 100;

                          include('grading.php');
                    ?>                      


                      <tbody id="result_student">
                        <tr>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['note1']; ?></td>
                           <td><?php echo $row['project1']; ?></td>
                           <td><?php echo $row['test1']; ?></td>
                            <td><?php echo $result_sum;?></td>
                            <td><?php echo $ave_mid;?>%</td>
                            <td><?php echo $grade;?></td>
                            <td><?php echo $remark;?></td>
                           <tr><td colspan="8"></td></tr>
                    <?php
                 }
                           ?>
                        </tr>
                        <tr><td colspan="8"></td></tr>
            <tr style="height: 50px;line-height: 50px;text-align: center;margin-top: 5px;">
            <th>cumulative</th>

            <?php   
              $a = 0; $b = 0; $c = 0; $e = 0;
                $result1 ="SELECT * FROM term1 WHERE student_id=$userid AND session_id = $current_session_id";
                 $query_result1 = mysqli_query($con,$result1);

                     while ($query1 = mysqli_fetch_assoc($query_result1))
                     {
                      $a += $query1['note1']; 
                      $b += $query1['project1'];
                       $c += $query1['test1'];


                    }
                      echo "<th>". $a."</th>";
                      echo "<th>". $b."</th>";
                      echo "<th>". $c."</th>";
                      $d = $a + $b + $c;
                      echo "<th colspan='2'>". $d."</th>";

                      $count = mysqli_num_rows($query_result1);
                      echo "<th colspan='2'>". $d/$count ."</th>";
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

