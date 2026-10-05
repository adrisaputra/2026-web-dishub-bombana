@extends('web.layout')
@section('content')
@php
$setting = \App\Helpers\Helpers::setting();
@endphp
<style>
    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        text-align: center;
    }

    .calendar-day-name {
        font-size: 11px;
        font-weight: 600;
        color: #6c757d;
        padding-bottom: 5px;
    }

    .calendar-date {
        font-size: 13px;
        padding: 7px 2px;
        border-radius: 8px;
    }

    .calendar-date.today {
        background: #2563eb;
        color: white;
        font-weight: bold;
    }
</style>

<!-- Modal -->
    @if($popup->count() > 0)
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="--bs-modal-margin: 8.75rem;--bs-modal-width: 664px;display: block;" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">Infomasi</h4>
            
          </div>
          <div class="modal-body">
            <div id="myCarousels" class="carousel slide" data-ride="carousel" style="width: 100%;height:50%;">

              <ol class="carousel-indicators">
                @foreach($popup as $i => $v)
                <li data-target="#myCarousels" data-slide-to="{{ $i }}" class="@if($i==0) active @endif" style=""></li>
                @endforeach
              </ol>

              <div class="carousel-inner">
                @foreach($popup as $i => $v)
                <div class="item @if($i==0) active @endif">
                <img src="{{ asset('storage/upload/popup/'.$v->image) }}" alt="Los Angeles" style="width: 100%;height: 50%;background-position: top;">
                </div>
                @endforeach
              </div>

              <a class="left carousel-control" href="#myCarousels" data-slide="prev">
              </a>
              <a class="right carousel-control" href="#myCarousels" data-slide="next">
              </a>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
    @endif
	
<section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-100 vh-100" data-autoplay="7000" data-speed="500" data-loop="true">

	<div class="swiper-container swiper-parent">
		<div class="swiper-wrapper">
			@foreach($slider as $i => $v)
			<div class="swiper-slide">
				<div class="swiper-slide-bg" style="background-image: url({{ asset('storage/upload/slider/'.$v->image) }}); background-position: center;"></div>
			</div>
			@endforeach
		</div>
		<div class="slider-arrow-left"><i class="icon-angle-left"></i></div>
		<div class="slider-arrow-right"><i class="icon-angle-right"></i></div>
	</div>

</section>
<!-- Content
============================================= -->

