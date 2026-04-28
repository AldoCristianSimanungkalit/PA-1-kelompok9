@extends('layouts.app')

@section('content')

<style>
    /* Custom CSS untuk efek dan animasi */
    
    /* ==================== SLIDER/CAROUSEL BACKGROUND ==================== */
    .hero-section {
        height: 100vh;
        position: relative;
        overflow: hidden;
    }
    
    .slide {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
        z-index: 1;
    }
    
    .slide.active {
        opacity: 1;
        z-index: 2;
    }
    
    .slide-1 {
        background-image: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.5) 100%),
                          url('/image/balige.jpg');
        background-size: cover;
        background-position: center;
    }
    
    .slide-2 {
        background-image: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.5) 100%),
                          url('/image/meat.jpg');
        background-size: cover;
        background-position: center;
    }
    
    .slide-3 {
        background-image: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.5) 100%),
                          url('/image/batu.jpeg');
        background-size: cover;
        background-position: center;
    }
    
    .slide-4 {
        background-image: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.5) 100%),
                          url('/image/liang.jpg');
        background-size: cover;
        background-position: center;
    }
    
    .hero-content {
        position: relative;
        z-index: 10;
        height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        animation: fadeInUp 1s ease-out;
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .hero-title {
        font-size: 80px;
        font-weight: 900;
        margin-bottom: 20px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }
    
    .hero-subtitle {
        font-size: 22px;
        letter-spacing: 2px;
    }
    
    /* Slider indicators/dots */
    .slider-dots {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 15px;
        z-index: 15;
    }
    
    .dot {
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background: rgba(255,255,255,0.5);
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .dot.active {
        background: white;
        width: 30px;
        border-radius: 10px;
    }
    
    .dot:hover {
        background: white;
    }
    
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        animation: bounce 2s infinite;
        cursor: pointer;
        z-index: 15;
    }
    
    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        40% {
            transform: translateX(-50%) translateY(-30px);
        }
        60% {
            transform: translateX(-50%) translateY(-15px);
        }
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
    
    .destination-card {
        transition: all 0.3s ease;
        overflow: hidden;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    }
    
    .destination-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }
    
    .destination-img {
        transition: transform 0.5s ease;
        height: 300px;
        object-fit: cover;
    }
    
    .destination-card:hover .destination-img {
        transform: scale(1.05);
    }
    
    .stat-card {
        text-align: center;
        padding: 30px;
        border-radius: 15px;
        background: rgba(255,255,255,0.05);
        transition: all 0.3s ease;
    }
    
    .stat-card:hover {
        background: rgba(255,255,255,0.1);
        transform: translateY(-5px);
    }
    
    .stat-number {
        font-size: 3rem;
        font-weight: 700;
        margin-bottom: 10px;
        background: linear-gradient(135deg, #fff, #3498db);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    
    /* ==================== LOGO SECTION ==================== */
    .logo-container {
        position: fixed;
        top: 20px;
        left: 20px;
        z-index: 9999;
        display: flex;
        align-items: center;
        gap: 20px;
        background: rgba(255, 255, 255, 0.95);
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
        .hero-title {
            font-size: 40px;
        }
        .hero-subtitle {
            font-size: 18px;
        }
        .section-title {
            font-size: 2rem;
        }
        .stat-number {
            font-size: 2rem;
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
        .hero-title {
            font-size: 32px;
        }
        .destination-img {
            height: 250px;
        }
    }
    
    html {
        scroll-behavior: smooth;
    }
    
    .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.6s ease;
    }
    
    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>

    
    <div class="logo-divider"></div>
    
    <!-- LOGO GEOTOBA -->
    <div class="geotoba-wrapper">
       
        <div style="display: flex; flex-direction: column; line-height: 1.2;">
            <span class="geotoba-text">GEOTOBA</span>
            <span class="geotoba-sub">Geopark Danau Toba</span>
        </div>
    </div>
    
</div>

<!-- HERO SECTION WITH SLIDER BACKGROUND -->
<section class="hero-section" id="home">
    
    <!-- Slides -->
    <div class="slide slide-1 active"></div>
    <div class="slide slide-2"></div>
    <div class="slide slide-3"></div>
    <div class="slide slide-4"></div>
    
    <!-- Slider Dots/Indicators -->
    <div class="slider-dots">
        <div class="dot active" data-slide="0"></div>
        <div class="dot" data-slide="1"></div>
        <div class="dot" data-slide="2"></div>
        <div class="dot" data-slide="3"></div>
    </div>
    
    <!-- Content -->
    <div class="hero-content">
        <div>
            <h1 class="hero-title">
                TELE, EFRATA,<br> 
                SIHOTANG
            </h1>
            <p class="hero-subtitle">Sistem Informasi Geosite Danau Toba</p>
            <a href="#intro" class="btn btn-light btn-lg mt-4 px-5 py-3 rounded-pill">
                Jelajahi Sekarang
            </a>
        </div>
    </div>
    
    <div class="scroll-indicator" onclick="document.getElementById('intro').scrollIntoView({behavior: 'smooth'})">
        <i class="fas fa-chevron-down fa-2x"></i>
    </div>
</section>

<!-- INTRO SECTION -->
<section id="intro" class="py-5">
    <div class="container text-center fade-in">
        <h2 class="section-title">Geosite Danau Toba</h2>
        <p class="lead mx-auto" style="max-width: 800px;">
            Geosite Balige, Meat, Batu Bahisan, dan Liang Sipege merupakan bagian dari 
            <strong>Geopark Danau Toba</strong> yang diakui UNESCO. Keempat destinasi ini menawarkan 
            keindahan alam, nilai geologi tinggi, dan kekayaan budaya Batak yang memukau.
        </p>
        <div class="row mt-5">
            <div class="col-md-3 col-6 mb-3">
                <div class="bg-light rounded p-3">
                    <i class="fas fa-mountain fa-3x text-primary mb-2"></i>
                    <h5>Geologi Unik</h5>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="bg-light rounded p-3">
                    <i class="fas fa-landmark fa-3x text-success mb-2"></i>
                    <h5>Budaya Batak</h5>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="bg-light rounded p-3">
                    <i class="fas fa-camera fa-3x text-info mb-2"></i>
                    <h5>Spot Instagramable</h5>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="bg-light rounded p-3">
                    <i class="fas fa-umbrella-beach fa-3x text-warning mb-2"></i>
                    <h5>Wisata Seru</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DESTINATION DETAILS -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center">Destinasi Unggulan</h2>
        
        <!-- TELE -->
        <div class="row mb-5 align-items-center fade-in">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="destination-card">
                    <img src="/image/balige.jpg" class="destination-img w-100" alt="Tele">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4">
                    <h2 class="display-5 mb-3">TELE</h2>
                    <div class="mb-3">
                        <i class="fas fa-map-marker-alt text-danger"></i>
                        <span class="text-muted">Kabupaten Toba Samosir, Sumatera Utara</span>
                    </div>
                    <p class="lead">Pusat wisata Danau Toba dengan pemandangan luar biasa.</p>
                    <p>Balige merupakan ibu kota Kabupaten Toba Samosir yang menawarkan berbagai atraksi wisata. Di sini Anda dapat mengunjungi Museum Batak TB Silalahi, menikmati kuliner khas, dan berfoto dengan latar Danau Toba yang memukau.</p>
                    <div class="mt-4">
                        <span class="badge bg-primary me-2">Budaya</span>
                        <span class="badge bg-success me-2">Kuliner</span>
                        <span class="badge bg-info">Sejarah</span>
                    </div>
                    <a href="#" class="btn btn-outline-primary mt-3 rounded-pill">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        
        <!-- EFRATA -->
        <div class="row mb-5 align-items-center fade-in">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0">
                <div class="destination-card">
                    <img src="/image/Efrata.jpeg" class="destination-img w-100" alt="Efrata">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4">
                    <h2 class="display-5 mb-3">EFRATA</h2>
                    <div class="mb-3">
                        <i class="fas fa-map-marker-alt text-danger"></i>
                        <span class="text-muted">Kabupaten Toba Samosir, Sumatera Utara</span>
                    </div>
                    <p class="lead">Desa wisata tradisional dengan rumah adat Batak.</p>
                    <p>Desa Meat menyuguhkan pengalaman budaya Batak yang autentik. Anda dapat melihat langsung rumah adat Batak Toba yang masih terjaga keasliannya, serta menikmati pemandangan langsung ke Danau Toba yang menakjubkan.</p>
                    <div class="mt-4">
                        <span class="badge bg-primary me-2">Tradisional</span>
                        <span class="badge bg-success me-2">Kultural</span>
                        <span class="badge bg-info">Panorama</span>
                    </div>
                    <a href="#" class="btn btn-outline-primary mt-3 rounded-pill">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        
        <!-- Sihotang -->
        <div class="row mb-5 align-items-center fade-in">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="destination-card">
                    <img src="/image/batu.jpeg" class="destination-img w-100" alt="Sihotang">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="p-4">
                    <h2 class="display-5 mb-3">Sihotang</h2>
                    <div class="mb-3">
                        <i class="fas fa-map-marker-alt text-danger"></i>
                        <span class="text-muted">Kabupaten Samosir, Sumatera Utara</span>
                    </div>
                    <p class="lead">Formasi batuan unik hasil proses geologi.</p>
                    <p>Batu Bahisan merupakan formasi batuan yang terbentuk dari proses geologi jutaan tahun lalu. Tempat ini menjadi spot foto favorit para wisatawan karena keunikan bentuk batuan dan latar Danau Toba yang spektakuler.</p>
                    <div class="mt-4">
                        <span class="badge bg-primary me-2">Geologi</span>
                        <span class="badge bg-success me-2">Fotografi</span>
                        <span class="badge bg-info">Unik</span>
                    </div>
                    <a href="#" class="btn btn-outline-primary mt-3 rounded-pill">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        
    </div>
</section>

<!-- STATISTICS SECTION -->
<section class="py-5" style="background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%); color: white;">
    <div class="container">
        <h2 class="section-title text-center">Statistik Wisata</h2>
        <div class="row mt-4">
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card">
                    <div class="stat-number">
                        <span class="counter" data-target="20000">0</span>+
                    </div>
                    <p>Pengunjung</p>
                    <small class="text-muted">Per Tahun</small>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card">
                    <div class="stat-number">
                        <span class="counter" data-target="4">0</span>
                    </div>
                    <p>Geosite</p>
                    <small class="text-muted">Destinasi</small>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card">
                    <div class="stat-number">
                        <span class="counter" data-target="70">0</span>+
                    </div>
                    <p>Event</p>
                    <small class="text-muted">Tahunan</small>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card">
                    <div class="stat-number">
                        <span class="counter" data-target="99">0</span>%
                    </div>
                    <p>Kepuasan</p>
                    <small class="text-muted">Wisatawan</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- PETA 3 LOKASI WISATA TELE + EFRATA + SIHOTANG -->
<div style="width:100%; height:500px;">
    <iframe
        width="100%"
        height="100%"
        style="border:0; border-radius:15px;"
        loading="lazy"
        allowfullscreen
        src="https://www.google.com/maps?q=Tele+Samosir+Sumatera+Utara&z=11&output=embed">
    </iframe>
</div>

<!-- TOMBOL LIHAT 3 LOKASI -->
<div style="margin-top:20px; text-align:center;">

    <a href="https://www.google.com/maps/search/Tele+Samosir" target="_blank"
       style="padding:10px 18px; background:#0d6efd; color:white; text-decoration:none; border-radius:8px; margin:5px;">
       Tele
    </a>

    <a href="https://www.google.com/maps/search/Air+Terjun+Efrata+Samosir" target="_blank"
       style="padding:10px 18px; background:#198754; color:white; text-decoration:none; border-radius:8px; margin:5px;">
       Efrata
    </a>

    <a href="https://www.google.com/maps/search/Sihotang+Samosir" target="_blank"
       style="padding:10px 18px; background:#dc3545; color:white; text-decoration:none; border-radius:8px; margin:5px;">
       Sihotang
    </a>

</div>

<!-- CTA SECTION -->
<section class="py-5" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
    <div class="container text-center">
        <h2 class="display-5 mb-3">Siap Menjelajahi Geosite Danau Toba?</h2>
        <p class="lead mb-4">Rencanakan perjalanan Anda sekarang dan dapatkan pengalaman tak terlupakan!</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <a href="#" class="btn btn-light btn-lg rounded-pill px-5 py-3">
                <i class="fas fa-calendar-alt me-2"></i>Pesan Tiket
            </a>
            <a href="#" class="btn btn-outline-light btn-lg rounded-pill px-5 py-3">
                <i class="fas fa-phone-alt me-2"></i>Hubungi Kami
            </a>
        </div>
    </div>
</section>

<script>
    // ==================== SLIDER BACKGROUND ====================
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const dots = document.querySelectorAll('.dot');
    let slideInterval;
    
    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.remove('active');
            dots[i].classList.remove('active');
        });
        
        slides[index].classList.add('active');
        dots[index].classList.add('active');
        currentSlide = index;
    }
    
    function nextSlide() {
        let next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }
    
    function startSlider() {
        slideInterval = setInterval(nextSlide, 3000);
    }
    
    function stopSlider() {
        clearInterval(slideInterval);
    }
    
    // Event listener untuk dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            stopSlider();
            showSlide(index);
            startSlider();
        });
    });
    
    // Mulai slider
    startSlider();
    
    // Hentikan slider saat hover di hero section
    const heroSection = document.querySelector('.hero-section');
    heroSection.addEventListener('mouseenter', stopSlider);
    heroSection.addEventListener('mouseleave', startSlider);
    
    // ==================== ANIMASI FADE-IN ====================
    const fadeElements = document.querySelectorAll('.fade-in');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    fadeElements.forEach(element => {
        observer.observe(element);
    });
    
    // ==================== COUNTER ANIMATION ====================
    const counters = document.querySelectorAll('.counter');
    
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target'));
                let current = 0;
                const increment = target / 50;
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.innerText = Math.ceil(current);
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCounter();
                counterObserver.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => {
        counterObserver.observe(counter);
    });
    
    // ==================== SMOOTH SCROLL ====================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

@endsection