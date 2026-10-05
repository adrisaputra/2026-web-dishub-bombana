@php
$setting = \App\Helpers\Helpers::setting();
@endphp
@extends('web.layout')
@section('content')
<style>
	/* =========================================================
   NEWS DETAIL
   ========================================================= */

	/* Card utama */
	.information-card {
		background: #fff;
		border: 1px solid #e8edf2;
		border-radius: 16px;
		overflow: hidden;
		box-shadow: 0 8px 30px rgba(0, 0, 0, 0.06);
	}

	.information-body {
		padding: 25px;
	}


	/* =========================================================
   BREADCRUMB
   ========================================================= */

	.information-body>.breadcrumb {
		display: flex;
		align-items: center;
		gap: 5px;

		margin: 0 0 15px;
		padding: 0;

		background: transparent;

		color: #9299a5;
		font-size: 13px;
	}

	.information-body>.breadcrumb a {
		color: #dca400;
		font-weight: 600;
		text-decoration: none;
	}

	.information-body>.breadcrumb a:hover {
		color: #b98200;
		text-decoration: underline;
	}


	/* =========================================================
   JUDUL BERITA
   ========================================================= */

	.information-heading {
		margin-top: 0;
		margin-bottom: 15px;

		color: #202733;

		font-size: 25px !important;
		line-height: 1.45;

		font-weight: 700;

		text-transform: none;
	}


	/* =========================================================
   META BERITA
   ========================================================= */

	.information-card .meta {
		display: flex;
		align-items: center;
		flex-wrap: wrap;

		gap: 8px 18px;

		margin-top: -10px;
		margin-bottom: 22px;
		padding: 12px 0;

		border-bottom: 1px solid #edf0f3;

		color: #858d99;
		font-size: 13px;
	}

	.information-card .meta-item {
		display: flex;
		align-items: center;
	}

	.information-card .meta-item strong {
		color: #3d4652;
		font-weight: 600;
	}

	.information-card .meta-item.right {
		margin-left: auto;
	}

	/* =========================================================
   GAMBAR COVER
   ========================================================= */

	.information-img2 {
		width: 100%;

		margin-bottom: 25px;

		overflow: hidden;

		border-radius: 12px;

		background: #f4f5f6;
	}

	.information-img2 img {
		display: block;

		width: 100%;
		height: auto;

		max-height: 550px;

		object-fit: cover;

		transition: transform 0.3s ease;
	}

	.information-img2:hover img {
		transform: scale(1.01);
	}


	/* =========================================================
   ISI BERITA
   ========================================================= */

	.information-desc {
		margin-top: 0 !important;
		margin-bottom: 25px;

		color: #222 !important;

		font-size: 16px;

		line-height: 1.85;

		word-wrap: break-word;
	}


	/* Paragraf */
	.information-desc p {
		margin-top: 0;
		margin-bottom: 18px;
	}


	/* Heading */
	.information-desc h1,
	.information-desc h2,
	.information-desc h3,
	.information-desc h4,
	.information-desc h5,
	.information-desc h6 {
		margin-top: 25px;
		margin-bottom: 12px;

		color: #202733;

		line-height: 1.4;
	}


	/* Gambar di dalam artikel */
	.information-desc img {
		max-width: 100%;
		height: auto;

		margin-top: 10px;
		margin-bottom: 15px;

		border-radius: 8px;
	}


	/* Link */
	.information-desc a {
		color: #dca400;
		text-decoration: none;
	}

	.information-desc a:hover {
		color: #b98200;
		text-decoration: underline;
	}


	/* List */
	.information-desc ul,
	.information-desc ol {
		margin-bottom: 18px;
		padding-left: 25px;
	}

	.information-desc li {
		margin-bottom: 6px;
	}


	/* Blockquote */
	.information-desc blockquote {
		margin: 25px 0;
		padding: 15px 20px;

		border-left: 4px solid #f0b400;
		border-radius: 0 8px 8px 0;

		background: #fff9e6;

		color: #555;
	}


	/* Table */
	.information-desc table {
		width: 100% !important;
		max-width: 100%;

		margin-bottom: 20px;

		border-collapse: collapse;
	}

	.information-desc table th,
	.information-desc table td {
		padding: 8px;

		border: 1px solid #ddd;
	}


	/* =========================================================
   SHARE
   ========================================================= */

	.information-meta {
		display: flex;
		align-items: center;
		flex-wrap: wrap;

		gap: 5px;

		padding-top: 18px;

		border-top: 1px solid #edf0f3;

		color: #555;

		font-size: 14px;
		font-weight: 600;
	}

	.information-meta a {
		display: inline-flex;

		margin-left: 3px;

		transition:
			transform 0.2s ease,
			opacity 0.2s ease;
	}

	.information-meta a:hover {
		transform: translateY(-3px);
		opacity: 0.8;
	}

	.information-meta img {
		display: block;

		width: 36px;
		height: 36px;

		object-fit: contain;
	}

