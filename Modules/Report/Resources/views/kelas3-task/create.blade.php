@extends('layouts.app')

@section('title', 'Daftar Siswa Kelas Mengaji Al Quran')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('kelas3-task.index') }}">Kelas Mengaji Al Quran</a></li>
        <li class="breadcrumb-item active">Daftar Siswa Kelas Mengaji Al Quran</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="kelas3-task-form" action="{{ route('kelas3-task.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('kelas3-task.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Daftar Siswa <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kelas3_task_date">Tanggal Daftar <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="kelas3_task_date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="kelas3_task_student_id">Nama Siswa <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas3_task_student_id" id="kelas3_task_student_id" required>
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
                                            <label for="kelas3_task_teacher_id">Nama Pengajar <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas3_task_teacher_id" id="kelas3_task_teacher_id" required>
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
                                            <label for="kelas3_task_studi_id">Nama Pelajaran <span class="text-danger">*</span></label>
                                            <select class="form-control" name="kelas3_task_studi_id" id="kelas3_task_studi_id" required>
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
                                        <label for="kelas3_task_active">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="kelas3_task_active" id="kelas3_task_active" required>
                                            <option value="" selected >Pilih Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Completed</option>
                                            <option value="3">Non Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="kelas3_task_note">Catatan Daftar </label>
                                        <textarea name="kelas3_task_note" id="kelas3_task_note" rows="3 " class="form-control"></textarea>
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

