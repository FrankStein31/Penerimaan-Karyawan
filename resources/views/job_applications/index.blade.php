@extends('layouts.admin')

@section('main-content')
<div>
    <h1 class="text-center mb-4">Pengajuan Lowongan</h1>

    <!-- Form filter -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <form action="{{ route('job_applications.index') }}" method="GET" class="row align-items-end">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="department">Filter Departemen</label>
                        <select class="form-control" id="department" name="department_id" onchange="this.form.submit()">
                            <option value="all">Semua Departemen</option>
                            @foreach ($departments as $department)
                            <option value="{{ $department->id }}" {{ request('department_id') == $department->id ? 'selected' : '' }}>
                                {{ $department->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="status">Filter Status</label>
                        <select class="form-control" id="status" name="status" onchange="this.form.submit()">
                            <option value="all">Semua Status</option>
                            @foreach ($statusOptions as $value => $label)
                            <option value="{{ $value }}" {{ request('status') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="score">Filter Skor</label>
                        <select class="form-control" id="score" name="score" onchange="this.form.submit()">
                            @foreach ($scoreOptions as $value => $label)
                            <option value="{{ $value }}" {{ request('score') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        @if(request('department_id') != 'all' || request('status') != 'all' || request('score') != 'all')
                            <a href="{{ route('job_applications.index') }}" class="btn btn-secondary">Reset Filter</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    @if($jobApplications->isEmpty())
        <div class="alert alert-info text-center">
            <i class="fas fa-info-circle me-2"></i>Tidak ada data saat ini.
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
                                <th>Departemen</th>
                                <th>Tes Pengetahuan Departemen (Skor)</th>
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
                                <td>{{ $application->loker->department->name }}</td>
                                <td>Benar <b>{{ $application->score }}</b> dari 10 ({{ $application->score * 10 }})</td>
                                <td>{{ $application->applied_at}}</td>
                                <td>
                                    @if($application->updated_at == $application->applied_at)
                                        -
                                    @else
                                        {{ $application->updated_at }}
                                    @endif
                                </td>
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
