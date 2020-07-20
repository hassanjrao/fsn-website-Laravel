<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>


    @yield('head')


    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="slick/slick-theme3.css" />

    <link rel="stylesheet" href="css/style.css" type="text/css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    @yield('links')




</head>

<body @yield('onload')>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!--Page Preloder -->

    <!-- Humberger Start -->

    <div class="humberger__menu__overlay"></div>

    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="index.php" style="font-size:x-large; font-style:bolder; color:black;">
                <img src="images/logo.png" alt="logo"></a>
        </div>


        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href=" {{ route("/") }}">Home</a></li>
                <li><a href="#">MLM</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route("mlm") }}">MLM</a></li>
                        <li><a href="{{ route("mlm-companies") }}">MLM Companies</a></li>
                        <li><a href="#">MLM Company</a></li>
                        <li><a href="#">MLM Business</a></li>
                        <li><a href="#">MLM Software</a></li>
                    </ul>
                </li>

                <li><a href="#">Network Marketing</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="network-marketing.php">Network Marketing</a></li>
                        <li><a href="#">Multi Level Marketing</a></li>
                        <li><a href="multi-level-marketers.php">Multi Level Marketers</a></li>
                        <li><a href="direct-marketing.php">Direct Marketing</a></li>
                        <li><a href="direct-selling-companies.php">Direct Selling Companies</a></li>
                    </ul>

                </li>
                <li><a href="about.php">About</a></li>
                <li><a href="blog-list.php">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> Contact us rickson7@yahoo.com</li>
            </ul>
        </div>
    </div>

    <!-- Humberger End -->



    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">


                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php" style="font-size:x-large; font-style:bolder; color:black;">
                            <img src="images/logo.png" alt="logo" width="150px" height="50px"></a>
                    </div>
                </div>


                <div class="col-lg-9">
                    <nav class="header__menu float-right">

                        <ul>

                            <li class="active"><a href=" {{ route("/") }}">Home</a></li>
                            <li><a href="#">MLM</a>

                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route("mlm") }}">MLM</a></li>
                                    <li><a href="{{ route("mlm-companies") }}">MLM Companies</a></li>
                                    <li><a href="#">MLM Company</a></li>
                                    <li><a href="mlm-business.php">MLM Business</a></li>
                                    <li><a href="mlm-software.php">MLM Software</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Network Marketing</a>

                                <ul class="header__menu__dropdown">
                                    <li><a href="network-marketing.php">Network Marketing</a></li>
                                    <li><a href="#">Multi Level Marketing</a></li>
                                    <li><a href="multi-level-marketers.php">Multi Level Marketers</a></li>
                                    <li><a href="direct-marketing.php">Direct Marketing</a></li>
                                    <li><a href="direct-selling-companies.php">Direct Selling Companies</a></li>
                                </ul>

                            </li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="blog-list.php">Blog</a></li>
                            <li><a href="#" class="contact-btn">Contact</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->



    <!-- Hero Section Begin -->
    <button class="enquiry-btn btn" data-toggle="modal" data-target="#myModal1"
        type="button">E<br>N<br>Q<br>U<br>I<br>R<br>Y</button>


    <section class="hero pt-5">

        <div class="container">
            <div class="row">
                <div class="col-lg-3 ">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Menu</span>
                        </div>
                        <ul>
                            <li>MLM</li>

                                  

                            <ul>
                                <li><a href="{{ route("mlm") }}">cars for sale</a></li>
                                <li><a href="{{ route("mlm-companies") }}">cargurus</a></li>
                                <li><a href="#">cargurus used cars</a></li>
                                <li><a href="#">autozone</a></li>
                                <li><a href="#">autotrader</a></li>
                                <li><a href="#">autozone</a></li>
                                <li><a href="#">autotrader</a></li>
                                <li><a href="#">trulia</a></li>
                                <li><a href="#">autozone near me</a></li>
                                <li><a href="#">used cars</a></li>
                                <li><a href="#">used cars for sale</a></li>
                                <li><a href="#">used cars for sale near me</a></li>

                            </ul>

                        </ul>

                        <ul>
                            <li>Network Marketing</li>

                            <ul>
                                <li><a href="network-marketing.php">network marketing</a></li>
                                <li><a href="#">multi level marketing</a></li>
                                <li><a href="multi-level-marketers.php">multi level marketers</a></li>
                                <li><a href="direct-marketing.php">direct marketing</a></li>
                                <li><a href="direct-selling-companies.php">direct selling companies</a></li>

                            </ul>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9 slider">

                    <div class="slider23 ">

                        <img src="images/banner/MLM1.jpg" width="100%" height="400px">
                        <img src="images/banner/MLM2.jpg" width="100%" height="400px">

                    </div>

                    <!-- The Modal -->
                    <div class="modal" id="myModal1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Enquiry Form</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form id="enquiry-form">
                                        <input type="text" id="l-name" class="form-control" placeholder="Name"
                                            name="name" required=""><br>
                                        <input type="email" id="l-email" class="form-control" placeholder="Email"
                                            name="email" required=""><br>
                                        <input type="number" id="l-mob" class="form-control" placeholder="Mobile"
                                            name="mobile" required=""><br>
                                        <input type="text" id="l-city" class="form-control" placeholder="City"
                                            name="city" required=""><br>
                                        <input type="text" id="l-sub" class="form-control" placeholder="Subject"
                                            name="subject" required=""><br>
                                        <textarea id="l-comm" class="form-control" placeholder="Comment" name="comment"
                                            required=""></textarea>

                                        <br>
                                        <div class="g-recaptcha" data-sitekey="6Lc9cK4ZAAAAAL9lf7JyxcIrmhVOxr8eAB8-8ljg"
                                            data-callback="enable_submit_btn_l"
                                            data-expired-callback="disable_submit_btn_l"></div>
                                        <br>
                                        <div id="success"> </div>
                                        <div class="modal-footer">
                                            <button type="button" disabled="disabled" id="enquiry-submit" name="submit"
                                                style="background: #7fad39; color:white;" class="btn">Submit</button>
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Close</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- End Model --}}
                </div>
            </div>
        </div>

    </section>

    <!-- Hero Section End -->



    {{-- main content starts --}}

    @yield('content')

    {{-- main content ends --}}








    @yield('footer')




    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js" defer></script>
    <script src="js/bootstrap.min.js" defer></script>
    <script src="js/jquery.nice-select.min.js" defer></script>
    <script src="js/jquery.slicknav.js" defer></script>
    <script src="js/mixitup.min.js" defer></script>
    <script src="js/owl.carousel.min.js" defer></script>
    <script type="text/javascript" src="slick/slick.min.js" defer></script>
    <script src="js/main11.js" defer></script>

    <script type="text/javascript">
        function enable_submit_btn_l() {
            document.getElementById("enquiry-submit").disabled = false;
        };

        function disable_submit_btn_l() {

            document.getElementById("enquiry-submit").disabled = true;

        };

    </script>

    @yield('scripts')







</body>

</html>