.information-meta .share-label {
    display: inline-flex;
    align-items: center;

    gap: 5px;

    color: #555;

    font-size: 14px;
    font-weight: 600;

    line-height: 1;
}

.information-meta .share-label a {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    margin-left: 2px;

    line-height: 0;
}

.information-meta .share-label img {
    display: block;

    width: 40px;
    height: 40px;

    object-fit: contain;
}
	/* =========================================================
   BERITA TERBARU - SIDEBAR
   ========================================================= */

	.information-card .information-item {
		display: flex;

		gap: 12px;

		padding: 13px 0;

		border-bottom: 1px solid #edf0f3;
	}

	.information-card .information-item:last-child {
		border-bottom: 0;
	}


	/* Thumbnail berita */
	.information-card .information-item>img {
		flex: 0 0 90px;

		width: 90px;
		height: 65px;

		object-fit: cover;

		border-radius: 8px;

		background: #f1f3f5;
	}


	/* Info berita */
	.information-card .information-info {
		min-width: 0;
		flex: 1;
	}


	/* Judul sidebar */
	.information-card .information-info .judul {
		display: -webkit-box;

		overflow: hidden;

		color: #273142;

		font-size: 14px;
		line-height: 1.4;

		font-weight: 600;

		text-decoration: none;

		text-overflow: ellipsis;

		-webkit-line-clamp: 3;
		-webkit-box-orient: vertical;
	}

	.information-card .information-info .judul:hover {
		color: #dfa300;
	}


	/* Meta sidebar */
	.information-card .meta2 {
		display: flex;
		flex-direction: column;

		gap: 3px;

		margin-top: 6px;

		color: #9299a5;

		font-size: 10px;
		line-height: 1.4;
	}


	/* =========================================================
   RESPONSIVE
   ========================================================= */

	@media (max-width: 767px) {

		.information-body {
			padding: 18px;
		}

		.information-heading {
			font-size: 21px !important;
		}

		.information-card .meta {
			gap: 7px 12px;
			font-size: 12px;
		}

		.information-img2 img {
			max-height: 350px;
		}

		.information-desc {
			font-size: 15px;
			line-height: 1.75;
		}

		.information-meta img {
			width: 32px;
			height: 32px;
		}

		.information-card .information-item>img {
			flex-basis: 80px;

			width: 80px;
			height: 60px;
		}

		.information-card .information-info .judul {
			font-size: 13px;
		}
	}


	@media (max-width: 480px) {

		.information-body {
			padding: 15px;
		}

		.information-heading {
			font-size: 19px !important;
		}

		.information-card .meta {
			display: block;
		}

		.information-card .meta-item {
			margin-bottom: 6px;
		}

		.information-desc {
			font-size: 14px;
			line-height: 1.75;
		}

		.information-card .information-item {
			gap: 10px;
		}

		.information-card .information-item>img {
			flex-basis: 75px;

			width: 75px;
			height: 57px;
		}
	}
