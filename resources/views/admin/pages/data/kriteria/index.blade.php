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
                    let bobot = this.getAttribute("data-bobot");
                    let deskripsi = this.getAttribute("data-deskripsi") || '-'; // Default jika null

                    document.getElementById("viewNamaKriteria").textContent = nama;
                    document.getElementById("viewBobotKriteria").textContent = bobot;
                    document.getElementById("viewDeskripsiKriteria").textContent = deskripsi;
                });
            });

            // Saat tombol Edit diklik, isi modal edit dengan data yang sesuai
            document.querySelectorAll(".editKriteriaBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let nama = this.getAttribute("data-nama");
                    let bobot = this.getAttribute("data-bobot");
                    let deskripsi = this.getAttribute("data-deskripsi") || '';

                    document.getElementById("editNamaKriteria").value = nama;
                    document.getElementById("editBobotKriteria").value = bobot;
                    document.getElementById("editDeskripsiKriteria").value = deskripsi;
                    document.getElementById("editKriteriaForm").action = "/kriterias/" + id;
                });
            });

            // Saat tombol Hapus diklik, isi modal hapus dengan nama Kriteria yang sesuai
            document.querySelectorAll(".deleteKriteriaBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let nama = this.getAttribute("data-nama");

                    document.getElementById("deleteNamaKriteria").textContent =
                        nama;
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
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <!-- Tombol Tambah Data -->
                <button type="button" class="btn btn-primary btn-wave" data-bs-toggle="modal"
                    data-bs-target="#modalAddKriteria">
                    Tambah Data
                </button>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file-export" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="w-100">Nama Kriteria</th>
                                    <th>Bobot</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kriterias as $kriteria)
                                    <tr>
                                        <td>{{ $kriteria->nama_kriteria }}</td>
                                        <td>{{ $kriteria->bobot }}</td>
                                        <td>
                                            <div class="mb-md-0 mb-2">
                                                <!-- Tombol View -->
                                                <button class="btn btn-icon btn-info btn-wave viewKriteriaBtn"
                                                    data-id="{{ $kriteria->kriteria_id }}"
                                                    data-nama="{{ $kriteria->nama_kriteria }}"
                                                    data-bobot="{{ $kriteria->bobot }}"
                                                    data-deskripsi="{{ $kriteria->deskripsi ?? '-' }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalViewKriteria">
                                                    <i class="ri-eye-fill"></i>
                                                </button>

                                                <!-- Tombol Edit -->
                                                <button class="btn btn-icon btn-warning btn-wave editKriteriaBtn"
                                                    data-id="{{ $kriteria->kriteria_id }}"
                                                    data-nama="{{ $kriteria->nama_kriteria }}"
                                                    data-bobot="{{ $kriteria->bobot }}"
                                                    data-deskripsi="{{ $kriteria->deskripsi }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditKriteria">
                                                    <i class="ri-pencil-line"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-icon btn-danger btn-wave deleteKriteriaBtn"
                                                    data-id="{{ $kriteria->kriteria_id }}"
                                                    data-nama="{{ $kriteria->nama_kriteria }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeleteKriteria">
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
@endsection
