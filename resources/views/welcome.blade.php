<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script type="module" src="https://ajax.googleapis.com/ajax/libs/model-viewer/3.1.1/model-viewer.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    /* Membuat class (aturan) baru untuk gambar carousel kita */
    .carousel-gambar-pas {
        height: 80vh; /* vh adalah viewport height (tinggi layar). 80vh berarti mengambil 80% tinggi layar saat ini */
        object-fit: cover; /* Memastikan gambar menutupi area tanpa terlihat gepeng */
    }

    .kartu-modern {
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Membuat animasi mulus */
    border: none; /* Menghilangkan garis pinggir bawaan agar lebih bersih */
    border-radius: 7px; /* Melengkungkan sudut kartu */
    box-shadow: 0 4px 10px rgba(0,0,0,0.05); /* Bayangan tipis awal */
    overflow: hidden; /* Memastikan gambar mengikuti lengkungan kartu */
  }

  /* Efek saat mouse diarahkan ke kartu */
  .kartu-modern:hover {
    transform: translateY(-10px); /* Mengangkat kartu ke atas sedikit */
    box-shadow: 0 15px 25px rgba(0,0,0,0.15); /* Mempertebal bayangan */
  }

  /* Mengatur tinggi gambar di dalam kartu */
  .gambar-kartu {
    height: 220px;
    object-fit: cover;
  }

  .wadah-chatbot {
    position: fixed;
    bottom: 30px;
    left: 30px; /* Diubah: Sekarang menempel di jarak 30px dari layar KIRI */
    z-index: 1050;
  }

  .tombol-chatbot {
    /* Aturan ukuran bulat (width/height 60px) telah dihapus agar bisa panjang mengikuti teks */
    box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    transition: transform 0.3s;
    font-weight: 600; /* Membuat teks sedikit lebih tebal */
    display: flex;
    align-items: center;
  }

  .tombol-chatbot:hover {
    transform: translateY(-5px); /* Efek saat di-hover: tombol sedikit melayang ke atas */
  }

  .jendela-chat-mini {
    width: 320px;
    display: none;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    margin-bottom: 15px;
    border-radius: 12px;
    overflow: hidden;
  }

  /* --- CSS UNTUK SLIDER REKAN KAMI --- */
  .wadah-slider-rekan {
    overflow-x: auto;          /* Mengaktifkan scroll mendatar jika kontennya melebihi layar */
    scroll-behavior: smooth;   /* Membuat gerakan geser menjadi mulus */
    scrollbar-width: none;     /* Menyembunyikan scrollbar (untuk Firefox) */
  }
  
  /* Menyembunyikan scrollbar (untuk Chrome, Safari, Edge) */
  .wadah-slider-rekan::-webkit-scrollbar {
    display: none;
  }

  .kartu-rekan {
    width: 250px;       /* Lebar setiap kartu */
    flex-shrink: 0;     /* Mencegah kartu menjadi gepeng/mengecil */
    border: none;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    overflow: hidden;
  }

  .foto-rekan {
    height: 250px;
    object-fit: cover; /* Agar foto terpotong rapi membentuk kotak tanpa gepeng */
  }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
            <img src="{{ asset('images/logo.png') }}" alt="Logo" width="6%" height="6%" class="d-inline-block align-text-top">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Portfolio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Order</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>

        <div class="d-flex align-items-center">
                <!-- Ikon Shop -->
                <a href="#" class="text-secondary me-4 fs-3 action-icon">
                    <i class="fas fa-shopping-bag"></i>
                </a>
                
                <!-- Ikon Chat -->
                <a href="#" class="text-secondary me-4 fs-3 action-icon">
                    <i class="fas fa-comment-dots"></i>
                </a>
                
                <!-- Ikon Profile -->
                <a href="#" class="text-secondary fs-3 action-icon">
                    <i class="fas fa-user-circle"></i>
                </a>
            </div>
        </div>
    </div>
    </nav>

    <div id="carouselExampleDark" class="carousel carousel-dark slide mt-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
            <img src="{{ asset('images/1.jpg') }}" class="d-block w-100 carousel-gambar-pas" alt="Gambar 1">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-white">First slide</h5>
                <p class="text-white">Beberapa Desain Kami.</p>
                <button class="btn btn-primary btn-lg px-4" type="button">
                    <i class="fas fa-shopping-cart me-2"></i> Order Now!
                </button>
            </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('images/2.jpg') }}" class="d-block w-100 carousel-gambar-pas" alt="Gambar 2">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-white">Second slide</h5>
                <p class="text-white">Beberapa Model 3D Kami.</p>
                <button class="btn btn-primary btn-lg px-4" type="button">
                    <i class="fas fa-shopping-cart me-2"></i> Order Now!
                </button>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- AREA INFO JASA -->
