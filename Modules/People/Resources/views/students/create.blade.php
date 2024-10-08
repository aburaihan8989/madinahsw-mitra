@extends('layouts.app')

@section('title', 'Tambah Data Siswa')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('students.index') }}">Data Siswa</a></li>
        <li class="breadcrumb-item active">Tambah Data Siswa</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="student-form" action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning bi bi-arrow-return-left mr-2" href="{{ route('students.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Tambah Siswa <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_nis">NIS Siswa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="student_nis" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_nik">NIK Siswa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="student_nik" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_name">Nama Siswa  <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="student_name" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="student_gender">Gender <span class="text-danger"></span>*</label>
                                        <select class="form-control" name="student_gender" id="student_gender" required>
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
                                        <label for="student_place">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="student_place" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_birth">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="student_birth" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_join">Tanggal Masuk <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="student_join" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="student_level">Level Siswa <span class="text-danger">*</span></label>
                                        <select class="form-control" name="student_level" id="student_level" required>
                                            <option value="" selected >Pilih Level</option>
                                            <option value="1">TK</option>
                                            <option value="2">SD</option>
                                            <option value="3">SMP</option>
                                            <option value="4">SMA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="student_active">Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="student_active" id="student_active" required>
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
                                        <label for="student_wali1">Wali 1 Siswa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="student_wali1" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_wali2">Wali 2 Siswa  <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="student_wali2">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_phone">Kontak / Whatsapp <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="student_phone" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_email">Email Siswa <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="student_email">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="student_city">Kota / Kabupaten <span class="text-danger"></span></label>
                                        <input type="text" class="form-control" name="student_city">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="student_address">Alamat Siswa </label>
                                        <textarea name="student_address" id="student_address" rows="3 " class="form-control"></textarea>
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
                                <label for="students">Photo Siswa <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
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
                @if(isset($students) && $students->getMedia('students'))
                var files = {!! json_encode($students->getMedia('students')) !!};
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