<section id="content">

	<!-- Main Container -->
	<main class="container py-4">

		<!-- Hero Featured Section -->
		<section class="mb-5">
			<div class="row g-4">
				<!-- Main Featured Article -->
				<div class="col-lg-12">
					<div class="hero-card sambutan-card">

						<!-- Foto Kepala Dinas -->
						<div class="sambutan-image">
							<img src="{{ asset('storage/upload/profile/' . $profile->image) }}"
								alt="Kepala Dinas Perhubungan">
						</div>

						<!-- Kata Sambutan -->
						<div class="sambutan-content">
							<span class="badge bg-danger mb-3">KATA SAMBUTAN</span>

							{!! $profile->text !!}
						</div>

					</div>
				</div>

			</div>
		</section>
		<!-- Berita Terbaru -->
		<section class="mb-5">

			<div class="d-flex align-items-center justify-content-between mb-3">
				<h4 class="fw-bold m-0 d-flex align-items-center gap-2">
					<span class="bg-danger rounded-pill d-inline-block"
						style="width: 8px; height: 24px;"></span>
					Berita Terbaru
				</h4>

				<a href="/berita"
					class="text-danger fw-semibold text-decoration-none">
					Lihat Semua
					<i class="bi bi-arrow-right ms-1"></i>
				</a>
			</div>

			<div class="row g-4">

				@foreach($news as $v)
				<!-- Berita 1 -->
				<div class="col-md-4">
					<div class="card news-card border-0 shadow-sm h-100">

						<div class="news-card-img-wrapper">
							<img src="{{ Storage::disk('ppid_storage')->url('upload/news/'.$v->cover) }}"
								class="img-fluid w-100"
								alt="Berita">
						</div>

						<div class="card-body p-4">
							<h5 class="fw-bold line-clamp-2 mb-2">
								{{ $v->title }}
							</h5>

							<p class="text-muted small line-clamp-2 mb-3">
								{!! Str::limit(strip_tags($v->text), 200, ' ...') !!}
							</p>

							<div class="d-flex justify-content-between text-muted small">
								<span>
									<i class="bi bi-calendar3 me-1"></i>
									{{ \Carbon\Carbon::parse($v->created_at)->format('d M Y') }}
								</span>

								<span>
									<i class="bi bi-clock me-1"></i>
									{{ \Carbon\Carbon::parse($v->created_at)->diffForHumans() }}
								</span>
							</div>
						</div>

					</div>
				</div>
				@endforeach
			</div>

		</section>

		<!-- Category Filter Pills Bar -->
		<section class="mb-4">
			<div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
				<h4 class="fw-bold m-0 d-flex align-items-center gap-2">
					<span class="bg-danger rounded-pill d-inline-block"
						style="width: 8px; height: 24px;"></span>
					Eksplor Informasi
				</h4>

				<!-- Pills Bar -->
				<div class="d-flex gap-2 overflow-x-auto pb-2 w-100">
					<a href="#" class="category-pill active" data-category="all" data-url="/informasi">Semua</a>
					<a href="#" class="category-pill" data-category="Program dan Kegiatan" data-url="/informasi?category=program-dan-kegiatan">Program dan Kegiatan</a>
					<a href="#" class="category-pill" data-category="Pelayanan" data-url="/informasi?category=pelayanan">Pelayanan</a>
					<a href="#" class="category-pill" data-category="Transportasi" data-url="/informasi?category=transportasi">Transportasi</a>
					<a href="#" class="category-pill" data-category="Perizinan dan Pelayanan" data-url="/informasi?category=perizinan-dan-pelayanan">Perizinan dan Pelayanan</a>
					<a href="#" class="category-pill" data-category="Lainnya" data-url="/informasi?category=lainnya">Lainnya</a>
				</div>
			</div>
		</section>

		<!-- Main Content Grid -->
		<div class="row g-4">
			<!-- News Cards Column -->
			<div class="col-lg-8">
				<div class="row g-4">

					@foreach($information as $i => $v)

					<!-- Article Card 1 -->
					<div class="col-md-6 news-item"
						@if($v->category == 1)
						data-category="Program dan Kegiatan"
						@elseif($v->category == 2)
						data-category="Pelayanan"
						@elseif($v->category == 3)
						data-category="Transportasi"
						@elseif($v->category == 4)
						data-category="Perizinan dan Pelayanan"
						@elseif($v->category == 5)
						data-category="Lainnya"
						@endif
						>
						<div class="card news-card">
							<div class="news-card-img-wrapper">
								<button class="btn-bookmark" title="Simpan Artikel">
									<i class="bi bi-bookmark"></i>
								</button>
								<img src="{{ asset('storage/upload/information/' . $v->cover) }}" alt="Berita AI">
							</div>
							<div class="card-body p-4 d-flex flex-column justify-content-between">
								<div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										@if($v->category == 1)
										<span class="badge bg-danger-subtle text-danger badge-category">Program dan Kegiatan</span>
										@elseif($v->category == 2)
										<span class="badge bg-success-subtle text-success badge-category">Pelayanan</span>
										@elseif($v->category == 3)
										<span class="badge bg-info-subtle text-info badge-category">Transportasi</span>
										@elseif($v->category == 4)
										<span class="badge bg-warning-subtle text-warning badge-category">Perizinan dan Pelayanan</span>
										@elseif($v->category == 5)
										<span class="badge bg-secondary-subtle text-secondary badge-category">Lainnya</span>
										@endif
										<small class="text-muted"><i class="bi bi-clock me-1"></i>{{ $v->created_at->diffForHumans() }}</small>
									</div>
									<h5 class="fw-bold card-title line-clamp-2 mb-2">
										{{ $v->title }}
									</h5>
									<p class="card-text text-muted small line-clamp-3 mb-3">
										{!! Str::limit(strip_tags($v->text), 200, ' ...') !!}
									</p>
								</div>
								<div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
									<span><i class="bi bi-person me-1"></i>{{ $v->user->name }}</span>
									<span>{{ $v->created_at->format('d M Y') }}</span>
								</div>
							</div>
						</div>
					</div>

					@endforeach

				</div>

				<!-- Pagination -->
				<div class="text-center mt-5">
					<a href="{{ url('page-information') }}"
						id="btn-selengkapnya"
						class="btn btn-danger rounded-pill px-4 py-2 fw-semibold">
						Selengkapnya
						<i class="bi bi-arrow-right ms-2"></i>
					</a>
				</div>
			</div>

			<!-- Sidebar Area -->
			<div class="col-lg-4">
				<div class="d-flex flex-column gap-4">

					<!-- Trending News Widget -->
					{{--<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
						<h5 class="fw-bold mb-3 border-bottom pb-2">
							<i class="bi bi-fire text-danger me-2"></i>Berita Terpopuler
						</h5>
						<div class="d-flex flex-column gap-3">

							<div class="d-flex align-items-start gap-3">
								<span class="trending-number">01</span>
								<div>
									<span class="badge bg-secondary-subtle text-secondary badge-category mb-1">Teknologi</span>
									<h6 class="fw-bold mb-1 line-clamp-2" style="font-size: 0.9rem;">Inovasi AI Terbaru Resmi Diperkenalkan di Jakarta</h6>
									<small class="text-muted"><i class="bi bi-clock me-1"></i>2 jam lalu</small>
								</div>
							</div>

							<div class="d-flex align-items-start gap-3">
								<span class="trending-number">02</span>
								<div>
									<span class="badge bg-secondary-subtle text-secondary badge-category mb-1">Ekonomi</span>
									<h6 class="fw-bold mb-1 line-clamp-2" style="font-size: 0.9rem;">IHSG Hari Ini Menutup Perdagangan dengan Rekor Baru</h6>
									<small class="text-muted"><i class="bi bi-clock me-1"></i>3 jam lalu</small>
								</div>
							</div>

							<div class="d-flex align-items-start gap-3">
								<span class="trending-number">03</span>
								<div>
									<span class="badge bg-secondary-subtle text-secondary badge-category mb-1">Olahraga</span>
									<h6 class="fw-bold mb-1 line-clamp-2" style="font-size: 0.9rem;">Persiapan Timnas Jelang Laga Penentu Internasional</h6>
									<small class="text-muted"><i class="bi bi-clock me-1"></i>4 jam lalu</small>
								</div>
							</div>

							<div class="d-flex align-items-start gap-3">
								<span class="trending-number">04</span>
								<div>
									<span class="badge bg-secondary-subtle text-secondary badge-category mb-1">Teknologi</span>
									<h6 class="fw-bold mb-1 line-clamp-2" style="font-size: 0.9rem;">Pembangkit Listrik Tenaga Surya Terapung Beroperasi</h6>
									<small class="text-muted"><i class="bi bi-clock me-1"></i>6 jam lalu</small>
								</div>
							</div>

						</div>
					</div>--}}

					<!-- Weather Info Widget -->
					<div class="card border-0 p-4 rounded-4 shadow-sm"
						style="background: linear-gradient(135deg, #ffffff, #ffffff);">

						<div class="d-flex justify-content-between align-items-center mb-2">
							<div>
								<h6 class="m-0 fw-bold">Cuaca Hari Ini</h6>
								<small style="opacity: 0.8;color: black;">Bombana, Indonesia</small>
							</div>

							<i id="weather-icon" class="bi bi-cloud-sun fs-1"></i>
						</div>

						<div class="d-flex align-items-baseline gap-2">
							<h1 id="weather-temperature"
								class="display-5 fw-bold m-0">
								--
							</h1>

							<span id="weather-status" class="fs-6">
								Memuat...
							</span>
						</div>

						<small class="mt-2 d-block" style="opacity: 0.8;color: black;">
							Terasa seperti <span id="weather-feels-like">--</span>°C
							· Kelembapan <span id="weather-humidity">--</span>%
						</small>
					</div>

					<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="background: linear-gradient(135deg, #ffffff, #ffffff);">
						<div class="d-flex justify-content-between align-items-center mb-3">
							<div>
								<h6 class="m-0 fw-bold">Kalender</h6>
								<small class="text-muted" id="calendar-month"></small>
							</div>

							<i class="bi bi-calendar3 fs-3 text-primary"></i>
						</div>

						<div id="calendar"></div>
					</div>

					<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="background: linear-gradient(135deg, #ffffff, #ffffff);">
						<h6 class="fw-bold mb-3">
							<i class="bi bi-facebook text-primary"></i>
							Facebook
						</h6>

						<div class="fb-page"
							data-href="https://www.facebook.com/dishub.kabupatenbombana"
							data-tabs="timeline"
							data-width=""
							data-height="400"
							data-small-header="false"
							data-adapt-container-width="true"
							data-hide-cover="false"
							data-show-facepile="true">

							<blockquote cite="https://www.facebook.com/dishub.kabupatenbombana"
										class="fb-xfbml-parse-ignore">
								<a href="https://www.facebook.com/dishub.kabupatenbombana">
									Facebook
								</a>
							</blockquote>

						</div>
					</div>

					<!-- YouTube Video Widget -->
					{{--<div class="card border-0 shadow-sm rounded-4 p-4 bg-white" style="background: linear-gradient(135deg, #ffffff, #ffffff);">

						<h5 class="fw-bold mb-3 border-bottom pb-2">
							<i class="bi bi-youtube text-danger me-2"></i>
							Video Terbaru
						</h5>

						<div class="d-flex flex-column gap-4">

							<!-- Video 1 -->
							<div class="youtube-video">

								<a href="https://www.youtube.com/watch?v=lzP1wAWLpqU"
									target="_blank"
									class="text-decoration-none">

									<div class="youtube-thumbnail position-relative rounded-3 overflow-hidden">
										@php $a = str_replace("watch?v=","embed/","https://www.youtube.com/watch?v=lzP1wAWLpqU"); @endphp
										<iframe width="200px" height="150px" align="center" src="{{ $a }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div>

									<h6 class="fw-bold text-dark mt-2 mb-1 line-clamp-2">
										Judul Video YouTube Pertama
									</h6>

									<small class="text-muted">
										<i class="bi bi-calendar3 me-1"></i>
										20 September 2026
									</small>

								</a>

							</div>


							<!-- Video 2 -->
							<div class="youtube-video">

								<a href="https://www.youtube.com/watch?v=lNYG_3aINfg"
									target="_blank"
									class="text-decoration-none">

									<div class="youtube-thumbnail position-relative rounded-3 overflow-hidden">
										@php $a = str_replace("watch?v=","embed/","https://www.youtube.com/watch?v=lNYG_3aINfg"); @endphp
										<iframe width="200px" height="150px" align="center" src="{{ $a }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
									</div>

									<h6 class="fw-bold text-dark mt-2 mb-1 line-clamp-2">
										Judul Video YouTube Kedua
									</h6>

									<small class="text-muted">
										<i class="bi bi-calendar3 me-1"></i>
										19 September 2026
									</small>

								</a>

							</div>

						</div>

					</div>--}}

				</div>
			</div>
		</div>

	</main>

