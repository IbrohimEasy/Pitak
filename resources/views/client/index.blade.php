@extends('layout.layout')

@section('title')
    Client Index
    {{-- {{ translate("Client Index") }} --}}
@endsection
@section('content')

    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>#</th>
                {{-- <th>{{ translate('Personal info') }}</th> --}}
                <th>Personal info</th>
                {{-- <th>{{ translate('Company') }}</th> --}}
                <th>Company</th>
                {{-- <th>{{ translate('Status') }}</th> --}}
                <th>Status</th>
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
                        <td>{{ $val->personalInfo ? $val->personalInfo->last_name . ' ' . $val->personalInfo->first_name . ' ' . $val->personalInfo->middle_name : '' }}</td>
                        <td>{{ $val->company ? $val->company->name : '' }}</td>
                        <td>{{ $val->status ? $val->status->name : '' }}</td>
                        <td>
                            <a href="{{ route('client.show', $val->id) }}">
                                <button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button>
                            </a>
                            <a href="{{ route('client.edit', $val->id) }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-edit"></i></button>
                            </a>
                            {{-- <a href="{{ route('client.destroy', $val->id) }}"> --}}
                                {{-- <button type="button" class="btn btn-danger waves-effect waves-light"><i class="fe-trash-2"></i></button> --}}
                                <button type="button" class="btn btn-danger delete-order" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('client.destroy', $val->id) }}"><i class="fe-trash-2"></i></button>
                            {{-- </a> --}}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
