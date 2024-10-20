@extends('layouts.app')

@section('title', 'View Data Manifest Jamaah')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">{{ $package->package_code }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manifests.index', $package->id) }}">Data Manifest Jamaah</a></li>
        <li class="breadcrumb-item active">View Data Manifest Jamaah</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('manifests.index', $package->id) }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">

                        <div class="col-lg-4 btn btn-info">
                            Data Kartu Tanda Penduduk
                        </div>
                        <hr>

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
                                    <label for="customer_ktp_name">Nama Jamaah (KTP) <span class="text-danger">*</span></label>
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

                        <div class="form-row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="customer_note">Catatan Jamaah </label>
                                    <textarea name="customer_note" id="customer_note" rows="3 " class="form-control" readonly disabled>{{ $customer->customer_note }}</textarea>
                                </div>
                            </div>
                        </div>
                        <br>

                        <div class="col-lg-4 btn btn-info">
                            Data Paspor Jamaah
                        </div>
                        <hr>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_paspor_name">Nama Jamaah (PASPOR) <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="customer_paspor_name" value="{{ $customer->customer_paspor_name }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_paspor_number">Nomor Paspor <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="customer_paspor_number" value="{{ $customer->customer_paspor_number }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_paspor_imigrasi">Kantor Imigrasi <span class="text-danger"></span></label>
                                    <input type="text" class="form-control" name="customer_paspor_imigrasi" value="{{ $customer->customer_paspor_imigrasi }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_paspor_tgl_aktif">Paspor Aktif <span class="text-danger"></span></label>
                                    <input type="date" class="form-control" name="customer_paspor_tgl_aktif" value="{{ $customer->customer_paspor_tgl_aktif }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="customer_paspor_tgl_habis">Paspor Expired <span class="text-danger"></span></label>
                                    <input type="date" class="form-control" name="customer_paspor_tgl_habis" value="{{ $customer->customer_paspor_tgl_habis }}" readonly disabled>
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
                                  <input class="form-check-input" type="checkbox" id="visa" name="visa" value="1" {{ $manifest->visa == '1' ? 'checked' : '' }} readonly disabled>
                                  <label class="form-check-label" for="visa">Visa</label>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-row">
                            <legend class="col-form-label col-sm-2 pt-0">Proses Siskopatuh</legend>
                            <div class="col-lg-2">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="siskopatuh" name="siskopatuh" value="1" {{ $manifest->siskopatuh == '1' ? 'checked' : '' }} readonly disabled>
                                  <label class="form-check-label" for="siskopatuh">Siskopatuh</label>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="form-row">
                            <legend class="col-form-label col-sm-2 pt-0">Proses Hotel</legend>
                            <div class="col-lg-2">
                                <div class="form-check">
                                  <input class="form-check-input" type="checkbox" id="hotel" name="hotel" value="1" {{ $manifest->hotel == '1' ? 'checked' : '' }} readonly disabled>
                                  <label class="form-check-label" for="hotel">Hotel</label>
                                </div>
                            </div>
                        </div>
                        <hr>

                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <label for="customers">Foto Profile Jamaah <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        {{-- @forelse($customer->getMedia('customers') as $media)
                            <img src="{{ $media->getUrl() }}" alt="Photo Jamaah" class="img-fluid img-thumbnail mb-2">
                        @empty --}}
                            <a href="{{ $customer->getFirstMediaUrl('customers') }}"><img src="{{ $customer->getFirstMediaUrl('customers') }}" alt="Foto Profile Jamaah" class="img-fluid img-thumbnail mb-2"></a>
                        {{-- @endforelse --}}
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <label for="ktp">Foto KTP Jamaah <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        {{-- @forelse($customer->getMedia('customers') as $media) --}}
                            {{-- <img src="{{ $media[0]->getUrl() }}" alt="Photo Jamaah" class="img-fluid img-thumbnail mb-2"> --}}
                        {{-- @empty --}}
                            <a href="{{ $customer->getFirstMediaUrl('ktp') }}"><img src="{{ $customer->getFirstMediaUrl('ktp') }}" alt="Foto KTP Jamaah" class="img-fluid img-thumbnail mb-2"></a>
                        {{-- @endforelse --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <label for="kk">Foto KK Jamaah <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        {{-- @forelse($customer->getMedia('customers') as $media) --}}
                            {{-- <img src="{{ $media[0]->getUrl() }}" alt="Photo Jamaah" class="img-fluid img-thumbnail mb-2"> --}}
                        {{-- @empty --}}
                            <a href="{{ $customer->getFirstMediaUrl('kk') }}"><img src="{{ $customer->getFirstMediaUrl('kk') }}" alt="Foto KK Jamaah" class="img-fluid img-thumbnail mb-2"></a>
                        {{-- @endforelse --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <label for="paspor">Foto Paspor Jamaah <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        {{-- @forelse($customer->getMedia('customers') as $media) --}}
                            {{-- <img src="{{ $media[0]->getUrl() }}" alt="Photo Jamaah" class="img-fluid img-thumbnail mb-2"> --}}
                        {{-- @empty --}}
                            <a href="{{ $customer->getFirstMediaUrl('paspor') }}"><img src="{{ $customer->getFirstMediaUrl('paspor') }}" alt="Foto Paspor Jamaah" class="img-fluid img-thumbnail mb-2"></a>
                        {{-- @endforelse --}}
                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <label for="vaksin">Foto Meningitis Jamaah <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        {{-- @forelse($customer->getMedia('customers') as $media) --}}
                            {{-- <img src="{{ $media[0]->getUrl() }}" alt="Photo Jamaah" class="img-fluid img-thumbnail mb-2"> --}}
                        {{-- @empty --}}
                            <a href="{{ $customer->getFirstMediaUrl('vaksin') }}"><img src="{{ $customer->getFirstMediaUrl('vaksin') }}" alt="Foto Meningitis Jamaah" class="img-fluid img-thumbnail mb-2"></a>
                        {{-- @endforelse --}}
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

