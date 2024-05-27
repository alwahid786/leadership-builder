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
        <div class="d-flex align-items-center justify-content-between mt-2 mb-5">
            <h2 class="font-49 primary-color crimson mb-3">
                All Questions
            </h2>
            <a href="{{ url('/add-plan-page') }}"
                class="d-flex align-items-center justify-content-center font-18 poppins primary-btn text-white font-weight-500 position-relative"
                style="gap:8px;cursor:pointer;">
                Add New Plan
            </a>
        </div>
        <div class="row">
            <div class="col">
                @foreach ($plans as $index => $plan)
                @php
                $colorClass = '';
                if ($index % 3 == 0) {
                    $colorClass = 'basic';
                } elseif ($index+1 % 3 == 2) {
                    $colorClass = 'professional';
                } else {
                    $colorClass = 'enterprise';
                }
                @endphp
                <div class="plan-card mb-5 {{ $colorClass }}">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="heading-one font-49">{{ $plan->name }}</h2>
                        <h2 class="price">
                            ${{ $plan->price }}
                            <span style="font-size:16px">/month</span>
                        </h2>
                    </div>
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mt-3 mt-md-5"
                        style="gap:1rem;">
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">{{ $plan->details }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <a href="{{ url('/edit-plan-page/' . $plan->id) }}" class="edit-btn d-flex align-items-center justify-content-center"
                            style="background-color: rgba(99, 99, 255, 1);">
                            Edit
                        </a>
                    </div>
                </div>
                @endforeach
                {{-- <div class="plan-card professional">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="heading-one font-49">Professional Plan</h2>
                        <h2 class="price">
                            $700
                            <span style="font-size:16px">/month</span>
                        </h2>
                    </div>
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mt-3 mt-md-5"
                        style="gap:1rem;">
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                            <div class="d-flex align-items-center mt-md-2 pt-md-1" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                            <div class="d-flex align-items-center mt-md-2 pt-md-1" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                            <div class="d-flex align-items-center mt-md-2 pt-md-1" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <button class="edit-btn d-flex align-items-center justify-content-center"
                            style="background-color: rgba(79, 143, 64, 1)">
                            Edit
                        </button>
                    </div>
                </div>
                <div class="plan-card enterprise">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="heading-one font-49">Enterprise Plan</h2>
                        <h2 class="price">
                            $900
                            <span style="font-size:16px">/month</span>
                        </h2>
                    </div>
                    <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between mt-3 mt-md-5"
                        style="gap:1rem;">
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                            <div class="d-flex align-items-center mt-md-2 pt-md-1" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                            <div class="d-flex align-items-center mt-md-2 pt-md-1" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                        </div>
                        <div>
                            <div class="d-flex align-items-center" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                            <div class="d-flex align-items-center mt-md-2 pt-md-1" style="gap:8px;">
                                <span
                                    style="width:7px;height:7px;border-radius:50%;background:rgba(94, 94, 94, 1);"></span>
                                <p class="para mb-0">Lorem ipsum is a placeholder text commonly</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-flex justify-content-end">
                        <button class="edit-btn d-flex align-items-center justify-content-center"
                            style="background-color: rgba(168, 118, 0, 1);">
                            Edit
                        </button>
                    </div>
                </div> --}}
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

@endsection