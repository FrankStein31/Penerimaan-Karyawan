@extends('layouts.admin')

@section('main-content')
<div>
    <h1 class="text-center mb-4">Detail Pelamar</h1>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">ID Pengajuan #{{ $jobApplication->id }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="card-title text-primary mb-4">Informasi Lowongan</h5>
                    <p><strong>Pekerjaan:</strong> {{ $jobApplication->loker->name }}</p>
                    <p><strong>Tanggal Pengajuan:</strong> {{ $jobApplication->applied_at}}</p>
                    <p><strong>Status:</strong> <span class="badge bg-{{ $jobApplication->status == 'accepted' ? 'success' : ($jobApplication->status == 'rejected' ? 'danger' : 'warning') }} text-white">{{ ucfirst($jobApplication->status) }}</span></p>
                    <p><strong>Tes Pengetahuan Departemen (Skor):</strong> {{ $jobApplication->score}}0 (Benar {{ $jobApplication->score}} dari 10)</p>
                </div>
                <div class="col-md-6">
                    <h5 class="card-title text-primary mb-4">Informasi Pelamar</h5>
                    <p><strong>Nama:</strong> {{ $jobApplication->user->name }} {{ $jobApplication->user->last_name }}</p>
                    <p><strong>Email:</strong> {{ $jobApplication->user->email }}</p>
                    <p><strong>No HP:</strong> {{ $jobApplication->user->phone }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $jobApplication->user->birth_date ? \Carbon\Carbon::parse($jobApplication->user->birth_date)->format('d M Y') : 'N/A' }}</p>
                    <p><strong>Alamat:</strong> {{ $jobApplication->user->address }}</p>
                    <p><strong>Pendidikan Terakhir:</strong> {{ $jobApplication->user->education }}</p>
                </div>
            </div>

            <div class="mt-4">
                <h5 class="card-title text-primary mb-3">Dokumen</h5>
                <p>
                    <strong>Surat Pernyataan:</strong>
                    @if($jobApplication->application_file)
                    <a href="{{ Storage::url($jobApplication->application_file) }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">
                        <i class="fas fa-file-pdf me-1"></i> Lihat Surat
                    </a>
                    @else
                    <span class="text-muted">Tidak tersedia</span>
                    @endif
                </p>
            </div>
            <hr style="border: none; height: 1px; background-color: #000;">
            <!-- New section for displaying correct and incorrect answers -->
            <div class="mt-4">
                <h5 class="card-title text-primary mb-3">Hasil Tes Pengetahuan</h5>
                
                <div class="mb-3">
                    <h6 class="text-success">Jawaban Benar ({{ $correctAnswers->count() }})</h6>
                    <ul class="list-group">
                        @foreach($correctAnswers as $answer)
                        <li class="list-group-item">
                            <strong>{{ $answer->departmentQuestion->question }}</strong><br>
                            <strong>Pilihan:</strong><br>
                            A. {{ $answer->departmentQuestion->option_a }}<br>
                            B. {{ $answer->departmentQuestion->option_b }}<br>
                            C. {{ $answer->departmentQuestion->option_c }}<br>
                            D. {{ $answer->departmentQuestion->option_d }}<br>
                            <strong>Jawaban:</strong> {{ $answer->selected_answer }}
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div>
                    <h6 class="text-danger">Jawaban Salah ({{ $incorrectAnswers->count() }})</h6>
                    <ul class="list-group">
                        @foreach($incorrectAnswers as $answer)
                        <li class="list-group-item">
                            <strong>{{ $answer->departmentQuestion->question }}</strong><br>
                            <strong>Pilihan:</strong><br>
                            A. {{ $answer->departmentQuestion->option_a }}<br>
                            B. {{ $answer->departmentQuestion->option_b }}<br>
                            C. {{ $answer->departmentQuestion->option_c }}<br>
                            D. {{ $answer->departmentQuestion->option_d }}<br>
                            <strong>Jawaban Pelamar:</strong> {{ $answer->selected_answer }}<br>
                            <strong>Jawaban Benar:</strong> {{ $answer->departmentQuestion->correct_answer }}
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="mt-4 d-flex justify-content-between align-items-center">
                <a href="{{ route('job_applications.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Kembali
                </a>
                <div>
                    <form action="{{ route('job_applications.update', $jobApplication->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="accepted">
                        <button type="submit" class="btn btn-success me-2" onclick="return confirm('Apakah Anda yakin ingin menyetujui lamaran ini? Email pemberitahuan akan dikirim ke pelamar.')">
                            <i class="fas fa-check me-1"></i> Lolos
                        </button>
                    </form>
                    <form action="{{ route('job_applications.update', $jobApplication->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="rejected">
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menolak lamaran ini? Email pemberitahuan akan dikirim ke pelamar.')">
                            <i class="fas fa-times me-1"></i> Tolak
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection