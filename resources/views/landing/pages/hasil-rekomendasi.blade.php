@extends('layouts.landing')

@section('content')
    <section class="section section-bg" id="hasil-rekomendasi">
        <div class="container">
            <div class="text-center mt-5 mb-4">
                <p class="fs-12 fw-semibold text-success mb-1">
                    <span class="landing-section-heading">Hasil Rekomendasi</span>
                </p>
                <div class="landing-title"></div>
                <h3 class="fw-semibold mb-2">Tempat Kuliner Rekomendasi untuk Kamu</h3>
                <p class="text-muted fs-15 fw-normal">
                    Berikut adalah daftar tempat kuliner yang paling sesuai dengan preferensimu.
                </p>
            </div>

            @if (count($hasil) > 0)
                <div class="row wishlist-row">
                    @foreach ($hasil as $index => $item)
                        @php
                            $tempat = $item['tempat'];
                            $preferensi = $tempat->preferensi;
                        @endphp
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 alert wishlist-card mb-0 py-0">
                            <div class="card item-card">
                                <div class="card-body pb-0">
                                    <div class="text-center zoom">
                                        <img class="w-100 rounded-3"
                                            src="{{ asset('assets/images/default/foto-tempat.png') }}" alt="img">
                                    </div>
                                    <div class="card-body px-0 pb-3">
                                        <div class="row">
                                            <div class="col-9">
                                                <div class="cardtitle">
                                                    <div class="mb-1 fw-semibold text-muted">Peringkat
                                                        #{{ $loop->iteration }}
                                                    </div>
                                                    <a class="shop-title fs-16">{{ $tempat->nama }}</a>
                                                    <div class="mt-1 text-muted fs-13">{{ $tempat->alamat }}</div>
                                                </div>
                                            </div>
                                            <div class="col-3 text-end">
                                                <div class="cardprice-2">
                                                    <span class="number-font fs-14 text-muted">Skor</span>
                                                    <div class="fw-bold">{{ number_format($item['nilai_akhir'], 4) }}</div>
                                                    <div class="fw-bold">{{ number_format($item['jarak'], 3) }} km</div>
                                                </div>
                                            </div>
                                            <div>
                                                <p class="shop-description fs-13 mt-2 text-muted mb-0">
                                                    <i class="ri-star-fill fs-6 text-warning"></i> Google:
                                                    {{ $preferensi->rating_google }} |
                                                    GoFood: {{ $preferensi->rating_gofood }} |
                                                    ShopeeFood: {{ $preferensi->rating_shopeefood }} |
                                                    GrabFood: {{ $preferensi->rating_grabfood }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="{{ route('preferensi.detail', $tempat->tempat_id) }}" target="_blank"
                                        class="btn btn-sm btn-secondary mb-3 w-100"><i class="fe fe-eye me-2"></i>
                                        Lihat Detail</a>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="text-center px-2">
                                        @if ($preferensi->link_gmaps)
                                            <a href="{{ $preferensi->link_gmaps }}" target="_blank"
                                                class="btn btn-sm btn-primary mb-2 w-100"><i class="fe fe-map-pin me-2"></i>
                                                Lihat di Maps</a>
                                        @endif
                                        @if ($preferensi->link_gofood)
                                            <a href="{{ $preferensi->link_gofood }}" target="_blank"
                                                class="btn btn-sm btn-success mb-2 w-100"><i
                                                    class="ri-motorbike-line me-2"></i> GoFood</a>
                                        @endif
                                        @if ($preferensi->link_shopeefood)
                                            <a href="{{ $preferensi->link_shopeefood }}" target="_blank"
                                                class="btn btn-sm btn-danger mb-2 w-100"><i
                                                    class="ri-shopping-bag-3-line me-2"></i> ShopeeFood</a>
                                        @endif
                                        @if ($preferensi->link_grabfood)
                                            <a href="{{ $preferensi->link_grabfood }}" target="_blank"
                                                class="btn btn-sm btn-warning mb-2 w-100"><i
                                                    class="ri-takeaway-line me-2"></i> GrabFood</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning text-center mt-4">
                    <strong>Oops!</strong> Tidak ada tempat kuliner yang cocok ditemukan berdasarkan preferensimu.
                </div>
            @endif
        </div>
    </section>
@endsection
