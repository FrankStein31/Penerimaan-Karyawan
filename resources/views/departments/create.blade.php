@extends('layouts.admin')
@section('main-content')
    <h1>Tambah Departemen</h1>
    <form action="{{ route('departments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Departemen</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi Departemen</label>
            <textarea id="description" name="description" class="form-control" required></textarea>
        </div>
        
        <h2>Pertanyaan Departemen</h2>
        @for ($i = 0; $i < 10; $i++)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pertanyaan {{ $i + 1 }}</h5>
                    <div class="form-group">
                        <label for="questions[{{ $i }}][question]">Pertanyaan</label>
                        <input type="text" id="questions[{{ $i }}][question]" name="questions[{{ $i }}][question]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $i }}][option_a]">Opsi A</label>
                        <input type="text" id="questions[{{ $i }}][option_a]" name="questions[{{ $i }}][option_a]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $i }}][option_b]">Opsi B</label>
                        <input type="text" id="questions[{{ $i }}][option_b]" name="questions[{{ $i }}][option_b]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $i }}][option_c]">Opsi C</label>
                        <input type="text" id="questions[{{ $i }}][option_c]" name="questions[{{ $i }}][option_c]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $i }}][option_d]">Opsi D</label>
                        <input type="text" id="questions[{{ $i }}][option_d]" name="questions[{{ $i }}][option_d]" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $i }}][correct_answer]">Jawaban Benar</label>
                        <select id="questions[{{ $i }}][correct_answer]" name="questions[{{ $i }}][correct_answer]" class="form-control" required>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
            </div>
        @endfor
        
        <button type="submit" class="btn btn-primary">+ Tambah</button>
    </form>
@endsection