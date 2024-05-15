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
</style>
@include('includes.navbar')
<section class="contentSection position-relative">
    <div class="container-fluid contentRow">
        <div class="row">
            <div class="col-md-4">
                <div class="plans basic-plan">
                    <div class="d-flex justify-content-between checkbox">
                        <h6 class="m-0">Plan Pricing</h6>
                        <input type="checkbox" id="basic">
                    </div>
                    <h1>Basic</h1>
                    <ul class="ml-4">
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                    </ul>
                    <h1>$500 <small>/month</small></h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="plans pro-plan">
                    <div class="d-flex justify-content-between checkbox">
                        <h6 class="m-0">Plan Pricing</h6>
                        <input type="checkbox" id="basic">
                    </div>
                    <h1>Professional</h1>
                    <ul class="ml-4">
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                    </ul>
                    <h1>$700 <small>/month</small></h1>
                </div>
            </div>
            <div class="col-md-4">
                <div class="plans enterprise-plan">
                    <div class="d-flex justify-content-between checkbox">
                        <h6 class="m-0">Plan Pricing</h6>
                        <input type="checkbox" id="basic">
                    </div>
                    <h1>Enterprise</h1>
                    <ul class="ml-4">
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        </li>
                    </ul>
                    <h1>$900 <small>/month</small></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 offset-md-6 d-flex justify-content-end my-3">
                <button class="themePrimaryBtn2 form-control btn btn-primary rounded submit px-3">Purchase</button>
            </div>
        </div>
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
                                <td style="color: #FAB117;"><strong>$212</strong></td>
                                <td class="proPlan">Professional</td>
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
                            </tr>
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
        var checkbox = $(this).find('input[type="checkbox"]');
        checkbox.prop("checked", !checkbox.prop("checked"));
    });
</script>

@endsection
