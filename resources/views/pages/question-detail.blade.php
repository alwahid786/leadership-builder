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
    <div class="container-fluid contentRow position-relative question-detail">
        <div class="row">
            <div class="col-md-4">
                <div class="question p-3 px-md-5 py-md-4">
                    <h3 class="font-28 text-white font-weight-600 poppins">
                        Question {{ $question->day }}
                    </h3>
                    <p class="font-14 text-white poppins mt-2">
                        {{ $question->question }}
                    </p>
                </div>
            </div>
            <div class="col-md-5 mt-4 mt-md-0">
                <div class="quotation p-3 px-md-5 py-md-4">
                    <h3 class="font-28 text-white font-weight-600 poppins">
                        Quotation {{ $question->day }}
                    </h3>
                    <p class="font-14 text-white poppins mt-2">
                        {{ $question->quotation }}
                    </p>
                </div>
            </div>
            <div class="col-md-3 mt-4 mt-md-0">
                <div class="total-answers p-3 p-md-4 d-flex align-items-center justify-content-between" style="gap:1rem;">
                    <svg class="right-side-card-svg" width="70" height="69" viewBox="0 0 70 69" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1.49707" y="1.00488" width="66.8317" height="66.8317" rx="19" stroke="white" stroke-width="2" />
                        <path d="M23.3871 49.1928C23.5992 49.3103 23.839 49.3689 24.0814 49.3625C24.3239 49.356 24.5602 49.2848 24.7658 49.1561L34.9128 42.8139L45.0598 49.1561C45.2654 49.2847 45.5017 49.3558 45.7441 49.3621C45.9865 49.3685 46.2262 49.3099 46.4383 49.1923C46.6503 49.0748 46.8271 48.9026 46.9502 48.6937C47.0732 48.4848 47.1381 48.2467 47.1381 48.0042V23.5536C47.1381 22.4728 46.7088 21.4363 45.9446 20.6721C45.1803 19.9079 44.1438 19.4785 43.063 19.4785H26.7626C25.6818 19.4785 24.6453 19.9079 23.8811 20.6721C23.1168 21.4363 22.6875 22.4728 22.6875 23.5536V48.0042C22.6874 48.2468 22.7522 48.4849 22.8752 48.6939C22.9982 48.9029 23.175 49.0752 23.3871 49.1928ZM25.4042 23.5536C25.4042 23.1934 25.5473 22.8479 25.8021 22.5931C26.0568 22.3384 26.4023 22.1953 26.7626 22.1953H43.063C43.4233 22.1953 43.7688 22.3384 44.0235 22.5931C44.2783 22.8479 44.4214 23.1934 44.4214 23.5536V45.5592L35.6327 40.0659C35.4169 39.931 35.1674 39.8595 34.9128 39.8595C34.6582 39.8595 34.4088 39.931 34.1929 40.0659L25.4042 45.5592V23.5536Z" fill="white" />
                    </svg>
                    <div>
                        <p class="font-16 text-white poppins">Total Answers</p>
                        <h3 class="font-28 font-weight-600 text-white poppins mt-2 text-right">{{ $answers->count() }}</h3>
                    </div>
                </div>
            </div>
        </div>
        {{-- Total answers --}}
        <div class="row mt-4 pt-md-1">
            <div class="col-12">
                <h1 class="blue crimson">Total Answers</h1>
                <div class="mt-3 tableDiv">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="padding-left:40px">Picture</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($answers as $answer)    
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('storage/images/'.($answer->user->profile_img==null?'profile.png':$answer->user->profile_img))}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>{{$answer->user->name.' '.$answer->user->last_name}}</td>
                                <td>{{$answer->response_type}}</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    {{-- <p class="m-0 pl-3">04/26/2020, 12:42 PM</p> --}}
                                    <p class="m-0 pl-3">{{date('m/d/Y H:i a', strtotime($answer->created_at)).' ('.$answer->created_at->diffForHumans().')'}}</p>
                                </td>
                                <td>
                                    <a href="{{url('/answer/'.($answer->id))}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">
                                    <img src="{{asset('assets/images/profile-image.png')}}" alt="profile" class="table-profile-pic">
                                </td>
                                <td>John Smith</td>
                                <td>Audio</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#fab117" fill-opacity="0.4"></rect>
                                        <path d="M28.1786 10.6913H26.405V9.12176C26.405 8.89526 26.3127 8.67998 26.1533 8.52061C25.9939 8.36123 25.7786 8.26895 25.5521 8.26895C25.3256 8.26895 25.1103 8.36123 24.9509 8.52061C24.7915 8.67998 24.6992 8.89526 24.6992 9.12176V10.6913H16.6775V9.12176C16.6775 8.89526 16.5852 8.67998 16.4258 8.52061C16.2664 8.36123 16.0511 8.26895 15.8246 8.26895C15.5981 8.26895 15.3828 8.36123 15.2234 8.52061C15.064 8.67998 14.9717 8.89526 14.9717 9.12176V10.6913H13.1981C12.9724 10.6913 12.7572 10.7837 12.5979 10.943C12.4386 11.1023 12.3463 11.3175 12.3463 11.5432V30.1871C12.3463 30.4128 12.4386 30.628 12.5979 30.7873C12.7572 30.9466 12.9724 31.039 13.1981 31.039H28.1786C28.4043 31.039 28.6195 30.9466 28.7788 30.7873C28.9381 30.628 29.0305 30.4128 29.0305 30.1871V11.5432C29.0305 11.3175 28.9381 11.1023 28.7788 10.943C28.6195 10.7837 28.4043 10.6913 28.1786 10.6913ZM27.4751 29.4832H13.9016V18.3651H27.4751V29.4832ZM27.4751 17.0668H13.9016V12.2477H27.4751V17.0668Z" fill="#fab117"></path>
                                    </svg>
                                    <p class="m-0 pl-3">04/26/2020, 12:42 PM</p>
                                </td>
                                <td>
                                    <a href="{{url('/')}}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5"/>
                                            <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
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
