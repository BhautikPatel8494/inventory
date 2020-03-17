<?php require_once 'php_action/db_connect.php';
session_start();
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="4gdevlopers">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Stokers</title>
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="assests/vassets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assests/vassets/css/owl.carousel.min.css"> -->
    <!-- <link rel="stylesheet" href="assests/vassets/css/icofont.css">
    <link rel="stylesheet" href="assests/vassets/css/magnific-popup.css"> -->
    <link rel="stylesheet" href="assests/vassets/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="assests/vassets/css/normalize.css">
    <link rel="stylesheet" href="assests/vassets/style.css">
    <link rel="stylesheet" href="assests/vassets/css/responsive.css">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> -->
    <script src="assests/vassets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="site2" data-spy="scroll" data-target=".mainmenu-area">

    <!-- Price-Area -->
    <section class="gray-bg" id="price-area" style="padding: 20px">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title text-center">
                        <h2 class="title">Select Membership Plan</h2>
                        <p>There are many variations of Membership Plans are available.</p>
                    </div>
                </div>
            </div>
            <div class="row prices tab-content">
                <div id="yearly" class="tab-pane fade in active">

                    <?php
                    $sql = "SELECT * FROM package";
                    $result = $connect->query($sql);

                    while ($row = $result->fetch_array()) {
                        ?>
                        <div class="col-xs-6 col-md-4 wow fadeInLeft" data-wow-delay="0.4s">
                            <div class="price-box active" style="height:500px">
                                <h4><?php echo $row[1] ?></h4>
                                <h3 class="amount">&#8377;<?php echo $row[2] ?> /<span>Year</span></h3>
                                <ul class="price-list">
                                    <?php
                                        $categories = '';
                                        $myArray = explode(',', $row[3]);
                                        foreach ($myArray as $facility) {
                                            echo '<li>' . $facility . '</li>';
                                        }
                                        ?>
                                </ul>
                                <form action="Paytm/PaytmKit/pgRedirect.php" method="POST">
                                    <input type="hidden" name="ORDER_ID" value="<?php echo  "ORDS" . rand(10000,99999999)?>">
                                    <input type="hidden" name="CUST_ID" value="<?php echo $_SESSION['company_id'] ?>">
                                    <input type="hidden" name="INDUSTRY_TYPE_ID" value="<?php echo $row[0] ?>">
                                    <input type="hidden" name="CHANNEL_ID" value="WEB">
                                    <input type="hidden" name="TXN_AMOUNT" value="<?php echo $row[2] ?>">
                                    <input class="bttn bttn-sm bttn-default" type="submit" name="submit" value="Purchase Now">
                                </form>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Price-Area -->

    <!--Vendor-JS-->
    <script src="assests/vassets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assests/vassets/js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="assests/vassets/js/owl.carousel.min.js"></script>
    <script src="assests/vassets/js/appear.js"></script>
    <script src="assests/vassets/js/bars.js"></script>
    <script src="assests/vassets/js/waypoints.min.js"></script>
    <script src="assests/vassets/js/counterup.min.js"></script>
    <script src="assests/vassets/js/easypiechart.min.js"></script>
    <script src="assests/vassets/js/mixitup.min.js"></script>
    <script src="assests/vassets/js/scrollUp.min.js"></script>
    <script src="assests/vassets/js/magnific-popup.min.js"></script>
    <script src="assests/vassets/js/wow.min.js"></script>
    <!--Main-active-JS-->
    <script src="assests/vassets/js/main.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXZ3vJtdK6aKAEWBovZFe4YKj1SGo9V20&callback=initMap"></script>
    <script src="assests/vassets/js/maps.js"></script>
    <script type="text/javascript">
    </script>
</body>

</html>