@php
$setting = \App\Helpers\Helpers::setting();
@endphp
@extends('web.layout')
@section('content')
<!-- Page Title
============================================= -->

<link rel="stylesheet" href="{{ asset('frontend/web/profile.css') }}" type="text/css" />
<style>
	.profile-page-title {
		background: linear-gradient(135deg,
			rgba(249, 201, 0, 0.90),
			rgba(233, 169, 0, 0.90)) center center / cover no-repeat;

		color: #fff;
	}

</style>
<!-- Page Title -->

<section id="page-title" class="profile-page-title">

	<div class="profile-page-title-overlay"></div>

	<div class="container">
		<div class="profile-page-title-content">

			<div class="profile-page-title-label">
				<i class="bi bi-info-circle"></i>
				Galeri
			</div>

			<h1 id="title1" data-animate="backInLeft" data-delay="100">{{ $title }}</h1>

			<ol class="breadcrumb profile-breadcrumb" data-animate="backInLeft" data-delay="100">
				<li class="breadcrumb-item">
					<a href="{{ url('/') }}">
						<i class="bi bi-house-door me-1"></i>
						Beranda
					</a>
				</li>

				<li class="breadcrumb-item active" id="title2">
					{{ $title }}
				</li>
			</ol>

		</div>
	</div>

</section>

<!-- Content
		============================================= -->
<section id="content" style="background-image: linear-gradient(45deg, #ffffff, #e9feff);">

	<div class="content-wrap mb-0 pb-0">

		<div class="container clearfix" style="margin-top:30px;">

			<div class="heading-block border-0 mw-100">

				<div class="row clearfix">
					
					<div class="row" id="show_video">
					</div>
					
				</div>

			</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		display(); // load pertama kali
	});

	function display(page = 1) {
		let url = `{{ url('/page-video-list') }}?page=${page}`;

		$.ajax({
			url: url,
			type: "GET",
			success: function(res) {
				$("#show_video").html(res);
			}
		});
	}

	// Pagination AJAX
	$(document).on('click', '.pagination a', function(e) {
		e.preventDefault();

		let page = $(this).attr('href').split('page=')[1];
		display(page); // reload list sesuai page
	});

	$('#search').on('keydown', function(e) {
		if (e.key === "Enter") {
			e.preventDefault();
			display();
		}
	});

</script>
@endsection