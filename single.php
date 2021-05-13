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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <link rel="stylesheet" href="./styles/booking.css" />
  <link rel="stylesheet" href="./styles/single.css" />
</head>
<header>
  <section class="search-bar">
    <a style="color: black; font-size: 20px; text-decoration: none;" href="./index.php">Home</a>
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
    <span>Like it?</span> Book this unique homes.
  </h2>

  <section class="gallery">
    <div class="content">
      <?php
        $id = $_GET['id'];
        $output = '';
        $sql = "SELECT * FROM accommodations WHERE id=$id";
        $result = mysqli_query($connect, $sql);

        while($row = mysqli_fetch_array($result)) { 
          $max_guests = $row['max_guests'];
          $price_per_night = $row['price_per_night'];
          $available_to = $row['available_to'];
          
          $output .= '<div class="img col-12 single-accommodation">';
            $output .= '<img src="' . $row['image_url'] . '" />';
            $output .= '<div class="description">';
              $output .= '<h1>' . $row['description'] . '</1>';
            $output .= '</div>';
          $output .= '</div>';
          $output .= '<h5 class="address">' . $row['address'] . '</h5>';
          $output .= '<div class="info">';
            $output .= '<svg width="24" height="24" class="domain-icon property-feature__icon css-gsqvet" viewBox="0 0 24 24" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="2" d="M4.00002 19.00001v2M20.00002 19.00001v2M8 11h8a5 5 0 0 1 5 5v3H3v-3a5 5 0 0 1 5-5z"></path><path d="M6.5 11V9A1.5 1.5 0 0 1 8 7.5h2A1.5 1.5 0 0 1 11.5 9v1M12.5 10V9A1.5 1.5 0 0 1 14 7.5h2A1.5 1.5 0 0 1 17.5 9v2" fill="none" stroke="currentColor"></path><path d="M20 13V5a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8" fill="none" stroke="currentColor" stroke-width="2"></path><path fill="none" stroke="currentColor" d="M3.5 15.5h17"></path>
            </svg>';
            $output .= '<span>' . $row['total_rooms'] .'</span>';
            $output .= '<svg width="24" height="24" class="domain-icon property-feature__icon css-gsqvet" viewBox="0 0 24 24" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="2" d="M6 19v2M18 19v2"></path><g fill="currentColor"><circle cx="15.5" cy="8.5" r=".5"></circle><circle cx="13.5" cy="8.5" r=".5"></circle><circle cx="11.5" cy="8.5" r=".5"></circle><circle cx="13.5" cy="6.5" r=".5"></circle><circle cx="13.5" cy="10.5" r=".5"></circle><circle cx="11.5" cy="10.5" r=".5"></circle><circle cx="17.5" cy="10.5" r=".5"></circle><circle cx="15.5" cy="10.5" r=".5"></circle></g><g fill="none" stroke="currentColor" stroke-width="2"><path d="M4 13h16v2a5 5 0 0 1-5 5H9a5 5 0 0 1-5-5v-2zM4 12V7a3 3 0 0 1 3-3h1"></path><path d="M8 6.3V4a1 1 0 0 1 1-1h2.3a.7.7 0 0 1 .5 1.2L9.2 6.8A.7.7 0 0 1 8 6.3zM3 13h18"></path></g></svg>';
            $output .= '<span>' . $row['total_bathrooms'] .'</span>';
            $output .= '<svg width="24" height="24" class="domain-icon property-feature__icon css-gsqvet" viewBox="0 0 24 24" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" d="M21 10h-2M5 10H3"></path><path fill="none" stroke="currentColor" stroke-miterlimit="10" d="M9.5 15.5h5m-9-5h13"></path><path d="M20.6 12.6L19 10l-1.5-3.7A2 2 0 0 0 15.6 5H8.4a2 2 0 0 0-1.9 1.3L5 10l-1.6 2.6a3 3 0 0 0-.4 1.5V17a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-2.9a3 3 0 0 0-.4-1.5z" fill="none" stroke="currentColor" stroke-width="2"></path><path d="M7 19v1a1 1 0 0 1-1 1 1 1 0 0 1-1-1v-1m14 0v1a1 1 0 0 1-1 1 1 1 0 0 1-1-1v-1" stroke="currentColor" stroke-width="2"></path><path d="M3.5 14.5H7a.5.5 0 0 1 .5.5v.5a1 1 0 0 1-1 1h-3v-2zm13.5 0h3.5v2h-3a1 1 0 0 1-1-1V15a.5.5 0 0 1 .5-.5z" fill="none" stroke="currentColor"></path></svg>';
            $output .= '<span>' . $row['has_garage'] ? Yes : No .'</span>';
            $output .= '<span style="margin-left: 15px;"> Price per night: $AUD ' . $row['price_per_night'].'</span>';
          $output .= '</div>';
          $output .= '<div style="margin-top: 35px;">';
              $output .= '<span style="margin-left: 15px;"> Available from: ' . $row['available_from'].'</span>';
              $output .= '<span style="margin-left: 15px;"> Available to: ' . $row['available_to'].'</span>';
              $output .= '<span style="margin-left: 15px;"> Max guests: ' . $row['max_guests'].'</span>';
            $output .= '</div>';
        }
        echo $output;
      ?>

      <section class="search-row">
          <div class="checks-input">
            <label>Check in</label>
            <input id="start_date" name="from_date" class="check-in" type="date" placeholder="Check In" />

            <svg class="right-arrow" xmlns="http://www.w3.org/2000/svg" fill="#000000" height="24" viewBox="0 0 24 24"
              width="24">
              <path d="M0 0h24v24H0z" fill="none" />
              <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
            </svg>
            <label>Check out</label>
            <input id="end_date" name="to_date" class="check-out" type="date" placeholder="Check Out" />
          </div>

          <select class="guests">
            <?php
              for ($x = 1; $x <= $max_guests; $x++) {
                echo '<option value="' . $x . '">' . $x . ' Guest</option>';
              }
            ?>
          </select>

          <button id="book-now" class="search-btn">
            Book Now
          </button>
        </section>
      
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

    <?php 
      echo '<input class="user-role hidden" value="' . $session_role . '">';
      echo '<input class="price-per-night hidden" value="' . $price_per_night . '">';
      echo '<input class="user-id hidden" value="' . $session_userId . '">';
      echo '<input class="available-to hidden" value="' . $available_to . '">';
    ?>
  </div>
  <script>
     $(document).ready(function () {

      var available_to = $('.available-to').val(); 
      var t = new Date().toISOString().split('T')[0];
      var m = new Date(available_to).toISOString().split('T')[0];
      document.getElementsByName("from_date")[0].setAttribute('min', t);
      document.getElementsByName("to_date")[0].setAttribute('min', t);
      document.getElementsByName("to_date")[0].setAttribute('max', m);

      var today = new Date();
      var dd = today.getDate();

      var mm = today.getMonth()+1; 
      var yyyy = today.getFullYear();
      if(dd<10) 
      {
          dd='0'+dd;
      } 

      if(mm<10) 
      {
          mm='0'+mm;
      } 
      today = yyyy+'-'+mm+'-'+dd;

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


      $("#book-now").click(function () {
        var user_id = $('.user-id').val();
        var user_role = $('.user-role').val();

        if (!user_id) {
          alert("Please login first");  
          return false;  
        }

        if (user_role !== 1) {
          alert("Please login as customer");  
          return false;  
        }

        var price = $('.price-per-night').val(); 
        var start_date = $('#start_date').val();
        var end_date = $('#end_date').val(); 
        
        var created_at = today; 
        var no_guests = $('.guests').val(); 

        if(user_id == '') {  
            alert("Enter User Id");  
            return false;  
        }  
        if(!start_date) {  
            alert("Please select checkin date");  
            return false;  
        }  
        if(!end_date) {  
            alert("Please select checkout date");  
            return false;  
        } 

        $.ajax({  
            url:"./engine/booking_engine.php",  
            method:"POST",  
            data:{
              user_id: user_id,
              price: price,
              start_date: start_date,
              end_date: end_date,
              created_at: created_at,
              no_guests: no_guests,
              is_accepted: 0,
              rejected_reason: null,
              checkout_date: null,
            },  
            dataType:"text",
            success:function(data) {  
              if (data === "success") {
                alert('Booking success');
                window.location.href = "./index.php";
              } else {
                alert(data);
              } 
            }  
        }) 
      })
    });  
  </script>
</footer>