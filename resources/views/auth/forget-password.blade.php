@extends('layouts.default-layout')
@section('content')
<section class="ftco-section auth-bg">
    <div class="container h-100">
        <div class="row justify-content-center align-content-center h-100">
            <div class="col-12 d-flex justify-content-center">
                <div class="wrap d-md-flex">
                    <div class="login-wrap w-100 p-4 p-md-5">
                        <a href="" class="logo_book"><img src="{{asset('assets/images/leader_logo.svg')}}" alt="logo"></a>
                        <h5 class="text-center my-3">Welcome to Leadership Builder</h5>
                        <div class="d-flex">
                            <div class="w-100">
                                <h2 class=" text-green main_title">Forget Password</h2>
                                <p>Please enter your email address to verify it's you.</p>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label class="label" for="name">Email</label>
                            <input type="email" class="form-control validate" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group mt-4">
                            <button id="verifyEmailButton" class="themePrimaryBtn form-control btn btn-primary rounded submit px-3">Verify Me</button>
                        </div>
                        <div class="content-break">
                            <div></div>
                            <div>Or</div>
                            <div></div>
                        </div>
                        <p class="text-center mt-4 mb-0">Remember Password? <a href="{{url('/')}}" class="anchors">Sign In</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('insertjavascript')
<script>
    $(document).ready(function() {
        // Click Signin Button
        $("#verifyEmailButton").click(function() {
            if ($(".validate").val() == '') {
                $(".validate").css('border', '1px solid red');
                Swal.fire({
                    title: 'Empty Field',
                    text: 'Email is required',
                    icon: 'error',
                    confirmButtonColor: "#6dabe4"
                })
                return;
            }
            $(".validate").css('border', '1px solid var(--blue)');
            // Ajax REQUEST START
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{url('/forgot-password')}}`,
                type: "POST",
                data: {
                    email: $("#email").val(),
                },
                cache: false,
                success: function(dataResult) {
                    if (dataResult.success == false) {
                        Swal.fire({
                            title: 'Error',
                            text: dataResult.message,
                            icon: 'error',
                            confirmButtonColor: "#6dabe4"
                        })
                        return;
                    } else {
                        Swal.fire({
                            title: 'SUCCESS',
                            text: dataResult.message,
                            icon: 'success',
                            confirmButtonColor: "#6dabe4"
                        }).then((result) => {
                            window.location.href = `{{url('/otp-code')}}`;

                        });
                    }
                },
                error: function(jqXHR, exception) {
                    Swal.fire({
                        title: 'Error',
                        text: jqXHR.responseJSON.message,
                        icon: 'error',
                        confirmButtonColor: "#6dabe4"
                    })
                }
            });
            // Ajax REQUEST END
        });
    });
</script>
@endsection