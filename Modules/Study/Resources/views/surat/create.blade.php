@extends('layouts.app')

@section('title', 'Tambah Data Surat')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('surats.index') }}">Data Surat</a></li>
        <li class="breadcrumb-item active">Tambah Data Surat</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="surat-form" action="{{ route('surats.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('surats.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Tambah Surat <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="surat_name">Nama Surat <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="surat_name" required>
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
    {{-- <script src="{{ asset('js/dropzone.js') }}"></script> --}}
@endsection
