@extends('layouts.admin')

@section('main-content')
<div>
    <h1 class="mb-4 text-center">Detail Pengajuan Lowongan</h1>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Pengajuan #{{ $jobApplication->id }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title text-primary">Informasi Lowongan</h5>
                    <ul class="list-unstyled">
                        <li><strong>Pekerjaan:</strong> {{ $jobApplication->loker->name }}</li>
                        <li><strong>Departemen:</strong> {{ $jobApplication->loker->department->name }}</li>
                        <li><strong>Posisi:</strong> {{ $jobApplication->loker->position->name }}</li>
                        <!-- <li><strong>Gaji:</strong> Rp {{ number_format($jobApplication->loker->salary, 0, ',', '.') }}</li> -->
                        <li>
                            <strong>Foto:</strong>
                            @if($jobApplication->loker->photo)
                            <img src="{{ Storage::url($jobApplication->loker->photo) }}" alt="Photo" class="img-thumbnail mt-2" style="max-width: 100px;">
                            @else
                            N/A
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title text-primary">Informasi Pelamar</h5>
                    <ul class="list-unstyled">
                        <li><strong>Nama:</strong> {{ $jobApplication->user->name }} {{ $jobApplication->user->last_name }}</li>
                        <li><strong>Email:</strong> {{ $jobApplication->user->email }}</li>
                        <li><strong>No HP:</strong> {{ $jobApplication->user->phone }}</li>
                        <li><strong>Tanggal Lahir:</strong> {{ $jobApplication->user->birth_date ? \Carbon\Carbon::parse($jobApplication->user->birth_date)->format('d M Y') : 'N/A' }}</li>
                        <li><strong>Alamat:</strong> {{ $jobApplication->user->address }}</li>
                        <li><strong>Pendidikan Terakhir:</strong> {{ $jobApplication->user->education }}</li>
                    </ul>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <h5 class="card-title text-primary">Detail Pengajuan</h5>
                    <ul class="list-unstyled">
                        <li><strong>Tanggal Pengajuan:</strong> {{ $jobApplication->applied_at }}</li>
                        <li><strong>Status:</strong>
                            <span class="badge bg-{{ $jobApplication->status == 'pending' ? 'warning' : ($jobApplication->status == 'accepted' ? 'success' : 'danger') }} text-white">
                                {{ ucfirst($jobApplication->status) }}
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title text-primary">Dokumen</h5>
                    <ul class="list-unstyled">
                        <li class="mt-2">
                            <strong>Surat Pengajuan:</strong>
                            @if($jobApplication->application_file)
                            <a href="{{ Storage::url($jobApplication->application_file) }}" target="_blank" class="btn btn-sm btn-outline-primary mt-1">
                                <i class="fas fa-file-pdf me-1"></i> Lihat Surat
                            </a>
                            @else
                            N/A
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('job_applications.my') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection