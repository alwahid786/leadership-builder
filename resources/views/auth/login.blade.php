@extends('layouts.default-layout')
@section('content')
<section class="ftco-section sign_in_page auth-bg">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 d-flex justify-content-center">
                <div class="wrap d-md-flex">
                    <div class="login-wrap w-100 p-4 p-md-5">
                        <a href="" class="logo_book"><img src="{{asset('assets/images/leader_logo.svg')}}" alt="logo"></a>
                        <h5 class="text-center my-3">Welcome to Leadership Builder</h5>
                        <div class="d-flex">
                            <div class="w-100">
                                <h2 class="mb-4 text-green main_title">Sign In</h2>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="name">Email</label>
                            <input type="text" class="form-control validate" id="email" placeholder="Enter Email" required>
                        </div>
                        <div class="form-group mb-2">
                            <label class="label" for="password">Password</label>
                            <input type="password" class="form-control validate" id="password" placeholder="Enter Password" required>
                        </div>
                        <div class="form-group d-md-flex">
                            <div class="w-50 text-left">
                            </div>
                            <div class="w-50 text-md-right">
                                <a class="anchors" href="{{url('forget-password')}}">Forgot Password</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <button id="loginButton" class="themePrimaryBtn form-control btn btn-primary rounded submit px-3">Sign In</button>
                        </div>
                        <div class="content-break">
                            <div></div>
                            <div>Or</div>
                            <div></div>
                        </div>
                        <p class="text-center mt-4 mb-0">Not a member? <a href="{{url('/signup')}}" class="anchors">Sign Up</a></p>
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
        let errors = 0;
        $("#loginButton").click(function() {
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
                email: $('#email').val(),
                password: $('#password').val(),
            }

            // Ajax REQUEST START
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{url('/signin')}}`,
                type: "POST",
                data: data,
                cache: false,
                success: function(dataResult) {
                    console.log(dataResult.data.page_number);
                    if (dataResult.success == false) {
                        Swal.fire({
                            title: 'Error',
                            text: dataResult.message,
                            icon: 'error',
                            confirmButtonColor: "#6dabe4"
                        })
                        return;
                    } else {
                        if (dataResult.data.is_welcomed == 0) {
                            console.log('coming');
                            window.location.href = `{{url('/welcome')}}`;
                            return;
                        }
                        var routeMapping = {
                            0: 'cover',
                            // 1: 'slide/1',
                            // 2: 'slide/2',
                            // 3: 'slide/3',
                            // 4: 'slide/4',
                            // 5: 'slide/5',
                            // 6: 'slide/6',
                            7: 'wow',
                            8: 'gratitude',
                            9: 'desire',
                            10: 'vision',
                            11: 'inspiration',
                            12: 'execution',
                            13: 'conclusion'
                        };
                        url = dataResult.data.page_number;
                        if (dataResult.data.type == 'user') {
                            window.location.href = `{{route('coverPage')}}`;
                        }
                        else if (dataResult.data.type == 'admin') {
                            window.location.href = `{{route('adminDashboard')}}`;
                        }
                        else{
                            Swal.fire({
                                title: 'Error',
                                text: 'Invalid User',
                                icon: 'error',
                                confirmButtonColor: "#6dabe4"
                            });
                        }
                        // if (routeMapping.hasOwnProperty(url)) {
                        //     var route = routeMapping[url];
                        //     window.location.href = `{{url('${route}')}}`;
                        // } else {
                        //     console.error('No route found for page number:', url);
                        // }
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
