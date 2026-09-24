@php
$setting = \App\Helpers\Helpers::setting();
@endphp
@extends('web.layout')
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/web/profile.css') }}" type="text/css" />
<style>
	.profile-page-title {
		background: linear-gradient(135deg,
			rgba(249, 201, 0, 0.90),
			rgba(233, 169, 0, 0.90)),
		url('{{ asset(' storage/yellow_gradient_low_poly_background.jpg') }}') center center / cover no-repeat;

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
				PROFIL
			</div>

			<h1 id="title1">{{ $title }}</h1>

			<ol class="breadcrumb profile-breadcrumb">
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
<section id="content" style="background-image: linear-gradient(320deg, #ffffffff, #e6fcff);">

	<div class="content-wrap mb-0 pb-0">

		<div class="container clearfix" style="margin-top:30px;">

			<div class="heading-block border-0 mw-100">
				<div class="row col-mb-50">
					<div class="col-4">
						<div class="feature-box2 fbox-plain">
							<div class="fbox-content">

								<div class="row">
									<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="100">
										<a href="javascript:void(0)" onclick="showData('about')">
											<div class="feature-box @if(Request::segment(1)=='page-about') feature-box-active @endif fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Tentang Kami</h3>
												</div>
											</div>
										</a>
									</div>

									<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="100">
										<a href="javascript:void(0)" onclick="showData('vision_mission')">
											<div class="feature-box @if(Request::segment(1)=='page-vision-mission') feature-box-active @endif fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Visi dan Misi</h3>
												</div>
											</div>
										</a>
									</div>

									<div class="col-sm-12 col-lg-12" data-animate="backInRight" data-delay="200">
										<a href="javascript:void(0)" onclick="showData('main_tasks')">
											<div class="feature-box @if(Request::segment(1)=='page-main-tasks') feature-box-active @endif fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Tugas dan Fungsi</h3>
												</div>
											</div>
										</a>
									</div>

									<div class="col-sm-12 col-lg-12" data-animate="backInLeft" data-delay="300">
										<a href="javascript:void(0)" onclick="showData('structure')">
											<div class="feature-box @if(Request::segment(1)=='page-structure') feature-box-active @endif fbox-plain">
												<div class="fbox-content">
													<h3 class="fw-normal" style="color: #ffffff;font-size: 16px;">Struktur Organisasi</h3>
												</div>
											</div>
										</a>
									</div>

								</div>
							</div>
						</div>
					</div>
					<div class="col-8">
						<div class="feature-box2 fbox-plain">
							<div class="fbox-content">

								<div class="row col-mb-50">
									<div class="col-12" id="show_profile">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		segment = "{{ Request::segment(1) }}";
		if (segment == 'page-about') {
			showData('about');
		} else if (segment == 'page-vision-mission') {
			showData('vision_mission');
		} else if (segment == 'page-main-tasks') {
			showData('main_tasks');
		} else if (segment == 'page-structure') {
			showData('structure');
		} 
	});

	function showData(name) {

		$.ajax({
			url: "{{ url('page-profile-list')}}/" + name,
			method: 'GET',
			success: function response(res) {
				$("#show_profile").html(res);

				if (name == 'about') {
					document.getElementById('title1').textContent = "Tentang Kami";
					document.getElementById('title2').textContent = "Tentang Kami";
				} else if (name == 'vision_mission') {
					document.getElementById('title1').textContent = "Visi dan Misi";
					document.getElementById('title2').textContent = "Visi dan Misi";
				} else if (name == 'main_tasks') {
					document.getElementById('title1').textContent = "Tugas Pokok dan Fungsi";
					document.getElementById('title2').textContent = "Tugas Pokok dan Fungsi";
				} else if (name == 'structure') {
					document.getElementById('title1').textContent = "Struktur Organisasi";
					document.getElementById('title2').textContent = "Struktur Organisasi";
				} 

			}
		});
	}
</script>
@endsection