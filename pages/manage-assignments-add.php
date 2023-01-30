<?php

  // only admin can access
  if( !Authentication::whoCanAccess('student') ) {
    header('Location: /login');
    exit;
  }

  //set csrf token
  CSRF::generateToken( 'add_assignment_form' );

  //make sure post request
  if( $_SERVER["REQUEST_METHOD"] === 'POST' ) {
    
    $rules = [
      'title' => 'required',
      'content' => 'required',
      'csrf_token' => 'add_assignment_form_csrf_token'
    ];
    $error = FormValidation::validate(
      $_POST,
      $rules
    );

    // make sure there is no error
    if ( !$error ) {

      // step 4 = add new user
      Assignment::add(
        $_POST['title'],
        $_POST['content'],
        $_POST['image_url'],
        $_POST['video_url'],
      );

      // step 5: remove the CSRF token
      CSRF::removeToken( 'add_assignment_form' );

      // step 6: redirect to manage users page
      header("Location: /manage-assignments");
      exit;

    } // end - $error

  }

  require dirname(__DIR__) . "/parts/header.php";

?>

  <body>
    
  <section class="Manage-assignments-add">

    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Add New Assignment</h1>
      </div>
      <div class="card mb-2 p-4">
      <?php require dirname( __DIR__ ) . '/parts/error_box.php'; ?>
        <form
          method="POST"
          action="<?php echo $_SERVER["REQUEST_URI"]; ?>"
          >
          <div class="mb-3">
            <label for="assignment-title" class="form-label">Title</label>
            <input type="text" class="form-control" id="assignment-title" name="title" />
          </div>
          <div class="mb-3">
            <label for="assignment-content" class="form-label">Content</label>
            <textarea
              class="form-control"
              id="assignment-content"
              name="content"
              rows="10"
            ></textarea>
          </div>
          <div class="mb-3">
            <label for="assignment-image-url" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="assignment-image-url" name="image_url" />
          </div>
          <div class="mb-3">
            <label for="assignment-video-url" class="form-label">Video URL</label>
            <input type="text" class="form-control" id="assignment-video-url" name="video_url" />
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Add</button>
          </div>
          <input
            type="hidden"
            name="csrf_token"
            value="<?php echo CSRF::getToken( 'add_assignment_form' ); ?>"
            />
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-assignments" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Assignments</a
        >
      </div>
    </div>
  
  </section>

<?php

  require dirname(__DIR__) . "/parts/footer.php";