<?php
@include('includes/admin_header.php');
@include('includes/admin_topbar.php');
@include('includes/admin_sidebar.php');
// input php connection and configuration file initialization
require_once '../assets/php/createDatabase.php';

$database = new CreateDatabase("product_database", "product_table");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Edit Users</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <section class="content">
    <!-- container -->
    <div class="container-fluid">
      <!-- row -->
      <div class="row">
        <!-- col-md-12 -->
        <div class="col col-md-12 ">

          <!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Edit - Product</h3>
              <a href="product_control.php" class="btn btn-warning btn-sm float-right">BACK</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <div class="row">
                <div class="col-md-6">
                  <!-- form -->
                  <form action="product_config.php" method="post" enctype="multipart/form-data">
                    <?php
                      if (isset($_SESSION['status'])) {
                        echo $_SESSION['status'];
                      }
                    if (isset($_GET['product_id'])) {
                      $result = $database->editProductData();
                      foreach ($result as $row) {
                    ?>
                    <input type="hidden" name="product_id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                      <label for="">product_name</label>
                      <input type="text" class="form-control" name="product_name" value="<?php echo $row['product_name'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">product_image</label>
                      <input type="file"  class="form-control" name="product_image" alt="image" value="<?php echo $row['product_image'] ?>">
                      <input type="hidden" class="form-control" name="oldImage" alt="oldImage" value="<?php echo $row['product_image']?>">
                    </div>
                    <div class="form-group">
                      <label for="">product_description</label>
                      <input type="text" class="form-control" name="product_description" value="<?php echo $row['product_description'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">product_price</label>
                      <input type="text" class="form-control" name="product_price" value="<?php echo $row['product_price'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">product_discount</label>
                      <input type="text" class="form-control" name="product_discount" value="<?php echo $row['product_discount'] ?>">
                    </div>

                    <?php

                      }

                    } else {
                      echo "<h4>No Record Found.!</h4>";
                    }
                    ?>
                    <!-- modal body -->
                    <div class="modal-body">

                    </div>
                    <!-- modal body -->
                    <div class="modal-footer">
                      <button type="submit" name="UpdateProduct" class="btn btn-primary">Update</button>
                    </div>
                  </form>
                  <!-- form -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- col-md-12 -->
    <!-- row -->
  </section>
</div>
<!-- container -->

<?php
@include('includes/admin_script.php');
?>
<?php
include('includes/admin_footer.php');
?>