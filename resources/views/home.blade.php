@extends('layouts.app')

@section('title', 'Home')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item active">Home</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        @can('show_total_stats')
            <li class="breadcrumb-item active">Dashboard</li>
            <hr>

            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-body text-center">
                            <label for="agents">Photo Agent <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="Max Files: 1, Max File Size: 1MB, Image Size: 400x400"></i></label>
                            <br>
                            <img src="{{ auth()->user()->getFirstMediaUrl('avatars') }}" alt="Photo Agent" class="img-fluid img-thumbnail mb-2" style="width:86%">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0">
                                    <tr>
                                        <th style="width:40%">Agent Code</th>
                                        <td>{{ $agent['agent_code'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Agent Name</th>
                                        <td>{{  $agent['agent_name'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{ $agent['agent_phone'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $agent['agent_email'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Agent Level</th>
                                        <td>{{ $agent['level_agent'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>City</th>
                                        <td>{{ $agent['city'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>Agent Referal</th>
                                        <td>{{ $agent['referal_code'] . ' | ' . $agent['referal_name']}}</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="bg-primary p-3 mfe-3 rounded">
                                <i class="bi bi-cash-stack font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-primary font-weight-bold" style="font-size:18px;">{{ format_currency($agent['total_reward']) }}</div>
                                <div class="text-uppercase font-weight-bold medium">Total Reward</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="bg-warning p-3 mfe-3 rounded">
                                <i class="bi bi-wallet2 font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-primary font-weight-bold" style="font-size:18px;">{{ format_currency($agent['paid_reward']) }}</div>
                                <div class="text-uppercase font-weight-bold medium">Paid Reward</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3 d-flex align-items-center">
                            <div class="bg-success p-3 mfe-3 rounded">
                                <i class="bi bi-wallet2 font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-primary font-weight-bold" style="font-size:18px;">{{ format_currency($agent['total_reward'] - $agent['paid_reward']) }}</div>
                                <div class="text-uppercase font-weight-bold medium">Reward Balance</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            {{-- <li class="breadcrumb-item active">Agent Network</li>
            <hr> --}}

            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                <i class="bi bi-people font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-uppercase font-weight-bold medium">Customers Network</div>
                                <div class="text-value text-primary">{{ $customers_count . ' Customers' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                <i class="bi bi-people font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-uppercase font-weight-bold medium">Agents Network</div>
                                <div class="text-value text-primary">{{ $agents_count . ' Agents' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <li class="breadcrumb-item active">Available Package</li>
            <hr>

            <div class="row">
                <div class="col-md-6 col-lg-12">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center">
                            <div>
                                List Package : <strong>Available List Active Umroh Package</strong>
                            </div>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                                {!! $dataTable->table() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endcan

    </div>
@endsection

@section('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
            integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection

@push('page_scripts')
    @vite('resources/js/chart-config.js')
    {!! $dataTable->scripts() !!}
@endpush
