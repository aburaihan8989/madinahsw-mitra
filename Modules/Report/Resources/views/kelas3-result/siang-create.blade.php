@extends('layouts.app')

@section('title', 'Input Nilai Siang Siswa Kelas Mengaji Al Quran')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kelas3-task.index') }}">Kelas Mengaji Al Quran</a></li>
        <li class="breadcrumb-item active">Input Nilai Siang Siswa Kelas Mengaji Al Quran</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="kelas3-result-form" action="{{ route('kelas3-result.siang_store', $kelas3_result) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('kelas3-task.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Simpan Nilai Siang <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_date">Tanggal Input Nilai <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="kelas3_result_date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="kelas3_result_student_id">Nama Siswa <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas3_result_student_id" id="kelas3_result_student_id" required readonly>
                                                @foreach(\Modules\People\Entities\Student::all() as $siswa)
                                                    @if ($kelas3_result->kelas3_task_student_id == $siswa->id)
                                                        <option {{ $kelas3_result->kelas3_task_student_id == $siswa->id ? 'selected' : '' }} value="{{ $siswa->id }}">{{ $siswa->student_kode . ' | ' . $siswa->student_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="kelas3_result_teacher_id">Nama Pengajar <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas3_result_teacher_id" id="kelas3_result_teacher_id" required readonly>
                                                @foreach(\Modules\People\Entities\Teacher::all() as $pengajar)
                                                    @if ($kelas3_result->kelas3_task_teacher_id == $pengajar->id)
                                                        <option {{ $kelas3_result->kelas3_task_teacher_id == $pengajar->id ? 'selected' : '' }} value="{{ $pengajar->id }}">{{ $pengajar->teacher_kode . ' | ' . $pengajar->teacher_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="kelas3_result_studi_id">Nama Pelajaran <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas3_result_studi_id" id="kelas3_result_studi_id" required readonly>
                                                @foreach(\Modules\Study\Entities\Studie::all() as $studi)
                                                    @if ($kelas3_result->kelas3_task_studi_id == $studi->id)
                                                        <option {{ $kelas3_result->kelas3_task_studi_id == $studi->id ? 'selected' : '' }} value="{{ $studi->id }}">{{ $studi->studi_code . ' | ' . $studi->studi_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_book1" class="text-danger">Nama Juz (Kemarin) <span class="text-danger"></span></label>
                                        <select class="form-control" readonly disabled>
                                            @foreach(\Modules\Study\Entities\Juz::all() as $juz)
                                                <option {{ $result_kemarin->kelas3_result_book1 == $juz->id ? 'selected' : '' }} value="{{ $juz->id }}">{{ $juz->juz_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_book2" class="text-danger">Nama Surat (Kemarin) <span class="text-danger"></span></label>
                                        <select class="form-control" readonly disabled>
                                            @foreach(\Modules\Study\Entities\Surat::all() as $surat)
                                                <option {{ $result_kemarin->kelas3_result_book2 == $surat->id ? 'selected' : '' }} value="{{ $surat->id }}">{{ $surat->surat_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_book3" class="text-danger">Halaman (Kemarin) <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" value="{{ $result_kemarin->kelas3_result_book3 ?? '' }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_value2" class="text-danger">Nilai Siang (Kemarin) <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" value="{{ $result_kemarin->kelas3_result_value2 ?? '' }}" readonly disabled>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_book1">Nama Juz <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="kelas3_result_book1" id="kelas3_result_book1" required>
                                            <option value="" selected disabled>Pilih Nama Juz</option>
                                            @foreach(\Modules\Study\Entities\Juz::all() as $juz)
                                                <option value="{{ $juz->id }}">{{ $juz->juz_name }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_book2">Nama Surat <span class="text-danger">*</span></label>
                                        <select class="select2 form-control" name="kelas3_result_book2" id="kelas3_result_book2" required>
                                            <option value="" selected disabled>Pilih Nama Surat</option>
                                            @foreach(\Modules\Study\Entities\Surat::all() as $surat)
                                                <option value="{{ $surat->id }}">{{ $surat->surat_name }}</option>
                                            @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_book3">Halaman <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="kelas3_result_book3">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas3_result_value2">Nilai Siang <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="kelas3_result_value2">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="kelas3_result_note">Catatan Nilai </label>
                                        <textarea name="kelas3_result_note" id="kelas3_result_note" rows="3 " class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{ $kelas3_result->id }}" name="kelas3_result_task_id">
                            <input type="hidden" value="{{ $kelas3_result->kelas3_task_class_id }}" name="kelas3_result_class_id">
                            <input type="hidden" value="2" name="kelas3_result_waktu">

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
    <script>
        $(document).ready(function() {
        console.log('');
        $('.select2').select2();
        });
    </script>
@endpush

