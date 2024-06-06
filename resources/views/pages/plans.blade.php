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
        transition: 0.5s;
    }

    .plans:hover {
        box-shadow: #635e5e 0px 0px 10px 0px;
        cursor: pointer;
    }

    .StripeElement {
        background-color: white;
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid transparent;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

    @media (min-width: 576px) {
        #paymentmodal .modal-dialog {
            margin: auto !important;
            height: 100vh !important;
            display: flex !important;
            justify-content: center;
            align-items: center !important;
        }

        #paymentmodal .modal-content {
            border-radius: 10px;
            font-family: inherit !important;
        }
    }


    /* CSS */
    .active-button {
        background: linear-gradient(to bottom right, #EF4765, #FF9A5A);
        border: 0;
        border-radius: 12px;
        color: #FFFFFF;
        cursor: pointer;
        display: inline-block;
        font-family: -apple-system, system-ui, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        font-size: 16px;
        font-weight: 500;
        line-height: 2.5;
        outline: transparent;
        padding: 0 1rem;
        text-align: center;
        text-decoration: none;
        transition: box-shadow .2s ease-in-out;
        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
        white-space: nowrap;
    }

    .active-button:not([disabled]):focus {
        box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
    }

    .active-button:not([disabled]):hover {
        box-shadow: 0 0 .25rem rgba(0, 0, 0, 0.5), -.125rem -.125rem 1rem rgba(239, 71, 101, 0.5), .125rem .125rem 1rem rgba(255, 154, 90, 0.5);
    }
</style>
@include('includes.navbar')
<section class="contentSection position-relative">
    <div class="container-fluid contentRow">
        <div class="row mb-5">
            <div class="form-group mx-auto">
                <div class="row justify-content-center">
                    @foreach ($plans as $index => $plan)
                    @php
                    $colorClass = '';
                    if ($index % 3 == 0) {
                    $colorClass = 'basic-plan';
                    } elseif ($index+1 % 3 == 2) {
                    $colorClass = 'pro-plan';
                    } else {
                    $colorClass = 'enterprise-plan';
                    }
                    @endphp
                    <div class="col-md-4 modal-open mb-3 mt-3" style="width: 600px;"
                        onclick="openModal({{ $plan->id }}, {{ $cur_sub == null ? 'null' : json_encode($cur_sub) }})">
                        <div class="plans {{ $colorClass }}" style="height: 300px;">
                            <div class="d-flex justify-content-between checkbox">
                                <h6 class="m-0">Plan Pricing</h6>
                                {{-- <img style="position: absolute; right: 10px; top: 0;"
                                    src="{{ asset('assets/images/Badge.png') }}" height="100" width="100" alt=""> --}}
                                    <button class="{{ $cur_sub==null ? 'd-none' : ($cur_sub->duration == $plan->duration ? 'active-button' : 'd-none') }}" role="button">Active</button>
                                    {{-- <button class="{{ $cur_sub==null ? 'd-none' : ($cur_sub->duration != $plan->duration && $cur_sub->duration == 'month' ? 'active-button' : 'd-none') }}" role="button">Upgrade</button> --}}
                            </div>
                            <h1>{{ $plan->name }}</h1>
                            <ul class="ml-4 mt-4">
                                <p>{!! $plan->details !!}</p>
                            </ul>
                            <h1 class="align-self-end mt-3">${{ $plan->price }} <small>/month</small></h1>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <form action="{{ route('singleCharge') }}" method="POST" id="subscribe-form">
                @csrf

                <div class="modal fade" id="paymentmodal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="@auth
                                background-color: var(--blue);
                                color: #fff !important;
                            @endauth">
                                <h5 class="modal-title" id="exampleModalLabel">Payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color:#fff !important">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <label for="card-holder-name" class="form-label">Card Holder Name</label>
                                    <input class="form-control" id="card-holder-name" type="text">
                                    <input type="hidden" name="plan_id" id="plan_id_for_payment">

                                    <label for="card-element" class="mt-4">Credit or debit card</label>
                                    <div id="card-element" class="form-control mb-4">
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                </div>
                                <div class="stripe-errors"></div>
                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                    {{ $error }}<br>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <div class="modal-footer d-flex align-items-center justify-content-between">
                                <img style="@auth
                                    width: 170px;
                                @endauth" src="{{asset('assets/images/powered-by-stripe.png')}}" alt="img">
                                <div class="form-group text-center">
                                    <button type="submit" id="card-button" data-secret="{{ $intent->client_secret }}"
                                        class="btn btn-lg btn-success btn-block">PROCEED</button>
                                </div>
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        {{-- <div class="row">
            <div class="col-md-6 offset-md-6 d-flex justify-content-end my-3">
                <button class="themePrimaryBtn2 form-control btn btn-primary rounded submit px-3">Purchase</button>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <h1 class="blue">Purchase History</h1>
                <div class="mt-3 tableDiv">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="padding-left:40px">Invoice ID</th>
                                <th scope="col">Purchase Date</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                            <tr>
                                <td style="padding-left:40px">#{{ $invoice->invoice_id }}</td>
                                <td>{{ date('M d, Y H:i A', strtotime($invoice->created_at)); }}</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">{{ $invoice->user->email }}</p>
                                </td>
                                <td style="color: #FAB117;"><strong>${{ $invoice->plan->price }}</strong></td>
                                <td class="{{$invoice->plan->duration == 'month' ? 'basicPlan' : 'proPlan'}}"">{{ $invoice->plan->name }}</td>
                                <td>
                                    <a href=" {{url('/invoice/'.$invoice->id)}}">
                                    <svg role='button' xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                    </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            {{-- <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$212</strong></td>
                                <td class="proPlan">Professional</td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$234</strong></td>
                                <td class="basicPlan">Basic</td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$56</strong></td>
                                <td class="enterprisePlan">Enterprise</td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="basicPlan">Basic</td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="proPlan">Professional</td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="basicPlan">Basic</td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="basicPlan">Basic</td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="enterprisePlan">Enterprise</td>
                            </tr>
                            <tr>
                                <td style="padding-left:40px">#12341</td>
                                <td>04/26/2020, 12:42 PM</td>
                                <td class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="41" height="41" viewBox="0 0 41 41"
                                        fill="none">
                                        <rect x="0.535156" y="0.524994" width="40.1156" height="40.1156" rx="11"
                                            fill="#5EC8D6" fill-opacity="0.4" />
                                        <path
                                            d="M20.2886 20.8907L30.6666 15.2299C30.3365 14.1439 29.667 13.1924 28.7564 12.5149C27.8458 11.8374 26.7419 11.4697 25.6069 11.4657H14.9702C13.8352 11.4697 12.7313 11.8374 11.8207 12.5149C10.9101 13.1924 10.2406 14.1439 9.91052 15.2299L20.2886 20.8907Z"
                                            fill="#5EC8D6" />
                                        <path
                                            d="M20.7986 23.0361C20.6423 23.1213 20.4671 23.166 20.2891 23.166C20.111 23.166 19.9359 23.1213 19.7796 23.0361L9.65234 17.5121V25.2933C9.654 26.7033 10.2149 28.0551 11.2119 29.0521C12.2089 30.0492 13.5607 30.61 14.9707 30.6117H25.6074C27.0174 30.61 28.3692 30.0492 29.3662 29.0521C30.3633 28.0551 30.9241 26.7033 30.9258 25.2933V17.5121L20.7986 23.0361Z"
                                            fill="#5EC8D6" />
                                    </svg>
                                    <p class="m-0 pl-3">abc@gmail.com</p>
                                </td>
                                <td style="color: #FAB117;"><strong>$512</strong></td>
                                <td class="basicPlan">Basic</td>
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
<script>
    $(".plans").click(function() {
        var checkbox = $(this).find('input[type="radio"]');
        checkbox.prop("checked", !checkbox.prop("checked"));
    });

    function openModal(plan, sub) {
        if (sub == null) {
            console.log('No Subscription');
            openPaymentModal(plan);
        }
        else {
            console.log('Subscrition');
        }
    }

    function openPaymentModal(plan) {
        console.log(plan);
        console.log(plan);
        console.log(plan);

        $('#plan_id_for_payment').val(plan);
        $('#paymentmodal').modal('show');
    }
</script>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    var elements = stripe.elements();
    var style = {
        base: {
            color: '#32325d',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };
    var card = elements.create('card', {hidePostalCode: true,
        style: style});
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });
    const cardHolderName = document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;
    cardButton.addEventListener('click', async (e) => {
        e.preventDefault();
        console.log("attempting");
        const { setupIntent, error } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: { name: cardHolderName.value }
                }
            }
            );
        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            paymentMethodHandler(setupIntent.payment_method);
        }
    });
    function paymentMethodHandler(payment_method) {
        var form = document.getElementById('subscribe-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', payment_method);
        form.appendChild(hiddenInput);
        form.submit();
    }
</script>
@endsection