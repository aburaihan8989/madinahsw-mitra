@extends('layouts.app')

@section('title', 'View Data Layanan')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Data Layanan</a></li>
        <li class="breadcrumb-item active">View Data Layanan</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">

            <div class="col-lg-12">
                {{-- @include('utils.alerts') --}}
                <div class="form-group">
                    <a class="btn btn-warning text-white bi bi-arrow-return-left mr-2" href="{{ route('products.index') }}"> Kembali</a>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_code">Kode Layanan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="product_code" value="{{ $product->product_code }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_name">Nama Layanan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" required readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_cost">Harga Dasar <span class="text-danger">*</span></label>
                                    <input id="product_cost" type="text" class="form-control" name="product_cost" value="{{ format_currency2($product->product_cost) }}" required readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_price1">Harga < 20 Pax <span class="text-danger">*</span></label>
                                    <input id="product_price1" type="text" class="form-control" name="product_price1" value="{{ format_currency2($product->product_price1) }}" required readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_price2">Harga 20 ~ 35 Pax <span class="text-danger"></span></label>
                                    <input id="product_price2" type="text" class="form-control" name="product_price2" value="{{ format_currency2($product->product_price2) }}" readonly disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_price3">Harga > 36 Pax <span class="text-danger"></span></label>
                                    <input id="product_price3" type="text" class="form-control" name="product_price3" value="{{ format_currency2($product->product_price3) }}" readonly disabled>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="product_category">Kategori</label>
                                    <select class="form-control" name="product_category" id="product_category" required readonly disabled>
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
                                    <select class="form-control" name="product_active" id="product_active" required readonly disabled>
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
                        <label for="products">Foto Layanan <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                        <br>
                        {{-- @forelse($customer->getMedia('customers') as $media)
                            <img src="{{ $media->getUrl() }}" alt="Photo Jamaah" class="img-fluid img-thumbnail mb-2">
                        @empty --}}
                            <a href="{{ $product->getFirstMediaUrl('products') }}"><img src="{{ $product->getFirstMediaUrl('products') }}" alt="Foto Layanan" class="img-fluid img-thumbnail mb-2"></a>
                        {{-- @endforelse --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

