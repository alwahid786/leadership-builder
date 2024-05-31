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
    <div class="container-fluid contentRow position-relative">
        <div class="row">
            <div class="col-12">
                <h1 class="blue">All Invoices</h1>
                <div class="mt-3 tableDiv">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="padding-left:40px">Invoice ID</th>
                                <th scope="col">Purchase Date</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Plan</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)     
                            <tr>
                                <td style="padding-left:40px">#{{ $invoice->invoice_id }}</td>
                                <td>{{ date('M d, Y H:i A', strtotime($invoice->created_at)); }}</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">{{ $invoice->user->email }}</p>
                                </td>
                                <td style="color: #FAB117;"><strong>${{ $invoice->plan->price }}</strong></td>
                                <td class="{{$invoice->plan->duration == 'month' ? 'basicPlan' : 'proPlan'}}"">{{ $invoice->plan->name }}</td>
                                <td>
                                    <a href="{{url('/invoices/'.$invoice->id)}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$212</strong></td>
                                <td class="proPlan">Professional</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$234</strong></td>
                                <td class="basicPlan">Basic</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$56</strong></td>
                                <td class="enterprisePlan">Enterprise</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="basicPlan">Basic</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="proPlan">Professional</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="basicPlan">Basic</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="basicPlan">Basic</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="enterprisePlan">Enterprise</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41" fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11" fill="#5EC8D6" fill-opacity="0.4" />
                                        <path d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z" fill="#5EC8D6" />
                                        <path d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z" fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="basicPlan">Basic</td>
                                <td>
                                    <a href="{{url('/invoice')}}">
                                        <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0"/>
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
