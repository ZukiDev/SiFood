<section class="section section-bg" id="statistics">
    <div class="container text-center">
        <p class="fs-12 fw-semibold text-success mb-1">
            <span class="landing-section-heading">Statistik SiFood</span>
        </p>
        <div class="landing-title"></div>
        <h3 class="fw-semibold mb-2">Jelajahi Dunia Kuliner Sidoarjo Lewat Data</h3>
        <div class="row justify-content-center mb-5">
            <div class="col-xl-7">
                <p class="text-muted fs-15 mb-0 fw-normal">
                    SiFood telah membantu {{ number_format($statistics['pengguna']) }} pengguna menemukan tempat makan
                    favorit mereka, dari warung legendaris
                    hingga restoran kekinian.
                </p>
            </div>
        </div>
        <div class="row g-2 justify-content-center">
            <div class="col-xl-12">
                <div class="row justify-content-evenly">
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="p-3 text-center rounded-2 bg-white border">
                            <span class="mb-3 avatar avatar-lg rounded-2 bg-primary-transparent">
                                <i class='fs-20 fe fe-map-pin'></i>
                            </span>
                            <h3 class="fw-semibold mb-0 text-dark">{{ number_format($statistics['tempat_kuliner']) }}+
                            </h3>
                            <p class="mb-1 fs-14 op-7 text-muted">Tempat Kuliner Terdaftar</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="p-3 text-center rounded-2 bg-white border">
                            <span class="mb-3 avatar avatar-lg rounded-2 bg-primary-transparent">
                                <i class='fs-20 fe fe-user'></i>
                            </span>
                            <h3 class="fw-semibold mb-0 text-dark">{{ number_format($statistics['pengguna']) }}+</h3>
                            <p class="mb-1 fs-14 op-7 text-muted">Pengguna yang Telah Mencoba</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="p-3 text-center rounded-2 bg-white border">
                            <span class="mb-3 avatar avatar-lg rounded-2 bg-primary-transparent">
                                <i class='fs-20 fe fe-thumbs-up'></i>
                            </span>
                            <h3 class="fw-semibold mb-0 text-dark">{{ number_format($statistics['menu']) }}+</h3>
                            <p class="mb-1 fs-14 op-7 text-muted">Menu Kuliner Tersedia</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-3">
                        <div class="p-3 text-center rounded-2 bg-white border">
                            <span class="mb-3 avatar avatar-lg rounded-2 bg-primary-transparent">
                                <i class='fs-20 fe fe-activity'></i>
                            </span>
                            <h3 class="fw-semibold mb-0 text-dark">{{ $statistics['kriteria'] }} Kriteria</h3>
                            <p class="mb-1 fs-14 op-7 text-muted">Untuk Penilaian Objektif</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
