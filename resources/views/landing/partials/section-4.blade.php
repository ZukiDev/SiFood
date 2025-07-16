<section class="section landing-video-intro section-bg" id="video-intro">
    <div class="container text-center">
        <p class="fs-12 fw-semibold text-success mb-1">
            <span class="landing-section-heading">Video Tutorial</span>
        </p>
        <div class="landing-title"></div>
        <h3 class="fw-semibold mb-2">Pelajari bagaimana cara penggunaannya</h3>
        <div class="row justify-content-center">
            <div class="col-xl-7">
                <p class="text-muted fs-15 mb-5 fw-normal">
                    Tonton tutorial lengkap ini untuk memulai fitur kami dan temukan tempat kuliner.
                </p>
            </div>
        </div>

        <!-- Video Container -->
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-10">
                <div class="card custom-card shadow-sm">
                    <div class="card-body p-0">
                        <div class="ratio ratio-16x9">
                            <video controls class="w-100 h-100"
                                poster="{{ asset('assets/images/video-thumbnail.jpg') }}" preload="metadata">
                                <source src="{{ asset('storage/videos/tutorial-video.mp4') }}" type="video/mp4">
                                <source src="{{ asset('storage/videos/tutorial-video.webm') }}" type="video/webm">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                </div>

                <!-- Video Description -->
                {{-- <div class="mt-4">
                    <h5 class="fw-semibold mb-2">Getting Started with Our Product</h5>
                    <p class="text-muted fs-14 mb-3">
                        This tutorial covers everything you need to know to get started, including setup, basic
                        features, and advanced tips.
                    </p>
                    <div class="d-flex justify-content-center gap-3">
                        <span class="badge bg-primary-transparent">
                            <i class="ri-play-circle-line me-1"></i>
                            Duration: 5 minutes
                        </span>
                        <span class="badge bg-success-transparent">
                            <i class="ri-user-line me-1"></i>
                            Beginner Friendly
                        </span>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
