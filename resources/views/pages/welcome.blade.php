@extends('layouts.default-layout')
@section('content')
<style>
	.navbar-header {
		background: white;
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

	#pageCode::placeholder {
		/* Chrome, Firefox, Opera, Safari 10.1+ */
		color: gray !important;
		opacity: 1 !important;
		/* Firefox */
	}
</style>
<section class="mx-5 my-3 position-relative" style="height: 80vh;display:flex; align-items:center">
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
					$(this).css('border', '1px solid rgba(0, 0, 0, 0.1)');
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