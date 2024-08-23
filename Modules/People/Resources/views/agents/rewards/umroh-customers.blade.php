@extends('layouts.app')

@section('title', 'List My Umroh Customers Network')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">List My Umroh Customers Network</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header d-flex flex-wrap align-items-center">
                        <div>
                            Tabel : <strong>Data List My Umroh Customers Network | <i>{{ auth()->user()->name }}</i></strong>
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
                                        <th>Agent Name</th>
                                        <th>Agent Rewards</th>
                                        <th>Group</th>
                                        <th>Potential</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($customer_network as $customer_network)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>

                                            <td>{{ $customer_network['reference'] }}</td>
                                            <td>{{ $customer_network['customer_name'] }}</td>
                                            <td>{{ $customer_network['customer_phone'] }}</td>
                                            <td>{{ $customer_network['city'] }}</td>
                                            <td>{{ $customer_network['package_name'] }}</td>
                                            <td>{{ $customer_network['agent_code'] . ' | ' . $customer_network['agent_name'] }}</td>
                                            <td>{{ format_currency($customer_network['agent_reward']) }}</td>
                                            <td>{{ $customer_network['promo'] == 1 ? 'Promo' : 'Reguler' }}</td>
                                            <td>
                                                @if($customer_network['mark'] == 1)
                                                    <i class="bi bi-check-circle-fill" style="line-height:1;font-size:25px;color:green;"></i>
                                                @else

                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group dropleft">
                                                    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button id="mark" class="btn btn-danger ml-2 btn-sm" onclick="
                                                            event.preventDefault();
                                                            if (confirm('Are you sure? It will mark as potential customer!')) {
                                                            document.getElementById('markUmrohCustomer{{ $customer_network['id'] }}').submit()
                                                            }
                                                            ">
                                                            <i class="bi bi-star-fill mr-2"></i> Mark As Potential
                                                            <form id="markUmrohCustomer{{ $customer_network['id'] }}" class="d-none" action="{{ route('mark-umroh-customer.update', $customer_network['id']) }}" method="POST">
                                                                @csrf
                                                                @method('post')
                                                            </form>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12">
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
