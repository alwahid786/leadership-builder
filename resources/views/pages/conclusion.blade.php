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

	.confetti-img {
		width: 250px;
		height: 250px;
		overflow: hidden;
	}

	.confetti-img img {
		width: 100%;
		height: 100%;
		object-fit: contain;

	}
</style>
@include('includes.navbar')
<section class="contentSection position-relative">
	<div class="container-fluid contentRow">
		<div class="row">
			<div class="col-12 text-center">
				<h3 class="headingTitle">Conclusion</h3>
			</div>
			<div class="col-12 mt-3">
				<div class="confetti-img mx-auto">
					<img src="{{asset('assets/images/confetti.png')}}" alt="">
				</div>
				<p class="px-5 py-3 text-center" style="font-size: 18px;">WOOHOO! You’ve already taken the next step toward improving as a Transformational Leader! I’m grateful to you for allowing me to provide a little help in your journey. Press the button and receive a PDF of this presentation, your entries and 80 days of Leadership Quotes.</p>
			</div>
			<button style="font-size: 18px;" id="createPdf" class="btn btn-primary mx-auto"><i class="fas fa-file-pdf mr-2"></i>Convert to PDF</button>
		</div>

	</div>
	<div class="buttonSection d-flex justify-content-end align-items-center mt-5">
		<a href="{{url('/live-it')}}" class="navBtns mr-2"><i class="fas fa-arrow-left mr-2"></i> Previous</a>
	</div>
</section>
@endsection
@section('insertjavascript')
<script>
	$('.sidenav  li:nth-of-type(8)').addClass('active');
</script>
<script>
	$(document).ready(function() {
		// var scrollableDiv = document.getElementById("navAccordion");
		// scrollableDiv.scrollTop = scrollableDiv.scrollHeight;

		$('#createPdf').click(function() {
			window.open("{{ url('/create-pdf') }}", "_blank");
		});
	});
</script>
@endsection