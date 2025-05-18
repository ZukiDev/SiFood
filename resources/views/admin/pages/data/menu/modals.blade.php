<!-- Modal Tambah Menu Batch -->
<div class="modal fade" id="modalAddMenu" tabindex="-1" aria-labelledby="modalAddMenuLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddMenuLabel">Tambah Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('menus.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-4">
                        <label for="tempatKuliner" class="form-label">Tempat Kuliner</label>
                        <select class="form-select" id="tempatKuliner" name="tempat_id" required>
                            <option value="" selected disabled>Pilih Tempat Kuliner</option>
                            @foreach ($tempatKuliners as $tempat)
                                <option value="{{ $tempat->tempat_id }}">{{ $tempat->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <h6 class="fw-semibold mb-3">Data Menu</h6>

                    @for ($i = 1; $i <= 6; $i++)
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namaMenu{{ $i }}" class="form-label">Nama Menu
                                        {{ $i }}</label>
                                    <input type="text" class="form-control" id="namaMenu{{ $i }}"
                                        name="menu[{{ $i }}][nama_menu]" {{ $i == 1 ? 'required' : '' }}>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsiMenu{{ $i }}" class="form-label">Jenis Menu
                                        {{ $i }}</label>
                                    <select class="form-select" id="deskripsiMenu{{ $i }}"
                                        name="menu[{{ $i }}][deskripsi]" {{ $i == 1 ? 'required' : '' }}>
                                        <option value="" selected disabled>Pilih Jenis</option>
                                        <option value="makanan">Makanan</option>
                                        <option value="minuman">Minuman</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    @endfor

                    <div class="alert alert-info" role="alert">
                        <i class="ri-information-line me-1"></i> Minimal isi satu menu. Menu yang memiliki nama kosong
                        akan diabaikan.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Semua</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal View Menu -->
<div class="modal fade" id="modalViewMenu" tabindex="-1" aria-labelledby="modalViewMenuLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalViewMenuLabel">Detail Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Nama Menu:</strong> <span id="viewNamaMenu"></span></p>
                <p><strong>Tempat Kuliner:</strong> <span id="viewTempatKuliner"></span></p>
                <p><strong>Jenis Menu:</strong> <span id="viewDeskripsiMenu"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Menu -->
<div class="modal fade" id="modalEditMenu" tabindex="-1" aria-labelledby="modalEditMenuLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEditMenuLabel">Edit Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editMenuForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editTempatKuliner" class="form-label">Tempat Kuliner</label>
                        <select class="form-select" id="editTempatKuliner" name="tempat_id" required>
                            <option value="" disabled>Pilih Tempat Kuliner</option>
                            @foreach ($tempatKuliners as $tempat)
                                <option value="{{ $tempat->tempat_id }}">{{ $tempat->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editNamaMenu" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" id="editNamaMenu" name="nama_menu" required>
                    </div>
                    <div class="mb-3">
                        <label for="editDeskripsiMenu" class="form-label">Jenis Menu</label>
                        <select class="form-select" id="editDeskripsiMenu" name="deskripsi" required>
                            <option value="" disabled>Pilih Jenis</option>
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
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

<!-- Modal Hapus Menu -->
<div class="modal fade" id="modalDeleteMenu" tabindex="-1" aria-labelledby="modalDeleteMenuLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteMenuLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="deleteMenuForm" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Apakah Anda yakin ingin menghapus Menu <strong id="deleteNamaMenu"></strong>?</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>
