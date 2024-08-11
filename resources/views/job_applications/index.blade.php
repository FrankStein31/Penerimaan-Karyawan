@extends('layouts.admin')

@section('main-content')
<div>
    <h1 class="text-center mb-4">Pengajuan Lowongan</h1>
    
    @if($jobApplications->isEmpty())
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i>Tidak ada pengajuan lowongan saat ini.
        </div>
    @else
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Calon Karyawan</th>
                                <th>Lowongan Pekerjaan</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Tanggal Diproses</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobApplications as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->user->name }}</td>
                                <td>{{ $application->loker->name }}</td>
                                <td>{{ $application->applied_at}}</td>
                                <td>{{ $application->updated_at}}</td>
                                <td>
                                    <span class="badge bg-{{ $application->status == 'pending' ? 'warning' : ($application->status == 'rejected' ? 'danger' : 'success') }} text-white">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('job_applications.show', $application->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection

<style>
    .table th, .table td {
        vertical-align: middle;
    }
</style>