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
            <li class="breadcrumb-item active">Home Dashboard</li>
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

        @endcan

    </div>
@endsection

@section('third_party_scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.0/chart.min.js"
            integrity="sha512-asxKqQghC1oBShyhiBwA+YgotaSYKxGP1rcSYTDrB0U6DxwlJjU59B67U8+5/++uFjcuVM8Hh5cokLjZlhm3Vg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
