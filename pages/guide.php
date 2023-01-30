<?php 

  //require the header part
  require dirname(__DIR__) . "/parts/header.php";
  
?>

<section class="Guide" id="Guide">
      <section class="intro" id="Guide">
        <div class="container">
          <div class="row align-items-center">
            <div class="title">
              <h1><u>Beginners Handbook</u></h1>
            </div>

            <div class="col-lg-7">
              <div data-aos="fade-right" data-aos-duration="2000">
                <p>
                  The guitar is a fretted musical instrument that typically has
                  six strings. It is usually held flat against the player's body
                  and played by strumming or plucking the strings with the
                  dominant hand, while simultaneously pressing selected strings
                  against frets with the fingers of the opposite hand.
                </p>
              </div>
              <div data-aos="fade-right" data-aos-duration="2000">
                <p>
                  There are 3 types of guitars, 2 being the acoustic and
                  electric having 6 thinner strings and the bass that has 4
                  thicker strings. The main difference between the acoustic and
                  electric is that the acoustic produces a more warm, rounded
                  tone while the electric makes clearer and sharper tones
                </p>
              </div>
              <div data-aos="fade-right" data-aos-duration="2000">
                <p>
                  Both have their pros and cons which doesnt make too much of a
                  difference when it comes down to playability and performance.
                  So fret not when it comes to deciding which version you should
                  start with first.
                </p>
              </div>
            </div>
            <div class="col-lg-5" data-aos="fade-left" data-aos-duration="2000">
              <img src="assets/img/stageplay.jpg" class="img-fluid" />
            </div>
          </div>
        </div>
      </section>

      <section class="anatomy">
        <div class="container">
          <div class="row align-items-center">
            <div class="title">
              <h2 class="text-center"><u>The Anatomy of a Guitar</u></h2>
            </div>
            <div
              class="col-md-6 col-sm-6 d-flex justify-content-center"
              data-aos="flip-left"
              data-aos-duration="2000"
            >
              <img src="assets/img/acouslabel.jpg" alt="" class="img-fluid" />
            </div>
            <div
              class="col-md-6 col-sm-6 d-flex justify-content-center"
              data-aos="flip-right"
              data-aos-duration="2000"
            >
              <img src="assets/img/eleclabel.jpg" alt="" class="img-fluid" />
            </div>
          </div>
        </div>
      </section>

      <section class="lesson">
        <div class="container">
          <div class="row align-items-center">
            <div class="title">
              <h2><u>Lessons</u></h2>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="card" style="width: 100%">
                <img
                  src="assets/img/perform.jpg"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Basic Player</h5>
                  <p class="card-text">
                    Learn various types of guitar playing styles such as basic
                    strumming, plucking, and fingerstyle! Choose whether you
                    would like to start with the acoustic or electronic guitar.
                    Play the songs you love!
                  </p>
                  <?php if( isset( $_SESSION['user'] ) ) : ?>
                  <a href="/dashboard" class="btn">Learn More</a>       
                  <?php else : ?>
                  <a href="/login" class="btn">Learn More</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6">
              <div class="card" style="width: 100%">
                <img
                  src="assets/img/theory.jpg"
                  class="card-img-top"
                  alt="..."
                />
                <div class="card-body">
                  <h5 class="card-title">Music Theory</h5>
                  <p class="card-text">
                    A course to help understand the fundamentals in music
                    theory. What makes a chord? How do I transpose a major chord
                    to a minor chord? These questions will be answered in this
                    course!
                  </p>
                  <?php if( isset( $_SESSION['user'] ) ) : ?>
                  <a href="/dashboard" class="btn">Learn More</a>       
                  <?php else : ?>
                  <a href="/login" class="btn">Learn More</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </section>

<?php

  require dirname(__DIR__) . "/parts/footer.php";