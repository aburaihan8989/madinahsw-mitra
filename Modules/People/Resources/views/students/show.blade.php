@extends('layouts.app')

@section('title', 'View Data Siswa')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Siswa</a></li>
        <li class="breadcrumb-item active">View Data Siswa</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-primary bi bi-arrow-return-left mr-2" href="{{ route('students.index') }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_kode">Kode Siswa <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_kode" required value="{{ $student->student_kode }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_nis">NIS Siswa <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_nis" required value="{{ $student->student_nis }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_nisn">NISN Siswa <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_nisn" required value="{{ $student->student_nisn }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_nik">NIK Siswa <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_nik" required value="{{ $student->student_nik }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_name">Nama Siswa  <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_name" required value="{{ $student->student_name }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student_gender">Gender <span class="text-danger">*</span></label>
                                    <select class="form-control" name="student_gender" id="student_gender" required readonly disabled>
                                        <option value="" selected >Pilih Gender</option>
                                        <option {{ $student->student_gender == "L" ? 'selected' : '' }} value="L">Laki-Laki</option>
                                        <option {{ $student->student_gender == "P" ? 'selected' : '' }} value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_place">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_place" required value="{{ $student->student_place }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_birth">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="student_birth" required value="{{ $student->student_birth }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_join">Tanggal Masuk <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="student_join" required value="{{ $student->student_join }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student_level">Level Siswa <span class="text-danger">*</span></label>
                                    <select class="form-control" name="student_level" id="student_level" required readonly disabled>
                                        <option value="" selected >Pilih Level</option>
                                        <option {{ $student->student_level == "1" ? 'selected' : '' }} value="1">TK</option>
                                        <option {{ $student->student_level == "2" ? 'selected' : '' }} value="2">SD</option>
                                        <option {{ $student->student_level == "3" ? 'selected' : '' }} value="3">SMP</option>
                                        <option {{ $student->student_level == "4" ? 'selected' : '' }} value="4">SMA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="student_active">Status <span class="text-danger">*</span></label>
                                    <select class="form-control" name="student_active" id="student_active" required readonly disabled>
                                        <option value="" selected >Pilih Status</option>
                                        <option {{ $student->student_active == "1" ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $student->student_active == "2" ? 'selected' : '' }} value="2">Non Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_wali1">Wali 1 Siswa <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_wali1" required value="{{ $student->student_wali1 }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_wali2">Wali 2 Siswa <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="student_wali2" value="{{ $student->student_wali2 }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_phone">Kontak / Whatsapp <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="student_phone" required value="{{ $student->student_phone }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_email">Email Siswa <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="student_email" value="{{ $student->student_email }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="student_city">Kota / Kabupaten <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="student_city" value="{{ $student->student_city }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="student_address">Alamat Siswa </label>
                                    <textarea name="student_address" id="student_address" rows="3 " class="form-control" readonly disabled>{{ $student->student_address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <label for="students">Photo Siswa <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        @forelse($student->getMedia('students') as $media)
                            <img src="{{ $media->getUrl() }}" alt="Photo Siswa" class="img-fluid img-thumbnail mb-2">
                        @empty
                            <img src="{{ $student->getFirstMediaUrl('students') }}" alt="Photo Siswa" class="img-fluid img-thumbnail mb-2">
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

