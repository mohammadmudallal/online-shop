<?php
$page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], "/") + 1);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Senior Project</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css" />
    <style>
        #side_nav {
            background-color: #000;
            min-width: 250px;
            max-width: 250px;
            transition: all 0.2s;
        }

        .content {
            min-height: 100vh;
            width: 100%;
        }

        hr.h-color {
            background: #eee;
        }

        .sidebar li.active {
            background: #eee;
            border-radius: 8px;
        }

        .sidebar li.active a,
        .sidebar li.active a:hover {
            color: #000;
        }

        .sidebar li a {
            color: #fff;
        }

        @media(max-width: 767px) {
            #side_nav {
                margin-left: -250px;
                position: fixed;
                min-height: 100vh;
                z-index: 1;
            }

            #side_nav.active {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>

    <div class="main-container d-flex">
        <div class="sidebar bg-secondary" id="side_nav">
            <div class="header-box px-2 pt-3 pb-4 d-flex justify-content-between">
                <h1 class="fs-4"><span class="text-white"> One Stop Shop</span></h1>
                <button class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fa fa-bars"></i></button>
            </div>
            <ul class="list-unstyled px-2">
                <li class="<?= $page == "index.php" ? 'active' : '' ?>"><a href="index.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-home" aria-hidden="true"></i> Home </a></li>
                <li class="<?= $page == "user_orders.php" ? 'active' : '' ?>"><a href="user_orders.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-shopping-cart" aria-hidden="true"></i> My Orders</a></li>
                <li class="<?= $page == "user_profile.php" ? 'active' : '' ?>"><a href="user_profile.php" class="text-decoration-none px-3 py-2 d-block"><i class="fa fa-user" aria-hidden="true"></i> My Profile</a></li>
                
            </ul>
            <hr class="h-color mx-3">
        </div>
        <div class="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbarBlur" navbar-scroll="true">
                <div class="container-fluid py-1 px-3">
                    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="input-group input-group-outline">
                                <?php
                                if (isset($_SESSION['auth'])) {
                                ?>
                                    <a class="navbar-brand" href="#">
                                        <?php
                                        if ($_SESSION['user_type'] == "user")
                                            echo $_SESSION['auth_user']['name'] . "'s Profile";
                                        ?>
                                    </a>
                                <?php
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </nav>