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
								<h3 class="mb-4 text-green">Reset Password</h3>
							</div>
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
							<button id="resetPasswordButton" class="form-control btn btn-primary rounded submit px-3">Update Password</button>
						</div>
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
		// Click Signup Button 
		let errors = 0;
		$("#resetPasswordButton").click(function() {
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
				password: $('#password').val(),
				password_confirmation: $('#passwordConfirmation').val()
			}

			// Ajax REQUEST START
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: `{{url('/password-reset')}}`,
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