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
</style>
@include('includes.navbar')
<section class="contentSection position-relative">
	<div class="container-fluid contentRow">
		<div class="row">
			<div class="col-12 text-center">
				<h3 class="headingTitle">Slide 02</h3>
			</div>
			<div class="col-12 mt-3">
				<!-- <form class="w-50 mx-auto" action="">
					<div class="form-group mb-3">
						<label class="label" for="name">Designed For:</label>
						<input type="text" class="form-control" placeholder="ex: Patrick Milton" required>
					</div>
					<div class="form-group mb-3">
						<label class="label" for="name">First Name:</label>
						<input type="text" class="form-control" placeholder="ex: Jennifer" required>
					</div>
					<div class="form-group mb-3">
						<label class="label" for="name">Last Name:</label>
						<input type="text" class="form-control" placeholder="ex: Star" required>
					</div>
					<div class="form-group w-50 mx-auto">
						<button type="submit" class="form-control btn btn-primary rounded submit px-3">Submit</button>
					</div>
				</form> -->
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui vero eaque obcaecati ab esse mollitia, reiciendis sed nihil assumenda quos. Sed magnam blanditiis laudantium enim nisi deleniti itaque molestiae quia omnis voluptatum, suscipit neque a eaque dolores reprehenderit perspiciatis doloribus veniam maxime, eum earum officiis commodi facere architecto. Illo, corporis.</p>
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sint repellendus, aliquam ex laudantium maxime a dignissimos similique eius fuga ut ullam fugit sapiente repudiandae libero atque, cumque laborum inventore numquam eos odit perferendis. Nihil facilis porro, natus dolore eos nisi? Inventore, in? Quis facere minima magni minus molestias exercitationem vel, odio alias, ratione iste maxime repellat repudiandae dicta maiores excepturi perspiciatis molestiae totam ipsum sint dolor ipsa cumque. Numquam quibusdam aut vel maxime officiis nostrum accusamus suscipit odio, necessitatibus eum.</p>
			</div>
		</div>

	</div>
	<div class="buttonSection d-flex justify-content-end align-items-center mt-5">
		<a href="{{url('/slide/1')}}" class="navBtns mr-2"><i class="fas fa-arrow-left mr-2"></i> Previous</a>
		<a href="{{url('/slide/3')}}" class="navBtns">Next<i class="fas fa-arrow-right ml-2"></i> </a>
	</div>
</section>
@endsection
@section('insertjavascript')
<script>
	$('.sidenav  li:nth-of-type(3)').addClass('active');
</script>
@endsection