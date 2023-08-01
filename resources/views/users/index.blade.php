@extends('layout.layout')

@section('title')
    {{-- Driver Index --}}
    {{ translate("Driver Index") }}
@endsection
@section('content')

    <div class="card">
        <div class="card-body">
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{ translate('F.I.O') }}</th>
                        <th>{{ translate('Phone number') }}</th>
                        <th>{{ translate('Gender') }}</th>
                        <th>{{ translate('Birth date') }}</th>
                        {{-- <th>{{ translate('Company') }}</th> --}}
                        <th>{{ translate('Status') }}</th>
                        <th>{{ translate('Rating') }}</th>
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
                                <td>
                                    {{ $val->personalInfo ? $val->personalInfo->last_name . ' ' . $val->personalInfo->first_name . ' ' . $val->personalInfo->middle_name : '' }}
                                    @if ($val->type == 1)
                                        <i class="fe-star-on" style="color: #44BDFF;"></i>
                                    @endif
                                </td>
                                <td>{{ $val->personalInfo ? $val->personalInfo->phone_number : '' }}</td>
                                <td>{{ ($val->personalInfo) ? (($val->personalInfo->gender == 1) ? translate('Man') : translate('Woman')) : '' }}</td>
                                <td>{{ $val->personalInfo ? date('d.m.Y', strtotime($val->personalInfo->birth_date)) : '' }}</td>
                                {{-- <td>{{ $val->company ? $val->company->name : '' }}</td> --}}
                                <td>{{ $val->status ? $val->status->name : '' }}</td>
                                <td>{{ $val->rating }}</td>
                                <td>
                                    <a href="{{ route('users.show', $val->id) }}">
                                        <button type="button" class="btn btn-success btn-sm waves-effect"><i class="fe-eye"></i></button>
                                    </a>
                                    <a href="{{ route('users.edit', $val->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm waves-effect"><i class="fe-edit"></i></button>
                                    </a>
                                    <button type="button" class="btn btn-danger delete-datas btn-sm waves-effect" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('users.destroy', $val->id) }}"><i class="fe-trash-2"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection
