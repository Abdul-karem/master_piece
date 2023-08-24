<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>service provider Dahboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logiT.png') }}">
    <!-- Pignose Calender -->
    <link href="{{ asset('plugins/pg-calendar/css/pignose.calendar.min.css') }}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{ asset('plugins/chartist/css/chartist.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css') }}">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>


<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->

        <div class="nav-header" style="background-color: #272630">
            <div class="brand-logo" style="background-color: #272630">
                <a href="index.html">
                    <p style="font-size: 30px ; color:#fee469">Elite</p>
                    <span class="brand-title">
                        <span class="nav-text" style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif"></span>
                    </span>
                </a>
            </div>
        </div>
        {{-- <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img src="images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="./images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div> --}}
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content clearfix">
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>

                <div class="header-right">

                    <ul class="clearfix">
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">

                                <span class="activity active"></span>

                                <img src="images/user/1.png" height="40" width="40" alt="">
                            </div>

                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            {{-- <a href="{{ route('profile.update', $lessor->id) }}}"><i class="icon-user"></i> <span>Profile</span></a> --}}
                                        </li>
                                        <li><a href="{{route('profile.index')}}"><i class="icon-key"></i> <span>Profile</span></a></li>
                                        <li><a href="{{route('logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="#"><i class="icon-speedometer menu-icon"></i> <span class="nav-text">Dashboard</span></a></li>
                    <li><a href="{{ route('office.index')}}"><i class="icon-office icon-speedometer menu-icon"></i> <span class="nav-text">Elite</span></a></li>
                    {{-- <li><a href="{{route('reversationlessor.index')}}"><i class="icon-speedometer menu-icon"></i> <span class="nav-text">Reversation</span></a></li> --}}
                    @if(auth()->check())
                    <li><a href="{{ route('comments', ['userId' => auth()->user()->id]) }}"><i class="icon-speedometer menu-icon"></i> <span class="nav-text">Comment</span></a></li>
                @endif
                 {{-- <li><a href="page-login.html"><i class="icon-user"></i> <span class="nav-text">Profile</span></a></li> --}}
                    <li><a href="{{ route('logout') }}"><i class="icon-key"></i> <span class="nav-text">Logout</span></a></li>

                   
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <div class="content-body">
