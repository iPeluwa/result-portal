<?php
$id = $_GET['id'];
 include_once 'header.php'; ?>
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
                                                  <th>Firstname</th>
                                                  <th>Lastname</th>
                                                  <th>Birthday</th>
                                                  <th>Gender</th>
                                                  <th>Email</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                            <?php 
                                            $i=0;
                                            $class = "SELECT * FROM `student` WHERE class_id= $id";
                                            $query_class = mysqli_query($con,$class);
                                            while ($query1 = mysqli_fetch_assoc($query_class)){
                                             $i++;
                                             ?>
                                             <tr class="odd gradeX">
                                             <td><?php echo $i ?></td>
                                                  <td><?php echo $query1 ['fname']; ?></td>
                                                  <td><?php echo $query1 ['lname']; ?></td>
                                                   <td><?php echo $query1 ['birthday']; ?></td>
                                                    <td><?php echo $query1 ['gender']; ?></td>
                                                     <td><?php echo $query1 ['email']; ?></td>
                                                  </tr>
                                                </tr>
                                                 <?php } ?>
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