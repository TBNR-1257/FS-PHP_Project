<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Rhythm & Blues</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="assets/CSS/style.css" />
  </head>
  
  <body>
    <nav class="navbar fixed-top navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="/home"
          ><i class="bi bi-soundwave"></i> Rhythm & Blues</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <a class="nav-link active" aria-current="page" href="/home">Home</a>
            <a class="nav-link" href="/news">News</a>
            <a class="nav-link" href="/guide">Guide</a>
            <a class="nav-link" href="/backstory">Backstory</a> 
            <a class="nav-link" href="/about">About</a>
            <?php if( isset( $_SESSION['user'] ) ) : ?>
            <a class="nav-link" href="/dashboard">Dashboard</a>  
            <a class="nav-link" href="/logout">Logout</a>
            <?php else : ?>
            <a class="nav-link" href="/login">Login/SignUp</a>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </nav>