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
        <div class="col-12">
          <h1>My Students</h1>
           <table class="table table-user-information">
                                  <table class="table table-striped table-bordered table-hover">
                                          <thead>
                                              <tr>
                                                  <th>Sr.</th>
                                                  <th>Class</th>
                                                  <th>Subject</th>
                                                  <th>Action</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                            $i=0;
                                            $class = "SELECT * FROM `classes`";
                                              $query_class = mysqli_query($con,$class);
                                            while ($query1 = mysqli_fetch_assoc($query_class)){
                                              $sclass=$query1['id'];
                                               $sub = "SELECT * FROM `subjects` WHERE teacher_id='$userid' AND class_id=$sclass";
                                              $query_sub = mysqli_query($con,$sub);
                                              while ($query = mysqli_fetch_assoc($query_sub)){ 
                                             $i++;
                                             ?>
                                             <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                                  <td><?php echo $query1 ['class']; ?></td>
                                                  <td><?php echo $query ['subject']; ?></td>
                                                  <td><a href="student_view.php?id=<?php echo $sclass ?>" type="button" class="btn btn-primary">
                                                    View Students</a></td>
                                                  </tr>
                                                </tr>
                                                 <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                    </div>

        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>