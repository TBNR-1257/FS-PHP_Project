<?php 

  //require the header part
  require dirname(__DIR__) . "/parts/header.php";
  
?>

<section class="Backstory" id="Backstory">
      <div class="container">
        <div class="row">
          <div class="title1">
            <h2 class="text-center">Backstory</h2>
          </div>
          <div
            class="d-flex justify-content-center"
            data-aos="flip-up"
            data-aos-duration="2200"
          >
            <img src="assets/img/beatles.jpg" alt="" class="img-fluid" />
          </div>

          <div class="title2">
            <h2 class="text-center">Evolution of Guitars</h2>
          </div>
          <div class="timeline">
            <div class="container left-container">
              <div
                class="text-box"
                data-aos="fade-right"
                data-aos-duration="1000"
              >
                <h2>Baroque Period</h2>
                <small>1600 - 1760</small>
                <p>
                  The Baroque guitar is similar in shape and body to earlier
                  guitars, but is typified by five double courses of strings
                  (which appeared as early as the late fifteenth century). From
                  about 1600 until the mid-eighteenth century, its popularity
                  supplanted both the four-course guitar and the six- or
                  seven-course vihuela.
                </p>
                <span class="left-container-arrow"></span>
              </div>
            </div>

            <div class="container right-container">
              <div
                class="text-box"
                data-aos="fade-left"
                data-aos-duration="1000"
              >
                <h2>Classical Period</h2>
                <small>1730 - 1820</small>
                <p>
                  Classical guitars derive from the Spanish vihuela and gittern
                  of the fifteenth and sixteenth century. Those instruments
                  evolved into the seventeenth and eighteenth-century baroque
                  guitar—and by the mid-nineteenth century, early forms of the
                  modern classical guitar.
                </p>
                <span class="right-container-arrow"></span>
              </div>
            </div>

            <div class="container left-container">
              <div
                class="text-box"
                data-aos="fade-right"
                data-aos-duration="1000"
              >
                <h2>Romantic Period</h2>
                <small>1815 - 1910</small>
                <p>
                  The early romantic guitar, the guitar of the Classical and
                  Romantic period, shows remarkable consistency from 1790 to
                  1830. Guitars had six or more single courses of strings while
                  the Baroque guitar usually had five double courses (though the
                  highest string might be single).
                </p>
                <span class="left-container-arrow"></span>
              </div>
            </div>

            <div class="container right-container">
              <div
                class="text-box"
                data-aos="fade-left"
                data-aos-duration="1000"
              >
                <h2>20th Century Period</h2>
                <small>1911 - Present</small>
                <p>
                  The introduction of electric guitars and improvements to the
                  acoustics were made throughout this period. Pioneering the
                  modern guitars we use up till this date.
                </p>
                <span class="right-container-arrow"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php

  require dirname(__DIR__) . "/parts/footer.php";