<!-- AREA INFO JASA -->
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-5 fw-bold">Info Jasa Kami</h2>
    <p class="text-center text-muted mb-5">Kami menyediakan berbagai layanan desain grafis dan desain 3D yang dapat membantu Anda mewujudkan ide kreatif Anda. Pilih layanan yang sesuai dengan kebutuhan Anda dan lihat detail informasinya.</p>
    
    <!-- g-4 memberikan jarak (gap) antar kartu -->
    <div class="row g-4 justify-content-center">
        
        <!-- KARTU 1: DESAIN GRAFIS -->
        <div class="col-md-6">
            <div class="card kartu-modern h-100">
                <img src="{{ asset('images/MBG.png') }}" class="card-img-top gambar-kartu" alt="Desain Grafis">
                <div class="card-body text-center d-flex flex-column">
                    <h4 class="card-title fw-bold mt-2">Desain Grafis</h4>
                    <p class="card-text text-muted mb-4">Layanan pembuatan tata letak antarmuka, pembuatan logo, dan desain poster modern.</p>
                    
                    <!-- Tombol ini memicu (men-trigger) Modal #modalDesain -->
                    <button class="btn btn-outline-primary rounded-pill mt-auto mx-auto px-4" data-bs-toggle="modal" data-bs-target="#modalDesain">
                        Lihat Detail Info <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- KARTU 2: DESAIN 3D -->
        <div class="col-md-6">
            <div class="card kartu-modern h-100">
                <img src="{{ asset('images/coin.png') }}" class="card-img-top gambar-kartu" alt="Desain 3D">
                <div class="card-body text-center d-flex flex-column">
                    <h4 class="card-title fw-bold mt-2">Desain 3D</h4>
                    <p class="card-text text-muted mb-4">Pembuatan aset visual 3D, rendering arsitektur, dan elemen visual yang memukau.</p>
                    
                    <!-- Tombol ini memicu Modal #modal3D -->
                    <button class="btn btn-outline-primary rounded-pill mt-auto mx-auto px-4" data-bs-toggle="modal" data-bs-target="#modal3D">
                        Lihat Detail Info <i class="fas fa-arrow-right ms-2"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="modalDesain" tabindex="-1" aria-labelledby="modalDesainLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- modal-centered agar ke tengah, modal-lg agar ukurannya besar -->
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modalDesainLabel">Detail Jasa Desain Grafis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{ asset('images/p1.png') }}" class="img-fluid rounded mb-3" style="width: 100%; height: 300px; object-fit: cover;" alt="Desain Grafis Header">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in dui mauris. Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary"><i class="fas fa-shopping-cart me-2"></i>Order Sekarang</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal untuk Desain 3D -->
<div class="modal fade" id="modal3D" tabindex="-1" aria-labelledby="modal3DLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold" id="modal3DLabel">Detail Jasa Desain 3D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{ asset('images/ruang_dapur.png') }}" class="img-fluid rounded mb-3" style="width: 100%; height: 300px; object-fit: cover;" alt="Desain 3D Header">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <ul>
            <li>Pembuatan Aset Game</li>
            <li>Visualisasi Produk</li>
            <li>Animasi Pendek</li>
        </ul>
      </div>
      <div class="modal-footer border-0">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary"><i class="fas fa-shopping-cart me-2"></i>Order Sekarang</button>
      </div>
    </div>
  </div>
