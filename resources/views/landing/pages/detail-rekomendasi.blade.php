@extends('layouts.landing')

@section('content')
    <div class="landing-banner h-100" id="detail">
        <section class="section">
            <div class="container main-banner-container">
                <div class="row justify-content-center">
                    <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-10">
                        <div class="py-5 pb-lg-0">
                            <div class="mb-3 text-center">
                                <h5 class="fw-semibold text-fixed-white op-9">Detail Tempat Kuliner</h5>
                            </div>
                            <p class="landing-banner-heading mb-3 text-center">
                                {{ $tempat->nama }}
                            </p>
                            <div class="fs-16 mb-5 text-fixed-white op-7 text-center">
                                {{ $tempat->kategori->nama_kategori }} • {{ $tempat->alamat }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-md-5 text-center mb-4 mb-md-0">
                                    <img src="{{ asset('assets/images/default/foto-tempat.png') }}"
                                        alt="{{ $tempat->nama }}" class="img-fluid rounded-3" style="max-height: 300px;">
                                </div>
                                <div class="col-lg-8 col-md-7">
                                    <h4 class="mb-3">{{ $tempat->nama }}</h4>
                                    <div class="d-flex flex-wrap align-items-center mb-4">
                                        <span
                                            class="badge bg-primary me-2 mb-1">{{ $tempat->kategori->nama_kategori }}</span>
                                        {{-- @if ($tempat->preferensi && $tempat->preferensi->rating_google)
                                            <span class="badge bg-success me-2 mb-1">
                                                <i class="fe fe-star me-1"></i> {{ $tempat->preferensi->rating_google }}
                                                Google
                                            </span>
                                        @endif --}}
                                    </div>

                                    <h6 class="fs-16 mb-2">Alamat:</h6>
                                    <p class="text-muted mb-4">{{ $tempat->alamat }}</p>

                                    @if ($tempat->preferensi)
                                        <div class="row mb-4">
                                            @if ($tempat->preferensi->jumlah_makanan > 0)
                                                <div class="col-6 col-sm-4 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span
                                                                class="avatar avatar-sm rounded-circle bg-primary-transparent">
                                                                <i class="ri-restaurant-2-line"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="d-block text-muted fs-12">Jumlah Makanan</span>
                                                            <span
                                                                class="fw-semibold">{{ $tempat->preferensi->jumlah_makanan }}
                                                                item</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($tempat->preferensi->jumlah_minuman > 0)
                                                <div class="col-6 col-sm-4 mb-3">
                                                    <div class="d-flex align-items-center">
                                                        <div class="me-2">
                                                            <span
                                                                class="avatar avatar-sm rounded-circle bg-info-transparent">
                                                                <i class="ri-cup-line"></i>
                                                            </span>
                                                        </div>
                                                        <div>
                                                            <span class="d-block text-muted fs-12">Jumlah Minuman</span>
                                                            <span
                                                                class="fw-semibold">{{ $tempat->preferensi->jumlah_minuman }}
                                                                item</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <h6 class="fs-16 mb-3">Rating Platform:</h6>
                                        <div class="row mb-4">
                                            @if ($tempat->preferensi->rating_google)
                                                <div class="col-6 col-sm-3 mb-2">
                                                    <div class="p-2 border rounded bg-light">
                                                        <h6 class="mb-1 fs-14">Google</h6>
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-warning me-1">
                                                                <i class="ri-star-fill"></i>
                                                            </div>
                                                            <span
                                                                class="fw-semibold">{{ $tempat->preferensi->rating_google }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($tempat->preferensi->rating_gofood)
                                                <div class="col-6 col-sm-3 mb-2">
                                                    <div class="p-2 border rounded bg-light">
                                                        <h6 class="mb-1 fs-14">GoFood</h6>
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-success me-1">
                                                                <i class="ri-star-fill"></i>
                                                            </div>
                                                            <span
                                                                class="fw-semibold">{{ $tempat->preferensi->rating_gofood }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($tempat->preferensi->rating_shopeefood)
                                                <div class="col-6 col-sm-3 mb-2">
                                                    <div class="p-2 border rounded bg-light">
                                                        <h6 class="mb-1 fs-14">ShopeeFood</h6>
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-danger me-1">
                                                                <i class="ri-star-fill"></i>
                                                            </div>
                                                            <span
                                                                class="fw-semibold">{{ $tempat->preferensi->rating_shopeefood }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if ($tempat->preferensi->rating_grabfood)
                                                <div class="col-6 col-sm-3 mb-2">
                                                    <div class="p-2 border rounded bg-light">
                                                        <h6 class="mb-1 fs-14">GrabFood</h6>
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-primary me-1">
                                                                <i class="ri-star-fill"></i>
                                                            </div>
                                                            <span
                                                                class="fw-semibold">{{ $tempat->preferensi->rating_grabfood }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <h6 class="fs-16 mb-3">Pesan Online:</h6>
                                        <div class="d-flex flex-wrap gap-2">
                                            @if ($tempat->preferensi->link_gmaps)
                                                <a href="{{ $tempat->preferensi->link_gmaps }}" target="_blank"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fe fe-map-pin me-1"></i> Google Maps
                                                </a>
                                            @endif

                                            @if ($tempat->preferensi->link_gofood)
                                                <a href="{{ $tempat->preferensi->link_gofood }}" target="_blank"
                                                    class="btn btn-sm btn-outline-success">
                                                    <i class="fe fe-shopping-cart me-1"></i> GoFood
                                                </a>
                                            @endif

                                            @if ($tempat->preferensi->link_shopeefood)
                                                <a href="{{ $tempat->preferensi->link_shopeefood }}" target="_blank"
                                                    class="btn btn-sm btn-outline-danger">
                                                    <i class="fe fe-shopping-cart me-1"></i> ShopeeFood
                                                </a>
                                            @endif

                                            @if ($tempat->preferensi->link_grabfood)
                                                <a href="{{ $tempat->preferensi->link_grabfood }}" target="_blank"
                                                    class="btn btn-sm btn-outline-warning">
                                                    <i class="fe fe-shopping-cart me-1"></i> GrabFood
                                                </a>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if ($tempat->menu && $tempat->menu->count() > 0)
        <section class="section section-bg" id="menu">
            <div class="container">
                <p class="fs-12 fw-semibold text-success mb-1 text-center">
                    <span class="landing-section-heading">Menu</span>
                </p>
                <div class="landing-title"></div>
                <h3 class="fw-semibold mb-2 text-center">Menu di {{ $tempat->nama }}</h3>
                <div class="row justify-content-center mb-4">
                    <div class="col-xl-8">
                        <p class="text-muted fs-15 mb-3 fw-normal text-center">
                            Berikut adalah daftar menu yang tersedia di {{ $tempat->nama }}.
                        </p>
                    </div>
                </div>
                <div class="row justify-content-center g-4">
                    @foreach ($tempat->menu as $menu)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="card h-100 text-center p-3 shadow-sm">
                                <img src="{{ asset('assets/images/logo-default.png') }}" alt="{{ $menu->nama_menu }}"
                                    class="img-fluid rounded mb-3" style="max-height: 180px; object-fit: contain;">
                                <h5 class="fw-semibold">{{ $menu->nama_menu }}</h5>
                                @if ($menu->deskripsi)
                                    <p class="text-muted mb-0">{{ $menu->deskripsi }}</p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @php
        // Filter menu berdasarkan deskripsi yang mengandung kata "makanan" atau "minuman"
        $makanan = $tempat->menu->filter(function ($menu) {
            return stripos($menu->deskripsi, 'makanan') !== false;
        });

        $minuman = $tempat->menu->filter(function ($menu) {
            return stripos($menu->deskripsi, 'minuman') !== false;
        });

        // Menu yang tidak teridentifikasi sebagai makanan atau minuman
        $lainnya = $tempat->menu->filter(function ($menu) {
            return stripos($menu->deskripsi, 'makanan') === false && stripos($menu->deskripsi, 'minuman') === false;
        });
    @endphp

    @if ($tempat->menu && $tempat->menu->count() > 0)
        <section class="section section-bg" id="menu">
            <div class="container">
                <p class="fs-12 fw-semibold text-success mb-1 text-center">
                    <span class="landing-section-heading">Menu</span>
                </p>
                <div class="landing-title"></div>
                <h3 class="fw-semibold mb-2 text-center">Menu di {{ $tempat->nama }}</h3>
                <div class="row justify-content-center mb-4">
                    <div class="col-xl-8">
                        <p class="text-muted fs-15 mb-3 fw-normal text-center">
                            Berikut adalah daftar menu yang tersedia di {{ $tempat->nama }}.
                        </p>
                    </div>
                </div>

                <!-- Makanan Section -->
                @if ($makanan->count() > 0)
                    <div class="mb-5">
                        <h4 class="fw-semibold mb-4 text-center">
                            <i class="ri-restaurant-2-line me-2"></i> Makanan
                        </h4>
                        <div class="row justify-content-center g-4">
                            @foreach ($makanan as $menu)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="card h-100 text-center p-3 shadow-sm">
                                        <img src="{{ asset('assets/images/logo-default.png') }}"
                                            alt="{{ $menu->nama_menu }}" class="img-fluid rounded mb-3"
                                            style="max-height: 180px; object-fit: contain;">
                                        <h5 class="fw-semibold">{{ $menu->nama_menu }}</h5>
                                        @if ($menu->deskripsi)
                                            <p class="text-muted mb-0">
                                                {{ str_replace(['makanan', 'Makanan'], '', $menu->deskripsi) }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Minuman Section -->
                @if ($minuman->count() > 0)
                    <div class="mb-5">
                        <h4 class="fw-semibold mb-4 text-center">
                            <i class="ri-cup-line me-2"></i> Minuman
                        </h4>
                        <div class="row justify-content-center g-4">
                            @foreach ($minuman as $menu)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="card h-100 text-center p-3 shadow-sm">
                                        <img src="{{ asset('assets/images/logo-default.png') }}"
                                            alt="{{ $menu->nama_menu }}" class="img-fluid rounded mb-3"
                                            style="max-height: 180px; object-fit: contain;">
                                        <h5 class="fw-semibold">{{ $menu->nama_menu }}</h5>
                                        @if ($menu->deskripsi)
                                            <p class="text-muted mb-0">
                                                {{ str_replace(['minuman', 'Minuman'], '', $menu->deskripsi) }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Menu Lainnya -->
                @if ($lainnya->count() > 0)
                    <div>
                        <h4 class="fw-semibold mb-4 text-center">
                            <i class="ri-restaurant-line me-2"></i> Menu Lainnya
                        </h4>
                        <div class="row justify-content-center g-4">
                            @foreach ($lainnya as $menu)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="card h-100 text-center p-3 shadow-sm">
                                        <img src="{{ asset('assets/images/logo-default.png') }}"
                                            alt="{{ $menu->nama_menu }}" class="img-fluid rounded mb-3"
                                            style="max-height: 180px; object-fit: contain;">
                                        <h5 class="fw-semibold">{{ $menu->nama_menu }}</h5>
                                        @if ($menu->deskripsi)
                                            <p class="text-muted mb-0">{{ $menu->deskripsi }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @else
        <section class="section section-bg" id="menu">
            <div class="container">
                <p class="fs-12 fw-semibold text-success mb-1 text-center">
                    <span class="landing-section-heading">Menu</span>
                </p>
                <div class="landing-title"></div>
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="alert alert-info text-center py-4">
                            <i class="ri-information-line fs-3 mb-3 d-block"></i>
                            <h5>Belum Ada Menu</h5>
                            <p class="mb-0">Informasi menu untuk tempat kuliner ini belum tersedia. Silakan kunjungi
                                langsung atau pesan melalui platform online untuk melihat menu terbaru.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">
                        <i class="fe fe-arrow-left me-1"></i> Kembali ke Hasil Rekomendasi
                    </a>
                    <a href="{{ route('preferensi.index') }}" class="btn btn-info ms-2">
                        <i class="fe fe-refresh me-1"></i> Cari Rekomendasi Baru
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
