<?php 


  require dirname(__DIR__) . "/parts/header.php";

?> 


<section class="News" id="News">
      <div class="container">
        <div class="row">
          <div class="title">
            <u><h2>Latest Updates</h2></u>
          </div>

        <?php foreach( Post::getPublishPosts() as $post ) : ?>
          <div class="col-md-6 col-sm-6">
            <div class="card mb-3" style="max-width: 520px">
              <div class="row g-0">
                <div class="col-md-4">
                  <img
                    src="<?php echo $post->image_url ?>"
                    class="img-fluid rounded-start"
                    alt="..."
                  />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $post->title ?></h5>
                    <p class="card-text"><?php echo substr( $post->content, 0, 200 ); ?></p>
                    <div class="text-end">
                      <a href="/post?id=<?php echo $post->id; ?>" class="btn btn-secondary btn-sm">Read More</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?> 


        </div>
      </div>
    </section>

<?php 

  require dirname(__DIR__) . "/parts/footer.php";