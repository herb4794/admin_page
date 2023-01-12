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

  <!-- Modal -->
  <div class="modal fade" id="add_user" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <form action="addUserAdmin.php" method="post" id="email_form">
          <div class="modal-body">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Name">
            </div>
            <div class="form-group">
              <label for="">Email Id</label>
              <span class="email_error text-danger ml-2"></span>
              <input type="email" class="form-control email_id" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="">Phone Number</label>
              <input type="text" class="form-control" name="phone" placeholder="Phone Number">
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Password</label>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">comfirmPassword</label>
                  <input type="password" class="form-control" name="confirmPassword" placeholder="Comfirm Password">
                </div>
              </div>
            </div>

            <div class="form-group">
            <select class="form-select form-select-lg mb-3 " type="help" name="user_type">
                <option value="user">user</option>
                <option value="admin">admin</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="adminAddUser" class="btn btn-primary">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- End of Modal -->

  <!-- Delete User -->

  <!-- Modal -->
  <div class="modal fade" id="DeletModal" tabindex="-1" role="dialog" aria-labelledby="addUserLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addUserLabel">Delete User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="code.php" method="post" id="deleteForm">
          <div class="modal-body">
            <input type="text" name="delete_id" class="delete_user_id">
            <p>
              Are you sure. you want to delete this user data ?
            </p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="DeleteUserbtn" class="btn btn-primary">Yes, Delete.!</button>
          </div>
        </form>

      </div>
    </div>
  </div>
  <!-- End of Modal -->


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
            <li class="breadcrumb-item active">Registered Users</li>
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
            <h3 class="card-title">Register User</h3>
            <a href="#" data-toggle="modal" data-target="#add_user" class="btn btn-warning btn-sm float-right">Add
              User</a>
          </div>
          <!-- /.card-header -->


          <!-- /.card-body -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>password</th>
                  <th>Phone Number</th>
                  <th>User Type</th>
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
                    <?php echo $row['name']; ?>
                  </td>
                  <td>
                    <?php echo $row['email']; ?>
                  </td>
                  <td>
                    <?php echo $row['password']; ?>
                  </td>
                  <td>
                    <?php echo $row['phone']; ?>
                  </td>
                  <td>
                    <?php echo $row['user_type']; ?>
                  </td>
                  <td>
                    <a href="registered-edit.php?user_id=<?php echo $row['id'] ?>" class="btn btn-sm btn-info">Edit</a>
                    <button type="button" id="Delete_Btn" value=<?php echo $row['id'] ?> class="btn btn-sm btn-danger
                      deletebtn">Delete</button>
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
  const email_form = document.getElementById('email_form')
  const email_id = document.querySelector('.email_id');
  const showAlerts = document.querySelector('.email_error')

  email_form.addEventListener('keyup', async (e) => {
    e.preventDefault();
    let email = email_id.value
    const formData = new FormData();
    formData.append("checkEmailButton", 1)
    formData.append("email", email)
    const data = await fetch('checkEmailLive.php', {
      method: "POST",
      body: formData,
    })
    const response = await data.text();
    showAlerts.innerHTML = response;
    console.log(response);

  })

</script>

<script>

  $(document).ready(function () {
    $('.deletebtn').click(function (e) {
      e.preventDefault();

      let user_id = $(this).val();

      $('.delete_user_id').val(user_id);
      $('#DeletModal').modal('show');
    })
  })

</script>


<!-- #region -->
<?php
@include('includes/admin_footer.php');
?>