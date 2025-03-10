@extends('layouts.landing')

@section('content')
    <section class="section section-bg" id="preferensi">
        <div class="container">
            <div class="text-center mt-5 mb-5">
                <p class="fs-12 fw-semibold text-success mb-1">
                    <span class="landing-section-heading">Preferensi Kamu</span>
                </p>
                <div class="landing-title"></div>
                <h3 class="fw-semibold mb-2">Isi Preferensimu Terlebih Dahulu</h3>
                <p class="text-muted fs-15 fw-normal">Beri tahu kami lokasi dan preferensimu agar SiFood bisa memberikan
                    rekomendasi tempat kuliner yang paling sesuai untukmu di sekitar Sidoarjo.</p>
            </div>

            <form action="{{ route('preferensi.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-lg-8">

                        <!-- Lokasi Pengguna -->
                        <div class="mb-3">
                            <label for="latitude" class="form-label fw-semibold">Lokasi Anda (Otomatis Terdeteksi)</label>
                            <div class="row">
                                <div class="col">
                                    <input type="text" name="latitude" id="latitude" class="form-control"
                                        placeholder="Latitude" readonly required>
                                </div>
                                <div class="col">
                                    <input type="text" name="longitude" id="longitude" class="form-control"
                                        placeholder="Longitude" readonly required>
                                </div>
                            </div>
                            <small class="text-muted">Pastikan mengizinkan akses lokasi saat diminta.</small>
                        </div>

                        <!-- Pilih Kategori -->
                        <div class="mb-4">
                            <label for="kategori" class="form-label fw-semibold">Pilih Kategori Tempat Kuliner</label>
                            <select name="kategori_id" id="kategori" class="form-select" required>
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h5 class="fw-bold">Urutkan Kriteria Berdasarkan Preferensimu</h5>
                                <small class="text-muted">Geser kriteria di bawah sesuai dengan prioritasmu (atas = paling
                                    penting)</small>
                            </div>
                            <div class="card-body">
                                <ul id="sortable-kriteria" class="list-group">
                                    <li class="list-group-item" data-kriteria="Jarak">Jarak</li>
                                    <li class="list-group-item" data-kriteria="Rating Google">Rating Google</li>
                                    <li class="list-group-item" data-kriteria="Rating Shopee Food">Rating Shopee Food</li>
                                    <li class="list-group-item" data-kriteria="Rating Go Food">Rating Go Food</li>
                                    <li class="list-group-item" data-kriteria="Rating Grab Food">Rating Grab Food</li>
                                    <li class="list-group-item" data-kriteria="Jumlah Makanan">Jumlah Makanan</li>
                                    <li class="list-group-item" data-kriteria="Jumlah Minuman">Jumlah Minuman</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Hidden input untuk dikirim -->
                        <input type="hidden" name="urutan_kriteria" id="urutanKriteriaInput">

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary btn-xl px-5 w-100">
                                Cari Rekomendasi
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <script>
        // Ambil lokasi otomatis saat halaman dimuat
        document.addEventListener("DOMContentLoaded", function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById("latitude").value = position.coords.latitude;
                    document.getElementById("longitude").value = position.coords.longitude;
                }, function(error) {
                    alert("Gagal mendapatkan lokasi. Silakan izinkan akses lokasi browser Anda.");
                });
            } else {
                alert("Browser Anda tidak mendukung Geolocation");
            }
        });
    </script>

    <script>
        const sortableList = document.getElementById('sortable-kriteria');
        const urutanInput = document.getElementById('urutanKriteriaInput');

        Sortable.create(sortableList, {
            animation: 150,
            onEnd: function() {
                const items = [...sortableList.children];
                const kriteriaOrder = items.map(item => item.dataset.kriteria);
                urutanInput.value = JSON.stringify(kriteriaOrder);
            }
        });

        // Inisialisasi awal saat belum digeser
        const initialItems = [...sortableList.children];
        const initialOrder = initialItems.map(item => item.dataset.kriteria);
        urutanInput.value = JSON.stringify(initialOrder);
    </script>
@endsection
