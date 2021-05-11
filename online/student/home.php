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
        <div class="col-8">
          <h1>Student Information</h1>
           <table class="table table-user-information">
                                  <tbody class="col-4">
                                      <tr>
                                          <td>Name:</td>
                                          <td>
                                              <?php echo $fname; ?> <?php echo $lname; ?> </td>
                                      </tr>
                                      <tr>
                                          <td>Class:</td>
                                          <td>
                                            <?php echo $classroom; ?>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td>Class Teacher:</td>
                                          <td>
                                            <?php $select = "SELECT * FROM classes where id ='$myclass'";
                                                  $query = mysqli_query($con,$select);
                                                  $row = mysqli_fetch_assoc($query);

                                                    $pick = "SELECT * FROM teacher WHERE id ={$row['teacher_id']}";
                                                    $query_pick = mysqli_query($con,$pick);
                                                    $name = mysqli_fetch_assoc($query_pick);
                                                    echo $name['name'];
                                                  
                                             ?>
                                          </td>
                                      </tr>

                                      <tr>
                                          <td>Birthday:</td>
                                          <td><?php echo $bday; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Gender:</td>
                                          <td><?php echo $gender; ?></td>
                                      </tr>
                                      <tr>
                                          <td>Email:</td>
                                          <td><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <?php include_once 'footer.php'; ?>