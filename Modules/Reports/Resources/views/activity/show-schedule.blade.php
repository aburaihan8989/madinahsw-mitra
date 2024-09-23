@extends('layouts.app')

@section('title', 'Details Activity Report')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('activity.schedule') }}">Head Office Schedule</a></li>
        <li class="breadcrumb-item active">Details Schedule</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="reference">ID Reference <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="reference" required value="{{ $id_activity->reference }}" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="agent_name">Agent Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" value="{{ $id_activity->agent_code . ' | ' . $id_activity->agent_name }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="date_activity">Activity Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date_activity" required value="{{ $id_activity->date_activity }}" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="detail_activity">Activity Details</label>
                                <textarea class="form-control" rows="6" name="detail_activity" disabled>{{ $id_activity->detail_activity }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection

