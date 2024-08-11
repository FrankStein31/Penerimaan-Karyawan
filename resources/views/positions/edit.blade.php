@extends('layouts.admin')

@section('main-content')
    <h1>Edit Posisi</h1>

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="department_id">Departemen</label>
            <select name="department_id" id="department_id" class="form-control" required>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $department->id == $position->department_id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="name">Nama Posisi</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $position->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
