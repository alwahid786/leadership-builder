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
								<h3 class="mb-4 text-green">Verify OTP Code</h3>
							</div>
							<p>Please enter OTP Code you received in your email address.</p>
						</div>
						<div class="form-group login-email-field d-flex justify-content-center">
							<div class="otp-inputs my-3">
								<input type="text" maxlength="1" name="otp[]" class="form-control validate" id="input1" onkeyup="moveToNext(this, 'input2')" aria-describedby="emailHelp">
								-<input type="text" maxlength="1" name="otp[]" class="form-control validate" id="input2" onkeyup="moveToNext(this, 'input3')" aria-describedby="emailHelp">
								-<input type="text" maxlength="1" name="otp[]" class="form-control validate" id="input3" onkeyup="moveToNext(this, 'input4')" aria-describedby="emailHelp">
								-<input type="text" maxlength="1" name="otp[]" class="form-control validate" id="input4" aria-describedby="emailHelp">
							</div>
						</div>
						<div class="form-group text-center">
							<input type="hidden" name="otp_code" id="otpCode_d">
							<button id="verifyOtpButton" class="w-50 form-control btn btn-primary rounded submit px-3">Verify</button>
						</div>

						<p class="text-center">Incorrect Email? <a data-toggle="tab" href="{{url('/login')}}">Enter Email</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
@section('insertjavascript')
<script>
	function moveToNext(currentInput, nextInputId) {
		if (currentInput.value.length === currentInput.maxLength) {
			document.getElementById(nextInputId).focus();
		}
	}
</script>
<script>
	$(document).ready(function() {
		$("#input1").focus();
		let errors = 0;
		$("#verifyOtpButton").click(function() {
			combineOTP();
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
			// Ajax REQUEST START
			var csrfToken = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: `{{url('/otp-verification')}}`,
				type: "POST",
				data: {
					otp_code: $("#otpCode_d").val()
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
							window.location.href = `{{url('/reset-password')}}`;
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


		})

		// Combine OTP CODE 
		function combineOTP() {
			const otpInputs = document.querySelectorAll('input[name="otp[]"]');
			const otpValue = Array.from(otpInputs).map(input => input.value).join('');
			document.getElementById('otpCode_d').value = otpValue;
		}
	})
</script>
@endsection