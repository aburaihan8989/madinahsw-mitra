@extends('layouts.app')

@section('title', 'List Referal Agent Customers Network')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Referal Agent Customers Network</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header d-flex flex-wrap align-items-center">
                        <div>
                            Tabel : <strong>Data List Referal Agent Customers Network | <i></i></strong>
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
                                        <th>ID Reference</th>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>City</th>
                                        <th>Customer Package</th>
                                        <th>Referal Code</th>
                                        <th>Referal Name</th>
                                        <th>Referal Rewards</th>
                                        <th>Group</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($customer_referal_network as $customer_referal_network)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $customer_referal_network['reference'] }}</td>
                                            <td>{{ $customer_referal_network['customer_name'] }}</td>
                                            <td>{{ $customer_referal_network['customer_phone'] }}</td>
                                            <td>{{ $customer_referal_network['city'] }}</td>
                                            <td>{{ $customer_referal_network['package_name'] }}</td>
                                            <td>{{ $customer_referal_network['agent_code'] }}</td>
                                            <td>{{ $customer_referal_network['agent_name'] }}</td>
                                            <td>{{ format_currency($customer_referal_network['referal_reward']) }}</td>
                                            <td>{{ $customer_referal_network['promo'] == 1 ? 'Promo' : 'Reguler' }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10">
                                                <span class="text-danger">No Data Available!</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{-- <div @class(['mt-3' => $customer_network->hasPages()])>
                            {{ $customer_network->links() }}
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

{{-- @push('page_scripts')
    {!! $dataTable->scripts() !!}
@endpush --}}
