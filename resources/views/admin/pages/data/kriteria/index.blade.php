@extends('layouts.app')

@push('style')
    @include('admin.pages.data.datatable-style')
@endpush

@push('scripts')
    @include('admin.pages.data.datatable-script')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Saat tombol View diklik, isi modal dengan data Kriteria yang sesuai
            document.querySelectorAll(".viewKriteriaBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let nama = this.getAttribute("data-nama");
                    let slug = this.getAttribute("data-slug");
                    let bobot = this.getAttribute("data-bobot");
                    let deskripsi = this.getAttribute("data-deskripsi") || '-'; // Default jika null

                    document.getElementById("viewNamaKriteria").textContent = nama;
                    document.getElementById("viewSlugKriteria").textContent = slug;
                    document.getElementById("viewBobotKriteria").textContent = bobot;
                    document.getElementById("viewDeskripsiKriteria").textContent = deskripsi;
                });
            });

            // Saat tombol Edit diklik, isi modal edit dengan data yang sesuai
            document.querySelectorAll(".editKriteriaBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let nama = this.getAttribute("data-nama");
                    let slug = this.getAttribute("data-slug");
                    let bobot = this.getAttribute("data-bobot");
                    let deskripsi = this.getAttribute("data-deskripsi") || '';

                    document.getElementById("editNamaKriteria").value = nama;
                    document.getElementById("editSlugKriteria").value =
                        slug; // Readonly, hanya untuk display
                    document.getElementById("editBobotKriteria").value =
                        bobot; // Readonly, hanya untuk display
                    document.getElementById("editDeskripsiKriteria").value = deskripsi;
                    document.getElementById("editKriteriaForm").action = "/kriterias/" + id;
                });
            });

            // Saat tombol Hapus diklik, isi modal hapus dengan nama Kriteria yang sesuai
            document.querySelectorAll(".deleteKriteriaBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let nama = this.getAttribute("data-nama");

                    document.getElementById("deleteNamaKriteria").textContent = nama;
                    document.getElementById("deleteKriteriaForm").action = "/kriterias/" + id;
                });
            });
        });
    </script>
@endpush

@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">Data Kriteria</h4>
            <p class="text-muted mb-0">Kelola kriteria penilaian dengan bobot ROC otomatis</p>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <!-- Tombol Tambah Data -->
                <button type="button" class="btn btn-primary btn-wave" data-bs-toggle="modal"
                    data-bs-target="#modalAddKriteria">
                    <i class="ri-add-line me-1"></i> Tambah Data
                </button>

                <!-- Tombol Manual Recalculate (Optional) -->
                <a href="{{ route('kriterias.recalculate') }}" class="btn btn-info btn-wave ms-2"
                    onclick="return confirm('Yakin ingin menghitung ulang semua bobot ROC?')">
                    <i class="ri-refresh-line me-1"></i> Hitung Ulang Bobot
                </a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Callout Info ROC -->
    <div class="callout callout-info mb-3">
        <div class="d-flex">
            <div class="flex-shrink-0">
                <i class="ri-information-line text-info fs-18"></i>
            </div>
            <div class="flex-grow-1 ms-3">
                <h6 class="text-info mb-1">Info Bobot ROC</h6>
                <p class="mb-0 text-muted">
                    Bobot kriteria dihitung otomatis menggunakan metode ROC (Rank Order Centroid)
                    berdasarkan urutan kriteria. Kriteria dengan ID lebih kecil memiliki prioritas lebih tinggi.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        Daftar Kriteria (Total: {{ count($kriterias) }} kriteria)
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file-export" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="w-100">Nama Kriteria</th>
                                    <th>Slug</th>
                                    <th>Bobot ROC</th>
                                    <th>Ranking</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $index => $kriteria)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <strong>{{ $kriteria->nama_kriteria }}</strong>
                                            @if ($kriteria->deskripsi)
                                                <br><small
                                                    class="text-muted">{{ Str::limit($kriteria->deskripsi, 50) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge bg-success-transparent">{{ $kriteria->slug }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge bg-primary-transparent">{{ floor($kriteria->bobot * 1000) / 1000 }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $index + 1 }}</span>
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Actions">
                                                <!-- Tombol View -->
                                                <button class="btn btn-icon btn-info btn-wave btn-sm viewKriteriaBtn"
                                                    data-id="{{ $kriteria->kriteria_id }}"
                                                    data-nama="{{ $kriteria->nama_kriteria }}"
                                                    data-slug="{{ $kriteria->slug }}" data-bobot="{{ $kriteria->bobot }}"
                                                    data-deskripsi="{{ $kriteria->deskripsi ?? '-' }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalViewKriteria"
                                                    title="Lihat Detail">
                                                    <i class="ri-eye-fill"></i>
                                                </button>

                                                <!-- Tombol Edit -->
                                                <button class="btn btn-icon btn-warning btn-wave btn-sm editKriteriaBtn"
                                                    data-id="{{ $kriteria->kriteria_id }}"
                                                    data-nama="{{ $kriteria->nama_kriteria }}"
                                                    data-slug="{{ $kriteria->slug }}" data-bobot="{{ $kriteria->bobot }}"
                                                    data-deskripsi="{{ $kriteria->deskripsi }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditKriteria" title="Edit">
                                                    <i class="ri-pencil-line"></i>
                                                </button>

                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-icon btn-danger btn-wave btn-sm deleteKriteriaBtn"
                                                    data-id="{{ $kriteria->kriteria_id }}"
                                                    data-nama="{{ $kriteria->nama_kriteria }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeleteKriteria" title="Hapus">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @include('admin.pages.data.kriteria.modals')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Card Info ROC -->
    <div class="row mt-2">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-header">
                    <div class="card-title">
                        <i class="ri-lightbulb-line me-2"></i>Informasi Metode ROC
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Formula ROC:</h6>
                            <p class="text-muted">w<sub>i</sub> = (1/m) × Σ(1/j) dari j=i sampai m</p>
                            <p><strong>Keterangan:</strong></p>
                            <ul class="text-muted">
                                <li>w<sub>i</sub> = Bobot kriteria ke-i</li>
                                <li>m = Total jumlah kriteria</li>
                                <li>j = Ranking kriteria</li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <h6>Contoh Perhitungan (3 Kriteria):</h6>
                            <ul class="text-muted">
                                <li>Kriteria 1: (1/3) × (1/1 + 1/2 + 1/3) = 0.611</li>
                                <li>Kriteria 2: (1/3) × (1/2 + 1/3) = 0.278</li>
                                <li>Kriteria 3: (1/3) × (1/3) = 0.111</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
