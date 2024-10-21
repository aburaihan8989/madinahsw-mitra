@extends('layouts.app')

@section('title', 'Edit Data Layanan')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Data Layanan</a></li>
        <li class="breadcrumb-item active">Edit Data Layanan</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="product-form" action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('products.index') }}"> Kembali</a>
                        <button class="btn btn-primary">Update Layanan <i class="bi bi-floppy ml-1"></i></button>
                    </div>
                </div>

                <div class="col-lg-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_code">Kode Layanan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}" readonly>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_name">Nama Layanan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_cost">Harga Dasar <span class="text-danger">*</span></label>
                                        <input id="product_cost" type="text" class="form-control" name="product_cost" value="{{ $product->product_cost }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_price1">Harga < 20 Pax <span class="text-danger">*</span></label>
                                        <input id="product_price1" type="text" class="form-control" name="product_price1" value="{{ $product->product_price1 }}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_price2">Harga 20 ~ 35 Pax <span class="text-danger"></span></label>
                                        <input id="product_price2" type="text" class="form-control" name="product_price2" value="{{ $product->product_price2 }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_price3">Harga > 36 Pax <span class="text-danger"></span></label>
                                        <input id="product_price3" type="text" class="form-control" name="product_price3" value="{{ $product->product_price3 }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_category">Kategori</label>
                                        <select class="form-control" name="product_category" id="product_category" required>
                                            <option value="" selected disabled>Pilih Kategori</option>
                                            <option {{ $product->product_category == '1' ? 'selected' : '' }} value="1">Visa</option>
                                            <option {{ $product->product_category == '2' ? 'selected' : '' }} value="2">Hotel</option>
                                            <option {{ $product->product_category == '3' ? 'selected' : '' }} value="3">Siskopatuh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="product_active">Status</label>
                                        <select class="form-control" name="product_active" id="product_active" required>
                                            <option value="" selected disabled>Pilih Status</option>
                                            <option {{ $product->product_active == '1' ? 'selected' : '' }} value="1">Active</option>
                                            <option {{ $product->product_active == '2' ? 'selected' : '' }} value="2">Not Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="form-group">
                                <label for="product_note">Catatan Layanan</label>
                                <textarea name="product_note" id="product_note" rows="3" class="form-control"></textarea>
                            </div> --}}

                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="products">Foto Layanan <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
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
                @if(isset($product) && $product->getMedia('products'))
                var files = {!! json_encode($product->getMedia('products')) !!};
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

    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#product_cost').maskMoney({
                prefix:'{{ settings()->currency2->symbol }}',
                thousands:'{{ settings()->currency2->thousand_separator }}',
                decimal:'{{ settings()->currency2->decimal_separator }}',
            });
            $('#product_price1').maskMoney({
                prefix:'{{ settings()->currency2->symbol }}',
                thousands:'{{ settings()->currency2->thousand_separator }}',
                decimal:'{{ settings()->currency2->decimal_separator }}',
            });
            $('#product_price2').maskMoney({
                prefix:'{{ settings()->currency2->symbol }}',
                thousands:'{{ settings()->currency2->thousand_separator }}',
                decimal:'{{ settings()->currency2->decimal_separator }}',
            });
            $('#product_price3').maskMoney({
                prefix:'{{ settings()->currency2->symbol }}',
                thousands:'{{ settings()->currency2->thousand_separator }}',
                decimal:'{{ settings()->currency2->decimal_separator }}',
            });


            $('#product-form').submit(function () {
                var product_cost = $('#product_cost').maskMoney('unmasked')[0];
                var product_price1 = $('#product_price1').maskMoney('unmasked')[0];
                var product_price2 = $('#product_price2').maskMoney('unmasked')[0];
                var product_price3 = $('#product_price3').maskMoney('unmasked')[0];
                $('#product_cost').val(product_cost);
                $('#product_price1').val(product_price1);
                $('#product_price2').val(product_price2);
                $('#product_price3').val(product_price3);
            });
        });
    </script>
@endpush
