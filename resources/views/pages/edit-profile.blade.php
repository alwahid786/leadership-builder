@extends('layouts.default-layout')
@section('content')
<style>
    body {
        background-color: #F0F0F0;
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

    @media (min-width: 992px) {
        .navbar-collapse {
            padding-left: 15% !important;
        }

        .navbar-header-right-section {
            padding-right: 70px;
        }
    }

    .navbar-expand-lg .sidenav {
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
    }

    .navbar-toggler i {
        color: #003f77;
    }

    .navBtns {
        border: 1px solid #6dabe4;
        padding: 5px 0px;
        border-radius: 5px;
        width: 150px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .buttonSection a:hover {
        background-color: #6dabe4;
        color: white;
    }

    .startBtn {
        background-color: #6dabe4;
        border-radius: 5px;
        padding: 5px 15px;
        border: none;
        color: white;
    }

    .stopBtn {
        background-color: #ce2c2c;
        border-radius: 5px;
        padding: 5px 15px;
        border: none;
        color: white;
    }

    .resetBtn {
        background-color: #2cb0ce;
        border-radius: 5px;
        padding: 5px 15px;
        border: none;
        color: white;
    }

    #pageCode::placeholder {
        /* Chrome, Firefox, Opera, Safari 10.1+ */
        color: gray !important;
        opacity: 1 !important;
        /* Firefox */
    }
</style>
@include('includes.navbar')
<section class="contentSection position-relative">
    <div class="container-fluid contentRow">
        <div class="row py-5">
            <div class="col-md-3">
                <h2 class="profile-heading">
                    PROFILE PICTURE
                </h2>
                <div class="mt-2 pr-5">
                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile iamge" class="profile-img">
                    {{-- Change button  --}}
                    <div style="max-width: 255px">
                        <button class="change-img d-flex align-items-center justify-content-center" style="gap:11px">
                            <svg width="24" height="20" viewBox="0 0 24 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.6689 3.84003H17.3089L15.6737 1.51043C15.3996 1.09265 15.0256 0.749887 14.5856 0.513236C14.1455 0.276585 13.6533 0.15353 13.1537 0.15523H10.8465C10.3468 0.15353 9.85467 0.276585 9.41462 0.513236C8.97457 0.749887 8.60055 1.09265 8.32649 1.51043L6.74729 3.84003H3.38729C2.98117 3.83251 2.57767 3.90658 2.20071 4.05786C1.82374 4.20913 1.48097 4.43454 1.19271 4.72071C0.904445 5.00688 0.676556 5.348 0.522543 5.72386C0.368529 6.09972 0.291524 6.50267 0.29609 6.90883V16.8096C0.299041 17.6137 0.619768 18.384 1.18834 18.9526C1.75691 19.5212 2.52721 19.8419 3.33129 19.8448H20.6689C21.0718 19.8508 21.4718 19.7767 21.8459 19.627C22.2199 19.4772 22.5606 19.2548 22.8481 18.9725C23.1356 18.6902 23.3642 18.3537 23.5208 17.9824C23.6773 17.6112 23.7587 17.2125 23.7601 16.8096V6.90883C23.7647 6.50267 23.6877 6.09972 23.5336 5.72386C23.3796 5.348 23.1517 5.00688 22.8635 4.72071C22.5752 4.43454 22.2324 4.20913 21.8555 4.05786C21.4785 3.90658 21.075 3.83251 20.6689 3.84003ZM12.0001 16.16C11.1534 16.16 10.3258 15.9088 9.62198 15.4382C8.91816 14.9676 8.36979 14.2987 8.0463 13.5163C7.72281 12.7339 7.63874 11.8731 7.80474 11.0428C7.97073 10.2126 8.37932 9.45028 8.97879 8.85238C9.57825 8.25449 10.3416 7.84789 11.1723 7.68408C12.003 7.52026 12.8636 7.60659 13.6451 7.93213C14.4267 8.25767 15.0941 8.80778 15.5629 9.51283C16.0317 10.2179 16.2807 11.0462 16.2785 11.8928C16.2755 13.0256 15.8235 14.1109 15.0214 14.9109C14.2194 15.7108 13.1329 16.16 12.0001 16.16Z" fill="white"/>
                            </svg>                        
                            Change Image
                            <input type="file" class="change-img-input">
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="bg-white edit-profile-view">
                    <form class="position-relative" style="z-index: 1">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstName" class="text-left">First Name</label>
                                    <input type="text" class="form-control mt-2" id="firstName">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastName" class="text-left">Last Name</label>
                                    <input type="text" class="form-control mt-2" id="lastName">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="email" class="text-left">Email</label>
                                    <input type="email" class="form-control mt-2" id="email">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <div class="form-group">
                                    <label for="tel" class="text-left">Phone Number</label>
                                    <input type="tel" class="form-control mt-2" id="tel">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <button class="save-btn position-relative mt-4 ml-auto d-flex align-items-center justify-content-center">Save</button>
            </div>
        </div>
        <div class="position-absolute" style="right:0; bottom: 0;">
            <svg width="431" height="441" viewBox="0 0 431 441" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M438.195 155.806C429.131 154.49 420.481 151.147 412.889 146.027C405.297 140.906 398.958 134.14 394.345 126.232C389.732 118.324 386.963 109.477 386.245 100.351C385.527 91.2253 386.878 82.0549 390.197 73.5231C392.308 67.9454 392.618 61.8475 391.086 56.0843C389.554 50.3211 386.256 45.1816 381.654 41.3864C361.337 24.3347 338.211 10.9394 313.307 1.79763C307.637 -0.307829 301.446 -0.57089 295.616 1.04592C289.787 2.66273 284.617 6.07693 280.843 10.8021C275.162 18.0624 267.901 23.9345 259.612 27.973C251.323 32.0114 242.222 34.1103 233 34.1103C223.778 34.1103 214.678 32.0114 206.388 27.973C198.099 23.9345 190.838 18.0624 185.158 10.8021C181.383 6.07693 176.213 2.66273 170.384 1.04592C164.555 -0.57089 158.364 -0.307829 152.693 1.79763C129.698 10.2377 108.199 22.2918 89.0063 37.5051C84.1683 41.3331 80.6836 46.6085 79.0624 52.559C77.4413 58.5095 77.7687 64.8224 79.9969 70.5734C83.5813 79.3309 85.0623 88.8061 84.321 98.2389C83.5797 107.672 80.6368 116.8 75.7284 124.891C70.82 132.981 64.0827 139.81 56.0569 144.828C48.0311 149.846 38.9403 152.915 29.5137 153.787C23.3936 154.441 17.6454 157.042 13.1153 161.206C8.58516 165.371 5.51249 170.879 4.34967 176.92C1.45733 191.229 0.000336147 205.791 0.000336147 220.39C-0.0209227 232.611 0.9662 244.814 2.95167 256.873C3.93982 263.108 6.95533 268.843 11.532 273.193C16.1086 277.543 21.9915 280.264 28.271 280.937C37.9047 281.841 47.1816 285.038 55.3254 290.26C63.4693 295.483 70.243 302.579 75.0796 310.955C79.9162 319.331 82.6751 328.743 83.1252 338.403C83.5754 348.063 81.7037 357.691 77.6669 366.48C75.0252 372.197 74.3699 378.632 75.8051 384.764C77.2403 390.895 80.6839 396.372 85.5889 400.324C105.784 417.066 128.687 430.245 153.314 439.292C156.463 440.382 159.768 440.959 163.1 441C167.67 440.99 172.17 439.885 176.224 437.778C180.278 435.671 183.768 432.624 186.4 428.891C191.937 420.829 199.358 414.239 208.02 409.694C216.682 405.149 226.324 402.785 236.107 402.809C245.586 402.82 254.932 405.044 263.399 409.303C271.867 413.561 279.223 419.737 284.881 427.338C288.645 432.395 293.977 436.065 300.045 437.778C306.114 439.491 312.579 439.15 318.433 436.808C340.952 427.75 361.916 415.231 380.567 399.703C385.252 395.832 388.588 390.575 390.095 384.689C391.602 378.803 391.203 372.591 388.955 366.946C385.301 358.301 383.708 348.926 384.302 339.561C384.895 330.195 387.658 321.096 392.373 312.981C397.088 304.865 403.626 297.957 411.47 292.8C419.315 287.643 428.251 284.379 437.574 283.266C443.619 282.43 449.242 279.693 453.626 275.45C458.011 271.208 460.93 265.68 461.961 259.668C464.456 246.719 465.807 233.575 466 220.39C466.003 206.482 464.703 192.604 462.117 178.938C461.068 173.059 458.192 167.659 453.898 163.507C449.604 159.354 444.109 156.659 438.195 155.806ZM310.667 220.39C310.667 235.742 306.112 250.75 297.578 263.516C289.043 276.281 276.914 286.231 262.722 292.106C248.53 297.981 232.914 299.518 217.848 296.523C202.782 293.528 188.943 286.135 178.082 275.279C167.22 264.423 159.823 250.591 156.826 235.534C153.829 220.476 155.367 204.868 161.246 190.684C167.124 176.5 177.079 164.376 189.851 155.847C202.623 147.317 217.639 142.765 233 142.765C253.599 142.765 273.353 150.943 287.919 165.501C302.484 180.058 310.667 199.802 310.667 220.39Z" fill="#1177AA" fill-opacity="0.1"/>
            </svg>                
        </div>
    </div>
   
</section>

@endsection
@section('insertjavascript')


@if(session()->has('responseSuccess'))
<script>
    Swal.fire({
        title: 'Success',
        text: `{{ session('responseSuccess') }}`,
        icon: 'success',
        confirmButtonColor: "#6dabe4"
    })
</script>
@endif
@if(session()->has('nextError'))
<script>
    Swal.fire({
        title: 'Error',
        text: `{{ session('nextError') }}`,
        icon: 'error',
        confirmButtonColor: "#6dabe4"
    })
</script>
@endif