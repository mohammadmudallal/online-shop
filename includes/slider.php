<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/slider_1.jpg" height="750px" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h5>Your Absolute Wonderful Shopping Experience</h5>
        <?php
        if ($page == "index.php") {
        ?>
          <p><a href="about_us_page.php" class="btn btn-warning mt-3">Learn More</a></p>
        <?php
        }
        ?>
      </div>
    </div>
    <div class="carousel-item">
      <img src="assets/images/ecommerce1.jpg" height="650px" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h5>Your Absolute Wonderful Shopping Experience</h5>
        <?php
        if ($page == "index.php") {
        ?>
          <p><a href="about_us_page.php" class="btn btn-warning mt-3">Learn More</a></p>
        <?php
        }
        ?>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>