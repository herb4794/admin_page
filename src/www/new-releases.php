<?php
// session Starting initialization
// session Starting initialization
session_start();

// input form php file function

// input php component for the html element
require_once '../assets/php/component.php';

// input php connection and configuration file initialization
require_once '../assets/php/createDatabase.php';

include 'addProductToCart.php';

// initialization for the database connect
// this coding is using php createDatabase class of create new DB function
$database = new createDatabase("product_database", "product_table");

if (isset($_POST['add'])) {
  addToCart();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>New Releases — HVAR.mall (Hong Kong)</title>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

  <!-- Website Icon -->
  <link rel="icon" type="image/png" href="#" sizes="128x128" />

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

  <!-- New Releases of CSS -->
  <link rel="stylesheet" href="../assets/css/new-releases.css" />

  <!-- Products of CSS -->
  <link rel="stylesheet" href="../assets/css/products.css" />

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

  <!-- Body of New Releases -->

  <!-- New Releases Title -->
  <div class="pages-title">

    <h2 class="pages-header">New Releases</h2>
    <p class="pages-hints">View our terms and conditions for deals <a href="#">here</a>. View
      our <a href="#">help page</a>, and each product page for details of price conditions.</p>

  </div>
  <!-- New Releases Title -->

  <div class="new-releases-side-menu-container container-fluid">
    <div class="row justify-content-around">
      <div class="new-releases-side-menu col-2">

        <h1 class="new-releases-side-menu-header">All Categories</h1>

        <div class="new-releases-side-menu-categories">
          <a href="#" class="">Apps & Games</a><br />
          <a href="#" class="">Audible Books & Originals</a><br />
          <a href="#" class="">Automotive</a><br />
          <a href="#" class="">Baby</a><br />
          <a href="#" class="">Beauty</a><br />
          <a href="#" class="">Clothing & Accessories</a><br />
          <a href="#" class="">Clothing, Shoes & Jewelry</a><br />
          <a href="#" class="">Computers</a><br />
          <a href="#" class="">Digital Music</a><br />
          <a href="#" class="">DIY, Tools & Garden</a><br />
          <a href="#" class="">DVD</a><br />
          <a href="#" class="">Electronics</a><br />
          <a href="#" class="">Food, Beverages & Alcohol</a><br />
          <a href="#" class="">Foreign Language Books</a><br />
          <a href="#" class="">Gift Cards</a><br />
          <a href="#" class="">Health & Personal Care</a><br />
          <a href="#" class="">Hobbies</a><br />
          <a href="#" class="">Home & Kitchen</a><br />
          <a href="#" class="">Industrial & Scientific</a><br />
          <a href="#" class="">Japanese Books</a><br />
          <a href="#" class="">Jewelry</a><br />
          <a href="#" class="">Kindle Store</a><br />
          <a href="#" class="">Large Appliances</a><br />
          <a href="#" class="">Music</a><br />
          <a href="#" class="">Musical Instruments</a><br />
          <a href="#" class="">Office Products</a><br />
          <a href="#" class="">Pet Supplies</a><br />
          <a href="#" class="">Prime Video</a><br />
          <a href="#" class="">Shoes & Bags</a><br />
          <a href="#" class="">Software</a><br />
          <a href="#" class="">Sports & Outdoors</a><br />
          <a href="#" class="">Toys & Games</a><br />
          <a href="#" class="">Video Games</a><br />
          <a href="#" class="">Wrist Watches</a><br />
        </div>
      </div>

      <div class="container-fluid col">
        <div class="row justify-content-around">

          <!-- Test Product 1 -->
          <?php
          $result = $database->getData();
          while ($row = $result->fetch()) {
            productComponent($row['product_name'], $row['product_price'], $row['product_description'], $row['product_image'], $row['id'], $row['product_discount'], );
          }
          ?>

        </div>
      </div>

    </div>
  </div>
  <!-- Body of New Releases -->

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

  <!-- Products of JavaScript -->
  <script src="../assets/js/products.js"></script>