</div>

<!-- AREA PORTOFOLIO -->
<div class="container mt-5 mb-5">
    <h2 class="text-center mb-5 fw-bold">Portofolio Kami</h2>
    
    <div class="row g-4 justify-content-center">
        
        <!-- KARTU PORTOFOLIO 1: DESAIN (Lebih Besar, menggunakan col-md-8) -->
        <div class="col-md-8">
            <div class="card kartu-modern h-100 p-3 d-flex flex-column">
                
                <!-- Grid untuk 4 Preview Gambar Desain -->
                <div class="row g-2 mb-auto">
                    <div class="col-6">
                        <img src="{{ asset('images/brush_effect.png') }}" class="img-fluid rounded w-100" style="aspect-ratio: 4/3; object-fit: cover;" alt="Preview 1">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/SUN.png') }}" class="img-fluid rounded w-100" style="aspect-ratio: 4/3; object-fit: cover;" alt="Preview 2">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/zam_zam.png') }}" class="img-fluid rounded w-100" style="aspect-ratio: 4/3; object-fit: cover;" alt="Preview 3">
                    </div>
                    <div class="col-6">
                        <img src="{{ asset('images/ripa_ahay.png') }}" class="img-fluid rounded w-100" style="aspect-ratio: 4/3; object-fit: cover;" alt="Preview 4">
                    </div>
                </div>
                
                <!-- Tombol Perbesar -->
                <button class="btn btn-outline-primary mt-3 w-100" data-bs-toggle="modal" data-bs-target="#modalPortoDesain">
                    <i class="fas fa-search-plus me-2"></i> Perbesar
                </button>
                
            </div>
        </div>
        
        <!-- KARTU PORTOFOLIO 2: 3D (Lebih Kecil, menggunakan col-md-4) -->
        <div class="col-md-4">
            <div class="card kartu-modern h-100 p-3 d-flex flex-column">
                
                <!-- 1 Preview Gambar 3D (Bukan 3D aslinya, hanya foto cover) -->
                <img src="{{ asset('images/udin_man.png') }}" class="img-fluid rounded mb-auto w-100" style="height: 100%; object-fit: cover;" alt="Preview 3D">
                
                <!-- Tombol Perbesar -->
                <button class="btn btn-outline-primary mt-3 w-100" data-bs-toggle="modal" data-bs-target="#modalPorto3D">
                    <i class="fas fa-cube me-2"></i> Perbesar 3D
                </button>

                <button class="btn btn-primary mt-2 w-100" data-bs-toggle="modal" data-bs-target="#modalBanyak3D">
                    <i class="fas fa-layer-group me-2"></i> Selengkapnya
                </button>
            </div>
        </div>

    </div>
</div>

<!-- ================= MODAL PORTOFOLIO AREA ================= -->

<!-- Modal Portofolio Desain Grafis -->
<div class="modal fade" id="modalPortoDesain" tabindex="-1" aria-labelledby="modalPortoDesainLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- modal-xl agar sangat lebar -->
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Karya Desain Grafis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Galeri dalam bentuk Grid Bootstrap -->
        <div class="row g-3">
            <div class="col-md-6"><img src="{{ asset('images/brush_effect.png') }}" class="img-fluid rounded w-100"></div>
            <div class="col-md-6"><img src="{{ asset('images/SUN.png') }}" class="img-fluid rounded w-100"></div>
            <div class="col-md-6"><img src="{{ asset('images/zam_zam.png') }}" class="img-fluid rounded w-100"></div>
            <div class="col-md-6"><img src="{{ asset('images/ripa_ahay.png') }}" class="img-fluid rounded w-100"></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Portofolio 3D Interaktif -->
