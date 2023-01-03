<?php

session_start();
error_reporting(1);
require('connection.php');
extract($_REQUEST); // Variable initialization.

if (!$_SESSION["IsUserLoggedIn"]) {
    header("location:login.php");
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $uid = $_SESSION['IsUserLoggedIn'];
    $Object = json_decode($Object);
    mysqli_query($con, "INSERT INTO bookings (user_id,check_in_date, check_out_date, roomtype,quantity,total) VALUES ('$uid','$Object->startDate', '$Object->endDate', '$Object->roomtype','$Object->quantity','$Object->total')");
    //$result = mysqli_query($con,"INSERT INTO bookings (check_in_date, check_out_date, roomtype) VALUES ('$check_in_date', '$check_out_date', '$roomtype')");
}

$query = mysqli_query($con, "SELECT * FROM room");



?>
<!DOCTYPE html>
<html style="padding: 10px; color: #000000;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title>HotelProject</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="assets/css/Features-Blue.css">
        <link rel="stylesheet" href="assets/css/Footer-Clean.css">
        <link rel="stylesheet" href="assets/css/Footer-Dark.css">
        <link rel="stylesheet" href="assets/css/Header-Blue.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightpick@1.3.4/css/lightpick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
        <link rel="stylesheet" href="assets/css/Login-screen.css">
        <link rel="stylesheet" href="assets/css/Simple-Slider.css">
        <link rel="stylesheet" href="assets/css/styles.css">
        <link rel="stylesheet" href="assets/css/Team-Boxed.css">
        <script>
        /* Pinegrow Interactions, do not remove */
        (function() {
            try {
                if (!document.documentElement.hasAttribute('data-pg-ia-disabled')) {
                    window.pgia_small_mq = typeof pgia_small_mq == 'string' ? pgia_small_mq : '(max-width:767px)';
                    window.pgia_large_mq = typeof pgia_large_mq == 'string' ? pgia_large_mq : '(min-width:768px)';
                    var style = document.createElement('style');
                    var pgcss = 'html:not(.pg-ia-no-preview) [data-pg-ia-hide=""] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show=""] {opacity:1;visibility:visible;display:block;}';
                    if (document.documentElement.hasAttribute('data-pg-id') && document.documentElement.hasAttribute('data-pg-mobile')) {
                        pgia_small_mq = '(min-width:0)';
                        pgia_large_mq = '(min-width:99999px)'
                    }
                    pgcss += '@media ' + pgia_small_mq + '{ html:not(.pg-ia-no-preview) [data-pg-ia-hide="mobile"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="mobile"] {opacity:1;visibility:visible;display:block;}}';
                    pgcss += '@media ' + pgia_large_mq + '{html:not(.pg-ia-no-preview) [data-pg-ia-hide="desktop"] {opacity:0;visibility:hidden;}html:not(.pg-ia-no-preview) [data-pg-ia-show="desktop"] {opacity:1;visibility:visible;display:block;}}';
                    style.innerHTML = pgcss;
                    document.querySelector('head').appendChild(style);
                }
            } catch (e) {
                console && console.log(e);
            }
        })()
    </script>
        <link href="GlobalStyle.css?refreshcss=1" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
        <script src="assets/js/particles.js"></script>
    </head>
    <body style="background-color: #2e4155; font-family: 'Source Sans Pro', sans-serif;">
        <header>
            <nav class="navbar navbar-light navbar-expand-md" style="color: rgb(255,255,255);">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php" style="color: #ffffff;">Hotel</a>
                    <button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-2" style="color: #ffffff; background-color: #3d5c89;">
                        <span class="sr-only" style="color: #ffffff;">Toggle navigation</span>
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navcol-2" style="color: #ffffff;">
                        <ul class="navbar-nav" style="color: #ffffff;">
                            <li class="nav-item" style="color: #ffffff;">
                                <a class="active hranim nav-link" href="booking.php" style="color: #ffffff;">Room Options</a>
                            </li>
                            <li class="nav-item" style="color: #ffffff;">
                                <a class="hranim nav-link" href="booked.php" style="color: #ffffff;">Booked Rooms</a>
                            </li>
                        </ul>
                    </div>
                    <div style="display: flex; flex-direction: row; flex-wrap: wrap; align-items: center; justify-content: center; align-content: center;">
                        <div style="position: relative;">
                            <button class="btn btn-danger cart_style" style="margin: 0px 10px 0px 0px;">
                                <i class="fa fa-lg fa-shopping-cart"></i>
                            </button>
                            <div style="z-index: 2; position: absolute; min-width: 230px; max-width: 230px; display: list-item; list-style-type: none; left: -150px;">
                                <div style="background-color: #006181; border-radius: 5px; border-style: none; border-color: #000000; padding: 5px;" class="cart_content">
                                    <ul id="cart_list" style="list-style-type: none;margin: 0;padding: 10px;">
