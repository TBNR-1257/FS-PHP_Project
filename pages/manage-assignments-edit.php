<?php

  // students and higher roles can access
  if( !Authentication::whoCanAccess('student') ) {
    header('Location: /login');
    exit;
  }

  // load post data
  $assignment = Assignment::getAssignmentById( $_GET['id'] );

  //set csrf token
  CSRF::generateToken( 'edit_assignment_form' );

  //make sure post request
  if( $_SERVER["REQUEST_METHOD"] === 'POST' ) {
    $rules = [
      'title' => 'required',
      'content' => 'required',
      'status' => 'required',
      'csrf_token' => 'edit_assignment_form_csrf_token'
    ];
    $error = FormValidation::validate( $_POST, $rules );

    // make sure no error
    if( !$error ) {

      // update user
      Assignment::update(
        $assignment->id,
        $_POST['title'],
        $_POST['content'],
        $_POST['image_url'],
        $_POST['video_url'],
        $_POST['status']
      );

      // remove the csrf token
      CSRF::removeToken( 'edit_assignment_form' );

      //redirect
      header('Location: /manage-assignments');
      exit;

    }

  }

  require dirname(__DIR__) . "/parts/header.php";

?>
  <body>

  <section class="Manage-assignments-edit">

    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Asssignment</h1>
      </div>
      <div class="card mb-2 p-4">
      <?php require dirname( __DIR__ ) . '/parts/error_box.php'; ?>
        <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>" >
          <div class="mb-3">
            <label for="assignment-title" class="form-label">Title</label>
            <input
              type="text"
              class="form-control"
              id="assignment-title"
              name="title"
              value="<?php echo $assignment->title ?>"
            />
          </div>
          <div class="mb-3">
            <label for="assignment-content" class="form-label">Content</label>
            <textarea class="form-control" id="assignment-content" name="content" rows="10"><?php echo $assignment->content ?></textarea>
          </div>
          <div class="mb-3">
            <label for="assignment-image-url" class="form-label">Image URL</label>
            <input type="text" class="form-control" id="assignment-image-url" name="image_url" value="<?php echo $assignment->image_url ?>" />
          </div>
          <div class="mb-3">
            <label for="assignment-video-url" class="form-label">Video URL</label>
            <input type="text" class="form-control" id="assignment-video-url" name="video_url" value="<?php echo $assignment->video_url ?>" />
          </div>
          <div class="mb-3">
            <label for="assignment-content" class="form-label">Status</label>
            <select class="form-control" id="assignment-status" name="status">
              <option value="pending" <?php echo ( $assignment->status == 'pending' ? 'selected' : '' ); ?>>Pending for Review</option>
              <option value="publish" <?php echo ( $assignment->status == 'publish' ? 'selected' : '' ); ?>>Publish</option>
            </select>
          </div>
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
          <input
          type="hidden"
          name="csrf_token"
          value="<?php echo CSRF::getToken( 'edit_assignment_form' ); ?>"
          >
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