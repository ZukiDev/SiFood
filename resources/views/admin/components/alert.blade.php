@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <div class="d-flex align-items-center">
            <i class="ri-checkbox-circle-line me-2 fs-20"></i>
            <span><strong>Sukses!</strong> {{ session('success') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <div class="d-flex align-items-center">
            <i class="ri-error-warning-line me-2 fs-20"></i>
            <span><strong>Error!</strong> {{ session('error') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
        <div class="d-flex align-items-center">
            <i class="ri-alert-line me-2 fs-20"></i>
            <span><strong>Perhatian!</strong> {{ session('warning') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info alert-dismissible fade show mt-3" role="alert">
        <div class="d-flex align-items-center">
            <i class="ri-information-line me-2 fs-20"></i>
            <span><strong>Informasi:</strong> {{ session('info') }}</span>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
        <div class="d-flex">
            <i class="ri-error-warning-line me-2 fs-20 mt-1"></i>
            <div>
                <strong>Terdapat error:</strong>
                <ul class="mb-0 ps-3 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
