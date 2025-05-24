<!-- Modal Tambah Tempat Kuliner -->
<div class="modal fade" id="modalAddTempat" tabindex="-1" aria-labelledby="modalAddTempatLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tempat Kuliner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('tempat-kuliners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- 🔹 KIRI: Data Tempat Kuliner -->
                        <div class="col-md-6">
                            <h6 class="text-primary"><i class="ri-map-pin-line me-1"></i>Data Tempat Kuliner</h6>

                            <!-- Upload Foto -->
                            <div class="mb-3">
                                <label class="form-label">Upload Foto Tempat</label>
                                <input type="file" class="form-control" name="foto" accept="image/*"
                                    onchange="previewAddImage(this)">
                                <small class="form-text text-muted">Format: JPG, PNG, GIF, WEBP. Maksimal 5MB.</small>
                                <div id="addImagePreview" class="mt-2"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-control" name="kategori_id" required>
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Tempat</label>
                                <input type="text" class="form-control" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" rows="2" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Latitude</label>
                                        <input type="text" class="form-control" name="latitude" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Longitude</label>
                                        <input type="text" class="form-control" name="longitude" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 🔹 KANAN: Preferensi Tempat Kuliner -->
                        <div class="col-md-6">
                            <h6 class="text-primary"><i class="ri-star-line me-1"></i>Preferensi Tempat Kuliner</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Rating Google</label>
                                        <input type="number" step="0.1" max="5" min="0"
                                            class="form-control" name="rating_google" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating GoFood</label>
                                        <input type="number" step="0.1" max="5" min="0"
                                            class="form-control" name="rating_go_food" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating ShopeeFood</label>
                                        <input type="number" step="0.1" max="5" min="0"
                                            class="form-control" name="rating_shopee_food" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating GrabFood</label>
                                        <input type="number" step="0.1" max="5" min="0"
                                            class="form-control" name="rating_grab_food" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Makanan</label>
                                        <input type="number" min="0" class="form-control"
                                            name="jumlah_makanan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Minuman</label>
                                        <input type="number" min="0" class="form-control"
                                            name="jumlah_minuman" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link Gmaps</label>
                                        <input type="url" class="form-control" name="link_gmaps" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link GoFood</label>
                                        <input type="url" class="form-control" name="link_gofood" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Link ShopeeFood</label>
                                        <input type="url" class="form-control" name="link_shopeefood" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Link GrabFood</label>
                                        <input type="url" class="form-control" name="link_grabfood" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="ri-save-line me-1"></i>Simpan
                    </button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Tempat Kuliner -->
