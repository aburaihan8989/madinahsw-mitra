@extends('layouts.app')

@section('title', 'Input Nilai Pagi Siswa Kelas Mengaji Anak SD')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kelas2-task.index') }}">Kelas Mengaji Anak SD</a></li>
        <li class="breadcrumb-item active">Input Nilai Pagi Siswa Kelas Mengaji Anak SD</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="kelas2-result-form" action="{{ route('kelas2-result.pagi_store', $kelas2_result) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('kelas2-task.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Simpan Nilai Pagi <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas2_result_date">Tanggal Input Nilai <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="kelas2_result_date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="kelas2_result_student_id">Nama Siswa <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas2_result_student_id" id="kelas2_result_student_id" required readonly>
                                                @foreach(\Modules\People\Entities\Student::all() as $siswa)
                                                    @if ($kelas2_result->kelas2_task_student_id == $siswa->id)
                                                        <option {{ $kelas2_result->kelas2_task_student_id == $siswa->id ? 'selected' : '' }} value="{{ $siswa->id }}">{{ $siswa->student_kode . ' | ' . $siswa->student_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="kelas2_result_teacher_id">Nama Pengajar <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas2_result_teacher_id" id="kelas2_result_teacher_id" required readonly>
                                                @foreach(\Modules\People\Entities\Teacher::all() as $pengajar)
                                                    @if ($kelas2_result->kelas2_task_teacher_id == $pengajar->id)
                                                        <option {{ $kelas2_result->kelas2_task_teacher_id == $pengajar->id ? 'selected' : '' }} value="{{ $pengajar->id }}">{{ $pengajar->teacher_kode . ' | ' . $pengajar->teacher_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="kelas2_result_studi_id">Nama Pelajaran <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas2_result_studi_id" id="kelas2_result_studi_id" required readonly>
                                                @foreach(\Modules\Study\Entities\Studie::all() as $studi)
                                                    @if ($kelas2_result->kelas2_task_studi_id == $studi->id)
                                                        <option {{ $kelas2_result->kelas2_task_studi_id == $studi->id ? 'selected' : '' }} value="{{ $studi->id }}">{{ $studi->studi_code . ' | ' . $studi->studi_name }}</option>
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
                                        <label for="kelas2_result_book1">Nama IQRA <span class="text-danger">*</span></label>
                                        <select class="form-control" name="kelas2_result_book1" id="kelas2_result_book1" required>
                                            <option value="" selected >Pilih Nama IQRA</option>
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
                                        <label for="kelas2_result_book2">Halaman / Baris <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="kelas2_result_book2">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas2_result_value1">Nilai Pagi <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="kelas2_result_value1">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="kelas2_result_note">Catatan Nilai </label>
                                        <textarea name="kelas2_result_note" id="kelas2_result_note" rows="3 " class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{ $kelas2_result->id }}" name="kelas2_result_task_id">
                            <input type="hidden" value="{{ $kelas2_result->kelas2_task_class_id }}" name="kelas2_result_class_id">
                            <input type="hidden" value="1" name="kelas2_result_waktu">

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

