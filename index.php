<?php
include("./utils/session.php");
  // var_dump($session_role);

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
      <input type="text" placeholder="Where to?" />
    </form>
  </section>

  <ul class="main-nav">
    <li onclick="window.location='./register-host.php'"><button>Become a Host</button></li>
    <li onclick="window.location='./register.php'">Sign Up</li>
    <?php 
      if($session_user != "") {
        echo '<li id="logout">Log out</li>';
      } else {
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
    <input class="search-input" type="text" placeholder="Where to?" />

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
      <option>1 Guest</option>
      <option>2 Guests</option>
      <option>3 Guests</option>
      <option>4 Guests</option>
      <option>5 Guests</option>
      <option>6 Guests</option>
      <option>7 Guests</option>
      <option>8 Guests</option>
      <option>9 Guests</option>
      <option>10 Guests</option>
      <option>11 Guests</option>
      <option>12 Guests</option>
      <option>13 Guests</option>
      <option>14 Guests</option>
      <option>15 Guests</option>
      <option>16+ Guests</option>
    </select>

    <button onclick="window.location = './results.html'" class="search-btn">
      Search
    </button>
  </section>

  <section class="gallery">
    <div class="prices row g-2">
      <h3>Explore top picks</h3>

      <div class="img col-4">
        <img src="https://a2.muscache.com/im/pictures/6152848/b04eddeb_original.jpg?aki_policy=x_medium" />
        <div class="price-stamp">$AUD 158</div>
        <div class="description">
          <h4>Loft Studio in the Central Area</h4>
        </div>
      </div>

      <div class="img col-4">
        <img src="https://a2.muscache.com/im/pictures/34792065/bae84a3f_original.jpg?aki_policy=x_medium" />
        <div class="price-stamp">$AUD 1399</div>
        <div class="description">
          <h4>Everview Suite</h4>
        </div>
      </div>

      <div class="img col-4">
        <img src="https://a2.muscache.com/im/pictures/1faf9a4c-f839-44da-bd37-65ddc928379e.jpg?aki_policy=x_medium" />
        <div class="price-stamp">$AUD 576</div>
        <div class="description">
          <h4>180° View, private pool villa</h4>
        </div>
      </div>
    </div>

    <hr />

    <div class="gallery-places">
      <h3>Explore the world</h3>

      <ul class="places">
        <li class="img-large">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Paris_480x320.jpg" />
          <h4 class="place-names">Paris</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Rome_Piazza017_480x320.jpg" />
          <h4 class="place-names">Rome</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Los_Angeles_480x320.jpg" />
          <h4 class="place-names">Los Angeles</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Lisbon_480x320.jpg" />
          <h4 class="place-names">Lisbon</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Kyoto_480x320.jpg" />
          <h4 class="place-names">Tokyo</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-London_480x320.jpg" />
          <h4 class="place-names">London</h4>
        </li>

        <li class="img-large">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-New_York_480x320.jpg" />
          <h4 class="place-names">New York</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Barcelona_480x320.jpg" />
          <h4 class="place-names">Barcelona</h4>
        </li>

        <li class="img-short">
          <img src="https://a0.muscache.com/airbnb/static/destinations/o-Amsterdam_480x320.jpg" />
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
      $("#login").click(function () {
        window.location = './signin.php';
      })
      $("#logout").click(function () {
        window.location = './signout.php';
      })
    });
  </script>
</footer>