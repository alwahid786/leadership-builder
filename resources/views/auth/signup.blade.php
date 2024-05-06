@extends('layouts.default-layout')
@section('content')
<section class="ftco-section auth-bg">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 d-flex justify-content-center">
                <div class="wrap d-md-flex">
                    <div class="login-wrap w-100 p-4 p-md-5">
                        <a href="" class="logo_book"><img src="{{asset('assets/images/leader_logo.svg')}}" alt="logo"></a>
                        <h5 class="text-center my-3">Welcome to Leadership Builder</h5>
                        <div class="d-flex">
                            <div class="w-100">
                                <h2 class="mb-4 text-green main_title">Sign Up</h2>
                            </div>
                        </div>
                        <div class="d-md-flex align-items-center" style="gap:20px;">
                            <div class="form-group mb-3 w-100">
                                <label class="label" for="name">First Name</label>
                                <input type="text" class="form-control validate" id="firstName" placeholder="Enter First Name" required>
                            </div>
                            <div class="form-group mb-3 w-100">
                                <label class="label" for="name">Last Name</label>
                                <input type="text" class="form-control validate" id="lastName" placeholder="Enter Last Name" required>
                            </div>
                        </div>
                        <div class="d-md-flex align-items-center" style="gap:20px;">
                            <div class="form-group mb-3 w-100">
                                <label class="label" for="name">Email</label>
                                <input type="email" class="form-control validate" id="email" placeholder="Enter Email" required>
                            </div>
                            <div class="form-group mb-3 w-100">
                                <label class="label" for="name">Phone</label>
                                <input type="text" class="form-control validate" id="phone" placeholder="Enter Phone" required>
                            </div>
                        </div>
                        <div class="d-md-flex align-items-center" style="gap:20px;">
                            <div class="form-group mb-3 w-100">
                                <label class="label" for="password">Password</label>
                                <input type="password" class="form-control validate" id="password" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group mb-3 w-100">
                                <label class="label" for="password">Confirm Password</label>
                                <input type="password" class="form-control validate" id="passwordConfirmation" placeholder="Enter Password" required>
                            </div>
                        </div>
                        <div class="form-group mt-4">
                            <button type="button" class="themePrimaryBtn form-control btn btn-primary rounded submit px-3" id="signupButton">Sign Up</button>
                        </div>
                        <div class="content-break">
                            <div></div>
                            <div>Or</div>
                            <div></div>
                        </div>
                        <p class="text-center mt-4 mb-0">Already a member? <a href="{{url('/login')}}" class="anchors">Sign In</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<script>

</script>
@endsection
@section('insertjavascript')
<script>
    $(document).ready(function() {
        // Click Signup Button
        let errors = 0;
        $("#signupButton").click(function() {
            $(".validate").each(function() {
                if ($(this).val() == '') {
                    errors++;
                    $(this).css('border', '1px solid red');
                } else {
                    errors--;
                    $(this).css('border', '1px solid var(--blue)');
                }
            })
            if (errors > 0) {
                Swal.fire({
                    title: 'Empty Fields',
                    text: 'All fields are required',
                    icon: 'error',
                    confirmButtonColor: "#6dabe4"
                })
                return;
            }
            var data = {
                name: $('#firstName').val(),
                last_name: $('#lastName').val(),
                email: $('#email').val(),
                phone: $('#phone').val(),
                password: $('#password').val(),
                password_confirmation: $('#passwordConfirmation').val()
            }

            // Ajax REQUEST START
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{url('/register')}}`,
                type: "POST",
                data: data,
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
                            window.location.href = `{{url('/login')}}`;
                        });
                    }
                },
                error: function(jqXHR, exception) {
                    Swal.fire({
                        title: 'Validation Error',
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