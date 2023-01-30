<?php

  // only admin can access
  if( !Authentication::whoCanAccess('admin') ) {
    header('Location: /dashboard');
    exit;
  }

  // step 1: set csrf token
  CSRF::generateToken( 'delete_user_form' );

  // step 2: make sure post request
  if( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

    // step 3 do error check
    $error = FormValidation::validate(
      $_POST,
      [
        'user_id' => 'required',
        'csrf_token' => 'delete_user_form_csrf_token'
      ]
    );

    // make sure there is no error
    if( !$error ) {

      // step 4: delete user
      User::delete( $_POST['user_id'] );

      // step 5: remove the CSRF token
      CSRF::removeToken( 'delete_user_form' );

      // step 6: redirect to manage users page
      header("Location: /manage-users");
      exit;

    }

  }

  require dirname(__DIR__) . "/parts/header.php";

?>

  <body>
    <section class="Manage-users">

    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Users</h1>
        <div class="text-end">
          <a href="/manage-users-add" class="btn btn-primary btn-sm"
            >Add New User</a
          >
        </div>
      </div>
      <div class="card mb-2 p-4">
        <?php require dirname( __DIR__ ) . '/parts/error_box.php'; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach( User::getAllUsers() as $key => $user ) : ?>
            <tr>
              <th scope="row"><?php echo $key+1 ?></th>
              <td><?php echo $user->name ?></td>
              <td><?php echo $user->email ?></td>
              <td>
                <?php
                  switch( $user->role ) {
                    case 'admin':
                      echo '<span class="badge bg-primary">' . $user->role .'</span>';
                      break;
                    case 'editor':
                      echo '<span class="badge bg-info">' . $user->role .'</span>';
                      break;
                    case 'teacher':
                      echo '<span class="badge bg-warning">' . $user->role .'</span>';
                      break;
                    case 'student':
                      echo '<span class="badge bg-success">' . $user->role .'</span>';
                      break;
                  }
                ?>
              </td>
              <td class="text-end">
                <div class="buttons">
                  <a
                    href="/manage-users-edit?id=<?php echo $user->id; ?>"
                    class="btn btn-secondary btn-sm me-2"
                    ><i class="bi bi-pencil"></i
                  ></a>
                  <!-- delete button start -->
                  <!-- Button trigger modal -->
                  <button
                  type="button"
                  class="btn btn-danger btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#user-<?php echo $user->id; ?>"
                  >
                      <i class="bi bi-trash"></i>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="user-<?php echo $user->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          Are you sure you want to delete this user (<?php echo $user->name ?>) ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $user->id; ?>" />
                            <input type="hidden" name="csrf_token" value="<?php echo CSRF::getToken( 'delete_user_form' ); ?>" >
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- delete button end -->
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="/dashboard" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Dashboard</a
        >
      </div>
    </div>

    </section>

<?php

  require dirname(__DIR__) . "/parts/footer.php";