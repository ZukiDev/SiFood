@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">Halo, Selamat Datang !</h4>
            <p class="mb-0 text-muted">Dashboard</p>
        </div>
        <div class="main-dashboard-header-right">
            <div>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- row -->
    <div class="row">
        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card overflow-hidden sales-card bg-primary-gradient h-100">
                <div class="px-3 pt-3 pb-2 pt-0">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL TEMPAT KULINER</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">
                                    {{ $totalTempatKuliner }}
                                </h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">
                                    Dibandingkan bulan lalu
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-arrow-circle-up text-fixed-white"></i>
                                <span class="text-fixed-white op-7"> +{{ $newTempatKuliner }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="compositeline"></div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card overflow-hidden sales-card bg-danger-gradient h-100">
                <div class="px-3 pt-3 pb-2 pt-0">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL MENU</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">
                                    {{ $totalMenu }}
                                </h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">
                                    Menu dari semua tempat
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-utensils text-fixed-white"></i>
                                <span class="text-fixed-white op-7"> {{ $newMenu }} baru</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="compositeline2"></div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card overflow-hidden sales-card bg-success-gradient h-100">
                <div class="px-3 pt-3 pb-2 pt-0">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL MAKANAN</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">
                                    {{ $totalMakanan }}
                                </h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">
                                    Menu jenis makanan
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-hamburger text-fixed-white"></i>
                                <span class="text-fixed-white op-7"> {{ $topMakanan }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="compositeline3"></div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 mb-3">
            <div class="card overflow-hidden sales-card bg-warning-gradient h-100">
                <div class="px-3 pt-3 pb-2 pt-0">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL MINUMAN</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">
                                    {{ $totalMinuman }}
                                </h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">
                                    Menu jenis minuman
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-coffee text-fixed-white"></i>
                                <span class="text-fixed-white op-7"> {{ $topMinuman }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="compositeline4"></div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 mb-3"> <!-- Kolom terakhir lebih lebar -->
            <div class="card overflow-hidden sales-card bg-secondary-gradient h-100">
                <div class="px-3 pt-3 pb-2 pt-0">
                    <div>
                        <h6 class="mb-3 fs-12 text-fixed-white">TOTAL PENGGUNA</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div>
                                <h4 class="fs-20 fw-bold mb-1 text-fixed-white">
                                    {{ $totalPengguna }}
                                </h4>
                                <p class="mb-0 fs-12 text-fixed-white op-7">
                                    Pengguna rekomendasi
                                </p>
                            </div>
                            <span class="float-end my-auto ms-auto">
                                <i class="fas fa-users text-fixed-white"></i>
                                <span class="text-fixed-white op-7"> +{{ $newPengguna }}</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div id="compositeline5"></div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row">
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">Tempat Kuliner Teratas</h4>
                        <a href="{{ route('tempat-kuliners.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
                    </div>
                    <p class="fs-12 text-muted mb-0">
                        Tempat kuliner dengan rating tertinggi dari berbagai platform.
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Tempat</th>
                                    <th>Kategori</th>
                                    <th>Google</th>
                                    <th>ShopeeFood</th>
                                    <th>GrabFood</th>
                                    <th>GoFood</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topPlaces as $index => $place)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $place->nama }}</td>
                                        <td>{{ $place->kategori->nama_kategori }}</td>
                                        <td><span
                                                class="badge bg-success">{{ number_format($place->preferensi->rating_google ?? 0, 1) }}</span>
                                        </td>
                                        <td><span
                                                class="badge bg-danger">{{ number_format($place->preferensi->rating_shopeefood ?? 0, 1) }}</span>
                                        </td>
                                        <td><span
                                                class="badge bg-warning">{{ number_format($place->preferensi->rating_grabfood ?? 0, 1) }}</span>
                                        </td>
                                        <td><span
                                                class="badge bg-primary">{{ number_format($place->preferensi->rating_gofood ?? 0, 1) }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">Aktivitas Terbaru</h3>
                    <p class="fs-12 mb-0 text-muted">
                        Pencatatan aktivitas terbaru pada sistem rekomendasi kuliner.
                    </p>
                </div>
                <div class="product-timeline card-body pt-2 mt-1">
                    <ul class="timeline-1 mb-0">
                        <li class="mt-0">
                            <i class="fe fe-plus bg-primary-gradient text-fixed-white product-icon"></i>
                            <span class="fw-medium mb-4 fs-14">Tempat Kuliner Baru</span>
                            <a href="javascript:void(0);"
                                class="float-end fs-11 text-muted">{{ \Carbon\Carbon::now()->subDays(3)->format('d M Y') }}</a>
                            <p class="mb-0 text-muted fs-12">{{ $latestActivity['newPlaces'] }} tempat kuliner baru
                                ditambahkan</p>
                        </li>
                        <li class="mt-0">
                            <i class="fe fe-edit bg-danger-gradient text-fixed-white product-icon"></i>
                            <span class="fw-medium mb-4 fs-14">Update Data</span>
                            <a href="javascript:void(0);"
                                class="float-end fs-11 text-muted">{{ \Carbon\Carbon::now()->subDays(2)->format('d M Y') }}</a>
                            <p class="mb-0 text-muted fs-12">{{ $latestActivity['updatedPlaces'] }} tempat kuliner
                                diperbarui</p>
                        </li>
                        <li class="mt-0">
                            <i class="fe fe-layers bg-success-gradient text-fixed-white product-icon"></i>
                            <span class="fw-medium mb-4 fs-14">Menu Baru</span>
                            <a href="javascript:void(0);"
                                class="float-end fs-11 text-muted">{{ \Carbon\Carbon::now()->subDays(1)->format('d M Y') }}</a>
                            <p class="mb-0 text-muted fs-12">{{ $latestActivity['newMenus'] }} menu baru ditambahkan</p>
                        </li>
                        <li class="mt-0">
                            <i class="fe fe-search bg-warning-gradient text-fixed-white product-icon"></i>
                            <span class="fw-medium mb-4 fs-14">Rekomendasi Terbaru</span>
                            <a href="javascript:void(0);"
                                class="float-end fs-11 text-muted">{{ \Carbon\Carbon::now()->format('d M Y') }}</a>
                            <p class="mb-0 text-muted fs-12">{{ $latestActivity['recentPreferences'] }} pencarian
                                rekomendasi baru</p>
                        </li>
                        <li class="mt-0 mb-0">
                            <i class="fe fe-map-pin bg-purple-gradient text-fixed-white product-icon"></i>
                            <span class="fw-medium mb-4 fs-14">Lokasi Populer</span>
                            <a href="javascript:void(0);"
                                class="float-end fs-11 text-muted">{{ \Carbon\Carbon::now()->format('d M Y') }}</a>
                            <p class="mb-0 text-muted fs-12">{{ $latestActivity['popularLocation'] }} pencarian di area
                                populer</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row">
        <div class="col-xl-6 col-md-12 col-lg-6">
            <div class="card">
                <div class="card-header pb-0">
                    <h3 class="card-title mb-2">Rekomendasi Teratas</h3>
                    <p class="fs-12 mb-0 text-muted">
                        Kategori tempat kuliner yang paling banyak dicari oleh pengguna.
                    </p>
                </div>
                <div class="card-body">
                    <div id="pie-chart" class="ht-300"></div>
                    <div class="row mt-3">
                        <div class="col-md-4 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="legend bg-primary rounded-circle me-2"
                                    style="width:10px; height:10px;"></span>
                                <span>Cafe</span>
                            </div>
                            <h3 class="mb-1 mt-2 font-weight-bold">{{ $topRecommendations['cafe'] }}%</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="legend bg-success rounded-circle me-2"
                                    style="width:10px; height:10px;"></span>
                                <span>Restoran</span>
                            </div>
                            <h3 class="mb-1 mt-2 font-weight-bold">{{ $topRecommendations['restaurant'] }}%</h3>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="legend bg-warning rounded-circle me-2"
                                    style="width:10px; height:10px;"></span>
                                <span>Warung</span>
                            </div>
                            <h3 class="mb-1 mt-2 font-weight-bold">{{ $topRecommendations['warung'] }}%</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6 col-xl-6">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">Tempat Kuliner Terbaru</h4>
                        <a href="{{ route('tempat-kuliners.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
                    </div>
                    <p class="fs-12 text-muted mb-0">
                        Tempat kuliner yang baru ditambahkan ke dalam sistem.
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover mg-b-0 text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Tempat</th>
                                    <th>Kategori</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Ditambahkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($latestPlaces as $index => $place)
                                    <tr>
                                        <th scope="row">{{ $index + 1 }}</th>
                                        <td>{{ $place->nama }}</td>
                                        <td>{{ $place->kategori->nama_kategori }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($place->alamat, 30) }}</td>
                                        <td>{{ $place->created_at->format('d M Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row close -->
@endsection

@push('scripts')
    <script>
        // Inisialisasi chart dan grafik
        $(function() {
            'use strict';

            // Data untuk chart pie (Rekomendasi Teratas)
            var options = {
                series: [{{ $topRecommendations['cafe'] }}, {{ $topRecommendations['restaurant'] }},
                    {{ $topRecommendations['warung'] }}
                ],
                chart: {
                    type: 'pie',
                    height: 300,
                },
                labels: ['Café', 'Restoran', 'Warung'],
                colors: ['#6259ca', '#5ed84f', '#f7bb4d'],
                legend: {
                    show: false
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }]
            };

            var chart = new ApexCharts(document.querySelector("#pie-chart"), options);
            chart.render();

            // Sparklines untuk kartu Total Tempat Kuliner
            var sparklineTempat = {
                series: [{
                    name: 'Tempat Kuliner',
                    data: [{{ implode(',', $tempatKulinerTrend) }}]
                }],
                chart: {
                    type: 'line',
                    width: 100,
                    height: 35,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2,
                },
                colors: ['rgba(255, 255, 255, 0.5)'],
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: true,
                        title: {
                            formatter: function(seriesName, opts) {
                                return 'Hari ke-' + (opts.dataPointIndex + 1);
                            }
                        }
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return 'Jumlah:';
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };

            // Sparklines untuk kartu Total Menu
            var sparklineMenu = {
                series: [{
                    name: 'Menu',
                    data: [{{ implode(',', $menuTrend) }}]
                }],
                chart: {
                    type: 'line',
                    width: 100,
                    height: 35,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2,
                },
                colors: ['rgba(255, 255, 255, 0.5)'],
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: true,
                        title: {
                            formatter: function(seriesName, opts) {
                                return 'Hari ke-' + (opts.dataPointIndex + 1);
                            }
                        }
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return 'Jumlah:';
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };

            // Sparklines untuk kartu Total Makanan
            var sparklineMakanan = {
                series: [{
                    name: 'Makanan',
                    data: [{{ implode(',', $makananTrend) }}]
                }],
                chart: {
                    type: 'line',
                    width: 100,
                    height: 35,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2,
                },
                colors: ['rgba(255, 255, 255, 0.5)'],
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: true,
                        title: {
                            formatter: function(seriesName, opts) {
                                return 'Hari ke-' + (opts.dataPointIndex + 1);
                            }
                        }
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return 'Jumlah:';
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };

            // Sparklines untuk kartu Total Minuman
            var sparklineMinuman = {
                series: [{
                    name: 'Minuman',
                    data: [{{ implode(',', $minumanTrend) }}]
                }],
                chart: {
                    type: 'line',
                    width: 100,
                    height: 35,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2,
                },
                colors: ['rgba(255, 255, 255, 0.5)'],
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: true,
                        title: {
                            formatter: function(seriesName, opts) {
                                return 'Hari ke-' + (opts.dataPointIndex + 1);
                            }
                        }
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return 'Jumlah:';
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };

            // Sparklines untuk kartu Total Pengguna
            var sparklinePengguna = {
                series: [{
                    name: 'Pengguna',
                    data: [{{ implode(',', $penggunaTrend) }}]
                }],
                chart: {
                    type: 'line',
                    width: 100,
                    height: 35,
                    sparkline: {
                        enabled: true
                    }
                },
                stroke: {
                    curve: 'smooth',
                    width: 2,
                },
                colors: ['rgba(255, 255, 255, 0.5)'],
                tooltip: {
                    fixed: {
                        enabled: false
                    },
                    x: {
                        show: true,
                        title: {
                            formatter: function(seriesName, opts) {
                                return 'Hari ke-' + (opts.dataPointIndex + 1);
                            }
                        }
                    },
                    y: {
                        title: {
                            formatter: function(seriesName) {
                                return 'Jumlah:';
                            }
                        }
                    },
                    marker: {
                        show: false
                    }
                }
            };

            // Render sparklines dengan data yang berbeda untuk setiap kartu
            new ApexCharts(document.querySelector("#compositeline"), sparklineTempat).render();
            new ApexCharts(document.querySelector("#compositeline2"), sparklineMenu).render();
            new ApexCharts(document.querySelector("#compositeline3"), sparklineMakanan).render();
            new ApexCharts(document.querySelector("#compositeline4"), sparklineMinuman).render();
            new ApexCharts(document.querySelector("#compositeline5"), sparklinePengguna).render();
        });
    </script>
@endpush
