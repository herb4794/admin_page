<?php
// session Starting initialization
session_start();

// input form php file function

// input php component for the html element
require_once('../assets/php/component.php');

// input php connection and configuration file initialization
require_once('../assets/php/createDatabase.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Recover your HVAR.mall ID</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <!-- Website Icon -->
  <link rel="icon" type="image/png" href="../assets/images/logo/HVAR_mall.png" sizes="128x128" />

  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <!-- CSS file -->
  <!-- Bootstrap v5.0.2 of CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Cover Bootstrap v5.0.2 of CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap-cover.css" />

  <!-- Style of CSS -->
  <link rel="stylesheet" href="../assets/css/style.css" />

  <!-- Navigation-Bar of CSS -->
  <link rel="stylesheet" href="../assets/css/navigation-bar.css" />

  <!-- Forgot-ID Body of CSS -->
  <link rel="stylesheet" href="../assets/css/forgot-id.css" />

  <!-- Footer of CSS -->
  <link rel="stylesheet" href="../assets/css/footer.css" />

  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

</head>

<body>

  <!-- Header of Navigation-Bar -->
  <header>

    <div class="nav-container">
      <!-- Start of Navigation Menu Items -->
      <nav>

        <!-- Navigation Menu Items of Mobile -->
        <ul class="mobile-nav">
          <li><a href="#" class="link-bag"></a></li>
          <li>
            <a href="./index.php">
              <img src="../assets/images/navigation-bar/corporation-logo/HVAR_mall.png">
            </a>
          </li>
          <li>
            <div class="menu-icon-container">
              <div class="menu-icon">
                <span class="line-top"></span>
                <span class="line-bottom"></span>
              </div>
            </div>
          </li>
        </ul>

        <!-- Navigation Menu Items of Desktop -->
        <ul class="desktop-nav">
          <li>
            <a href="./index.php" class="desktop-logo">
              <img src="../assets/images/navigation-bar/corporation-logo/HVAR_mall.png">
            </a>
          </li>

          <!-- The Mobile Version Will Use The Following Items -->
          <li><a href="../www/best-sellers.php" class="">Best Sellers</a></li>
          <li><a href="../www/todays-deals.php" class="">Today's Deals</a></li>
          <li><a href="../www/new-releases.php" class="">New Releases</a></li>
          <li><a href="../www/gifts-and-coupons.php" class="">Gifts & Coupons</a></li>
          <li><a href="../www/support.php" class="">Support</a></li>
          <li><a class="link-search"></a></li>
          <li><a class="link-bag"></a></li>
          <li class="desktop-login">
            <a href="../www/register-and-login.php" class="link-user">
              <span class="userStatus">
              <?php
                if (isset($_SESSION['user_name'])) {
                  echo $_SESSION['user_name'];
                  // $_SESSION['status'] . function_alert("You have login ! Please logout first");
                } else if (isset($_SESSION['admin_name'])) {
                  echo $_SESSION['admin_name'];
                  // $_SESSION['status'] . function_alert("You have login ! Please logout first");
                } else
                ?>
              </span>
            </a>
          </li>

          <!-- This Login Option Is Only Available In The Mobile Version -->
          <li class="mobile-login"><a href="../www/register-and-login.php" class=""><i class="link-user"></i>Account</a>
          </li>

        </ul>
      </nav>
      <!-- End of Navigation Menu Items -->

      <!-- Start of Search Container -->
      <!-- Desktop Search Container -->
      <div class="search-container hide">
        <div class="link-search"></div>
        <div class="search-bar">
          <form div="search-container-form" action="">
            <input type="text" placeholder="Search" id="desktop-searchTxt">
          </form>
          <div class="link-close" onclick="document.getElementById('desktop-searchTxt').value = ''"></div>

          <div class="recent-search">
            <h2>Recent Search</h2>
            <ul>
              <li>
                <a href="#">Test 1</a>
              </li>
              <li>
                <a href="#">Test 2</a>
              </li>
              <li>
                <a href="#">Test 3</a>
              </li>
              <li>
                <a href="#">Test 4</a>
              </li>
              <li>
                <a href="#">Test 5</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Mobile Search Container -->
      <div class="mobile-search-container active">
        <div class="link-search"></div>
        <div class="search-bar">
          <form div="search-container-form" action="">
            <input type="text" placeholder="Search" id="mobile-searchTxt">
          </form>
          <span class="cancel-btn" onclick="document.getElementById('mobile-searchTxt').value = ''">Cancel</span>

          <div class="recent-search">
            <h2>Recent Search</h2>
            <ul>
              <li>
                <a href="#">Test 1</a>
              </li>
              <li>
                <a href="#">Test 2</a>
              </li>
              <li>
                <a href="#">Test 3</a>
              </li>
              <li>
                <a href="#">Test 4</a>
              </li>
              <li>
                <a href="#">Test 5</a>
              </li>
            </ul>
          </div>
        </div>
      </div>

    </div>

    <div class="search-container-overlay" onclick="document.getElementById('desktop-searchTxt').value = ''"></div>
    <!-- End of Search Container -->

    <!-- Start of Shopping-Bag Container -->
    <!--using PHP  coding by the Lawrence coding  -->
    <!-- Desktop Shopping-Bag Container -->
    <div class="shopping-bag-view hide">
      <div class="shopping-bag-container">
        <h2>
          <?php
          if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            echo "<span id=\"cart_count\">$count product in your Bag</span>";

          } else {
            echo "<span id=\"cart_count\">You Bag is Empty</span>";
          }
          ?>
        </h2>
        <ul>
          <li>
            <a href="../www/shopping-bag.php"><i class="bag-icon"></i>Bag</a>
          </li>
          <li>
            <a href="#"><i class="book-mark-icon"></i>Saved Items</a>
          </li>
          <li>
            <a href="../www/cart.php"><i class="packet-icon"></i>Orders</a>
          </li>
          <?php 
            if(isset($_SESSION["admin_name"]) || isset($_SESSION['user_name'])){
              echo'<li><a href="../assets/php/logout.php"><i class="logout_icon"></i>Logout</a></li>';
            }
            ?>
          <?php
            if (isset($_SESSION['admin_name'])) {
              echo '<li><a href="../admin_control/admin_page.php"><i class="logout_icon"></i>admin</a></li>';
            }
            ?>
        </ul>
      </div>
    </div>


    <!-- Mobile Shopping-Bag Container -->
    <div class="mobile-shopping-bag-view hide">
      <div class="mobile-shopping-bag-container">
        <h2>
          <?php
          if (isset($_SESSION['cart'])) {
            $count = count($_SESSION['cart']);
            echo "<span id=\"cart_count\">You Bag is $count</span>";
          } else {
            echo "<span id=\"cart_count\">You Bag is Empty</span>";
          }
          ?>
        </h2>
        <ul>
          <li>
            <a href="../www/shopping-bag.php"><i class="bag-icon"></i>Bag</a>
          </li>
          <li>
            <a href="#"><i class="book-mark-icon"></i>Saved Items</a>
          </li>
          <li>
            <a href="../www/cart.php"><i class="packet-icon"></i>Orders</a>
          </li>
          <?php 
            if(isset($_SESSION["admin_name"]) || isset($_SESSION['user_name'])){
              echo'<li><a href="../assets/php/logout.php"><i class="logout_icon"></i>Logout</a></li>';
            }
            ?>
          <?php
            if (isset($_SESSION['admin_name'])) {
              echo '<li><a href="../admin_control/admin_page.php"><i class="logout_icon"></i>admin</a></li>';
            }
            ?>
        </ul>
      </div>


    </div>

    </div>

    <div class="search-container-overlay" onclick="document.getElementById('desktop-searchTxt').value = ''"></div>
    <!-- End of Search Container -->
  </header>
  <!-- Header of Navigation-Bar -->

  <!-- Body of Forgot-ID -->
  <div class="forgot-id">
    <div class="forgot-id-container">

      <h2>HVAR.mall ID</h2>

      <form action="#" class="forgot-id-container-form">

        <h1>Please enter your information below to find your <br /> HVAR.mall ID</h1>

        <div class="input-field lastname">
          <input id="forgot-id-lastname" type="text" class="input-forgot-id-lastname" value="" />
          <label for="forgot-id-lastname" class="label-forgot-id-lastname">Last Name</label>
        </div>

        <div class="input-field firstname">
          <input id="forgot-id-firstname" type="text" class="input-forgot-id-firstname" value="" />
          <label for="forgot-id-firstname" class="label-forgot-id-firstname">First Name</label>
        </div>

        <div class="input-field email">
          <input id="forgot-id-email" type="email" class="input-forgot-id-email" value="" />
          <label for="forgot-id-email" class="label-forgot-id-email">Email Address</label>
        </div>

        <input id="forgot-id-continue-btn" type="button" value="Continue" class="forgot-id-continue-btn active">

      </form>

    </div>
  </div>
  <!-- Body of Forgot-ID -->

  <!-- Footer -->
  <footer>
    <div class="container-fluid">
      <div class="row justify-content-around">

        <div class="col">
          <h4>Cooperation Opportunities</h4>
          <ul>
            <li><a href="#">Set up shop at HVAR.mall</a></li>
            <li><a href="#">Fulfillment by HVAR</a></li>
            <li><a href="#">Seller Fulfilled Prime</a></li>
            <li><a href="#">HVAR Pay</a></li>
            <li><a href="#">Become an Affiliate</a></li>
            <li><a href="#">Advertise Your Products</a></li>
          </ul>
        </div>

        <div class="col">
          <h4>HVAR Payment Products</h4>
          <ul>
            <li><a href="#">HVAR Point</a></li>
            <li><a href="#">HVAR Gift Cards</a></li>
            <li><a href="#">HVAR Mastercard</a></li>
            <li><a href="#">HVAR Card Marketplace</a></li>
            <li><a href="#">HVAR Point Program</a></li>
            <li><a href="#">HVAR Your Balance</a></li>
          </ul>
        </div>

        <div class="col">
          <h4>Support</h4>
          <ul>
            <li><a href="#">HVAR and COVID-19</a></li>
            <li><a href="#">Shopping Rates & Policies</a></li>
            <li><a href="#">HVAR Prime</a></li>
            <li><a href="#">Returns Are Easy</a></li>
            <li><a href="#">Manage Your Content and Devices</a></li>
            <li><a href="#">HVAR Assistant</a></li>
            <li><a href="#">Help</a></li>
          </ul>
        </div>

      </div>


      <div class="row justify-content-around">

        <div class="col">
          <h4>About Us</h4>
          <ul>
            <li><a href="#">About HVAR</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Press Center</a></li>
            <li><a href="#">Community Impact</a></li>
            <li><a href="#">HVAR Global</a></li>
          </ul>
        </div>

        <div class="col">
          <h4>Get our App</h4>
          <p>From App Store or Google Play</p>

          <div class="app-img">
            <img src="../assets/images/footer/tools/apple-store.jpg" alt="">
            <img src="../assets/images/footer/tools/google-play.jpg" alt="">
          </div>

        </div>

        <div class="col">
          <h4>Supported Payment Options</h4>
          <div class="payment-img">
            <img src="../assets/images/footer/tools/payment.png" alt="">
          </div>
        </div>

      </div>

      <!-- Copyright -->
      <div class="copyrightText">
        <p>Copyright © 2022 HVAR Inc. All rights reserved.</p>
      </div>

  </footer>
  <!-- Footer -->

  <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <!-- Control the Effect of the Index Page -->
  <!-- Bootstrap v5.0.2 - Bundle of JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- Bootstrap v5.0.2 - Separate of JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>

  <!-- Main of JavaScript -->
  <script src="../assets/js/main.js"></script>

  <!-- Navigation-Bar of JavaScript -->
  <script src="../assets/js/navigation-bar.js"></script>

  <!-- Forgot-ID of JavaScript -->
  <script src="../assets/js/forgot-id.js"></script>

</body>

</html>