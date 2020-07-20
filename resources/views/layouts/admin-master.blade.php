<!DOCTYPE html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>@yield('title')</title>
    <!-- <link rel="icon" href="favicon.ico" type="image/x-icon"> -->
    <!-- Favicon-->
    <link rel="stylesheet" href="../../../admin-assets/assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap Material Datetime Picker Css -->
    <link
        href="../../../admin-assets/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css"
        rel="stylesheet" />
    <!-- Bootstrap Select Css -->
    <link href="../../../admin-assets/assets/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="../../../admin-assets/assets/css/style.min.css">

    <link rel="stylesheet" href="../../../admin-assets/assets/css/cart.css">


    <link rel="stylesheet" href="../../../admin-assets/assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">

</head>


<body class="theme-blush">


    {{-- page loader starts --}}
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="../../../admin-assets/assets/images/loader.svg"
                    width="48" height="48" alt="Aero"></div>
            <p>Please wait...</p>
        </div>
    </div>

    {{-- page loader ends --}}


    {{-- left bar starts --}}

    <aside id="leftsidebar" class="sidebar">
        <div class="navbar-brand">
            <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
            <a href="index.php"><img src="../../../admin-assets/assets/images/logo-dark.png" width="25"
                    alt="Zaamin"><span class="m-l-10">Courses</span></a>
        </div>
        <div class="menu">
            <ul class="list">
                <li>
                    <div class="user-info">
                        <a class="image" href="#"><img src="../../../admin-assets/assets/images/logo-dark.png"
                                alt="Zaamin"></a>
                        <div class="detail">
                            <h4>Courses</h4>
                            <small>Super Admin</small>
                        </div>
                    </div>
                </li>


                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>City</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.city.create') }}">Add City</a></li>
                        <li><a href="{{ route('admin.city.index') }}">All City</a></li>


                    </ul>
                </li>




                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Slider
                            Images</span></a>
                    <ul class="ml-menu">
                        <li><a href="add_slider_img.php">Add Image</a></li>
                        <li><a href="all_slider_img.php">All Images</a></li>

                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Moving
                            Images</span></a>
                    <ul class="ml-menu">
                        <li><a href="add_moving_images.php">Add Image</a></li>
                        <li><a href="all_moving_images.php">All Images</a></li>

                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>Blog</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('admin.blog.create') }}">Add Blog</a></li>
                        <li><a href="{{ route('admin.blog.index') }}">All Blogs</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>Content</span></a>
                    <ul class="ml-menu">
                        <li><a href="{{ route("admin.content.create") }}">Add Content</a></li>
                        <li><a href="{{ route("admin.content.index") }}">All Contents</a></li>
                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-apps"></i><span>Footer</span></a>
                    <ul class="ml-menu">
                        <li><a href="footer_on_off.php">ON/OFF</a></li>
                    </ul>
                </li>

        </div>

    </aside>

    {{-- left bar ends --}}


    {{-- right bar starts --}}

    <div class="navbar-right">
        <ul class="navbar-nav">
            <li>


                <a class="mega-menu" title="Sign Out" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    <i class="zmdi zmdi-power"></i>

                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                    style="display: none;">
                    @csrf
                </form>
            </li>

        </ul>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>


    {{-- right bar ends --}}



    {{-- main content starts --}}

    @yield('content')

    {{-- main content ends --}}





    {{-- Jquery Core Js --}}
    <script src="../../../admin-assets/assets/bundles/libscripts.bundle.js"></script>
    <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="../../../admin-assets/assets/bundles/vendorscripts.bundle.js"></script>
    <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="../../../admin-assets/assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
    <script src="../../../admin-assets/assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
    <script src="../../../admin-assets/assets/bundles/c3.bundle.js"></script>

    <script src="../../../admin-assets/assets/bundles/mainscripts.bundle.js"></script>
    <script src="../../../admin-assets/assets/js/pages/index.js"></script>

    @yield('scripts')





</body>


</html>
