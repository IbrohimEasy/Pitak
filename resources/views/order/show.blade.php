@extends('layout.layout')

@section('title')
    Order Show
    {{-- {{ translate("Order Show") }} --}}
@endsection
@section('content')

    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                {{-- <th>{{ translate('Attribute') }}</th> --}}
                <th>Attribute</th>
                {{-- <th>{{ translate('Value') }}</th> --}}
                <th>Value</th>
            </tr>
        </thead>

        <tbody>
            @if (isset($order))
                <tr>
                    {{-- <th>{{ translate('Status') }}</th> --}}
                    <th>Status</th>
                    <td>{{ $order->status ? $order->status->name : '' }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Company') }}</th> --}}
                    <th>Company</th>
                    <td>{{ $order->company ? $order->company->name : '' }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Cars list') }}</th> --}}
                    <th>Cars list</th>
                    <td>{{ $order->carList ? $order->carList->name : '' }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('From') }}</th> --}}
                    <th>From</th>
                    <td>{{ $order->from ? $order->from->name : '' }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('To') }}</th> --}}
                    <th>To</th>
                    <td>{{ $order->to ? $order->to->name : '' }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Price') }}</th> --}}
                    <th>Price</th>
                    <td>{{ $order->price }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Price type') }}</th> --}}
                    <th>Price type</th>
                    <td>{{ $order->price_type }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Title') }}</th> --}}
                    <th>Title</th>
                    <td>{{ $order->title }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Start date') }}</th> --}}
                    <th>Start date</th>
                    <td>{{ date('d.m.Y H:i', strtotime($order->start_date)) }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Seats') }}</th> --}}
                    <th>Seats</th>
                    <td>
                        @php
                            $seats = [];
                            if ($order->seats)
                                $seats = json_decode($order->seats);
                        @endphp
                        @foreach ($seats as $orderSeat)
                            <button type="button" class="btn btn-soft-secondary waves-effect">{{ $orderSeat }}</button>
                        @endforeach
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
