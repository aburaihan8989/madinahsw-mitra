@extends('layouts.app')

@section('title', 'Edit Data Pelajaran')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('studies.index') }}">Data Pelajaran</a></li>
        <li class="breadcrumb-item active">Edit Data Pelajaran</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="studi-form" action="{{ route('studies.update', $study) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('studies.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Update Pelajaran <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="studi_code">Kode Pelajaran <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="studi_code" required value="{{ $study->studi_code }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="studi_name">Nama Pelajaran <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="studi_name" required value="{{ $study->studi_name }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="studi_category">Kategori Pelajaran <span class="text-danger">*</span></label>
                                        <select class="form-control" name="studi_category" id="studi_category" required>
                                            <option value="" selected>Pilih Status</option>
                                            <option {{ $study->studi_category == '1' ? 'selected' : '' }} value="1">Kurikulum Sekolah</option>
                                            <option {{ $study->studi_category == '2' ? 'selected' : '' }} value="2">Kurikulum Nasional</option>
                                        </select>
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

@section('third_party_scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection
