@extends('layouts.app')

@section('title', 'List My Hajj Saving Customers')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">List My Hajj Saving Customers</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header d-flex flex-wrap align-items-center">
                        <div>
                            Tabel : <strong>Data List My Hajj Saving Customers</i></strong>
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
                                        <th>Register Date</th>
                                        <th>ID Reference</th>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>Status</th>
                                        <th>Savings Balance</th>
                                        <th>Savings Account</th>
                                        <th>Account Number</th>
                                        <th>Agent Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($customer_network as $customer_network)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $customer_network['register_date'] }}</td>
                                            <td>{{ $customer_network['reference'] }}</td>
                                            <td>{{ $customer_network['customer_name'] }}</td>
                                            <td>{{ $customer_network['customer_phone'] }}</td>
                                            <td>
                                                @if ($customer_network['status'] == 'Active')
                                                    <span class="badge badge-success" style="font-size: 14px;">
                                                        {{ $customer_network['status'] }}
                                                    </span>
                                                @else
                                                    <span class="badge badge-secondary" style="font-size: 14px;">
                                                        {{ $customer_network['status'] }}
                                                    </span>
                                                @endif
                                            </td>
                                            <td>{{ format_currency($customer_network['total_saving']) }}</td>
                                            <td>{{ $customer_network['customer_bank'] }}</td>
                                            <td>{{ $customer_network['bank_account'] }}</td>
                                            <td>{{ $customer_network['agent_code'] . ' | ' . $customer_network['agent_name'] }}</td>
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
