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
            <div class="col px-0">
                <div class="edit-plans bg-white mx-2">
                    <h2 class="font-49 crimson primary-color">
                        Add Plans
                    </h2>
                    <form class="mt-4" action="{{ route('addPlan') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="planName">Plan Name</label>
                                    <input type="text" id="planName" name="name" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" id="price" name="price" class="form-control" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="planDetails">Plan Details</label>
                                    {{-- <textarea id="planDetails" cols="30" rows="10" name="details"
                                        class="form-control" required></textarea> --}}
                                    <div class="mt-3">
                                        <div id="preview"></div>
                                        <div id="editor">
                                        </div>
                                    </div>
                                    <input type="hidden" id="details" name="details">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="save-btn mt-4" onclick="saveDetails()">Save
                                        Details</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection
@section('insertjavascript')

<script src="{{asset('assets/js/voice-recognition.js')}}"></script>

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
    function saveDetails() {
        var content = CKEDITOR.instances['editor'].getData();
        if (content == "") {
            Swal.fire({
                title: 'Error',
                text: `Please enter details`,
                icon: 'error',
                confirmButtonColor: "#6dabe4"
            })
        }
        else {
            
            const textarea = document.createElement('textarea');
            
            textarea.innerHTML = content;
            let decodedString = textarea.value;
        
            decodedString = decodedString.replace(/<\/?[^>]+(>|$)/g, '');
        
            document.getElementById('details').value = decodedString;
        }
    }
</script>

@endsection