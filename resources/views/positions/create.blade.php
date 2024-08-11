@extends('layouts.admin')

@section('main-content')
    <h1>Tambah Data</h1>

    <form action="{{ route('positions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="department_id">Departemen</label>
            <select name="department_id" id="department_id" class="form-control" required>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nama Posisi</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">+ Tambah</button>
    </form>
@endsection
