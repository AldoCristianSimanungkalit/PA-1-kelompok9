@extends('layouts.app')

@section('title', 'Informasi - Geosite Danau Toba')

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

    .info-hero {
        height: 40vh;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url('/image/toba.jpg') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .info-card {
        background: white;
        border-radius: 10px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
    }
    
    .info-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
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
<section class="info-hero">
    <div class="container">
        <h1 class="display-3 fw-bold">Informasi</h1>
        <p class="lead">Informasi lengkap tentang Geosite Danau Toba</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-5">
    <div class="container">
        @forelse($informasi as $item)
        <div class="info-card">
            <div class="row">
                @if($item->gambar)
                <div class="col-md-3">
                    <img src="{{ asset($item->gambar) }}" class="img-fluid rounded" alt="{{ $item->judul }}">
                </div>
                <div class="col-md-9">
                    <h3>{{ $item->judul }}</h3>
                    <div class="text-muted mb-3">
                        <i class="far fa-calendar-alt me-2"></i>{{ $item->created_at->format('d F Y') }}
                        <span class="mx-2">•</span>
                        <i class="far fa-user me-2"></i>{{ $item->penulis }}
                        <span class="mx-2">•</span>
                        <i class="far fa-eye me-2"></i>{{ $item->views }} views
                    </div>
                    <div class="mb-3">
                        <span class="badge bg-primary">{{ $item->kategori }}</span>
                    </div>
                    <p>{{ Str::limit(strip_tags($item->konten), 200) }}</p>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
                @else
                <div class="col-md-12">
                    <h3>{{ $item->judul }}</h3>
                    <div class="text-muted mb-3">
                        <i class="far fa-calendar-alt me-2"></i>{{ $item->created_at->format('d F Y') }}
                        <span class="mx-2">•</span>
                        <i class="far fa-user me-2"></i>{{ $item->penulis }}
                        <span class="mx-2">•</span>
                        <i class="far fa-eye me-2"></i>{{ $item->views }} views
                    </div>
                    <div class="mb-3">
                        <span class="badge bg-primary">{{ $item->kategori }}</span>
                    </div>
                    <p>{{ Str::limit(strip_tags($item->konten), 200) }}</p>
                    <a href="#" class="btn btn-outline-primary btn-sm rounded-pill">Selengkapnya <i class="fas fa-arrow-right ms-2"></i></a>
                </div>
                @endif
            </div>
        </div>
        @empty
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i> Belum ada informasi. Silakan tambah melalui admin panel.
        </div>
        @endforelse
        
        <div class="mt-4 d-flex justify-content-center">
            {{ $informasi->links() }}
        </div>
    </div>
</section>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection