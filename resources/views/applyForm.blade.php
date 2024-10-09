@extends('layouts.admin')
@section('main-content')
<div class="container my-5">
    <h1 class="mb-4 text-center">Lamar Lowongan Pekerjaan</h1>
    <h2 class="mb-4 text-center text-primary">"{{ $loker->name }}"</h2>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('lokers.apply.submit', $loker->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="application_file" class="form-label fw-bold">Upload Surat Pernyataan Anda (PDF)</label>
                    <input type="file" class="form-control" id="application_file" name="application_file" accept=".pdf" required>
                    <div class="form-text text-muted mt-2">
                        <i class="fas fa-info-circle me-1"></i>
                        NB: Surat pernyataan dapat di-download pada halaman detail lowongan. Pastikan data yang Anda input sesuai!
                    </div>
                </div>

                <h3 class="mb-3">Pertanyaan Departemen</h3>
                @foreach($loker->department->questions as $question)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $loop->iteration }}. {{ $question->question }}</h5>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}_a" value="A" required>
                                <label class="form-check-label" for="answer_{{ $question->id }}_a">
                                    {{ $question->option_a }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}_b" value="B">
                                <label class="form-check-label" for="answer_{{ $question->id }}_b">
                                    {{ $question->option_b }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}_c" value="C">
                                <label class="form-check-label" for="answer_{{ $question->id }}_c">
                                    {{ $question->option_c }}
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="answers[{{ $question->id }}]" id="answer_{{ $question->id }}_d" value="D">
                                <label class="form-check-label" for="answer_{{ $question->id }}_d">
                                    {{ $question->option_d }}
                                </label>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('lokers.show', $loker->id) }}" class="btn btn-outline-secondary">
                        <i class="fas fa-arrow-left me-2"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i> Kirim Lamaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection