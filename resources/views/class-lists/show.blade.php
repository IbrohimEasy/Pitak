@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Car lists')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('car-list.create')}}">{{translate('Create')}}</a>
            </div>
            <table id="datatable-buttons" class="table dt-responsive nowrap table_show">
                <thead>
                <tr>
                    <th>{{translate('Attributes')}}</th>
                    <th>{{translate('Informations')}}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{translate('Status')}}</th>
                    <td>Active</td>
                </tr>
                <tr>
                    <th>{{translate('Car type')}}</th>
                    <td>chevrolet</td>
                </tr>
                <tr>
                    <th>{{translate('Name')}}</th>
                    <td>Malibu</td>
                </tr>
                <tr>
                    <th>{{translate('Updated at')}}</th>
                    <td>2023-06-06 12:14:14</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection