@extends('layouts.app')

@section('title', 'Tambah Data Pengajar')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('teachers.index') }}">Data Pengajar</a></li>
        <li class="breadcrumb-item active">Tambah Data Pengajar</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="teacher-form" action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('teachers.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Tambah Pengajar <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_nip">NIP Pengajar <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="teacher_nip" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_nik">NIK Pengajar <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="teacher_nik" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_name">Nama Pengajar  <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="teacher_name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="teacher_gender">Gender <span class="text-danger"></span>*</label>
                                        <select class="form-control" name="teacher_gender" id="teacher_gender" required>
                                            <option value="" selected >Pilih Gender</option>
                                            <option value="L">Laki-Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_place">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="teacher_place" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_birth">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="teacher_birth" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_join">Tanggal Masuk <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="teacher_join" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="teacher_family">Status Keluarga <span class="text-danger">*</span></label>
                                        <select class="form-control" name="teacher_family" id="teacher_family" required>
                                            <option value="" selected >Pilih Status Keluarga</option>
                                            <option value="1">Menikah</option>
                                            <option value="2">Belum Menikah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_anak">Jumlah Keluarga <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="teacher_anak">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="teacher_level">Jabatan <span class="text-danger">*</span></label>
                                        <select class="form-control" name="teacher_level" id="teacher_level" required>
                                            <option value="" selected >Pilih Jabatan</option>
                                            <option value="1">Komite Sekolah</option>
                                            <option value="2">Kepala Sekolah</option>
                                            <option value="3">Wakil Kepala Sekolah</option>
                                            <option value="4">Sekretaris</option>
                                            <option value="5">Bendahara</option>
                                            <option value="6">Pengajar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="teacher_active">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="teacher_active" id="teacher_active" required>
                                            <option value="" selected >Pilih Status</option>
                                            <option value="1">Active</option>
                                            <option value="2">Non Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_phone">Kontak / Whatsapp <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="teacher_phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_email">Email Pengajar <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="teacher_email">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="teacher_city">Kota / Kabupaten <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="teacher_city">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="teacher_address">Alamat Pengajar </label>
                                        <textarea name="teacher_address" id="teacher_address" rows="3 " class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="teachers">Photo Pengajar <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
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
            maxFiles: 1,
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
                @if(isset($teachers) && $teachers->getMedia('teachers'))
                var files = {!! json_encode($teachers->getMedia('teachers')) !!};
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
