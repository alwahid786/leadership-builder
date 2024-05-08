<style>
    :root {
        --blue: #1177AA;
    }

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

    .nav-link {
        color: #ffffff !important;
        font-size: 16px !important;
        font-weight: 500;
        letter-spacing: 0.5px !important;
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
        border-radius: 10px;
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
            margin-top: 63px;
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
            padding-left: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
            position: relative;
            font-size: 20px;
        }

        .sidenav .nav-item.active {
            background: linear-gradient(to right, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0));
            /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0));
            background: -moz-linear-gradient(left, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0));
            background: -o-linear-gradient(left, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0));
            color: var(--blue) !important;
            font-weight: 500 !important;
        }

        .sidenav .nav-item.active .nav-link {
            font-weight: 500 !important;
            color: var(--blue) !important;
        }

        .sidenav .nav-item.active .sidenav-item {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .sidenav .nav-item:hover {
            background: linear-gradient(to right, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0));
            /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(left, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0));
            background: -moz-linear-gradient(left, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0));
            background: -o-linear-gradient(left, rgba(255, 255, 255, 1) 60%, rgba(255, 255, 255, 0));
            color: var(--blue);
        }

        .sidenav .disabled-item {
            background: #e3e3e3 !important;
        }

        .sidenav .disabled-item i {
            color: gray;
        }

        .sidenav .nav-item:hover .nav-link {
            color: var(--blue) !important;
        }

        .sidenav .disabled-item:hover {
            background: #e3e3e3 !important;
            border-radius: 0px;
        }

        .sidenav .disabled-item:hover i {
            color: gray !important;
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

    .nav-link img {
        width: 15%;
        height: 100%;
    }
</style>
@php
$page = auth()->user()->page_number;
@endphp
<nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-header">
    <a class="navbar-brand pl-4" href="#">
        <svg width="144" height="52" viewBox="0 0 144 52" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M31.0014 25.1251C29.8194 24.9326 28.8847 24.7677 27.9501 24.6577C24.5415 24.1904 21.2428 23.4208 18.3289 21.469C15.9099 19.8472 14.0406 17.593 12.2263 15.3664C10.5495 13.3047 8.92764 11.1881 7.30578 9.09892C7.00338 8.65908 6.56353 8.63156 6.67351 9.23636C6.78348 9.92355 6.94839 10.6108 7.16834 11.2705C8.46034 15.284 9.72481 19.3249 11.0993 23.3108C11.5941 24.7677 11.6216 26.1147 11.1268 27.5716C10.1646 30.2655 9.25751 32.9869 8.40535 35.7083C8.21292 36.2856 8.29537 36.9454 8.26791 37.5502C8.92764 37.5226 9.61483 37.6326 10.1921 37.4127C11.759 36.8904 13.2709 36.1756 14.8378 35.5984C16.3222 35.0486 16.762 35.1861 17.5042 36.6155C19.6209 40.6564 21.7101 44.7523 23.7992 48.8207C24.2665 49.7278 24.7614 50.6349 25.2287 51.5696C25.3386 51.5421 25.3111 51.5421 25.4486 51.5146C25.2562 49.8653 25.0638 48.1884 24.8713 46.539C24.5415 43.7351 24.2116 40.9313 23.8817 38.1274C23.7442 36.7805 23.6618 35.406 23.5243 34.0315C23.3594 32.5746 23.9092 31.365 24.9538 30.4304C26.4932 29.001 28.1151 27.6541 29.6819 26.2796C30.0393 25.9497 30.4241 25.6198 31.0014 25.1251Z" fill="white" />
            <path d="M16.295 17.2082C16.6249 16.1361 16.7623 15.284 17.1197 14.5143C18.6591 11.1605 22.6725 10.2535 25.2565 12.645C27.3181 14.5417 27.2907 18.4452 25.174 20.6718C24.7891 21.0566 24.3768 21.414 23.7995 21.9363C25.5038 22.2387 27.0707 22.5136 28.6101 22.816C29.5723 23.0084 30.5893 23.0909 31.4965 23.4207C32.7885 23.888 33.2008 25.3449 32.3212 26.4171C31.8263 27.0493 31.1666 27.5441 30.5344 28.0938C29.1874 29.2759 27.813 30.3755 26.4935 31.585C25.7512 32.2447 25.2839 33.0694 25.3664 34.1415C25.6688 37.3302 25.9437 40.5189 26.2461 43.7352C26.2735 43.9001 26.356 44.0651 26.4385 44.3125C32.5686 41.2612 36.4445 36.4506 37.2967 29.6882C38.3138 21.579 35.235 15.119 28.2253 10.8307C22.59 7.39459 16.6523 7.36707 10.4673 10.0885C12.474 12.4801 14.3433 14.7891 16.295 17.2082Z" fill="white" />
            <path d="M20.3631 45.6869C18.8238 42.883 17.3394 40.1891 15.8275 37.4127C14.508 37.935 13.271 38.4298 12.0065 38.8696C11.0993 39.1995 10.1922 39.5293 9.25758 39.6943C7.19588 40.1066 5.73896 38.7322 6.20628 36.6705C6.72857 34.4164 7.47075 32.1897 8.21299 29.9907C10.0273 24.6028 9.91731 26.2796 8.24046 21.0292C7.44329 18.5552 6.6186 16.1086 5.79394 13.6346C5.79394 13.6071 5.73896 13.6071 5.73896 13.5797C0.625988 18.0879 -2.1779 27.1867 2.08291 35.6534C5.76645 42.993 14.1232 46.7315 20.3631 45.6869Z" fill="white" />
            <path d="M21.243 20.5893C22.7275 20.5069 24.0195 19.5722 24.5692 18.0878C25.1465 16.4934 24.7892 14.899 23.6346 13.937C22.8924 13.3047 22.0127 13.2772 21.1606 13.4421C19.9236 13.662 18.659 15.119 18.4117 16.5484C18.1643 18.0329 18.769 19.4898 19.951 20.177C20.3359 20.3969 20.8307 20.4519 21.243 20.5893Z" fill="white" />
            <path d="M2.52295 2.88636C4.17229 4.0409 4.58464 5.38786 3.84243 7.22964C5.4368 5.96514 6.89369 5.99263 8.46063 7.20217C7.74591 5.33289 8.18569 3.95843 10.055 2.88636C8.9554 2.66645 8.04825 2.69393 7.47097 2.28159C6.89369 1.84177 6.61881 0.96212 6.06906 0C5.60173 2.0067 4.50217 2.94134 2.52295 2.88636Z" fill="white" />
            <path d="M57.1743 20.6008H61.0783V21.7848H55.7183V10.6328H57.1743V20.6008ZM64.0806 11.8168V15.5448H68.1446V16.7448H64.0806V20.5848H68.6246V21.7848H62.6246V10.6168H68.6246V11.8168H64.0806ZM77.4197 19.3048H72.5557L71.6597 21.7848H70.1237L74.1557 10.6968H75.8357L79.8517 21.7848H78.3157L77.4197 19.3048ZM77.0037 18.1208L74.9877 12.4888L72.9717 18.1208H77.0037ZM85.081 10.6328C86.297 10.6328 87.3476 10.8621 88.233 11.3208C89.129 11.7688 89.8116 12.4141 90.281 13.2568C90.761 14.0995 91.001 15.0915 91.001 16.2328C91.001 17.3741 90.761 18.3661 90.281 19.2088C89.8116 20.0408 89.129 20.6808 88.233 21.1288C87.3476 21.5661 86.297 21.7848 85.081 21.7848H81.609V10.6328H85.081ZM85.081 20.5848C86.521 20.5848 87.6196 20.2061 88.377 19.4488C89.1343 18.6808 89.513 17.6088 89.513 16.2328C89.513 14.8461 89.129 13.7635 88.361 12.9848C87.6036 12.2061 86.5103 11.8168 85.081 11.8168H83.065V20.5848H85.081ZM94.3775 11.8168V15.5448H98.4415V16.7448H94.3775V20.5848H98.9215V21.7848H92.9215V10.6168H98.9215V11.8168H94.3775ZM106.997 21.7848L104.341 17.2248H102.581V21.7848H101.125V10.6328H104.725C105.567 10.6328 106.277 10.7768 106.853 11.0648C107.439 11.3528 107.877 11.7421 108.165 12.2328C108.453 12.7235 108.597 13.2835 108.597 13.9128C108.597 14.6808 108.373 15.3581 107.925 15.9448C107.487 16.5315 106.826 16.9208 105.941 17.1128L108.741 21.7848H106.997ZM102.581 16.0568H104.725C105.514 16.0568 106.106 15.8648 106.501 15.4808C106.895 15.0861 107.093 14.5635 107.093 13.9128C107.093 13.2515 106.895 12.7395 106.501 12.3768C106.117 12.0141 105.525 11.8328 104.725 11.8328H102.581V16.0568ZM114.395 21.8968C113.659 21.8968 112.998 21.7688 112.411 21.5128C111.835 21.2461 111.382 20.8835 111.051 20.4248C110.72 19.9555 110.55 19.4168 110.539 18.8088H112.091C112.144 19.3315 112.358 19.7741 112.731 20.1368C113.115 20.4888 113.67 20.6648 114.395 20.6648C115.088 20.6648 115.632 20.4941 116.027 20.1528C116.432 19.8008 116.635 19.3528 116.635 18.8088C116.635 18.3821 116.518 18.0355 116.283 17.7688C116.048 17.5021 115.755 17.2995 115.403 17.1608C115.051 17.0221 114.576 16.8728 113.979 16.7128C113.243 16.5208 112.651 16.3288 112.203 16.1368C111.766 15.9448 111.387 15.6461 111.067 15.2408C110.758 14.8248 110.603 14.2701 110.603 13.5768C110.603 12.9688 110.758 12.4301 111.067 11.9608C111.376 11.4915 111.808 11.1288 112.363 10.8728C112.928 10.6168 113.574 10.4888 114.299 10.4888C115.344 10.4888 116.198 10.7501 116.859 11.2728C117.531 11.7955 117.91 12.4888 117.995 13.3528H116.395C116.342 12.9261 116.118 12.5528 115.723 12.2328C115.328 11.9021 114.806 11.7368 114.155 11.7368C113.547 11.7368 113.051 11.8968 112.667 12.2168C112.283 12.5261 112.091 12.9635 112.091 13.5288C112.091 13.9341 112.203 14.2648 112.427 14.5208C112.662 14.7768 112.944 14.9741 113.275 15.1128C113.616 15.2408 114.091 15.3901 114.699 15.5608C115.435 15.7635 116.027 15.9661 116.475 16.1688C116.923 16.3608 117.307 16.6648 117.627 17.0808C117.947 17.4861 118.107 18.0408 118.107 18.7448C118.107 19.2888 117.963 19.8008 117.675 20.2808C117.387 20.7608 116.96 21.1501 116.395 21.4488C115.83 21.7475 115.163 21.8968 114.395 21.8968ZM128.842 10.6328V21.7848H127.386V16.7288H121.706V21.7848H120.25V10.6328H121.706V15.5288H127.386V10.6328H128.842ZM132.784 10.6328V21.7848H131.328V10.6328H132.784ZM142.721 13.8968C142.721 14.8248 142.401 15.5981 141.761 16.2168C141.132 16.8248 140.167 17.1288 138.865 17.1288H136.721V21.7848H135.265V10.6328H138.865C140.124 10.6328 141.079 10.9368 141.729 11.5448C142.391 12.1528 142.721 12.9368 142.721 13.8968ZM138.865 15.9288C139.676 15.9288 140.273 15.7528 140.657 15.4008C141.041 15.0488 141.233 14.5475 141.233 13.8968C141.233 12.5208 140.444 11.8328 138.865 11.8328H136.721V15.9288H138.865ZM61.3023 40.0408C61.7077 40.1048 62.0757 40.2701 62.4063 40.5368C62.7477 40.8035 63.0143 41.1341 63.2063 41.5288C63.409 41.9235 63.5103 42.3448 63.5103 42.7928C63.5103 43.3581 63.3663 43.8701 63.0783 44.3288C62.7903 44.7768 62.369 45.1341 61.8143 45.4008C61.2703 45.6568 60.625 45.7848 59.8783 45.7848H55.7183V34.6328H59.7183C60.4757 34.6328 61.121 34.7608 61.6543 35.0168C62.1877 35.2621 62.5877 35.5981 62.8543 36.0248C63.121 36.4515 63.2543 36.9315 63.2543 37.4648C63.2543 38.1261 63.073 38.6755 62.7103 39.1128C62.3583 39.5395 61.889 39.8488 61.3023 40.0408ZM57.1743 39.4488H59.6223C60.305 39.4488 60.833 39.2888 61.2063 38.9688C61.5797 38.6488 61.7663 38.2061 61.7663 37.6408C61.7663 37.0755 61.5797 36.6328 61.2063 36.3128C60.833 35.9928 60.2943 35.8328 59.5903 35.8328H57.1743V39.4488ZM59.7503 44.5848C60.4757 44.5848 61.041 44.4141 61.4463 44.0728C61.8517 43.7315 62.0543 43.2568 62.0543 42.6488C62.0543 42.0301 61.841 41.5448 61.4143 41.1928C60.9877 40.8301 60.417 40.6488 59.7023 40.6488H57.1743V44.5848H59.7503ZM66.9548 34.6328V41.6888C66.9548 42.6808 67.1948 43.4168 67.6748 43.8968C68.1655 44.3768 68.8428 44.6168 69.7068 44.6168C70.5602 44.6168 71.2268 44.3768 71.7068 43.8968C72.1975 43.4168 72.4428 42.6808 72.4428 41.6888V34.6328H73.8988V41.6728C73.8988 42.6008 73.7122 43.3848 73.3388 44.0248C72.9655 44.6541 72.4588 45.1235 71.8188 45.4328C71.1895 45.7421 70.4802 45.8968 69.6908 45.8968C68.9015 45.8968 68.1868 45.7421 67.5468 45.4328C66.9175 45.1235 66.4162 44.6541 66.0428 44.0248C65.6802 43.3848 65.4988 42.6008 65.4988 41.6728V34.6328H66.9548ZM77.7837 34.6328V45.7848H76.3277V34.6328H77.7837ZM81.7212 44.6008H85.6252V45.7848H80.2652V34.6328H81.7212V44.6008ZM90.6435 34.6328C91.8595 34.6328 92.9101 34.8621 93.7955 35.3208C94.6915 35.7688 95.3741 36.4141 95.8435 37.2568C96.3235 38.0995 96.5635 39.0915 96.5635 40.2328C96.5635 41.3741 96.3235 42.3661 95.8435 43.2088C95.3741 44.0408 94.6915 44.6808 93.7955 45.1288C92.9101 45.5661 91.8595 45.7848 90.6435 45.7848H87.1715V34.6328H90.6435ZM90.6435 44.5848C92.0835 44.5848 93.1821 44.2061 93.9395 43.4488C94.6968 42.6808 95.0755 41.6088 95.0755 40.2328C95.0755 38.8461 94.6915 37.7635 93.9235 36.9848C93.1661 36.2061 92.0728 35.8168 90.6435 35.8168H88.6275V44.5848H90.6435ZM99.94 35.8168V39.5448H104.004V40.7448H99.94V44.5848H104.484V45.7848H98.484V34.6168H104.484V35.8168H99.94ZM112.559 45.7848L109.903 41.2248H108.143V45.7848H106.687V34.6328H110.287C111.13 34.6328 111.839 34.7768 112.415 35.0648C113.002 35.3528 113.439 35.7421 113.727 36.2328C114.015 36.7235 114.159 37.2835 114.159 37.9128C114.159 38.6808 113.935 39.3581 113.487 39.9448C113.05 40.5315 112.388 40.9208 111.503 41.1128L114.303 45.7848H112.559ZM108.143 40.0568H110.287C111.076 40.0568 111.668 39.8648 112.063 39.4808C112.458 39.0861 112.655 38.5635 112.655 37.9128C112.655 37.2515 112.458 36.7395 112.063 36.3768C111.679 36.0141 111.087 35.8328 110.287 35.8328H108.143V40.0568Z" fill="white" />
        </svg>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <form class="form-inline  mt-2 mt-md-0 ml-auto navbar-header-right-section pt-2 pt-lg-0">
            <div class="form-group has-search profile mr-2">
                <span class="mr-3 text-white">{{auth()->user()->name}} {{auth()->user()->last_name}}</span>
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
            <div class="nav-menu my-1" data-toggle="collapse" data-target="#submenu" aria-expanded="false" aria-controls="submenu">
                GENERAL <i class="fas fa-caret-down ml-2"></i>
            </div>
            <div class="collapse show" id="submenu">
                <li class="nav-item plans my-1">
                    <a class="nav-link d-flex align-items-center" href="{{url('/cover')}}">
                        <img src="{{asset('assets/images/plans-white.png')}}" class="icon-white pr-2">
                        <span class="">Plan & Pricing</span>
                    </a>
                </li>
                <li class="nav-item invoices my-1">
                    <a class="nav-link d-flex align-items-center" href="{{url('/cover')}}">
                        <img src="{{asset('assets/images/invoice-white.png')}}" class="icon-white pr-2">
                        <span class="">Invoices</span>
                    </a>
                </li>
                <li class="nav-item settings my-1">
                    <a class="nav-link d-flex align-items-center" href="{{url('/cover')}}">
                        <img src="{{asset('assets/images/setting-white.png')}}" class="icon-white pr-2">
                        <span class="">Settings</span>
                    </a>
                </li>
            </div>
            <div class="nav-menu my-1" data-toggle="collapse" data-target="#days" aria-expanded="false" aria-controls="submenu">
                DAYS <i class="fas fa-caret-down ml-2"></i>
            </div>
            <div class="collapse show" id="days">
                <li class="nav-item my-1 active">
                    <a class="nav-link d-flex align-items-center" href="{{url('/cover')}}">
                        <span class="">Day 1 (Today)</span>
                    </a>
                </li>
                <div style="font-size: 16px;padding-left:28px;" class="nav-menu my-1 mb-3" data-toggle="collapse" data-target="#pastDays" aria-expanded="false" aria-controls="submenu">
                    Past Days <i class="fas fa-caret-down ml-2"></i>
                </div>
                <div style="font-size: 16px;padding-left:28px;" class="nav-menu my-1" data-toggle="collapse" data-target="#upcomingDays" aria-expanded="false" aria-controls="submenu">
                    Upcoming Days <i class="fas fa-caret-down ml-2"></i>
                </div>
            </div>
            {{--<li class="nav-item my-1 <?php if ($page < 7) echo "disabled-item"; ?>">
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
            </li>--}}


        </ul>
    </div>
</nav>
