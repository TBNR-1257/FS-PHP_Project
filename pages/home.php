<?php 

  //require the header part
  require dirname(__DIR__) . "/parts/header.php";
  
?>

    <header>
      <div
        id="carouselExampleIndicators"
        class="carousel slide carousel-fade"
        data-bs-ride="true"
      >
        <div class="carousel-indicators">
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="0"
            class="active"
            aria-current="true"
            aria-label="Slide 1"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="1"
            aria-label="Slide 2"
          ></button>
          <button
            type="button"
            data-bs-target="#carouselExampleIndicators"
            data-bs-slide-to="2"
            aria-label="Slide 3"
          ></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img
              src="assets/img/plantstrat.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption-slide1 d-none d-md-block">
              <h4>~Rhythm & Blues~</h4>
              <p>
                A dedicated website to help beginners or early stage guitarists
                get familiar and more skilled with the guitar.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img
              src="assets/img/tealstrat.jpg"
              class="d-block w-100"
              alt="..."
            />
            <div class="carousel-caption-slide2 d-none d-md-block">
              <h5>Pick a Style</h5>
              <p>
                Get to know more behind what makes each guitar shape unique. See
                how much the guitar has evolved over time.
              </p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/img/stagebg.jpg" class="d-block w-100" alt="..." />
            <div class="carousel-caption-slide3 d-none d-md-block">
              <h5>Join our Program!</h5>
              <p>
                Get taught by the best instructors across the globe through our
                learning program. Pick a course on basic guitar playing or music
                theory.
              </p>
            </div>
          </div>
        </div>
        <button
          class="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="prev"
        >
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button
          class="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleIndicators"
          data-bs-slide="next"
        >
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </header>



<?php

  require dirname(__DIR__) . "/parts/footer.php";