</section>

{{--
<section id="content">
	<div class="container clearfix">

		<div class="row clearfix">

			<!-- Posts Area
			============================================= -->
			<div class="col-lg-8">

				<!-- Tab Menu
				============================================= -->
				<nav class="navbar navbar-expand-lg navbar-light p-0" data-animate="fadeInUp" data-delay="100">
					<h4 class="mb-0 pe-2 ls1 text-uppercase fw-bold">Berita Terbaru</h4>
				</nav>

				<div class="line line-xs line-dark" data-animate="fadeInUp" data-delay="100"></div>

				<div class="row col-mb-30 mb-0">
					@foreach($news as $i => $v)
					@if($i==0)
					<div class="col-lg-6">
						<!-- Post Article -->
						<div class="posts-md">
							<div class="entry">
								<div class="entry-image" data-animate="backInUp" data-delay="100">
									<a href="{{ url('page-news-detail?q='.$v->slug) }}"><img src="{{ asset('upload/news/'.$v->cover) }}" alt="Image 3" style="height:250px; border-radius: 15px;"></a>
<div class="entry-categories"><a href="demo-news-category.html" class="bg-travel" style="background: 
												@if($v->category == " Kepegawaian")
		#4caf50
		@elseif($v->category == "Kepegawaian")
		#e53935
		@elseif($v->category == "Akademik")
		#e91e63
		@elseif($v->category == "Kemahasiswaan")
		#673ab7
		@elseif($v->category == "Mutu")
		#1e88e5
		@elseif($v->category == "Penelitian")
		#00acc1
		@elseif($v->category == "Pengabmas")
		#ff9800
		@elseif($v->category == "Laboratorium")
		#795548
		@endif
		">{{ $v->category }}</a></div>
</div>
<div class="entry-title nott" data-animate="backInUp" data-delay="200">
	<h3 class="mb-2"><a href="{{ url('page-news-detail?q='.$v->slug) }}" @if(session('dark_layer')) style="color: white;" @endif>{{ $v->title }}</a></h3>
</div>
<div class="entry-meta" data-animate="backInUp" data-delay="300">
	<ul>
		<li><i class="icon-user"></i><a href="#">{{ $v->user->name }}</a></li>
		<li><i class="icon-calendar3"></i><a href="#">{{ date('d M Y', strtotime($v->created_at)) }}</a></li>
		<li><i class="icon-eye"></i><a href="#">{{ $v->count_view }}</a></li>
	</ul>
</div>
<div class="entry-content clearfix" data-animate="backInUp" data-delay="400">
	{!! Str::limit(strip_tags($v->text), 300, ' ...') !!}
	<a href="{{ url('page-news-detail?q='.$v->slug) }}" target="_blank" data-aos="fade-right" data-aos-delay=300>Selengkapnya</a>
</div>
</div>
</div>
</div>
@endif
@endforeach
<div class="col-lg-6">

	<div class="posts-sm row col-mb-30">
		@foreach($news as $i => $v)
		@if($i>0)
		<div class="entry col-12">
			<div class="grid-inner row g-0">
				<div class="col-auto" data-animate="fadeInUp" data-delay="100">
					<div class="entry-image">
						<a href="{{ url('page-news-detail?q='.$v->slug) }}"><img src="{{ asset('upload/news/'.$v->cover) }}" alt="Image" style="order-radius: 15px;"></a>
					</div>
				</div>
				<div class="col ps-3" data-animate="fadeInUp" data-delay="300">
					<div class="entry-title">
						<h4><a href="{{ url('page-news-detail?q='.$v->slug) }}" @if(session('dark_layer')) style="color: white;" @endif>{{ $v->title }}</a></h4>
					</div>
					<div class="entry-meta">
						<ul>
							<li><i class="icon-user"></i><a href="#" style="font-size:12px">{{ $v->user->name }}</a></li>
							<li><i class="icon-calendar3"></i><a href="#" style="font-size:12px">{{ date('d M Y', strtotime($v->created_at)) }}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		@endif
		@endforeach
	</div>

	<div class="col-12 form-group mb-0" data-animate="heartBeat" data-delay="100" style="padding-top:20px">
		<center><a href="{{ url('page-news') }}" class="button button-rounded w-1 nott ls0 m-0" style="padding: 3px 22px;">Lihat Berita Lainnya</a></center>
	</div>

</div>
<nav class="navbar navbar-expand-lg navbar-light p-0" data-animate="fadeInUp" data-delay="100">
	<h4 class="mb-0 pe-2 ls1 text-uppercase fw-bold">Akses Cepat</h4>
</nav>

<div class="line line-xs line-dark" data-animate="fadeInUp" data-delay="100"></div>

<div class="col-lg-12">

	<div class="row grid-container" data-layout="masonry" style="overflow: visible">
		@foreach($link as $i => $v)
		<div class="col-lg-4 col-md-4 col-md-12" data-animate="fadeInUp" data-delay="{{$i+1}}00" style="margin-bottom:20px">
			<div class="flip-card text-center">
				<div class="flip-card-front">
					<div class="flip-card-inner">
						<div class="card border-0 text-center">
							<div class="card-body">
								@if($v->image)
								<img src="{{ asset('storage/upload/link/'.$v->image) }}" width="50%">
								@else
								<img src="{{ asset('upload/menu/icons8-website-100.png') }}" width="50%">
								@endif
								<p style="color:#3B3F5C">{{ $v->name }}</p>
							</div>
						</div>
					</div>
				</div>
				<div class="flip-card-back bg-danger no-after" style="background-color: #d30000 !important;border-color: #d30000;">
					<div class="flip-card-inner">
						<center><a href="{{ $v->link }}" class="button button-rounded w-1 nott ls0 m-0" style="padding: 3px 22px;background-color: #ffffffff;color:#3B3F5C">Kunjungi</a></center>
					</div>
				</div>
			</div>
		</div>
		@endforeach
		<center><a href="{{ url('page-link') }}" class="button button-rounded w-1 nott ls0 m-0" style="padding: 3px 22px;" data-animate="fadeInUp" data-delay="800">Lihat Lainnya</a></center>
	</div>

</div>
</div>
</div>

<!-- Top Sidebar Area
			============================================= -->
<div class="col-lg-4 sticky-sidebar-wrap mt-5 mt-lg-0">
	<div class="sticky-sidebar">
		<!-- Sidebar Widget 1
					============================================= -->
		<div class="widget clearfix">
			<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100">Pengumuman</h4>
			<div class="line line-xs line-market" data-animate="fadeInUp" data-delay="100"></div>

			<div class="posts-sm row col-mb-30">
				@foreach($announcement as $i => $v)
				<div class="entry col-md-12">
					<!-- Post Article -->
					<div class="grid-inner row align-items-center" data-animate="fadeInUp" data-delay="{{ $i+2 }}00">
						<div class="col-auto">
							<div class="entry-image">
								@php $url_cover = url('storage/upload/announcement/'.$v->cover); @endphp
								<a href="demo-news-single.html"><img src="{{ $url_cover }}" alt="Image"></a>
							</div>
						</div>
						<div class="col ps-3">
							<div class="entry-title">
								<h4 class="fw-medium"><a href="demo-news-single.html">{{ $v->title }}</a></h4>
							</div>
							<div class="entry-meta">
								<ul>
									<li><i class="icon-user"></i><a href="#">{{ $v->user->name }}</a></li>
									<li><i class="icon-calendar3"></i><a href="#">{{ date('d M Y', strtotime($v->created_at)) }}</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				@endforeach


				<div class="col-12 form-group mb-0" data-animate="heartBeat" data-delay="100" style="padding-top:20px">
					<center><a href="{{ url('page-announcement') }}" class="button button-rounded w-1 nott ls0 m-0" style="padding: 3px 22px;">Lihat Pengumuman Lainnya</a></center>
				</div>
			</div>

		</div>
		<div class="widget clearfix">
			<h4 class="mb-2 ls1 text-uppercase fw-bold" data-animate="fadeInUp" data-delay="100">Youtube</h4>
			<div class="line line-xs line-food" data-animate="fadeInUp" data-delay="100"></div>
			<div class="row">
				@foreach($youtube as $x)
				@php $a = str_replace("watch?v=","embed/",$x->url); @endphp
				<div class="col-sm-12 col-lg-12" data-animate="fadeInUp" data-delay="300" style="border-radius: 15px;">
					<div class="feature-box media-box">
						<div class="fbox-media">
							<iframe width="200px" height="150px" align="center" src="{{ $a }}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div> <!-- Sidebar End -->

</div>
</div>

</div>

<div class="section parallax dark" style="background-image: url(''); padding: 10px 0;" data-bottom-top="background-position:0px 300px;" data-top-bottom="background-position:0px -300px;">

	<div class="container clearfix">
		<div class="fancy-title title-center title-border topmargin" data-animate="fadeInUp" data-delay="200">
			<h3 style="color:#3B3F5C">Galeri Foto</h3>
		</div>

		<div id="related-portfolio" class="owl-carousel owl-carousel-full portfolio-carousel carousel-widget" data-margin="0" data-pagi="false" data-items-xs="1" data-items-sm="2" data-items-md="3" data-items-lg="4" data-animate="fadeInUp" data-delay="300">

			@foreach($album2 as $i => $v)
			<div class="portfolio-item" style="padding-right: 10px;" data-animate="fadeInUp" data-delay="{{ $i+2 }}00">
				<div class="portfolio-image" style="border-radius: 10px;">
					<a href="{{ url('pages/detail_album/'.$v->id) }}">
						<img src="{{ asset('upload/album/'.$v->cover) }}" style="height:200px">
					</a>
					<div class="bg-overlay" data-lightbox="gallery">
						<div class="bg-overlay-content dark" data-hover-animate="fadeIn">
							<a href="{{ asset('upload/album/'.$v->cover) }}" class="overlay-trigger-icon bg-light text-dark" data-hover-animate="fadeInDownSmall" data-hover-animate-out="fadeOutUpSmall" data-hover-speed="350" data-lightbox="gallery-item"><i class="icon-line-stack-2"></i></a>
							@foreach($v->all_photo as $x)
							<a href="{{ asset('upload/photo/'.$x->image) }}" class="d-none" data-lightbox="gallery-item"></a>
							@endforeach
						</div>
						<div class="bg-overlay-bg dark" data-hover-animate="fadeIn"></div>
					</div>
				</div>
				<div class="portfolio-desc">
					<h3 style="color:#3B3F5C"><a href="{{ url('pages/detail_album/'.$v->id) }}" style="color:#3B3F5C">{{ $v->title }}</a></h3>
				</div>
			</div>
			@endforeach

		</div><!-- .portfolio-carousel end -->

	</div>
</div>

<!-- <div class="section bg-transparent mt-0 p-0 footer-stick">
		<div id="map"></div>

	</div> -->
</section><!-- #content end -->
--}}


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function() {

		const pills = document.querySelectorAll('.category-pill');
		const newsItems = document.querySelectorAll('.news-item');
		const btnSelengkapnya = document.getElementById('btn-selengkapnya');

		pills.forEach(function(pill) {

			pill.addEventListener('click', function(e) {
				e.preventDefault();

				const category = this.getAttribute('data-category');
				const url = this.getAttribute('data-url');

				// Active tab
				pills.forEach(function(item) {
					item.classList.remove('active');
				});

				this.classList.add('active');

				// Filter card
				newsItems.forEach(function(item) {

					const itemCategory = item.getAttribute('data-category');

					if (category === 'all' || itemCategory === category) {
						item.style.display = '';
					} else {
						item.style.display = 'none';
					}

				});

				// Ubah URL tombol Selengkapnya
				btnSelengkapnya.href = url;
			});

		});

	});
