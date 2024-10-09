@extends('layouts.admin')

@section('main-content')
<h1>Edit Loker</h1>

<form action="{{ route('lokers.update', $loker->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="name">Nama Lowongan Pekerjaan</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $loker->name }}" required>
    </div>

    <div class="form-group">
        <label for="department">Departemen</label>
        <select class="form-control" id="department" name="department_id" required>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ $department->id == $loker->department_id ? 'selected' : '' }}>
                    {{ $department->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="position">Posisi</label>
        <select class="form-control" id="position" name="position_id" required>
            <option value="">-Pilih Posisi-</option>
        </select>
    </div>

    <!-- <div class="form-group">
        <label for="max_applicants">Batas Pengajuan</label>
        <input type="number" class="form-control" id="max_applicants" name="max_applicants" value="{{ $loker->max_applicants }}" required>
    </div> -->

    <!-- <div class="form-group">
        <label for="salary">Gaji</label>
        <input type="number" step="0.01" class="form-control" id="salary" name="salary" value="{{ $loker->salary }}" required>
    </div> -->

    <div class="form-group">
        <label for="description">Deskripsi</label>
        <textarea class="form-control" id="description" name="description" rows="4" required>{{ $loker->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="photo">Foto</label>
        <input type="file" class="form-control-file" id="photo" name="photo">
        @if ($loker->photo)
            <img src="{{ Storage::url($loker->photo) }}" alt="Photo" width="100">
        @endif
    </div>

    <div class="form-group">
        <label for="statement_letter">Template Surat Pengajuan (Optional)</label>
        <input type="file" class="form-control-file" id="statement_letter" name="statement_letter">
        @if ($loker->statement_letter)
            <a>✅Template Surat Pengajuan Sudah Diupload</a>
        @endif
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function loadPositions(departmentId, selectedPositionId) {
        if(departmentId) {
            $.ajax({
                url: '{{ route("positions.byDepartment") }}',
                type: 'GET',
                data: { department_id: departmentId },
                success: function(data) {
                    $('#position').empty();
                    $('#position').append('<option value="">-Pilih Posisi-</option>');
                    $.each(data, function(key, value) {
                        var selected = (value.id == selectedPositionId) ? 'selected' : '';
                        $('#position').append('<option value="' + value.id + '" ' + selected + '>' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#position').empty();
            $('#position').append('<option value="">-Pilih Posisi-</option>');
        }
    }

    $('#department').on('change', function() {
        loadPositions($(this).val());
    });

    // Load initial positions
    var initialDepartmentId = $('#department').val();
    var initialPositionId = {{ $loker->position_id }};
    loadPositions(initialDepartmentId, initialPositionId);
});
</script>
@endsection
