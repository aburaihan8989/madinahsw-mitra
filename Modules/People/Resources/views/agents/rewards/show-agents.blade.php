@extends('layouts.app')

@section('title', 'List My Agents Network')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">My Agents Network</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header d-flex flex-wrap align-items-center">
                        <div>
                            Tabel : <strong>Data List My Agent Network | <i>{{ auth()->user()->name }}</i></strong>
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
                                        <th>Agent Code</th>
                                        <th>Agent Name</th>
                                        <th>Phone Number</th>
                                        <th>Agent Level</th>
                                        <th>Customer Count</th>
                                        <th>City</th>
                                        {{-- <th>Referal Agent</th>
                                        <th>Referal Level</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($agent_network as $agent_network)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $agent_network['agent_code'] }}</td>
                                            <td>{{ $agent_network['agent_name'] }}</td>
                                            <td>{{ $agent_network['agent_phone'] }}</td>
                                            <td>{{ $agent_network['level_agent'] }}</td>
                                            <td>{{ $agent_network['umroh_customers_count'] }}</td>
                                            <td>{{ $agent_network['city'] }}</td>
                                            {{-- <td>{{ $agent_network['level_agent'] }}</td>
                                            <td>{{ $agent_network['level_agent'] }}</td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">
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
