<?php

$pick = "SELECT * FROM `session_available` ORDER BY `session_name` DESC LIMIT 1";
                       $query_pick = mysqli_query($con,$pick);
                       $sess = mysqli_fetch_assoc($query_pick);

                      $current_session_id  = $sess['id']; 
                       

                      if(isset($_POST['choose_session'])){

                     $current_session_id = $_POST['session_id'];
                      }
?>