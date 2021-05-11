<?php include_once 'header_proprietor.php'; ?>
<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="home_proprietor.php">Dashboard</a>
      </li>
      <!-- <li class="breadcrumb-item active">Blank Page</li> -->
    </ol>
    <div class="row">
      <div class="col-12">
        <h1>Invoices</h1>

        <div class="col-lg-5 col-md-5">
          <h2> Invoices </h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th> SN </th>
              <th> Student</th>
              <th>Date Sent </th>
              <th>  </th>
            </thead>
            <tbody>
              <?php
              $I = 0;
              $receive_invoice = "SELECT * FROM `invoice` ORDER BY `id` DESC";
              $query_receive_invoice = mysqli_query($con, $receive_invoice);
              while($row_rec = mysqli_fetch_assoc($query_receive_invoice)){
                $I += 1;
                $student_id = $row_rec['customer_id'];
                $filename = $row_rec['filename'];

                      //to get the student name              
                $select_student = "SELECT * FROM `student` WHERE `id` = '$student_id'";
                $query_student = mysqli_query($con, $select_student);
                $row_stud = mysqli_fetch_assoc($query_student);
                $student_name = $row_stud['fname']. " " .$row_stud['lname'];
                $date = $row_rec['date'];
                ?>
                <tr><td> <?php echo $I; ?> </td><td><?php echo $student_name;?> </td> <td><?php echo $date; ?></td>
                  <form method = 'post' action='open_memo.php';>
                    <input type='hidden' value="<?php echo $filename; ?>" name='filename'/>
                    <td> <!-- note the action of the form is open_memo.php because thebscript works for both memo and invoice !-->
                      <button class="btn btn-success" type='submit' name="open_invoice" >Open </button></td></tr>
                    </form>
                    <?php   }   ?>
                  </tbody>
                </table>

              </div>

            </div>
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