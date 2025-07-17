<section class="section section-bg" id="kontak">
    <style>
        .section-bg {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1504674900247-0877df9cc836?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            padding: 80px 0;
            color: white;
        }

        .landing-section-heading {
            background: linear-gradient(45deg, #ff6b6b, #ffa500);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: bold;
            letter-spacing: 2px;
        }

        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .bg-primary-transparent {
            background: rgba(255, 107, 107, 0.15);
            border-color: rgba(255, 107, 107, 0.3);
        }

        .bg-danger-transparent {
            background: rgba(255, 165, 0, 0.15);
            border-color: rgba(255, 165, 0, 0.3);
        }

        .bg-success-transparent {
            background: rgba(40, 167, 69, 0.15);
            border-color: rgba(40, 167, 69, 0.3);
        }

        .bg-warning-transparent {
            background: rgba(255, 193, 7, 0.15);
            border-color: rgba(255, 193, 7, 0.3);
        }

        .text-primary {
            color: #ff6b6b !important;
        }

        .text-danger {
            color: #ffa500 !important;
        }

        .text-success {
            color: #28a745 !important;
        }

        .text-warning {
            color: #ffc107 !important;
        }

        .btn-success {
            background: linear-gradient(45deg, #25d366, #128c7e);
            border: none;
            border-radius: 25px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background: linear-gradient(45deg, #128c7e, #25d366);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(37, 211, 102, 0.4);
        }

        .btn-outline-danger {
            border-color: #ffa500;
            color: #ffa500;
            border-radius: 25px;
            padding: 12px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-outline-danger:hover {
            background: #ffa500;
            border-color: #ffa500;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 165, 0, 0.4);
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #ff6b6b;
            box-shadow: 0 0 0 0.2rem rgba(255, 107, 107, 0.25);
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .text-muted {
            color: #6c757d !important;
        }

        .card-body {
            color: #333;
        }

        h3 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .fs-15 {
            font-size: 15px;
        }

        .fs-12 {
            font-size: 12px;
        }

        .fs-17 {
            font-size: 17px;
        }

        .shadow-none {
            box-shadow: none !important;
        }

        .fe-map-pin:before {
            content: "📍";
        }

        .fe-mail:before {
            content: "📧";
        }

        .fe-headphones:before {
            content: "📞";
        }

        .fe-user:before {
            content: "👤";
        }

        .fab.fa-whatsapp:before {
            content: "💬";
        }
    </style>

    <div class="container text-center">
        <p class="fs-12 fw-semibold text-success mb-1"><span class="landing-section-heading">HUBUNGI KAMI</span></p>
        <div class="landing-title"></div>
        <h3 class="fw-semibold mb-2">Punya pertanyaan tentang makanan favorit? Yuk, ngobrol sama kita! 🍽️</h3>
        <div class="row justify-content-center">
            <div class="col-xl-9">
                <p class="text-muted fs-15 mb-5 fw-normal" style="color: #f8f9fa !important;">
                    Mau tanya rekomendasi makanan enak, ada keluhan, atau cuma pengen sharing pengalaman kuliner?
                    Jangan sungkan, kita siap dengerin cerita kamu kapan aja! 😊
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
                                <h6 class="mb-1 fw-medium text-black">Lokasi</h6>
                                <p>Taman, Sidoarjo</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contact-icon border bg-danger-transparent">
                                <i class="fe fe-mail text-danger fs-17"></i>
                            </div>
                            <div class="ms-3 text-start">
                                <h6 class="mb-1 fw-medium text-black">Email</h6>
                                <p><a href="mailto:e41212126@polije.ac.id" class="text-muted">e41212126@polije.ac.id</a>
                                </p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <div class="contact-icon border bg-success-transparent">
                                <i class="fe fe-headphones text-success fs-17"></i>
                            </div>
                            <div class="ms-3 text-start">
                                <h6 class="mb-1 fw-medium text-black">WhatsApp</h6>
                                <p><a href="https://wa.me/6285895645840" class="text-muted">0858-9564-5840</a></p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <div class="contact-icon border bg-warning-transparent">
                                <i class="fe fe-user text-warning fs-17"></i>
                            </div>
                            <div class="ms-3 text-start">
                                <h6 class="mb-1 fw-medium text-black">Developer</h6>
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
                                        <label for="cusName" class="form-label">Nama kamu <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="cusName" name="cusName"
                                            placeholder="Siapa nih yang mau ngobrol? 😊" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="cusMessage" class="form-label">Ceritain dong! <span
                                        class="text-danger">*</span></label>
                                <textarea rows="4" class="form-control" id="cusMessage" name="cusMessage"
                                    placeholder="Mau tanya apa nih? Sharing pengalaman kuliner, komplain, atau sekedar say hi juga boleh! 🍕🍜🍰"
                                    required></textarea>
                            </div>
                            <div class="form-group mb-2 pt-1">
                                <button type="submit" class="btn btn-success">
                                    <i class="fab fa-whatsapp me-2"></i>Chat via WhatsApp
                                </button>
                                <a href="mailto:e41212126@polije.ac.id" class="btn btn-outline-danger ms-2">
                                    <i class="fe fe-mail me-2"></i>Kirim Email
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

            // Format pesan yang lebih santai
            const formattedMessage =
                `*Halo dari Website SiFood! 🍽️*%0A%0A` +
                `*Nama:* ${name}%0A` +
                `*Pesan:*%0A${message}%0A%0A` +
                `_Dikirim dari form kontak SiFood_`;

            // URL WhatsApp dengan pesan terformat
            const waURL = `https://wa.me/6285895645840?text=${formattedMessage}`;

            // Buka WhatsApp di tab baru
            window.open(waURL, '_blank');
        }
    </script>
</section>
