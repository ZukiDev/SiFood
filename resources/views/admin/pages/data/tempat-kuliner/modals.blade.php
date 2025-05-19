<!-- Modal Tambah Tempat Kuliner -->
<div class="modal fade" id="modalAddTempat" tabindex="-1" aria-labelledby="modalAddTempatLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Tempat Kuliner</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('tempat-kuliners.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- 🔹 KIRI: Data Tempat Kuliner -->
                        <div class="col-md-6">
                            <h6 class="text-primary">Data Tempat Kuliner</h6>
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
                                <textarea class="form-control" name="alamat" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Latitude</label>
                                <input type="text" class="form-control" name="latitude" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Longitude</label>
                                <input type="text" class="form-control" name="longitude" required>
                            </div>
                        </div>

                        <!-- 🔹 KANAN: Preferensi Tempat Kuliner -->
                        <div class="col-md-6">
                            <h6 class="text-primary">Preferensi Tempat Kuliner</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Rating Google</label>
                                        <input type="number" step="0.1" class="form-control" name="rating_google"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating GoFood</label>
                                        <input type="number" step="0.1" class="form-control" name="rating_gofood"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating ShopeeFood</label>
                                        <input type="number" step="0.1" class="form-control"
                                            name="rating_shopeefood" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating GrabFood</label>
                                        <input type="number" step="0.1" class="form-control" name="rating_grabfood"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Makanan</label>
                                        <input type="number" class="form-control" name="jumlah_makanan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Minuman</label>
                                        <input type="number" class="form-control" name="jumlah_minuman" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link Gmaps</label>
                                        <input type="url" class="form-control" name="link_gmaps" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link GoFood</label>
                                        <input type="url" class="form-control" name="link_gofood" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Link ShopeeFood</label>
                                        <input type="url" class="form-control" name="link_shopeefood" required>
                                    </div>
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
            <form id="editTempatForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <!-- 🔹 KIRI: Data Tempat Kuliner -->
                        <div class="col-md-6">
                            <h6 class="text-primary">Data Tempat Kuliner</h6>
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
                                <textarea class="form-control" id="editAlamat" name="alamat" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Latitude</label>
                                <input type="text" class="form-control" id="editLatitude" name="latitude"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Longitude</label>
                                <input type="text" class="form-control" id="editLongitude" name="longitude"
                                    required>
                            </div>
                        </div>

                        <!-- 🔹 KANAN: Preferensi Tempat Kuliner -->
                        <div class="col-md-6">
                            <h6 class="text-primary">Preferensi Tempat Kuliner</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Rating Google</label>
                                        <input type="number" step="0.1" class="form-control"
                                            id="editRatingGoogle" name="rating_google" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating GoFood</label>
                                        <input type="number" step="0.1" class="form-control"
                                            id="editRatingGofood" name="rating_gofood" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating ShopeeFood</label>
                                        <input type="number" step="0.1" class="form-control"
                                            id="editRatingShopeefood" name="rating_shopeefood" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Rating GrabFood</label>
                                        <input type="number" step="0.1" class="form-control"
                                            id="editRatingGrabfood" name="rating_grabfood" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Makanan</label>
                                        <input type="number" class="form-control" id="editJumlahMakanan"
                                            name="jumlah_makanan" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Jumlah Minuman</label>
                                        <input type="number" class="form-control" id="editJumlahMinuman"
                                            name="jumlah_minuman" required>
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
                                    <div class="mb-3">
                                        <label class="form-label">Link ShopeeFood</label>
                                        <input type="url" class="form-control" id="editLinkShopeefood"
                                            name="link_shopeefood" required>
                                    </div>
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
                    <button type="submit" class="btn btn-warning">Update</button>
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
                        <h6 class="text-primary">Data Tempat Kuliner</h6>
                        <p><strong>Nama Tempat:</strong> <span id="viewNamaTempat"></span></p>
                        <p><strong>Kategori:</strong> <span id="viewKategori"></span></p>
                        <p><strong>Alamat:</strong> <span id="viewAlamat"></span></p>
                        <p><strong>Latitude:</strong> <span id="viewLatitude"></span></p>
                        <p><strong>Longitude:</strong> <span id="viewLongitude"></span></p>
                    </div>

                    <!-- 🔹 KANAN: Preferensi Tempat Kuliner -->
                    <div class="col-md-6">
                        <h6 class="text-primary">Preferensi Tempat Kuliner</h6>
                        <p><strong>Rating Google:</strong> <span id="viewRatingGoogle"></span></p>
                        <p><strong>Rating GoFood:</strong> <span id="viewRatingGofood"></span></p>
                        <p><strong>Rating ShopeeFood:</strong> <span id="viewRatingShopeefood"></span></p>
                        <p><strong>Rating GrabFood:</strong> <span id="viewRatingGrabfood"></span></p>
                        <p><strong>Jumlah Makanan:</strong> <span id="viewJumlahMakanan"></span></p>
                        <p><strong>Jumlah Minuman:</strong> <span id="viewJumlahMinuman"></span></p>
                        <p><strong>Link Gmaps:</strong> <a id="viewLinkGmaps" href="#"
                                target="_blank">Lihat</a></p>
                        <p><strong>Link GoFood:</strong> <a id="viewLinkGofood" href="#"
                                target="_blank">Lihat</a></p>
                        <p><strong>Link ShopeeFood:</strong> <a id="viewLinkShopeefood" href="#"
                                target="_blank">Lihat</a></p>
                        <p><strong>Link GrabFood:</strong> <a id="viewLinkGrabfood" href="#"
                                target="_blank">Lihat</a></p>
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
                    <p>Apakah Anda yakin ingin menghapus tempat kuliner <strong id="deleteNamaTempat"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
