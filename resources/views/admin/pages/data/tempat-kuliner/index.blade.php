@extends('layouts.app')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
@endpush

@push('scripts')
    <!-- Datatables Cdn -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.6/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <!-- Internal Datatables JS -->
    <script src="{{ asset('assets/js/datatables.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // **VIEW MODAL: Isi data saat tombol View diklik**
            document.querySelectorAll(".viewTempatBtn").forEach(button => {
                button.addEventListener("click", function() {
                    document.getElementById("viewNamaTempat").textContent = this.getAttribute(
                        "data-nama");
                    document.getElementById("viewKategori").textContent = this.getAttribute(
                        "data-kategori");
                    document.getElementById("viewAlamat").textContent = this.getAttribute(
                        "data-alamat");
                    document.getElementById("viewLatitude").textContent = this.getAttribute(
                        "data-latitude");
                    document.getElementById("viewLongitude").textContent = this.getAttribute(
                        "data-longitude");
                    document.getElementById("viewRatingGoogle").textContent = this.getAttribute(
                        "data-rating_google") || '-';
                    document.getElementById("viewRatingGofood").textContent = this.getAttribute(
                        "data-rating_gofood") || '-';
                    document.getElementById("viewRatingShopeefood").textContent = this.getAttribute(
                        "data-rating_shopeefood") || '-';
                    document.getElementById("viewRatingGrabfood").textContent = this.getAttribute(
                        "data-rating_grabfood") || '-';
                    document.getElementById("viewJumlahMakanan").textContent = this.getAttribute(
                        "data-jumlah_makanan") || '0';
                    document.getElementById("viewJumlahMinuman").textContent = this.getAttribute(
                        "data-jumlah_minuman") || '0';

                    // Handle Link Platform
                    let links = ['link_gmaps', 'link_gofood', 'link_shopeefood', 'link_grabfood'];
                    links.forEach(link => {
                        let elem = document.getElementById("view" + link.charAt(0)
                            .toUpperCase() + link.slice(1));
                        let url = this.getAttribute("data-" + link);
                        if (url) {
                            elem.innerHTML = `<a href="${url}" target="_blank">Lihat</a>`;
                        } else {
                            elem.innerHTML = "-";
                        }
                    });
                });
            });

            // **EDIT MODAL: Isi data saat tombol Edit diklik**
            document.querySelectorAll(".editTempatBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    document.getElementById("editTempatForm").action = "/tempat-kuliners/" + id;

                    // **Perbaikan untuk memastikan data tidak kosong**
                    document.getElementById("editNamaTempat").value = this.getAttribute(
                        "data-nama") || '';
                    document.getElementById("editKategori").value = this.getAttribute(
                        "data-kategori") || '';

                    document.getElementById("editAlamat").value = this.getAttribute(
                        "data-alamat") || '';
                    document.getElementById("editLatitude").value = this.getAttribute(
                        "data-latitude") || '';
                    document.getElementById("editLongitude").value = this.getAttribute(
                        "data-longitude") || '';
                    document.getElementById("editRatingGoogle").value = this.getAttribute(
                        "data-rating_google") || '';
                    document.getElementById("editRatingGofood").value = this.getAttribute(
                        "data-rating_gofood") || '';
                    document.getElementById("editRatingShopeefood").value = this.getAttribute(
                        "data-rating_shopeefood") || '';
                    document.getElementById("editRatingGrabfood").value = this.getAttribute(
                        "data-rating_grabfood") || '';
                    document.getElementById("editJumlahMakanan").value = this.getAttribute(
                        "data-jumlah_makanan") || '0';
                    document.getElementById("editJumlahMinuman").value = this.getAttribute(
                        "data-jumlah_minuman") || '0';

                    // Handle Link Platform
                    let links = ['link_gmaps', 'link_gofood', 'link_shopeefood', 'link_grabfood'];
                    links.forEach(link => {
                        document.getElementById("edit" + link.charAt(0).toUpperCase() + link
                                .slice(1)).value =
                            this.getAttribute("data-" + link) || '';
                    });
                });
            });

            // **DELETE MODAL: Isi data saat tombol Delete diklik**
            document.querySelectorAll(".deleteTempatBtn").forEach(button => {
                button.addEventListener("click", function() {
                    let id = this.getAttribute("data-id");
                    document.getElementById("deleteTempatForm").action = "/tempat-kuliners/" + id;
                    document.getElementById("deleteNamaTempat").textContent = this.getAttribute(
                        "data-nama");
                });
            });
        });
    </script>
@endpush

