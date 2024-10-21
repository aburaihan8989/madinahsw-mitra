@extends('layouts.app')

@section('title', 'Home')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item active">Home Dashboard</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        @can('show_total_stats')
            <li class="breadcrumb-item active">Data Transaksi</li>
            <hr>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="bg-success p-3 mfe-3 rounded">
                                <i class="bi bi-cash-stack font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-primary" style="font-size: 20px">{{ format_currency2(6774) }}</div>
                                <div class="text-uppercase font-weight-bold small">Total Transactions</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="bg-success p-3 mfe-3 rounded">
                                <i class="bi bi-cash-stack font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-primary" style="font-size: 20px">{{ format_currency2(352) }}</div>
                                <div class="text-uppercase font-weight-bold small">Total Rewards</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="bg-primary p-3 mfe-3 rounded">
                                <i class="bi bi-cash-stack font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-primary" style="font-size: 20px">{{ format_currency2(4871) }}</div>
                                <div class="text-uppercase font-weight-bold small">Visa Transactions</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="bg-primary p-3 mfe-3 rounded">
                                <i class="bi bi-cash-stack font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-primary" style="font-size: 20px">{{ format_currency2(2379) }}</div>
                                <div class="text-uppercase font-weight-bold small">Hotel Transactions</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="bg-primary p-3 mfe-3 rounded">
                                <i class="bi bi-cash-stack font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-primary" style="font-size: 20px">{{ format_currency2(431) }}</div>
                                <div class="text-uppercase font-weight-bold small">Siskopatuh Transactions</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <li class="breadcrumb-item active">Data Statistik</li>
            <hr>

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                <i class="bi bi-people font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-uppercase font-weight-bold medium">Data Jamaah</div>
                                <div class="text-value text-primary">{{ $customers . ' Jamaah' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                <i class="bi bi-person-workspace font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-uppercase font-weight-bold medium">Data Keberangkatan</div>
                                <div class="text-value text-primary">{{ $packages . ' Keberangkatan' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <li class="breadcrumb-item active">Data Layanan</li>
            <hr>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header d-flex flex-wrap align-items-center">
                            <div>
                                Tabel : <strong>Data List Harga Layanan </i></strong>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center mb-0">
                                    <div wire:loading.flex class="col-12 position-absolute justify-content-center align-items-center" style="top:0;right:0;left:0;bottom:0;background-color: rgba(255,255,255,0.5);z-index: 99;">
                                        <div class="spinner-border text-primary" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Layanan</th>
                                            <th>Nama Layanan</th>
                                            <th>Harga < 20 Pax</th>
                                            <th>Harga 20 ~ 35 Pax</th>
                                            <th>Harga > 36 Pax</th>
                                            <th>Kategori</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($products as $product)
                                            <tr>
                                                <td style="width:80px">{{ $loop->iteration }}</td>
                                                <td style="width:150px">{{ $product['product_code'] }}</td>
                                                <td>{{ $product['product_name'] }}</td>
                                                <td style="width:170px">{{ format_currency2($product['product_price1']) }}</td>
                                                <td style="width:170px">{{ format_currency2($product['product_price2']) }}</td>
                                                <td style="width:170px">{{ format_currency2($product['product_price3']) }}</td>
                                                <td style="width:170px">{{ $product['product_category'] == '1' ? 'Visa' : ($product['product_category'] == '2' ? 'Hotel' : 'Siskopatuh') }}</td>
                                                <td style="width:170px">
                                                    @if ($product['product_active'] == 1)
                                                        <span class="badge badge-success" style="font-size: 14px;">
                                                            Active
                                                        </span>
                                                    @else
                                                        <span class="badge badge-secondary" style="font-size: 14px;">
                                                            Not Active
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">
                                                    <span class="text-danger">No Data Available!</span>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div @class(['mt-3' => $products->hasPages()])>
                                {{ $products->links() }}
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <br>

        @endcan

    </div>
@endsection

