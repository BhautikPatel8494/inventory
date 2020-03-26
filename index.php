<?php require_once 'php_action/db_connect.php';

if ($_POST) {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "INSERT INTO contact (name, phone, email, subject, message) VALUES ('$name', '$phone', '$email', '$subject', '$message')";
    $result = $connect->query($sql);
}

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
    <!-- Place favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="assests/auth/home/images/apple-touch-icon.png">
    <link rel="shortcut icon" href="assests/auth/home/images/gtitle.png" />
    <!-- Plugin-CSS -->
    <link rel="stylesheet" href="assests/auth/home/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/auth/home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assests/auth/home/css/icofont.css">
    <link rel="stylesheet" href="assests/auth/home/css/magnific-popup.css">
    <link rel="stylesheet" href="assests/auth/home/css/animate.css">
    <!-- Main-Stylesheets -->
    <link rel="stylesheet" href="assests/auth/home/css/normalize.css">
    <link rel="stylesheet" href="assests/auth/home/style.css">
    <link rel="stylesheet" href="assests/auth/home/css/responsive.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="assests/auth/home/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body class="site2" data-spy="scroll" data-target=".mainmenu-area">
    <!--Preloader-->
    <!-- <div class="preloader">
        <div class="spinner"></div>
    </div> -->

    <!-- Mainmenu-Area -->
    <nav class="navbar mainmenu-area" data-spy="affix" data-offset-top="197">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="search-box" class="collapse">
                        <form action="#">
                            <input type="search" class="form-control" placeholder="What do you want to know?">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="collapse navbar-collapse navbar-right" id="mainmenu">
                        <ul class="nav navbar-nav primary-menu">
                            <li class="active"><a href="#home-area">Home</a></li>
                            <li><a href="#service-area">Features</a></li>
                            <li><a href="#price-area">Price</a></li>
                            <li><a href="#contact-area" id="contact_area">Contact</a></li>
                            <li></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Mainmenu-Area-/ -->


    <!--Header-Area-->
    <header class="header-area overlay" id="home-area">
        <div class="vcenter">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 text-center">
                        <div class="header-text">
                            <div class="wow fadeInUp upper latter-space" data-wow-delay="0.2s">Everything you need to simplify our business invoicing, and more.</div>
                            <h2 class="header-title wow fadeInUp upper" data-wow-delay="0.4s">Stokers</span></h2>
                            <div class="wow fadeInUp upper latter-space" data-wow-delay="0.2s">Login / SignUp</div>
                            <div class="wow fadeInUp" data-wow-delay="0.7s">
                                <button type="button" class="btn btn-primary" style="padding-left: 60px; padding-right: 55px;" onclick="window.location.href='login.php?type=admin'">Company</button>
                                <button type="button" class="btn btn-success" style="padding-left: 60px; padding-right: 55px;" onclick="window.location.href='login.php?type=user'">Employee</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="smoth">
            <a href="#about-area" class="scrolldown"><i class="icofont icofont-bubble-down"></i></a>
        </div>
    </header>
    <!--Header-Area-/-->


    <!-- About-Area -->
    <section class="" id="about-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="page-title">
                        <h2 class="title wow fadeInUp">The Most Incredible &amp; More Effective Business Solution 'Stokers '</h2>
                        <div class="wow fadeInUp" data-wow-delay="0.5s">
                            <p>Whether you’re new in business or a veteran on the market, it’s impossible not to have heard of the new tax system that will be rolled out this year in India, called Goods and Services tax, for short GST.</p>
                            <p>With the promise of streamlining the current tax structure, the government will integrate all current indirect taxes into a single GST tax, making tax collection more transparent.</p>
                        </div>
                    </div>
                    <div class="wow fadeInUp" data-wow-delay="0.7s">
                        <a href="#" class="bttn bttn-primary">Learn More</a>
                    </div>
                </div>
                <div class="hidden-xs col-sm-6 col-md-offset-1">
                    <div class="page-title">
                        <h2>Freequently Asked Question</h2>
                    </div>
                    <div class="panel-group accordion1" id="accordion">
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" aria-expanded="true" href="#collapse1">What am I getting with Stokers for India?</a>
                            <div id="collapse1" class="collapse in">
                                <div class="text-body">When you Register As Demo for India you get a Demo & 14-day full feature trial for an awesome Service. Once the trial Period expires, you may opt to keep using the full version by purchasing one our Premium licenses. Whatever your choice, you will not lose the information entered or documents issued during the trial period.</div>
                            </div>
                        </div>
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Can I add my company’s logo to the invoices?</a>
                            <div id="collapse2" class="collapse">
                                <div class="text-body">Yes, you can and it is very easy. You can upload it as such in the Company details form! But that’s not all: you can also add extra text in the Additional Details section and that will also be added to the printed documents.</div>
                            </div>
                        </div>
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">How to get your GSTR 1 report in Stokers?</a>
                            <div id="collapse3" class="collapse">
                                <div class="text-body">In Stokers, go to GSTR Reports (under Tools). In Type, select GSTR 1 and pick the year and month for your report. You can either export it in Excel in a .XLS or .CSV file, or you can export it straight to LegalRaasta, where you can file it online. Your GSTR Report has instructions on how to file your GST reports via the government GST offline tool.</div>
                            </div>
                        </div>
                        <div class="panel">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">What is the difference between credit and debit notes?</a>
                            <div id="collapse4" class="collapse">
                                <div class="text-body">
                                    <p><strong>What is a credit note?</strong></p>
                                    <p>A credit note is issued when a credit has been made in the account of a client. The seller issues a credit note to the buyer informing them about the credit that has been provided in their account. This often occurs due to return of goods to the supplier and it has a negative impact on the accounting balance of the seller.</p>
                                    <p><strong>What is a debit note?</strong></p>
                                    <p>An invoice is made for each purchase or supply of goods or services. If for various reasons the supply falls short due to certain reasons, or extra goods are being delivered to the purchaser, then the seller will issue a debit note. This debit note with note the upward revision of prices in an already issued invoice and will inform the purchase of any future liability that they will have to pay.
                                        <p>Debit notes are made in cases where a tax invoice that has been previously issued, in which the taxable value of the goods from the invoices has changed after the date of issue.</p>
                                        <p><strong>What is the difference between credit note and debit note?</strong></p>
                                        <p>To put it simply, the difference between credit and debit note is that in credit notes you record money that you owe to a client due to a downward revision in an invoice and in debit notes you record money that a client owes you due to upward revision in an invoice. ​
                                            A debit note is issued when there is a purchase return and reduces receivables, while a credit note is issued when there is a sales return and reduces payables.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About-Area / -->

    <section class="gray-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="page-title text-center">
                        <h2 class="title">Our Features</h2>
                        <p>Simple, efficient and free GST Billing Service</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="service-box" style="height:530px">
                        <div class="box-image">
                            <img src="assests/auth/home/images/service-1.jpg" alt="">
                            <a href="#" class="box-plus">
                                <i class="icofont icofont-plus"></i>
                            </a>
                        </div>
                        <div class="box-text">
                            <h4>Does all the Hard Work</h4>
                            <p>Stokers will do all the work for you. From calculating to formatting and printing, even delivering invoices to your customers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="service-box" style="height:530px">
                        <div class="box-image">
                            <img src="assests/auth/home/images/advdoc.jpg" style="height:177px;width:245px" alt="">
                            <a href="#" class="box-plus">
                                <i class="icofont icofont-plus"></i>
                            </a>
                        </div>
                        <div class="box-text">
                            <h4>Advanced Document Options</h4>
                            <p>Developed with clients and specialized accountants, our latest version includes the ability to show the amount in words, to show the Signatory field or Round off the total amount.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="service-box" style="height:530px">
                        <div class="box-image">
                            <img src="assests/auth/home/images/inex.jpg" style="height:177px;width:245px" alt="">
                            <a href="#" class="box-plus">
                                <i class="icofont icofont-plus"></i>
                            </a>
                        </div>
                        <div class="box-text">
                            <h4>Inclusive and exclusive taxation</h4>
                            <p>Stokers allows you to add price to your items with tax included in the price or excluded from it. Either way, you don’t need to calculate tax by hand, Sleek Bill does all the math for you and accurately shows the tax amount in your invoices.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="service-box" style="height:530px">
                        <div class="box-image">
                            <img src="assests/auth/home/images/deprpt.jpg" style="height:177px;width:245px" alt="">
                            <a href="#" class="box-plus">
                                <i class="icofont icofont-plus"></i>
                            </a>
                        </div>
                        <div class="box-text">
                            <h4>Control your business with detailed reports</h4>
                            <p>With smart filters you can get comprehensive reports on clients, payment history, stock in hand or sales by product / service. This free invoice software helps you run your business.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-padding" id="service-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" style="height:250px" data-wow-delay="0.2s">
                        <div class="box-icon">
                            <i class="icofont icofont-gear"></i>
                        </div>
                        <h4>Advance Document Option</h4>
                        <p>Developed with clients and specialized accountants, our latest version includes the ability to show the amount in words, to show the Signatory field or Round off the total amount.</p>

                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" style="height:250px" data-wow-delay="0.4s">
                        <div class="box-icon">
                            <i class="icofont icofont-calculator-alt-1"></i>
                        </div>
                        <h4>GST Tax Calculation</h4>
                        <p>With built in tax slabs, you only need to select the right gst rate for your products or services and Stokers will do all the detailed calculations of SGST, CGST or IGST.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" style="height:250px" data-wow-delay="0.6s">
                        <div class="box-icon">
                            <i class="icofont icofont-monitor"></i>
                        </div>
                        <h4>GST Ready</h4>
                        <p>Stokers is updated for all your GST billing needs: GSTIN, HSN and SAC code support, GST formats for all documents from invoices to purchase orders, GSTR 1, GSTR 3B, GSTR 4 and much more.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" style="height:250px" data-wow-delay="1.2s">
                        <div class="box-icon">
                            <i class="icofont icofont-chart-bar-graph"></i>
                        </div>
                        <h4>Make purchase orders, turn them to bills</h4>
                        <p>The Premium Inventory option allows you to create unlimited purchase orders that you can easily turn to bills as needed.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" style="height:250px" data-wow-delay="1s">
                        <div class="box-icon">
                            <i class="icofont icofont-files"></i>
                        </div>
                        <h4>Full support for Units of Measurement</h4>
                        <p>Where units of measurement are concerned, our inventory software comes with limitless options. From hours to boxes or kilograms, use whatever measure you need.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="feature-box wow fadeInUp" style="height:250px" data-wow-delay="0.8s">
                        <div class="box-icon">
                            <i class="icofont icofont-money-bag"></i>
                        </div>
                        <h4>Create professional invoices</h4>
                        <p>In business, image is extremely important and you know it! No other inventory management software puts so much emphasis on the design of documents. We aim to impress you and your customers.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="page-title text-center">
                        <h2 class="title">Our Working Process</h2>
                        <p>Our Simple working process For Activate Membership Of GST Mitra </p>
                    </div>
                </div>
            </div>
            <div class="row process text-center">
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="single-process">
                        <div class="process-icon">
                            <i class="icofont icofont-pie"></i>
                        </div>
                        <h3>Free Demonstration</h3>
                        <p>There are many varia tions of passages of Lorem Ipsum available, but the majority.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="single-process">
                        <div class="process-icon">
                            <i class="icofont icofont-users-alt-1"></i>
                        </div>
                        <h3>Select Membership Plan</h3>
                        <p>There are many varia tions of passages of Lorem Ipsum available, but the majority.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="single-process">
                        <div class="process-icon">
                            <i class="icofont icofont-brainstorming"></i>
                        </div>
                        <h3>Make Payment</h3>
                        <p>There are many varia tions of passages of Lorem Ipsum available, but the majority.</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="single-process">
                        <div class="process-icon">
                            <i class="icofont icofont-settings-alt"></i>
                        </div>
                        <h3>Activate Membership</h3>
                        <p>There are many varia tions of passages of Lorem Ipsum available, but the majority.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Price-Area -->
    <section class="section-padding gray-bg" id="price-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="page-title text-center">
                        <h2 class="title">Membership Plan</h2>
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
                                <a href="register.php?type=admin" class="bttn bttn-sm bttn-default">Purchase Now</a>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- <div class="col-xs-6 col-md-4 wow fadeInLeft" data-wow-delay="0.4s">
                        <div class="price-box active" style="height:500px">
                            <h4>Premium</h4>
                            <h3 class="amount">&#8377;6000 /<span>Year</span></h3>
                            <ul class="price-list">
                                <li>Free Useable</li>
                                <li>Easily can useable 10GB</li>
                                <li>Free Secuirity Service</li>
                            </ul>
                            <a href="register.php?type=admin" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 wow fadeInLeft" data-wow-delay="0.6s">
                        <div class="price-box" style="height:500px">
                            <h4>Business Pro</h4>
                            <h3 class="amount">&#8377;8000 /<span>Year</span></h3>
                            <ul class="price-list">
                                <li>Free Useable</li>
                                <li>Free Secuirity Service</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="register.php?type=admin" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-4 wow fadeInLeft" data-wow-delay="0.8s">
                        <div class="price-box" style="height:500px">
                            <h4>Ultimate+ Life</h4>
                            <h3 class="amount">&#8377;22000 /<span>Year</span></h3>
                            <ul class="price-list">
                                <li>Free Useable</li>
                                <li>Easily can useable 10GB</li>
                                <li>Free Secuirity Service</li>
                                <li>Dedicated Useable Account</li>
                            </ul>
                            <a href="register.php?type=admin" class="bttn bttn-sm bttn-default">Purchase Now</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Price-Area -->

    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="page-title text-center">
                        <h2 class="title">Hear Reviews from Customer</h2>
                        <p>Find out Stokers is the preferred invoicing solution among business owners.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-10 col-md-offset-1">
                    <div class="testimonials">
                        <div class="single-testimonial text-center">
                            <div class="testimonial-text">
                                <em>Stokers has improved our law firm's cash flow and productivity considerably. To be honest, it's very easy to use, great software. I highly recommend Stokers to anyone.</em>
                            </div>
                            <h3>Vipul Goti</h3>
                            <h6>CEO, Ambica Group</h6>
                            <div class="testimonial-img">
                                <img src="assests/auth/home/images/testimonial-1.png" alt="">
                            </div>
                        </div>
                        <div class="single-testimonial text-center">
                            <div class="testimonial-text">
                                <em>Customer service of Stokers is excellent and you don't even pay anything extra for it. Things can go wrong with anything, I find - that's just life, but the marque of a good organisation is how well they respond to it and how quickly it's explained and fixed - well impressed</em>
                            </div>
                            <h3>Manish Vaghasiya</h3>
                            <h6>CEO, Ozone Diamond</h6>
                            <div class="testimonial-img">
                                <img src="assests/auth/home/images/testimonial-2.png" alt="">
                            </div>
                        </div>
                        <div class="single-testimonial text-center">
                            <div class="testimonial-text">
                                <em>I started using Stokers within One months of starting my business and it's been wonderful. Invoicing was one part of the business I wasn't able to handle and Stokers does it beautifully for me</em>
                            </div>
                            <h3>Ankit Gopani</h3>
                            <h6>CEO, Panthi Enterprise</h6>
                            <div class="testimonial-img">
                                <img src="assests/auth/home/images/testimonial-1.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- Blog-area -->
    <section class="section-padding mt-0" id="blog-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                    <div class="page-title text-center">
                        <h2 class="title">Latest Articals</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-md-6 wow fadeInUp">
                    <div class="blog-box">
                        <div class="blog-image">
                            <img src="assests/auth/home/images/arti_1.jpg" style="height:268px;width:555px" alt="">
                        </div>
                        <div class="blog-details">
                            <h4><a href="#">Impact of GST on your company’s working capital</a></h4>
                            <p>The GST system that will hit the market in less than 3 months will impact millions of businesses in India. While there are many areas where these businesses will need to adapt, adjusting working capital will be crucial for surviving this transition.</p>
                            <p><a href="#">Read More...</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="blog-lists">
                        <div class="blog-list wow fadeInUp" data-wow-delay="0.2s">
                            <div class="blog-list-image">
                                <img src="assests/auth/home/images/rule.jpg" alt="">
                            </div>
                            <h5><a href="#">GST Invoice Rules and Guidelines: Do’s and Don’ts</a></h5>
                            <div class="blog-list-meta"> <i class="icofont icofont-ui-calendar"></i> 16 JUNE 2016</div>
                            <p><a href="#">Read More..</a></p>
                        </div>
                        <div class="blog-list wow fadeInUp" data-wow-delay="0.4s">
                            <div class="blog-list-image">
                                <img src="assests/auth/home/images/debit-credit.jpg" alt="">
                            </div>
                            <h5><a href="#">Credit Note and Debit Note</a></h5>
                            <div class="blog-list-meta"> <i class="icofont icofont-ui-calendar"></i> 16 JUNE 2016</div>
                            <p><a href="#">Read More..</a></p>
                        </div>
                        <div class="blog-list wow fadeInUp" data-wow-delay="0.6s">
                            <div class="blog-list-image">
                                <img src="assests/auth/home/images/compo.jpg" alt="">
                            </div>
                            <h5><a href="#">Composition Scheme under GST</a></h5>
                            <div class="blog-list-meta"> <i class="icofont icofont-ui-calendar"></i> 16 JUNE 2016</div>
                            <p><a href="#">Read More..</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog-area / -->
    <!-- Contact-Area -->
    <section id="contact-area">
        <div class="contact-area">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="page-title">
                            <h3 class="bar-title">Contact Now</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="contact-form">
                            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" id="contact-form" method="post">
                                <div class="form-double">
                                    <input type="text" name="name" placeholder="Full Name" required="required">
                                    <input type="text" placeholder="Phone Number" name="phone">
                                </div>
                                <div class="form-double">
                                    <input type="email" name="email" placeholder="Your Email" required="required">
                                    <input type="text" name="subject" placeholder="Subject" required="required">
                                </div>
                                <textarea name="message" name="message" rows="5" required="required" placeholder="Message"></textarea>
                                <button type="submit" class="bttn bttn-primary">Send Now </button>
                            </form>
                            <br />
                            <h4 class="text-primary" id="contact_msg"></h4>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="contact-info">
                            <ul class="info">
                                <li>
                                    <span class="info-icon">
                                        <i class="icofont icofont-social-google-map"></i>
                                    </span> Motavarchha <br /> Surat-394105
                                </li>
                                <li>
                                    <span class="info-icon">
                                        <i class="icofont icofont-ui-cell-phone"></i>
                                    </span> (+91) 6353365665
                                </li>
                                <li>
                                    <span class="info-icon">
                                        <i class="icofont icofont-envelope"></i>
                                    </span> Info@4gdevlopers.com
                                </li>
                            </ul>
                            <div class="social-menu-2">
                                <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                <a href="#"><i class="icofont icofont-social-skype"></i></a>
                                <a href="#"><i class="icofont icofont-social-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact-Area / -->
    <div style="height:200px"></div>
    <!-- Footer-Area -->
    <footer class="footer-area">
        <div class="footer-top section-padding mb-0" style="padding-bottom: 35px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="footer-text">
                            <h4 class="upper">Stokers</h4>
                            <p>Everthing you Need To Simplify your Business Invoicing, And More.</p>
                            <div class="social-menu">
                                <a href="#"><i class="icofont icofont-social-facebook"></i></a>
                                <a href="#"><i class="icofont icofont-social-twitter"></i></a>
                                <a href="#"><i class="icofont icofont-social-google-plus"></i></a>
                                <a href="#"><i class="icofont icofont-social-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-2 col-md-offset-1">
                        <div class="footer-single">
                            <h4 class="upper">Information</h4>
                            <ul>
                                <li><a href="#">Pricing</a></li>
                                <li><a href="#">Best Billing Tips</a></li>
                                <!-- <li><a href="#">Download now</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <div class="footer-single">
                            <h4 class="upper">Support</h4>
                            <ul>
                                <li><a href="#service-area">GST Information</a></li>
                                <!-- <li><a href="#contact-area">Become a Partner</a></li> -->
                                <li><a href="#contact-area">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xs-6 col-md-2">
                        <div class="footer-single">
                            <h4 class="upper">Features</h4>
                            <ul>
                                <li><a href="#">Inventory Management Solution</a></li>
                                <li><a href="#">Billing System</a></li>
                                <li><a href="#">Reports</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">

                        <p class="copyright">Copyright &copy;<script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | 4gDevlopers</a></p>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer-Area / -->


    <!--Vendor-JS-->
    <script src="assests/auth/home/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assests/auth/home/js/vendor/bootstrap.min.js"></script>
    <!--Plugin-JS-->
    <script src="assests/auth/home/js/owl.carousel.min.js"></script>
    <script src="assests/auth/home/js/appear.js"></script>
    <script src="assests/auth/home/js/bars.js"></script>
    <script src="assests/auth/home/js/waypoints.min.js"></script>
    <script src="assests/auth/home/js/counterup.min.js"></script>
    <script src="assests/auth/home/js/easypiechart.min.js"></script>
    <script src="assests/auth/home/js/mixitup.min.js"></script>
    <script src="assests/auth/home/js/scrollUp.min.js"></script>
    <script src="assests/auth/home/js/magnific-popup.min.js"></script>
    <script src="assests/auth/home/js/wow.min.js"></script>
    <!--Main-active-JS-->
    <script src="assests/auth/home/js/main.js"></script>
    <script src="assests/auth/home/js/maps.js"></script>
</body>

</html>