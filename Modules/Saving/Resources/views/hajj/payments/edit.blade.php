@extends('layouts.app')

@section('title', 'Edit Hajj Payment')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('hajj-savings.index') }}">Hajj Savings</a></li>
        <li class="breadcrumb-item"><a href="{{ route('hajj-savings.show', $hajj_saving) }}">{{ $hajj_saving->reference }}</a></li>
        <li class="breadcrumb-item active">Edit Hajj Payment</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form id="hajj-payment-form" action="{{ route('hajj-saving-payments.update', $hajjsavingPayment) }}" method="POST">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <button class="btn btn-primary">Update Hajj Payment <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="reference">Reference <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="reference" required readonly value="{{ $hajjsavingPayment->reference }}">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="date">Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="date" required value="{{ $hajjsavingPayment->getAttributes()['date'] }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="total_saving">Savings Balance <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="total_saving" required value="{{ format_currency($hajj_saving->total_saving) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="amount">Amount <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input id="amount" type="text" class="form-control" name="amount" required value="{{ old('amount') ?? $hajjsavingPayment->amount }}">
                                            {{-- <div class="input-group-append">
                                                <button id="getTotalAmount" class="btn btn-primary" type="button">
                                                    <i class="bi bi-check-square"></i>
                                                </button>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="from-group">
                                        <div class="form-group">
                                            <label for="payment_method">Payment Method <span class="text-danger">*</span></label>
                                            <select class="form-control" name="payment_method" id="payment_method" required>
                                                <option {{ $hajjsavingPayment->payment_method == 'Cash' ? 'selected' : '' }} value="Cash">Cash</option>
                                                <option {{ $hajjsavingPayment->payment_method == 'Transfer' ? 'selected' : '' }} value="Transfer">Transfer</option>
                                                <option {{ $hajjsavingPayment->payment_method == 'QRIS' ? 'selected' : '' }} value="QRIS">QRIS</option>
                                                <option {{ $hajjsavingPayment->payment_method == 'Other' ? 'selected' : '' }} value="Other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="note">Note</label>
                                <textarea class="form-control" rows="4" name="note">{{ old('note') ?? $hajjsavingPayment->note }}</textarea>
                            </div>

                            <input type="hidden" value="{{ $hajj_saving->id }}" name="saving_id">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('page_scripts')
    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#amount').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });

            $('#amount').maskMoney('mask');

            // $('#getTotalAmount').click(function () {
            //     $('#amount').maskMoney('mask', {{ $hajjsavingPayment->total_saving }});
            // });

            $('#hajj-payment-form').submit(function () {
                var amount = $('#amount').maskMoney('unmasked')[0];
                $('#amount').val(amount);
            });
        });
    </script>
@endpush

