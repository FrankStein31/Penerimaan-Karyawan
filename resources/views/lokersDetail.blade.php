@extends('layouts.admin')
@section('main-content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Detail Lowongan Kerja</h1>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-primary mb-4">{{ $loker->name }}</h2>
            
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-building me-2"></i> <strong>Departemen:</strong> {{ $loker->department->name }}</li>
                        <li class="mb-3"><i class="fas fa-user-tie me-2"></i> <strong>Posisi:</strong> {{ $loker->position->name }}</li>
                        <!-- <li class="mb-3"><i class="fas fa-users me-2"></i> <strong>Batas Pengajuan:</strong> {{ $loker->max_applicants }}</li> -->
                        <!-- <li class="mb-3"><i class="fas fa-money-bill-wave me-2"></i> <strong>Gaji:</strong> Rp {{ number_format($loker->salary, 0, ',', '.') }}</li> -->
                    </ul>
                </div>
                <div class="col-md-6">
                    @if($loker->photo)
                        <img src="{{ asset('storage/' . $loker->photo) }}" alt="Loker Photo" class="img-fluid rounded mb-3" style="max-height: 300px; width: 100%; object-fit: cover;">
                    @else
                        <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 300px;">
                            <p class="text-muted">No photo available</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mt-4">
                <h4 class="text-secondary">Deskripsi:</h4>
                <p class="text-justify">{{ $loker->description }}</p>
            </div>

            @if($loker->statement_letter)
                <div class="mt-4">
                    <h4 class="text-secondary">Surat Pernyataan:</h4>
                    <a href="{{ asset('storage/' . $loker->statement_letter) }}" class="btn btn-outline-info" download>
                        <i class="fas fa-file-pdf me-2"></i> Download Surat Pernyataan (PDF)
                    </a>
                </div>
            @endif

            <div class="mt-5 d-flex justify-content-between">
                <a href="{{ route('lokers.opening') }}" class="btn btn-outline-secondary">
                    <i class="fas fa-arrow-left me-2"></i> Kembali
                </a>
                <a href="{{ route('lokers.apply.form', $loker->id) }}" class="btn btn-primary">
                    <i class="fas fa-paper-plane me-2"></i> Lamar Lowongan Ini
                </a>
            </div>
        </div>
    </div>
</div>
@endsection