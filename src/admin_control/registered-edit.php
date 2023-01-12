<?php
@include('includes/admin_header.php');
@include('includes/admin_topbar.php');
@include('includes/admin_sidebar.php');
// input php connection and configuration file initialization
require_once '../assets/php/createDatabase.php';

$database = new CreateDatabase("userAdminForm", "users");
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
              <h3 class="card-title">Edit - Users</h3>
              <a href="registered.php" class="btn btn-warning btn-sm float-right">BACK</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
              <div class="row">
                <div class="col-md-6">
                  <!-- form -->
                  <form action="code.php" method="post" enctype="multipart/form-data">
                    <?php
                    if (isset($_GET['user_id'])) {
                      $result = $database->editUserData();
                      foreach ($result as $row) {
                    ?>
                    <input type="hidden" name="user_id" value="<?php echo $row['id'] ?>">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Email Id</label>
                      <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Phone Number</label>
                      <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control" name="password" value="<?php echo $row['password'] ?>"
                        placeholder="Password">
                    </div>
                    <div class="form-group">
                      <label for="">image</label>
                      <input type="file" class="form-control" name="user_image" value="<?php echo $row['image'] ?>">
                        
                    </div>
                    <div class="form-group">
                      <select class="form-select form-select-lg mb-3 " type="help" name="user_type" >
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                      </select>
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
                      <button type="submit" name="UpdateUser" class="btn btn-primary">Update</button>
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