<?php include_once ('header.php');
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
    <div class="row">
      <div class="col-6">
        <h5> Subject Teachers </h5>


        <div class="dropdown pull-right">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
           Alter Subject
         </button>
         <div class="dropdown-menu">
           <form method="post" action="">
             
             <div class="form-group">
              
               <div class="col-md-12">
                <label for="exampleInputPassword1">Email</label>
                <input class="form-control" type="email" name="email" required = "required" placeholder="Email">
              </div>
              
              
              <div class="col-md-12">
                <label for="exampleConfirmPassword">Subject</label>
                <input class="form-control" type="text" name="subject" required="required" placeholder="subject">
              </div>
            </div>
            <button class="btn btn-primary btn-block" type="submit" name="alter_subject">Alter</button>
          </form>
        </div>
      </div> 

      <table class="table table-striped table-bordered table-hover">
        <thead>
          <tr>
            <th>Staff</th>
            <th>Email</th>
            <th>Subject</th>
          </tr>
          <tbody>
           <?php 
           $get = "SELECT * FROM `teacher` WHERE `category` = '2'";
           $query_get = mysqli_query($con,$get);
           while ($query = mysqli_fetch_assoc($query_get)){
            $teacher_id = $query['id']; 
            $select_sub = "SELECT `subject` FROM `subjects` WHERE `teacher_id` = '$teacher_id'";
            $query_sub = mysqli_query($con, $select_sub);
            $row = mysqli_fetch_assoc($query_sub);
            $subject = $row['subject'];
            ?>
            <tr>
              <td><?php echo $query['name']; ?></td>
              <td><?php echo $query['email'];?> </td>
              <td><?php echo $subject;?> </td>
              <?php } ?>
            </tbody>
          </table>
        </div>

        <div class="col-6">
          <h5> Class Teachers </h5>



          <div class="dropdown pull-right">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
             Alter Class
           </button>
           <div class="dropdown-menu">
             <form method="post" action="">
               
               <div class="form-group">
                
                 <div class="col-md-12">
                  <label for="exampleInputPassword1">Email</label>
                  <input class="form-control" type="email" name="email" required = "required" placeholder="Email">
                </div>
                
                
                <div class="col-md-12">
                  <label for="exampleConfirmPassword">Class</label>
                  <input class="form-control" type="text" name="class" required="required" placeholder="Class">
                </div>
              </div>
              <button class="btn btn-primary btn-block" type="submit" name="alter_class">Alter</button>
            </form>

          </div>
        </div> 





        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Staff</th>
              <th>Email</th>
              <th>Class</th>
            </tr>
          </thead>
          <tbody>
           <?php 
           $get_class = "SELECT * FROM `teacher` WHERE `category` ='1'";
           $query_get_class = mysqli_query($con,$get_class);
           while ($query_c = mysqli_fetch_assoc($query_get_class)){
            $teacher_id = $query['id']; 
            $select_class = "SELECT `class` FROM `classes` WHERE `teacher_id` = '$teacher_id'";
            $query_class = mysqli_query($con, $select_class);
            $row_class= mysqli_fetch_assoc($query_class);
            $class = $row_class['class'];

            ?>
            <tr>
              <td><?php echo $query_c['name']; ?></td>
              <td><?php echo $query_c['email']; ?></td>
              <td><?php echo $class;?> </td>
              <?php } ?>
            </tbody>
          </table>
        </div>

        

      </div>
    </div>
  </div> 
  
  
  <!-- /.container-fluid-->
  <!-- /.content-wrapper-->
  <?php include_once 'footer.php'; ?>