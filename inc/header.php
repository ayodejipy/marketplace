<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $TITLE; ?> - <?php echo $TAGLINE; ?></title>
  <link href="https://fonts.googleapis.com/css?family=Cabin:400,600" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo $BASE_URL ?>assets/styles/style.css">
</head>

<body>
<header id="masthead" class="site-header site-header--layout-2">
  <div class="container">
    <div class="d-lg-flex justify-content-lg-between align-items-lg-center site-header__container">
      <div class="site-header__logo">
        <a href="<?php echo $BASE_URL; ?>">
          <h1 class="screen-reader-text">MarketPlace</h1>
        </a>
      </div>
      <!-- .site-header__logo -->
      <div class="d-lg-flex align-items-lg-center">
        <ul class="min-list main-navigation">
          <li>
            <a href="<?php echo $BASE_URL ?>">Home</a>                 

        </ul><!-- .main-navigation -->

        <div class="user-action">
            <button class="button button--small button--pill button--primary d-none d-lg-inline-block" data-toggle="modal" data-target="#exampleModal">
              &plus; Membership
            </button>
          <a href="login.php" class="sign-in"> <i class="fa fa-user"></i> Sign in</a>
        </div>
      </div>

      <div class="d-lg-none nav-mobile">
        <a href="#" class="nav-toggle js-nav-toggle nav-toggle--dove-gray">
          <span></span>
        </a>
        <!-- .nav-toggle -->
      </div>
      <!-- .nav-mobile -->

    </div>
    <!-- .site-header__container -->

  </div>
  <!-- .container -->

    <!-- Modal -->
    <div class="modal fade modal-membership-modal show" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <div class="modal-content-craftsman">
              <div class="row">

                  <!-- craftsman modal -->
                  <div class="col cst-padding package-craftsman">
                    <a href="registerbusiness.php">
                      <div class="package">
                        <div class="package-header">
                          <img src="https://www.nappy.co/wp-content/uploads/2019/09/7Z8A0091_Output.jpg" alt="craftsman-membership">
                        </div>
                        <div class="package-content">
                          <p>Boost your business</p>
                          <h4>Become an Artisan</h4>
                            
                          <!-- Delimiter-->
                          <div class="delimiter">
                            <span> or </span>
                          </div>
                        </div>
                      </div>
                    </a>
                  </div>

                  <!-- client modal -->
                  <div class="col cst-padding package-client">
                    <a href="registerclient.php">
                      <div class="package">
                        <div class="package-header">
                          <img src="https://images.unsplash.com/photo-1530124566582-a618bc2615dc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80" alt="craftsman-membership">
                        </div>
                        <div class="package-content">
                          <p>Find service professionals</p>
                          <h4>Get a Job Done </h4>
                        </div>
                      </div>
                    </a>
                  </div>

              </div> <!-- Row ends /. -->

          </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Modal /. -->
</header>