<?php

  $post = Post::getPostByID( $_GET['id'] );

  require dirname(__DIR__) . "/parts/header.php";

?>

  <body>

  <section class="Post">

    <div class="container mx-auto my-5" style="max-width: 650px;">
      <h1 class="h1 mb-4 text-center"><?php echo $post->title ?></h1>
      <p>
        <?php echo nl2br( $post->content ); ?>
      </p>
      
      <div class="Image d-flex justify-content-center" >
        <img src="<?php echo $post->image_url ?>" class="img-fluid rounded">
      </div>

      <div class="Video ratio ratio-16x9">
        <iframe src="<?php echo $post->video_url ?>" title="YouTube video" allowfullscreen></iframe>
      </div>

      <div class="text-center mt-3">
        <a href="/news" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back</a
        >
      </div>
    </div>

  </section>

<?php

  require dirname(__DIR__) . "/parts/footer.php";