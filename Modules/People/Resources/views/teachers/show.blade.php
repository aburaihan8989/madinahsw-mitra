@extends('layouts.app')

@section('title', 'View Data Pengajar')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('teachers.index') }}">Data Pengajar</a></li>
        <li class="breadcrumb-item active">View Data Pengajar</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-primary bi bi-arrow-return-left mr-2" href="{{ route('teachers.index') }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_kode">Kode Pengajar <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="teacher_kode" required value="{{ $teacher->teacher_kode }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_nip">NIP Pengajar <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="teacher_nip" required value="{{ $teacher->teacher_nip }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_nik">NIK Pengajar <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="teacher_nik" required value="{{ $teacher->teacher_nik }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_name">Nama Pengajar  <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="teacher_name" value="{{ $teacher->teacher_name }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="teacher_gender">Gender <span class="text-danger"></span></label>
                                    <select class="form-control" name="teacher_gender" id="teacher_gender" readonly disabled>
                                        <option value="" selected >Pilih Gender</option>
                                        <option {{ $teacher->teacher_gender == "L" ? 'selected' : '' }} value="L">Laki-Laki</option>
                                        <option {{ $teacher->teacher_gender == "P" ? 'selected' : '' }} value="P">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_place">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="teacher_place" required value="{{ $teacher->teacher_place }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_birth">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="teacher_birth" required value="{{ $teacher->teacher_birth }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_join">Tanggal Masuk <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="teacher_join" required value="{{ $teacher->teacher_join }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="teacher_family">Status Keluarga <span class="text-danger"></span></label>
                                    <select class="form-control" name="teacher_family" id="teacher_family" readonly disabled>
                                        <option value="" selected >Pilih Status Keluarga</option>
                                        <option {{ $teacher->teacher_family == "1" ? 'selected' : '' }} value="1">Menikah</option>
                                        <option {{ $teacher->teacher_family == "2" ? 'selected' : '' }} value="2">Belum Menikah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_anak">Jumlah Keluarga <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="teacher_anak" value="{{ $teacher->teacher_anak }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="teacher_level">Jabatan <span class="text-danger"></span></label>
                                    <select class="form-control" name="teacher_level" id="teacher_level" readonly disabled>
                                        <option value="" selected >Pilih Jabatan</option>
                                        <option {{ $teacher->teacher_level == "1" ? 'selected' : '' }} value="1">Komite Sekolah</option>
                                        <option {{ $teacher->teacher_level == "2" ? 'selected' : '' }} value="2">Kepala Sekolah</option>
                                        <option {{ $teacher->teacher_level == "3" ? 'selected' : '' }} value="3">Wakil Kepala Sekolah</option>
                                        <option {{ $teacher->teacher_level == "4" ? 'selected' : '' }} value="4">Sekretaris</option>
                                        <option {{ $teacher->teacher_level == "5" ? 'selected' : '' }} value="5">Bendahara</option>
                                        <option {{ $teacher->teacher_level == "6" ? 'selected' : '' }} value="6">Pengajar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="teacher_active">Status <span class="text-danger"></span></label>
                                    <select class="form-control" name="teacher_active" id="teacher_active" readonly disabled>
                                        <option value="" selected >Pilih Status</option>
                                        <option {{ $teacher->teacher_active == "1" ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $teacher->teacher_active == "2" ? 'selected' : '' }} value="2">Non Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_phone">Kontak / Whatsapp <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="teacher_phone" value="{{ $teacher->teacher_phone }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_email">Email Pengajar <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="teacher_email" value="{{ $teacher->teacher_email }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="teacher_city">Kota / Kabupaten <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="teacher_city" value="{{ $teacher->teacher_city }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="teacher_address">Alamat Pengajar </label>
                                    <textarea name="teacher_address" id="teacher_address" rows="3 " class="form-control" readonly disabled>{{ $teacher->teacher_address }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <label for="teachers">Photo Pengajar <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        @forelse($teacher->getMedia('teachers') as $media)
                            <img src="{{ $media->getUrl() }}" alt="Photo Pengajar" class="img-fluid img-thumbnail mb-2">
                        @empty
                            <img src="{{ $teacher->getFirstMediaUrl('teachers') }}" alt="Photo Pengajar" class="img-fluid img-thumbnail mb-2">
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

