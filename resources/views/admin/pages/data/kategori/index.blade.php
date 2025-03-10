@extends('layouts.app')

@push('style')
    @include('admin.pages.data.datatable-style')
@endpush

@push('scripts')
    @include('admin.pages.data.datatable-script')

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Saat tombol View diklik, isi modal dengan data kategori yang sesuai
            document.querySelectorAll(".viewKategoriBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let nama = this.getAttribute("data-nama");
                    let deskripsi = this.getAttribute("data-deskripsi") || '-'; // Default jika null

                    document.getElementById("viewNamaKategori").textContent = nama;
                    document.getElementById("viewDeskripsiKategori").textContent = deskripsi;
                });
            });

            // Saat tombol Edit diklik, isi modal edit dengan data yang sesuai
            document.querySelectorAll(".editKategoriBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let nama = this.getAttribute("data-nama");
                    let deskripsi = this.getAttribute("data-deskripsi") || '';

                    document.getElementById("editNamaKategori").value = nama;
                    document.getElementById("editDeskripsiKategori").value = deskripsi;
                    document.getElementById("editKategoriForm").action = "/kategoris/" + id;
                });
            });

            // Saat tombol Hapus diklik, isi modal hapus dengan nama kategori yang sesuai
            document.querySelectorAll(".deleteKategoriBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let nama = this.getAttribute("data-nama");

                    document.getElementById("deleteNamaKategori").textContent =
                        nama;
                    document.getElementById("deleteKategoriForm").action = "/kategoris/" + id;
                });
            });
        });
    </script>
@endpush

@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">Data Kategori</h4>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <!-- Tombol Tambah Data -->
                <button type="button" class="btn btn-primary btn-wave" data-bs-toggle="modal"
                    data-bs-target="#modalAddKategori">
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
                                    <th class="w-100">Nama Kategori</th>
                                    {{-- <th>Deskripsi</th> --}}
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategoris as $kategori)
                                    <tr>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td>
                                            <div class="mb-md-0 mb-2">
                                                <!-- Tombol View -->
                                                <button class="btn btn-icon btn-info btn-wave viewKategoriBtn"
                                                    data-id="{{ $kategori->kategori_id }}"
                                                    data-nama="{{ $kategori->nama_kategori }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalViewKategori">
                                                    <i class="ri-eye-fill"></i>
                                                </button>
                                                <!-- Tombol Edit -->
                                                <button class="btn btn-icon btn-warning btn-wave editKategoriBtn"
                                                    data-id="{{ $kategori->kategori_id }}"
                                                    data-nama="{{ $kategori->nama_kategori }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditKategori">
                                                    <i class="ri-pencil-line"></i>
                                                </button>
                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-icon btn-danger btn-wave deleteKategoriBtn"
                                                    data-id="{{ $kategori->kategori_id }}"
                                                    data-nama="{{ $kategori->nama_kategori }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalDeleteKategori">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @include('admin.pages.data.kategori.modals')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
