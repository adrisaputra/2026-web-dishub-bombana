<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Sen:wght@400..800&display=swap" rel="stylesheet">

	<!-- Bootstrap 5 CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<!-- Bootstrap Icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="{{ asset('frontend/style.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/swiper.css') }}" type="text/css" />

	<!-- Construction Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('frontend/demos/construction/construction.css') }}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{ asset('frontend/css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="{{ asset('frontend/css/colors.php?color=F5C400') }}" type="text/css" />

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
						<span>Minggu, 20 September 2026</span>
					</div>
					<div class="col-md-6 col-12">
						<div class="d-flex align-items-center gap-2">
							<span class="badge bg-danger text-uppercase px-2 py-1">Terkini</span>
							<div class="ticker-wrapper w-100 text-truncate">
								<div class="ticker-text fw-medium text-secondary">
									🚀 Peluncuran Satelit Nusantara III Berhasil Dilakukan &nbsp;&bull;&nbsp; 📈 Pertumbuhan Ekonomi Kuartal Ini Naik 5.2% &nbsp;&bull;&nbsp; ⚽ Timnas Indonesia Masuk Babak Kualifikasi Utama
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3 d-none d-md-flex justify-content-end align-items-center gap-3 text-secondary">
						<a href="#" class="text-reset text-decoration-none hover-danger"><i class="bi bi-facebook"></i></a>
						<a href="#" class="text-reset text-decoration-none hover-danger"><i class="bi bi-twitter-x"></i></a>
						<a href="#" class="text-reset text-decoration-none hover-danger"><i class="bi bi-instagram"></i></a>
						<a href="#" class="text-reset text-decoration-none hover-danger"><i class="bi bi-youtube"></i></a>
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
								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-news','page-announcement'))) style="color: #F5C400;" @else style="color: white;" @endif>
										<div>Informasi Publik</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('page-news') }}" @if(Request::segment(1)=='page-news' ) style="color: #F5C400;" @endif>
												<div>Program dan Kegiatan</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-news') }}" @if(Request::segment(1)=='page-news' ) style="color: #F5C400;" @endif>
												<div>Pelayanan Publik</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-announcement') }}" @if(Request::segment(1)=='pageannouncement' ) style="color: #F5C400;" @endif>
												<div>Transportasi dan Fasilitas Perhubungan</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-announcement') }}" @if(Request::segment(1)=='pageannouncement' ) style="color: #F5C400;" @endif>
												<div>Perizinan dan Persyaratan Pelayanan</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-announcement') }}" @if(Request::segment(1)=='pageannouncement' ) style="color: #F5C400;" @endif>
												<div>Lainnya</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item current"><a class="menu-link" href="{{ url('/') }}" @if(Request::segment(1)=='page-news' ) style="color: #F5C400;" @else style="color: white;" @endif>
										<div>Berita</div>
									</a></li>

								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-news','page-announcement'))) style="color: #4b575c;" @else style="color: white;" @endif>
										<div>Galeri</div>
									</a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('page-news') }}" @if(Request::segment(1)=='page-news' ) style="color: #F5C400;" @endif>
												<div>Foto</div>
											</a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-news') }}" @if(Request::segment(1)=='page-news' ) style="color: #F5C400;" @endif>
												<div>Video</div>
											</a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="{{ url('page-contact') }}" @if(Request::segment(1)=="page-contact" ) style="color: #4b575c;" @else style="color: white;" @endif>
										<div>Kontak</div>
									</a></li>
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
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <a class="navbar-brand d-flex align-items-center gap-2 mb-3" href="#">
                        <i class="bi bi-newspaper fs-2 text-danger"></i>
                        <span class="brand-logo">Nusantara<span class="text-white-custom fw-light">News</span></span>
                    </a>
                    <p class=" text-white-custom small mb-3">Portal berita terpercaya menyajikan informasi terkini dari seluruh pelosok Nusantara secara cepat, akurat, dan berimbang.</p>
                    <div class="d-flex gap-3 fs-5 text-white-custom">
                        <a href="#" class="text-white-custom"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white-custom"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-white-custom"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-white-custom"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="fw-bold mb-3 text-white-custom">Kategori</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 small text-white-custom">
                        <li><a href="#" class="text-decoration-none text-reset">Teknologi</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Ekonomi</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Olahraga</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Politik</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Hiburan</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="fw-bold mb-3 text-white-custom">Perusahaan</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 small  text-white-custom">
                        <li><a href="#" class="text-decoration-none text-reset">Tentang Kami</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Redaksi</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Karir</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Pedoman Siber</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3 text-white-custom">Aplikasi Mobile</h6>
                    <p class=" text-white-custom small">Unduh aplikasi kami untuk pengalaman membaca berita yang lebih praktis di mana saja.</p>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-dark btn-sm rounded-3 d-flex align-items-center gap-2">
                            <i class="bi bi-apple fs-5"></i>
                            <div class="text-start" style="line-height: 1.1;">
                                <span class="d-block" style="font-size: 0.65rem;">Available on</span>
                                <span class="fw-bold">App Store</span>
                            </div>
                        </button>
                        <button class="btn btn-outline-dark btn-sm rounded-3 d-flex align-items-center gap-2">
                            <i class="bi bi-google-play fs-5"></i>
                            <div class="text-start" style="line-height: 1.1;">
                                <span class="d-block" style="font-size: 0.65rem;">Get it on</span>
                                <span class="fw-bold">Google Play</span>
                            </div>
                        </button>
                    </div>
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

	<!-- JavaScripts
	============================================= -->
	@if(Request::segment(1)!="page-comodity"
	&& Request::segment(1)!="page-price-comodity"
	&& Request::segment(1)!="page-tera"
	&& Request::segment(1)!="page-cooperative"
	&& Request::segment(1)!="page-rat"
	&& Request::segment(1)!="page-snik"
	&& Request::segment(1)!="page-recapitulation-cooperative"
	&& Request::segment(1)!="page-product-umkm"
	&& Request::segment(1)!="page-service-plut"
	&& Request::segment(1)!="page-regulation"
	&& Request::segment(1)!="page-certificate"
	)
	<script src="{{ asset('frontend/js/jquery.js') }}"></script>
	@endif
	<script src="{{ asset('frontend/js/plugins.min.js') }}"></script>

	<!-- Date & Time Picker JS -->
	<script src="{{ asset('frontend/js/components/moment.js') }}"></script>
	<script src="{{ asset('frontend/js/components/timepicker.js') }}"></script>
	<script src="{{ asset('frontend/js/components/datepicker.js') }}"></script>

	<!-- Include Date Range Picker -->
	<script src="j{{ asset('frontend/s/components/daterangepicker.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('frontend/js/functions.js') }}"></script>

