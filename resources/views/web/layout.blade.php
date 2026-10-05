<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta charset="utf-8">

	<!-- Document Title
	============================================= -->
	@if(Request::segment(1)=="page-news-detail")
		<title>{{ $news->title }} | {{ $setting->application_name }}</title>
	@else
		<title>{{ $setting->application_name }}</title>
	@endif

	<link rel="icon" type="image/x-icon" href="{{ asset('storage/upload/setting/'.$setting->small_icon) }}" />

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="index,follow">
	<link rel="canonical" href="{{ url()->current() }}">
	
	@if(Request::segment(1)=="page-news-detail" )
		<meta property="og:title" content="{{ $news->title }}">
		<meta name="description" content="{{ Str::limit(strip_tags($news->text), 100, ' ...') }}">
		<meta name="author" content="{{ $setting->application_name }}">
		<meta name="keywords" content="{{ $news->title }}, berita desa, {{ $setting->application_name }}">
		<meta property="og:locale" content="id_ID">
		<meta property="og:type" content="article">
		<meta property="og:description" content="{{ Str::limit(strip_tags($news->text), 150) }}">
		<meta property="og:url" content="{{ url()->current() }}">
		<meta property="og:site_name" content="{{ $setting->application_name }}">
		<meta property="og:image" content="{{ asset('storage/upload/news/'.$news->cover) }}">
		<meta property="og:image:secure_url" content="{{ asset('storage/upload/news/'.$news->cover) }}" />
		<meta property="og:image:type" content="image/jpeg" />
		<meta property="og:image:width" content="1200">
		<meta property="og:image:height" content="630">
		<meta property="og:image:alt" content="{{ $news->title }}">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="{{ $news->title }}">
		<meta name="twitter:description" content="{{ Str::limit(strip_tags($news->text),150) }}">
		<meta name="twitter:image" content="{{ asset('storage/upload/news/'.$news->cover) }}">
		<meta name="twitter:image:alt" content="{{ $news->title }}">
	@else
		<meta name="description" content="{{ $setting->application_name }} merupakan website resmi yang menyediakan informasi, publikasi, layanan administrasi, permintaan data, permintaan surat keterangan, dan pengaduan masyarakat.">
		<meta name="keywords" content="Desa, Kelurahan, Pemerintah Desa, Pemerintah Kelurahan, Layanan Desa, Permintaan Data, Surat Keterangan, Pengaduan, Statistik Penduduk, Profil Desa">
		<meta name="author" content="{{ $setting->application_name }}">
		<meta property="og:locale" content="id_ID">
		<meta property="og:type" content="website">
		<meta property="og:title" content="{{ $setting->application_name }}">
		<meta property="og:description" content="Website resmi {{ $setting->application_name }} yang menyediakan informasi dan layanan publik secara online.">
		<meta property="og:url" content="{{ url()->current() }}">
		<meta property="og:site_name" content="{{ $setting->application_name }}">

		<meta property="og:image" content="{{ asset('storage/upload/setting/'.$setting->logo) }}">
		<meta property="og:image:secure_url" content="{{ asset('storage/upload/setting/'.$setting->logo) }}">
		<meta property="og:image:type" content="image/png">
		<meta property="og:image:alt" content="{{ $setting->application_name }}">

		<meta name="twitter:image:alt" content="{{ $setting->application_name }}">
		<meta name="twitter:card" content="summary_large_image">
		<meta name="twitter:title" content="{{ $setting->application_name }}">
		<meta name="twitter:description" content="Website resmi {{ $setting->application_name }}.">
		<meta name="twitter:image" content="{{ asset('storage/upload/setting/'.$setting->logo) }}">
	@endif

	<!-- Stylesheets
	============================================= -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
	
	<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/swiper.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/dark.css') }}" type="text/css" />
	

	<!-- Construction Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('frontend/demos/construction/construction.css') }}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('frontend/app.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/add.css') }}" type="text/css" />

	<!-- Bootstrap Select CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/components/bs-select.css') }}" type="text/css" />

	<!-- Bootstrap Switch CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/components/bs-switches.css') }}" type="text/css" />

	<!-- Range Slider CSS -->
	<link rel="stylesheet" href="{{ asset('frontend/css/components/ion.rangeslider.css') }}" type="text/css" />

	<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}" type="text/css" />
	
	<link rel="stylesheet" href="{{ asset('frontend/bootstrap.css') }}" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="{{ asset('frontend/css/colors.php?color=F5C400') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/beauty.css') }}" type="text/css" />

	<!-- Document Title
	============================================= -->
	<title>{{ $setting->application_name }}</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('upload/setting/'.$setting->small_icon) }}" />
	<style>
		
        :root {
            --brand-primary: #0072BC;
            --brand-secondary: #005A96;
            --brand-accent: #F5C400;
            --brand-accent-dark: #D9A900;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

		@media (max-width: 768px) {
			.my-div {
				margin-bottom: 0px !important;
				/* override inline style */
			}
		}

		/* HEADER NORMAL, TIDAK MENUMPUK SLIDER */
		#header {
			position: relative !important;
			top: auto !important;
			left: auto !important;
			right: auto !important;
			width: 100% !important;
			z-index: 1000;
		}

		/* SLIDER MULAI SETELAH HEADER */
		#slider {
			width: 100%;
			height: calc(100vh - var(--header-height));
			overflow: hidden;
			background: #000;
		}

		#slider .swiper-container,
		#slider .swiper-wrapper,
		#slider .swiper-slide {
			width: 100%;
			height: 100%;
		}

		#slider .swiper-slide-bg {
			width: 100%;
			height: 100%;
			background-size: 100% 100% !important;
			background-position: center !important;
			background-repeat: no-repeat !important;
		}

		@media (min-width: 992px) {
			#header {
				margin-bottom: 50px;
			}
		}

		.ticker-wrapper {
			overflow: hidden;
			white-space: nowrap;
		}

		.ticker-text {
			display: inline-block;
			animation: ticker 30s linear infinite;
		}

		.ticker-wrapper:hover .ticker-text {
			animation-play-state: paused;
		}

		@keyframes ticker {
			0% {
				transform: translate3d(0, 0, 0);
			}

			100% {
				transform: translate3d(-50%, 0, 0);
			}
		}

		/* Hero Featured Cards */
		.hero-card {
			position: relative;
			border-radius: 16px;
			overflow: hidden;
			height: 440px;
			border: none;
			box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
		}

		.hero-card img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			transition: transform 0.5s ease;
		}

		.hero-card:hover img {
			transform: scale(1.04);
		}

		.hero-overlay {
			position: absolute;
			inset: 0;
			background: linear-gradient(180deg, rgba(0, 0, 0, 0) 25%, rgba(0, 0, 0, 0.88) 100%);
			display: flex;
			flex-direction: column;
			justify-content: flex-end;
			padding: 2rem;
			color: #ffffff;
		}

		.side-hero-card {
			border: none;
			border-radius: 12px;
			background: #ffffff;
			transition: var(--transition-smooth);
			box-shadow: 0 4px 12px rgba(0, 0, 0, 0.04);
		}

		.side-hero-card:hover {
			transform: translateY(-3px);
			box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
		}

		.sambutan-card {
			position: relative;
			border-radius: 16px;
			overflow: hidden;
			height: auto;
			border: none;
			box-shadow: 0 10px 25px rgba(0,0,0,0.1);
		}

		.sambutan-card img {
			width: 100%;
			height: auto;
			display: block;
			object-fit: cover;
			transition: transform 0.5s ease;
		}

		.sambutan-card {
			display: flex;
			position: relative;
			overflow: hidden;
			min-height: 400px;
			background: #fff;
			border-radius: 15px;
		}

		.sambutan-image {
			width: 40%;
			flex-shrink: 0;
		}

		.sambutan-image img {
			width: 80%;
			height: 100%;
			object-fit: cover;
			display: block;
			margin: 0 auto;
		}

		.sambutan-content {
			width: 60%;
			padding: 40px;
			display: flex;
			flex-direction: column;
			justify-content: center;
		}

		.sambutan-content h2 {
			font-size: 20px;
			color: #222;
		}

		.sambutan-content p {
			line-height: 1.7;
			font-size: 14px;
		}

		/* Mobile */
		@media (max-width: 767.98px) {
			.sambutan-card {
				display: block;
			}

			.sambutan-image {
				width: 100%;
				height: 280px;
			}

			.sambutan-content {
				width: 100%;
				padding: 25px;
			}

			.sambutan-content h2 {
				font-size: 23px;
			}
		}

		
        /* Article Card Styles */
        .news-card {
            border: none;
            border-radius: 14px;
            overflow: hidden;
            transition: var(--transition-smooth);
            height: 100%;
            background: #ffffff;
            box-shadow: 0 4px 14px rgba(0,0,0,0.04);
        }

        .news-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 14px 28px rgba(0,0,0,0.1);
        }

        .news-card-img-wrapper {
            position: relative;
            height: 210px;
            overflow: hidden;
        }

        .news-card-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .news-card:hover .news-card-img-wrapper img {
            transform: scale(1.06);
        }

        /* Category Badges & Pills */
        .badge-category {
            font-weight: 700;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 6px 12px;
            border-radius: 20px;
        }

        .category-pill {
            text-decoration: none;
            color: #475569;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            border-radius: 30px;
            padding: 8px 20px;
            font-weight: 600;
            font-size: 0.88rem;
            transition: var(--transition-smooth);
            display: inline-block;
            white-space: nowrap;
        }

        .category-pill:hover,
        .category-pill.active {
            background-color: var(--brand-primary);
            color: #ffffff !important;
            border-color: var(--brand-primary);
        }

        /* Bookmark Button Styling */
        .btn-bookmark {
            position: absolute;
            top: 12px;
            right: 12px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(4px);
            border: none;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #334155;
            transition: var(--transition-smooth);
            z-index: 2;
        }

        .btn-bookmark:hover {
            background: #ffffff;
            color: var(--brand-primary);
        }

        /* Sidebar Widgets */
        .trending-number {
            font-size: 2rem;
            font-weight: 800;
            color: var(--brand-primary);
            opacity: 0.85;
            line-height: 1;
            min-width: 36px;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

		.text-white-custom {
			color: #fff !important;
		}
	</style>
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar" class="py-2">
			<div class="container clearfix">

				<div class="row align-items-center">
					<div class="col-md-3 d-none d-md-flex align-items-center gap-2 text-secondary">
						<i class="bi bi-calendar3"></i>
						<span>{{ \App\Helpers\Helpers::day_name(date('l')) }}, {{ \App\Helpers\Helpers::month_indo_full(date('d-m-Y')) }}</span>
					</div>
					<div class="col-md-6 col-12">
						<div class="d-flex align-items-center gap-2">
							{{--<span class="badge bg-danger text-uppercase px-2 py-1">Terkini</span>--}}
							<div class="ticker-wrapper w-100 text-truncate">
								<div class="ticker-text fw-medium text-secondary">
									{{--🚀 Peluncuran Satelit Nusantara III Berhasil Dilakukan &nbsp;&bull;&nbsp; 📈 Pertumbuhan Ekonomi Kuartal Ini Naik 5.2% &nbsp;&bull;&nbsp; ⚽ Timnas Indonesia Masuk Babak Kualifikasi Utama--}}
									Selamat Datang Di Website Resmi Dinas Perhubungan Kabupaten Bombana
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-none d-md-flex justify-content-end align-items-center gap-3 text-secondary">
						<a href="{{ $setting->facebook }}" class="text-reset text-decoration-none hover-danger"><i class="bi bi-facebook"></i></a>
						<a href="{{ $setting->twitter }}" class="text-reset text-decoration-none hover-danger"><i class="bi bi-twitter-x"></i></a>
						<a href="{{ $setting->instagram }}" class="text-reset text-decoration-none hover-danger"><i class="bi bi-instagram"></i></a>
						<a href="{{ $setting->youtube }}" class="text-reset text-decoration-none hover-danger"><i class="bi bi-youtube"></i></a>
					</div>
				</div>

			</div>
		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header" class="header-size-sm my-div" data-sticky-shrink="true">
			<div id="header-wrap">
				<div class="container">
					{{--<div class="header-row justify-content-between flex-row-reverse flex-lg-row justify-content-lg-center">--}}
					<div class="header-row justify-content-between flex-row-reverse flex-lg-row">
						<a href="index.html" class="standard-logo"><img src="{{ asset('storage/upload/setting/'.$setting->large_icon) }}" width="60%"></a>
						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100">
								<path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path>
								<path d="m 30,50 h 40"></path>
								<path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path>
							</svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu with-arrows">

							<ul class="menu-container">
								<li class="menu-item current"><a class="menu-link" href="{{ url('/') }}" @if(Request::segment(1)==NULL) style="color: #F5C400;" @else style="color: white;" @endif>
										<div>Beranda</div>
									</a></li>
								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-opening-speech','page-about','page-vision-mission','page-structure'))) style="color: #F5C400;" @else style="color: white;" @endif>
										<div>Profil</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('page-about') }}" @if(Request::segment(1)=='page-about' ) style="color: #F5C400;" @endif>
												<div>Tentang Kami</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-vision-mission') }}" @if(Request::segment(1)=='page-vision-mission' ) style="color: #F5C400;" @endif>
												<div>Visi & Misi</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-main-tasks') }}" @if(Request::segment(1)=='page-main-tasks' ) style="color: #F5C400;" @endif>
												<div>Tugas Pokok & Fungsi</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-structure') }}" @if(Request::segment(1)=='page-structure' ) style="color: #F5C400;" @endif>
												<div>Struktur Organisasi</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-information'))) style="color: #F5C400;" @else style="color: white;" @endif>
										<div>Informasi Publik</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('page-information/program-dan-kegiatan') }}" @if(Request::segment(1)=='page-news' ) style="color: #F5C400;" @endif>
												<div>Program dan Kegiatan</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-information/pelayanan-publik') }}" @if(Request::segment(1)=='page-news' ) style="color: #F5C400;" @endif>
												<div>Pelayanan Publik</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-information/transportasi-dan-fasilitas-perhubungan') }}" @if(Request::segment(1)=='pageannouncement' ) style="color: #F5C400;" @endif>
												<div>Transportasi dan Fasilitas Perhubungan</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-information/perizinan-dan-persyaratan-pelayanan') }}" @if(Request::segment(1)=='pageannouncement' ) style="color: #F5C400;" @endif>
												<div>Perizinan dan Persyaratan Pelayanan</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-information/lainnya') }}" @if(Request::segment(1)=='pageannouncement' ) style="color: #F5C400;" @endif>
												<div>Lainnya</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item current"><a class="menu-link" href="{{ url('/page-news') }}" @if(Request::segment(1)=='page-news' ) style="color: #F5C400;" @else style="color: white;" @endif>
										<div>Berita</div>
									</a></li>

								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-news','page-announcement'))) style="color: #4b575c;" @else style="color: white;" @endif>
										<div>Galeri</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('page-album') }}" @if(Request::segment(1)=='page-album' ) style="color: #F5C400;" @endif>
												<div>Foto</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-video') }}" @if(Request::segment(1)=='page-video' ) style="color: #F5C400;" @endif>
												<div>Video</div>
											</a></li>
									</ul>
								</li>
							</ul>

						</nav><!-- #primary-menu end -->


					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		@yield('content')
		<!-- #content end -->

		<!-- Footer
		============================================= -->
		{{--<footer id="footer" class="dark">
			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap">

					<div class="row" data-animate="fadeInUp" data-delay="100">
						<div class="col-lg-12 ">
							<div class="widget clearfix">

								<div class="row ">
									<div class="col-6 col-sm-6">
										<address>
											<strong>Alamat:</strong><br>{{ $setting->address }}<br><br>
											<strong>Telepon / Whatsapp: </strong><br>{{ $setting->phone }}<br><br>
											<strong>Email: </strong><br>{{ $setting->email }}
										</address>
									</div>
									<div class="col-6 col-sm-6">
										<div style="text-decoration:none; overflow:hidden;max-width:100%;width:600px;height:300px;">
											<div id="g-mapdisplay" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Dinas+Perindagkop+Kendari,+Bonggoeya,+Kota+Kendari,+Sulawesi+Tenggara,+Indonesia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="the-googlemap-enabler" href="https://www.bootstrapskins.com/themes" id="grab-map-data">premium bootstrap themes</a>
											<style>
												#g-mapdisplay img {
													max-width: none !important;
													background: none !important;
													font-size: inherit;
													font-weight: inherit;
												}
											</style>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>

				</div><!-- .footer-widgets-wrap end -->
			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">
				<div class="container">

					<div class="row justify-content-between col-mb-30">
						<div class="col-12 col-md-auto text-center text-md-start">
							Copyrights &copy; 2023 All Rights Reserved by Anaqia Project.<br>
							<!-- <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div> -->
						</div>
					</div>

				</div>
			</div><!-- #copyrights end -->
		</footer><!-- #footer end -->--}}

		
    <!-- Footer -->
    <footer class="border-top mt-5 py-5" style="background: linear-gradient(135deg, #005A96 0%, #2a8bc9 50%, #1ea5fd 100%);">
        <div class="container">
            <div class="row g-6 mb-4">
                <div class="col-lg-6">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <img src="{{ asset('storage/upload/setting/'.$setting->small_icon) }}" style="position: relative; opacity: 0.85; left: -10px; height: 80px; margin-bottom: 20px;width:70px" alt="Footer Logo">

                    </a>
                    <p class=" text-white-custom">Pemerintah Kabupaten Bombana<br>Website Resmi Dinas Perhubungan Kabupaten Bombana</p>
                    
					<div class="bottommargin-sm clearfix">
						<a href="{{ $setting->facebook }}" target="_blank" class="social-icon si-colored si-small si-rounded si-facebook" title="Facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>

						<a href="{{ $setting->twitter }}" target="_blank" class="social-icon si-colored si-small si-rounded si-twitter" title="Twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>

						<a href="{{ $setting->instagram }}" target="_blank" class="social-icon si-colored si-small si-rounded si-instagram" title="Instagram">
							<i class="icon-instagram"></i>
							<i class="icon-instagram"></i>
						</a>

						<a href="{{ $setting->youtube }}" target="_blank" class="social-icon si-colored si-small si-rounded si-youtube" title="Youtube">
							<i class="icon-youtube"></i>
							<i class="icon-youtube"></i>
						</a>

					</div>

                </div>
                <div class="col-6 col-lg-3">
                    <h6 class="fw-bold mb-3 text-white-custom">Hubungi Kami</h6>
					<p class="text-white-custom">{{ $setting->address }}<br>
						<i class="icon-phone"></i>&nbsp;&nbsp;&nbsp;{{ $setting->phone }}<br>
						<i class="icon-email"></i>&nbsp;&nbsp;&nbsp;{{ $setting->email }}
					</p>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="fw-bold mb-3 text-white-custom">Statistik Pengunjung</h6>
					<div id="histats_counter"></div>
                </div>
            </div>
            <hr class="my-4">
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center  text-white-custom small gap-2">
                <p class="m-0">&copy; 2026 All Rights Reserved by Kominfo Kabupaten Bombana.</p>
            </div>
        </div>
    </footer>


	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<script src="{{ asset('frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('frontend/bootstrap.js') }}"></script>
	<script src="{{ asset('frontend/js/plugins.min.js') }}"></script>

	<!-- Bootstrap Select Plugin -->
	<script src="{{ asset('frontend/js/components/bs-select.js') }}"></script>

	<!-- Bootstrap Switch Plugin -->
	<script src="{{ asset('frontend/js/components/bs-switches.js') }}"></script>

	<!-- Range Slider Plugin -->
	<script src="{{ asset('frontend/js/components/rangeslider.min.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('frontend/js/functions.js') }}"></script>

	<script>
		$(document).ready(function () {
			$('#exampleModal').modal('show');
		});
		jQuery(document).ready(function() {

			$(".price-range-slider").ionRangeSlider({
				type: "double",
				prefix: "$",
				min: 200,
				max: 10000,
				max_postfix: "+"
			});

			$(".area-range-slider").ionRangeSlider({
				type: "double",
				min: 50,
				max: 20000,
				from: 50,
				to: 20000,
				postfix: " sqm.",
				max_postfix: "+"
			});

			jQuery(".bt-switch").bootstrapSwitch();

		});

	</script>

	<div id="fb-root"></div>

	<script async defer crossorigin="anonymous"
			src="https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v23.0">
	</script>
</body>

<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,5056289,4,408,270,55,00011111']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('//s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?5056289&101" alt="" border="0"></a></noscript>
<!-- Histats.com  END  -->

</html>