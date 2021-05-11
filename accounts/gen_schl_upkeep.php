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
        <button type="button"data-toggle="modal" data-target="#add_upkeep" class="btn btn-primary pull-right">Add upkeep</button>
        <h1>General School Upkeep</h1>

        <div class="col-10 offset-1">
          <h2> Upkeeps </h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th>SN </th>
              <th> Upkeep </th>
              <th> Price per session</th>
              <th>Session started </th>
              <th> Change Price </th>
              <th> Remove Upkeep </th>
            </thead>
            <tbody>
              <?php

              $select_upkeep = "SELECT * FROM `gen_schl_upkeep` WHERE `session_ended` = '' ORDER BY `id` DESC";
              $query_select_upkeep = mysqli_query($con, $select_upkeep);
              $i = 0;
              while($row = mysqli_fetch_assoc($query_select_upkeep)){
                $i += 1;
                $upkeep = $row['name'];
                $price_per_session = $row['amt_per_session'];
                $session_started = $row['session_started'];
                $upkeep_id = $row['id'];

                ?>

                <tr>
                  <td> <?php echo $i; ?> </td>
                  <td><?php echo $upkeep;?> </td>
                  <td><?php echo $price_per_session; ?></td>
                  <td><?php echo  $session_started; ?></td>
                  <td>
                    <form action='add_upkeep.php' method='post'>
                     <div class="col-12" id="restock">

                      <div class="form-row">
                        <div class="col-md-5 col-lg-5 ">
                          <input type="number" class='form-control' oninput="validity.valid||(value='1')"  placeholder='New Price' name="new_price"/>
                          <input type="hidden" value="<?php echo $upkeep_id; ?>" name="upkeep_id"/>
                        </div>
                       <button class='btn btn-success' type='submit' name="change_price">Change Price </button> 
                      </div>
                    </div>
                  </form>   
                </td>
                <td>
                 <form action='add_upkeep.php' method='post'>
                   <div class="col-12" id="restock">
                    <div class="form-row">
                      <div class="col-md-5 col-lg-5 ">
                        <input type="hidden" value="<?php echo $upkeep_id; ?>" name="upkeep_id"/>
                      </div>
                      <button class='btn btn-danger' type='submit' name="remove_upkeep">Remove </button> 
                    </div>
                  </div>
                </form>                  
              </td>
            </tr>
          </div>

          <?php   }  ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
</div>
</div>


<div class="modal fade" id="add_upkeep" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add">Add Upkeep</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Change email section -->
      <div class="col-12" id="send_memo">
        <form action="add_upkeep.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Upkeep</label>
                <input type='text' class="form-control" required='required' name="upkeep"  placeholder='Upkeep'>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Price per session(#)</label>
                <input type='number' min='1' class="form-control" required='required' name="price" oninput="validity.valid||(value='1')" placeholder='Price'>
              </div>
            </div>
          </div>
          <div class="form-group">

          </div>


          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" name="add_upkeep"> Add </button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>




<?php include_once 'footer.php'; ?>
