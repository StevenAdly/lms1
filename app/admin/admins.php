<?php

require_once '../config/config.php';

_header_admin("ADMIN");

// if (!isset($_SESSION['user'])) {
//     exit(header("Location:" . BASE_ADMIN . "login.php"));
// }

if (isset($_POST['fullname'],
            $_POST['username'],
            $_POST['email'],
            $_POST['password'],
            $_POST['repassword'])) {

    //validations
    $errors = [];
    $full_name = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_password = $_POST['repassword'];


    if ($password !== $re_password) {
        $errors[] = "Password not matches";
    }


    if (empty($errors)) {
        if (isset($_POST['id']))  {
            //update user
            $id = $_POST['id'];

            if(update( $full_name, $username, $password, $email, $id )) {
                exit(header("Location:" . BASE_ADMIN.'admins.php' ));
            } else{
                $errors[] = "Can't Update";
            }


        } else {
            //insert user
            $user = insert( $full_name, $username, $password, $email );
              exit(header("Location:" . BASE_ADMIN .'admins.php'));
            if (!$user){
                $errors[] = "Can't insert";
            }
        }

    } else {
        print_r($errors);
    }

    if (!empty($errors)) print_r($errors);


}


if (isset($_GET['del']))
{

      if ($id = $_GET['del']) {
          delete($id);
          exit(header("Location:" . BASE_ADMIN .'admins.php' ));
          //$_SERVER['PHP_SELF'] => page name
      }

}




$users = getAll();


function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log($output)</script>";
}
//debug_to_console($errors);




?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Admins
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Admins</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Admins Table</h3>
            </div>
            <div class="row">
              <div class="col-xs-8 col-xs-offset-2">
                <!-- hna de 7taa sya3a lw d5ll b3t l edit bl get 2zhr l form lw l2 2zhr l button -->

                                <?php
                                if (isset($_GET['edit'])){
                                    $user = getById($_GET['edit']);
                                    ?>

                                    <form action="" method="post">
                                        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="admin full name" name="fullname" value="<?php echo $user['full_name']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder="username" name="username" value="<?php echo $user['user_name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder="email" name="email" value="<?php echo $user['email']; ?>">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="password" name="password">
                                                    </div>
                                                </div>

                                                <div class="col-xs-12 col-md-6">
                                                    <div class="form-group">
                                                        <input type="password" class="form-control" placeholder="re password" name="repassword">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>


                                    <?php
                                } else {
                                ?>
                                <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#add-new">
                                    ADD NEW
                                </button>
                                <?php } ?>
                <!--===============================================================  -->
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              <table id="table-courses" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>full Name</th>
                  <th>user name</th>
                  <th>email</th>
                  <th>Edit</th>
                  <th>Delete</th>
                 </tr>
                </thead>
                <tbody>
                <tr>
                  <?php  foreach ($users as $user) {  ?>
                  <th><?php echo $user['id']; ?></th>
                  <th><?php echo $user['full_name']; ?></th>
                  <th><?php echo $user['user_name']; ?></th>
                  <th><?php echo $user['email']; ?></th>
                  <td><a href="<?php BASE_ADMIN; ?>?edit=<?php echo $user['id']; ?>" class="btn btn-info">Edit</a></td>
                  <td><a href="<?php BASE_ADMIN; ?>?del=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
                  <?php } ?>
                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->









    <div class="modal fade" id="add-new">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Add New User</h4>
          </div>
          <form action="" method="post">
            <div class="modal-body">
              <div class="row">
                <div class="col-xs-12 col-md-6">
                  <div class="form-group">
                    <input type="text" name="fullname" class="form-control" placeholder="full name">
                  </div>
                </div>

                <div class="col-xs-12 col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                      <input type="text"  name="username"  class="form-control" placeholder="user name">
                    </div>
                  </div>
                </div>

                <div class="col-xs-12">
                  <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="email">
                  </div>
                </div>


                <div class="col-xs-12 col-md-6">
                  <div class="form-group">
                    <input type="password"  name="password" class="form-control" placeholder="password">
                  </div>
                </div>

                <div class="col-xs-12 col-md-6">
                  <div class="form-group">
                    <div class="form-group">
                      <input type="password"  name="repassword" class="form-control" placeholder="re-password">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>

            </div>
          </form>

        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

<?php
_footer_admin();
?>
