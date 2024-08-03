@extends('layouts.app')

@section('title', 'Details Activity Report')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('activity.index') }}">My Activity Report</a></li>
        <li class="breadcrumb-item active">Details Activity Report</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0">
                                <tr>
                                    <th>Reference ID</th>
                                    <td>{{ $activity->reference }}</td>
                                </tr>
                                <tr>
                                    <th>Agent Name</th>
                                    <td>{{ $activity->agent_code . ' | ' . $activity->agent_name }}</td>
                                </tr>
                                <tr>
                                    <th>Activity Date</th>
                                    <td>{{ date('d-m-Y', strtotime($activity->date_activity)) }}</td>
                                </tr>
                                <tr>
                                    <th>Activity Details</th>
                                    <td>{{ $activity->detail_activity }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

