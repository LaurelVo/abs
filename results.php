<?php
include("./utils/session.php");
//include the file db_conn.php
include("./utils/db_conn.php");

?>

<head>
  <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous"
  />
  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
  ></script>

  <link rel="stylesheet" href="./styles/results.css" />
</head>
<header>
  <ul class="main-nav">
    <li onclick="window.location='./index.php';">Home</li>
    <li><button>Become a Host</button></li>
    <li onclick="window.location='./register.php'">Sign Up</li>
    <li onclick="window.location='./signin.php'">Log In</li>
  </ul>
</header>

<main class="site-content">
  <h2 class="title">
    <span>Go there.</span> Book unique homes <br />and experience like a local.
  </h2>

  <section class="gallery">
    <div class="prices row g-2">
      <h3>Search results</h3>

      <?php
        $city = $_GET['city'];
        $guests = $_GET['guests'];
        $guests = $_GET['guests'];
        $from = $_GET['start_date'];
        $to = $_GET['end_date'];

        $sql= '';
        $output = '';
        if ($from == '' && $to == '') {
          $sql = 'SELECT * FROM accommodations WHERE city LIKE "%' .$city. '%" AND max_guests >' . $guests;
        } else {
          if ($from == '') {
            $sql = 'SELECT * FROM accommodations WHERE city LIKE "%' .$city. '%" AND max_guests >' . $guests . ' AND DATE_FORMAT("' . $to . '", "%Y-%l-%d") <= DATE_FORMAT(available_to, "%Y-%l-%d")';
          }
          if ($to == '') {
            $sql = 'SELECT * FROM accommodations WHERE city LIKE "%' .$city. '%" AND max_guests >' . $guests . ' AND DATE_FORMAT("' . $from . '", "%Y-%l-%d") >= DATE_FORMAT(available_from, "%Y-%l-%d")';
          }
        }

       

        if ($from && $to) {
          $sql = 'SELECT * FROM accommodations WHERE city LIKE "%' .$city. '%" AND max_guests >' . $guests . ' AND DATE_FORMAT("' . $from . '", "%Y-%l-%d") >= DATE_FORMAT(available_from, "%Y-%l-%d") AND DATE_FORMAT("' . $to . '", "%Y-%l-%d") <= DATE_FORMAT(available_to, "%Y-%l-%d")';
        }
        
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


      <h3 style="margin-top: 50px;">Checkout other locations as well!</h3>
      <div class="img col-4">
        <img
          src="https://source.unsplash.com/featured/1200x900/?sculpture,hotel"
        />
        <div class="price-stamp">$AUD 158</div>
        <div class="description">
          <h4>Loft Studio in the Central Area</h4>
        </div>
      </div>

      <div class="img col-4">
        <img
          src="https://source.unsplash.com/featured/1200x900/?architecture,hotel"
        />
        <div class="price-stamp">$AUD 1399</div>
        <div class="description">
          <h4>Everview Suite</h4>
        </div>
      </div>

      <div class="img col-4">
        <img
          src="https://source.unsplash.com/featured/1200x900/?hotel-room,hotel"
        />
        <div class="price-stamp">$AUD 576</div>
        <div class="description">
          <h4>180° View, private pool villa</h4>
        </div>
      </div>
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
</footer>
