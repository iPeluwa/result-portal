 <?php



                      $result ="SELECT * FROM `term1` WHERE student_id=$userid AND session_id = $current_session_id";
                      $query_result = mysqli_query($con,$result);

                      while ($query = mysqli_fetch_assoc($query_result)){

                      $subject_id= $query['subject_id'];
                      $result1 ="SELECT * FROM `subjects` WHERE id=$subject_id";
                      $query_result1 = mysqli_query($con,$result1);

                      while ($query1 = mysqli_fetch_assoc($query_result1)){
                        
                      $result_sum = $query['note1'] + $query['project1'] + $query['test1'];
                      $ave_mid = ($result_sum / 20) * 100;

        switch ($ave_mid) {
          case '>=85':
            $grade = "A1";
            $remark = "EXCELLENT";
            break;
          
          default:
          $grade = "";
          $remark 
            break;
        }

                      ?>