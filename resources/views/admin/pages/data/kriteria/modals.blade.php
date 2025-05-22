<!-- Modal Tambah Kriteria -->
<div class="modal fade" id="modalAddKriteria" tabindex="-1" aria-labelledby="modalAddKriteriaLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddKriteriaLabel">Tambah Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('kriterias.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namaKriteria" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" id="namaKriteria" name="nama_kriteria" required>
                        <small class="form-text text-muted">Slug akan dibuat otomatis dari nama
                            kriteria</small>
                    </div>
                    <!-- Bobot dihapus dari form, akan dihitung otomatis -->
                    <div class="mb-3">
                        <label for="deskripsiKriteria" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsiKriteria" name="deskripsi" rows="3"
                            placeholder="Masukkan deskripsi kriteria (opsional)"></textarea>
                    </div>
                    <div class="alert alert-info" role="alert">
                        <i class="ri-information-line"></i>
                        <strong>Info:</strong> Bobot kriteria akan dihitung otomatis menggunakan metode ROC (Rank Order
                        Centroid) berdasarkan urutan kriteria.
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

<!-- Modal View Kriteria -->
<div class="modal fade" id="modalViewKriteria" tabindex="-1" aria-labelledby="modalViewKriteriaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalViewKriteriaLabel">Detail Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <p><strong>Nama Kriteria:</strong> <span id="viewNamaKriteria"></span></p>
                        <p><strong>Slug:</strong> <span id="viewSlugKriteria" class="badge bg-secondary"></span></p>
                        <p><strong>Bobot ROC:</strong> <span id="viewBobotKriteria" class="badge bg-primary"></span></p>
                        <p><strong>Deskripsi:</strong> <span id="viewDeskripsiKriteria"></span></p>
                    </div>
                </div>
                <div class="alert alert-light mt-3" role="alert">
                    <small><i class="ri-lightbulb-line"></i> <strong>Catatan:</strong> Bobot dihitung otomatis
                        menggunakan metode ROC berdasarkan urutan prioritas kriteria.</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Kriteria -->
<div class="modal fade" id="modalEditKriteria" tabindex="-1" aria-labelledby="modalEditKriteriaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditKriteriaLabel">Edit Kriteria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editKriteriaForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editNamaKriteria" class="form-label">Nama Kriteria</label>
                        <input type="text" class="form-control" id="editNamaKriteria" name="nama_kriteria" required>
                        <small class="form-text text-muted">Slug akan diupdate otomatis jika nama
                            berubah</small>
                    </div>
                    <!-- Slug otomatis, tidak perlu input manual -->
                    <div class="mb-3">
                        <label for="editSlugKriteria" class="form-label">Slug (Otomatis)</label>
                        <input type="text" class="form-control" id="editSlugKriteria" readonly disabled
                            style="background-color: #f8f9fa;">
                        <small class="form-text text-muted">Slug dibuat otomatis dari nama kriteria</small>
                    </div>
                    <!-- Bobot tidak bisa diedit, hanya ditampilkan -->
                    <div class="mb-3">
                        <label for="editBobotKriteria" class="form-label">Bobot ROC (Otomatis)</label>
                        <input type="text" class="form-control" id="editBobotKriteria" readonly disabled
                            style="background-color: #f8f9fa;">
                        <small class="form-text text-muted">Bobot dihitung otomatis dan tidak dapat diubah
                            manual.</small>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsiKriteria" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="editDeskripsiKriteria" name="deskripsi" rows="3"></textarea>
                    </div>
                    <div class="alert alert-warning" role="alert">
                        <i class="ri-alert-line"></i>
                        <strong>Perhatian:</strong> Setelah update, bobot semua kriteria akan dihitung ulang secara
                        otomatis.
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

<!-- Modal Hapus Kriteria -->
<div class="modal fade" id="modalDeleteKriteria" tabindex="-1" aria-labelledby="modalDeleteKriteriaLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteKriteriaLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteKriteriaForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Kriteria <strong id="deleteNamaKriteria"></strong>?</p>
                    <div class="alert alert-danger" role="alert">
                        <i class="ri-error-warning-line"></i>
                        <strong>Peringatan:</strong> Setelah menghapus kriteria ini, bobot semua kriteria yang tersisa
                        akan dihitung ulang secara otomatis.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
