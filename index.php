<?php
include("./utils/session.php");
//include the file db_conn.php
include("./utils/db_conn.php");

?>

<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
  </script>

  <link rel="stylesheet" href="./styles/booking.css" />
</head>
<header>
  <section class="search-bar">
    <svg class="search-icon" fill="#000000" height="24" viewBox="0 0 24 24" width="24"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
      <path d="M0 0h24v24H0z" fill="none" />
    </svg>

    <form class="search-form">
      <input class="top-search" type="text" placeholder="Where to? Enter a city" />
    </form>
  </section>

  <ul class="main-nav">
    <!-- <li onclick="window.location='./register-host.php'"><button>Become a Host</button></li> -->
    <!-- <li onclick="window.location='./register.php'">Sign Up</li> -->
    <?php 
      if ($session_role == 3) {
        echo '<li id="manager">Manager</li>';
      }
      if($session_user != "") {
        echo '<li id="logout">Log out</li>';
      } else {
        echo '<li id="register-host"><button>Become a Host</button></li>';
        echo '<li id="signup">Sign Up</li>';
        echo '<li id="login">Log in</li>';
      }
      
    ?>

  </ul>
</header>

<main class="site-content">
  <h2 class="title">
    <span>Go there.</span> Book unique homes <br />and experience like a local.
  </h2>

  <section class="search-row">
    <input class="search-input" type="text" placeholder="Where to? Enter a city" />

    <div class="checks-input">
      <label>Check in</label>
      <input class="check-in" type="date" placeholder="Check In" />

      <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 0 24 24"
        width="24">
        <path d="M0 0h24v24H0z" fill="none" />
        <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
      </svg>
      <label>Check out</label>
      <input class="check-out" type="date" placeholder="Check Out" />
    </div>

    <select class="guests">
      <option value="1">1 Guest</option>
      <option value="2">2 Guests</option>
      <option value="3">3 Guests</option>
      <option value="4">4 Guests</option>
      <option value="5">5 Guests</option>
      <option value="6">6 Guests</option>
      <option value="7">7 Guests</option>
      <option value="8">8 Guests</option>
      <option value="9">9 Guests</option>
      <option value="10">10 Guests</option>
      <option value="11">11 Guests</option>
      <option value="12">12 Guests</option>
      <option value="13">13 Guests</option>
      <option value="14">14 Guests</option>
      <option value="15">15 Guests</option>
      <option value="16">16+ Guests</option>
    </select>

    <button class="search-btn">
      Search
    </button>
  </section>

  <section class="gallery">
    <div class="prices row g-2">
      <h3>Explore top picks</h3>

      <?php
        $output = '';
        $sql = "SELECT * FROM accommodations ORDER BY id ASC";
        $result = mysqli_query($connect, $sql);  

        while($row = mysqli_fetch_array($result)) { 
          
          $output .= '<a href="single.php?id=' . $row['id'] . '" class="img col-4 accommodation">';
            $output .= '<img src="' . $row['image_url'] . '" />';
            $output .= '<div class="price-stamp">$AUD' . $row['price_per_night'] . '</div>';
            $output .= '<div class="description">';
              $output .= '<h4>' . $row['description'] . '</h4>';
            $output .= '</div>';
          $output .= '</a>';
        }
        echo $output;
      ?>

    </div>

    <hr />

    <div class="gallery-places">
      <h3>Explore the world</h3>

      <ul class="places">
        <li class="img-large">
          <img src="https://source.unsplash.com/featured/1200x900/?paris" />
          <h4 class="place-names">Paris</h4>
        </li>

        <li class="img-short">
          <img src="https://source.unsplash.com/featured/1200x900/?restaurant" />
          <h4 class="place-names">Rome</h4>
        </li>

        <li class="img-short">
          <img src="https://source.unsplash.com/featured/1200x900/?hotel-room,hotel" />
          <h4 class="place-names">Los Angeles</h4>
        </li>

        <li class="img-short">
          <img src="https://source.unsplash.com/featured/1200x900/?city" />
          <h4 class="place-names">Lisbon</h4>
        </li>

        <li class="img-short">
          <img src="https://source.unsplash.com/featured/1200x900/?chill" />
          <h4 class="place-names">Tokyo</h4>
        </li>

        <li class="img-short">
          <img src="https://source.unsplash.com/featured/1200x900/?architecture,hotel" />
          <h4 class="place-names">London</h4>
        </li>

        <li class="img-large">
          <img src="https://source.unsplash.com/featured/1200x900/?new-york" />
          <h4 class="place-names">New York</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Barcelona_480x320.jpg" />
          <h4 class="place-names">Barcelona</h4>
        </li>

        <li class="img-short">
          <img src="https://source.unsplash.com/featured/1200x900/?sculpture,hotel" />
          <h4 class="place-names">Amsterdam</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Berlin_480x320.jpg" />
          <h4 class="place-names">Berlin</h4>
        </li>
      </ul>
    </div>
  </section>
</main>

<footer>
  <div class="footer-content">
    <div class="footer-row">
      <section class="selectors">
        <select class="language-selector">
          <option>Australia</option>
          <option>America</option>
        </select>

        <select class="currency-selector">
          <option>USD</option>
          <option>AUD</option>
        </select>
      </section>

      <section class="lists">
        <ul>
          <h3>Company</h3>

          <li>Policies</li>
          <li>Disaster Response</li>
          <li>Terms & Privacy</li>
        </ul>

        <ul>
          <h3>Discover</h3>
          <li>Business Travel</li>
          <li>Site Map</li>
        </ul>

        <ul>
          <h3>Hosting</h3>

          <li>Home Safety</li>
          <li>Instant Book</li>
        </ul>
      </section>
    </div>

    <hr />

    <div class="copyright">&copy; ABS, Inc.</div>
  </div>
  <script>
    $(document).ready(function () {
      $(".search-btn").click(function () {
        var city = $(".search-input").val() || $(".top-search").val();
        var guests = $('.guests').val();
        
        if (!city) {
          alert('Please input city');
          return false;
        }
        var string = `./results.php?city=${city}`;
        if (guests) {
          string += `&guests=${guests}`;
        }
        window.location = string;
      })
      $("#login").click(function () {
        window.location = './signin.php';
      })
      $("#logout").click(function () {
        window.location = './signout.php';
      })
      $("#register-host").click(function () {
        window.location = './register-host.php';
      })
      $("#signup").click(function () {
        window.location = './register.php';
      })
      $("#manager").click(function () {
        window.location = './manager-dashboard/manager-dashboard.php';
      })
    });
  </script>
</footer>