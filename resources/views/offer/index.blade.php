@extends('layout.layout')

@section('title')
    Order Index
    {{-- {{ translate("Order Index") }} --}}
@endsection
@section('content')

    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>#</th>
                {{-- <th>{{ translate('Driver') }}</th> --}}
                <th>Driver</th>
                {{-- <th>{{ translate('Client') }}</th> --}}
                <th>Client</th>
                {{-- <th>{{ translate('Order') }}</th> --}}
                <th>Order</th>
                {{-- <th>{{ translate('Order detail') }}</th> --}}
                <th>Order detail</th>
                {{-- <th>{{ translate('Price') }} date</th> --}}
                <th>Price</th>
                {{-- <th>{{ translate('Comment') }}</th> --}}
                <th>Comment</th>
                {{-- <th>{{ translate('Status') }}</th> --}}
                <th>Status</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @if (count($offers) > 0)
                @php
                    $n = 1;
                @endphp
                @foreach ($offers as $val)
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $val->driver->personalInfo ? $val->driver->personalInfo->last_name : '' }}</td>
                        <td>{{ $val->client->personalInfo ? $val->client->personalInfo->last_name : '' }}</td>
                        <td>{{ $val->order ? $val->order->title : '' }}</td>
                        <td>{{ $val->orderDetail ? $val->orderDetail->id : '' }}</td>
                        <td>{{ $val->price }}</td>
                        <td>{{ $val->comment }}</td>
                        <td>{{ $val->status }}</td>
                        <td>
                            <a href="{{ route('offer.show', $val->id) }}">
                                <button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button>
                            </a>
                            <a href="{{ route('offer.edit', $val->id) }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-edit"></i></button>
                            </a>
                            {{-- <a href="{{ route('offer.destroy', $val->id) }}"> --}}
                                {{-- <button type="button" class="btn btn-danger waves-effect waves-light"><i class="fe-trash-2"></i></button> --}}
                                <button type="button" class="btn btn-danger delete-order" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('offer.destroy', $val->id) }}"><i class="fe-trash-2"></i></button>
                            {{-- </a> --}}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
