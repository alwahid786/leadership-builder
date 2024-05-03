@extends('layouts.default-layout')
@section('content')
<section class="ftco-section">
	<div class="container  ">
		<div class="row justify-content-center">
			<div class="col-md-12 col-lg-11">
				<div class="wrap d-md-flex">
					<div class="login-wrap w-100 p-4 p-md-5">
						<div class="d-flex">
							<div class="w-100">
								<h3 class="mb-4 text-green">Sign Up</h3>
							</div>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="name">First Name</label>
							<input type="text" class="form-control validate" id="firstName" placeholder="Enter First Name" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="name">Last Name</label>
							<input type="text" class="form-control validate" id="lastName" placeholder="Enter Last Name" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="name">Email</label>
							<input type="email" class="form-control validate" id="email" placeholder="Enter Email" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="name">Phone</label>
							<input type="text" class="form-control validate" id="phone" placeholder="Enter Phone" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="password">Password</label>
							<input type="password" class="form-control validate" id="password" placeholder="Enter Password" required>
						</div>
						<div class="form-group mb-3">
							<label class="label" for="password">Confirm Password</label>
							<input type="password" class="form-control validate" id="passwordConfirmation" placeholder="Enter Password" required>
						</div>
						<div class="form-group">
							<button type="button" class="form-control btn btn-primary rounded submit px-3" id="signupButton">Sign Up</button>
						</div>

						<p class="text-center">Already a member? <a href="{{url('/login')}}">Sign In</a></p>
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
					$(this).css('border', '1px solid rgba(0, 0, 0, 0.1)');
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