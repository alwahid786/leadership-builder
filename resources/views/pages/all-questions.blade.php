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

    .dropdown {
    position: relative;
    display: inline-block;
    }
    
    .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    }
    
    .dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    }
    
    .dropdown-content a:hover {
    background-color: #f1f1f1;
    }
    
    .dropdown:hover .dropdown-content {
    display: block;
    }
    
    .dropdown-btn {
    background: transparent;
    border: none;
    cursor: pointer;
    }

</style>
@include('includes.navbar-dash')
<section class="contentSection position-relative">
    <div class="container-fluid contentRow position-relative">
        <div class="d-flex align-items-center justify-content-between mb-2">
            <h2 class="font-49 primary-color crimson mb-3">
                All Questions
            </h2>
            <a href="{{url('/add-question-page')}}" class="primary-btn d-flex align-items-center justify-content-center text-white font-weight-500 crimson">
                Add Question
            </a>
        </div>
        <div class="row mt-1 question-cards">
            @foreach ($questions as $index => $question)
            @php
            $colorClass = '';
            if ($index % 9 < 3) {
                $colorClass = 'red';
            } elseif ($index % 9 < 6) {
                $colorClass = 'green';
            } else {
                $colorClass = 'pink';
            }
            @endphp
            <div class="col-md-6 col-lg-4 mt-2">
                {{-- <a href="{{url('/question-detail')}}"> --}}
                    <div class="all-question-card bg-white">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center" style="gap: 12px">
                                <span class="{{$colorClass}}-dot"></span>
                                <span class="{{$colorClass}}-question open">
                                    Question {{$question->day}}
                                </span>
                            </div>
                            <div class="dropdown">
                                <button class="dropdown-btn">
                                    <svg width="27" height="28" viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4.39798" cy="13.5132" r="2.74173" transform="rotate(-90 4.39798 13.5132)" fill="#A5A5A5" />
                                        <circle cx="13.1714" cy="13.5132" r="2.74173" transform="rotate(-90 13.1714 13.5132)" fill="#A5A5A5" />
                                        <circle cx="21.9449" cy="13.5132" r="2.74173" transform="rotate(-90 21.9449 13.5132)" fill="#A5A5A5" />
                                    </svg>
                                </button>
                                <div class="dropdown-content">
                                    <!-- Add your dropdown content here -->
                                    <a href="{{url('/question-detail/'.$question->id)}}">View</a>
                                    <a href="{{url('/edit-question-page/'.$question->id)}}">Edit</a>
                                    <!-- You can add more options as needed -->
                                </div>
                            </div>
                        </div>
                        <h5 class="font-18 cairo font-weight-600 py-2 question">
                            {{$question->question}}
                        </h5>
                        <div class="{{$colorClass}}-line my-3"></div>
                        <div class="d-flex align-items-center justify-content-between pt-3">
                            <div class="profile-images d-flex flex-row-reverse align-items-center">
                                <img src="{{asset('assets/images/user-profile-image-1.png')}}" alt="profile image">
                                <img src="{{asset('assets/images/user-profile-image-2.png')}}" alt="profile image">
                                <img src="{{asset('assets/images/user-profile-image-3.png')}}" alt="profile image">
                                <img src="{{asset('assets/images/user-profile-image-4.png')}}" alt="profile image">
                            </div>
                            <h6 class="total-answers font-14 open font-weight-600">
                                Answers 0
                            </h6>
                        </div>
                    </div>
                {{-- </a> --}}
            </div>
            @endforeach
            {{-- <div class="col-md-6 col-lg-4 mt-2">
                <div class="all-question-card bg-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center" style="gap: 12px">
                            <span class="green-dot"></span>
                            <span class="green-question open">
                                Question 1
                            </span>
                        </div>
                        <button style="border: none;background:transparent;">
                            <svg width="27" height="28" viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4.39798" cy="13.5132" r="2.74173" transform="rotate(-90 4.39798 13.5132)" fill="#A5A5A5" />
                                <circle cx="13.1714" cy="13.5132" r="2.74173" transform="rotate(-90 13.1714 13.5132)" fill="#A5A5A5" />
                                <circle cx="21.9449" cy="13.5132" r="2.74173" transform="rotate(-90 21.9449 13.5132)" fill="#A5A5A5" />
                            </svg>
                        </button>
                    </div>
                    <h5 class="font-18 cairo font-weight-600 py-2 question">
                        Button contact not working when clicked
                    </h5>
                    <div class="green-line my-3"></div>
                    <div class="d-flex align-items-center justify-content-between pt-3">
                        <div class="profile-images d-flex flex-row-reverse align-items-center">
                            <img src="{{asset('assets/images/user-profile-image-1.png')}}" alt="profile image">
                            <img src="{{asset('assets/images/user-profile-image-2.png')}}" alt="profile image">
                            <img src="{{asset('assets/images/user-profile-image-3.png')}}" alt="profile image">
                            <img src="{{asset('assets/images/user-profile-image-4.png')}}" alt="profile image">
                        </div>
                        <h6 class="total-answers font-14 open font-weight-600">
                            Answers 23
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mt-2">
                <div class="all-question-card bg-white">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center" style="gap: 12px">
                            <span class="pink-dot"></span>
                            <span class="pink-question open">
                                Question 1
                            </span>
                        </div>
                        <button style="border: none;background:transparent;">
                            <svg width="27" height="28" viewBox="0 0 27 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="4.39798" cy="13.5132" r="2.74173" transform="rotate(-90 4.39798 13.5132)" fill="#A5A5A5" />
                                <circle cx="13.1714" cy="13.5132" r="2.74173" transform="rotate(-90 13.1714 13.5132)" fill="#A5A5A5" />
                                <circle cx="21.9449" cy="13.5132" r="2.74173" transform="rotate(-90 21.9449 13.5132)" fill="#A5A5A5" />
                            </svg>
                        </button>
                    </div>
                    <h5 class="font-18 cairo font-weight-600 py-2 question">
                        Button contact not working when clicked
                    </h5>
                    <div class="pink-line my-3"></div>
                    <div class="d-flex align-items-center justify-content-between pt-3">
                        <div class="profile-images d-flex flex-row-reverse align-items-center">
                            <img src="{{asset('assets/images/user-profile-image-1.png')}}" alt="profile image">
                            <img src="{{asset('assets/images/user-profile-image-2.png')}}" alt="profile image">
                            <img src="{{asset('assets/images/user-profile-image-3.png')}}" alt="profile image">
                            <img src="{{asset('assets/images/user-profile-image-4.png')}}" alt="profile image">
                        </div>
                        <h6 class="total-answers font-14 open font-weight-600">
                            Answers 23
                        </h6>
                    </div>
                </div>
            </div> --}}
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