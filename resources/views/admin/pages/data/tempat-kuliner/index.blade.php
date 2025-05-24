@extends('layouts.app')

@push('style')
    @include('admin.pages.data.datatable-style')
    <style>
        .foto-preview {
            width: 60px;
            height: 45px;
            object-fit: cover;
            border-radius: 5px;
            cursor: pointer;
        }

        .foto-preview:hover {
            opacity: 0.8;
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
    </style>
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

                    // Handle Foto Display
                    const fotoUrl = this.getAttribute("data-foto");
                    const fotoContainer = document.getElementById("viewFotoContainer");
                    if (fotoUrl && fotoUrl !== '') {
                        fotoContainer.innerHTML =
                            `<img src="${fotoUrl}" class="img-fluid rounded" style="max-height: 200px;" alt="Foto Tempat">`;
                    } else {
                        fotoContainer.innerHTML = '<p class="text-muted">Tidak ada foto</p>';
                    }

                    // Handle Link Platform
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

                    // Set form values
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
                    document.getElementById("editLinkGmaps").value = this.getAttribute(
                        "data-link_gmaps") || '';
                    document.getElementById("editLinkGofood").value = this.getAttribute(
                        "data-link_gofood") || '';
                    document.getElementById("editLinkShopeefood").value = this.getAttribute(
                        "data-link_shopeefood") || '';
                    document.getElementById("editLinkGrabfood").value = this.getAttribute(
                        "data-link_grabfood") || '';

                    // Handle Current Foto Display
                    const fotoUrl = this.getAttribute("data-foto");
                    const currentFotoContainer = document.getElementById("currentFotoContainer");
                    if (fotoUrl && fotoUrl !== '') {
                        currentFotoContainer.innerHTML = `
                            <div class="current-foto mb-2">
                                <label class="form-label">Foto Saat Ini:</label>
                                <div>
                                    <img src="${fotoUrl}" class="img-thumbnail" style="max-height: 120px;" alt="Current Photo">
                                    <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="deleteFoto(${id})">
                                        <i class="ri-delete-bin-line"></i> Hapus Foto
                                    </button>
                                </div>
                            </div>
                        `;
                    } else {
                        currentFotoContainer.innerHTML =
                            '<p class="text-muted small">Belum ada foto</p>';
                    }
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

        // Function untuk delete foto saja
        function deleteFoto(id) {
            if (confirm('Yakin ingin menghapus foto ini?')) {
                // Create form untuk delete foto
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/tempat-kuliners/${id}/delete-foto`;

                const csrfToken = document.createElement('input');
                csrfToken.type = 'hidden';
                csrfToken.name = '_token';
                csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                const methodField = document.createElement('input');
                methodField.type = 'hidden';
                methodField.name = '_method';
                methodField.value = 'DELETE';

                form.appendChild(csrfToken);
                form.appendChild(methodField);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endpush

@section('content')
    <div class="d-md-flex d-block align-items-center justify-content-between my-4 page-header-breadcrumb">
        <div>
            <h4 class="mb-0">Data Tempat Kuliner</h4>
            <p class="text-muted mb-0">Kelola data tempat kuliner dan preferensinya</p>
        </div>
        <div class="main-dashboard-header-right">
            <button type="button" class="btn btn-primary btn-wave" data-bs-toggle="modal" data-bs-target="#modalAddTempat">
                <i class="ri-add-line me-1"></i> Tambah Data
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
                                    <th rowspan="2">Foto</th>
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
                                        <td class="text-center">
                                            <img src="{{ $tempat->foto_url }}" alt="{{ $tempat->nama }}"
                                                class="foto-preview"
                                                onclick="showImageModal('{{ $tempat->foto_url }}', '{{ $tempat->nama }}')">
                                        </td>
                                        <td>
                                            <strong>{{ $tempat->nama }}</strong>
                                            <br><small class="text-muted">{{ Str::limit($tempat->alamat, 30) }}</small>
                                        </td>
                                        <td>{{ $tempat->kategori->nama_kategori }}</td>
                                        <td>{{ $tempat->preferensi->rating_google ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->rating_go_food ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->rating_shopee_food ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->rating_grab_food ?? '-' }}</td>
                                        <td>{{ $tempat->preferensi->jumlah_makanan ?? '0' }}</td>
                                        <td>{{ $tempat->preferensi->jumlah_minuman ?? '0' }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button class="btn btn-info btn-icon btn-sm viewTempatBtn"
                                                    data-id="{{ $tempat->tempat_id }}" data-nama="{{ $tempat->nama }}"
                                                    data-kategori="{{ $tempat->kategori->nama_kategori }}"
                                                    data-alamat="{{ $tempat->alamat }}"
                                                    data-latitude="{{ $tempat->latitude }}"
                                                    data-longitude="{{ $tempat->longitude }}"
                                                    data-foto="{{ $tempat->foto_url }}"
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
                                                    data-bs-toggle="modal" data-bs-target="#modalViewTempat"
                                                    title="Lihat Detail">
                                                    <i class="ri-eye-fill"></i>
                                                </button>

                                                <button class="btn btn-warning btn-icon btn-sm editTempatBtn"
                                                    data-id="{{ $tempat->tempat_id }}" data-nama="{{ $tempat->nama }}"
                                                    data-kategori="{{ $tempat->kategori->kategori_id }}"
                                                    data-alamat="{{ $tempat->alamat }}"
                                                    data-latitude="{{ $tempat->latitude }}"
                                                    data-longitude="{{ $tempat->longitude }}"
                                                    data-foto="{{ $tempat->foto_url }}"
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
                                                    data-bs-toggle="modal" data-bs-target="#modalEditTempat" title="Edit">
                                                    <i class="ri-pencil-line"></i>
                                                </button>

                                                <button class="btn btn-danger btn-icon btn-sm deleteTempatBtn"
                                                    data-id="{{ $tempat->tempat_id }}" data-nama="{{ $tempat->nama }}"
                                                    data-bs-toggle="modal" data-bs-target="#modalDeleteTempat"
                                                    title="Hapus">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            </div>
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

    <!-- Modal Preview Gambar -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePreviewTitle">Preview Foto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="imagePreviewImg" src="" alt="" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <script>
        function showImageModal(imageUrl, title) {
            document.getElementById('imagePreviewImg').src = imageUrl;
            document.getElementById('imagePreviewTitle').textContent = `Foto: ${title}`;
            new bootstrap.Modal(document.getElementById('imagePreviewModal')).show();
        }
    </script>
@endsection