@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">Data Tempat Kuliner</h4>
        </div>
        <div class="main-dashboard-header-right">
            <button type="button" class="btn btn-primary btn-wave" data-bs-toggle="modal" data-bs-target="#modalAddTempat">
                Tambah Data
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="file-export" class="table table-bordered text-nowrap w-100">
                            <thead>
                                <tr>
                                    <th rowspan="2">Nama Tempat</th>
                                    <th rowspan="2">Kategori</th>
                                    <th colspan="4" class="text-center">Rating</th>
                                    <th rowspan="2">Jumlah Makanan</th>
                                    <th rowspan="2">Jumlah Minuman</th>
                                    <th rowspan="2">Aksi</th>
                                </tr>
                                <tr>
                                    <th>Google</th>
                                    <th>GoFood</th>
                                    <th>ShopeeFood</th>
                                    <th>GrabFood</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tempat_kuliners as $tempat)
                                    <tr>
                                        <td>{{ $tempat->nama }}</td>
                                        <td>{{ $tempat->kategori->nama_kategori }}</td>
                                        <td>{{ $tempat->preferensi->rating_google ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->rating_gofood ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->rating_shopeefood ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->rating_grabfood ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->jumlah_makanan ?? '0' }}</td>
                                        <td>{{ $tempat->preferensi->jumlah_minuman ?? '0' }}</td>
                                        <td>
                                            <button class="btn btn-info btn-icon viewTempatBtn"
                                                data-id="{{ $tempat->tempat_id }}" data-nama="{{ $tempat->nama }}"
                                                data-kategori="{{ $tempat->kategori->nama_kategori }}"
                                                data-alamat="{{ $tempat->alamat }}"
                                                data-latitude="{{ $tempat->latitude }}"
                                                data-longitude="{{ $tempat->longitude }}"
                                                data-rating_google="{{ $tempat->preferensi->rating_google ?? '' }}"
                                                data-rating_gofood="{{ $tempat->preferensi->rating_gofood ?? '' }}"
                                                data-rating_shopeefood="{{ $tempat->preferensi->rating_shopeefood ?? '' }}"
                                                data-rating_grabfood="{{ $tempat->preferensi->rating_grabfood ?? '' }}"
                                                data-jumlah_makanan="{{ $tempat->preferensi->jumlah_makanan ?? '0' }}"
                                                data-jumlah_minuman="{{ $tempat->preferensi->jumlah_minuman ?? '0' }}"
                                                data-link_gmaps="{{ $tempat->preferensi->link_gmaps ?? '' }}"
                                                data-link_gofood="{{ $tempat->preferensi->link_gofood ?? '' }}"
                                                data-link_shopeefood="{{ $tempat->preferensi->link_shopeefood ?? '' }}"
                                                data-link_grabfood="{{ $tempat->preferensi->link_grabfood ?? '' }}"
                                                data-bs-toggle="modal" data-bs-target="#modalViewTempat">
                                                <i class="ri-eye-fill"></i>
                                            </button>
                                            <button class="btn btn-warning btn-icon editTempatBtn"
                                                data-id="{{ $tempat->tempat_id }}" data-nama="{{ $tempat->nama }}"
                                                data-kategori="{{ $tempat->kategori->kategori_id }}" {{-- Gunakan ID kategori untuk dropdown --}}
                                                data-alamat="{{ $tempat->alamat }}"
                                                data-latitude="{{ $tempat->latitude }}"
                                                data-longitude="{{ $tempat->longitude }}"
                                                data-rating_google="{{ $tempat->preferensi->rating_google ?? '' }}"
                                                data-rating_gofood="{{ $tempat->preferensi->rating_gofood ?? '' }}"
                                                data-rating_shopeefood="{{ $tempat->preferensi->rating_shopeefood ?? '' }}"
                                                data-rating_grabfood="{{ $tempat->preferensi->rating_grabfood ?? '' }}"
                                                data-jumlah_makanan="{{ $tempat->preferensi->jumlah_makanan ?? '0' }}"
                                                data-jumlah_minuman="{{ $tempat->preferensi->jumlah_minuman ?? '0' }}"
                                                data-link_gmaps="{{ $tempat->preferensi->link_gmaps ?? '' }}"
                                                data-link_gofood="{{ $tempat->preferensi->link_gofood ?? '' }}"
                                                data-link_shopeefood="{{ $tempat->preferensi->link_shopeefood ?? '' }}"
                                                data-link_grabfood="{{ $tempat->preferensi->link_grabfood ?? '' }}"
                                                data-bs-toggle="modal" data-bs-target="#modalEditTempat">
                                                <i class="ri-pencil-line"></i>
                                            </button>

                                            <button class="btn btn-danger btn-icon deleteTempatBtn"
                                                data-id="{{ $tempat->tempat_id }}" data-bs-toggle="modal"
                                                data-bs-target="#modalDeleteTempat">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @include('admin.pages.data.tempat-kuliner.modals')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
