@extends('layouts.default-layout')
@section('content')
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-10">
				<div class="wrap d-md-flex">
					<div class="w-100 p-4 p-md-5">
						<div class="text-center">
							<div class="w-100">
								<h3 class="mb-4 text-green">Forget Password</h3>
							</div>
							<p>Please enter your email address to verify it's you.</p>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="name">Email</label>
							<input type="email" class="form-control validate" id="email" placeholder="Enter Email" required>
						</div>
						<div class="form-group">
							<button id="verifyEmailButton" class="form-control btn btn-primary rounded submit px-3">Verify Me</button>
						</div>

						<p class="text-center">Remember Password? <a data-toggle="tab" href="{{url('/login')}}">Sign In</a></p>
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
			$(".validate").css('border', '1px solid rgba(0, 0, 0, 0.1)');
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