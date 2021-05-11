<?php
require_once('header.php');
if(isset($_POST['open_report'])){
	$report_id = $_POST['report_id'];
	$select = "SELECT * FROM `report` WHERE `id` = '$report_id' ORDER BY `id` DESC";
     $query_select  = mysqli_query($con, $select);
		$row = mysqli_fetch_assoc($query_select);

		$sender_id = $row['sender_id'];
		$sender_category = $row['sender_category'];

		$title = $row['Title'];
		$main_text = $row['main_text'];
 $main_text = wordwrap($main_text, '100','</br>','FALSE');
 
		    $select_sender = "SELECT `name` FROM `$sender_category` WHERE `id`='$sender_id'";
	        $query_send = mysqli_query($con, $select_sender);
            $row_send = mysqli_fetch_assoc($query_send);

            $sender_name = $row_send['name'];
					}

?>
<?php include_once 'header.php'; ?>
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
        <div class="col-8 offset-2">
          <h1>HOD's Report</h1>

     	<a><b>Sent By :  <?php echo $sender_name; ?> </b></a></br></br>
     	<a><b>Title : <?php echo $title; ?> </b></a></br></br>

     	<a><b>Content : </b></a></br></br>
     	<p><?php echo $main_text; ?>


            	</div>
            </div>
  	      </div>
        </div>

       
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>