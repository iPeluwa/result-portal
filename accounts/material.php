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
        <button type="button"data-toggle="modal" data-target="#add_material" class="btn btn-primary pull-right">Add material</button>
        <h1>Materials</h1>

        <div class="col-10 offset-1">
          <h2> Materials </h2>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <th>SN </th>
              <th> Material </th>
              <th> Price</th>
              <th>Amount in stock </th>
              <th> Restock </th>
              <th> Change Price </th>
            </thead>
            <tbody>
              <?php

              $select_material = "SELECT * FROM `materials` ORDER BY `id` DESC";
              $query_select_material = mysqli_query($con, $select_material);
              $i = 0;
              while($row = mysqli_fetch_assoc($query_select_material)){
                $i += 1;
                $material = $row['material'];
                $price = $row['price'];
                $amt_in_stock = $row['amount_in_stock'];
                $material_id = $row['id'];
                ?>

                <tr>
                  <td> <?php echo $i; ?> </td>
                  <td><?php echo $material;?> </td>
                  <td><?php echo $price; ?></td>
                  <td><?php echo  $amt_in_stock; ?></td>
                  <td>
                   <form action='add_material.php' method='post'>
                     <div class="col-12" id="restock">

                      <div class="form-row">
                        <div class="col-md-5 col-lg-5 ">
                          <input type="hidden" value="<?php echo $material_id; ?>" name="material_id"/>
                          <input type='number' class="form-control" required='required' oninput="validity.valid||(value=' ')" name="restock_number" />
                        </div>

                        <button class='btn btn-success' type='submit' name="restock">Add to stock </button> 
                      </div>
                    </div>
                  </form>                  
                </td>

                <td>
                  <form action='add_material.php' method='post'>
                   <div class="col-12" id="restock">

                    <div class="form-row">
                      <div class="col-md-5 col-lg-5">
                        <input type="hidden" value="<?php echo $material_id; ?>" name="material_id"/>
                        <input type='number' min='1' class="form-control" required='required' oninput="validity.valid||(value='1')" name="new_price" />
                      </div>

                      <button class='btn btn-warning' type='submit' name="change_price">Change Price </button> 
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



<div class="modal fade" id="add_material" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="delete">Add material</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!-- Change email section -->
      <div class="col-12" id="send_memo">
        <form action="add_material.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Material</label>
                <input type='text' class="form-control" required='required' name="material"  placeholder='Material'>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Price(#)</label>
                <input type='number' min='1' class="form-control" required='required' name="price" oninput="validity.valid||(value='1')" placeholder='Price'>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-10 offset-1">
                <label for="exampleInputName">Amount in stock</label>
                <input type='number' min='1' class="form-control" required='required' oninput="validity.valid||(value='1')" name="amt_in_stock" placeholder='Amount in Stock'>
              </div>
            </div>
          </div>


          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button class="btn btn-primary" type="submit" name="add_material"> Add </button>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>
</div>




<?php include_once 'footer.php'; ?>
