@extends('layouts.app')

@section('title', 'Edit Data Keberangkatan')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Data Keberangkatan</a></li>
        <li class="breadcrumb-item active">Edit Data Keberangkatan</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="package-form" action="{{ route('packages.update', $package) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('packages.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Update Keberangkatan <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="package_code">Kode Keberangkatan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="package_code" value="{{ $package->package_code }}" readonly disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="package_name">Nama Keberangkatan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="package_name" value="{{ $package->package_name }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                               <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="package_date">Tanggal Keberangkatan <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="package_date" value="{{ $package->package_date }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="package_day">Jumlah Hari <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="package_day" value="{{ $package->package_date }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="package_status">Status <span class="text-danger"></span>*</label>
                                        <select class="form-control" name="package_status" id="package_status" required>
                                            <option value="" selected disabled>Pilih Status</option>
                                            <option {{ $package->package_status == '1' ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $package->package_status == '2' ? 'selected' : '' }} value="2">Completed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="package_note">Catatan Keberangkatan </label>
                                        <textarea name="package_note" id="package_note" rows="3 " class="form-control">{{ $package->package_note }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{ $package->mitra_id }}" name="mitra_id">
                            <input type="hidden" value="{{ $package->mitra_name }}" name="mitra_name">

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
