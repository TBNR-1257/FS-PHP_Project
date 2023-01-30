<?php
  // check if user has a role or not
  if( !Authentication::whoCanAccess('student') ) {
    header('Location: /login');
    exit;
  }

  require dirname(__DIR__) . "/parts/header.php";
?>
  <body>

  <section class="Dashboard" id="Dashboard" >

    <div class="container mx-auto my-5" style="max-width: 800px;">
      <h1 class="h1 mb-4 text-center">Dashboard</h1>
      <div class="row">
        <?php if ( Authentication::whoCanAccess('editor') ) : ?>
        <div class="col">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-music-note-list" style="font-size: 3rem;"></i>
                </div>
                Manage Posts
              </h5>
              <div class="text-center mt-3">
                <a href="/manage-posts" class="btn btn-primary btn-sm"
                  >Access</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
        <div class="col">
          <div class="card mb-2">
            <div class="card-body">
            <?php if( Authentication::isStudent() == 'true' ) : ?> 
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                </div>
                Assignments 
              </h5>
            <?php else : ?>
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                </div>
                Manage Assignments 
              </h5>
            <?php endif; ?>
              
              <div class="text-center mt-3">
                <a href="/manage-assignments" class="btn btn-primary btn-sm"
                  >Access</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php if ( Authentication::whoCanAccess('admin') ) : ?>
        <div class="col">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-people" style="font-size: 3rem;"></i>
                </div>
                Manage Users
              </h5>
              <div class="text-center mt-3">
                <a href="/manage-users" class="btn btn-primary btn-sm"
                  >Access</a
                >
              </div>
            </div>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <div class="mt-4 text-center">
        <a href="/home" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back</a
        >
      </div>
    </div>

  </section>

<?php

  require dirname(__DIR__) . "/parts/footer.php";