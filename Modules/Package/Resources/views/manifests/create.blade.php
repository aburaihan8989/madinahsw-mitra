@extends('layouts.app')

@section('title', 'Tambah Data Manifest Jamaah')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">{{ $package->package_code }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manifests.index', $package->id) }}">Data Manifest Jamaah</a></li>
        <li class="breadcrumb-item active">Tambah Data Manifest Jamaah</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="manifest-form" action="{{ route('manifests.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('manifests.index', $package->id) }}"> Kembali</a>
                        <button class="btn btn-primary">Tambah Manifest Jamaah <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">

                            <div class="col-lg-4 btn btn-info">
                                Database Jamaah
                            </div>
                            <hr>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="customer_id">Nama Jamaah <span class="text-danger">*</span></label>
                                            <select class="select2 form-control" name="customer_id" id="customer_id" required>
                                                <option value="" selected disabled>Pilih Nama Jamaah</option>
                                                @foreach(\Modules\People\Entities\Customer::all() as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->customer_kode . ' | ' . $customer->customer_ktp_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="col-lg-4 btn btn-info">
                                Data Layanan Jamaah
                            </div>
                            <hr>

                            <div class="form-row">
                                <legend class="col-form-label col-sm-2 pt-0">Proses Visa</legend>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="visa" name="visa" value="1">
                                      <label class="form-check-label" for="visa">Visa</label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-row">
                                <legend class="col-form-label col-sm-2 pt-0">Proses Siskopatuh</legend>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="siskopatuh" name="siskopatuh" value="1">
                                      <label class="form-check-label" for="siskopatuh">Siskopatuh</label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="form-row">
                                <legend class="col-form-label col-sm-2 pt-0">Proses Hotel</legend>
                                <div class="col-lg-2">
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" id="hotel" name="hotel" value="1">
                                      <label class="form-check-label" for="hotel">Hotel</label>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <input type="hidden" value="{{ $package->id }}" name="package_id">

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

@push('page_scripts')
    <script>
        $(document).ready(function() {
        console.log('');
        $('.select2').select2();
        });
   </script>
@endpush
