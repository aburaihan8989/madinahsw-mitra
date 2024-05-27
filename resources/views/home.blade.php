@extends('layouts.app')

@section('title', 'Home')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item active">Home</li>
    </ol>
@endsection
{{-- @dd($dataTable); --}}
@section('content')
    <div class="container-fluid">
        @can('show_total_stats')
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                <i class="bi bi-people font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-muted text-uppercase font-weight-bold small">Registered Customers</div>
                                <div class="text-value text-primary">{{ $customers . ' Customers' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                <i class="bi bi-people font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-muted text-uppercase font-weight-bold small">Umroh Savings Customers</div>
                                <div class="text-value text-primary">{{ $umroh_savings . ' Customers' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                <i class="bi bi-people font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-muted text-uppercase font-weight-bold small">Hajj Savings Customers</div>
                                <div class="text-value text-primary">{{ $hajj_savings . ' Customers' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            {{-- <div class="bg-gradient-info p-4 mfe-3 rounded-left">
                                <i class="bi bi-trophy font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-value text-info">{{ format_currency($profit) }}</div>
                                <div class="text-muted text-uppercase font-weight-bold small">Profit</div>
                            </div> --}}
                            <div class="bg-gradient-primary p-4 mfe-3 rounded-left">
                                <i class="bi bi-people font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-muted text-uppercase font-weight-bold small">Registered Agents</div>
                                <div class="text-value text-primary">{{ $agents . ' Agents' }}</div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-warning p-4 mfe-3 rounded-left">
                                <i class="bi bi-journal-check font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-muted text-uppercase font-weight-bold small">Approval Savings</div>
                                <div class="text-value text-primary">{{ $payment_savings . ' Transactions' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="card border-0">
                        <div class="card-body p-0 d-flex align-items-center shadow-sm">
                            <div class="bg-gradient-warning p-4 mfe-3 rounded-left">
                                <i class="bi bi-journal-check font-2xl"></i>
                            </div>
                            <div>
                                <div class="text-muted text-uppercase font-weight-bold small">Approval Payments</div>
                                <div class="text-value text-primary">{{ $payment_packages . ' Transactions' }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center">
                            <div>
                                Umroh Package : <strong>List Active Umroh Package</strong>
                            </div>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                                {!! $dataTable->table() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header d-flex flex-wrap align-items-center">
                            <div>
                                Hajj Package : <strong>List Active Hajj Package</strong>
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

        {{-- @can('show_weekly_sales_purchases|show_month_overview')
        <div class="row mb-4">
            @can('show_weekly_sales_purchases')
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header">
                        Revenue & Expenses of Last 7 Days
                    </div>
                    <div class="card-body">
                        <canvas id="salesPurchasesChart"></canvas>
                    </div>
                </div>
            </div>
            @endcan
            @can('show_month_overview')
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-header">
                        Overview of {{ now()->format('F, Y') }}
                    </div>
                    <div class="card-body d-flex justify-content-center">
                        <div class="chart-container" style="position: relative; height:auto; width:280px">
                            <canvas id="currentMonthChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
        </div>
        @endcan

        @can('show_monthly_cashflow')
        <div class="row">
            <div class="col-lg-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        Monthly Cash Flow (Cash Sent & Received)
                    </div>
                    <div class="card-body">
                        <canvas id="paymentChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        @endcan --}}

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
