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
@include('includes.navbar-dash')
<section class="contentSection position-relative">
    <div class="container-fluid contentRow">
        <div class="row user-detail">
            <div class="col-12 mb-3 pb-2">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="font-28 primary-color font-weight-500 poppins">
                        User Details
                    </h2>
                    <a href="{{ url('/remove-user/'.$user->id) }}">
                        <button class="remove-user crimson text-white font-weight-600 font-18">
                            Remove user
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-lg-3">
                <h2 class="profile-heading mt-md-5">
                    PROFILE PICTURE
                </h2>
                <div class="mt-2">
                    <img src="{{asset('storage/images/'.($user->profile_img ==null ?'profile.png':$user->profile_img))}}" alt="profile iamge" class="profile-img">

                </div>
            </div>
            <div class="col-lg-9 mt-3 mt-lg-0">
                <div class="bg-white user-detail-view position-relative">
                    <div class="" style="z-index: 1">
                        <div class="d-flex align-items-center justify-content-between">
                            <h3 class="user-detail-heading">
                                General Information
                            </h3>
                            <span class="enterprise-user font-weight-700 font-18 crimson d-flex align-items-center justify-content-center">
                                Enterprise User
                            </span>
                        </div>
                        <div class="d-flex align-items-center justify-content-between" style="margin-top: 36px">
                            <div class="left-side">
                                <p class="label">First Name</p>
                                <p style="margin-top: 27px">{{ $user->name }}</p>
                            </div>
                            <div class="right-side">
                                <p class="label">Last Name</p>
                                <p style="margin-top: 27px">{{ $user->last_name }}</p>
                            </div>
                        </div>
                        <h3 class="user-detail-heading" style="margin-top: 50px;">
                            Contact
                        </h3>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <div class="left-side">
                                <p class="label">Email</p>
                                <p style="margin-top: 27px">{{ $user->email }}</p>
                            </div>
                            <div class="right-side">
                                <p class="label">Phone Number</p>
                                <p style="margin-top: 27px">{{ $user->phone }}</p>
                            </div>
                        </div>
                        <h3 class="user-detail-heading" style="margin-top: 50px;">
                            Other Details
                        </h3>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <div class="left-side">
                                <p class="label">Days</p>
                                <p style="margin-top: 27px">{{ $user->total_days }}</p>
                            </div>
                            <div class="right-side">
                                <p class="label">Given Answers</p>
                                <p style="margin-top: 27px">{{ $user->total_days }}</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <div class="left-side">
                                <p class="label">Plan purchase Date</p>
                                <p style="margin-top: 27px">23-04-2024</p>
                            </div>
                            <div class="right-side">
                                <p class="label">Expire Plan purchase Date</p>
                                <p style="margin-top: 27px">23-04-2024</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
