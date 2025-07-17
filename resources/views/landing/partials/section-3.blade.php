<section class="section position-relative overflow-hidden" id="statistics"
    style="background: linear-gradient(135deg, rgba(13, 110, 253, 0.1) 0%, rgba(25, 135, 84, 0.1) 50%, rgba(255, 193, 7, 0.1) 100%); backdrop-filter: blur(10px);">
    <!-- Decorative background elements -->
    <div class="position-absolute top-0 start-0 w-100 h-100">
        <div class="position-absolute"
            style="top: 10%; left: 10%; width: 100px; height: 100px; background: rgba(13, 110, 253, 0.1); border-radius: 50%; animation: float 6s ease-in-out infinite;">
        </div>
        <div class="position-absolute"
            style="top: 60%; right: 15%; width: 80px; height: 80px; background: rgba(25, 135, 84, 0.1); border-radius: 50%; animation: float 8s ease-in-out infinite reverse;">
        </div>
        <div class="position-absolute"
            style="bottom: 20%; left: 20%; width: 60px; height: 60px; background: rgba(255, 193, 7, 0.1); border-radius: 50%; animation: float 7s ease-in-out infinite;">
        </div>
    </div>

    <div class="container text-center position-relative">
        <p class="fs-12 fw-semibold text-success mb-1">
            <span class="landing-section-heading">📊 Statistik SiFood</span>
        </p>
        <div class="landing-title"></div>
        <h3 class="fw-semibold mb-2">Pencapaian Luar Biasa dalam Dunia Kuliner Sidoarjo</h3>
        <div class="row justify-content-center mb-5">
            <div class="col-xl-8">
                <p class="text-muted fs-15 mb-0 fw-normal">
                    SiFood telah menjadi partner terpercaya <strong>{{ number_format($statistics['pengguna']) }}+ food
                        lovers</strong> dalam menemukan
                    tempat makan terbaik, dari warung legendaris hingga restoran modern yang instagramable!
                    <span class="text-success fw-bold">Bergabunglah dengan ribuan pengguna yang puas!</span>
                </p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-xl-12">
                <div class="row justify-content-center">
                    <!-- Stat 1 -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <div
                            class="p-4 text-center rounded-3 bg-white border-0 shadow-lg h-100 position-relative overflow-hidden">
                            <div class="position-absolute top-0 start-0 w-100 h-3 bg-gradient"
                                style="background: linear-gradient(90deg, #0d6efd, #6610f2);"></div>
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="ri-restaurant-2-line fs-2 text-primary"></i>
                            </div>
                            <div class="counter-wrapper">
                                <h3 class="fw-bold mb-1 text-primary" style="font-size: 2.5rem;">
                                    {{ number_format($statistics['tempat_kuliner']) }}+</h3>
                            </div>
                            <h6 class="fw-bold text-dark mb-2">🏪 Tempat Kuliner</h6>
                            <p class="mb-0 fs-14 text-muted">Pilihan terlengkap di Sidoarjo</p>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <div
                            class="p-4 text-center rounded-3 bg-white border-0 shadow-lg h-100 position-relative overflow-hidden">
                            <div class="position-absolute top-0 start-0 w-100 h-3 bg-gradient"
                                style="background: linear-gradient(90deg, #198754, #20c997);"></div>
                            <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="ri-user-heart-line fs-2 text-success"></i>
                            </div>
                            <div class="counter-wrapper">
                                <h3 class="fw-bold mb-1 text-success" style="font-size: 2.5rem;">
                                    {{ number_format($statistics['pengguna']) }}+</h3>
                            </div>
                            <h6 class="fw-bold text-dark mb-2">👥 Happy Customers</h6>
                            <p class="mb-0 fs-14 text-muted">Pengguna yang puas dengan rekomendasi</p>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <div
                            class="p-4 text-center rounded-3 bg-white border-0 shadow-lg h-100 position-relative overflow-hidden">
                            <div class="position-absolute top-0 start-0 w-100 h-3 bg-gradient"
                                style="background: linear-gradient(90deg, #ffc107, #fd7e14);"></div>
                            <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="ri-bowl-line fs-2 text-warning"></i>
                            </div>
                            <div class="counter-wrapper">
                                <h3 class="fw-bold mb-1 text-warning" style="font-size: 2.5rem;">
                                    {{ number_format($statistics['menu']) }}+</h3>
                            </div>
                            <h6 class="fw-bold text-dark mb-2">🍜 Menu Kuliner</h6>
                            <p class="mb-0 fs-14 text-muted">Variasi menu untuk setiap selera</p>
                        </div>
                    </div>

                    <!-- Stat 4 -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                        <div
                            class="p-4 text-center rounded-3 bg-white border-0 shadow-lg h-100 position-relative overflow-hidden">
                            <div class="position-absolute top-0 start-0 w-100 h-3 bg-gradient"
                                style="background: linear-gradient(90deg, #0dcaf0, #6f42c1);"></div>
                            <div class="bg-info bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                                style="width: 70px; height: 70px;">
                                <i class="ri-award-line fs-2 text-info"></i>
                            </div>
                            <div class="counter-wrapper">
                                <h3 class="fw-bold mb-1 text-info" style="font-size: 2.5rem;">
                                    {{ $statistics['kriteria'] }}</h3>
                            </div>
                            <h6 class="fw-bold text-dark mb-2">🎯 Kriteria Penilaian</h6>
                            <p class="mb-0 fs-14 text-muted">Standar objektif untuk rekomendasi terbaik</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="row justify-content-center mt-5">
            <div class="col-xl-10">
                <div class="bg-white bg-opacity-50 rounded-3 p-4 backdrop-filter-blur">
                    <div class="row align-items-center">
                        <div class="col-md-8 text-md-start text-center mb-3 mb-md-0">
                            <h5 class="fw-bold text-dark mb-2">🚀 Siap Menemukan Kuliner Favoritmu?</h5>
                            <p class="text-muted mb-0">Bergabunglah dengan ribuan pengguna yang sudah merasakan
                                kemudahan menemukan tempat makan terbaik!</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <a href="#fitur" class="btn btn-success btn-lg px-4 py-2 rounded-pill fw-bold shadow-lg">
                                <i class="ri-search-2-line me-2"></i>
                                Mulai Pencarian
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Background floating animation */
    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-20px);
        }
    }

    /* Card hover effects */
    .shadow-lg:hover {
        transform: translateY(-8px);
        transition: all 0.4s ease;
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.2) !important;
    }

    /* Counter animation effect */
    .counter-wrapper h3 {
        animation: counterPulse 2s ease-in-out infinite;
    }

    @keyframes counterPulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }
    }

    /* Gradient border animation */
    .bg-gradient::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% {
            left: -100%;
        }

        100% {
            left: 100%;
        }
    }

    /* Backdrop filter for modern glass effect */
    .backdrop-filter-blur {
        backdrop-filter: blur(10px);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .counter-wrapper h3 {
            font-size: 2rem !important;
        }

        .position-absolute[style*="top: 10%"] {
            display: none;
        }
    }
</style>
