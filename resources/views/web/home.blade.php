@extends('web.layout')
@section('content')
@php
$setting = \App\Helpers\Helpers::setting();
@endphp
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
							<img src="https://perdagkop-umkm.com/upload/profile/1751875451.png"
								alt="Kepala Dinas Perhubungan">
						</div>

						<!-- Kata Sambutan -->
						<div class="sambutan-content">
							<span class="badge bg-danger mb-3">KATA SAMBUTAN</span>

							<h2 class="fw-bold mb-3">
								Kepala Dinas Perhubungan
							</h2>

							<p class="text-muted mb-3">
								Assalamu'alaikum Warahmatullahi Wabarakatuh.
							</p>

							<p class="text-muted line-clamp-4">
								Puji syukur kita panjatkan ke hadirat Tuhan Yang Maha Esa.
								Selamat datang di website resmi Dinas Perhubungan.
								Website ini diharapkan dapat menjadi media informasi dan
								komunikasi bagi masyarakat dalam memperoleh berbagai
								informasi terkait pelayanan dan kegiatan Dinas Perhubungan.
							</p>

							<p class="text-muted line-clamp-3">
								Kami terus berkomitmen untuk memberikan pelayanan yang
								profesional, transparan, dan mudah diakses oleh masyarakat.
							</p>

							<div class="mt-4">
								<strong class="d-block">
									Budi Santoso, S.STP., M.Si.
								</strong>
								<small class="text-muted">
									Kepala Dinas Perhubungan
								</small>
							</div>
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

				<!-- Berita 1 -->
				<div class="col-md-4">
					<div class="card news-card border-0 shadow-sm h-100">

						<div class="news-card-img-wrapper">
							<img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?auto=format&fit=crop&w=800&q=80"
								class="img-fluid w-100"
								alt="Berita">
						</div>

						<div class="card-body p-4">
							{{--<span class="badge bg-danger-subtle text-danger mb-2">
								Kegiatan
							</span>--}}

							<h5 class="fw-bold line-clamp-2 mb-2">
								Dinas Perhubungan Gelar Sosialisasi Keselamatan Berlalu Lintas
							</h5>

							<p class="text-muted small line-clamp-2 mb-3">
								Kegiatan sosialisasi dilaksanakan sebagai upaya meningkatkan
								kesadaran masyarakat dalam berlalu lintas.
							</p>

							<div class="d-flex justify-content-between text-muted small">
								<span>
									<i class="bi bi-calendar3 me-1"></i>
									20 Sep 2026
								</span>

								<span>
									<i class="bi bi-clock me-1"></i>
									3 min
								</span>
							</div>
						</div>

					</div>
				</div>


				<!-- Berita 2 -->
				<div class="col-md-4">
					<div class="card news-card border-0 shadow-sm h-100">

						<div class="news-card-img-wrapper">
							<img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80"
								class="img-fluid w-100"
								alt="Berita">
						</div>

						<div class="card-body p-4">

							<h5 class="fw-bold line-clamp-2 mb-2">
								Program Peningkatan Pelayanan Transportasi Tahun 2026
							</h5>

							<p class="text-muted small line-clamp-2 mb-3">
								Pemerintah daerah terus meningkatkan kualitas pelayanan
								transportasi bagi masyarakat.
							</p>

							<div class="d-flex justify-content-between text-muted small">
								<span>
									<i class="bi bi-calendar3 me-1"></i>
									19 Sep 2026
								</span>

								<span>
									<i class="bi bi-clock me-1"></i>
									4 min
								</span>
							</div>
						</div>

					</div>
				</div>


				<!-- Berita 3 -->
				<div class="col-md-4">
					<div class="card news-card border-0 shadow-sm h-100">

						<div class="news-card-img-wrapper">
							<img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=800&q=80"
								class="img-fluid w-100"
								alt="Berita">
						</div>

						<div class="card-body p-4">

							<h5 class="fw-bold line-clamp-2 mb-2">
								Peningkatan Kualitas Pelayanan Publik di Bidang Transportasi
							</h5>

							<p class="text-muted small line-clamp-2 mb-3">
								Berbagai inovasi pelayanan terus dikembangkan untuk
								memberikan kemudahan kepada masyarakat.
							</p>

							<div class="d-flex justify-content-between text-muted small">
								<span>
									<i class="bi bi-calendar3 me-1"></i>
									18 Sep 2026
								</span>

								<span>
									<i class="bi bi-clock me-1"></i>
									3 min
								</span>
							</div>
						</div>

					</div>
				</div>

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

					<!-- Article Card 1 -->
					<div class="col-md-6 news-item" data-category="Program dan Kegiatan">
						<div class="card news-card">
							<div class="news-card-img-wrapper">
								<button class="btn-bookmark" title="Simpan Artikel">
									<i class="bi bi-bookmark"></i>
								</button>
								<img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=800&q=80" alt="Berita AI">
							</div>
							<div class="card-body p-4 d-flex flex-column justify-content-between">
								<div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="badge bg-danger-subtle text-danger badge-category">Teknologi</span>
										<small class="text-muted"><i class="bi bi-clock me-1"></i>3 min baca</small>
									</div>
									<h5 class="fw-bold card-title line-clamp-2 mb-2">
										Inovasi AI Terbaru Resmi Diperkenalkan di Jakarta, Merevolusi Industri Lokal
									</h5>
									<p class="card-text text-muted small line-clamp-3 mb-3">
										Peluncuran teknologi AI generasi baru ini menjanjikan efisiensi tinggi pada sektor UMKM dan manufaktur nasional.
									</p>
								</div>
								<div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
									<span><i class="bi bi-person me-1"></i>Budi Santoso</span>
									<span>20 Sep 2026</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Article Card 2 -->
					<div class="col-md-6 news-item" data-category="Pelayanan">
						<div class="card news-card">
							<div class="news-card-img-wrapper">
								<button class="btn-bookmark" title="Simpan Artikel">
									<i class="bi bi-bookmark"></i>
								</button>
								<img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=800&q=80" alt="Berita IHSG">
							</div>
							<div class="card-body p-4 d-flex flex-column justify-content-between">
								<div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="badge bg-success-subtle text-success badge-category">Ekonomi</span>
										<small class="text-muted"><i class="bi bi-clock me-1"></i>4 min baca</small>
									</div>
									<h5 class="fw-bold card-title line-clamp-2 mb-2">
										IHSG Hari Ini Menutup Perdagangan dengan Rekor Tertinggi Baru
									</h5>
									<p class="card-text text-muted small line-clamp-3 mb-3">
										Laju Indeks Harga Saham Gabungan melesat ditopang oleh sektor perbankan dan emiten energi terbarukan.
									</p>
								</div>
								<div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
									<span><i class="bi bi-person me-1"></i>Siti Rahma</span>
									<span>20 Sep 2026</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Article Card 3 -->
					<div class="col-md-6 news-item" data-category="Transportasi">
						<div class="card news-card">
							<div class="news-card-img-wrapper">
								<button class="btn-bookmark" title="Simpan Artikel">
									<i class="bi bi-bookmark"></i>
								</button>
								<img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?auto=format&fit=crop&w=800&q=80" alt="Berita Olahraga">
							</div>
							<div class="card-body p-4 d-flex flex-column justify-content-between">
								<div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="badge bg-warning-subtle text-warning-emphasis badge-category">Olahraga</span>
										<small class="text-muted"><i class="bi bi-clock me-1"></i>5 min baca</small>
									</div>
									<h5 class="fw-bold card-title line-clamp-2 mb-2">
										Persiapan Timnas Jelang Laga Penentu Pertandingan Internasional
									</h5>
									<p class="card-text text-muted small line-clamp-3 mb-3">
										Pelatih fokus memperkuat lini pertahanan dan efektivitas serangan balik cepat menjelang laga krusial.
									</p>
								</div>
								<div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
									<span><i class="bi bi-person me-1"></i>Andi Wijaya</span>
									<span>19 Sep 2026</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Article Card 4 -->
					<div class="col-md-6 news-item" data-category="Perizinan dan Pelayanan">
						<div class="card news-card">
							<div class="news-card-img-wrapper">
								<button class="btn-bookmark" title="Simpan Artikel">
									<i class="bi bi-bookmark"></i>
								</button>
								<img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=800&q=80" alt="Berita Konser">
							</div>
							<div class="card-body p-4 d-flex flex-column justify-content-between">
								<div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="badge bg-info-subtle text-info-emphasis badge-category">Hiburan</span>
										<small class="text-muted"><i class="bi bi-clock me-1"></i>2 min baca</small>
									</div>
									<h5 class="fw-bold card-title line-clamp-2 mb-2">
										Konser Musik Internasional Siap Digelar Akhir Pekan Ini
									</h5>
									<p class="card-text text-muted small line-clamp-3 mb-3">
										Penyelenggara memastikan persiapan lokasi acara serta keamanan telah mencapai tahap akhir.
									</p>
								</div>
								<div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
									<span><i class="bi bi-person me-1"></i>Rina Permata</span>
									<span>19 Sep 2026</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Article Card 5 -->
					<div class="col-md-6 news-item" data-category="Program dan Kegiatan">
						<div class="card news-card">
							<div class="news-card-img-wrapper">
								<button class="btn-bookmark" title="Simpan Artikel">
									<i class="bi bi-bookmark"></i>
								</button>
								<img src="https://images.unsplash.com/photo-1509391365360-2e959784a276?auto=format&fit=crop&w=800&q=80" alt="PLTS Terapung">
							</div>
							<div class="card-body p-4 d-flex flex-column justify-content-between">
								<div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="badge bg-danger-subtle text-danger badge-category">Teknologi</span>
										<small class="text-muted"><i class="bi bi-clock me-1"></i>4 min baca</small>
									</div>
									<h5 class="fw-bold card-title line-clamp-2 mb-2">
										Pembangkit Listrik Tenaga Surya Terapung Resmi Beroperasi
									</h5>
									<p class="card-text text-muted small line-clamp-3 mb-3">
										Proyek PLTS Terapung terbesar di Asia Tenggara mulai menyalurkan listrik bersih secara konsisten ke ribuan rumah.
									</p>
								</div>
								<div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
									<span><i class="bi bi-person me-1"></i>Dian Kusuma</span>
									<span>18 Sep 2026</span>
								</div>
							</div>
						</div>
					</div>

					<!-- Article Card 6 -->
					<div class="col-md-6 news-item" data-category="Lainnya">
						<div class="card news-card">
							<div class="news-card-img-wrapper">
								<button class="btn-bookmark" title="Simpan Artikel">
									<i class="bi bi-bookmark"></i>
								</button>
								<img src="https://images.unsplash.com/photo-1541872703-74c5e44368f9?auto=format&fit=crop&w=800&q=80" alt="Politik">
							</div>
							<div class="card-body p-4 d-flex flex-column justify-content-between">
								<div>
									<div class="d-flex align-items-center justify-content-between mb-2">
										<span class="badge bg-primary-subtle text-primary badge-category">Politik</span>
										<small class="text-muted"><i class="bi bi-clock me-1"></i>3 min baca</small>
									</div>
									<h5 class="fw-bold card-title line-clamp-2 mb-2">
										Diskusi Kebijakan Publik: RUU Transparansi Digital Diumumkan
									</h5>
									<p class="card-text text-muted small line-clamp-3 mb-3">
										Rancangan undang-undang baru berfokus pada pelindungan data pribadi dan asas transparansi informasi publik.
									</p>
								</div>
								<div class="d-flex align-items-center justify-content-between pt-3 border-top text-muted small">
									<span><i class="bi bi-person me-1"></i>Hendra Gunawan</span>
									<span>18 Sep 2026</span>
								</div>
							</div>
						</div>
					</div>

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
					<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
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
					</div>

					<!-- YouTube Video Widget -->
					<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">

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

					</div>

					<!-- Weather Info Widget -->
					<div class="card border-0 text-white p-4 rounded-4 shadow-sm" style="background: linear-gradient(135deg, #1e40af, #3b82f6);">
						<div class="d-flex justify-content-between align-items-center mb-2">
							<div>
								<h6 class="m-0 fw-bold">Cuaca Hari Ini</h6>
								<small opacity="0.8">Jakarta, Indonesia</small>
							</div>
							<i class="bi bi-cloud-sun fs-1"></i>
						</div>
						<div class="d-flex align-items-baseline gap-2">
							<h1 class="display-5 fw-bold m-0">29°C</h1>
							<span class="fs-6">Cerah Berawan</span>
						</div>
					</div>

					<!-- Newsletter Form Widget -->
					<div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
						<div class="text-center mb-3">
							<i class="bi bi-envelope-paper fs-1 text-danger"></i>
							<h5 class="fw-bold mt-2">Langganan Buletin</h5>
							<p class="text-muted small">Dapatkan rangkuman berita terupdate langsung ke email Anda setiap pagi.</p>
						</div>
						<form action="#">
							<div class="mb-3">
								<input type="email" class="form-control rounded-pill" placeholder="Alamat email Anda..." required>
							</div>
							<button type="submit" class="btn btn-danger w-100 rounded-pill fw-bold">Berlangganan Gratis</button>
						</form>
					</div>

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

