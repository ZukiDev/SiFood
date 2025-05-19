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
                    </div>
                    <div class="mb-3">
                        <label for="bobotKriteria" class="form-label">Bobot</label>
                        <input type="text" class="form-control" id="bobotKriteria" name="bobot" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsiKriteria" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsiKriteria" name="deskripsi">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form> <!-- <== Form ditutup di sini -->
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
                <p><strong>Nama Kriteria:</strong> <span id="viewNamaKriteria"></span></p>
                <p><strong>Bobot:</strong> <span id="viewBobotKriteria"></span></p>
                <p><strong>Deskripsi:</strong> <span id="viewDeskripsiKriteria"></span></p>
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
                    </div>
                    <div class="mb-3">
                        <label for="editBobotKriteria" class="form-label">Bobot</label>
                        <input type="text" class="form-control" id="editBobotKriteria" name="bobot" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsiKriteria" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="editDeskripsiKriteria" name="deskripsi">
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
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
