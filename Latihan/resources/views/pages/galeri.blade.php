@extends('layouts.app')

@section('title', 'Galeri - Geosite Danau Toba')

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

    .galeri-hero {
        height: 40vh;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url('/image/toba.jpg') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        cursor: pointer;
        margin-bottom: 1.5rem;
    }
    
    .gallery-img {
        width: 100%;
        height: 250px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    
    .gallery-overlay {
        position: absolute;
        bottom: -100%;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
        color: white;
        padding: 20px;
        transition: bottom 0.3s ease;
    }
    
    .gallery-item:hover .gallery-overlay {
        bottom: 0;
    }
    
    .gallery-item:hover .gallery-img {
        transform: scale(1.1);
    }
</style>
    
    <div class="logo-divider"></div>
    
    <!-- LOGO 3: GEOTOBA (PALING KANAN) -->
    <div class="geotoba-wrapper">
        <i class="fas fa-mountain geotoba-icon"></i>
        <div style="display: flex; flex-direction: column; line-height: 1.2;">
            <span class="geotoba-text">GEOTOBA</span>
            <span class="geotoba-sub">Geopark Danau Toba</span>
        </div>
    </div>
    
</div>

<!-- Hero Section -->
<section class="galeri-hero">
    <div class="container">
        <h1 class="display-3 fw-bold">Galeri Wisata</h1>
        <p class="lead">Keindahan Geosite Danau Toba</p>
    </div>
</section>

<!-- Gallery Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            @forelse($galeri as $item)
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="gallery-item">
                    <img src="{{ asset($item->gambar) }}" class="gallery-img" alt="{{ $item->judul }}">
                    <div class="gallery-overlay">
                        <h5 class="mb-0">{{ $item->judul }}</h5>
                        <small>{{ $item->kategori }}</small>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p>Belum ada galeri. Silakan tambah melalui admin panel.</p>
            </div>
            @endforelse
        </div>
        
        <div class="mt-4">
            {{ $galeri->links() }}
        </div>
    </div>
</section>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection