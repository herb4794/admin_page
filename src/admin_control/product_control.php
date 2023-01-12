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

  <!-- Modal -->
  <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="addProductLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addProductLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="product_config.php" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Product Name</label>
              <input type="text" class="form-control" name="product_name" placeholder="Product Name">
            </div>
            <div class="form-group">
              <label for="">Product Image</label>
              <input class="form-control" id="file" type="file" name="product_image">
            </div>
            <div class="form-group">
              <label for="">Product Description</label>
              <input type="text" class="form-control" name="product_description" placeholder="Product Description">
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Product Price</label>
                  <input type="text" class="form-control" name="product_price" placeholder="Product Price">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Product Discount</label>
                  <input type="text" class="form-control" name="product_discount" placeholder="Product Discount">
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="addProduct" class="btn btn-primary">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- End of Modal -->

  <!-- Delete Product -->
  <!-- Modal -->
  <div class="modal fade" id="DeletModals" tabindex="-1" role="dialog" aria-labelledby="product" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="product">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="product_config.php" method="post">
          <div class="modal-body">
            <input type="text" name="delete_Product_id" class="deleteProductId">
            <p>
              Are you sure. you want to delete this product data ?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="DeleteProductbtn" class="btn btn-primary">Yes, Delete.!</button>
          </div>
        </form>
      </div>
    </div>
  </div>


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
            <li class="breadcrumb-item active">Product Table</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- container -->
  <div class="container-fluid">
    <!-- row -->
    <div class="row">
      <!-- col-md-12 -->
      <div class="col col-md-12">
        <?php
        if (isset($_SESSION['status'])) {
          echo "<h4>" . $_SESSION['status'] . "</h4>";
          unset($_SESSION['status']);
        }
        ?>


        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Product Table</h3>
            <a href="#" data-toggle="modal" data-target="#add_user" class="btn btn-warning btn-sm float-right">Add
              Product</a>
          </div>
          <!-- /.card-header -->


          <!-- /.card-body -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>product_name</th>
                  <th>product_image</th>
                  <th>product_description</th>
                  <th>product_discount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = $database->getData();
                foreach ($result as $row) {
                ?>
                <tr>
                  <td>
                    <?php echo $row['id']; ?>
                  </td>
                  <td>
                    <?php echo $row['product_name']; ?>
                  </td>
                  <td>
                    <img src="<?php echo $row['product_image']; ?>" class="img-thumbnail rounded mx-auto d-block"
                      width="50" height="50">
                  </td>
                  <td>
                    <?php echo $row['product_description']; ?>
                  </td>
                  <td>
                    <?php echo $row['product_discount']; ?>
                  </td>
                  <td>
                    <a href="product-edit.php?product_id=<?php echo $row['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                    <button type="button" value=<?php echo $row['id'] ?> class="btn btn-sm btn-danger
                      deleteProductBtn">Delete</button>
                  </td>
                </tr>
                <?php
                }

                ?>

              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </div>
    <!-- col-md-12 -->

    <!-- row -->
  </div>

</div>
<!-- container -->



<?php
@include('includes/admin_script.php');
?>

<script>
  $(document).ready(function () {
    $('.deleteProductBtn').click(function (e) {
      e.preventDefault();

      let product_id = $(this).val();

      $('.deleteProductId').val(product_id);
      $('#DeletModals').modal('show');
    })

  })

</script>

<?php
@include('includes/admin_footer.php');
?>