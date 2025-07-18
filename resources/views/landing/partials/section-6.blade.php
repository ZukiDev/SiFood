<section class="section landing-video-intro position-relative" id="video-intro"
    style="background: linear-gradient(135deg, rgba(0,0,0,0.8), rgba(0,0,0,0.6)), url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80'); background-size: cover; background-position: center; background-attachment: fixed;">
    <div class="container text-center">
        <p class="fs-12 fw-semibold text-success mb-1">
            <span class="landing-section-heading text-fixed-white">🎥 Video Tutorial</span>
        </p>
        <div class="landing-title"></div>
        <h3 class="fw-semibold mb-2 text-fixed-white">Panduan Lengkap Menemukan Kuliner Terbaik</h3>
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <p class="text-fixed-white op-8 fs-15 mb-5 fw-normal">
                    Dalam 1 menit, Anda akan menguasai semua fitur SiFood dan siap menemukan tempat kuliner impian!
                    Tonton tutorial interaktif ini dan mulai petualangan kuliner Anda.
                </p>
            </div>
        </div>

        <!-- Video Container -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="position-relative">
                    <!-- Decorative elements -->
                    <div class="position-absolute top-0 start-0 translate-middle">
                        <div class="bg-success rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 60px; height: 60px;">
                            <i class="ri-play-circle-line fs-2 text-white"></i>
                        </div>
                    </div>
                    <div class="position-absolute top-0 end-0 translate-middle">
                        <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 40px; height: 40px;">
                            <i class="ri-star-fill fs-5 text-white"></i>
                        </div>
                    </div>

                    <div class="card custom-card shadow-lg border-0 overflow-hidden">
                        <div class="card-body p-0 position-relative">
                            <!-- Video overlay with play button -->
                            {{-- <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                                style="background: rgba(0,0,0,0.3); z-index: 10;">
                                <div class="text-center">
                                    <div class="bg-white bg-opacity-90 rounded-circle d-inline-flex align-items-center justify-content-center mb-3 shadow-lg"
                                        style="width: 80px; height: 80px;">
                                        <i class="ri-play-fill fs-1 text-success" style="margin-left: 5px;"></i>
                                    </div>
                                    <h5 class="text-white fw-bold mb-2">Tonton Tutorial</h5>
                                    <p class="text-white-50 small mb-0">Durasi: 1 menit</p>
                                </div>
                            </div> --}}

                            <div class="ratio ratio-16x9">
                                <video controls class="w-100 h-100 rounded"
                                    poster="{{ asset('assets/images/video-thumbnail.jpg') }}" preload="metadata">
                                    <source src="{{ asset('storage/videos/tutorial-video.mp4') }}" type="video/mp4">
                                    <source src="{{ asset('storage/videos/tutorial-video.webm') }}" type="video/webm">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Video hover effects */
    .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease;
    }

    /* Play button animation */
    .ri-play-fill {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }

        100% {
            transform: scale(1);
        }
    }

    /* Floating animation for decorative elements */
    .position-absolute .bg-success,
    .position-absolute .bg-warning {
        animation: float 3s ease-in-out infinite;
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0px);
        }

        50% {
            transform: translateY(-10px);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {

        .position-absolute .bg-success,
        .position-absolute .bg-warning {
            display: none;
        }
    }
</style>
