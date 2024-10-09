@extends('layouts.admin')

@section('main-content')
<div>
    <h1 class="text-center mb-5">Lowongan Pekerjaan</h1>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if($lokers->isEmpty())
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i>Maaf, lowongan belum tersedia saat ini.
        </div>
    @else
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($lokers as $loker)
            <div class="col">
                <div class="card h-100 shadow-sm hover-shadow transition">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-primary">{{ $loker->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $loker->position->name }}</h6>
                        <p class="card-text"><i class="fas fa-building me-2"></i> {{ $loker->department->name }}</p>
                        <!-- <p class="card-text"><i class="fas fa-money-bill-wave me-2"></i> Rp {{ number_format($loker->salary, 0, ',', '.') }}</p> -->
                        <p class="card-text">
                            <i class="fas fa-users me-2"></i>
                            <span class="text-muted">Jumlah Pelamar Saat Ini :</span> {{ $loker->current_applicants_count }}
                        </p>
                        <a href="{{ route('lokers.show', $loker->id) }}" class="btn btn-outline-primary mt-auto">
                            <i class="fas fa-info-circle me-2"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

<style>
    .hover-shadow {
        transition: box-shadow 0.3s ease-in-out;
    }
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
    }
</style>