</style>
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
				Detail Berita
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

					<div class="row" id="show_information">
						<div class="col-md-8 bottommargin">
							<div class="information-card" data-animate="fadeInUp" data-delay="100">
								<div class="information-body">
									<h3 class="information-heading" style="font-size: 22px;text-transform: none;margin-top:20px;margin-bottom:10px">{{ $information->title }}</h3>

									<div class="information-img2">
										<img src="{{ asset('storage/upload/information/'.$information->cover) }}" alt="">
									</div>

									<div class="meta">
										<div class="meta-item">
											<span>⏱️ {{ \App\Helpers\Helpers::month_indo_full($information->created_at) }}</span>
										</div>
										<div class="meta-item">
											<span>👤 Ditulis oleh <strong>{{ $information->user->name }}</strong></span>
										</div>
										<div class="meta-item right">
											<span>👁️Dilihat <strong>{{ $information->count_view }}</strong> kali</span>
										</div>
									</div>
									<p class="information-desc" style="color: #000000;margin-top: -80px;">
										{!! $information->text !!}
									</p>
									<div class="information-meta">
										<span class="share-label">
											Bagikan:

											{{-- FACEBOOK --}}
											<a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
												target="_blank"
												rel="noopener noreferrer">
												<img src="{{ asset('storage/menu/icons8-facebook-100.png') }}" width="40" alt="Facebook">
											</a>

											{{-- TWITTER (X) --}}
											<a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($information->title) }}"
												target="_blank"
												rel="noopener noreferrer">
												<img src="{{ asset('storage/menu/icons8-twitter-squared-100.png') }}" width="40" alt="X">
											</a>

											{{-- WHATSAPP --}}
											<a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}"
												target="_blank"
												rel="noopener noreferrer">
												<img src="{{ asset('storage/menu/icons8-whatsapp-100.png') }}" width="40" alt="WhatsApp">
											</a>

											{{-- COPY LINK --}}
											<a href="javascript:void(0)" onclick="copyToClipboard()">
												<img src="{{ asset('storage/menu/icons8-instagram-100.png') }}" width="40" alt="Copy Link">
											</a>

										</span>
									</div>

									<script>
										function copyToClipboard() {
											navigator.clipboard.writeText(window.location.href);
											alert("Link disalin! Tempelkan di Instagram Story Anda.");
										}
									</script>


								</div>

							</div>
						</div>
						<div class="col-md-4 bottommargin">
							<div class="information-card" data-animate="fadeInUp" data-delay="200">
								<div class="information-body">
									<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100" style="color:#0072BC">Berita Terbaru</h4>
									<div class="line line-xs line-home" style="margin: 1rem 0;" data-animate="fadeInUp" data-delay="100"></div>

									@foreach($get_information as $i => $v)
									<div class="information-item">
										<img src="{{ asset('storage/upload/information/'.$v->cover) }}" alt="">
										<div class="information-info">
											<a href="{{ url('page-information-detail?q='.$v->slug) }}" class="judul">{{ $v->title}}</a>
											<div class="meta2">
												<!-- <span>📅 23 September 2025</span> -->
												<span>⏱️ {{ \App\Helpers\Helpers::month_indo_full($v->created_at) }}</span>
												<span>👁️ Dilihat {{ $v->count_view }} kali</span>
											</div>
										</div>
									</div>
									@endforeach
								</div>
								<div class="information-body">
									<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100" style="color:#0072BC">Berita Populer</h4>
									<div class="line line-xs line-home" style="margin: 1rem 0;" data-animate="fadeInUp" data-delay="100"></div>

									@foreach($get_information_popular as $i => $v)
									<div class="information-item">
										<img src="{{ asset('storage/upload/information/'.$v->cover) }}" alt="">
										<div class="information-info">
											<a href="{{ url('page-information-detail?q='.$v->slug) }}" class="judul">{{ $v->title}}</a>
											<div class="meta2">
												<!-- <span>📅 23 September 2025</span> -->
												<span>⏱️ {{ \App\Helpers\Helpers::month_indo_full($v->created_at) }}</span>
												<span>👁️ Dilihat {{ $v->count_view }} kali</span>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>

@endsection