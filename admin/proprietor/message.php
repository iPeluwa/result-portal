
<?php include_once ('header_proprietor.php');
?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home_proprietor.php">Dashboard</a>
      </li>
    </ol>

    <div class="row">
      <div class="col-12">

        <h1>Message</h1>

        <div class='col-8 offset-2'>
          <?php

          $select_message = "SELECT * FROM `message` WHERE `sender_id` = '$userid' OR `recepient_id` = '$userid' ORDER BY `id` DESC";
          $query_select_message = mysqli_query($con, $select_message);
          while($row = mysqli_fetch_assoc($query_select_message)){

            $sender_id = $row['sender_id']; 
            $sender_category = $row['sender_category'];
            $recepient_id = $row['recepient_id'];
            $recepient_category = $row['recepient_category'];

            $select_sender  = "SELECT * FROM `$sender_category` WHERE `id` = '$sender_id'";
            $select_sender_query = mysqli_query($con, $select_sender); 
            $row_sender = mysqli_fetch_assoc($select_sender_query);

            $select_recepient = "SELECT * FROM `$recepient_category` WHERE `id` ='$recepient_id'";
            $select_recepient_query = mysqli_query($con, $select_recepient);

            $row_recepient = mysqli_fetch_assoc($select_recepient_query);
            ?>

            <table class="table table-striped table-bordered table-hover">
              <?php if($sender_id != $userid){ ?>
              <button type="button"data-toggle="modal" data-target="#reply_message" class="btn btn-primary pull-right">Reply</button>

              <?php } ?>
              <tbody>
                <tr> <th> Sent By: </th> <td> 
                  <?php 
                  if($row_sender['name'] == $username){
                    echo "Me" ;
                  } else{
                    echo $row_sender['name']; 
                  }?>
                </td> </tr>
                <tr><th>Message: </th><td><?php echo wordwrap( $row['message'],65 ,"<br/>", true);?></td></tr>
                <tr><th>To: </th><td> <?php
                if($row_recepient['name'] == $username){
                  echo "Me" ;
                } else{
                  echo $row_recepient['name']; 
                } ?> 
              </td></tr>
              <tr><th>Date:</th><td><?php echo $row['date'];?></td></tr>
            </tbody>
          </table>



          <div class="modal fade" id="reply_message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="delete">Reply Message</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <!-- Change email section -->
                <div class="col-12" id="send_message">
                  <form action="" method="post">
                    <div class="form-group">
                      <div class="form-row">
                        <div class="col-md-10 offset-1">
                          <label for="exampleInputName">Reply</label>
                          <textarea class="form-control" required='required' name="reply"> </textarea>
                        </div>
                      </div>
                      <input type='hidden' value="<?php echo $sender_id; ?>" name='recepient'/>
                      <input type='hidden' value="<?php echo $sender_category; ?>" name='recepient_category'/>

                      <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit" name="reply_message">Reply</button>
                      </div>
                    </div>
                  </form>

                </div>
              </div>
            </div>

          </div>


          <?php } ?>

        </div>


      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid-->
<!-- /.content-wrapper-->



<?php
include_once 'footer.php';
?>

<?php require_once ('message_insert.php');  ?>