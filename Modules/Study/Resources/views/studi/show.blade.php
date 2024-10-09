@extends('layouts.app')

@section('title', 'View Data Pelajaran')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('studies.index') }}">Data Pelajaran</a></li>
        <li class="breadcrumb-item active">View Data Pelajaran</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-primary bi bi-arrow-return-left mr-2" href="{{ route('studies.index') }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="studi_code">Kode Pelajaran <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="studi_code" required value="{{ $study->studi_code }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="studi_name">Nama Pelajaran <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="studi_name" required value="{{ $study->studi_name }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

