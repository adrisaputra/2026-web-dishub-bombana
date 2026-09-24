<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nusantara News - Portal Berita Terkini & Terpercaya</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Google Fonts: Plus Jakarta Sans -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --font-main: 'Plus Jakarta Sans', sans-serif;
            --brand-primary: #dc2626;
            --brand-secondary: #991b1b;
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body {
            font-family: var(--font-main);
            background-color: #f8f9fa;
            color: #1e293b;
        }

        /* Top Bar & Breaking News Ticker */
        .top-bar {
            background-color: #ffffff;
            font-size: 0.85rem;
            border-bottom: 1px solid #e2e8f0;
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
            0% { transform: translate3d(0, 0, 0); }
            100% { transform: translate3d(-50%, 0, 0); }
        }

        /* Header Branding & Navigation */
        .brand-logo {
            font-weight: 800;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
            color: var(--brand-primary);
        }

        .navbar {
            background-color: #ffffff !important;
        }

        .nav-link {
            font-weight: 600;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            color: #475569 !important;
            transition: var(--transition-smooth);
        }

        .nav-link:hover, 
        .nav-link.active {
            color: var(--brand-primary) !important;
        }

        /* Hero Featured Cards */
        .hero-card {
            position: relative;
            border-radius: 16px;
            overflow: hidden;
            height: 440px;
            border: none;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
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
            background: linear-gradient(180deg, rgba(0,0,0,0) 25%, rgba(0,0,0,0.88) 100%);
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
            box-shadow: 0 4px 12px rgba(0,0,0,0.04);
        }

        .side-hero-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
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
    </style>
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar py-2">
        <div class="container">
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
    </div>

    <!-- Main Navigation Header -->
    <header class="sticky-top bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg py-3">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                    <i class="bi bi-newspaper fs-2 text-danger"></i>
                    <span class="brand-logo">Nusantara<span class="text-dark fw-light">News</span></span>
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1">
                        <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Teknologi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Ekonomi</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Olahraga</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Politik</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Hiburan</a></li>
                    </ul>

                    <!-- Search Input -->
                    <form class="d-flex position-relative align-items-center mt-3 mt-lg-0" style="max-width: 250px;" action="#">
                        <input type="text" class="form-control rounded-pill ps-4 pe-5 border-secondary-subtle" placeholder="Cari berita...">
                        <button type="submit" class="btn p-0 position-absolute end-0 me-3 border-0 bg-transparent text-muted">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Container -->
    <main class="container py-4">

        <!-- Hero Featured Section -->
        <section class="mb-5">
            <div class="row g-4">
                <!-- Main Featured Article -->
                <div class="col-lg-8">
                    <div class="hero-card">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1200&q=80" alt="Featured News">
                        <div class="hero-overlay">
                            <span class="badge bg-danger badge-category mb-2 align-self-start">Teknologi Utama</span>
                            <h2 class="fw-bold mb-2 text-white fs-3 fs-md-2">Inovasi AI Terbaru Resmi Diperkenalkan di Jakarta, Merevolusi Industri Lokal</h2>
                            <p class="text-white-50 mb-3 d-none d-md-block line-clamp-2">Teknologi AI generasi terbaru diharapkan dapat membantu efisiensi sektor UMKM dan manufaktur secara signifikan dalam persaingan pasar internasional.</p>
                            <div class="d-flex align-items-center text-white-50 small gap-3">
                                <span><i class="bi bi-person me-1"></i> Budi Santoso</span>
                                <span><i class="bi bi-clock me-1"></i> 2 Jam lalu</span>
                                <span><i class="bi bi-eye me-1"></i> 1.4k Pembaca</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Side Featured Articles -->
                <div class="col-lg-4 d-flex flex-column justify-content-between gap-3">
                    <div class="card side-hero-card p-3 h-100">
                        <div class="row g-0 align-items-center">
                            <div class="col-4">
                                <img src="https://images.unsplash.com/photo-1611974789855-9c2a0a7236a3?auto=format&fit=crop&w=300&q=80" class="img-fluid rounded-3 h-100 object-fit-cover" alt="Ekonomi">
                            </div>
                            <div class="col-8 ps-3">
                                <span class="badge bg-success-subtle text-success badge-category mb-1">Ekonomi</span>
                                <h6 class="fw-bold line-clamp-2 mb-1">IHSG Hari Ini Menutup Perdagangan dengan Rekor Tertinggi Baru</h6>
                                <small class="text-muted"><i class="bi bi-clock"></i> 3 jam lalu</small>
                            </div>
                        </div>
                    </div>

                    <div class="card side-hero-card p-3 h-100">
                        <div class="row g-0 align-items-center">
                            <div class="col-4">
                                <img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?auto=format&fit=crop&w=300&q=80" class="img-fluid rounded-3 h-100 object-fit-cover" alt="Olahraga">
                            </div>
                            <div class="col-8 ps-3">
                                <span class="badge bg-warning-subtle text-warning-emphasis badge-category mb-1">Olahraga</span>
                                <h6 class="fw-bold line-clamp-2 mb-1">Persiapan Timnas Jelang Laga Penentu Pertandingan Internasional</h6>
                                <small class="text-muted"><i class="bi bi-clock"></i> 4 jam lalu</small>
                            </div>
                        </div>
                    </div>

                    <div class="card side-hero-card p-3 h-100">
                        <div class="row g-0 align-items-center">
                            <div class="col-4">
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=300&q=80" class="img-fluid rounded-3 h-100 object-fit-cover" alt="Hiburan">
                            </div>
                            <div class="col-8 ps-3">
                                <span class="badge bg-info-subtle text-info-emphasis badge-category mb-1">Hiburan</span>
                                <h6 class="fw-bold line-clamp-2 mb-1">Konser Musik Internasional Siap Digelar Akhir Pekan Ini</h6>
                                <small class="text-muted"><i class="bi bi-clock"></i> 5 jam lalu</small>
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
                    <span class="bg-danger rounded-pill d-inline-block" style="width: 8px; height: 24px;"></span>
                    Eksplor Berita
                </h4>
                <!-- Pills Bar -->
                <div class="d-flex gap-2 overflow-x-auto pb-2 w-100 w-md-auto">
                    <a href="#" class="category-pill active">Semua</a>
                    <a href="#" class="category-pill">Teknologi</a>
                    <a href="#" class="category-pill">Ekonomi</a>
                    <a href="#" class="category-pill">Olahraga</a>
                    <a href="#" class="category-pill">Politik</a>
                    <a href="#" class="category-pill">Hiburan</a>
                </div>
            </div>
        </section>

        <!-- Main Content Grid -->
        <div class="row g-4">
            <!-- News Cards Column -->
            <div class="col-lg-8">
                <div class="row g-4">
                    
                    <!-- Article Card 1 -->
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                    <div class="col-md-6">
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
                <nav class="mt-5" aria-label="Navigasi Halaman">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link rounded-circle mx-1" href="#" aria-label="Sebelumnya">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link rounded-circle mx-1 bg-danger border-danger" href="#">1</a></li>
                        <li class="page-item"><a class="page-link rounded-circle mx-1 text-dark" href="#">2</a></li>
                        <li class="page-item"><a class="page-link rounded-circle mx-1 text-dark" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link rounded-circle mx-1 text-dark" href="#" aria-label="Berikutnya">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
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

    <!-- Footer -->
    <footer class="bg-white border-top mt-5 py-5">
        <div class="container">
            <div class="row g-4 mb-4">
                <div class="col-lg-4">
                    <a class="navbar-brand d-flex align-items-center gap-2 mb-3" href="#">
                        <i class="bi bi-newspaper fs-2 text-danger"></i>
                        <span class="brand-logo">Nusantara<span class="text-dark fw-light">News</span></span>
                    </a>
                    <p class="text-muted small mb-3">Portal berita terpercaya menyajikan informasi terkini dari seluruh pelosok Nusantara secara cepat, akurat, dan berimbang.</p>
                    <div class="d-flex gap-3 fs-5 text-muted">
                        <a href="#" class="text-dark"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-dark"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="fw-bold mb-3">Kategori</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 small text-muted">
                        <li><a href="#" class="text-decoration-none text-reset">Teknologi</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Ekonomi</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Olahraga</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Politik</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Hiburan</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h6 class="fw-bold mb-3">Perusahaan</h6>
                    <ul class="list-unstyled d-flex flex-column gap-2 small text-muted">
                        <li><a href="#" class="text-decoration-none text-reset">Tentang Kami</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Redaksi</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Karir</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Pedoman Siber</a></li>
                        <li><a href="#" class="text-decoration-none text-reset">Kontak</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <h6 class="fw-bold mb-3">Aplikasi Mobile</h6>
                    <p class="text-muted small">Unduh aplikasi kami untuk pengalaman membaca berita yang lebih praktis di mana saja.</p>
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
            <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center text-muted small gap-2">
                <p class="m-0">&copy; 2026 Nusantara News. Hak Cipta Dilindungi Undang-Undang.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-reset text-decoration-none">Kebijakan Privasi</a>
                    <a href="#" class="text-reset text-decoration-none">Syarat & Ketentuan</a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>