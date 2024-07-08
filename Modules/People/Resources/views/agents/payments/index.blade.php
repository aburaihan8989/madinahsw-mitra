@extends('layouts.app')

@section('title', 'History Reward Payments')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">History Reward Payments</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header d-flex flex-wrap align-items-center">
                    <div>
                        Tabel : <strong>Data List History Payments | <i>{{ auth()->user()->name }}</i></strong>
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
                                    <th>Transaction Date</th>
                                    <th>ID Reference</th>
                                    <th>Agent Name</th>
                                    <th>Phone Number</th>
                                    <th>Category</th>
                                    <th>Payment Amount</th>
                                    <th>Method</th>
                                    <th>Approval Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($agent_payment as $agent_payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ \Carbon\Carbon::parse($agent_payment['date'])->format('d-m-Y') }}</td>
                                        <td>{{ $agent_payment['reference'] }}</td>
                                        <td>{{ $agent_payment['agent_name'] }}</td>
                                        <td>{{ $agent_payment['agent_phone'] }}</td>
                                        <td>{{ $agent_payment['trx_type'] }}</td>
                                        <td>{{ format_currency($agent_payment['amount']) }}</td>
                                        <td>{{ $agent_payment['payment_method'] }}</td>
                                        <td class="align-middle">
                                            @if ($agent_payment['status'] == 'Verified')
                                                <span class="badge badge-success" style="font-size: 14px;">
                                                    {{ $agent_payment['status'] }}
                                                </span>
                                            @else
                                                <span class="badge badge-danger" style="font-size: 14px;">
                                                    {{ $agent_payment['status'] }}
                                                </span>
                                            @endif
                                        </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">
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
