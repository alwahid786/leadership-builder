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

	thead {
		background-color: #6dabe421;
	}
</style>
@include('includes.navbar')
<section class="contentSection position-relative">
	<div class="container-fluid contentRow">
		<div class="row">
			<div class="col-12 text-center">
				<h3 class="headingTitle">Page Codes</h3>
			</div>
			<div class="col-12 mt-3">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Page</th>
							<th scope="col">Code</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						@if(isset($pageCodes) && !empty($pageCodes))
						<?php $count = 0; ?>
						@foreach($pageCodes as $code)
						<?php $count++;
						$page;
						switch ($code['page_number']) {
							case "2":
								$page = "Wow";
								break;
							case "3":
								$page = "Gratitude";
								break;
							case "4":
								$page = "Desire";
								break;
							case "5":
								$page = "See It";
								break;
							case "6":
								$page = "Say It";
								break;
							case "7":
								$page = "Live It";
								break;
							case "8":
								$page = "Conclusion";
								break;
							default:
								$page = "Invalid day!";
						}
						?>
						<tr>
							<th scope="row">{{$count}}</th>
							<td>{{$page}}</td>
							<td><mark class="pageCode">{{$code['code']}}</mark>
								<input type="hidden" class="codeId" value="{{$code['id']}}">
							</td>
							<td><button class="btn btn-primary px-2 py-1 editPageCode" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit mr-2" aria-hidden="true"></i>Edit</button></td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>

	</div>

</section>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Edit Code</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p><b>Note:</b> Code you enter will be case sensitive!</p>
				<input name="code" type="text" id="pageCode" class="form-control validations" placeholder="Write Code Here...">
				<input name="id" type="hidden" id="codeId" value="" class="form-control validations">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="updateCodeButton">Update</button>
			</div>
		</div>
	</div>
</div>
@endsection
@section('insertjavascript')
<script>
</script>
<script>
	$(document).ready(function() {
		$('.editPageCode').click(function() {
			let code = $(this).parent().parent().find('.pageCode').text();
			let codeId = $(this).parent().parent().find('.codeId').val();
			$("#pageCode").val(code);
			$("#codeId").val(codeId);
		});
		$('#updateCodeButton').click(function() {
			let code = $("#pageCode").val();
			let id = $("#codeId").val();
			var data = {
				code: code,
				id: id
			}
			$.ajax({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				url: `{{url('/updatePageCode')}}`,
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
							window.location.reload();
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
		});
	});
</script>
@endsection