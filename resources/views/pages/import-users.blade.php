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
@include('includes.navbar-dash')
<section class="contentSection position-relative">
    <div class="container-fluid contentRow position-relative">
        <div class="row">
            <div class="col px-0">
                <div class="bg-white mx-2 p-4 rounded-lg">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2 class="font-49 crimson primary-color">
                            Add Users
                        </h2>
                    </div>
                    <form class="mt-4" action="{{ route('import-users') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col" style="margin-top: 100px;">
                            <div class="row">
                                <button
                                    class="d-flex align-items-center justify-content-center font-18 poppins primary-btn text-white font-weight-500 position-relative"
                                    style="gap:8px;cursor:pointer;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-upload" viewBox="0 0 16 16">
                                        <path
                                            d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                                        <path
                                            d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                                    </svg>
                                    Import
                                    <input type="file" class="add-file" id="add-file" name="add-file" accept=".xlsx,.csv,.xls"
                                        onchange="previewFile(event)" required>
                                </button>
                                <span class="font-18 mt-3 ml-5" id="file-name"></span>
                            </div>
                            <div class="d-flex justify-content-end mt-5">
                                <a href="{{ url('/users') }}"
                                    class="d-flex align-items-center justify-content-center mt-4 font-18 poppins btn btn-danger text-white font-weight-500 position-relative"
                                    style="gap:8px;cursor:pointer;right: 30px;width: 150px;border-radius: 10px;">Back
                                </a>
                                <button type="submit" class="save-btn mt-4">Save Details</button>
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


@if(session()->has('responseSuccess'))
<script>
    console.log('success');
    Swal.fire({
        title: 'Success',
        text: `{{ session('responseSuccess') }}`,
        icon: 'success',
        confirmButtonColor: "#6dabe4"
    }).then(() => {
        window.location.href = "{{ url('/users') }}";
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
    function previewFile(event) {
        var input = event.target;
        console.log(input.files[0]);

        document.getElementById('file-name').innerHTML = input.files[0].name
        
        // Swal.fire({
        //     text: "Are you sure to Import Questions from this File ("+input.files[0].name+")?",
        //     icon: 'warning',
        //     showCancelButton: true,
        //     confirmButtonColor: "#6dabe4",
        //     cancelButtonColor: "#ce2c2c",
        //     confirmButtonText: 'Yes',
        //     cancelButtonText: 'No, Cancel it!'
        // }).then((result) => {
        //     if (result.isConfirmed) {
        //         console.log(input.files[0]);

        //         var formData = new FormData();
        //         // Append the file to the form data
        //         formData.append('file', input.files[0]);
        //         formData.append('_token', '{{ csrf_token() }}');

        //         // Submit the form using Fetch API
        //         fetch(`{{url('/import')}}`, {
        //             method: 'POST',
        //             body: formData
        //         }).then(response => response.json())
        //         .then(data => {
        //             console.log('Success:', data);
        //         }).catch((error) => {
        //             console.error('Error:', error);
        //         });
        //     }
        //     else{
        //         console.log('Sorry!');
        //     }
        // })
    }
</script>

@endsection