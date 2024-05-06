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
		<form action="{{route('submitWow')}}" id="wowForm" method="POST">
			@csrf
			<div class="row">
				<div class="col-12 text-center">
					<h3 class="headingTitle">Wow</h3>
				</div>
				<div class="col-12 mt-3">
					<p>
						On a scale of 1 – 10, with 10 being the best, WOW starts at 11 and goes to infinity. It’s the rare
						air that’s “above and beyond” normal products, services or experiences. You're on a long-haul
						flight, everyone around you is preparing to go to sleep, and suddenly, a flight attendant appears
						out of nowhere and asks if you want a mattress. Yes, a mattress! Who would've thought? But
						that's what happened to me, and let me tell you, it was a game-changing moment, my friends.
					</p>
					<p>
						This amazing flight attendant shows up with a four-inch memory foam mattress, wrapped in
						luxurious 1200 thread count sheets. I mean, talk about attention to detail! As we continue our journey,
						we find ourselves in Dubai, the busiest airport in the world. Now, you may think clearing
						customs there would be a dreaded task, but guess what? We had something even more magical
						than a Disney World Fast pass – included in our ticket price! We bypassed the never-ending
						lines and sailed through customs with ease. It was like achieving the impossible!
					</p>
					<p>
						Finally, in Thailand, after traveling for a grueling 24 hours, we were exhausted. But as if by magic, a driver appears and whisks us away to a luxurious hotel. It was
						the middle of the night, yet we were greeted with warmth and hospitality that truly made us
						say, "Wow!" These experiences made me realize the immense power of creating moments that
						go above and beyond expectations.
					</p>
					<p>
						When you deliver "Wow" experiences to the people you influence – whether they are your
						prospects, customers, team members, or even your own family – you are doing something
						right. These moments have the power to transform lives, build lasting relationships, and set you
						apart as a leader in your industry.
					</p>
				</div>
				<div class="col-12 mt-3">
					<h4 class="mb-0">Record Audio</h4>
					<p>Record audio to convert to text in the editor below.</p>
					<div id="controls" class="d-flex align-items-center justify-content-between">
						<div>
							<button type="button" data-class="wow" id="startBtn1" data-sr_no="1" data-editor_name="editor" class="startBtn">Start Recording</button>
							<button type="button" data-class="wow" id="stopBtn1" data-sr_no="1" class="btn-danger stopBtn" style="display: none;">Stop Recording</button>
							<button type="button" data-class="wow" id="resetBtn1" data-sr_no="1" class="btn-danger resetBtn" style="display: none;">Reset Text</button>
						</div>
						<div class="d-flex align-items-center">
							<i class="zmdi zmdi-circle mr-2"></i>
							<div id="timer1">00:00:00</div>
						</div>
					</div>
					<div class="mt-3">
						<div id="preview"></div>
						<div id="editor"><?php echo $book['wow'] ?? '' ?></div>
					</div>
				</div>
				<input type="hidden" name="wow" id="contentInput" data-class="wow">
				<div class="text-right px-3 mt-3 w-100">
					<button type="submit" data-class="wow" id="save" class="btn btn-primary"><i class="fas fa-save mr-2"></i>Save</button>
				</div>
			</div>
		</form>

	</div>
	<div class="buttonSection d-flex justify-content-end align-items-center mt-5">
		<a href="{{url('/cover')}}" class="navBtns mr-2"><i class="fas fa-arrow-left mr-2"></i> Previous</a>
		@if(auth()->user()->unlocked_pages >= 3)
		<a href="{{url('/gratitude/con')}}" class="navBtns">Next<i class="fas fa-arrow-right ml-2"></i> </a>
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
				<input name="page_number" type="hidden" id="pageNumber" value="3" class="form-control validation">
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
@if(session()->has('wowSuccess'))
<script>
	Swal.fire({
		title: 'Success',
		text: `{{ session('wowSuccess') }}`,
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
	$('.sidenav  li:nth-of-type(2)').addClass('active');
</script>
<script src="{{asset('assets/js/voice-recognition.js')}}"></script>
<script>
	$(document).ready(function() {
		// var scrollableDiv = document.getElementById("navAccordion");
		// scrollableDiv.scrollTop = scrollableDiv.scrollHeight;

		$("#wowForm").submit(function(e) {
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
				$("#wowForm")[0].submit();
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
			$("form#wowForm :input").each(function() {
				let val = $(this).val();
				if (val == '' && $(this).attr('data-class') !== 'wow') {
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
						window.location.href = `{{url('/gratitude/con')}}`
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