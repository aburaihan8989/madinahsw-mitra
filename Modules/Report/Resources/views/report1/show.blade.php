@extends('layouts.app')

@section('title', 'View Daftar Siswa Kelas Mengaji Anak TK')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('report1.index') }}">Kelas Mengaji Anak TK</a></li>
        <li class="breadcrumb-item active">View Daftar Siswa Kelas Mengaji Anak TK</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('report1.index') }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="report1task_code">Kode Daftar <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="report1task_code" required value="{{ $report1->report1task_code }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="report1task_date">Tanggal Daftar <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="report1task_date" required value="{{ $report1->report1task_date }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="report1task_student_id">Nama Siswa <span class="text-danger">*</span></label>
                                        <select class="form-control" name="report1task_student_id" id="report1task_student_id" required readonly disabled>
                                            <option value="" selected disabled>Pilih Nama Siswa</option>
                                            @foreach(\Modules\People\Entities\Student::all() as $siswa)
                                                <option {{ $report1->report1task_student_id == $siswa->id ? 'selected' : '' }} value="{{ $siswa->id }}">{{ $siswa->student_kode . ' | ' . $siswa->student_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="report1task_teacher_id">Nama Pengajar <span class="text-danger">*</span></label>
                                        <select class="form-control" name="report1task_teacher_id" id="report1task_teacher_id" required readonly disabled>
                                            <option value="" selected disabled>Pilih Nama Pengajar</option>
                                            @foreach(\Modules\People\Entities\Teacher::all() as $pengajar)
                                                <option {{ $report1->report1task_teacher_id == $pengajar->id ? 'selected' : '' }} value="{{ $pengajar->id }}">{{ $pengajar->teacher_kode . ' | ' . $pengajar->teacher_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="from-group">
                                    <div class="form-group">
                                        <label for="report1task_studi_id">Nama Pelajaran <span class="text-danger">*</span></label>
                                        <select class="form-control" name="report1task_studi_id" id="report1task_studi_id" required readonly disabled>
                                            <option value="" selected disabled>Pilih Nama Pelajaran</option>
                                            @foreach(\Modules\Study\Entities\Studie::all() as $studi)
                                                <option {{ $report1->report1task_studi_id == $studi->id ? 'selected' : '' }} value="{{ $studi->id }}">{{ $studi->studi_code . ' | ' . $studi->studi_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="report1task_active">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="report1task_active" id="report1task_active" required readonly disabled>
                                        <option value="" selected>Pilih Status</option>
                                        <option {{ $report1->report1task_active == '1' ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $report1->report1task_active == '2' ? 'selected' : '' }} value="2">Completed</option>
                                        <option {{ $report1->report1task_active == '3' ? 'selected' : '' }} value="3">Non Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="report1task_note">Catatan Daftar </label>
                                    <textarea name="report1task_note" id="report1task_note" rows="3 " class="form-control" readonly disabled>{{ $report1->report1task_note }}</textarea>
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

