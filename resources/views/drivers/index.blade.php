@extends('layout.layout')

@section('title')
    {{-- Driver Index --}}
    {{ translate("Driver Index") }}
@endsection
@section('content')

    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ translate('F.I.O') }}</th>
                <th>{{ translate('Phone number') }}</th>
                <th>{{ translate('Gender') }}</th>
                <th>{{ translate('Birth date') }}</th>
                <th>{{ translate('Company') }}</th>
                <th>{{ translate('Status') }}</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @if (count($model) > 0)
                @php
                    $n = 1;
                @endphp
                @foreach ($model as $val)
                    @php
                        $seats = [];
                        if ($val->seats)
                            $seats = json_decode($val->seats);
                    @endphp
                    <tr>
                        <td>{{ $n++ }}</td>
                        <td>{{ $val->personalInfo ? $val->personalInfo->last_name . ' ' . $val->personalInfo->first_name . ' ' . $val->personalInfo->middle_name : '' }}</td>
                        <td>{{ $val->personalInfo ? $val->personalInfo->phone_number : '' }}</td>
                        <td>{{ ($val->personalInfo) ? (($val->personalInfo->gender == 1) ? translate('Man') : translate('Woman')) : '' }}</td>
                        <td>{{ $val->personalInfo ? date('d.m.Y', strtotime($val->personalInfo->birth_date)) : '' }}</td>
                        <td>{{ $val->company ? $val->company->name : '' }}</td>
                        <td>{{ $val->status ? $val->status->name : '' }}</td>
                        <td>
                            <a href="{{ route('driver.show', $val->id) }}">
                                <button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button>
                            </a>
                            <a href="{{ route('driver.edit', $val->id) }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-edit"></i></button>
                            </a>
                            <button type="button" class="btn btn-danger delete-datas" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('driver.destroy', $val->id) }}"><i class="fe-trash-2"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

@endsection
