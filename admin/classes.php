<?php include_once ('header.php');
include_once('../connection.php');
include('add.php');
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
      <button data-toggle="modal" data-target="#create_csv" class="btn btn-primary pull-right">Create Class using CSV</button>
      <h1>Classes</h1>
      <button data-toggle="modal" data-target="#create" class="btn btn-primary pull-right">Create Class</button>
      <button data-toggle="modal" data-target="#delete" class="btn btn-primary pull-right">Delete Class</button>



      <table class="table table-user-information">
        <table class="table table-striped table-bordered table-hover">
          <thead>
            <tr>
              <th>Sr.</th>
              <th>Class</th>
              <th>Teacher Incharge</th>
              <th>Date Created(Y-m-d)</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i=0;
            $class = "SELECT * FROM `classes`";
            $query_class = mysqli_query($con,$class);
            while ($query1 = mysqli_fetch_assoc($query_class)){
              $sclass=$query1['id'];
              $teacher=$query1['teacher_id'];
              $select = "SELECT * FROM `teacher` WHERE `id`='$teacher' AND `date_left` =''";
              $query_select = mysqli_query($con,$select);
              while ($query2 = mysqli_fetch_assoc($query_select)){
               $i++;
               ?>
               <!--  -->
               <tr class="odd gradeX">
                 <td><?php echo $i ?></td>
                 <td><?php echo $query1['class']; ?></td>
                 <td><?php echo $query2['name']; ?></td>
                 <td><?php echo $query1['date'];?></td>
                 <?php 
               }

             } ?>
           </tr>
         </tbody>
       </table>
     </div>
   </div>
 </div>
</div>
</table>


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Class</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body"><!--Change Category Section -->
       
        <form method="post" action="">        
          <div class="col-10 offset-1" id="change_category">
            <div class="form-group">
             <div class="form-row">
              <div class="col-md-12">
               <label for="exampleInputPassword1">Class Name</label>
               <input class="form-control" type="text" name="class" placeholder="Enter Class">
             </div> 
           </div>

           
         </div>
         <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit" name="delete_class">Delete</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Create New Class</h5>
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
             <input class="form-control" type="file" name="file" accept=".csv">
           </div> 
         </div>
       </div>
       
       <div class="modal-footer">
         <a class="btn btn-secondary" href= "classes_template.php">Download Template</a>
         <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
         <button class="btn btn-primary" type="submit" name="add_class_csv">Create</button>
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
        <h5 class="modal-title" id="exampleModalLabel">Create New Class</h5>
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
             <label for="exampleInputPassword1">Class Name</label>
             <input class="form-control" type="text" name="class" placeholder="Enter Class">
           </div> 
         </div>
       </div>
       <div class="form-group">
         <div class="form-row">
          <div class="col-md-12">
           <label for="exampleInputPassword1">Super Class Name</label>
           <select class="form-control" name="super_class">
            <option>SSS 3 </option>
            <option>SSS 2 </option>
            <option>SSS 1 </option>
            <option>JSS 3 </option>
            <option>JSS 2 </option>
            <option>JSS 1 </option>
            <option>Primary 6 </option>
            <option>Primary 5 </option>
            <option>Primary 4 </option>
            <option>Primary 3 </option>
            <option>Primary 2 </option>
            <option>Primary 1  </option>
            <option>Nursery 2 </option>
            <option>Nursery 1 </option>
          </select>
        </div> 
      </div>

    </div>
    <div class="form-row">
      <div class="col-md-12">
        <label for="category">Assign Educator</label>
        <select class="form-control" name="t_id">
          <?php
          $get = "SELECT * FROM teacher WHERE category=1";
          $query_get = mysqli_query($con,$get);
          while ($array = mysqli_fetch_assoc($query_get)) {
            $id = $array['id']; $name = $array['name'];
            echo "<option value='$id'>$name</option>";
          }
          ?>
        </select>
      </div>
    </div>
  </div>
  <div class="modal-footer">
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
    <button class="btn btn-primary" type="submit" name="add_class">Create</button>
  </div>
</form>
</div>
</div>
</div> 
</div>
</div>

<?php include_once 'footer.php'; ?>








