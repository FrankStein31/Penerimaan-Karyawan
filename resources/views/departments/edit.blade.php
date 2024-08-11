@extends('layouts.admin')

@section('main-content')
    <h1>Edit Departemen</h1>

    <form action="{{ route('departments.update', $department->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nama Departemen</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ $department->name }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
