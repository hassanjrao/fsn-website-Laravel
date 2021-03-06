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

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('slick/slick-theme3.css') }}" />

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest')}}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
   
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
                <img src="{{ asset('images/logo.png') }}" alt="logo"></a>
        </div>


        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href=" {{ route("/") }}">Home</a>

                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route("about") }}">About</a></li>
                        <li><a href="{{ route("blog-list") }}">Blog</a></li>
                        <li><a href="#" class="contact-btn">Contact</a></li>
                    </ul>
                </li>
                <li><a href="#">Companies</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route("car-gurus") }}">Car Gurus</a></li>
                        <li><a href="{{ route("autozone") }}">Autozone</a></li>
                        <li><a href="{{ route("autozone-near-me") }}">Autozone near me</a></li>
                        <li><a href="{{ route("autotrader") }}">Autotrader</a></li>
                        <li><a href="{{ route("trulia") }}">Trulia</a></li>
                    </ul>
                </li>

                <li><a href="#">Homes & Houses</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route("homes") }}">Homes</a></li>
                        <li><a href="{{ route("homes-for-sale") }}">Homes for sale</a></li>
                        <li><a href="{{ route("homes-for-sale-near-me") }}">Homes for sale near me</a>
                        </li>
                        <li><a href="{{ route("house-for-sale") }}">house for sale</a></li>
                        <li><a href="{{ route("house-for-sale-near-me") }}">house for sale near me</a>
                        </li>
                    </ul>

                </li>

                <li><a href="#">Cars</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route("cars-for-sale") }}">cars for sale</a></li>
                        <li><a href="{{ route("used-cars") }}">used cars</a></li>
                        <li><a href="{{ route("bikes-shop") }}">bikes shop</a></li>
                        <li><a href="{{ route("used-cars-for-sale") }}">used cars for sale</a></li>
                        <li><a href="{{ route("motorcycle-sale") }}">motorcycle sale</a></li>
                    </ul>

                </li>

                <li><a href="#">Bikes & Cars</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="{{ route("bikes-shop-near-me") }}">bikes shop near me</a></li>
                        <li><a href="{{ route("car-gurus-used-cars") }}">carGurus used cars</a></li>
                        <li><a href="{{ route("car-for-sale-near-me") }}">car for sale near me</a>
                        </li>
                        <li><a href="{{ route("used-cars-for-sale-near-me") }}">used cars for sale
                                near me</a></li>
                        <li><a href="{{ route("classic-cars-for-sale") }}">classic cars for sale</a>
                        </li>
                    </ul>

                </li>



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
                        <a href="{{ route('/') }}"
                            style="font-size:x-large; font-style:bolder; color:black;">
                            <img src="{{ asset('images/logo.png') }}" alt="logo" width="150px"
                                height="50px"></a>
                    </div>
                </div>


                <div class="col-lg-9">
                    <nav class="header__menu ">

                        <ul>

                            <li class="active"><a href=" {{ route("/") }}">Home</a>

                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route("about") }}">About</a></li>
                                    <li><a href={{ route("blog-list") }}>Blog</a></li>
                                    <li><a href="#" class="contact-btn">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Companies</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route("car-gurus") }}">Car Gurus</a></li>
                                    <li><a href="{{ route("autozone") }}">Autozone</a></li>
                                    <li><a href="{{ route("autozone-near-me") }}">Autozone near me</a>
                                    </li>
                                    <li><a href="{{ route("autotrader") }}">Autotrader</a></li>
                                    <li><a href="{{ route("trulia") }}">Trulia</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Homes & houses</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route("homes") }}">Homes</a></li>
                                    <li><a href="{{ route("homes-for-sale") }}">Homes for sale</a>
                                    </li>
                                    <li><a href="{{ route("homes-for-sale-near-me") }}">Homes for sale
                                            near me</a></li>
                                    <li><a href="{{ route("house-for-sale") }}">house for sale</a>
                                    </li>
                                    <li><a href="{{ route("house-for-sale-near-me") }}">house for sale
                                            near me</a></li>
                                </ul>

                            </li>

                            <li><a href="#">Cars</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route("cars-for-sale") }}">cars for sale</a></li>
                                    <li><a href="{{ route("used-cars") }}">used cars</a></li>
                                    <li><a href="{{ route("bikes-shop") }}">bikes shop</a></li>
                                    <li><a href="{{ route("used-cars-for-sale") }}">used cars for
                                            sale</a></li>
                                    <li><a href="{{ route("motorcycle-sale") }}">motorcycle sale</a>
                                    </li>
                                </ul>

                            </li>

                            <li><a href="#">Bikes & Cars</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="{{ route("bikes-shop-near-me") }}">bikes shop near
                                            me</a></li>
                                    <li><a href="{{ route("car-gurus-used-cars") }}">carGurus used
                                            cars</a></li>
                                    <li><a href="{{ route("car-for-sale-near-me") }}">car for sale
                                            near me</a></li>
                                    <li><a href="{{ route("used-cars-for-sale-near-me") }}">used cars
                                            for sale near me</a></li>
                                    <li><a href="{{ route("classic-cars-for-sale") }}">classic cars
                                            for sale</a></li>
                                </ul>

                            </li>



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

        <div class="container-fluid pl-5 pr-5">
            <div class="row">
                <div class="col-lg-4 ">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Menu</span>
                        </div>


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">

                                <ul>
                                    <li><a href="#">Companies</a>
                                        <ul class="header__menu__dropdown">
                                            <li><a href="{{ route("car-gurus") }}">Car Gurus</a></li>
                                            <li><a href="{{ route("autozone") }}">Autozone</a>
                                            </li>
                                            <li><a href="{{ route("autozone-near-me") }}">Autozone
                                                    near me</a></li>
                                            <li><a href="{{ route("autotrader") }}">Autotrader</a>
                                            </li>
                                            <li><a href="{{ route("trulia") }}">Trulia</a></li>
                                        </ul>
                                    </li>
                                </ul>



                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <ul>
                                    <li><a href="#">Homes & houses</a>
                                        <ul class="header__menu__dropdown">
                                            <li><a href="{{ route("homes") }}">Homes</a></li>
                                            <li><a href="{{ route("homes-for-sale") }}">Homes for
                                                    sale</a></li>
                                            <li><a href="{{ route("homes-for-sale-near-me") }}">Homes
                                                    for sale near me</a></li>
                                            <li><a href="{{ route("house-for-sale") }}">house for
                                                    sale</a></li>
                                            <li><a href="{{ route("house-for-sale-near-me") }}">house
                                                    for sale near me</a></li>
                                        </ul>

                                    </li>
                                </ul>
                            </div>
                        </div>

                        <br>


                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <ul>

                                    <li><a href="#">Cars</a>
                                        <ul class="header__menu__dropdown">
                                            <li><a href="{{ route("cars-for-sale") }}">cars for
                                                    sale</a></li>
                                            <li><a href="{{ route("used-cars") }}">used cars</a></li>
                                            <li><a href="{{ route("bikes-shop") }}">bikes shop</a>
                                            </li>
                                            <li><a href="{{ route("used-cars-for-sale") }}">used cars
                                                    for sale</a></li>
                                            <li><a href="{{ route("motorcycle-sale") }}">motorcycle
                                                    sale</a></li>
                                        </ul>

                                    </li>
                                </ul>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <ul>
                                    <li><a href="#">Bikes & Cars</a>
                                        <ul class="header__menu__dropdown">
                                            <li><a href="{{ route("bikes-shop-near-me") }}">bikes shop
                                                    near me</a></li>
                                            <li><a href="{{ route("car-gurus-used-cars") }}">carGurus
                                                    used cars</a></li>
                                            <li><a href="{{ route("car-for-sale-near-me") }}">car for
                                                    sale near me</a></li>
                                            <li><a href="{{ route("used-cars-for-sale-near-me") }}">used
                                                    cars for sale near me</a></li>
                                            <li><a href="{{ route("classic-cars-for-sale") }}">classic
                                                    cars for sale</a></li>
                                        </ul>

                                    </li>
                                </ul>

                            </div>
                        </div>



                    </div>
                </div>

                <div class="col-lg-8 slider">

                    <div class="slider23 ">

                        @foreach($slider as $slider)
                            <img src={{ asset("/storage/images/slider/$slider->image") }}
                                width="100%" height="400px">
                        @endforeach


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
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}" defer></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}" defer></script>
    <script src="{{ asset('js/mixitup.min.js') }}" defer></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('slick/slick.min.js') }}" defer></script>
    <script src="{{ asset('js/main11.js') }}" defer></script>

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
