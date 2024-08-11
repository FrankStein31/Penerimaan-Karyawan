@extends('layouts.admin')

@section('main-content')
<h1>Tambah Data</h1>

<form action="{{ route('lokers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
        <label for="name">Nama Lowongan Pekerjaan</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="department">Departemen</label>
        <select class="form-control" id="department" name="department_id" required>
            <option value="">-Pilih Departemen-</option>
            @foreach ($departments as $department)
            <option value="{{ $department->id }}">{{ $department->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="position">Posisi</label>
        <select class="form-control" id="position" name="position_id" required>
            <option value="">-Pilih Posisi-</option>
        </select>
    </div>

    <div class="form-group">
        <label for="max_applicants">Batas Pengajuan</label>
        <input type="number" class="form-control" id="max_applicants" name="max_applicants" required>
    </div>

    <div class="form-group">
        <label for="salary">Gaji</label>
        <input type="number" step="0.01" class="form-control" id="salary" name="salary" required>
    </div>

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="photo">Foto</label>
        <input type="file" class="form-control-file" id="photo" name="photo">
    </div>

    <div class="form-group">
        <label for="statement_letter">Template Surat Pengajuan (Optional)</label>
        <input type="file" class="form-control-file" id="statement_letter" name="statement_letter">
    </div>

    <button type="submit" class="btn btn-primary">+ Tambah</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#department').on('change', function() {
        var departmentId = $(this).val();
        if(departmentId) {
            $.ajax({
                url: '{{ route("positions.byDepartment") }}',
                type: 'GET',
                data: { department_id: departmentId },
                success: function(data) {
                    $('#position').empty();
                    $('#position').append('<option value="">-Pilih Posisi-</option>');
                    $.each(data, function(key, value) {
                        $('#position').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#position').empty();
            $('#position').append('<option value="">-Pilih Posisi-</option>');
        }
    });
});
</script>
@endsection
