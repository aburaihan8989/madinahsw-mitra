@extends('layouts.app')

@section('title', 'Tambah Data Keberangkatan')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">Data Keberangkatan</a></li>
        <li class="breadcrumb-item active">Tambah Data Keberangkatan</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="package-form" action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('packages.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Tambah Keberangkatan <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="package_name">Nama Keberangkatan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="package_name" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
*                               <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="package_date">Tanggal Keberangkatan <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="package_date" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="package_day">Jumlah Hari <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="package_day" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="package_status">Status <span class="text-danger"></span>*</label>
                                        <select class="form-control" name="package_status" id="package_status" required>
                                            <option value="" selected disabled>Pilih Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Competed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="package_note">Catatan Keberangkatan </label>
                                        <textarea name="package_note" id="package_note" rows="3 " class="form-control"></textarea>
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
