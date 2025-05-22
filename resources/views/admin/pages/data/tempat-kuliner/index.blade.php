@extends('layouts.app')

@push('style')
    @include('admin.pages.data.datatable-style')
@endpush

@push('scripts')
    @include('admin.pages.data.datatable-script')

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
                        "data-rating_go_food") || '-';
                    document.getElementById("viewRatingShopeefood").textContent = this.getAttribute(
                        "data-rating_shopee_food") || '-';
                    document.getElementById("viewRatingGrabfood").textContent = this.getAttribute(
                        "data-rating_grab_food") || '-';
                    document.getElementById("viewJumlahMakanan").textContent = this.getAttribute(
                        "data-jumlah_makanan") || '0';
                    document.getElementById("viewJumlahMinuman").textContent = this.getAttribute(
                        "data-jumlah_minuman") || '0';

                    // Handle Link Platform - Perbaikan
                    const linkGmaps = this.getAttribute("data-link_gmaps");
                    const linkGofood = this.getAttribute("data-link_gofood");
                    const linkShopeefood = this.getAttribute("data-link_shopeefood");
                    const linkGrabfood = this.getAttribute("data-link_grabfood");

                    // Set href attribute pada tag <a>
                    if (linkGmaps) {
                        document.getElementById("viewLinkGmaps").href = linkGmaps;
                        document.getElementById("viewLinkGmaps").textContent = "Lihat";
                    } else {
                        document.getElementById("viewLinkGmaps").removeAttribute("href");
                        document.getElementById("viewLinkGmaps").textContent = "-";
                    }

                    if (linkGofood) {
                        document.getElementById("viewLinkGofood").href = linkGofood;
                        document.getElementById("viewLinkGofood").textContent = "Lihat";
                    } else {
                        document.getElementById("viewLinkGofood").removeAttribute("href");
                        document.getElementById("viewLinkGofood").textContent = "-";
                    }

                    if (linkShopeefood) {
                        document.getElementById("viewLinkShopeefood").href = linkShopeefood;
                        document.getElementById("viewLinkShopeefood").textContent = "Lihat";
                    } else {
                        document.getElementById("viewLinkShopeefood").removeAttribute("href");
                        document.getElementById("viewLinkShopeefood").textContent = "-";
                    }

                    if (linkGrabfood) {
                        document.getElementById("viewLinkGrabfood").href = linkGrabfood;
                        document.getElementById("viewLinkGrabfood").textContent = "Lihat";
                    } else {
                        document.getElementById("viewLinkGrabfood").removeAttribute("href");
                        document.getElementById("viewLinkGrabfood").textContent = "-";
                    }
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
                        "data-rating_go_food") || '';
                    document.getElementById("editRatingShopeefood").value = this.getAttribute(
                        "data-rating_shopee_food") || '';
                    document.getElementById("editRatingGrabfood").value = this.getAttribute(
                        "data-rating_grab_food") || '';
                    document.getElementById("editJumlahMakanan").value = this.getAttribute(
                        "data-jumlah_makanan") || '0';
                    document.getElementById("editJumlahMinuman").value = this.getAttribute(
                        "data-jumlah_minuman") || '0';

                    // Handle Link Platform - Perbaikan
                    document.getElementById("editLinkGmaps").value = this.getAttribute(
                        "data-link_gmaps") || '';
                    document.getElementById("editLinkGofood").value = this.getAttribute(
                        "data-link_gofood") || '';
                    document.getElementById("editLinkShopeefood").value = this.getAttribute(
                        "data-link_shopeefood") || '';
                    document.getElementById("editLinkGrabfood").value = this.getAttribute(
                        "data-link_grabfood") || '';

                    // Log untuk debug
                    console.log("Link GMaps:", this.getAttribute("data-link_gmaps"));
                    console.log("Link GoFood:", this.getAttribute("data-link_gofood"));
                    console.log("Link ShopeeFood:", this.getAttribute("data-link_shopeefood"));
                    console.log("Link GrabFood:", this.getAttribute("data-link_grabfood"));
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
                                        <td>{{ $tempat->preferensi->rating_go_food ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->rating_shopee_food ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->rating_grab_food ?? '-' }}</td>
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
                                                data-rating_go_food="{{ $tempat->preferensi->rating_go_food ?? '' }}"
                                                data-rating_shopee_food="{{ $tempat->preferensi->rating_shopee_food ?? '' }}"
                                                data-rating_grab_food="{{ $tempat->preferensi->rating_grab_food ?? '' }}"
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
                                                data-rating_go_food="{{ $tempat->preferensi->rating_go_food ?? '' }}"
                                                data-rating_shopee_food="{{ $tempat->preferensi->rating_shopee_food ?? '' }}"
                                                data-rating_grab_food="{{ $tempat->preferensi->rating_grab_food ?? '' }}"
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
                                                data-id="{{ $tempat->tempat_id }}" data-nama="{{ $tempat->nama }}"
                                                data-bs-toggle="modal" data-bs-target="#modalDeleteTempat">
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
