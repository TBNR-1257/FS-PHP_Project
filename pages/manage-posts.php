<?php

  if( !Authentication::whoCanAccess('editor') ) {
    header('Location: /login');
    exit;
  }
  
  // step 1: set csrf token
  CSRF::generateToken( 'delete_post_form' );

  // step 2: make sure post request
  if( $_SERVER["REQUEST_METHOD"] === 'POST' ) {

    // step 3 do error check
    $error = FormValidation::validate(
      $_POST,
      [
        'post_id' => 'required',
        'csrf_token' => 'delete_post_form_csrf_token'
      ]
    );
    
    // make sure there is no error
    if( !$error ) {

      // step 4: delete post
      Post::delete( $_POST['post_id'] );

      // step 5: remove the CSRF token
      CSRF::removeToken( 'delete_post_form' );
      
      // step 6: redirect to manage users page
      header("Location: /manage-posts");
      exit;

    }

  }

  require dirname(__DIR__) . "/parts/header.php";
  
?>
  <body>

  <section class="Manage-posts">

    <div class="container mx-auto my-5" style="max-width: 700px;">
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Posts</h1>
        <div class="text-end">
          <a href="/manage-posts-add" class="btn btn-primary btn-sm"
            >Add New Post</a
          >
        </div>
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
            <?php foreach( Post::getAllPosts() as $key => $post ) : ?>
            <tr>
              <th scope="row"><?php echo $key+1 ?></th>
              <td><?php echo $post->title ?></td>
              <td>
              <?php
                  switch( $post->status ) {
                    case 'pending':
                      echo '<span class="badge bg-dark">' . $post->status .'</span>';
                      break;
                    case 'publish':
                      echo '<span class="badge bg-info">' . $post->status .'</span>';
                      break;
                  }
              ?>
              </td>
              <td class="text-end">
                <div class="buttons">
                  <a
                    href="/post?id=<?php echo $post->id; ?>"
                    target="_blank"
                    class="btn btn-primary btn-sm me-2"
                    ><i class="bi bi-eye"></i
                  ></a>
                  <a
                    href="/manage-posts-edit?id=<?php echo $post->id; ?>"
                    class="btn btn-secondary btn-sm me-2"
                    ><i class="bi bi-pencil"></i
                  ></a>
                  <!-- delete button start -->
                  <!-- Button trigger modal -->
                  <button
                  type="button"
                  class="btn btn-danger btn-sm"
                  data-bs-toggle="modal"
                  data-bs-target="#post-<?php echo $post->id; ?>"
                  >
                      <i class="bi bi-trash"></i>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="post-<?php echo $post->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Post?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-start">
                          Are you sure you want to delete this post (<?php echo $post->title ?>) ?
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
                            <input type="hidden" name="post_id" value="<?php echo $post->id; ?>" />
                            <input type="hidden" name="csrf_token" value="<?php echo CSRF::getToken( 'delete_post_form' ); ?>" >
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- delete button end -->
                  </a>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="/dashboard" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back To Dashboard</a
        >
      </div>
    </div>

  </section>

<?php

  require dirname(__DIR__) . "/parts/footer.php";