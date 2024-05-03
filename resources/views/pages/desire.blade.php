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
		<form action="{{route('submitDesire')}}" id="desireForm" method="POST">
			@csrf
			<div class="row">
				<div class="col-12 text-center">
					<h3 class="headingTitle mb-0">What Do You Want?</h3>
				</div>
				<div class="col-12 mt-3">
					<p>"Deciding what you want and setting your goal is like crafting a masterpiece in gold. With every stroke and detail, you shape your future with clarity and brilliance. Dare to dream big. The setting of your goal is the first path to your success!" - Unknown</p>
				</div>
				<div class="col-12 mt-3">
					<h4 class="mb-0">Record Audio</h4>
					<p>Record audio to convert to text in the editor below.</p>
					<div id="controls" class="d-flex align-items-center justify-content-between">
						<div>
							<button data-class="desire" type="button" id="startBtn1" data-sr_no="1" data-editor_name="editor" class="startBtn">Start Recording</button>
							<button data-class="desire" type="button" id="stopBtn1" data-sr_no="1" class="btn-danger stopBtn" style="display: none;">Stop Recording</button>
							<button data-class="desire" type="button" id="resetBtn1" data-sr_no="1" class="btn-danger resetBtn" style="display: none;">Reset Text</button>
						</div>
						<div class="d-flex align-items-center">
							<i class="zmdi zmdi-circle mr-2"></i>
							<div id="timer1">00:00:00</div>
						</div>
					</div>
					<div class="mt-3">
						<div id="preview"></div>
						<div id="editor"><?php echo $book['desire'] ?? '' ?></div>
					</div>
				</div>
				<input type="hidden" name="desire" id="contentInput" data-class="desire">
				<div class="text-right px-3 mt-3 w-100">
					<button type="submit" data-class="desire" id="save" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
				</div>
			</div>
		</form>

	</div>
	<div class="buttonSection d-flex justify-content-end align-items-center mt-5">
		<a href="{{url('/gratitude')}}" class="navBtns mr-2"><i class="fas fa-arrow-left mr-2"></i> Previous</a>
		@if(auth()->user()->unlocked_pages >= 5)
		<a href="{{url('/see-it/con')}}" class="navBtns">Next<i class="fas fa-arrow-right ml-2"></i> </a>
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
				<input name="page_number" type="hidden" id="pageNumber" value="5" class="form-control validation">
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
@if(session()->has('desireSuccess'))
<script>
	Swal.fire({
		title: 'Success',
		text: `{{ session('desireSuccess') }}`,
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
	$('.sidenav  li:nth-of-type(4)').addClass('active');
</script>
<script src="{{asset('assets/js/voice-recognition.js')}}"></script>
<script>
	$(document).ready(function() {
		var scrollableDiv = document.getElementById("navAccordion");
		scrollableDiv.scrollTop = scrollableDiv.scrollHeight;

		$("#desireForm").submit(function(e) {
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
				$("#desireForm")[0].submit();
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
			$("form#desireForm :input").each(function() {
				let val = $(this).val();
				if (val == '' && $(this).attr('data-class') !== 'desire') {
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
						window.location.href = `{{url('/see-it/con')}}`
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