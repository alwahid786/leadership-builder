@extends('layouts.default-layout')
@section('content')
<!-- <section class="mx-5 my-3 position-relative" style="height: 80vh;display:flex; align-items:center">
	<div class="container-fluid contentRow">
		<div class="col-12 text-center">
			<h3><strong>Welcome, to Transformational Leadership!</strong> </h3>
		</div>
		<div class="col-12 mt-4">
			<ul>
				<li style="font-size: 20px;">We'll unlock your potential to propel your personal, family & business lives to new heights of success. </li>
				<li style="font-size: 20px;">Transformational leadership revolutionizes the way you lead, inspire, and empower those around you.</li>
				<li style="font-size: 20px;">We'll discuss tools, strategies, and insights to become an extraordinary leader who ignites the fire within yourself and your team.</li>
				<li style="font-size: 20px;">When we're finished you'll have your own personal blueprint for next steps in your journey to better leadership.</li>
				<li style="font-size: 20px;">Your journey to Transformational Leadership starts now.</li>
			</ul>
		</div>
		<div class="text-center col-12">
			<a href="{{url('/welcome/submit')}}" class="navBtns mx-auto">Start Now!<i class="fas fa-arrow-right ml-2"></i> </a>

		</div>
	</div>
</section> -->
<section class="ftco-section sign_in_page auth-bg">
    <div class="container h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 d-flex justify-content-center">
                <div class="wrap d-md-flex">
                    <div class="login-wrap w-100 p-4 p-md-5">
                        <a href="" class="logo_book"><img src="{{asset('assets/images/leader_logo.svg')}}" alt="logo"></a>
                        <h5 class="text-center my-3">Welcome to Leadership Builder</h5>
                        <div class="col-12 mt-4">
                            <ul class="">
                                <li style="font-size: 20px;margin-bottom:20px;color:black">We'll unlock your potential to propel your personal, family & business lives to new heights of success. </li>
                                <li style="font-size: 20px;margin-bottom:20px;color:black">Transformational leadership revolutionizes the way you lead, inspire, and empower those around you.</li>
                                <li style="font-size: 20px;margin-bottom:20px;color:black">We'll discuss tools, strategies, and insights to become an extraordinary leader who ignites the fire within yourself and your team.</li>
                                <li style="font-size: 20px;margin-bottom:20px;color:black">When we're finished you'll have your own personal blueprint for next steps in your journey to better leadership.</li>
                                <li style="font-size: 20px;margin-bottom:20px;color:black">Your journey to Transformational Leadership starts now.</li>
                            </ul>
                        </div>
                        <div class="text-center col-12">
                            <a href="{{url('/welcome/submit')}}" class="navBtns mx-auto themePrimaryBtnWhite">Start Now<i class="fas fa-arrow-right ml-2"></i> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
@section('insertjavascript')
<script>
    $('.sidenav  li:nth-of-type(1)').addClass('active');
</script>
<script>
    $(document).ready(function() {
        // Click Signin Button
        let errors = 0;
        $("#submitCoverButton").click(function() {
            $(".validation").each(function() {
                if ($(this).val() == '') {
                    errors++;
                    $(this).css('border', '1px solid red');
                } else {
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
                errors--;
                return;
            }
            var data = {
                first_name: $('#firstName').val(),
                last_name: $('#lastName').val(),
            }

            // Ajax REQUEST START
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{url('/cover/submit')}}`,
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
                            title: 'Success',
                            text: dataResult.message,
                            icon: 'success',
                            confirmButtonColor: "#6dabe4"
                        })
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
        let pageErrors = 0;
        $("#submitCodeButton").click(function() {
            $(".validations").each(function() {
                if ($(this).val() == '') {
                    pageErrors++;
                    $(this).css('border', '1px solid red');
                } else {
                    $(this).css('border', '1px solid var(--blue)');
                }
            })
            if (pageErrors > 0) {
                Swal.fire({
                    title: 'Empty Fields',
                    text: 'You must Enter Code.',
                    icon: 'error',
                    confirmButtonColor: "#6dabe4"
                })
                pageErrors--;
                return;
            }
            var data = {
                code: $('#pageCode').val(),
                page_number: $('#pageNumber').val(),
            }

            // Ajax REQUEST START
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: `{{url('/validatePageCode')}}`,
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
                        window.location.href = `{{url('/wow/con')}}`
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
