@extends('layouts.app')

@section('title', 'Daftar Siswa Kelas Mengaji Anak TK')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('report1.index') }}">Kelas Mengaji Anak TK</a></li>
        <li class="breadcrumb-item active">Daftar Siswa Kelas Mengaji Anak TK</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="report1-form" action="{{ route('report1.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning bi bi-arrow-return-left mr-2" href="{{ route('report1.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Daftar Siswa <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="report1task_date">Tanggal Daftar <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="report1task_date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="report1task_student_id">Nama Siswa <span class="text-danger">*</span></label>
                                            <select class="form-control" name="report1task_student_id" id="report1task_student_id" required>
                                                <option value="" selected disabled>Pilih Nama Siswa</option>
                                                @foreach(\Modules\People\Entities\Student::all() as $siswa)
                                                    <option value="{{ $siswa->id }}">{{ $siswa->student_kode . ' | ' . $siswa->student_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="report1task_teacher_id">Nama Pengajar <span class="text-danger">*</span></label>
                                            <select class="form-control" name="report1task_teacher_id" id="report1task_teacher_id" required>
                                                <option value="" selected disabled>Pilih Nama Pengajar</option>
                                                @foreach(\Modules\People\Entities\Teacher::all() as $pengajar)
                                                    <option value="{{ $pengajar->id }}">{{ $pengajar->teacher_kode . ' | ' . $pengajar->teacher_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="report1task_studi_id">Nama Pelajaran <span class="text-danger">*</span></label>
                                            <select class="form-control" name="report1task_studi_id" id="report1task_studi_id" required>
                                                <option value="" selected disabled>Pilih Nama Pelajaran</option>
                                                @foreach(\Modules\Study\Entities\Studie::all() as $studi)
                                                    <option value="{{ $studi->id }}">{{ $studi->studi_code . ' | ' . $studi->studi_name }}</option>
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
                                        <select class="form-control" name="report1task_active" id="report1task_active" required>
                                            <option value="" selected >Pilih Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Non Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="report1task_note">Catatan Daftar </label>
                                        <textarea name="report1task_note" id="report1task_note" rows="3 " class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>

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

