@extends('layouts.admin')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Pengajuan Saya</h1>

    @if($jobApplications->isEmpty())
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i> Ajukan lowongan anda sekarang!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @else
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i> Daftar Pengajuan
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover" id="jobApplicationsTable">
                    <thead>
                        <tr>
                            <th>ID Pengajuan</th>
                            <th>Lowongan Pekerjaan</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobApplications as $application)
                            <tr>
                                <td>{{ $application->id }}</td>
                                <td>{{ $application->loker->name }}</td>
                                <td>{{ $application->applied_at}}</td>
                                <td>
                                    <span class="badge bg-{{ $application->status == 'pending' ? 'warning' : ($application->status == 'accepted' ? 'success' : 'danger') }} text-white">
                                        {{ ucfirst($application->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('job_applications.detail', $application->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Detail
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>

<script>
    $(document).ready(function() {
        $('#jobApplicationsTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/id.json'
            },
            order: [[2, 'desc']]
        });
    });
</script>
@endsection