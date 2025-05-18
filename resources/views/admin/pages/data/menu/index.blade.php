@extends('layouts.app')

@push('style')
    @include('admin.pages.data.datatable-style')
@endpush

@push('scripts')
    @include('admin.pages.data.datatable-script')

    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Saat tombol View diklik, isi modal dengan data Menu yang sesuai
            document.querySelectorAll(".viewMenuBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let namaMenu = this.getAttribute("data-nama");
                    let tempatNama = this.getAttribute("data-tempat");
                    let deskripsi = this.getAttribute("data-deskripsi") || '-'; // Default jika null

                    document.getElementById("viewNamaMenu").textContent = namaMenu;
                    document.getElementById("viewTempatKuliner").textContent = tempatNama;
                    document.getElementById("viewDeskripsiMenu").textContent = deskripsi;
                });
            });

            // Saat tombol Edit diklik, isi modal edit dengan data yang sesuai
            document.querySelectorAll(".editMenuBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let namaMenu = this.getAttribute("data-nama");
                    let tempat_id = this.getAttribute("data-tempat-id");
                    let deskripsi = this.getAttribute("data-deskripsi") || '';

                    document.getElementById("editNamaMenu").value = namaMenu;
                    document.getElementById("editTempatKuliner").value = tempat_id;

                    // Set deskripsi dropdown value (makanan atau minuman)
                    const deskripsiLower = deskripsi.toLowerCase();
                    if (deskripsiLower.includes('makanan')) {
                        document.getElementById("editDeskripsiMenu").value = 'makanan';
                    } else if (deskripsiLower.includes('minuman')) {
                        document.getElementById("editDeskripsiMenu").value = 'minuman';
                    } else {
                        document.getElementById("editDeskripsiMenu").value = '';
                    }

                    document.getElementById("editMenuForm").action = "/menus/" + id;
                });
            });

            // Saat tombol Hapus diklik, isi modal hapus dengan nama Menu yang sesuai
            document.querySelectorAll(".deleteMenuBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    let namaMenu = this.getAttribute("data-nama");

                    document.getElementById("deleteNamaMenu").textContent = namaMenu;
                    document.getElementById("deleteMenuForm").action = "/menus/" + id;
                });
            });
        });
    </script>
@endpush

@section('content')
    <!-- Page Header -->
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">Data Menu Kuliner</h4>
        </div>
        <div class="main-dashboard-header-right">
            <div>
                <!-- Tombol Tambah Data -->
                <button type="button" class="btn btn-primary btn-wave" data-bs-toggle="modal" data-bs-target="#modalAddMenu">
                    Tambah Menu
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
                                    <th>Nama Menu</th>
                                    <th>Tempat Kuliner</th>
                                    <th>Jenis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    <tr>
                                        <td>{{ $menu->nama_menu }}</td>
                                        <td>{{ $menu->tempatKuliner->nama }}</td>
                                        <td>
                                            @if (stripos($menu->deskripsi, 'makanan') !== false)
                                                <span class="badge bg-success">Makanan</span>
                                            @elseif(stripos($menu->deskripsi, 'minuman') !== false)
                                                <span class="badge bg-info">Minuman</span>
                                            @else
                                                <span class="badge bg-secondary">Lainnya</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="mb-md-0 mb-2">
                                                <!-- Tombol View -->
                                                <button class="btn btn-icon btn-info btn-wave viewMenuBtn"
                                                    data-id="{{ $menu->menu_id }}" data-nama="{{ $menu->nama_menu }}"
                                                    data-tempat="{{ $menu->tempatKuliner->nama }}"
                                                    data-tempat-id="{{ $menu->tempat_id }}"
                                                    data-deskripsi="{{ $menu->deskripsi ?? '-' }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalViewMenu">
                                                    <i class="ri-eye-fill"></i>
                                                </button>

                                                <!-- Tombol Edit -->
                                                <button class="btn btn-icon btn-warning btn-wave editMenuBtn"
                                                    data-id="{{ $menu->menu_id }}" data-nama="{{ $menu->nama_menu }}"
                                                    data-tempat-id="{{ $menu->tempat_id }}"
                                                    data-deskripsi="{{ $menu->deskripsi }}" data-bs-toggle="modal"
                                                    data-bs-target="#modalEditMenu">
                                                    <i class="ri-pencil-line"></i>
                                                </button>

                                                <!-- Tombol Hapus -->
                                                <button class="btn btn-icon btn-danger btn-wave deleteMenuBtn"
                                                    data-id="{{ $menu->menu_id }}" data-nama="{{ $menu->nama_menu }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalDeleteMenu">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @include('admin.pages.data.menu.modals')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
