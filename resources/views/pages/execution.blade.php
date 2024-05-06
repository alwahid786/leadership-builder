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

	.startBtn {
		background-color: #6dabe4;
		border-radius: 5px;
		padding: 5px 15px;
		border: none;
		color: white;
	}

	.stopBtn {
		background-color: #ce2c2c;
		border-radius: 5px;
		padding: 5px 15px;
		border: none;
		color: white;
	}

	.resetBtn {
		background-color: #2cb0ce;
		border-radius: 5px;
		padding: 5px 15px;
		border: none;
		color: white;
	}

	#pageCode::placeholder {
		/* Chrome, Firefox, Opera, Safari 10.1+ */
		color: gray !important;
		opacity: 1 !important;
		/* Firefox */
	}
</style>
@include('includes.navbar')
<section class="contentSection position-relative">
	<div class="container-fluid contentRow">
		<form action="{{route('submitExecution')}}" id="excutionForm" method="POST">
			@csrf
			<div class="row">
				<div class="col-12 text-center">
					<h3 class="headingTitle">Live It!</h3>
				</div>
				<div class="col-12 mt-3">
					<p>
					<h5 class="mb-0">The Ripple Effect of Your Actions</h5>
					As a leader, your actions speak far louder than words. In fact, the screams of your actions many times drown out the sound of your words.
					</p>
					<p>
					<h5 class="mb-0">Embrace the Power of Observation</h5>
					People naturally observe and judge those they look up to, and as a leader, you are constantly
					under their watchful eyes, someone is always watching. It’s important to recognize that those
					around you are evaluating you based on what you do, not just what you say.
					</p>
					<p>
					<h5 class="mb-0">Living Your Vision, Living Your Goals</h5>
					To lead authentically, you must walk the talk. Your vision and goals aren't just words on paper;
					they are a roadmap for your daily life. Embody your aspirations and lead by example, and you
					will create a powerful synergy that propels your team and yourself toward success. Let your
					actions harmonize with your words and watch your influence soar.
					</p>
				</div>
				<div class="col-12 mt-3">
					<h4 class="mb-0">Record Audio</h4>
					<p>Record audio to convert to text in the editor below.</p>
					<div id="controls" class="d-flex align-items-center justify-content-between">
						<div>
							<button data-class="execution" type="button" id="startBtn1" data-sr_no="1" data-editor_name="editor" class="startBtn">Start Recording</button>
							<button data-class="execution" type="button" id="stopBtn1" data-sr_no="1" class="btn-danger stopBtn" style="display: none;">Stop Recording</button>
							<button data-class="execution" type="button" id="resetBtn1" data-sr_no="1" class="btn-danger resetBtn" style="display: none;">Reset Text</button>
						</div>
						<div class="d-flex align-items-center">
							<i class="zmdi zmdi-circle mr-2"></i>
							<div id="timer1">00:00:00</div>
						</div>
					</div>
					<div class="mt-3">
						<div id="preview"></div>
						<div id="editor"><?php echo $book['execution'] ?? '' ?></div>
					</div>
					<input type="hidden" name="execution" id="contentInput" data-class="execution">
					<div class="text-right px-3 mt-3 w-100">
						<button type="submit" data-class="execution" id="save" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
					</div>
				</div>
			</div>
		</form>

	</div>
	<div class="buttonSection d-flex justify-content-end align-items-center mt-5">
		<a href="{{url('/say-it')}}" class="navBtns mr-2"><i class="fas fa-arrow-left mr-2"></i> Previous</a>
		@if(auth()->user()->unlocked_pages >= 8)
		<a href="{{url('/conclusion/con')}}" class="navBtns">Next<i class="fas fa-arrow-right ml-2"></i> </a>
		@else
		<a href="javascript:void(0)" class="navBtns" id="nextButton" data-toggle="modal" data-target="#exampleModalCenter">Next<i class="fas fa-arrow-right ml-2"></i> </a>
		@endif
	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Enter Code</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>You must enter Page Code to unlock next page.</p>
				<input name="code" type="text" id="pageCode" class="form-control validation" placeholder="Write Code Here...">
				<input name="page_number" type="hidden" id="pageNumber" value="8" class="form-control validation">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="submitCodeButton">Proceed</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('insertjavascript')
@if(session()->has('executionSuccess'))
<script>
	Swal.fire({
		title: 'Success',
		text: `{{ session('executionSuccess') }}`,
		icon: 'success',
		confirmButtonColor: "#6dabe4"
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
	$('.sidenav  li:nth-of-type(7)').addClass('active');
</script>
<script src="{{asset('assets/js/voice-recognition.js')}}"></script>
<script>
	$(document).ready(function() {
		// var scrollableDiv = document.getElementById("navAccordion");
		// scrollableDiv.scrollTop = scrollableDiv.scrollHeight;

		type = "button"
		$("#excutionForm").submit(function(e) {
			e.preventDefault();
			validation = validateForm();
			if (validation) {
				var content = CKEDITOR.instances['editor'].getData();
				if (content == '') {
					Swal.fire({
						title: 'Empty Data',
						text: "Please write something in Text Editor to save!",
						icon: 'error',
						confirmButtonColor: "#6dabe4"
					})
					return;
				}
				$('#contentInput').val(content);
				$("#excutionForm")[0].submit();
			} else {
				Swal.fire({
					title: 'Missing Fields',
					text: "Some fields are missing!",
					icon: 'error',
					confirmButtonColor: "#6dabe4"
				})
			}
		})

		function validateForm() {
			let errorCount = 0;
			$("form#excutionForm :input").each(function() {
				let val = $(this).val();
				if (val == '' && $(this).attr('data-class') !== 'execution') {
					errorCount++
					$(this).css('border', '1px solid red');
				} else {
					$(this).css('border', 'none');
				}
			});
			if (errorCount > 0) {
				return false;
			}
			return true;
		}

		let pageErrors = 0;
		$("#submitCodeButton").click(function() {
			$(".validation").each(function() {
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
						window.location.href = `{{url('/conclusion/con')}}`
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