<div class="modal fade" id="modalPorto3D" tabindex="-1" aria-labelledby="modalPorto3DLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Rotasi dan Perbesar Model 3D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body p-0">
        <!-- INILAH KODE UNTUK 3D VIEWER -->
        <!-- Atribut 'camera-controls' mengaktifkan rotasi dan zoom -->
        <!-- Atribut 'auto-rotate' membuat model berputar sendiri jika didiamkan -->
        <model-viewer 
            src="{{ asset('3D/udin_man1.glb') }}" 
            alt="Karya 3D Interaktif Milik Saya" 
            auto-rotate 
            camera-controls 
            style="width: 100%; height: 600px; background-color: #f8f9fa;">
        </model-viewer>
      </div>
    </div>
  </div>
</div>

<!-- Modal Galeri 3D Selengkapnya -->
<div class="modal fade" id="modalBanyak3D" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl"> <!-- modal-xl memberikan ruang super luas -->
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title fw-bold">Galeri Karya 3D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <!-- Isi Modal Galeri -->
      <div class="modal-body p-4 bg-light">
        <div class="row g-4">
            
            <!-- Item 3D ke-1 -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-2">
                    <h6 class="text-center fw-bold mt-2 text-muted">Karya Karakter</h6>
                    <model-viewer 
                        src="{{ asset('3D/udin_man1.glb') }}" 
                        alt="3D Karya 1" 
                        auto-rotate 
                        camera-controls 
                        loading="lazy" 
                        style="width: 100%; height: 350px; background-color: #ffffff; border-radius: 8px;">
                    </model-viewer>
                </div>
            </div>
            
            <!-- Item 3D ke-2 -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-2">
                    <h6 class="text-center fw-bold mt-2 text-muted">Karya Gedung</h6>
                    <!-- Sebagai contoh, ini menggunakan model sepatu bawaan web untuk tes -->
                    <model-viewer 
                        src="{{ asset('3D/tokoblend.glb') }}" 
                        alt="3D Karya 2" 
                        auto-rotate 
                        camera-controls 
                        loading="lazy" 
                        style="width: 100%; height: 350px; background-color: #ffffff; border-radius: 8px;">
                    </model-viewer>
                </div>
            </div>
            
            <!-- Item 3D ke-3 -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-2">
                    <h6 class="text-center fw-bold mt-2 text-muted">Karya Makanan</h6>
                    <model-viewer 
                        src="{{ asset('3D/donat.glb') }}" 
                        alt="3D Karya 3" 
                        auto-rotate 
                        camera-controls 
                        loading="lazy" 
                        style="width: 100%; height: 350px; background-color: #ffffff; border-radius: 8px;">
                    </model-viewer>
                </div>
            </div>
            
            <!-- Item 3D ke-4 -->
            <div class="col-md-6">
                <div class="card border-0 shadow-sm p-2">
                    <h6 class="text-center fw-bold mt-2 text-muted">Karya Abstrak</h6>
                    <model-viewer 
                        src="{{ asset('3D/benderaanimasi.glb') }}" 
                        alt="3D Karya 4" 
                        auto-rotate 
                        camera-controls 
                        loading="lazy" 
                        style="width: 100%; height: 350px; background-color: #ffffff; border-radius: 8px;">
                    </model-viewer>
                </div>
            </div>
            
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ================= AREA WIDGET CHATBOT ================= -->
<!-- ================= AREA WIDGET CHATBOT ================= -->
<!-- Diubah: align-items-start agar semua elemen rata ke kiri -->
<div class="wadah-chatbot d-flex flex-column align-items-start">
    
    <!-- Jendela Chat Mini -->
    <div class="card jendela-chat-mini border-0" id="jendelaChat">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center border-0 p-3">
            <span class="fw-bold"><i class="fas fa-robot me-2"></i> AI Assistant</span>
            <button type="button" class="btn-close btn-close-white text-sm" onclick="bukaTutupChat()"></button>
        </div>
        <div class="card-body bg-light">
            <p class="text-muted small mb-3">Halo! Ingin mendiskusikan desain atau butuh bantuan? Ketik pesanmu di bawah ini.</p>
            
            <form action="halaman-chatbot.html" method="GET">
                <div class="input-group">
                    <input type="text" name="pesan" class="form-control" placeholder="Ketik pesan..." required>
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Tombol Chatbot Bentuk Kapsul/Memanjang -->
    <!-- Diubah: Ditambahkan rounded-pill (bentuk kapsul), px-4 dan py-2 (jarak dalam) -->
    <button class="btn btn-primary tombol-chatbot rounded-pill px-4 py-2" onclick="bukaTutupChat()">
        <!-- Diubah: Ikon robot dengan teks di sebelahnya -->
        <i class="fas fa-robot fs-5 me-2"></i> Tanya AI
    </button>


