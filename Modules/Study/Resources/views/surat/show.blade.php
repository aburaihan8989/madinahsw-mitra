@extends('layouts.app')

@section('title', 'View Data Surat')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('surats.index') }}">Data Surat</a></li>
        <li class="breadcrumb-item active">View Data Surat</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('surats.index') }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="surat_code">Kode Surat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="surat_code" required value="{{ $surat->surat_code }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="surat_name">Nama Surat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="surat_name" required value="{{ $surat->surat_name }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

