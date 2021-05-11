<?php include_once 'header.php'; ?>
<div class="content-wrapper">    <!-- /.container-fluid-->
  <div class="container-fluid">    <!-- /.content-wrapper-->

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home.php">Dashboard</a>
      </li>
      <!-- <li class="breadcrumb-item active">Blank Page</li> -->
    </ol>
    <div class="row">
      <div class="col-12">
        <h1>Fees</h1>
        <button data-toggle="modal" data-target="#add_fees" class="btn btn-primary pull-right">Add new fees</button>

        <form action='' method='post'>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6 offset-3">
               <select  class="form-control" name="session_select" required="required">
                <?php 

                $select_session = "SELECT `id`,`session_name` FROM `session_available`";
                $query_session = mysqli_query($con, $select_session);
                while($row_session = mysqli_fetch_assoc($query_session)){

                 $session_id = $row_session['id']; $session_name = $row_session['session_name'];
                 echo "<option>$session_name</option>";

               }
               ?>
             </select>
             <button type='submit' name='select_session' class="btn btn-primary">Select Session</button>
           </div>
         </div>
       </div>
     </form>

     <div class = "col-8 offset-2">
      <form action="receipt_insert.php" method="post">
       <table class="table table-striped table-bordered table-hover">
        <thead>
          <th>Class </th>
          <th> Fees </th>
          <th> Term </th>
        </thead>
        <tbody>
          <?php 
          $select_session = "SELECT * FROM `session_available` ORDER BY `session_name` DESC LIMIT 1";
          $query_session = mysqli_query($con, $select_session);
          $row_session = mysqli_fetch_assoc($query_session);
          if(isset($_POST['select_session'])){
           $current_session = $_POST['session_select'];
         }else{
          $current_session = $row_session['session_name'];
        }
        $select_fee = "SELECT * FROM `fees` WHERE `session_id` = '$current_session'";
        $query_fee = mysqli_query($con, $select_fee);
        while($row = mysqli_fetch_assoc($query_fee)){
          $class_id = $row['class'];
          $select_class = "SELECT `super_class` FROM `classes` WHERE `id`='$class_id'";
          $query_class = mysqli_query($con, $select_class);
          $row_class = mysqli_fetch_assoc($query_class);
          $class = $row_class['super_class'];

          switch($row['term']){
            case ('1'):
            $term = "First Term";
            break;
            case ('2'):
            $term = "Second Term";
            break;
            case ('3'):
            $term = "Third Term";
            break;
          }

          ?>
          <tr>
           <td><?php echo $class; ?></td>
           <td><?php echo $row['fees']; ?></td>
           <td><?php echo $term; ?></td>


         </tr>
         <?php } ?>
       </tbody>

     </table>
   </form>
 </div>
</div>
</div>
</div>
</div>






<?php include_once 'footer.php'; ?>

<div class="modal fade" id="add_fees" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete">Add new fees</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Change email section -->
      <div class="col-12" id="send_memo">
        <form action="fees_insert.php" method="post" enctype="multipart/form-data">

         <div class="form-group">
          <div class="form-row">
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Fees:</label>
              <input class="form-control" type="number" min='1' required = 'required' name="fees" oninput="validity.valid||(value='')" />
            </div>
            
            <div class="col-md-10 offset-1">
              <label for="exampleInputName">Class</label>
              <select  class="form-control" name="class" required="required">
                <?php 

                $select_class = "SELECT `id`,`super_class` FROM `classes`";
                $query_class= mysqli_query($con, $select_class);
                while($row = mysqli_fetch_assoc($query_class)){
                  $class_id = $row['id']; $super_class= $row['super_class'];
                  echo "<option value='$class_id'>$super_class</option>";

                }
                ?>
              </select>
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="form-row">
           <div class="col-md-10 offset-1">
            <label for="exampleInputName">Term</label>
            <select  class="form-control" name="term" required="required">
             <option value='1'>First Term </option>
             <option value='2'>Second Term </option>
             <option value='3'>Third Term </option>
           </select>
         </div>

         <div class="col-md-10 offset-1">
          <label for="exampleInputName">Session</label>
          <select  class="form-control" name="session_id" required="required">
            <?php 

            $select_session = "SELECT `id`,`session_name` FROM `session_available`";
            $query_session = mysqli_query($con, $select_session);
            while($row_session = mysqli_fetch_assoc($query_session)){

             $session_id = $row_session['id']; $session_name = $row_session['session_name'];
             echo "<option>$session_name</option>";


           }
           ?>
         </select>
       </div>
     </div>
   </div>

   <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <button class="btn btn-primary" type="submit" name="add_fees"> Add</button>
  </div>
</form>

</div>
</div>
</div>
</div>
