@extends('layouts.app')

@section('title', 'View Data Keberangkatan')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Data Keberangkatan</a></li>
        <li class="breadcrumb-item active">View Data Keberangkatan</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('packages.index') }}"> Kembali</a>
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
                                    <input type="text" class="form-control" name="package_name" value="{{ $package->package_name }}" required readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                           <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="package_date">Tanggal Keberangkatan <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="package_date" value="{{ $package->package_date }}" required readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="package_day">Jumlah Hari <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="package_day" value="{{ $package->package_date }}" required readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="package_status">Status <span class="text-danger"></span>*</label>
                                    <select class="form-control" name="package_status" id="package_status" required readonly disabled>
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
                                    <textarea name="package_note" id="package_note" rows="3 " class="form-control" readonly disabled>{{ $package->package_note }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