</div>

<!-- AREA REKAN KAMI -->
<div class="container mt-5 mb-5 position-relative">
    <h2 class="text-center mb-4 fw-bold">Rekan Kami</h2>
    
    <!-- Tombol Geser Kiri (Diletakkan melayang di kiri) -->
    <!-- d-none d-md-block menyembunyikan panah di layar HP karena di HP bisa digeser pakai jari -->
    <button class="btn btn-primary rounded-circle position-absolute top-50 start-0 translate-middle-y shadow d-none d-md-block" id="btnKiri" style="z-index: 10; width: 45px; height: 45px;">
        <i class="fas fa-chevron-left"></i>
    </button>

    <!-- Wadah Kartu yang bisa digeser -->
    <div class="d-flex gap-4 py-3 wadah-slider-rekan" id="sliderRekan">
        
        <!-- DESAINER 1 -->
        <div class="card kartu-rekan">
            <img src="foto-desainer1.jpg" class="card-img-top foto-rekan" alt="Desainer 1">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold mb-1">Nama Desainer 1</h5>
                <span class="badge bg-primary">Desainer Grafis</span>
            </div>
        </div>

        <!-- DESAINER 2 -->
        <div class="card kartu-rekan">
            <img src="foto-desainer2.jpg" class="card-img-top foto-rekan" alt="Desainer 2">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold mb-1">Nama Desainer 2</h5>
                <span class="badge bg-primary">Desainer Grafis</span>
            </div>
        </div>

        <!-- DESAINER 3 -->
        <div class="card kartu-rekan">
            <img src="foto-desainer3.jpg" class="card-img-top foto-rekan" alt="Desainer 3">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold mb-1">Nama Desainer 3</h5>
                <span class="badge bg-info">Desainer UI/UX</span>
            </div>
        </div>

        <!-- DESAINER 4 -->
        <div class="card kartu-rekan">
            <img src="foto-desainer4.jpg" class="card-img-top foto-rekan" alt="Desainer 4">
            <div class="card-body text-center">
                <h5 class="card-title fw-bold mb-1">Nama Desainer 4</h5>
                <span class="badge bg-primary">Desainer 3D</span>
            </div>
        </div>

        <!-- PEMILIK PROYEK 1 -->
        <div class="card kartu-rekan">
            <img src="foto-owner1.jpg" class="card-img-top foto-rekan" alt="Pemilik 1">
            <div class="card-body text-center bg-light">
                <h5 class="card-title fw-bold mb-1">Nama Pemilik 1</h5>
                <span class="badge bg-dark">Pemilik Proyek</span>
            </div>
        </div>

        <!-- PEMILIK PROYEK 2 -->
        <div class="card kartu-rekan">
            <img src="foto-owner2.jpg" class="card-img-top foto-rekan" alt="Pemilik 2">
            <div class="card-body text-center bg-light">
                <h5 class="card-title fw-bold mb-1">Nama Pemilik 2</h5>
                <span class="badge bg-dark">Pemilik Proyek</span>
            </div>
        </div>

    </div>

    <!-- Tombol Geser Kanan (Diletakkan melayang di kanan) -->
    <button class="btn btn-primary rounded-circle position-absolute top-50 end-0 translate-middle-y shadow d-none d-md-block" id="btnKanan" style="z-index: 10; width: 45px; height: 45px;">
        <i class="fas fa-chevron-right"></i>
    </button>
</div>

