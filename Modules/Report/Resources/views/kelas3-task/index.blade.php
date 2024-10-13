@extends('layouts.app')

@section('title', 'Kelas Mengaji Al Quran')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Kelas Mengaji Al Quran</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('kelas3-task.create') }}" class="btn btn-primary">
                            Daftar Siswa <i class="bi bi-plus"></i>
                        </a>

                        <a href="{{ route('kelas3-result.index') }}" class="btn btn-warning text-white mr-2" style="float: right;">
                            Laporan Mengaji Al Quran <i class="bi bi-clock-history ml-1"></i>
                        </a>

                        <a href="{{ route('kelas3-task.riwayat') }}" class="btn btn-info text-white mr-2" style="float: right;">
                            Riwayat Siswa <i class="bi bi-clock-history ml-1"></i>
                        </a>

                        <hr>

                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    {!! $dataTable->scripts() !!}
@endpush
