<?php

  $assignment = Assignment::getAssignmentByID( $_GET['id'] );

  //make sure post request
  if( $_SERVER["REQUEST_METHOD"] === 'POST' ) {
    $error = FormValidation::validate( $_POST );

    // make sure no error
    if( !$error ) {

      // update assignment
      Assignment::completed(
        $assignment->id,
        $_POST['complete']
      );

      //redirect
      header('Location: /manage-assignments');
      exit;

    }

  }

  require dirname(__DIR__) . "/parts/header.php";

?>

  <body>

  <section class="Assignment">

    <div class="container mx-auto my-5" style="max-width: 700px;">
      <h1 class="h1 mb-4 text-center"><?php echo $assignment->title ?></h1>
      
      <?php

        echo nl2br( $assignment->content );

      ?>

      <div>
        <img src="<?php echo $assignment->image_url ?>" alt="">
      </div>

      <div class="ratio ratio-16x9">
        <iframe src="<?php echo $assignment->video_url ?>" title="YouTube video" allowfullscreen></iframe>
      </div>

      
      <div class="Buttons" >
        <form method="POST" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <?php if( Authentication::isStudent() == 'true') : ?>
          <?php if( $assignment->complete == "0" ) : ?>
          <div class="d-flex justify-content-center" >
            <input type="hidden" name="assignment_id" value="<?php echo $assignment->id ?>" >
            <input type="hidden" name="action" value="completed" >
            <input type="hidden" name="complete" value="1" >
            <button type="submit" class="btn btn-success" >
              Complete
            </button>
          </div>
          <?php elseif( $assignment->complete == "1" ) : ?>
          <div class="d-flex justify-content-center" >
            <input type="hidden" name="assignment_id" value="<?php echo $assignment->id ?>" >
            <input type="hidden" name="action" value="completed" >
            <input type="hidden" name="complete" value="0" >
            <button type="submit" class="btn btn-primary" >
              Reset
            </button>
          </div>
          <?php endif; ?>  
        <?php endif; ?>
        </form>
      </div>
      
      

      <div class="text-center mt-3">
        <a href="/manage-assignments" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back</a
        >
      </div>
    </div>

  </section>

<?php

  require dirname(__DIR__) . "/parts/footer.php";