<!DOCTYPE html>
<html dir="ltr" lang="en-US">
@php
	$regulation_category = SiteHelpers::regulation_category();
	$setting = SiteHelpers::setting();
	$sector = SiteHelpers::sector();
@endphp
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta property="og:title" content="{{ $announcement->title }}">
	<meta name="description" content="{!! Str::limit(strip_tags($announcement->text), 100, ' ...') !!}">
	<meta property="og:image" content="{{ asset('upload/announcement/'.$announcement->cover) }}" />
	<meta property="og:image:secure_url" content="{{ asset('upload/announcement/'.$announcement->cover) }}" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta property="og:image:width" content="400" />
	<meta property="og:image:height" content="300" />
	<meta property="og:image:alt" content="A shiny red apple with a bite taken out" />

	<!-- Stylesheets
	============================================= -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,900&display=swap" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/css/bootstrap.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/style.cs') }}s" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/css/swiper.css') }}" type="text/css" />

	<!-- Construction Demo Specific Stylesheet -->
	<link rel="stylesheet" href="{{ asset('web/demos/construction/construction.css') }}" type="text/css" />
	<!-- / -->

	<link rel="stylesheet" href="{{ asset('web/css/dark.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/css/font-icons.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/css/animate.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/css/magnific-popup.css') }}" type="text/css" />

	<!-- <link rel="stylesheet" href="{{ asset('web/demos/construction/css/fonts.css') }}" type="text/css" /> -->

	<link rel="stylesheet" href="{{ asset('web/css/custom.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/demos/news/news.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/css/main.css') }}" type="text/css" />
	
	<!-- Date & Time Picker CSS -->
	<link rel="stylesheet" href="{{ asset('web/css/components/datepicker.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/css/components/timepicker.css') }}" type="text/css" />
	<link rel="stylesheet" href="{{ asset('web/css/components/daterangepicker.css') }}" type="text/css" />

	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="{{ asset('web/css/colors.php?color=F57F17') }}" type="text/css" />
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
	 <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

	<!-- Document Title
	============================================= -->
	<title>{{ $setting->application_name }}</title>
	<link rel="icon" type="image/x-icon" href="{{ asset('upload/setting/'.$setting->small_icon) }}"/>
	<style>
	@media (max-width: 768px) {
		.my-div {
		margin-bottom: 0px !important; /* override inline style */
		}
	}
	</style>
