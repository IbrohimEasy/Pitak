@extends('layout.layout')

@section('title')
    Order Show
    {{-- {{ translate("Order Show") }} --}}
@endsection
@section('content')

    <div>
        <a href="{{ route('client.index') }}">
            {{-- <button type="button" class="btn btn-success waves-effect waves-light">{{ translate('List') }}</button> --}}
            <button type="button" class="btn btn-success waves-effect waves-light">List</button>
        </a>
        <a href="{{ route('client.edit', $model->id) }}">
            {{-- <button type="button" class="btn btn-primary waves-effect waves-light">{{ translate('Edit') }}</button> --}}
            <button type="button" class="btn btn-primary waves-effect waves-light">Edit</button>
        </a>
        {{-- <button type="button" class="btn btn-danger delete-order" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('client.destroy', $model->id) }}">{{ translate('Delete') }}</button> --}}
        <button type="button" class="btn btn-danger delete-order" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('client.destroy', $model->id) }}">Delete</button>
    </div>
    <br>
        
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
            @if (isset($model))            
                <tr>
                    {{-- <th>{{ translate('Personal info') }}</th> --}}
                    <th>Personal info</th>
                    <td>{{ $model->personalInfo ? $model->personalInfo->last_name . ' ' . $model->personalInfo->first_name . ' ' . $model->personalInfo->middle_name : '' }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Company') }}</th> --}}
                    <th>Company</th>
                    <td>{{ $model->company ? $model->company->name : '' }}</td>
                </tr>
                <tr>
                    {{-- <th>{{ translate('Status') }}</th> --}}
                    <th>Status</th>
                    <td>{{ $model->status ? $model->status->name : '' }}</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection
