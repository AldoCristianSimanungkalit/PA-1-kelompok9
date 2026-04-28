@extends('layouts.app')

@section('title', 'Berita - Geosite Danau Toba')

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

    .berita-hero {
        height: 40vh;
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), url('/image/toba.jpg') center/cover;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    
    .berita-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
    }
    
    .berita-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 20px rgba(0,0,0,0.15);
    }
    
    .berita-img {
        height: 200px;
        width: 100%;
        object-fit: cover;
    }
    
    .berita-category {
        position: absolute;
        top: 15px;
        left: 15px;
        background: #007bff;
        color: white;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
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
<section class="berita-hero">
    <div class="container">
        <h1 class="display-3 fw-bold">Berita & Event</h1>
        <p class="lead">Informasi terbaru seputar Geosite Danau Toba</p>
    </div>
</section>

<!-- Content Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                @forelse($berita as $item)
                <div class="berita-card mb-4">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="position-relative">
                                <img src="{{ asset($item->gambar) }}" class="berita-img" alt="{{ $item->judul }}">
                                <span class="berita-category">{{ $item->kategori->nama ?? 'Umum' }}</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-4">
                                <div class="text-muted mb-2">
                                    <i class="far fa-calendar-alt me-2"></i>{{ $item->tanggal_terbit->format('d F Y') }}
                                    <span class="mx-2">•</span>
                                    <i class="far fa-user me-2"></i>{{ $item->penulis }}
                                    <span class="mx-2">•</span>
                                    <i class="far fa-eye me-2"></i>{{ $item->views }} views
                                </div>
                                <h3>{{ $item->judul }}</h3>
                                <p>{{ Str::limit(strip_tags($item->konten), 150) }}</p>
                                <a href="{{ route('berita.detail', $item->slug) }}" class="btn btn-primary btn-sm rounded-pill">
                                    Baca Selengkapnya <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="alert alert-info">Belum ada berita. Silakan tambah melalui admin panel.</div>
                @endforelse
                
                <div class="mt-4">
                    {{ $berita->links() }}
                </div>
            </div>
            
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body">
                        <h5 class="mb-3">Kategori</h5>
                        <ul class="list-unstyled">
                            @foreach($kategori as $item)
                            <li class="mb-2">
                                <a href="#" class="text-decoration-none">{{ $item->nama }}</a>
                                <span class="badge bg-secondary float-end">{{ $item->berita->count() }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
@endsection