</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Top Bar
		============================================= -->
		<div id="top-bar">
			<div class="container clearfix">

				<div class="row justify-content-between">

					<div class="col-12 col-md-auto">
						<ul id="top-social">
							<li><a href="#" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
							<li><a href="#" class="si-instagram"><span class="ts-icon"><i class="icon-instagram2"></i></span><span class="ts-text">Instagram</span></a></li>
						</ul>
					</div>

					<div class="col-12 col-md-auto">
						<div class="top-links" style="padding-top: 5px;">
							<span id="jam" style="font-size: 24px;font-weight: bold;color: #717070;"></span>
						</div>
					</div>

				</div>

			</div>
		</div><!-- #top-bar end -->

		<!-- Header
		============================================= -->
		<header id="header" class="header-size-sm my-div" data-sticky-shrink="false" style="margin-bottom: 58px;">
			<div class="container">
				<div class="header-row">

					<!-- Logo
					============================================= -->
					<div id="logo" class="ms-auto ms-lg-0 me-lg-auto">
						<a href="index.html" class="standard-logo"><img src="{{ asset('upload/setting/'.$setting->large_icon) }}" alt="Canvas Logo"></a>
						<a href="index.html" class="retina-logo"><img src="{{ asset('upload/setting/'.$setting->large_icon) }}" alt="Canvas Logo"></a>
					</div><!-- #logo end -->

					<div class="header-misc d-none d-lg-flex">

						<ul class="header-extras">
							<li>
								<i class="i-plain icon-call m-0"></i>
								<div class="he-text">
									Telepon
									<span>{{ $setting->phone }}</span>
								</div>
							</li>
							<li>
								<i class="i-plain icon-line2-envelope m-0"></i>
								<div class="he-text">
									Email
									<span>{{ $setting->email }}</span>
								</div>
							</li>
						</ul>

					</div>

				</div>
			</div>

			<div id="header-wrap">
				<div class="container">
					<div class="header-row justify-content-between flex-row-reverse flex-lg-row justify-content-lg-center">

						<div id="primary-menu-trigger">
							<svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
						</div>

						<!-- Primary Navigation
						============================================= -->
						<nav class="primary-menu with-arrows">

							<ul class="menu-container">
								<li class="menu-item current"><a class="menu-link" href="{{ url('/') }}" @if(Request::segment(1)==NULL) style="color: #4b575c;" @else style="color: white;" @endif><div>BERANDA</div></a></li>
								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-opening-speech','page-about','page-vision-mission','page-structure'))) style="color: #4b575c;" @else style="color: white;" @endif><div>PROFIL</div></a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('page-about') }}"  @if(Request::segment(1)=='page-about') style="color: #F57F17;" @endif><div>TENTANG KAMI</div></a></li>
										{{--<li class="menu-item"><a class="menu-link" href="{{ url('page-vision-mission') }}"  @if(Request::segment(1)=='page-vision-mission') style="color: #F57F17;" @endif><div>VISI & MISI</div></a></li>--}}
										<li class="menu-item"><a class="menu-link" href="{{ url('page-main-tasks') }}"  @if(Request::segment(1)=='page-main-tasks') style="color: #F57F17;" @endif><div>TUGAS POKOK & FUNGSI</div></a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-structure') }}"  @if(Request::segment(1)=='page-structure') style="color: #F57F17;" @endif><div>STRUKTUR ORGANISASI</div></a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="#" 
								@if(in_array(Request::segment(1), array('page-sector-profil','page-sector-album','page-price-comodity','page-tera'
								,'page-cooperative','page-rat','page-snik','page-recapitulation-cooperative','page-product-umkm','page-service-plut'))) style="color: #4b575c;" @else style="color: white;" @endif><div>BIDANG</div></a>
									<ul class="sub-menu-container">
										@foreach($sector as $v)
											<li class="menu-item">
												<a class="menu-link" href="#"><div>{{ $v->name }}</div></a>
												<ul class="sub-menu-container">
													<li class="menu-item">
														<a class="menu-link" href="{{ url('page-sector-profil/'.$v->id) }}"><div>Profil</div></a>
													</li>
													<li class="menu-item">
														<a class="menu-link" href="{{ url('page-sector-album/'.$v->id) }}"><div>Galeri Foto</div></a>
													</li>
													@if($v->id == 2)
														<li class="menu-item">
															<a class="menu-link" href="{{ url('page-price-comodity') }}"><div>Harga Barang</div></a>
														</li>
													@elseif($v->id == 3)
														<li class="menu-item">
															<a class="menu-link" href="{{ url('page-tera') }}"><div>Permohonan Tera Ulang</div></a>
														</li>
													@elseif($v->id == 4)
														<li class="menu-item">
																<a class="menu-link" href="{{ url('page-cooperative') }}"><div>Data Koperasi</div></a>
														</li>	
														<li class="menu-item">
															<a class="menu-link" href="{{ url('page-rat') }}"><div>Data RAT</div></a>
														</li>		
														<li class="menu-item">
															<a class="menu-link" href="{{ url('page-snik') }}"><div>Data SNIK</div></a>
														</li>		
														<li class="menu-item">
															<a class="menu-link" href="{{ url('page-recapitulation-cooperative') }}"><div>Rekapitulasi Koperasi</div></a>
														</li>
													@elseif($v->id == 6)		
														<li class="menu-item">
															<a class="menu-link" href="{{ url('page-product-umkm') }}"><div>Produk UMKM</div></a>
														</li>
														<li class="menu-item">
															<a class="menu-link" href="{{ url('page-service-plut') }}"><div>Pelayanan UPTD PLUT</div></a>
														</li>
													@endif
												</ul>
											</li>
										@endforeach
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-news','page-announcement'))) style="color: #4b575c;" @else style="color: white;" @endif><div>INFORMASI</div></a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('page-news') }}"  @if(Request::segment(1)=='page-news') style="color: #F57F17;" @endif><div>BERITA</div></a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-announcement') }}"  @if(Request::segment(1)=='pageannouncement') style="color: #F57F17;" @endif><div>PENGUMUMAN</div></a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-umkm-registration','page-training-registration','page-cooperative-registratio','page-tera-registration'))) style="color: #4b575c;" @else style="color: white;" @endif><div>PENDAFTARAN</div></a>
									<ul class="sub-menu-container">
										<li class="menu-item"><a class="menu-link" href="{{ url('page-umkm-registration') }}"  @if(Request::segment(1)=='page-umkm-registration') style="color: #F57F17;" @endif><div>PENDAFTARAN UMKM</div></a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-training-registration') }}"  @if(Request::segment(1)=='page-training-registration') style="color: #F57F17;" @endif><div>PENDAFTARAN PELATIHAN UMKM/KOPERASI</div></a></li>
										<li class="menu-item"><a class="menu-link" href="{{ url('page-tera-registration') }}"  @if(Request::segment(1)=='page-tera-registration') style="color: #F57F17;" @endif><div>PENDAFTARAN TERA ULANG</div></a></li>
									</ul>
								</li>
								<li class="menu-item"><a class="menu-link" href="{{ url('page-link') }}" @if(Request::segment(1)=="page-link") style="color: #4b575c;" @else style="color: white;" @endif><div>LINK TERKAIT</div></a></li>
								<li class="menu-item"><a class="menu-link" href="{{ url('page-umkm') }}" @if(Request::segment(1)=="page-umkm") style="color: #4b575c;" @else style="color: white;" @endif><div>UMKM</div></a></li>
								<li class="menu-item"><a class="menu-link" href="#" @if(in_array(Request::segment(1), array('page-regulation'))) style="color: #4b575c;" @else style="color: white;" @endif><div>REGULASI</div></a>
									<ul class="sub-menu-container">
										@foreach($regulation_category as $v)
                                        <li class="menu-item">
                                            <a  class="menu-link" href="{{ url('/page-regulation/'.$v->id) }}">
                                                <div>{{ $v->name }}</span></div>
                                            </a>
                                        </li>
                                        @endforeach
									</ul>
								</li><li class="menu-item"><a class="menu-link" href="{{ url('page-certificate') }}" @if(Request::segment(1)=="page-certificate") style="color: #4b575c;" @else style="color: white;" @endif><div>SERTIFIKAT KEGIATAN</div></a></li>
								<li class="menu-item"><a class="menu-link" href="{{ url('page-gallery') }}" @if(Request::segment(1)=="page-gallery") style="color: #4b575c;" @else style="color: white;" @endif><div>GALERI</div></a></li>
								<li class="menu-item"><a class="menu-link" href="{{ url('page-contact') }}" @if(Request::segment(1)=="page-contact") style="color: #4b575c;" @else style="color: white;" @endif><div>KONTAK</div></a></li>
							</ul>

						</nav><!-- #primary-menu end -->


					</div>
				</div>
			</div>
			<div class="header-wrap-clone"></div>
		</header><!-- #header end -->

		<!-- Content
		============================================= -->
		@yield('konten')
		<!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
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
										<div style="text-decoration:none; overflow:hidden;max-width:100%;width:600px;height:300px;"><div id="g-mapdisplay" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Dinas+Perindagkop+Kendari,+Bonggoeya,+Kota+Kendari,+Sulawesi+Tenggara,+Indonesia&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="the-googlemap-enabler" href="https://www.bootstrapskins.com/themes" id="grab-map-data">premium bootstrap themes</a><style>#g-mapdisplay img{max-width:none!important;background:none!important;font-size: inherit;font-weight:inherit;}</style></div>
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
		</footer><!-- #footer end -->

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
	<script src="{{ asset('web/js/jquery.js') }}"></script>
	@endif
	<script src="{{ asset('web/js/plugins.min.js') }}"></script>

	<!-- Date & Time Picker JS -->
	<script src="{{ asset('web/js/components/moment.js') }}"></script>
	<script src="{{ asset('web/js/components/timepicker.js') }}"></script>
	<script src="{{ asset('web/js/components/datepicker.js') }}"></script>

	<!-- Include Date Range Picker -->
	<script src="j{{ asset('web/s/components/daterangepicker.js') }}"></script>

	<!-- Footer Scripts
	============================================= -->
	<script src="{{ asset('web/js/functions.js') }}"></script>

</body>
<script type="text/javascript">
	window.onload = function() { jam(); }
	
	function jam() {
		var e = document.getElementById('jam'),
		d = new Date(), h, m, s;
		h = d.getHours();
		m = set(d.getMinutes());
		s = set(d.getSeconds());
	
		e.innerHTML = h +':'+ m +':'+ s;
	
		setTimeout('jam()', 1000);
	}
	
	function set(e) {
		e = e < 10 ? '0'+ e : e;
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