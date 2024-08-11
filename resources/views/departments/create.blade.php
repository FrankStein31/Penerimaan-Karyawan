@extends('layouts.admin')

@section('main-content')
    <h1>Tambah Departemen</h1>

    <form action="{{ route('departments.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Nama Departemen</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">+ Tambah</button>
    </form>
@endsection
