@extends('layouts.app')

@section('title', 'Input Nilai Pagi Siswa Kelas Mengaji Anak TK')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('report1.index') }}">Kelas Mengaji Anak TK</a></li>
        <li class="breadcrumb-item active">Input Nilai Pagi Siswa Kelas Mengaji Anak TK</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="report1result-form" action="{{ route('report1result.pagi_store', $report1task) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('report1.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Simpan Nilai Pagi <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="report1_date">Tanggal Input Nilai <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="report1_date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="report1_student_id">Nama Siswa <span class="text-danger">*</span></label>
                                            <select class="form-control" name="report1_student_id" id="report1_student_id" required readonly>
                                                @foreach(\Modules\People\Entities\Student::all() as $siswa)
                                                    @if ($report1task->report1task_student_id == $siswa->id)
                                                        <option {{ $report1task->report1task_student_id == $siswa->id ? 'selected' : '' }} value="{{ $siswa->id }}">{{ $siswa->student_kode . ' | ' . $siswa->student_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="report1_teacher_id">Nama Pengajar <span class="text-danger">*</span></label>
                                            <select class="form-control" name="report1_teacher_id" id="report1_teacher_id" required readonly>
                                                @foreach(\Modules\People\Entities\Teacher::all() as $pengajar)
                                                    @if ($report1task->report1task_teacher_id == $pengajar->id)
                                                        <option {{ $report1task->report1task_teacher_id == $pengajar->id ? 'selected' : '' }} value="{{ $pengajar->id }}">{{ $pengajar->teacher_kode . ' | ' . $pengajar->teacher_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="report1_studi_id">Nama Pelajaran <span class="text-danger">*</span></label>
                                            <select class="form-control" name="report1_studi_id" id="report1_studi_id" required readonly>
                                                @foreach(\Modules\Study\Entities\Studie::all() as $studi)
                                                    @if ($report1task->report1task_studi_id == $studi->id)
                                                        <option {{ $report1task->report1task_studi_id == $studi->id ? 'selected' : '' }} value="{{ $studi->id }}">{{ $studi->studi_code . ' | ' . $studi->studi_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="report1_book1">Materi <span class="text-danger">*</span></label>
                                        <select class="form-control" name="report1_book1" id="report1_book1" required>
                                            <option value="" selected >Pilih Materi</option>
                                            <option value="IQRA 1">IQRA 1</option>
                                            <option value="IQRA 2">IQRA 2</option>
                                            <option value="IQRA 3">IQRA 3</option>
                                            <option value="IQRA 4">IQRA 4</option>
                                            <option value="IQRA 5">IQRA 5</option>
                                            <option value="IQRA 6">IQRA 6</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="report1_book2">Halaman <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="report1_book2">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="report1_value1">Nilai Pagi <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="report1_value1">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="report1_note">Catatan Nilai </label>
                                        <textarea name="report1_note" id="report1_note" rows="3 " class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{ $report1task->id }}" name="report1_id">
                            <input type="hidden" value="{{ $report1task->report1task_class_id }}" name="report1_class_id">
                            <input type="hidden" value="1" name="report1_waktu">

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush

