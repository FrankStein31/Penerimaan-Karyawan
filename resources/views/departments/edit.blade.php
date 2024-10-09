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

        <div class="form-group">
            <label for="description">Deskripsi Departemen</label>
            <textarea id="description" name="description" class="form-control" required>{{ $department->description }}</textarea>
        </div>

        <h2>Pertanyaan Departemen</h2>
        @foreach ($department->questions as $index => $question)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Pertanyaan {{ $index + 1 }}</h5>
                    <div class="form-group">
                        <label for="questions[{{ $index }}][question]">Pertanyaan</label>
                        <input type="text" id="questions[{{ $index }}][question]" name="questions[{{ $index }}][question]" class="form-control" value="{{ $question->question }}" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $index }}][option_a]">Opsi A</label>
                        <input type="text" id="questions[{{ $index }}][option_a]" name="questions[{{ $index }}][option_a]" class="form-control" value="{{ $question->option_a }}" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $index }}][option_b]">Opsi B</label>
                        <input type="text" id="questions[{{ $index }}][option_b]" name="questions[{{ $index }}][option_b]" class="form-control" value="{{ $question->option_b }}" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $index }}][option_c]">Opsi C</label>
                        <input type="text" id="questions[{{ $index }}][option_c]" name="questions[{{ $index }}][option_c]" class="form-control" value="{{ $question->option_c }}" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $index }}][option_d]">Opsi D</label>
                        <input type="text" id="questions[{{ $index }}][option_d]" name="questions[{{ $index }}][option_d]" class="form-control" value="{{ $question->option_d }}" required>
                    </div>
                    <div class="form-group">
                        <label for="questions[{{ $index }}][correct_answer]">Jawaban Benar</label>
                        <select id="questions[{{ $index }}][correct_answer]" name="questions[{{ $index }}][correct_answer]" class="form-control" required>
                            <option value="A" {{ $question->correct_answer === 'A' ? 'selected' : '' }}>A</option>
                            <option value="B" {{ $question->correct_answer === 'B' ? 'selected' : '' }}>B</option>
                            <option value="C" {{ $question->correct_answer === 'C' ? 'selected' : '' }}>C</option>
                            <option value="D" {{ $question->correct_answer === 'D' ? 'selected' : '' }}>D</option>
                        </select>
                    </div>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection