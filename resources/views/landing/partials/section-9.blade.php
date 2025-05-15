<section class="section section-bg" id="kontak">
    <div class="container text-center">
        <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">KONTAK KAMI</span></p>
        <div class="landing-title"></div>
        <h3 class="fw-semibold mb-2">Ada pertanyaan? Kami siap membantu Anda.</h3>
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <p class="text-muted fs-15 mb-5 fw-normal">
                    Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan, saran, atau ingin tahu lebih
                    banyak tentang aplikasi SiFood.
                </p>
            </div>
        </div>
        <div class="text-start row justify-content-between">
            <div class="col-lg-4">
                <div class="card shadow-none">
                    <div class="card-body px-5 py-4">
                        <div class="d-flex mb-3 mt-2">
                            <div class="contact-icon border bg-primary-transparent m-0">
                                <i class="fe fe-map-pin text-primary fs-17"></i>
                            </div>
                            <div class="ms-3 text-start">
                                <h6 class="mb-1 fw-medium">Lokasi</h6>
                                <p>Taman, Sidoarjo</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contact-icon border bg-danger-transparent">
                                <i class="fe fe-mail text-danger fs-17"></i>
                            </div>
                            <div class="ms-3 text-start">
                                <h6 class="mb-1 fw-medium">Email</h6>
                                <p><a href="mailto:e41212126@polije.ac.id" class="text-muted">e41212126@polije.ac.id</a>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contact-icon border bg-success-transparent">
                                <i class="fe fe-headphones text-success fs-17"></i>
                            </div>
                            <div class="ms-3 text-start">
                                <h6 class="mb-1 fw-medium">Kontak</h6>
                                <p><a href="https://wa.me/6285895645840" class="text-muted">0858-9564-5840</a></p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="contact-icon border bg-warning-transparent">
                                <i class="fe fe-user text-warning fs-17"></i>
                            </div>
                            <div class="ms-3 text-start">
                                <h6 class="mb-1 fw-medium">Nama</h6>
                                <p class="mb-0">Marzuki Akmal</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card shadow-none">
                    <div class="card-body px-5 pt-4">
                        <form id="whatsappForm" onsubmit="sendWhatsApp(event)">
                            <div class="row mt-1">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="cusName" class="form-label">Nama <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="cusName" name="cusName"
                                            placeholder="Masukkan nama Anda" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cusMessage" class="form-label">Pesan <span
                                        class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control" id="cusMessage" name="cusMessage"
                                    placeholder="Tulis pesan Anda di sini..." required></textarea>
                            </div>
                            <div class="form-group mb-2 pt-1">
                                <button type="submit" class="btn btn-success">
                                    <i class="fab fa-whatsapp me-2"></i>Kirim Pesan Via WhatsApp
                                </button>
                                <a href="mailto:e41212126@polije.ac.id" class="btn btn-outline-danger ms-2">
                                    <i class="fe fe-mail me-2"></i>Kirim Via Email
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sendWhatsApp(event) {
            event.preventDefault();

            // Mengambil nilai input
            const name = document.getElementById('cusName').value;
            const message = document.getElementById('cusMessage').value;

            // Format pesan
            const formattedMessage =
                `*Pesan dari Website SiFood*%0A%0A` +
                `*Nama:* ${name}%0A` +
                `*Pesan:*%0A${message}`;

            // URL WhatsApp dengan pesan terformat
            const waURL = `https://wa.me/6285895645840?text=${formattedMessage}`;

            // Buka WhatsApp di tab baru
            window.open(waURL, '_blank');
        }
    </script>
</section>
