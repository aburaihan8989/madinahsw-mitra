@extends('layouts.app')

@if ($kelas1_result->kelas1_result_waktu == 1)
    @section('title', 'View Nilai Pagi Siswa Kelas Mengaji Anak TK')
@else
    @section('title', 'View Nilai Siang Siswa Kelas Mengaji Anak TK')
@endif

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kelas1-result.index') }}">Laporan Kelas Mengaji Anak TK</a></li>
        @if ($kelas1_result->kelas1_result_waktu == 1)
            <li class="breadcrumb-item active">View Nilai Pagi Siswa Kelas Mengaji Anak TK</li>
        @else
            <li class="breadcrumb-item active">View Nilai Siang Siswa Kelas Mengaji Anak TK</li>
        @endif
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('kelas1-result.index') }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="kelas1_result_date">Tanggal Input Nilai <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="kelas1_result_date" required value="{{ $kelas1_result->kelas1_result_date }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="kelas1_result_student_id">Nama Siswa <span class="text-danger">*</span></label>
                                        <select class="form-control" name="kelas1_result_student_id" id="kelas1_result_student_id" required readonly disabled>
                                            @foreach(\Modules\People\Entities\Student::all() as $siswa)
                                                @if ($kelas1_result->kelas1_result_student_id == $siswa->id)
                                                    <option {{ $kelas1_result->kelas1_result_student_id == $siswa->id ? 'selected' : '' }} value="{{ $siswa->id }}">{{ $siswa->student_kode . ' | ' . $siswa->student_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="kelas1_result_teacher_id">Nama Pengajar <span class="text-danger">*</span></label>
                                        <select class="form-control" name="kelas1_result_teacher_id" id="kelas1_result_teacher_id" required readonly disabled>
                                            @foreach(\Modules\People\Entities\Teacher::all() as $pengajar)
                                                @if ($kelas1_result->kelas1_result_teacher_id == $pengajar->id)
                                                    <option {{ $kelas1_result->kelas1_result_teacher_id == $pengajar->id ? 'selected' : '' }} value="{{ $pengajar->id }}">{{ $pengajar->teacher_kode . ' | ' . $pengajar->teacher_name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="kelas1_result_studi_id">Nama Pelajaran <span class="text-danger">*</span></label>
                                        <select class="form-control" name="kelas1_result_studi_id" id="kelas1_result_studi_id" required readonly disabled>
                                            @foreach(\Modules\Study\Entities\Studie::all() as $studi)
                                                @if ($kelas1_result->kelas1_result_studi_id == $studi->id)
                                                    <option {{ $kelas1_result->kelas1_result_studi_id == $studi->id ? 'selected' : '' }} value="{{ $studi->id }}">{{ $studi->studi_code . ' | ' . $studi->studi_name }}</option>
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
                                    <label for="kelas1_result_book1">Nama IQRA <span class="text-danger">*</span></label>
                                    <select class="form-control" name="kelas1_result_book1" id="kelas1_result_book1" required readonly disabled>
                                        <option value="" selected disabled>Pilih Nama IQRA</option>
                                        <option {{ $kelas1_result->kelas1_result_book1 == 'IQRA 1' ? 'selected' : '' }} value="IQRA 1">IQRA 1</option>
                                        <option {{ $kelas1_result->kelas1_result_book1 == 'IQRA 2' ? 'selected' : '' }} value="IQRA 2">IQRA 2</option>
                                        <option {{ $kelas1_result->kelas1_result_book1 == 'IQRA 3' ? 'selected' : '' }} value="IQRA 3">IQRA 3</option>
                                        <option {{ $kelas1_result->kelas1_result_book1 == 'IQRA 4' ? 'selected' : '' }} value="IQRA 4">IQRA 4</option>
                                        <option {{ $kelas1_result->kelas1_result_book1 == 'IQRA 5' ? 'selected' : '' }} value="IQRA 5">IQRA 5</option>
                                        <option {{ $kelas1_result->kelas1_result_book1 == 'IQRA 6' ? 'selected' : '' }} value="IQRA 6">IQRA 6</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="kelas1_result_book2">Halaman <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="kelas1_result_book2" value="{{ $kelas1_result->kelas1_result_book2 }}" readonly disabled>
                                </div>
                            </div>
                            @if ($kelas1_result->kelas1_result_waktu == 1)
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas1_result_value1">Nilai Pagi <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="kelas1_result_value1" value="{{ $kelas1_result->kelas1_result_value1 }}" readonly disabled>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas1_result_value2">Nilai Siang <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="kelas1_result_value2" value="{{ $kelas1_result->kelas1_result_value2 }}" readonly disabled>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="kelas1_result_note">Catatan Nilai </label>
                                    <textarea name="kelas1_result_note" id="kelas1_result_note" rows="3 " class="form-control" readonly disabled>{{ $kelas1_result->kelas1_result_note }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {

        });
    </script>
@endpush