<div class="modal fade" id="modalEditTempat" tabindex="-1" aria-labelledby="modalEditTempatLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Tempat Kuliner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editTempatForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <!-- 🔹 KIRI: Data Tempat Kuliner -->
                        <div class="col-md-6">
                            <h6 class="text-primary"><i class="ri-map-pin-line me-1"></i>Data Tempat Kuliner</h6>

                            <!-- Current Foto Display -->
                            <div id="currentFotoContainer" class="mb-3"></div>

                            <!-- Upload Foto Baru -->
                            <div class="mb-3">
                                <label class="form-label">Upload Foto Baru (Opsional)</label>
                                <input type="file" class="form-control" name="foto" accept="image/*"
                                    onchange="previewEditImage(this)">
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah
                                    foto.</small>
                                <div id="editImagePreview" class="mt-2"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kategori</label>
                                <select class="form-control" name="kategori_id" id="editKategori" required>
                                    @foreach ($kategoris as $kategori)
                                        <option value="{{ $kategori->kategori_id }}">{{ $kategori->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Tempat</label>
                                <input type="text" class="form-control" id="editNamaTempat" name="nama"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alamat</label>
                                <textarea class="form-control" id="editAlamat" name="alamat" rows="2" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Latitude</label>
                                        <input type="text" class="form-control" id="editLatitude" name="latitude"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Longitude</label>
                                        <input type="text" class="form-control" id="editLongitude"
                                            name="longitude" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- 🔹 KANAN: Preferensi Tempat Kuliner -->
                        <div class="col-md-6">
                            <h6 class="text-primary"><i class="ri-star-line me-1"></i>Preferensi Tempat Kuliner</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Rating Google</label>
                                        <input type="number" step="0.1" max="5" min="0"
                                            class="form-control" id="editRatingGoogle" name="rating_google" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating GoFood</label>
                                        <input type="number" step="0.1" max="5" min="0"
                                            class="form-control" id="editRatingGofood" name="rating_go_food"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating ShopeeFood</label>
                                        <input type="number" step="0.1" max="5" min="0"
                                            class="form-control" id="editRatingShopeefood" name="rating_shopee_food"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating GrabFood</label>
                                        <input type="number" step="0.1" max="5" min="0"
                                            class="form-control" id="editRatingGrabfood" name="rating_grab_food"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Makanan</label>
                                        <input type="number" min="0" class="form-control"
                                            id="editJumlahMakanan" name="jumlah_makanan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Minuman</label>
                                        <input type="number" min="0" class="form-control"
                                            id="editJumlahMinuman" name="jumlah_minuman" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link Gmaps</label>
                                        <input type="url" class="form-control" id="editLinkGmaps"
                                            name="link_gmaps" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link GoFood</label>
                                        <input type="url" class="form-control" id="editLinkGofood"
                                            name="link_gofood" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Link ShopeeFood</label>
                                        <input type="url" class="form-control" id="editLinkShopeefood"
                                            name="link_shopeefood" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Link GrabFood</label>
                                        <input type="url" class="form-control" id="editLinkGrabfood"
                                            name="link_grabfood" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">
                        <i class="ri-edit-line me-1"></i>Update
                    </button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal View Tempat Kuliner -->
<div class="modal fade" id="modalViewTempat" tabindex="-1" aria-labelledby="modalViewTempatLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Tempat Kuliner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- 🔹 KIRI: Data Tempat Kuliner -->
                    <div class="col-md-6">
                        <h6 class="text-primary"><i class="ri-map-pin-line me-1"></i>Data Tempat Kuliner</h6>

                        <!-- Foto Display -->
                        <div class="mb-3">
                            <label class="form-label">Foto Tempat:</label>
                            <div id="viewFotoContainer"></div>
                        </div>

                        <p><strong>Nama Tempat:</strong> <span id="viewNamaTempat"></span></p>
                        <p><strong>Kategori:</strong> <span id="viewKategori"></span></p>
                        <p><strong>Alamat:</strong> <span id="viewAlamat"></span></p>
                        <p><strong>Koordinat:</strong> <span id="viewLatitude"></span>, <span
                                id="viewLongitude"></span></p>
                    </div>

                    <!-- 🔹 KANAN: Preferensi Tempat Kuliner -->
                    <div class="col-md-6">
                        <h6 class="text-primary"><i class="ri-star-line me-1"></i>Preferensi Tempat Kuliner</h6>

                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Rating Google:</strong> <span id="viewRatingGoogle"
                                        class="badge bg-info"></span></p>
                                <p><strong>Rating GoFood:</strong> <span id="viewRatingGofood"
                                        class="badge bg-success"></span></p>
                                <p><strong>Rating ShopeeFood:</strong> <span id="viewRatingShopeefood"
                                        class="badge bg-danger"></span></p>
                                <p><strong>Rating GrabFood:</strong> <span id="viewRatingGrabfood"
                                        class="badge bg-warning"></span></p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Jumlah Makanan:</strong> <span id="viewJumlahMakanan"
                                        class="badge bg-secondary"></span></p>
                                <p><strong>Jumlah Minuman:</strong> <span id="viewJumlahMinuman"
                                        class="badge bg-light text-dark"></span></p>
                            </div>
                        </div>

                        <h6 class="text-primary mt-3"><i class="ri-links-line me-1"></i>Platform Links</h6>
                        <p><strong>Google Maps:</strong> <a id="viewLinkGmaps" href="#" target="_blank"
                                class="btn btn-sm btn-outline-primary">-</a></p>
                        <p><strong>GoFood:</strong> <a id="viewLinkGofood" href="#" target="_blank"
                                class="btn btn-sm btn-outline-success">-</a></p>
                        <p><strong>ShopeeFood:</strong> <a id="viewLinkShopeefood" href="#" target="_blank"
                                class="btn btn-sm btn-outline-danger">-</a></p>
                        <p><strong>GrabFood:</strong> <a id="viewLinkGrabfood" href="#" target="_blank"
                                class="btn btn-sm btn-outline-warning">-</a></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Hapus Tempat Kuliner -->
<div class="modal fade" id="modalDeleteTempat" tabindex="-1" aria-labelledby="modalDeleteTempatLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="deleteTempatForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <div class="text-center">
                        <i class="ri-delete-bin-line text-danger" style="font-size: 3rem;"></i>
                        <h5 class="mt-3">Yakin ingin menghapus?</h5>
                        <p>Tempat kuliner <strong id="deleteNamaTempat"></strong> akan dihapus secara permanen beserta
                            semua data preferensinya.</p>
                        <div class="alert alert-warning">
                            <small><i class="ri-alert-line"></i> Tindakan ini tidak dapat dibatalkan!</small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">
                        <i class="ri-delete-bin-line me-1"></i>Ya, Hapus
                    </button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Preview image untuk Add Modal
    function previewAddImage(input) {
        const preview = document.getElementById('addImagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                <div class="preview-container">
                    <img src="${e.target.result}" class="img-thumbnail" style="max-height: 120px;" alt="Preview">
                    <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="clearAddPreview()">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
            `;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Clear preview untuk Add Modal
    function clearAddPreview() {
        document.querySelector('input[name="foto"]').value = '';
        document.getElementById('addImagePreview').innerHTML = '';
    }

    // Preview image untuk Edit Modal
    function previewEditImage(input) {
        const preview = document.getElementById('editImagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `
                <div class="preview-container">
                    <label class="form-label">Preview Foto Baru:</label>
                    <div>
                        <img src="${e.target.result}" class="img-thumbnail" style="max-height: 120px;" alt="Preview">
                        <button type="button" class="btn btn-sm btn-outline-danger ms-2" onclick="clearEditPreview()">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                </div>
            `;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Clear preview untuk Edit Modal
    function clearEditPreview() {
        document.querySelector('#editTempatForm input[name="foto"]').value = '';
        document.getElementById('editImagePreview').innerHTML = '';
    }
</script>
