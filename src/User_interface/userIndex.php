<?php
session_start();
@include('includes/admin_header.php');
@include('includes/admin_topbar.php');
@include('includes/admin_sidebar.php');
?>
<div class="modal fade" tabindex="-1" id="editProductModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit This User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" class="p-2" enctype="multipart/form-data" novalidate>
          <input type="hidden" name="product_id" id="product_id">
          <div class="row mb-3 gx-3">

            <div class="col">
              <input type="text" name="product_name" id="product_name" class="form-control form-control-lg" placeholder="Enter Name" required>
              <div class="invalid-feedback">Name is required!</div>
            </div>
          </div>

          <div class="mb-3">
            <input type="file" name="product_image" id="product_image" class="form-control form-control-lg" placeholder="Enter Image">
            <input type="hidden" name="oldProductImage" id="oldProductImage" alt="oldProductImage">
            <div class="invalid-feedback">Image is required!</div>
          </div>

          <div class="mb-3">
            <input type="tel" name="price" id="price" class="form-control form-control-lg" placeholder="Enter Price" required>
            <div class="invalid-feedback">Price is required!</div>
          </div>
          <div class="mb-3">
            <input type="tel" name="discount" id="discount" class="form-control form-control-lg" placeholder="Enter Discount" required>
            <div class="invalid-feedback">Discount is required!</div>
          </div>
          <div class="mb-3">
            <input type="tel" name="description" id="description" class="form-control form-control-lg" placeholder="Enter Description" required>
            <div class="invalid-feedback">Description is required!</div>
            <div id="showAlert"></div>
          </div>


          <div class="mb-3">
            <input type="submit" value="Update Product Info" class="btn btn-success btn-block btn-lg" id="update-product-btn">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="container py-4">
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Product table</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Product Name</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Discount
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action
                  </th>
                  <th class="text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody class="product_tbody">

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <footer class="footer pt-3  ">
    <div class="container-fluid">
      <div class="row align-items-center justify-content-lg-between">
        <div class="col-lg-6 mb-lg-0 mb-4">
          <div class="copyright text-center text-sm text-muted text-lg-start">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>,
            made with <i class="fa fa-heart"></i> by
            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
            for a better web.
          </div>
        </div>
        <div class="col-lg-6">
          <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
              <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About
                Us</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
            </li>
            <li class="nav-item">
              <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
</div>

<?php
@include('includes/admin_script.php');
?>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</script>

<script src="./userIndex.js?v=1.1"></script>

<?php
include('includes/admin_footer.php');
?>