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
    <div class="container-fluid contentRow position-relative">
        <div class="row">
            <div class="col">
                <div class="d-flex align-items-center justify-content-between">
                    <h2 class="font-28 primary-color poppins font-weight-500">
                        All Users
                    </h2>
                    <button class="primary-btn">Add New Users</button>
                </div>
            </div>
        </div>
        <div class="row mt-4 pt-1">
            <div class="col-md-6 col-lg-4 col-xl-3">
                <a href="#." class="profile-card">
                    <div class="profile-img">
                        <img src="{{asset('assets/images/profile-card-img.png')}}" alt="profile image">
                    </div>
                    <h4 class="font-18 font-weight-500 poppins text-center" style="color:rgba(70, 66, 85, 1);">
                        Hafidh Suleymani
                    </h4>
                    <div class="d-flex align-items-center justify-content-between mt-3" style="gap:1rem">
                        <h6 class="font-14 primary-color poppins font-weight-500">
                            Days = 22
                        </h6>
                        <h6 class="font-14 poppins font-weight-500 basic">
                            Basic
                        </h6>
                    </div>
                    <div class="tel d-flex align-items-center justify-content-center font-14 font-weight-500 poppins">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2967 13.3365L14.2722 11.9221C14.0074 11.7374 13.698 11.6401 13.3771 11.6401C12.8668 11.6401 12.3879 11.8903 12.0961 12.309L11.6261 12.9825C10.8385 12.4543 9.95958 11.7167 9.12172 10.879C8.28401 10.0413 7.54655 9.16235 7.01844 8.37469L7.69166 7.90472C8.03483 7.66577 8.26402 7.3078 8.3368 6.89703C8.40944 6.48657 8.31788 6.07184 8.07862 5.72852L6.66444 3.70398C6.36873 3.28101 5.89158 3.02832 5.38789 3.02832C5.21333 3.02832 5.04213 3.05914 4.87916 3.11926C4.69407 3.18762 4.52165 3.27155 4.35258 3.37775L4.07304 3.57458C4.00315 3.62891 3.93815 3.68842 3.8759 3.75067C3.53486 4.09155 3.29286 4.52307 3.15629 5.03333C2.57356 7.21777 4.01719 10.521 6.74852 13.2523C9.04222 15.546 11.7978 16.9709 13.9397 16.9712H13.9398C14.3067 16.9712 14.6524 16.9285 14.9677 16.8442C15.4779 16.7078 15.9094 16.4658 16.2506 16.1246C16.3126 16.0627 16.3718 15.9977 16.4353 15.9156L16.6322 15.6345C16.7285 15.4807 16.8123 15.3083 16.8816 15.1218C17.1198 14.4779 16.8793 13.7437 16.2967 13.3365Z" fill="#1177AA"/>
                        </svg>                            
                        +12 345 6789 0
                    </div>
                    <div class="email d-flex align-items-center justify-content-center font-14 font-weight-500 poppins mt-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99981 9.884L18.1305 5.44908C17.8719 4.59828 17.3474 3.85278 16.6339 3.322C15.9205 2.79123 15.0557 2.50313 14.1665 2.5H5.83314C4.94392 2.50313 4.07912 2.79123 3.36567 3.322C2.65223 3.85278 2.12772 4.59828 1.86914 5.44908L9.99981 9.884Z" fill="#1177AA"/>
                            <path d="M10.3995 11.5651C10.277 11.6318 10.1398 11.6668 10.0003 11.6668C9.86086 11.6668 9.72362 11.6318 9.60116 11.5651L1.66699 7.2373V13.3335C1.66829 14.4381 2.1077 15.4972 2.88882 16.2783C3.66994 17.0594 4.72899 17.4988 5.83366 17.5001H14.167C15.2717 17.4988 16.3307 17.0594 17.1118 16.2783C17.893 15.4972 18.3324 14.4381 18.3337 13.3335V7.2373L10.3995 11.5651Z" fill="#1177AA"/>
                        </svg>                                                       
                        hafid_m@mail.com
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 mt-4 pt-3 mt-md-0 pt-md-0">
                <a href="#." class="profile-card">
                    <div class="profile-img">
                        <img src="{{asset('assets/images/profile-card-img.png')}}" alt="profile image">
                    </div>
                    <h4 class="font-18 font-weight-500 poppins text-center" style="color:rgba(70, 66, 85, 1);">
                        Hafidh Suleymani
                    </h4>
                    <div class="d-flex align-items-center justify-content-between mt-3" style="gap:1rem">
                        <h6 class="font-14 primary-color poppins font-weight-500">
                            Days = 22
                        </h6>
                        <h6 class="font-14 poppins font-weight-500 professional">
                            Professional
                        </h6>
                    </div>
                    <div class="tel d-flex align-items-center justify-content-center font-14 font-weight-500 poppins">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2967 13.3365L14.2722 11.9221C14.0074 11.7374 13.698 11.6401 13.3771 11.6401C12.8668 11.6401 12.3879 11.8903 12.0961 12.309L11.6261 12.9825C10.8385 12.4543 9.95958 11.7167 9.12172 10.879C8.28401 10.0413 7.54655 9.16235 7.01844 8.37469L7.69166 7.90472C8.03483 7.66577 8.26402 7.3078 8.3368 6.89703C8.40944 6.48657 8.31788 6.07184 8.07862 5.72852L6.66444 3.70398C6.36873 3.28101 5.89158 3.02832 5.38789 3.02832C5.21333 3.02832 5.04213 3.05914 4.87916 3.11926C4.69407 3.18762 4.52165 3.27155 4.35258 3.37775L4.07304 3.57458C4.00315 3.62891 3.93815 3.68842 3.8759 3.75067C3.53486 4.09155 3.29286 4.52307 3.15629 5.03333C2.57356 7.21777 4.01719 10.521 6.74852 13.2523C9.04222 15.546 11.7978 16.9709 13.9397 16.9712H13.9398C14.3067 16.9712 14.6524 16.9285 14.9677 16.8442C15.4779 16.7078 15.9094 16.4658 16.2506 16.1246C16.3126 16.0627 16.3718 15.9977 16.4353 15.9156L16.6322 15.6345C16.7285 15.4807 16.8123 15.3083 16.8816 15.1218C17.1198 14.4779 16.8793 13.7437 16.2967 13.3365Z" fill="#1177AA"/>
                        </svg>                            
                        +12 345 6789 0
                    </div>
                    <div class="email d-flex align-items-center justify-content-center font-14 font-weight-500 poppins mt-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99981 9.884L18.1305 5.44908C17.8719 4.59828 17.3474 3.85278 16.6339 3.322C15.9205 2.79123 15.0557 2.50313 14.1665 2.5H5.83314C4.94392 2.50313 4.07912 2.79123 3.36567 3.322C2.65223 3.85278 2.12772 4.59828 1.86914 5.44908L9.99981 9.884Z" fill="#1177AA"/>
                            <path d="M10.3995 11.5651C10.277 11.6318 10.1398 11.6668 10.0003 11.6668C9.86086 11.6668 9.72362 11.6318 9.60116 11.5651L1.66699 7.2373V13.3335C1.66829 14.4381 2.1077 15.4972 2.88882 16.2783C3.66994 17.0594 4.72899 17.4988 5.83366 17.5001H14.167C15.2717 17.4988 16.3307 17.0594 17.1118 16.2783C17.893 15.4972 18.3324 14.4381 18.3337 13.3335V7.2373L10.3995 11.5651Z" fill="#1177AA"/>
                        </svg>                                                       
                        hafid_m@mail.com
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 mt-4 pt-3 mt-lg-0 pt-lg-0">
                <a href="#." class="profile-card">
                    <div class="profile-img">
                        <img src="{{asset('assets/images/profile-card-img.png')}}" alt="profile image">
                    </div>
                    <h4 class="font-18 font-weight-500 poppins text-center" style="color:rgba(70, 66, 85, 1);">
                        Hafidh Suleymani
                    </h4>
                    <div class="d-flex align-items-center justify-content-between mt-3" style="gap:1rem">
                        <h6 class="font-14 primary-color poppins font-weight-500">
                            Days = 22
                        </h6>
                        <h6 class="font-14 poppins font-weight-500 enterprise">
                            Enterprise
                        </h6>
                    </div>
                    <div class="tel d-flex align-items-center justify-content-center font-14 font-weight-500 poppins">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2967 13.3365L14.2722 11.9221C14.0074 11.7374 13.698 11.6401 13.3771 11.6401C12.8668 11.6401 12.3879 11.8903 12.0961 12.309L11.6261 12.9825C10.8385 12.4543 9.95958 11.7167 9.12172 10.879C8.28401 10.0413 7.54655 9.16235 7.01844 8.37469L7.69166 7.90472C8.03483 7.66577 8.26402 7.3078 8.3368 6.89703C8.40944 6.48657 8.31788 6.07184 8.07862 5.72852L6.66444 3.70398C6.36873 3.28101 5.89158 3.02832 5.38789 3.02832C5.21333 3.02832 5.04213 3.05914 4.87916 3.11926C4.69407 3.18762 4.52165 3.27155 4.35258 3.37775L4.07304 3.57458C4.00315 3.62891 3.93815 3.68842 3.8759 3.75067C3.53486 4.09155 3.29286 4.52307 3.15629 5.03333C2.57356 7.21777 4.01719 10.521 6.74852 13.2523C9.04222 15.546 11.7978 16.9709 13.9397 16.9712H13.9398C14.3067 16.9712 14.6524 16.9285 14.9677 16.8442C15.4779 16.7078 15.9094 16.4658 16.2506 16.1246C16.3126 16.0627 16.3718 15.9977 16.4353 15.9156L16.6322 15.6345C16.7285 15.4807 16.8123 15.3083 16.8816 15.1218C17.1198 14.4779 16.8793 13.7437 16.2967 13.3365Z" fill="#1177AA"/>
                        </svg>                            
                        +12 345 6789 0
                    </div>
                    <div class="email d-flex align-items-center justify-content-center font-14 font-weight-500 poppins mt-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99981 9.884L18.1305 5.44908C17.8719 4.59828 17.3474 3.85278 16.6339 3.322C15.9205 2.79123 15.0557 2.50313 14.1665 2.5H5.83314C4.94392 2.50313 4.07912 2.79123 3.36567 3.322C2.65223 3.85278 2.12772 4.59828 1.86914 5.44908L9.99981 9.884Z" fill="#1177AA"/>
                            <path d="M10.3995 11.5651C10.277 11.6318 10.1398 11.6668 10.0003 11.6668C9.86086 11.6668 9.72362 11.6318 9.60116 11.5651L1.66699 7.2373V13.3335C1.66829 14.4381 2.1077 15.4972 2.88882 16.2783C3.66994 17.0594 4.72899 17.4988 5.83366 17.5001H14.167C15.2717 17.4988 16.3307 17.0594 17.1118 16.2783C17.893 15.4972 18.3324 14.4381 18.3337 13.3335V7.2373L10.3995 11.5651Z" fill="#1177AA"/>
                        </svg>                                                       
                        hafid_m@mail.com
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 mt-4 pt-3 mt-xl-0 pt-xl-0">
                <a href="#." class="profile-card">
                    <div class="profile-img">
                        <img src="{{asset('assets/images/profile-card-img.png')}}" alt="profile image">
                    </div>
                    <h4 class="font-18 font-weight-500 poppins text-center" style="color:rgba(70, 66, 85, 1);">
                        Hafidh Suleymani
                    </h4>
                    <div class="d-flex align-items-center justify-content-between mt-3" style="gap:1rem">
                        <h6 class="font-14 primary-color poppins font-weight-500">
                            Days = 22
                        </h6>
                        <h6 class="font-14 poppins font-weight-500 professional">
                            Professional
                        </h6>
                    </div>
                    <div class="tel d-flex align-items-center justify-content-center font-14 font-weight-500 poppins">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2967 13.3365L14.2722 11.9221C14.0074 11.7374 13.698 11.6401 13.3771 11.6401C12.8668 11.6401 12.3879 11.8903 12.0961 12.309L11.6261 12.9825C10.8385 12.4543 9.95958 11.7167 9.12172 10.879C8.28401 10.0413 7.54655 9.16235 7.01844 8.37469L7.69166 7.90472C8.03483 7.66577 8.26402 7.3078 8.3368 6.89703C8.40944 6.48657 8.31788 6.07184 8.07862 5.72852L6.66444 3.70398C6.36873 3.28101 5.89158 3.02832 5.38789 3.02832C5.21333 3.02832 5.04213 3.05914 4.87916 3.11926C4.69407 3.18762 4.52165 3.27155 4.35258 3.37775L4.07304 3.57458C4.00315 3.62891 3.93815 3.68842 3.8759 3.75067C3.53486 4.09155 3.29286 4.52307 3.15629 5.03333C2.57356 7.21777 4.01719 10.521 6.74852 13.2523C9.04222 15.546 11.7978 16.9709 13.9397 16.9712H13.9398C14.3067 16.9712 14.6524 16.9285 14.9677 16.8442C15.4779 16.7078 15.9094 16.4658 16.2506 16.1246C16.3126 16.0627 16.3718 15.9977 16.4353 15.9156L16.6322 15.6345C16.7285 15.4807 16.8123 15.3083 16.8816 15.1218C17.1198 14.4779 16.8793 13.7437 16.2967 13.3365Z" fill="#1177AA"/>
                        </svg>                            
                        +12 345 6789 0
                    </div>
                    <div class="email d-flex align-items-center justify-content-center font-14 font-weight-500 poppins mt-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99981 9.884L18.1305 5.44908C17.8719 4.59828 17.3474 3.85278 16.6339 3.322C15.9205 2.79123 15.0557 2.50313 14.1665 2.5H5.83314C4.94392 2.50313 4.07912 2.79123 3.36567 3.322C2.65223 3.85278 2.12772 4.59828 1.86914 5.44908L9.99981 9.884Z" fill="#1177AA"/>
                            <path d="M10.3995 11.5651C10.277 11.6318 10.1398 11.6668 10.0003 11.6668C9.86086 11.6668 9.72362 11.6318 9.60116 11.5651L1.66699 7.2373V13.3335C1.66829 14.4381 2.1077 15.4972 2.88882 16.2783C3.66994 17.0594 4.72899 17.4988 5.83366 17.5001H14.167C15.2717 17.4988 16.3307 17.0594 17.1118 16.2783C17.893 15.4972 18.3324 14.4381 18.3337 13.3335V7.2373L10.3995 11.5651Z" fill="#1177AA"/>
                        </svg>                                                       
                        hafid_m@mail.com
                    </div>
                </a>
            </div>

            <div class="col-md-6 col-lg-4 col-xl-3 mt-4 pt-3">
                <a href="#." class="profile-card">
                    <div class="profile-img">
                        <img src="{{asset('assets/images/profile-card-img.png')}}" alt="profile image">
                    </div>
                    <h4 class="font-18 font-weight-500 poppins text-center" style="color:rgba(70, 66, 85, 1);">
                        Hafidh Suleymani
                    </h4>
                    <div class="d-flex align-items-center justify-content-between mt-3" style="gap:1rem">
                        <h6 class="font-14 primary-color poppins font-weight-500">
                            Days = 22
                        </h6>
                        <h6 class="font-14 poppins font-weight-500 free">
                            Free
                        </h6>
                    </div>
                    <div class="tel d-flex align-items-center justify-content-center font-14 font-weight-500 poppins">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2967 13.3365L14.2722 11.9221C14.0074 11.7374 13.698 11.6401 13.3771 11.6401C12.8668 11.6401 12.3879 11.8903 12.0961 12.309L11.6261 12.9825C10.8385 12.4543 9.95958 11.7167 9.12172 10.879C8.28401 10.0413 7.54655 9.16235 7.01844 8.37469L7.69166 7.90472C8.03483 7.66577 8.26402 7.3078 8.3368 6.89703C8.40944 6.48657 8.31788 6.07184 8.07862 5.72852L6.66444 3.70398C6.36873 3.28101 5.89158 3.02832 5.38789 3.02832C5.21333 3.02832 5.04213 3.05914 4.87916 3.11926C4.69407 3.18762 4.52165 3.27155 4.35258 3.37775L4.07304 3.57458C4.00315 3.62891 3.93815 3.68842 3.8759 3.75067C3.53486 4.09155 3.29286 4.52307 3.15629 5.03333C2.57356 7.21777 4.01719 10.521 6.74852 13.2523C9.04222 15.546 11.7978 16.9709 13.9397 16.9712H13.9398C14.3067 16.9712 14.6524 16.9285 14.9677 16.8442C15.4779 16.7078 15.9094 16.4658 16.2506 16.1246C16.3126 16.0627 16.3718 15.9977 16.4353 15.9156L16.6322 15.6345C16.7285 15.4807 16.8123 15.3083 16.8816 15.1218C17.1198 14.4779 16.8793 13.7437 16.2967 13.3365Z" fill="#1177AA"/>
                        </svg>                            
                        +12 345 6789 0
                    </div>
                    <div class="email d-flex align-items-center justify-content-center font-14 font-weight-500 poppins mt-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99981 9.884L18.1305 5.44908C17.8719 4.59828 17.3474 3.85278 16.6339 3.322C15.9205 2.79123 15.0557 2.50313 14.1665 2.5H5.83314C4.94392 2.50313 4.07912 2.79123 3.36567 3.322C2.65223 3.85278 2.12772 4.59828 1.86914 5.44908L9.99981 9.884Z" fill="#1177AA"/>
                            <path d="M10.3995 11.5651C10.277 11.6318 10.1398 11.6668 10.0003 11.6668C9.86086 11.6668 9.72362 11.6318 9.60116 11.5651L1.66699 7.2373V13.3335C1.66829 14.4381 2.1077 15.4972 2.88882 16.2783C3.66994 17.0594 4.72899 17.4988 5.83366 17.5001H14.167C15.2717 17.4988 16.3307 17.0594 17.1118 16.2783C17.893 15.4972 18.3324 14.4381 18.3337 13.3335V7.2373L10.3995 11.5651Z" fill="#1177AA"/>
                        </svg>                                                       
                        hafid_m@mail.com
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 mt-4 pt-3">
                <a href="#." class="profile-card">
                    <div class="profile-img">
                        <img src="{{asset('assets/images/profile-card-img.png')}}" alt="profile image">
                    </div>
                    <h4 class="font-18 font-weight-500 poppins text-center" style="color:rgba(70, 66, 85, 1);">
                        Hafidh Suleymani
                    </h4>
                    <div class="d-flex align-items-center justify-content-between mt-3" style="gap:1rem">
                        <h6 class="font-14 primary-color poppins font-weight-500">
                            Days = 22
                        </h6>
                        <h6 class="font-14 poppins font-weight-500 basic">
                            Basic
                        </h6>
                    </div>
                    <div class="tel d-flex align-items-center justify-content-center font-14 font-weight-500 poppins">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2967 13.3365L14.2722 11.9221C14.0074 11.7374 13.698 11.6401 13.3771 11.6401C12.8668 11.6401 12.3879 11.8903 12.0961 12.309L11.6261 12.9825C10.8385 12.4543 9.95958 11.7167 9.12172 10.879C8.28401 10.0413 7.54655 9.16235 7.01844 8.37469L7.69166 7.90472C8.03483 7.66577 8.26402 7.3078 8.3368 6.89703C8.40944 6.48657 8.31788 6.07184 8.07862 5.72852L6.66444 3.70398C6.36873 3.28101 5.89158 3.02832 5.38789 3.02832C5.21333 3.02832 5.04213 3.05914 4.87916 3.11926C4.69407 3.18762 4.52165 3.27155 4.35258 3.37775L4.07304 3.57458C4.00315 3.62891 3.93815 3.68842 3.8759 3.75067C3.53486 4.09155 3.29286 4.52307 3.15629 5.03333C2.57356 7.21777 4.01719 10.521 6.74852 13.2523C9.04222 15.546 11.7978 16.9709 13.9397 16.9712H13.9398C14.3067 16.9712 14.6524 16.9285 14.9677 16.8442C15.4779 16.7078 15.9094 16.4658 16.2506 16.1246C16.3126 16.0627 16.3718 15.9977 16.4353 15.9156L16.6322 15.6345C16.7285 15.4807 16.8123 15.3083 16.8816 15.1218C17.1198 14.4779 16.8793 13.7437 16.2967 13.3365Z" fill="#1177AA"/>
                        </svg>                            
                        +12 345 6789 0
                    </div>
                    <div class="email d-flex align-items-center justify-content-center font-14 font-weight-500 poppins mt-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99981 9.884L18.1305 5.44908C17.8719 4.59828 17.3474 3.85278 16.6339 3.322C15.9205 2.79123 15.0557 2.50313 14.1665 2.5H5.83314C4.94392 2.50313 4.07912 2.79123 3.36567 3.322C2.65223 3.85278 2.12772 4.59828 1.86914 5.44908L9.99981 9.884Z" fill="#1177AA"/>
                            <path d="M10.3995 11.5651C10.277 11.6318 10.1398 11.6668 10.0003 11.6668C9.86086 11.6668 9.72362 11.6318 9.60116 11.5651L1.66699 7.2373V13.3335C1.66829 14.4381 2.1077 15.4972 2.88882 16.2783C3.66994 17.0594 4.72899 17.4988 5.83366 17.5001H14.167C15.2717 17.4988 16.3307 17.0594 17.1118 16.2783C17.893 15.4972 18.3324 14.4381 18.3337 13.3335V7.2373L10.3995 11.5651Z" fill="#1177AA"/>
                        </svg>                                                       
                        hafid_m@mail.com
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 mt-4 pt-3">
                <a href="#." class="profile-card">
                    <div class="profile-img">
                        <img src="{{asset('assets/images/profile-card-img.png')}}" alt="profile image">
                    </div>
                    <h4 class="font-18 font-weight-500 poppins text-center" style="color:rgba(70, 66, 85, 1);">
                        Hafidh Suleymani
                    </h4>
                    <div class="d-flex align-items-center justify-content-between mt-3" style="gap:1rem">
                        <h6 class="font-14 primary-color poppins font-weight-500">
                            Days = 22
                        </h6>
                        <h6 class="font-14 poppins font-weight-500 basic">
                            Basic
                        </h6>
                    </div>
                    <div class="tel d-flex align-items-center justify-content-center font-14 font-weight-500 poppins">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2967 13.3365L14.2722 11.9221C14.0074 11.7374 13.698 11.6401 13.3771 11.6401C12.8668 11.6401 12.3879 11.8903 12.0961 12.309L11.6261 12.9825C10.8385 12.4543 9.95958 11.7167 9.12172 10.879C8.28401 10.0413 7.54655 9.16235 7.01844 8.37469L7.69166 7.90472C8.03483 7.66577 8.26402 7.3078 8.3368 6.89703C8.40944 6.48657 8.31788 6.07184 8.07862 5.72852L6.66444 3.70398C6.36873 3.28101 5.89158 3.02832 5.38789 3.02832C5.21333 3.02832 5.04213 3.05914 4.87916 3.11926C4.69407 3.18762 4.52165 3.27155 4.35258 3.37775L4.07304 3.57458C4.00315 3.62891 3.93815 3.68842 3.8759 3.75067C3.53486 4.09155 3.29286 4.52307 3.15629 5.03333C2.57356 7.21777 4.01719 10.521 6.74852 13.2523C9.04222 15.546 11.7978 16.9709 13.9397 16.9712H13.9398C14.3067 16.9712 14.6524 16.9285 14.9677 16.8442C15.4779 16.7078 15.9094 16.4658 16.2506 16.1246C16.3126 16.0627 16.3718 15.9977 16.4353 15.9156L16.6322 15.6345C16.7285 15.4807 16.8123 15.3083 16.8816 15.1218C17.1198 14.4779 16.8793 13.7437 16.2967 13.3365Z" fill="#1177AA"/>
                        </svg>                            
                        +12 345 6789 0
                    </div>
                    <div class="email d-flex align-items-center justify-content-center font-14 font-weight-500 poppins mt-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99981 9.884L18.1305 5.44908C17.8719 4.59828 17.3474 3.85278 16.6339 3.322C15.9205 2.79123 15.0557 2.50313 14.1665 2.5H5.83314C4.94392 2.50313 4.07912 2.79123 3.36567 3.322C2.65223 3.85278 2.12772 4.59828 1.86914 5.44908L9.99981 9.884Z" fill="#1177AA"/>
                            <path d="M10.3995 11.5651C10.277 11.6318 10.1398 11.6668 10.0003 11.6668C9.86086 11.6668 9.72362 11.6318 9.60116 11.5651L1.66699 7.2373V13.3335C1.66829 14.4381 2.1077 15.4972 2.88882 16.2783C3.66994 17.0594 4.72899 17.4988 5.83366 17.5001H14.167C15.2717 17.4988 16.3307 17.0594 17.1118 16.2783C17.893 15.4972 18.3324 14.4381 18.3337 13.3335V7.2373L10.3995 11.5651Z" fill="#1177AA"/>
                        </svg>                                                       
                        hafid_m@mail.com
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-3 mt-4 pt-3">
                <a href="#." class="profile-card">
                    <div class="profile-img">
                        <img src="{{asset('assets/images/profile-card-img.png')}}" alt="profile image">
                    </div>
                    <h4 class="font-18 font-weight-500 poppins text-center" style="color:rgba(70, 66, 85, 1);">
                        Hafidh Suleymani
                    </h4>
                    <div class="d-flex align-items-center justify-content-between mt-3" style="gap:1rem">
                        <h6 class="font-14 primary-color poppins font-weight-500">
                            Days = 22
                        </h6>
                        <h6 class="font-14 poppins font-weight-500 free">
                            Free
                        </h6>
                    </div>
                    <div class="tel d-flex align-items-center justify-content-center font-14 font-weight-500 poppins">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16.2967 13.3365L14.2722 11.9221C14.0074 11.7374 13.698 11.6401 13.3771 11.6401C12.8668 11.6401 12.3879 11.8903 12.0961 12.309L11.6261 12.9825C10.8385 12.4543 9.95958 11.7167 9.12172 10.879C8.28401 10.0413 7.54655 9.16235 7.01844 8.37469L7.69166 7.90472C8.03483 7.66577 8.26402 7.3078 8.3368 6.89703C8.40944 6.48657 8.31788 6.07184 8.07862 5.72852L6.66444 3.70398C6.36873 3.28101 5.89158 3.02832 5.38789 3.02832C5.21333 3.02832 5.04213 3.05914 4.87916 3.11926C4.69407 3.18762 4.52165 3.27155 4.35258 3.37775L4.07304 3.57458C4.00315 3.62891 3.93815 3.68842 3.8759 3.75067C3.53486 4.09155 3.29286 4.52307 3.15629 5.03333C2.57356 7.21777 4.01719 10.521 6.74852 13.2523C9.04222 15.546 11.7978 16.9709 13.9397 16.9712H13.9398C14.3067 16.9712 14.6524 16.9285 14.9677 16.8442C15.4779 16.7078 15.9094 16.4658 16.2506 16.1246C16.3126 16.0627 16.3718 15.9977 16.4353 15.9156L16.6322 15.6345C16.7285 15.4807 16.8123 15.3083 16.8816 15.1218C17.1198 14.4779 16.8793 13.7437 16.2967 13.3365Z" fill="#1177AA"/>
                        </svg>                            
                        +12 345 6789 0
                    </div>
                    <div class="email d-flex align-items-center justify-content-center font-14 font-weight-500 poppins mt-3">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.99981 9.884L18.1305 5.44908C17.8719 4.59828 17.3474 3.85278 16.6339 3.322C15.9205 2.79123 15.0557 2.50313 14.1665 2.5H5.83314C4.94392 2.50313 4.07912 2.79123 3.36567 3.322C2.65223 3.85278 2.12772 4.59828 1.86914 5.44908L9.99981 9.884Z" fill="#1177AA"/>
                            <path d="M10.3995 11.5651C10.277 11.6318 10.1398 11.6668 10.0003 11.6668C9.86086 11.6668 9.72362 11.6318 9.60116 11.5651L1.66699 7.2373V13.3335C1.66829 14.4381 2.1077 15.4972 2.88882 16.2783C3.66994 17.0594 4.72899 17.4988 5.83366 17.5001H14.167C15.2717 17.4988 16.3307 17.0594 17.1118 16.2783C17.893 15.4972 18.3324 14.4381 18.3337 13.3335V7.2373L10.3995 11.5651Z" fill="#1177AA"/>
                        </svg>                                                       
                        hafid_m@mail.com
                    </div>
                </a>
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
