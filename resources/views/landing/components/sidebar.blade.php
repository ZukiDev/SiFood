<aside class="app-sidebar sticky" id="sidebar">

    <div class="container p-0">
        <!-- Start::main-sidebar -->
        <div class="main-sidebar">

            <!-- Start::nav -->
            <nav class="main-menu-container nav nav-pills sub-open">
                <div class="landing-logo-container">
                    <div class="horizontal-logo">
                        <a href="/" class="header-logo">
                            <img src="{{ asset('assets/images/brand-logos/full-black.png') }}" alt="logo"
                                class="desktop-logo">
                            <img src="{{ asset('assets/images/brand-logos/full-white.png') }}" alt="logo"
                                class="desktop-white">
                        </a>
                    </div>
                </div>
                <div class="slide-left" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                    </svg></div>
                <ul class="main-menu">
                    <!-- Start::slide -->
                    <li class="slide">
                        <a class="side-menu__item" href="{{ url('/#mulai') }}">
                            <span class="side-menu__label text-black">Mulai</span>
                        </a>
                    </li>
                    <!-- End::slide -->
                    <!-- Start::slide -->
                    <li class="slide">
                        <a href="{{ url('/#kategori') }}" class="side-menu__item">
                            <span class="side-menu__label text-black">Kategori</span>
                        </a>
                    </li>
                    <!-- End::slide -->
                    <!-- Start::slide -->
                    <li class="slide">
                        <a href="{{ url('/#kriteria') }}" class="side-menu__item">
                            <span class="side-menu__label text-black">Kriteria</span>
                        </a>
                    </li>
                    <!-- End::slide -->
                    <!-- Start::slide -->
                    <li class="slide">
                        <a href="{{ url('/#tentang') }}" class="side-menu__item">
                            <span class="side-menu__label text-black">Tentang</span>
                        </a>
                    </li>
                    <!-- End::slide -->
                    <!-- Start::slide -->
                    <li class="slide">
                        <a href="{{ url('/#kontak') }}" class="side-menu__item">
                            <span class="side-menu__label text-black">Kontak</span>
                        </a>
                    </li>
                    <!-- End::slide -->

                </ul>
                <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                        width="24" height="24" viewBox="0 0 24 24">
                        <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                    </svg></div>
                <div class="d-lg-flex d-none">
                    <div class="btn-list d-lg-flex d-none mt-lg-2 mt-xl-0 mt-0">
                        <button id="btn-darkmode-toggle-lg" class="btn btn-wave btn-icon btn-light">
                            <i class="fe fe-moon align-middle"></i>
                        </button>
                    </div>
                </div>
            </nav>
            <!-- End::nav -->

        </div>
        <!-- End::main-sidebar -->
    </div>

</aside>

<script>
    // Fungsi untuk mengaktifkan dark mode
    function enableDarkMode() {
        document.querySelector("html").setAttribute("data-theme-mode", "dark");
        localStorage.setItem("valexdarktheme", true);
        document.getElementById("btn-darkmode-toggle-lg").innerHTML = '<i class="fe fe-sun align-middle"></i>';
        document.getElementById("btn-darkmode-toggle-sm").innerHTML = '<i class="fe fe-sun align-middle"></i>';
    }

    // Fungsi untuk menonaktifkan dark mode
    function disableDarkMode() {
        document.querySelector("html").removeAttribute("data-theme-mode");
        localStorage.removeItem("valexdarktheme");
        document.getElementById("btn-darkmode-toggle-lg").innerHTML = '<i class="fe fe-moon align-middle"></i>';
        document.getElementById("btn-darkmode-toggle-sm").innerHTML = '<i class="fe fe-moon align-middle"></i>';
    }

    // Cek status dark mode saat halaman dimuat
    window.addEventListener("DOMContentLoaded", () => {
        if (localStorage.valexdarktheme) {
            enableDarkMode();
        } else {
            disableDarkMode();
        }
    });

    // Toggle dark mode saat tombol diklik (Sinkron di kedua tombol)
    document.getElementById("btn-darkmode-toggle-lg").addEventListener("click", function() {
        if (localStorage.valexdarktheme) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    document.getElementById("btn-darkmode-toggle-sm").addEventListener("click", function() {
        if (localStorage.valexdarktheme) {
            disableDarkMode();
        } else {
            enableDarkMode();
        }
    });

    // RTL Handling (Jika ada)
    if (localStorage.valexrtl) {
        document.querySelector("html").setAttribute("dir", "rtl");
        document.querySelector("#style")?.setAttribute("href",
            "{{ asset('assets/libs/bootstrap/css/bootstrap.rtl.min.css') }}");
    }
</script>
