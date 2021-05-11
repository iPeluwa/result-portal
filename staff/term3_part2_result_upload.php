<?php
 include_once 'header.php';
 $class = $_GET['class'];
$subject = $_GET['subject'];
include '../connection.php';
$class = $_GET['class'];
$subject = $_GET['subject'];
if (isset($_POST["import"])) {
    
    $fileName = $_FILES["file"]["tmp_name"];
    
    if ($_FILES["file"]["size"] > 0) {
        
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
          // to get the name of the student using the adm no (since it is unique)
                $retrieve = "SELECT * FROM `student` WHERE `adm_no`='$column[0]'";
                $query_retrieve = mysqli_query($con,$retrieve);
               while($take = mysqli_fetch_assoc($query_retrieve)){
                $fname = $take['fname'];
                $lname = $take['lname'];
                $student_id = $take['id'];
       
        
    // }
    // else{
             $pick = "SELECT * FROM `session_available` ORDER BY `session_name` DESC LIMIT 1";
             $query_pick = mysqli_query($con,$pick);
             $sess = mysqli_fetch_assoc($query_pick);
             $current_session_id = $sess['id'];
            $sqlInsert = "UPDATE term3 SET note2 = '" . $column[3] . "', project2 = '" . $column[4] . "', test2 = '" . $column[5] . "', exam = '" . $column[6] . "' WHERE `student_id`='$student_id' AND subject_id='$subject' AND session_id='$current_session_id'";
            $result = mysqli_query($con, $sqlInsert);
            
            if (! empty($result)) {
                $type = "success";
                $message = "Result Uploaded Successfully";
            } else {
                $type = "error";
                $message = "Problem Uploading Result";
            }
        }
}
}
}?>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <!-- <li class="breadcrumb-item active">Blank Page</li> -->
      </ol>
      <div class="row">
        <div class="col-12">
<div id="response" class="btn btn-<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
          <h1>First Term Result</h1>
          <div class="header">
                  <div class="panel-body">
                     <form class="form-horizontal" action="" method="post"
                name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
                <div class="input-row">
                    <label class="col-md-4 control-label">Choose CSV
                        File</label> <input class="form-control col-md-4" type="file" name="file"
                        id="file" accept=".csv">
                    <button type="submit" id="submit" name="import"
                        class="btn btn-primary">Upload</button>
                    <br />

                </div>

            </form>
               </div>
            </div>

           <table class="table table-user-information">
                                  <table class="table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr>
                                              <th>Students  </th>
                                              <th>Test (20 marks)</th>
                                              <th>Note (5 marks)</th>
                                              <th>Project (5 marks) </th>
                                              <th>Test2 (10 marks)</th>
                                              <th>Exam (60 marks)</th>
                                              <th>Total</th>
                                              <th>Percentage %</th>
                                              <th>GRADE</th>
                                              <th>Remarks</th>
                                          </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                            $result ="SELECT * FROM `term3` WHERE teacher_id=$userid AND subject_id=$subject";
                                            $query_result = mysqli_query($con,$result);
                                            while ($query = mysqli_fetch_assoc($query_result)){
                                              $sum_total = $query['note1'] + $query['project1'] + $query['test1'];
                                              $sum_total1 = $query['note2'] + $query['project2'] + $query['test2'] + $query['exam'];
                                              $total = $sum_total + $sum_total1;
                                              $avg = $total / 100 * 100 / 1;

                                            $grade = ""; if ($avg >=85) { $grade="A1"; } elseif ($avg >=70) {
                                            $grade="B2"; } elseif ($avg >=65) { $grade="B3"; } elseif ($avg >=60) {
                                            $grade="C4"; } elseif ($avg >=55) { $grade="C5"; } elseif ($avg >=50) {
                                            $grade="C6"; } elseif ($avg >=45) { $grade="D7"; } elseif ($avg >=40){
                                            $grade="E8"; } elseif ($avg >=0) { $grade="F9"; } $remark = ""; if ($avg >=85) {
                                            $remark="EXCELLENT"; } elseif ($avg >=70) { $remark="VERY GOOD"; } elseif ($avg
                                            >=65) { $remark="GOOD"; } elseif ($avg >=60) { $remark="CREDIT"; } elseif ($avg
                                            >=55) { $remark="CREDIT"; } elseif ($avg >=50) { $remark="CREDIT"; } elseif
                                            ($avg >=45) { $remark="PASS"; } elseif ($avg >=40) { $remark="PASS"; } elseif
                                            ($avg >=0) { $remark="FAIL"; }
                                                ?>
                                             <tr class="odd gradeX">
                                             <td><?php echo $query['fname']; ?> <?php echo $query['lname']; ?></td>
                                             <td><?php echo $sum_total;?></td>
                                             <td><?php echo $query['note2'];?></td>
                                             <td><?php echo $query['project2'];?></td>
                                             <td><?php echo $query['test2'];?></td>
                                             <td><?php echo $query['exam'];?></td>
                                             <td><?php echo $total;?> </td>
                                              <td><?php echo $avg;?>%</td>
                                              <td><?php echo $grade;?></td>
                                              <td><?php echo $remark;?></td>
                                             <tr><td colspan="8"></td></tr><?php
                        }
                        ?>
                                                  </tr>
                                        </tbody>
                                    </table>
                                    <div class="pull-right">
         <!--  <a href="result/term3_part1_result_print.php" target="_blank"> <span class="btn btn-success">
          Print Result
          </span></a> -->
          </div>
          <form class="form-horizontal" action="result_part2_result_template.php?class=<?php echo $class;?>&subject=<?php echo $subject;?>" method="post" name="upload_excel"
                            enctype="multipart/form-data">

          <div class="form-group">
                          <div class="col-md-4">
                              <input type="submit" name="Exportstudent" class="btn btn-success"  value="Download First Term Result Template"/>


                          </div>
                  </div>
          </form>
          </div>
                                </div>
                            </div>
                        </div>
                    </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>