<script>
	// Initialize the map
	var mymap = L.map('map').setView([-3.995826, 122.501631], 13); // Centered at (0, 0) with zoom level 2

	// Add the OpenStreetMap tile layer
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '© OpenStreetMap contributors'
	}).addTo(mymap);

	// Define the coordinates for the markers and pop-up content
	var markers = [{
			lat: -3.999283,
			lon: 122.496052,
			popupText: 'Marker 1'
		},
		{
			lat: -3.999839,
			lon: 122.515751,
			popupText: 'Marker 2'
		},
		{
			lat: -3.995826,
			lon: 122.501631,
			popupText: 'Marker 3'
		}
	];

	// Loop through the markers array and add them to the map
	markers.forEach(function(marker) {
		L.marker([marker.lat, marker.lon]).addTo(mymap)
			.bindPopup(marker.popupText);
	});
</script>
<script>
	$(document).ready(function() {
		$("#oc-images").owlCarousel({
			items: 4,
			loop: true,
			margin: 10,
			autoplay: true,
			autoplayTimeout: 3000,
			autoplayHoverPause: true,
			nav: true, // ✅ Tampilkan tombol navigasi
			dots: true, // (opsional) sembunyikan titik navigasi bawah
			navText: [
				'<i class="icon-angle-left"></i>',
				'<i class="icon-angle-right"></i>'
			],
			responsive: {
				0: {
					items: 2
				},
				576: {
					items: 3
				},
				992: {
					items: 4
				},
				1200: {
					items: 5
				}
			}
		});
	});
</script>
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

@endsection