
<nav class="navbar navbar-expand-lg bg-light fixed-top">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="index.php" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif">One<span class="text-warning">Stop</span>Shop</a>
      <ul class="navbar-nav m-auto my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link fw-bold active " href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="#categories">Collections</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto my-2 my-lg-0">
        <li class="nav-item">
          <a class="nav-link fw-bold active" href="cart.php"><i class="fa fa-shopping-cart"></i> Cart
          </a>
          <!-- </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li> -->
          <?php
          if (isset($_SESSION['auth'])) {
          ?>
        <li class="nav-item dropdown">
          <a class="nav-link fw-bold dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php
            if ($_SESSION['user_type'] == "user")
              echo "Hello" . " " . $_SESSION['auth_user']['name'] . "!";
            ?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="wishlistproducts.php"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
            <li><a class="dropdown-item" href="user_profile.php"><i class="fa fa-user-o"></i> Your Profile</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="logout.php"><i class="fa fa-mail-reply"></i> Logout</a></li>
          </ul>
        <?php
          } else {
        ?>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold" href="login.php">Login</a>
        </li>
      <?php
          }
      ?>
      </ul>
    </div>
  </div>
</nav>

<!-- <nav class="navbar navbar-expand-lg bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php"><span class="text-warning">SENIOR</span>PROJECT</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#about">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#services">Services</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#collections">Collections</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart</a>
        </li>

        
        </li>
      </ul>

    </div>
  </div>
</nav> -->