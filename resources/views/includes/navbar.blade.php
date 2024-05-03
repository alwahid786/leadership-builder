<style>
    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    .navbar-header {
        background: white;
    }

    @media screen and (max-width: 991px) {
        .responsive-mobile-navbar {
            height: 100vh;
            overflow-y: scroll;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
        }
    }

    .dropdown-logout img {
        cursor: pointer;
    }

    .nav-link:hover {
        -webkit-transition: all 0.4s;
        transition: all 0.4s;
    }

    .nav-link {
        color: #404040 !important;
        font-size: 16px !important;
        letter-spacing: 0.5px !important;
        /* padding-left: 20px !important; */
    }

    .nav-link .icon-white {
        display: none;
    }

    .nav-second-level li {
        list-style: none !important;
        background: transparent !important;
    }

    .nav-link-collapse:after {
        float: right;
        content: "\f107";
        font-family: "FontAwesome";
        padding-left: 60px;
        padding-top: 5px;
    }

    .nav-link-show:after {
        float: right;
        content: "\f106";
        font-family: "FontAwesome";
        padding-left: 60px;
        padding-top: 5px;
    }

    .nav-item ul.nav-second-level {
        padding-left: 0;
    }

    .nav-item ul.nav-second-level>.nav-item {
        padding-left: 20px;
    }

    .has-search-input .form-control {
        padding-left: 2.375rem;
    }

    .has-search-input .form-control-feedback {
        position: absolute;
        z-index: 2;
        display: block;
        width: 2.375rem;
        height: 2.375rem;
        line-height: 2.375rem;
        text-align: center;
        pointer-events: none;
        color: #aaa;
        padding-left: 15px;
        padding-right: 10px;
    }

    .search-field-outer {
        width: 100%;
        margin: 0 auto;
    }

    .search-field {
        border-radius: 33px;
        height: 51px;
        border: none;
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .search-field:active,
    .search-field:focus {
        border: none;
        outline: none;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    .search-field-inner .fa-search {
        color: #0277fa !important;
    }

    .search-field-inner input::-webkit-input-placeholder {
        color: #9ba9b0;
        font-size: 15px;
    }

    .search-field-inner input:-ms-input-placeholder {
        color: #9ba9b0;
        font-size: 15px;
    }

    .search-field-inner input::-ms-input-placeholder {
        color: #9ba9b0;
        font-size: 15px;
    }

    .search-field-inner input::placeholder {
        color: #9ba9b0;
        font-size: 15px;
    }

    .profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        -o-object-fit: cover;
        object-fit: cover;
    }

    .profile span {
        color: #404040;
        font-size: 16px;
        font-weight: 600;
    }

    .logo-header img {
        /* position: fixed; */
        z-index: 999;
        padding-bottom: 1rem;
    }

    .content-wrapper {
        margin-top: 80px !important;
    }

    .sidenav-item .icon-white,
    .sidenav-item .icon-blue {
        width: 28px !important;
        height: 23px;
    }

    @media (min-width: 992px) {
        .logo-header img {
            margin-left: 50px;
        }

        .sidenav {
            position: absolute;
            top: 0;
            left: 0;
            width: 250px;
            height: calc(100vh - 3.5rem);
            margin-top: 4rem;
            background: white;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            padding-top: 50px;
            overflow-y: auto;
        }

        /* / width / */
        .sidenav::-webkit-scrollbar {
            width: 0px;
        }

        /* / Track / */
        .sidenav::-webkit-scrollbar-track {
            background: #0277fa;
        }

        /* / Handle / */
        .sidenav::-webkit-scrollbar-thumb {
            background: #0277fa;
        }

        /* / Handle on hover / */
        .sidenav::-webkit-scrollbar-thumb:hover {
            background: #0277fa;
        }

        .sidenav .nav-item {
            margin-top: 8px;
            margin-bottom: 8px;
            padding-left: 10px;
            padding-top: 5px;
            padding-bottom: 5px;
            position: relative;
        }

        .sidenav .nav-item {
            width: 90%;
            margin: 0 auto;
        }

        .sidenav .nav-item.active {
            background: #6dabe4;
            border-radius: 10px;
        }

        .sidenav .nav-item.active .nav-link {
            color: white !important;
        }

        .sidenav .nav-item.active .nav-link .icon-blue {
            display: none;
        }

        .sidenav .nav-item.active .nav-link .icon-white {
            display: block;
        }

        .sidenav .nav-item.active .sidenav-item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .sidenav .nav-item:hover {
            background: #6dabe4;
            border-radius: 10px;
        }

        .sidenav .disabled-item {
            background: #e3e3e3 !important;
            /* border-radius: 10px; */
        }

        .sidenav .disabled-item i {
            color: gray;
        }

        .sidenav .nav-item:hover .nav-link {
            color: white !important;
        }

        .sidenav .disabled-item:hover {
            background: #e3e3e3 !important;
            border-radius: 0px;
        }

        .sidenav .disabled-item:hover .nav-link {
            color: gray !important;
        }

        .sidenav .disabled-item:hover i {
            color: gray !important;
        }



        .sidenav .nav-item:hover .nav-link .icon-white {
            display: block;
        }

        .sidenav .nav-item:hover .nav-link .icon-blue {
            display: none;
        }

        .sidenav .nav-item:hover .sidenav-item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .sidenav .nav-item .sidenav-item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .search-field-outer {
            width: 47%;
            margin: 0 auto;
        }

        .content-wrapper {
            margin-left: 250px;
            margin-top: 80px;
        }

        .navbar-collapse {
            padding-left: 15% !important;
        }

        .navbar-header-right-section {
            padding-right: 70px;
        }
    }

    /* media query end */
    .search-field,
    .search-field-inner {
        width: 100% !important;
    }

    .navbar-expand-lg .sidenav {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .nav-link-text {
        padding-left: 15px !important;
    }

    /* notification */
    .notification-dropdown {
        left: -345px !important;
        border-radius: 10px;
        max-width: 400px;
    }

    @media (max-width: 992px) {
        .notification-dropdown {
            left: 0px !important;
            border-radius: 10px;
            width: 400px;
        }
    }

    .notification-profile img {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .notification-profile p span {
        color: #0277fa;
        font-size: 16px;
        font-weight: bold;
        padding-right: 5px;
    }

    .notification-profile p {
        color: #a8a8a8;
        margin-bottom: 0px;
    }

    .notification-profile p:hover {
        text-decoration: none !important;
        border-bottom: none !important;
    }

    .notification-area:hover {
        text-decoration: none !important;
        border-bottom: none !important;
    }

    .notification-profile:hover {
        background-color: gainsboro !important;
    }

    .notification-profile {
        border-bottom: 1px solid gainsboro !important;
        padding-left: 20px;
    }

    .notification-area:last-of-type .notification-profile {
        border-bottom: none !important;
    }

    .dropdown-menu {
        left: -195px;
    }

    .icon-button {
        position: relative;
        cursor: pointer;
    }

    .icon-button__badge {
        position: absolute;
        top: 3px;
        right: 2px;
        width: 8px;
        height: 8px;
        background: #00ffb8;
        color: #ffffff;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        border-radius: 50%;
    }

    li i {
        color: #6dabe4;
    }

    li.active i {
        color: white;
    }

    li:hover i {
        color: white;
    }

    .navbar-toggler i {
        color: #6dabe4;
    }

    .dropdown-menu .fa-sign-out {
        color: #6dabe4;
    }

    .dropdown-menu .logout {
        font-size: 14px;
        color: #a8a8a8;
    }

    .logout-dropdown {
        left: -150px !important;
    }

    .logout-dropdown .dropdown-item:hover {
        background-color: #6dabe4;
        color: white;
    }

    .logout-dropdown .dropdown-item:hover .fa-sign-out {
        color: white;
    }

    .numberingSlideDiv {
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        color: #6dabe4;
        font-weight: 600;
        bottom: 0px;
        right: 5px;
        border: 1px solid #6dabe4;
        line-height: 1.5px;
    }
</style>
@php
$page = auth()->user()->page_number;
@endphp
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-header">
    <a class="navbar-brand logo-header" href="#">
        <!-- <img style="width: 100%; height:100%; object-fit:contain;" src="{{asset('assets/images/site-logo.png')}}" alt="Admin logo"> -->
        <div class="ml-3">
            <span class="text-secondary" style="font-size:12px; line-height:0.5;">TRANSFORMATIONAL</span>
            <span style="color: #6dabe4;display: block; font-size:18px; font-weight: 600; line-height:0.4">LEADERSHIP BUILDER</span>
        </div>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <form class="form-inline  mt-2 mt-md-0 ml-auto navbar-header-right-section pt-2 pt-lg-0">
            <div class="form-group has-search profile mr-2">

                <span class="mr-2">{{auth()->user()->name}} {{auth()->user()->last_name}}</span>
                <img src="{{asset('assets/images/profile.png')}}">
            </div>
            <div class="form-group has-search">
                <div class="dropdown dropdown-logout">
                    <img src="{{asset('assets/images/Vector.png')}}" class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown">
                    <div class="dropdown-menu text-center logout-dropdown" aria-labelledby="dropdownMenuButton">
                        @if(auth()->user()->email == 'don@donwilliamsglobal.com')
                        <a class="dropdown-item logout text-left" href="{{(url('page-codes'))}}"><i class="fas fa-lock pr-2" aria-hidden="true"></i>Page Codes</a>
                        @endif
                        <a class="dropdown-item logout text-left" href="{{(url('logout'))}}"><i class="fas fa-sign-out-alt pr-2" aria-hidden="true"></i>Logout</a>
                    </div>
                </div>
            </div>
        </form>
        <ul class="navbar-nav mr-auto sidenav pb-5" id="navAccordion">
            <li class="nav-item my-1">
                <a class="nav-link sidenav-item dasboard-link d-flex align-items-center" href="{{url('/cover')}}">
                    <!-- <img src="{{asset('assets/images/d-white.png')}}" class="icon-white pr-2">
                    <img src="{{asset('assets/images/d-blue.png')}}" class="icon-blue pr-2"> -->
                    <i style="font-size: 22px; width:20px;" class="fas fa-book mr-3"></i>
                    <span class="">Cover Page</span>
                </a>
            </li>
            {{--<li class="nav-item my-1  <?php if ($page < 1) echo "disabled-item my-0"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 1) echo "style='pointer-events: none'"; ?> href="{{url('slide/1')}}">
            <div class="position-relative">
                <i style="font-size: 22px; width:20px;" class="fas fa-file-alt mr-3"></i>
                <div class="position-absolute numberingSlideDiv">
                    1
                </div>
            </div>
            Slide 01
            </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 2) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 2) echo "style='pointer-events: none'"; ?> href="{{url('slide/2')}}">
                    <div class="position-relative">
                        <i style="font-size: 22px; width:20px;" class="fas fa-file-alt mr-3"></i>
                        <div class="position-absolute numberingSlideDiv">
                            2
                        </div>
                    </div>
                    Slide 02
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 3) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 3) echo "style='pointer-events: none'"; ?> href="{{url('slide/3')}}">
                    <div class="position-relative">
                        <i style="font-size: 22px; width:20px;" class="fas fa-file-alt mr-3"></i>
                        <div class="position-absolute numberingSlideDiv">
                            3
                        </div>
                    </div>
                    Slide 03
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 4) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 4) echo "style='pointer-events: none'"; ?> href="{{url('slide/4')}}">
                    <div class="position-relative">
                        <i style="font-size: 22px; width:20px;" class="fas fa-file-alt mr-3"></i>
                        <div class="position-absolute numberingSlideDiv">
                            4
                        </div>
                    </div>
                    Slide 04
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 5) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 5) echo "style='pointer-events: none'"; ?> href="{{url('slide/5')}}">
                    <div class="position-relative">
                        <i style="font-size: 22px; width:20px;" class="fas fa-file-alt mr-3"></i>
                        <div class="position-absolute numberingSlideDiv">
                            5
                        </div>
                    </div>
                    Slide 05
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 6) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 6) echo "style='pointer-events: none'"; ?> href="{{url('slide/6')}}">
                    <div class="position-relative">
                        <i style="font-size: 22px; width:20px;" class="fas fa-file-alt mr-3"></i>
                        <div class="position-absolute numberingSlideDiv">
                            6
                        </div>
                    </div>
                    Slide 06
                </a>
            </li>--}}
            <li class="nav-item my-1 <?php if ($page < 7) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 7) echo "style='pointer-events: none'"; ?> href="{{url('wow ')}}">
                    <i style="font-size: 22px; width:20px;" class="fas fa-surprise mr-3"></i>
                    Wow
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 8) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 8) echo "style='pointer-events: none'"; ?> href="{{url('gratitude')}}">
                    <i style="font-size: 22px; width:20px;" class="fas fa-heart mr-3"></i>
                    Gratitude
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 9) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 9) echo "style='pointer-events: none'"; ?> href="{{url('desire')}}">
                    <i style="font-size: 22px; width:20px;" class="fas fa-fire mr-3"></i>
                    Desire
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 10) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 10) echo "style='pointer-events: none'"; ?> href="{{url('see-it')}}">
                    <i style="font-size: 22px; width:20px;" class="fas fa-binoculars mr-3"></i>
                    See It
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 11) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 11) echo "style='pointer-events: none'"; ?> href="{{url('say-it')}}">
                    <i style="font-size: 22px; width:20px;" class="fas fa-microphone mr-3"></i>
                    Say It
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 12) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 12) echo "style='pointer-events: none'"; ?> href="{{url('live-it')}}">
                    <i style="font-size: 22px; width:20px;" class="fas fa-play mr-3"></i>
                    Live It
                </a>
            </li>
            <li class="nav-item my-1 <?php if ($page < 13) echo "disabled-item"; ?>">
                <a class="nav-link sidenav-item d-flex align-items-center" <?php if ($page < 13) echo "style='pointer-events: none'"; ?> href="{{url('conclusion')}}">
                    <i style="font-size: 22px; width:20px;" class="fas fa-bullseye mr-3"></i>
                    Conclusion
                </a>
            </li>


        </ul>

    </div>
</nav>