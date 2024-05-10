<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Umroh Manifest Details</title>
    <link rel="stylesheet" href="{{ public_path('b3/bootstrap.min.css') }}">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div style="text-align: center;margin-bottom: 25px;">
                <img width="600" src="{{ public_path('images/logo-header_1.png') }}" alt="Logo">
                <h4 style="margin-bottom: 20px; font-size:17px;">
                    <span>Register ID :</span> <strong>{{ $umroh_manifest->reference }}</strong></br></br>
                    <span>Category :</span> <strong>Customer Umroh Manifest</strong>
                </h4>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-xs-4 mb-3 mb-md-0">
                            <h4 class="mb-2" style="border-bottom: 1px solid #dddddd;padding-bottom: 10px;">Travel Info:</h4>
                            <div><strong>{{ settings()->company_name }}</strong></div>
                            <div>{{ settings()->company_address }}</div>
                            <div>Phone: {{ settings()->company_phone }}</div>
                            <div>Email: {{ settings()->company_email }}</div>

                        </div>

                        <div class="col-xs-4 mb-3 mb-md-0">
                            <h4 class="mb-2" style="border-bottom: 1px solid #dddddd;padding-bottom: 10px;">Customer Info:</h4>
                            <div><strong>{{ $customer->customer_name }}</strong></div>
                            <div>{{ $customer->address }}</div>
                            <div>Phone: {{ $customer->customer_phone }}</div>
                            <div>Email: {{ $customer->customer_email }}</div>
                        </div>

                        <div class="col-xs-4 mb-3 mb-md-0">
                            <h4 class="mb-2" style="border-bottom: 1px solid #dddddd;padding-bottom: 10px;">Agent Info:</h4>
                            {{-- <div><strong>{{ $customer->customer_name }}</strong></div>
                            <div>{{ $customer->address }}</div>
                            <div>Phone: {{ $customer->customer_phone }}</div>
                            <div>Email: {{ $customer->customer_email }}</div> --}}
                        </div>
                    </div>

                    <div class="table-responsive-sm" style="margin-top: 30px;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="align-middle">Reference</th>
                                    <th class="align-middle">Register Date</th>
                                    <th class="align-middle">Customer Name</th>
                                    <th class="align-middle">Phone Number</th>
                                    <th class="align-middle">Package Price</th>
                                    <th class="align-middle">Total Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        {{ $umroh_manifest->reference }}
                                    </td>
                                    <td class="align-middle">
                                        {{ date('d-m-Y', strtotime($umroh_manifest->register_date)) }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $umroh_manifest->customer_name }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $umroh_manifest->customer_phone }}
                                    </td>
                                    <td class="align-middle">
                                        {{ format_currency($umroh_manifest->total_price) }}
                                    </td>
                                    <td class="align-middle">
                                        {{ format_currency($umroh_manifest->total_payment) }}
                                    </td>
                                </tr>
                            </tbody>

                            <thead>
                                <tr>
                                    <th class="align-middle">Status</th>
                                    <th class="align-middle">Remaining Payment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="align-middle">
                                        {{-- <span class="badge badge-success" style="font-size: 13px;">
                                            {{ $umroh_manifest->status }}
                                        </span> --}}
                                        @if ($umroh_manifest->status == 'Completed')
                                            <span class="badge badge-success" style="font-size: 13px;">
                                                {{ $umroh_manifest->status }}
                                            </span>
                                        @else
                                            <span class="badge badge-warning" style="font-size: 13px;">
                                                {{ $umroh_manifest->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="align-middle" style="font-size: 16px; font-weight: bold;">
                                        {{ format_currency($umroh_manifest->remaining_payment) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-xs-4 col-xs-offset-8">
                            <table class="table border-0">
                                <tbody>
                                    <tr>
                                    <td class="left"><strong>PT Marhaban Makkah Madinah</strong></td>
                                        {{-- <td class="right">{{ format_currency($purchase->discount_amount) }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td class="left border-0" style="border-top: none;"></td>
                                        {{-- <td class="right">{{ format_currency($purchase->tax_amount) }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td class="left border-0" style="border-top: none;"></td>
                                        {{-- <td class="right">{{ format_currency($purchase->shipping_amount) }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td class="left border-0" style="border-top: none;"></td>
                                        {{-- <td class="right">{{ format_currency($purchase->shipping_amount) }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td class="left border-0" style="border-top: none;"></td>
                                        {{-- <td class="right">{{ format_currency($purchase->shipping_amount) }}</td> --}}
                                    </tr>
                                    <tr>
                                        <td class="left border-0" style="border-top: none;"><strong>Direktur Utama</strong></td>
                                        {{-- <td class="right"><strong>{{ format_currency($purchase->total_amount) }}</strong></td> --}}
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 25px;">
                        <div class="col-xs-12">
                            <p style="font-style: italic;text-align: center">{{ settings()->company_name }} &copy; {{ date('Y') }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
