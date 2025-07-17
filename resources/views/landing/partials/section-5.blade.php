<section class="section landing-Features bg-dark" id="kriteria">
    <style>
        .landing-Features {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 0;
            position: relative;
            overflow: hidden;
        }

        .landing-Features::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.1;
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        .landing-section-heading {
            background: linear-gradient(45deg, #ffd700, #ff6b6b);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: bold;
            font-size: 16px;
            letter-spacing: 2px;
        }

        .criteria-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(15px);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 30px 20px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .criteria-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 107, 107, 0.5);
        }

        .criteria-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(45deg, #ff6b6b, #ffd700);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .criteria-card:hover::before {
            transform: scaleX(1);
        }

        .criteria-icon {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 36px;
            color: white;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .criteria-card:hover .criteria-icon {
            transform: rotateY(360deg);
            background: linear-gradient(135deg, #ff6b6b 0%, #ffd700 100%);
        }

        .criteria-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
            background: linear-gradient(45deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .criteria-description {
            color: #666;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 0;
        }

        .section-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            line-height: 1.7;
            margin-bottom: 50px;
        }

        .fun-fact {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 15px;
            margin-top: 15px;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            font-style: italic;
            display: none;
        }

        .section-title {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            font-size: 2.5rem;
        }

        .emoji-float {
            display: inline-block;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .criteria-card:nth-child(even) .emoji-float {
            animation-delay: 1.5s;
        }
    </style>

    <div class="container text-center">
        <p class="fs-12 fw-semibold text-success mb-1">
            <span class="landing-section-heading text-fixed-white">🎯 Rahasia Rekomendasi</span>
        </p>
        <div class="landing-title"></div>
        <h3 class="fw-semibold mb-2 text-fixed-white section-title">7 Kriteria Pilihan Kuliner Terbaik</h3>
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <p class="text-fixed-white section-subtitle">
                    Kita nggak asal tunjuk tempat makan aja, lho! SiFood punya metode khusus
                    untuk nyari tempat kuliner yang bener-bener worth it. Dari yang deket rumah sampai yang rasanya
                    bikin nagih,
                    semua ada hitungannya.
                </p>
            </div>
        </div>
        <div class="row justify-content-center g-4">
            <!-- Kriteria 1 -->
            <div class="col-md-3 col-sm-6 text-center">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        📍
                    </div>
                    <h6 class="criteria-title">Jarak Lokasi</h6>
                    <p class="criteria-description">Malas jalan jauh buat makan? Kita paham banget! Makanya yang
                        deket-deket aja dulu, biar hemat bensin dan waktu.</p>
                </div>
            </div>

            <!-- Kriteria 2 -->
            <div class="col-md-3 col-sm-6 text-center">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        ⭐
                    </div>
                    <h6 class="criteria-title">Rating Google</h6>
                    <p class="criteria-description">Kalau udah banyak yang bilang enak di Google, pasti ada benarnya
                        dong! Kita percaya sama pengalaman orang banyak.</p>
                </div>
            </div>

            <!-- Kriteria 3 -->
            <div class="col-md-3 col-sm-6 text-center">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        🟢
                    </div>
                    <h6 class="criteria-title">Rating GoFood</h6>
                    <p class="criteria-description">Sering pesan GoFood kan? Nah, rating di sini tuh real banget karena
                        orang yang udah makan beneran. No fake review!</p>
                </div>
            </div>

            <!-- Kriteria 4 -->
            <div class="col-md-3 col-sm-6 text-center">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        🔴
                    </div>
                    <h6 class="criteria-title">Rating ShopeeFood</h6>
                    <p class="criteria-description">ShopeeFood users tuh detail banget review-nya! Dari rasa, porsi,
                        sampe packaging, semua dibahas. Perfect!</p>
                </div>
            </div>

            <!-- Kriteria 5 -->
            <div class="col-md-3 col-sm-6 text-center">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        🟪
                    </div>
                    <h6 class="criteria-title">Rating GrabFood</h6>
                    <p class="criteria-description">Pioneer food delivery yang udah dipercaya jutaan orang! Rating di
                        sini tuh udah teruji waktu dan selera Indonesia.</p>
                </div>
            </div>

            <!-- Kriteria 6 -->
            <div class="col-md-3 col-sm-6 text-center">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        🍽️
                    </div>
                    <h6 class="criteria-title">Variasi Makanan</h6>
                    <p class="criteria-description">Bosen makan yang itu-itu aja? Kita cari yang menu-nya banyak! Biar
                        bisa cobain macam-macam dalam satu tempat.</p>
                </div>
            </div>

            <!-- Kriteria 7 -->
            <div class="col-md-3 col-sm-6 text-center">
                <div class="criteria-card">
                    <div class="criteria-icon">
                        🥤
                    </div>
                    <h6 class="criteria-title">Pilihan Minuman</h6>
                    <p class="criteria-description">Makan tanpa minum tuh nggak lengkap! Dari es teh manis sampai kopi
                        kekinian, semua harus ada biar perfect combo.</p>
                </div>
            </div>
        </div>
    </div>
</section>