</script>
<script>
    function loadWeather() {

        $.get('{{ url('/weather') }}', function (data) {

            $('#weather-temperature').text(data.temperature + '°C');
            $('#weather-status').text(data.weather);
            $('#weather-feels-like').text(data.feels_like);
            $('#weather-humidity').text(data.humidity);

            let icon = 'bi-cloud-sun';

            if ([61, 63, 65, 80, 81, 82].includes(data.weather_code)) {
                icon = 'bi-cloud-rain';
            } else if ([95, 96, 99].includes(data.weather_code)) {
                icon = 'bi-cloud-lightning';
            } else if (data.weather_code === 3) {
                icon = 'bi-clouds';
            } else if (data.weather_code === 0) {
                icon = 'bi-sun';
            }

            $('#weather-icon')
                .removeClass()
                .addClass('bi ' + icon + ' fs-1');
        });
    }

    loadWeather();
</script>

<script>
    function generateCalendar() {

        const today = new Date();

        const year = today.getFullYear();
        const month = today.getMonth();
        const date = today.getDate();

        const monthNames = [
            'Januari', 'Februari', 'Maret',
            'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September',
            'Oktober', 'November', 'Desember'
        ];

        const dayNames = [
            'Min', 'Sen', 'Sel', 'Rab',
            'Kam', 'Jum', 'Sab'
        ];

        $('#calendar-month').text(
            monthNames[month] + ' ' + year
        );

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        let html = `
            <div class="calendar-grid">
        `;

        // Nama hari
        dayNames.forEach(day => {
            html += `
                <div class="calendar-day-name">
                    ${day}
                </div>
            `;
        });

        // Kotak kosong sebelum tanggal 1
        for (let i = 0; i < firstDay; i++) {
            html += `<div></div>`;
        }

        // Tanggal
        for (let day = 1; day <= daysInMonth; day++) {

            const isToday = day === date;

            html += `
                <div class="calendar-date ${isToday ? 'today' : ''}">
                    ${day}
                </div>
            `;
        }

        html += `</div>`;

        $('#calendar').html(html);
    }

    generateCalendar();
</script>
@endsection