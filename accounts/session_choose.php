<?php
  
  $select_session = "SELECT * FROM `session_available` ORDER BY `id` DESC LIMIT 1 ";
  $query_session = mysqli_query($con, $select_session);

  $row_session = mysqli_fetch_assoc($query_session);
  $current_session = $row_session['session_name'];

  if(isset($_POST['select_session'])){
    $current_session = $_POST['session'];
  }


?>