<?php
// session Starting initialization
session_start();

// input form php file function

// input php component for the html element
require_once('../assets/php/component.php');

// input php connection and configuration file initialization
require_once('../assets/php/createDatabase.php');

require_once 'loginFunction.php';

try {
  if (isset($_SESSION['admin_name'])) {
    header('location:index.php');
  }
  if (isset($_SESSION['user_name'])) {
    header('location:index.php');
  }
} catch (Exception $e) {
  header('location:index.php');

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>Sign In — HVAR.mall (Hong Kong)</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

  <!-- Style of CSS -->
  <link rel="stylesheet" href="../assets/css/style.css" />

  <!-- Navigation-Bar of CSS -->
  <link rel="stylesheet" href="../assets/css/navigation-bar.css" />

  <!-- Register&Login Body of CSS -->
  <link rel="stylesheet" href="../assets/css/register-and-login.css" />

  <!-- Footer of CSS -->
  <link rel="stylesheet" href="../assets/css/footer.css" />
  <!-- register css lawrence -->
  <link rel="stylesheet" href="../assets/css/register.css" />

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
          <li>
            <a href="../assets/php/logout.php"><i class="logout_icon"></i>Logout</a>
          </li>
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
          <li>
            <a href="../assets/php/logout.php"><i class="logout_icon"></i>Logout</a>
          </li>
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

  <!-- Register & Login -->
  <div class="register-and-login">

    <div class="container-fluid">
      <div class="forms-container">
        <div class="signin-signup">

          <!-- Sign In -->
          <form action="../admin_control/code.php" id="sign-in-form" class="sign-in-form" method="post">
            <?php
            try{  
                if (isset($status)) {
                echo '<span class="error-msg">' . $status . '</span>';
              }
             }  catch (Exception $e) {
              header('location:index.php');
              }
 
            ?>

            <h2 class="title">Sign in to HVAR.mall</h2>

            <div class="input-field">
              <i class="sign-in-link-user"></i>
              <input id="sign-in-username" type="text" name="loginEmail" class="input-sign-in-username" />
              <label for="sign-in-username" class="label-sign-in-username">Email</label>
              <small>Error message</small>
            </div>

            <div class="input-field">
              <i class="sign-in-link-password-lock"></i>
              <input id="sign-in-password" type="password" name="loginPassword" class="input-sign-in-password">
              <label for="sign-in-password" class="label-sign-in-password">Password</label>
              <small>Error message</small>
            </div>

            <div class="remeber-me">
              <input type="checkbox" id="remeber-me" name="remeber-me" class="remember-me-checkbox" value="Remeber">
              <label for="remeber-me">Remeber Me</label>
            </div>

            <a href="../www/forgot.php" class="forgot-password">Forgot HVAR.mall ID or Password ?<i
                class="link-box-arrow-up-right"></i></a>
            <input type="submit" name="login" value="Login" class="btn solid" />
            <p class="social-text">Or Sign In with Social Platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon-facebook"><i class="link-facebook"></i></a>
              <a href="#" class="social-icon-twitter"><i class="link-twitter"></i></a>
              <a href="#" class="social-icon-google"><i class="link-google"></i></a>
              <a href="#" class="social-icon-linkedin"><i class="link-linkedin"></i></a>
            </div>
          </form>

          <!-- Sign Up -->
          <form id="sign-up-form" class="sign-up-form" method="post">
            <?php
            try{
              if (isset($status)) {
                echo '<span class="error-msg">' . $status . '</span>';
              }
            }  catch (Exception $e) {
              header("location: register-and-login.php");
            }

            ?>
            <h2 class="title">Sign up to HVAR.mall</h2>
            <div class="input-field">
              <i class="sign-up-link-user"></i>
              <input id="sign-up-username" name="name" type="text" class="input-sign-up-username" />
              <label for="sign-up-username" class="label-sign-up-username">Username</label>
              <small>Error message</small>
            </div>

            <div class="input-field">
              <i class="sign-up-link-email"></i>
              <input id="sign-up-email" type="email" name="email" class="input-sign-up-email" />
              <label for="sign-up-email" class="label-sign-up-email">Email</label>
              <small>Error message</small>
            </div>

            <div class="input-field">
              <i class="bi bi-phone"></i>
              <input id="sign-up-username" name="phone" placeholder="Phone" type="text" class="input-sign-up-username" />
              <label for="sign-up-username" class="label-sign-up-username"></label>
              <small>Error message</small>
            </div>

            <div class="input-field">
              <i class="sign-up-link-password-lock"></i>
              <i class="uil uil-eye-slash showHidePw"></i>
              <input id="sign-up-password" name="password" type="password" class="input-sign-up-password" />
              <label for="sign-up-password" class="label-sign-up-password">Password</label>
              <small>Error message</small>
            </div>

            <div class="input-field">
              <i class="bi bi-check-circle"></i>
              <input id="sign-up-password" name="confirmPassword" placeholder="Confirm Password" type="password" class="input-sign-up-password" />
              <label for="sign-up-password" class="label-sign-up-password"></label>
              <select hidden type="help" name="user_type">
                <option value="user">user</option>
              </select>
              <small>Error message</small>
            </div>


            <p class="registered-service-rules">People who use our service may have uploaded your contact information to
              Facebook. <a href="#">Learn more.</a></p>
            <p class="registered-contracts">By clicking Sign Up, you agree to our <a href="#">Terms</a>, <a
                href="#">Privacy Policy</a> and <a href="#">Cookies Policy</a>. You may receive SMS notifications from
              us and can opt out at any time.</p>
            <input type="submit" name="addUser" class="btn" value="Sign up" />
            <p class="social-text">Or Sign Up with Social Platforms</p>

            <div class="social-media">
              <a href="#" class="social-icon-facebook"><i class="link-facebook"></i></a>
              <a href="#" class="social-icon-twitter"><i class="link-twitter"></i></a>
              <a href="#" class="social-icon-google"><i class="link-google"></i></a>
              <a href="#" class="social-icon-linkedin"><i class="link-linkedin"></i></a>
            </div>

          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New Account ?</h3>
            <p>
              Welcome to the platform of HVAR.mall.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign Up
            </button>
          </div>

        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Already have an Account ?</h3>
            <p>
              Welcome to use our service again.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign In
            </button>
          </div>

        </div>
      </div>
    </div>

  </div>
  <!-- Register & Login -->


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

  <!-- Control the Effect of the Registration & Login Page -->
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



  <!-- Navigation-Bar of JavaScript -->
  <script src="../assets/js/navigation-bar.js"></script>



  <!-- Register&Login of JavaScript -->
  <script src="../assets/js/register-and-login.js"></script>


  <!-- Register&Login-Function of JavaScript -->

  <script src="../assets/js/register-and-login-function.js"></script>

</body>

</html>