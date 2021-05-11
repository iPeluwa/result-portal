<?php include_once ('header.php');
include_once('../connection.php');
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
      <div class="col-12">
        <button data-toggle="modal" data-target="#create_csv" class="btn btn-primary pull-right">Create Subjects using CSV</button>
        <h1>Subjects</h1>
        <button data-toggle="modal" data-target="#create" class="btn btn-primary pull-right">Create Subject</button>
        <button data-toggle="modal" data-target="#delete" class="btn btn-primary pull-right">Delete Subject</button>

        <table class="table table-user-information">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th>Sr.</th>
                <th>Subject</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>Date Created(Y-m-d)</th>
                <!-- <th>Action</th> -->
              </tr>
            </thead>
            <tbody>
              <?php 
              $i=0;
              $class = "SELECT * FROM `classes`";
              $query_class = mysqli_query($con,$class);
              while ($query1 = mysqli_fetch_assoc($query_class)){
                $sclass=$query1['id'];
                $get = "SELECT * FROM `subjects` WHERE `class_id` =$sclass";
                $query_get = mysqli_query($con,$get);
                while ($query = mysqli_fetch_assoc($query_get)){
                  $teacher=$query['teacher_id'];
                  $teacher = "SELECT * FROM `teacher` WHERE `id`='$teacher' AND `date_left` =''";
                  $query_teacher = mysqli_query($con,$teacher);
                  while ($query2 = mysqli_fetch_assoc($query_teacher)){
                   $i++;
                   ?>
                   <tr class="odd gradeX">
                     <td><?php echo $i;?></td>
                     <td><?php echo $query['subject']; ?></td>
                     <td><?php echo $query1['class']; ?></td>
                     <td><?php echo $query2['name']; ?></td>
                     <td><?php echo $query['date'];?></td>
                     <?php 
                   }
                 }
               } ?>
             </tr>
           </tbody>
         </table>
       </div>
     </div>
   </div>


   <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete a Subject</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body"><!--Change Category Section -->
         <div class="col-10 offset-1" id="change_category">
           <form method="post" action="">        
            <div class="form-group">
             <div class="form-row">
              <div class="col-md-12">
               <label for="exampleInputPassword1">Subject</label>
               <input class="form-control" type="text" name="subject" required = "required" placeholder="Enter Subject">
             </div> 
           </div>
         </div>
         <div class="form-group">
          <div class="form-row">
            <div class="col-md-12">
              <label for="category">Class</label>
              <select class="form-control" name="c_id" required="required">
                <?php
                $state = "SELECT * FROM classes";
                $state_result = mysqli_query($con,$state);
                while ($row = mysqli_fetch_assoc($state_result)) {
                  $id = $row['id']; $class = $row['class'];
                  echo "<option value='$id'>$class</option>";
                }
                ?>
              </select>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="delete_subject">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div> 
</div>
</div>





<div class="modal fade" id="create_csv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Subject</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><!--Change Category Section -->
       <div class="col-10 offset-1" id="change_category">
         <form method="post" action="" enctype="multipart/form-data">        
          <div class="form-group">
           <div class="form-row">
            <div class="col-md-12">
             <label for="exampleInputPassword1">Select file</label>
             <input class="form-control" type="file" name="file" id="file" accept=".csv">
           </div> 
         </div>
       </div>

       <div class="modal-footer">
         <a class="btn btn-secondary" href= "subjects_template.php">Download Template</a>
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <button class="btn btn-primary" type="submit" name="add_subject_csv">Create</button>
       </div>
     </form>

   </div>
 </div>
</div> 
</div>
</div>



<div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create New Subject</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><!--Change Category Section -->
       <div class="col-10 offset-1" id="change_category">
         <form method="post" action="">        
          <div class="form-group">
           <div class="form-row">
            <div class="col-md-12">
             <label for="exampleInputPassword1">Subject</label>
             <input class="form-control" type="text" name="subject" required="required" placeholder="Enter Subject">
           </div> 
         </div>
       </div>
       <div class="form-group">
        <div class="form-row">
          <div class="col-md-12">
            <label for="category">Class</label>
            <select class="form-control" name="c_id" required="required">
              <?php
              $state = "SELECT * FROM classes";
              $state_result = mysqli_query($con,$state);
              while ($row = mysqli_fetch_assoc($state_result)) {
                $id = $row['id']; $class = $row['class'];
                echo "<option value='$id'>$class</option>";
              }
              ?>
            </select>
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-12">
          <label for="category">Educator</label>
          <select class="form-control" name="t_id" required = "required">
            <?php
            $st_teach ="SELECT * FROM teacher";
            $query_st_teach = mysqli_query($con,$st_teach);
            while ($array = mysqli_fetch_assoc($query_st_teach)) {
              $id = $array['id']; $name = $array['name'];
              echo "<option value='$id'>$name</option>";
            }
            ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <button class="btn btn-primary" type="submit" name="add_subject">Create</button>
      </div>
    </form>
  </div>
</div>
</div> 
</div>
</div>
<?php include('add.php'); ?>
<?php include_once 'footer.php'; ?>



