@extends('layouts.admin')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4 mb-4">Lowongan Kerja</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-table me-1"></i> Daftar Lowongan</span>
            <a href="{{ route('lokers.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-hover" id="datatablesSimple">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Departemen</th>
                        <th>Posisi</th>
                        <th>Batas Pengajuan</th>
                        <th>Jumlah Pelamar</th>
                        <th>Gaji</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lokers as $loker)
                        <tr>
                            <td>{{ $loker->name }}</td>
                            <td>{{ $loker->department->name }}</td>
                            <td>{{ $loker->position->name }}</td>
                            <td>{{ $loker->max_applicants }}</td>
                            <td>
                                <span class="badge bg-info text-white">
                                    {{ $loker->applicants_count }} / {{ $loker->max_applicants }}
                                </span>
                            </td>
                            <td>Rp. {{ $loker->salary }}</td>
                            <td>{{ Str::limit($loker->description, 50) }}</td>
                            <td>
                                <a href="{{ route('lokers.edit', $loker->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('lokers.destroy', $loker->id) }}" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function confirmDelete() {
        return confirm('Apakah anda yakin menghapus loker ini?\nIni akan menyebabkan data pengajuan pada calon karyawan hilang');
    }

    $(document).ready(function() {
        $('#datatablesSimple').DataTable({
            responsive: true
        });
    });
</script>
@endsection