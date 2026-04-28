@extends('layouts.app')

@section('title', 'Destinasi - Geosite Danau Toba')

@section('content')

<style>
    /* ==================== LOGO SECTION STYLE ==================== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(255, 255, 255, 0.98);
        padding: 8px 24px;
        border-radius: 60px;
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        border: 1px solid rgba(255, 255, 255, 0.8);
    }
    
    .logo-container:hover {
        background: white;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
        transform: translateY(-2px);
    }
    
    .flag-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .flag-img {
        width: 100px;
        height: auto;
        border-radius: 6px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.15);
        transition: transform 0.2s ease;
        border: 1px solid rgba(255,255,255,0.3);
    }
    
    .flag-img:hover {
        transform: scale(1.05);
    }
    
    .logo-divider {
        width: 2px;
        height: 35px;
        background: #e0e0e0;
        border-radius: 2px;
    }
    
    .del-logo-wrapper {
        display: flex;
        align-items: center;
        gap: 10px;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    
    .del-logo-wrapper:hover {
        transform: scale(1.02);
    }
    
    .del-img {
        width: 50px;
        height: auto;
        border-radius: 8px;
        transition: transform 0.2s ease;
    }
    
    .del-img:hover {
        transform: scale(1.05);
    }
    
    .geotoba-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }
    
    .geotoba-icon {
        font-size: 32px;
        color: #2c5f8a;
        transition: transform 0.2s ease;
    }
    
    .geotoba-text {
        font-size: 1.5rem;
        font-weight: 800;
        letter-spacing: 1px;
        background: linear-gradient(135deg, #1a3c5e, #2c5f8a);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-family: 'Inter', 'Poppins', sans-serif;
        line-height: 1.2;
    }
    
    .geotoba-sub {
        font-size: 0.7rem;
        font-weight: 500;
        color: #5a6e7c;
        letter-spacing: 0.5px;
    }
    
    @media (max-width: 768px) {
        .logo-container {
            top: 12px;
            left: 12px;
            padding: 6px 18px;
            gap: 14px;
        }
        .flag-img {
            width: 60px;
        }
        .del-img {
            width: 35px;
        }
        .geotoba-text {
            font-size: 1.2rem;
        }
        .geotoba-icon {
            font-size: 26px;
        }
        .geotoba-sub {
            font-size: 0.6rem;
        }
        .logo-divider {
            height: 28px;
        }
    }
    
    @media (max-width: 576px) {
        .logo-container {
            padding: 5px 14px;
            gap: 10px;
        }
        .flag-img {
            width: 45px;
        }
        .del-img {
            width: 28px;
        }
        .geotoba-text {
            font-size: 0.9rem;
        }
        .geotoba-icon {
            font-size: 20px;
        }
        .geotoba-sub {
            font-size: 0.5rem;
        }
        .logo-divider {
            height: 24px;
        }
    }

    .destinasi-hero {
        height: 50vh;
        background: linear-gradient(135deg, rgba(0,0,0,0.7), rgba(0,0,0,0.5)),
                    url('/image/toba.jpg') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .destinasi-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }
    
    .destinasi-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    
    .destinasi-img {
        height: 300px;
        width: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .destinasi-card:hover .destinasi-img {
        transform: scale(1.05);
    }
    
    .price-tag {
        background: linear-gradient(135deg, #00d2ff, #3a7bd5);
        color: white;
        padding: 5px 15px;
        border-radius: 50px;
        display: inline-block;
        font-weight: 600;
    }
    
    .feature-list {
        list-style: none;
        padding: 0;
    }
    
    .feature-list li {
        margin-bottom: 10px;
    }
    
    .feature-list li i {
        color: #00d2ff;
        margin-right: 10px;
    }
    
    .btn-detail {
        background: linear-gradient(135deg, #00d2ff, #3a7bd5);
        color: white;
        border: none;
        padding: 10px 25px;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    
    .btn-detail:hover {
        transform: translateX(5px);
        color: white;
    }
    
    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 3rem;
        position: relative;
        display: inline-block;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 60px;
        height: 3px;
        background: linear-gradient(90deg, #3498db, #e74c3c);
    }
    
    @media (max-width: 768px) {
        .destinasi-img {
            height: 200px;
        }
    }
</style>

    
    <div class="logo-divider"></div>
    
    <!-- LOGO 3: GEOTOBA (PALING KANAN) -->
    <div class="geotoba-wrapper">
      
        <div style="display: flex; flex-direction: column; line-height: 1.2;">
            <span class="geotoba-text">GEOTOBA</span>
            <span class="geotoba-sub">Geopark Danau Toba</span>
        </div>
    </div>
    
</div>

<!-- Hero Section -->
<section class="destinasi-hero">
    <div class="container">
        <h1 class="display-3 fw-bold" data-aos="fade-up">Destinasi Wisata</h1>
        <p class="lead" data-aos="fade-up" data-aos-delay="100">4 Geosite yang wajib Anda kunjungi di Danau Toba</p>
    </div>
</section>

<!-- Destinasi List -->
<section class="py-5">
    <div class="container">
        
        <!-- Balige -->
        <div class="destinasi-card" data-aos="fade-up">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="/image/balige.jpg" class="destinasi-img" alt="Balige">
                </div>
                <div class="col-md-6">
                    <div class="p-4 p-lg-5">
                        <div class="price-tag mb-3">⭐ 4.8/5 - Terpopuler</div>
                        <h2 class="mb-3">BALIGE</h2>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i> Kabupaten Toba Samosir, Sumatera Utara
                        </p>
                        <p>Balige adalah pusat pemerintahan Kabupaten Toba Samosir yang menawarkan berbagai destinasi wisata menarik. Dari museum, kuliner khas, hingga pemandangan Danau Toba yang memukau.</p>
                        
                        <ul class="feature-list mt-3">
                            <li><i class="fas fa-check-circle"></i> Museum Batak TB Silalahi</li>
                            <li><i class="fas fa-check-circle"></i> Pantai Bulung Cina</li>
                            <li><i class="fas fa-check-circle"></i> Pusat Oleh-oleh Khas Toba</li>
                            <li><i class="fas fa-check-circle"></i> Kuliner Arsik & Naniarsik</li>
                        </ul>
                        
                        <div class="mt-4">
                            <span class="badge bg-primary me-2">Budaya</span>
                            <span class="badge bg-success me-2">Kuliner</span>
                            <span class="badge bg-info">Sejarah</span>
                        </div>
                        
                        <a href="#" class="btn btn-detail mt-4">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Meat -->
        <div class="destinasi-card" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-0 flex-row-reverse">
                <div class="col-md-6">
                    <img src="/image/meat.jpg" class="destinasi-img" alt="Meat">
                </div>
                <div class="col-md-6">
                    <div class="p-4 p-lg-5">
                        <div class="price-tag mb-3">⭐ 4.7/5 - Best Cultural</div>
                        <h2 class="mb-3">MEAT</h2>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i> Kabupaten Toba Samosir, Sumatera Utara
                        </p>
                        <p>Desa Meat adalah desa wisata yang mempertahankan keaslian budaya Batak Toba. Di sini Anda bisa melihat langsung rumah adat dan belajar tentang kearifan lokal masyarakat Batak.</p>
                        
                        <ul class="feature-list mt-3">
                            <li><i class="fas fa-check-circle"></i> Rumah Adat Batak Tradisional</li>
                            <li><i class="fas fa-check-circle"></i> Tarian Tortor & Gondang</li>
                            <li><i class="fas fa-check-circle"></i> Workshop Tenun Ulos</li>
                            <li><i class="fas fa-check-circle"></i> Panorama Danau Toba</li>
                        </ul>
                        
                        <div class="mt-4">
                            <span class="badge bg-primary me-2">Tradisional</span>
                            <span class="badge bg-success me-2">Kultural</span>
                            <span class="badge bg-info">Panorama</span>
                        </div>
                        
                        <a href="#" class="btn btn-detail mt-4">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Batu Bahisan -->
        <div class="destinasi-card" data-aos="fade-up" data-aos-delay="200">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="/image/batu.jpg" class="destinasi-img" alt="Batu Bahisan">
                </div>
                <div class="col-md-6">
                    <div class="p-4 p-lg-5">
                        <div class="price-tag mb-3">⭐ 4.9/5 - Best Photo Spot</div>
                        <h2 class="mb-3">BATU BAHISAN</h2>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i> Kabupaten Samosir, Sumatera Utara
                        </p>
                        <p>Formasi batuan unik yang terbentuk dari proses geologi jutaan tahun lalu. Tempat ini menjadi favorit para fotografer untuk mengabadikan keindahan alam Danau Toba.</p>
                        
                        <ul class="feature-list mt-3">
                            <li><i class="fas fa-check-circle"></i> Formasi Batuan Unik</li>
                            <li><i class="fas fa-check-circle"></i> Spot Foto Instagramable</li>
                            <li><i class="fas fa-check-circle"></i> Sunrise & Sunset View</li>
                            <li><i class="fas fa-check-circle"></i> Trekking Ringan</li>
                        </ul>
                        
                        <div class="mt-4">
                            <span class="badge bg-primary me-2">Geologi</span>
                            <span class="badge bg-success me-2">Fotografi</span>
                            <span class="badge bg-info">Unik</span>
                        </div>
                        
                        <a href="#" class="btn btn-detail mt-4">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Liang Sipege -->
        <div class="destinasi-card" data-aos="fade-up" data-aos-delay="300">
            <div class="row g-0 flex-row-reverse">
                <div class="col-md-6">
                    <img src="/image/liang.jpg" class="destinasi-img" alt="Liang Sipege">
                </div>
                <div class="col-md-6">
                    <div class="p-4 p-lg-5">
                        <div class="price-tag mb-3">⭐ 4.8/5 - Best Adventure</div>
                        <h2 class="mb-3">LIANG SIPEGE</h2>
                        <p class="text-muted mb-3">
                            <i class="fas fa-map-marker-alt text-danger"></i> Kabupaten Samosir, Sumatera Utara
                        </p>
                        <p>Goa alami yang menyimpan keindahan stalaktit dan stalakmit. Liang Sipege menawarkan pengalaman petualangan yang tak terlupakan bagi para pengunjung.</p>
                        
                        <ul class="feature-list mt-3">
                            <li><i class="fas fa-check-circle"></i> Goa Alami dengan Stalaktit</li>
                            <li><i class="fas fa-check-circle"></i> Petualangan Caving</li>
                            <li><i class="fas fa-check-circle"></i> Nilai Geologi Tinggi</li>
                            <li><i class="fas fa-check-circle"></i> Spot Eksplorasi</li>
                        </ul>
                        
                        <div class="mt-4">
                            <span class="badge bg-primary me-2">Petualangan</span>
                            <span class="badge bg-success me-2">Geologi</span>
                            <span class="badge bg-info">Eksotis</span>
                        </div>
                        
                        <a href="#" class="btn btn-detail mt-4">
                            Lihat Detail <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- Paket Wisata -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center" data-aos="fade-up">Paket Wisata Hemat</h2>
        <div class="row g-4 mt-3">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-sun fa-3x text-primary"></i>
                        </div>
                        <h4>Paket 1 Hari</h4>
                        <p class="text-muted">Jelajahi 4 Geosite dalam sehari</p>
                        <h3 class="text-primary mb-3">Rp 350K</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i> Transportasi</li>
                            <li><i class="fas fa-check text-success me-2"></i> Guide Lokal</li>
                            <li><i class="fas fa-check text-success me-2"></i> Tiket Masuk</li>
                            <li><i class="fas fa-check text-success me-2"></i> Makan Siang</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary rounded-pill mt-3">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow rounded-4 h-100 border-primary">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-moon fa-3x text-primary"></i>
                        </div>
                        <h4>Paket 2 Hari 1 Malam</h4>
                        <p class="text-muted">Eksplorasi lengkap dengan menginap</p>
                        <h3 class="text-primary mb-3">Rp 650K</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i> Transportasi</li>
                            <li><i class="fas fa-check text-success me-2"></i> Guide Lokal</li>
                            <li><i class="fas fa-check text-success me-2"></i> Tiket Masuk</li>
                            <li><i class="fas fa-check text-success me-2"></i> 3x Makan + Hotel</li>
                        </ul>
                        <a href="#" class="btn btn-primary rounded-pill mt-3">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow rounded-4 h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="fas fa-star fa-3x text-primary"></i>
                        </div>
                        <h4>Paket Private</h4>
                        <p class="text-muted">Perjalanan eksklusif sesuai keinginan</p>
                        <h3 class="text-primary mb-3">Rp 1.2M</h3>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-success me-2"></i> Mobil Private</li>
                            <li><i class="fas fa-check text-success me-2"></i> Guide Pribadi</li>
                            <li><i class="fas fa-check text-success me-2"></i> All Inclusive</li>
                            <li><i class="fas fa-check text-success me-2"></i> Hotel Bintang 3</li>
                        </ul>
                        <a href="#" class="btn btn-outline-primary rounded-pill mt-3">Pesan Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<!-- AOS CSS -->
<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>

@endsection