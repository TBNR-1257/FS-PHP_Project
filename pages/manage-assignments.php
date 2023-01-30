<?php

  // only a logged in user/editor/admin can access
  if( !Authentication::whoCanAccess('student') ) {
    header('Location: /login');
    exit;
  }
  
  // step 1: set csrf token
  CSRF::generateToken( 'delete_assignment_form' );

  // step 2: make sure post request
  if( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

    // step 3 do error check
    $error = FormValidation::validate(
      $_POST,
      [
        'assignment_id' => 'required',
        'csrf_token' => 'delete_assignment_form_csrf_token'
      ]
    );
    
    // make sure there is no error
    if( !$error ) {

      // step 4: delete post
      Assignment::delete( $_POST['assignment_id'] );

      // step 5: remove the CSRF token
      CSRF::removeToken( 'delete_assignment_form' );
      
      // step 6: redirect to manage users page
      header("Location: /manage-assignments");
      exit;

    }

  }

  require dirname(__DIR__) . "/parts/header.php";
  
?>
  <body>
  <section class="Manage-assignments">
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <?php if( Authentication::isStudent() == 'true' ) : ?> 
        <h1 class="h1">Assignments</h1>
        <?php else : ?>
        <h1 class="h1">Manage Assignments</h1>
        <?php endif; ?>

        <?php if ( Authentication::whoCanAccess('teacher') ) : ?>
        <div class="text-end">
          <a href="/manage-assignments-add" class="btn btn-primary btn-sm"
            >Add New Assignment</a
          >
        </div>
        <?php endif; ?>
      </div>
      <div class="card mb-2 p-4">
        <?php require dirname( __DIR__ ) . '/parts/error_box.php'; ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="width: 40%;">Title</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>  
            
            <?php foreach( Assignment::getAllAssignments() as $key => $assignment ) : ?>
            <tr>
              <th scope="row"><?php echo $key+1 ?></th>
              <td><?php echo $assignment->title ?></td>
              <td>
              <?php if( Authentication::isStudent() == 'true' ) :
                  switch( $assignment->complete ) {
                    case "0":
                      echo '<span class="badge bg-warning">Incomplete</span>';
                      break;
                    case "1":
                      echo '<span class="badge bg-success">Complete</span>';
                      break;
                  }
              ?>
              <?php else : 
                  switch( $assignment->status ) {
                    case 'pending':
                      echo '<span class="badge bg-dark">' . $assignment->status .'</span>';
                      break;
                    case 'publish':
                      echo '<span class="badge bg-info">' . $assignment->status .'</span>';
                      break;
                  }
              ?>
              <?php endif; ?>
              </td>
              <td class="text-end">
                <div class="buttons">
                <?php if( $assignment->status == 'pending' && Authentication::isStudent() == 'true' ) : ?>
                  <a
                    href="/assignment?id=<?php echo $assignment->id; ?>"
                    class="btn btn-primary btn-sm me-2 disabled"
                    ><i class="bi bi-eye"></i
                  ></a>
                <?php else: ?>
                  <a
                    href="/assignment?id=<?php echo $assignment->id; ?>"
                    class="btn btn-primary btn-sm me-2"
                    ><i class="bi bi-eye"></i
                  ></a>
                  <!-- target="_blank" in between href and class -->
                  <!-- target="_blank" in this page is causing it to open it in another tab" -->
                <?php endif; ?>

                <?php if( Authentication::whoCanAccess('teacher') ) : ?>
                  <a
                    href="/manage-assignments-edit?id=<?php echo $assignment->id; ?>"
                    class="btn btn-secondary btn-sm me-2"
                    ><i class="bi bi-pencil"></i
                  ></a>
                  <!-- delete button start -->
                  <!-- Button trigger modal -->
                  <button
                  type="button"
                  class="btn btn-danger btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#assignment-<?php echo $assignment->id; ?>"
                  >
                      <i class="bi bi-trash"></i>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="assignment-<?php echo $assignment->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          Are you sure you want to delete this assignment (<?php echo $assignment->title ?>) ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <input type="hidden" name="assignment_id" value="<?php echo $assignment->id; ?>" />
                            <input type="hidden" name="csrf_token" value="<?php echo CSRF::getToken( 'delete_assignment_form' ); ?>" >
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- delete button end -->
                <?php endif; ?>
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