</ul>
                                    <button id="checkout_btn" type="button" class="btn btn-light">Checkout</button>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary hranim" type="button">
                            <a href="logout.php" style="text-decoration: none; color: #ffffff;">Logout</a>
                        </button>
                    </div>
                </div>
            </nav>
        </header>
        <div id="particles-js"> </div>

        <div style="display: flex; position: sticky; z-index: 1; padding: 10px; border-style: none; border-radius: 5px; flex-direction: row; flex-wrap: wrap; align-content: center; justify-content: center; align-items: baseline; top: 0px;">
            <div style="flex-basis: 225px;">
                <div class="form-group">
                    <label for="formInput132" style="color: #ffffff; font-weight: bold;">Room type</label>
                    <select id="room_dropdown" class="form-control">
                        <option value="all">All Rooms</option>
                        <?php
                    while ($row = mysqli_fetch_object($query)) {
                        echo '<option value=' . $row->roomtype . '>' . $row->name . '</option>';
                    }

                    ?>
                    </select>
                </div>
            </div>
            <div style="flex-basis: 390px;">
                <div id="booking-date-xl" style="margin: 0px;">
                    <h6 style="color: #ffffff; font-weight: bold; text-align: center;">Booking Date</h6>
                    <input type="text" id="bookingdate_filter" class="form-control datetimes" style="text-align: center; background-color: #ffffff; color: #000000; border: 0px solid #00000000;">
                </div>
            </div>
            <div style="position: relative; top: 35px;">
                <button type="button" id="filter_btn" class="btn btn-primary">Filter</button>
            </div>
        </div>
        
        <div class="box_container"></div>

        <div style="color: #ffffff; position: fixed; z-index: 5; top: 0px; bottom: 0px; right: 0px; left: 0px; padding: 0px; overflow: scroll;" id="checkoutform">
            <div class="row ">
                <div class="col-75">
                    <div id="chkout" class="container">
                        <div class="row">
                            <div class="col-50">
                                <h3>Billing Address</h3>
                                <label for="fname">
                                    <i class="fa fa-user"></i> Full Name
                                </label>
                                <input type="text" id="fname" name="firstname" placeholder="John M. Doe">
                                <label for="email">
                                    <i class="fa fa-envelope"></i> Email
                                </label>
                                <input type="text" id="email" name="email" placeholder="john@example.com">
                                <label for="adr">
                                    <i class="fa fa-address-card-o"></i> Address
                                </label>
                                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street">
                                <label for="city">
                                    <i class="fa fa-institution"></i> City
                                </label>
                                <input type="text" id="city" name="city" placeholder="New York">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="state">State</label>
                                        <input type="text" id="state" name="state" placeholder="NY">
                                    </div>
                                    <div class="col-50">
                                        <label for="zip">Zip</label>
                                        <input type="text" id="zip" name="zip" placeholder="10001">
                                    </div>
                                </div>
                            </div>
                            <div class="col-50">
                                <h3>Payment</h3>
                                <label for="fname">Accepted Cards</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="cardname" placeholder="John More Doe">
                                <label for="ccnum">Credit card number</label>
                                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
                                <label for="expmonth">Exp Month</label>
                                <input type="text" id="expmonth" name="expmonth" placeholder="September">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="expyear" name="expyear" placeholder="2018">
                                    </div>
                                    <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="352">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" value="Continue to checkout" class="btn" id="payment_checkout">
                        <input type="submit" value="Back to booking menu" class="btn btn-primary" id="backbutton">
                    </div>
                </div>
                <div class="col-25">
                    <div id="cart_listing" class="container">
                        <h4>Cart <span class="price" style="color:black"> <i class="fa fa-shopping-cart"></i> <b id="cart_row_num"></b> </span> </h4>
                        <div id="checkout_list"> </div>
                        <hr>
                        <p>Total <span class="price" style="color:black"><b id="cart_total"></b></span></p>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/smart-forms.min.js"></script>
        <script src="assets/js/bs-init.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
        <script src="assets/js/Simple-Slider.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script src="assets/js/SelfCoded/OnPageLoad.js"></script>
        <script src="assets/js/SelfCoded/Main.js"></script>
        <script>
            particlesJS.load('particles-js', 'assets/js/particles.json', 
                function() {
                console.log('callback - particles.js config loaded');
                });
        
        </script>

    </body>
</html>