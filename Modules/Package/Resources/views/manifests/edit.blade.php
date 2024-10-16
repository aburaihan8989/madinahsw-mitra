@extends('layouts.app')

@section('title', 'Edit Data Manifest Jamaah')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('packages.index') }}">{{ $package->package_code }}</a></li>
        <li class="breadcrumb-item"><a href="{{ route('manifests.index', $package->id) }}">Data Manifest Jamaah</a></li>
        <li class="breadcrumb-item active">Edit Data Manifest Jamaah</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="manifest-form" action="{{ route('manifests.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('manifests.index', $package->id) }}"> Kembali</a>
                        <button class="btn btn-primary">Update Manifest Jamaah <i class="bi bi-floppy ml-1"></i></button>
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
                                        <input type="text" class="form-control" name="customer_ktp_nik" value="{{ $customer->customer_ktp_nik }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_ktp_name">Nama Jamaah (KTP) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="customer_ktp_name" value="{{ $customer->customer_ktp_name }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_phone">Kontak Jamaah <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="customer_phone" value="{{ $customer->customer_phone }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_email">Email Jamaah <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="customer_email" value="{{ $customer->customer_email }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_ktp_city">Kota / Kabupaten <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="customer_ktp_city" value="{{ $customer->customer_ktp_city }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customer_ktp_gender">Jenis Kelamin <span class="text-danger"></span>*</label>
                                        <select class="form-control" name="customer_ktp_gender" id="customer_ktp_gender" required>
                                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                            <option {{ $customer->customer_ktp_gender == 'L' ? 'selected' : '' }} value="L">Laki-Laki</option>
                                            <option {{ $customer->customer_ktp_gender == 'P' ? 'selected' : '' }} value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_ktp_tmp_lahir">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="customer_ktp_tmp_lahir" value="{{ $customer->customer_ktp_tmp_lahir }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_ktp_tgl_lahir">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="customer_ktp_tgl_lahir" value="{{ $customer->customer_ktp_tgl_lahir }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="customer_ktp_alamat">Alamat Jamaah </label>
                                        <textarea name="customer_ktp_alamat" id="customer_ktp_alamat" rows="3 " class="form-control">{{ $customer->customer_ktp_alamat }}</textarea>
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
                                        <input type="text" class="form-control" name="customer_paspor_name" value="{{ $customer->customer_paspor_name }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_paspor_number">Nomor Paspor <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="customer_paspor_number" value="{{ $customer->customer_paspor_number }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="customer_paspor_tgl_habis">Expired Paspor <span class="text-danger"></span></label>
                                        <input type="date" class="form-control" name="customer_paspor_tgl_habis" value="{{ $customer->customer_paspor_tgl_habis }}">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" value="{{ $manifest->id }}" name="id">
                            <input type="hidden" value="{{ $manifest->mitra_id }}" name="mitra_id">
                            <input type="hidden" value="{{ $customer->id }}" name="customer_id">
                            <input type="hidden" value="{{ $customer->customer_kode }}" name="customer_kode">
                            <input type="hidden" value="{{ $package->id }}" name="package_id">

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="customers">Photo Jamaah <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 4, Max File Size: 1MB, Image Size: 400x400"></i></label>
                                <div class="dropzone d-flex flex-wrap align-items-center justify-content-center" id="document-dropzone">
                                    <div class="dz-message" data-dz-message>
                                        <i class="bi bi-cloud-arrow-up"></i>
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

@push('page_scripts')
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('dropzone.upload') }}',
            maxFilesize: 1,
            acceptedFiles: '.jpg, .jpeg, .png',
            maxFiles: 4,
            addRemoveLinks: true,
            dictRemoveFile: "<i class='bi bi-x-circle text-danger'></i> remove",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">');
                uploadedDocumentMap[file.name] = response.name;
            },
            removedfile: function (file) {
                file.previewElement.remove();
                var name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $.ajax({
                    type: "POST",
                    url: "{{ route('dropzone.delete') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'file_name': `${name}`
                    },
                });
                $('form').find('input[name="document[]"][value="' + name + '"]').remove();
            },
            init: function () {
                @if(isset($customer) && $customer->getMedia('customers'))
                var files = {!! json_encode($customer->getMedia('customers')) !!};
                for (var i in files) {
                    var file = files[i];
                    this.options.addedfile.call(this, file);
                    this.options.thumbnail.call(this, file, file.original_url);
                    file.previewElement.classList.add('dz-complete');
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">');
                }
                @endif
            }
        }
    </script>
@endpush
