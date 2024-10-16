@extends('layouts.app')

@section('title', 'View Data Jamaah')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Data Jamaah</a></li>
        <li class="breadcrumb-item active">View Data Jamaah</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('customers.index') }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_kode">Kode Jamaah <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_kode" value="{{ $customer->customer_kode }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_ktp_nik">NIK Jamaah <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_ktp_nik" value="{{ $customer->customer_ktp_nik }}" required readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_ktp_name">Nama Jamaah <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_ktp_name" value="{{ $customer->customer_ktp_name }}" required readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_phone">Kontak Jamaah <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_phone" value="{{ $customer->customer_phone }}" required readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_email">Email Jamaah <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="customer_email" value="{{ $customer->customer_email }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_ktp_city">Kota / Kabupaten <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="customer_ktp_city" value="{{ $customer->customer_ktp_city }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="customer_ktp_gender">Jenis Kelamin <span class="text-danger"></span>*</label>
                                    <select class="form-control" name="customer_ktp_gender" id="customer_ktp_gender" required readonly disabled>
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option {{ $customer->customer_ktp_gender == 'L' ? 'selected' : '' }} value="L">Laki-Laki</option>
                                        <option {{ $customer->customer_ktp_gender == 'P' ? 'selected' : '' }} value="P">Perempuan</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_ktp_tmp_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="customer_ktp_tmp_lahir" value="{{ $customer->customer_ktp_tmp_lahir }}" required readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_ktp_tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="customer_ktp_tgl_lahir" value="{{ $customer->customer_ktp_tgl_lahir }}" required readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="customer_ktp_alamat">Alamat Jamaah </label>
                                    <textarea name="customer_ktp_alamat" id="customer_ktp_alamat" rows="3 " class="form-control" readonly disabled>{{ $customer->customer_ktp_alamat }}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <label for="customers">Photo Jamaah <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        @forelse($customer->getMedia('customers') as $media)
                            <img src="{{ $media->getUrl() }}" alt="Photo Jamaah" class="img-fluid img-thumbnail mb-2">
                        @empty
                            <img src="{{ $customer->getFirstMediaUrl('customers') }}" alt="Photo Jamaah" class="img-fluid img-thumbnail mb-2">
                        @endforelse
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

