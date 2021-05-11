<?php
require_once('header.php');
?>
<div class="content-wrapper">    <!-- /.container-fluid-->
  <div class="container-fluid">    <!-- /.content-wrapper-->

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home.php">Dashboard</a>
      </li>
    </ol>
    <?php
    if(isset($_POST['authorize_open'])){
      $form_id = $_POST['form_id'];
      ?>

      <div class="col-lg-12 col-md-12s">
        <h2> Advance Request Forms </h2>
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <th> SN </th>
            <th> Created For</th>
            <th>Amount</th>
            <th>Purpose</th>
            <th>To be paid back </th>
            <th>Date Created </th>
            <th>Authorize </th>
          </thead>
          <tbody>
            <?php
            $I = 0;
            $receive_req = "SELECT * FROM `advance_request` WHERE `id` = '$form_id'";
            $query_receive_req = mysqli_query($con, $receive_req);
            ($row_req = mysqli_fetch_assoc($query_receive_req));
            $I += 1;
            $staff_id = $row_req['staff_id'];
            $staff_cat = $row_req['staff_category'];

            $select_staff = "SELECT * FROM `$staff_cat` WHERE `id` = '$staff_id' ORDER BY `id` DESC";
            $query_select = mysqli_query($con, $select_staff);
            $row_select = mysqli_fetch_assoc($query_select);

            $form_id = $row_req['id'];
            $staff_name = $row_select['name'];
            $amount = $row_req['amt_in_num'];
            $date = $row_req['date']; 
            $date_returned = $row_req['date_returned'];
            $purpose = $row_req['purpose'];
            
            ?>

            <tr>
              <td> <?php echo $I; ?> </td>
              <td><?php echo $staff_name; ?> </td> 
              <td><?php echo $amount; ?> </td> 
              <td><?php echo $purpose; ?> </td> 
              <td><?php echo $date_returned; ?> </td>
              <td><?php echo $date; ?> </td>
              <td><form method='post' action=''>
                <input type='hidden' value = '<?php echo $form_id; ?>' name='auth_form_id' />
                <button class='btn btn-success' name='authorize' type='submit'>Authorize </button>
              </form>
            </td>
            
          </tr>
          
        </tbody>
      </table>

    </div>

    <?php 

  }

  if(isset($_POST['authorize'])){
   $auth_form_id = $_POST['auth_form_id'];

   $update_auth = "UPDATE `advance_request` SET `authorized_state` = '1' WHERE `id` = '$auth_form_id'";
   $query_auth= mysqli_query($con, $update_auth);

   if($query_auth){
    echo "<script type='text/javascript'>alert('Request Authorized')</script>";
    echo "<script type='text/javascript'>window.location.href='advance_request.php'</script>";
  }else{

    echo "<script type='text/javascript'>alert('Couldnt Authorized')</script>";
    echo "<script type='text/javascript'>window.location.href='advance_request.php'</script>";
  }

}
?>


<?php
if(isset($_POST['approve_open'])){
  $form_id = $_POST['form_id'];
  ?>

  <div class="col-lg-12 col-md-12s">
    <h2> Advance Request Forms </h2>
    <table class="table table-striped table-bordered table-hover">
      <thead>
        <th> SN </th>
        <th> Created For</th>
        <th>Amount</th>
        <th>Purpose</th>
        <th>To be paid back </th>
        <th>Date Created </th>
        <th>Approve </th>
      </thead>
      <tbody>
        <?php
        $I = 0;
        $receive_req = "SELECT * FROM `advance_request` WHERE `id` = '$form_id'";
        $query_receive_req = mysqli_query($con, $receive_req);
        ($row_req = mysqli_fetch_assoc($query_receive_req));
        $I += 1;
        $staff_id = $row_req['staff_id'];
        $staff_cat = $row_req['staff_category'];

        $select_staff = "SELECT * FROM `$staff_cat` WHERE `id` = '$staff_id' ORDER BY `id` DESC";
        $query_select = mysqli_query($con, $select_staff);
        $row_select = mysqli_fetch_assoc($query_select);

        $form_id = $row_req['id'];
        $staff_name = $row_select['name'];
        $amount = $row_req['amt_in_num'];
        $date = $row_req['date']; 
        $date_returned = $row_req['date_returned'];
        $purpose = $row_req['purpose'];
        
        ?>

        <tr>
          <td> <?php echo $I; ?> </td>
          <td><?php echo $staff_name; ?> </td> 
          <td><?php echo $amount; ?> </td> 
          <td><?php echo $purpose; ?> </td> 
          <td><?php echo $date_returned; ?> </td>
          <td><?php echo $date; ?> </td>
          <td><form method='post' action=''>
            <input type='hidden' value = '<?php echo $form_id; ?>' name='auth_approve_id' />
            <button class='btn btn-success' name='approve' type='submit'>Approve </button>
          </form>
        </td>
        
      </tr>
      
    </tbody>
  </table>

</div>

<?php 

}

if(isset($_POST['approve'])){
 $app_form_id = $_POST['auth_approve_id'];

 $update_app = "UPDATE `advance_request` SET `approved_state` = '1' WHERE `id` = '$app_form_id'";
 $query_app= mysqli_query($con, $update_app);

 if($query_app){
  echo "<script type='text/javascript'>alert('Request Approved')</script>";
  echo "<script type='text/javascript'>window.location.href='advance_request.php'</script>";
}

}
?>

</div>
</div>