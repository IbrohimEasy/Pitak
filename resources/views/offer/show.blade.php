@extends('layout.layout')

@section('title')
    {{-- Offer Show --}}
    {{ translate("Offer Show") }}
@endsection
@section('content')

    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>{{ translate('Attribute') }}</th>
                {{-- <th>Attribute</th> --}}
                <th>{{ translate('Value') }}</th>
                {{-- <th>Value</th> --}}
            </tr>
        </thead>

        <tbody>
            @if (isset($offer))
                <tr>
                    <th>{{ translate('Driver') }}</th>
                    {{-- <th>Driver</th> --}}
                    <td>{{ ($offer->driver && $offer->driver->personalInfo) ? $offer->driver->personalInfo->last_name : '' }}</td>
                </tr>
                <tr>
                    <th>{{ translate('Users') }}</th>
                    {{-- <th>Users</th> --}}
                    <td>{{ ($offer->client && $offer->client->personalInfo) ? $offer->client->personalInfo->last_name : '' }}</td>
                </tr>
                <tr>
                    <th>{{ translate('Order') }}</th>
                    {{-- <th>Order</th> --}}
                    <td>{{ $offer->order ? $offer->order->title : '' }}</td>
                </tr>
                <tr>
                    <th>{{ translate('Order detail') }}</th>
                    {{-- <th>Order detail</th> --}}
                    <td>{{ $offer->orderDetail ? $offer->orderDetail->id : '' }}</td>
                </tr>
                <tr>
                    <th>{{ translate('Price') }}</th>
                    {{-- <th>Price</th> --}}
                    <td>{{ $offer->price }}</td>
                </tr>
                <tr>
                    <th>{{ translate('Comment') }}</th>
                    {{-- <th>Comment</th> --}}
                    <td>{{ $offer->comment }}</td>
                </tr>
                <tr>
                    <th>{{ translate('Status') }}</th>
                    {{-- <th>Status</th> --}}
                    <td>{{ $offer->status }}</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
