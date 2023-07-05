@extends('layout.layout')

@section('title')
    {{-- Order Index --}}
    {{ translate("Order Index") }}
@endsection
@section('content')

    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap overflow-scroll">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ translate('status') }}</th>
                {{-- <th>status</th> --}}
                <th>{{ translate('company') }}</th>
                {{-- <th>company</th> --}}
                <th>{{ translate('cars list') }}</th>
                {{-- <th>cars list</th> --}}
                <th>{{ translate('from') }}</th>
                {{-- <th>from</th> --}}
                <th>{{ translate('to') }} date</th>
                {{-- <th>to</th> --}}
                <th>{{ translate('price') }}</th>
                {{-- <th>price</th> --}}
                <th>{{ translate('price type') }}</th>
                {{-- <th>price type</th> --}}
                <th>{{ translate('title') }}</th>
                {{-- <th>title</th> --}}
                <th>{{ translate('start date') }}</th>
                {{-- <th>start date</th> --}}
                <th>{{ translate('seats') }}</th>
                {{-- <th>seats</th> --}}
                <th></th>
            </tr>
        </thead>

        <tbody>
            @if (count($model) > 0)
                @php
                    $n = 1;
                @endphp
                @foreach ($model as $val)
                    {{-- @dd($val->carList); --}}
                    @php
                        $seats = [];
                        if ($val->seats)
                            $seats = json_decode($val->seats);
                    @endphp
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $val->status ? $val->status->name : '' }}</td>
                        <td>{{ $val->company ? $val->company->name : '' }}</td>
                        <td>{{ $val->carList ? $val->carList->name : '' }}</td>
                        <td>{{ $val->from ? $val->from->name : '' }}</td>
                        <td>{{ $val->to ? $val->to->name : '' }}</td>
                        <td>{{ $val->price }}</td>
                        <td>{{ $val->price_type }}</td>
                        <td>{{ $val->title }}</td>
                        <td>{{ date('d.m.Y H:i', strtotime($val->start_date)) }}</td>
                        <td>
                            @foreach ($seats as $valSeat)
                                <button type="button" class="btn btn-soft-secondary waves-effect">{{ $valSeat }}</button>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('order.show', $val->id) }}">
                                <button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button>
                            </a>
                            <a href="{{ route('order.edit', $val->id) }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-edit"></i></button>
                            </a>
                            <button type="button" class="btn btn-danger delete-datas" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('order.destroy', $val->id) }}"><i class="fe-trash-2"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