</body>
<script type="text/javascript">
	window.onload = function() {
		jam();
	}

	function jam() {
		var e = document.getElementById('jam'),
			d = new Date(),
			h, m, s;
		h = d.getHours();
		m = set(d.getMinutes());
		s = set(d.getSeconds());

		e.innerHTML = h + ':' + m + ':' + s;

		setTimeout('jam()', 1000);
	}

	function set(e) {
		e = e < 10 ? '0' + e : e;
		return e;
	}
</script>

<script>
	$(function() {
		$('.component-datepicker.default').datepicker({
			autoclose: true,
			startDate: "today",
		});

		$('.component-datepicker.today').datepicker({
			autoclose: true,
			startDate: "today",
			todayHighlight: true
		});

		$('.component-datepicker.past-enabled').datepicker({
			autoclose: true,
		});

		$('.component-datepicker.format').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
		});

		$('.component-datepicker.autoclose').datepicker();

		$('.component-datepicker.disabled-week').datepicker({
			autoclose: true,
			daysOfWeekDisabled: "0"
		});

		$('.component-datepicker.highlighted-week').datepicker({
			autoclose: true,
			daysOfWeekHighlighted: "0"
		});

		$('.component-datepicker.mnth').datepicker({
			autoclose: true,
			minViewMode: 1,
			format: "mm/yy"
		});

		$('.component-datepicker.multidate').datepicker({
			multidate: true,
			multidateSeparator: " , "
		});

		$('.component-datepicker.input-daterange').datepicker({
			autoclose: true
		});

		$('.component-datepicker.inline-calendar').datepicker();

		$('.datetimepicker').datetimepicker({
			showClose: true
		});

		$('.datetimepicker1').datetimepicker({
			format: 'LT',
			showClose: true
		});

		$('.datetimepicker2').datetimepicker({
			inline: true,
			sideBySide: true
		});

		$('.datetimepicker3,.datetimepicker4').datetimepicker();

		// .daterange1
		$(".daterange1").daterangepicker({
			"buttonClasses": "button button-rounded button-mini m-0",
			"applyClass": "button-color",
			"cancelClass": "button-light"
		});

		// .daterange2
		$(".daterange2").daterangepicker({
			"opens": "center",
			timePicker: true,
			timePickerIncrement: 30,
			locale: {
				format: 'MM/DD/YYYY h:mm A'
			},
			"buttonClasses": "button button-rounded button-mini m-0",
			"applyClass": "button-color",
			"cancelClass": "button-light"
		});

		// .daterange3
		$(".daterange3").daterangepicker({
				singleDatePicker: true,
				showDropdowns: true
			},
			function(start, end, label) {
				var years = moment().diff(start, 'years');
				alert("You are " + years + " years old.");
			});

		// reportrange
		function cb(start, end) {
			$(".reportrange span").html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
		}
		cb(moment().subtract(29, 'days'), moment());

		$(".reportrange").daterangepicker({
			"buttonClasses": "button button-rounded button-mini m-0",
			"applyClass": "button-color",
			"cancelClass": "button-light",
			ranges: {
				'Today': [moment(), moment()],
				'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days': [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month': [moment().startOf('month'), moment().endOf('month')],
				'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			}
		}, cb);

		// .daterange4
		$(".daterange4").daterangepicker({
			autoUpdateInput: false,
			locale: {
				cancelLabel: 'Clear'
			},
			"buttonClasses": "button button-rounded button-mini m-0",
			"applyClass": "button-color",
			"cancelClass": "button-light"
		});

		$(".daterange4").on('apply.daterangepicker', function(ev, picker) {
			$(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
		});

		$(".daterange4").on('cancel.daterangepicker', function(ev, picker) {
			$(this).val('');
		});

	});
</script>

</html>