<!-- ================= FOOTER AREA ================= -->
<!-- mt-5 memberi jarak atas, pt-5 pb-4 memberi ruang di dalam footer -->
<footer class="bg-dark text-white pt-5 pb-4 mt-5">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">
            
            <!-- Kolom 1: Info Brand/Deskripsi -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold text-primary">Nama Brand-mu</h5>
                <p>Kami adalah tim kreatif yang berdedikasi untuk memberikan solusi desain grafis dan visualisasi 3D terbaik untuk kebutuhan bisnis dan proyek Anda.</p>
            </div>

            <!-- Kolom 2: Tautan Cepat Menu -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold">Menu Cepat</h5>
                <p><a href="#" class="text-white text-decoration-none">Beranda</a></p>
                <p><a href="#" class="text-white text-decoration-none">Info Jasa</a></p>
                <p><a href="#" class="text-white text-decoration-none">Portofolio</a></p>
                <p><a href="#" class="text-white text-decoration-none">Rekan Kami</a></p>
            </div>

            <!-- Kolom 3: Alamat & Kontak -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold">Kontak & Alamat</h5>
                <p><i class="fas fa-home me-3 text-primary"></i> Jl. Contoh Alamat No. 123, Kota, Negara</p>
                <p><i class="fas fa-envelope me-3 text-primary"></i> email@contoh.com</p>
                <p><i class="fas fa-phone me-3 text-primary"></i> +62 812 3456 7890</p>
            </div>

            <!-- Kolom 4: Sosial Media -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold">Ikuti Kami</h5>
                
                <!-- Ikon Sosial Media menggunakan Font Awesome -->
                <!-- btn-outline-light membuat tombol transparan dengan garis putih -->
                <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" style="width: 40px; height: 40px; line-height: 25px;"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" style="width: 40px; height: 40px; line-height: 25px;"><i class="fab fa-twitter"></i></a>
                <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" style="width: 40px; height: 40px; line-height: 25px;"><i class="fab fa-instagram"></i></a>
                <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" style="width: 40px; height: 40px; line-height: 25px;"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" style="width: 40px; height: 40px; line-height: 25px;"><i class="fab fa-github"></i></a>
                <a href="#" class="btn btn-outline-light btn-floating m-1 rounded-circle" style="width: 40px; height: 40px; line-height: 25px;"><i class="fab fa-dribbble"></i></a>
            </div>
            
        </div>
        
        <!-- Garis pembatas horizontal -->
        <hr class="mb-4 mt-4 border-secondary">
        
        <!-- Bagian Copyright -->
        <div class="row align-items-center text-center">
            <div class="col-12">
                <p class="mb-0"> Copyright ©2026 All rights reserved by: 
                    <a href="#" class="text-decoration-none text-primary fw-bold">Nama Brand-mu</a>
                </p>
            </div>
        </div>
        
    </div>
</footer>

<script>
    // Fungsi ini dipanggil ketika tombol bulat atau tombol silang (X) ditekan
    function bukaTutupChat() {
        // Mencari elemen jendela chat berdasarkan ID-nya
        const jendela = document.getElementById('jendelaChat');
        
        // Mengecek apakah saat ini jendela sedang disembunyikan
        if (jendela.style.display === 'none' || jendela.style.display === '') {
            jendela.style.display = 'block'; // Tampilkan jendela
        } else {
            jendela.style.display = 'none';  // Sembunyikan jendela
        }
    }
</script>

<script>
    // --- JAVASCRIPT UNTUK SLIDER REKAN KAMI ---
    
    // Mengambil elemen-elemen yang dibutuhkan
    const slider = document.getElementById('sliderRekan');
    const btnKiri = document.getElementById('btnKiri');
    const btnKanan = document.getElementById('btnKanan');

    // Angka 300 adalah jarak piksel seberapa jauh layar akan bergeser dalam satu kali klik
    const jarakGeser = 300; 

    // Jika tombol kanan diklik, geser layarnya ke kanan (+)
    btnKanan.onclick = function() {
        slider.scrollBy({ left: jarakGeser, behavior: 'smooth' });
    };

    // Jika tombol kiri diklik, geser layarnya ke kiri (-)
    btnKiri.onclick = function() {
        slider.scrollBy({ left: -jarakGeser, behavior: 'smooth' });
    };
</script>
</body>
</html>