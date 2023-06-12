@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Car lists')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('carList.create')}}">{{translate('Create')}}</a>
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
                        <td>{{$model->status->name}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Car type')}}</th>
                        <td>{{$model->type->name}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Name')}}</th>
                        <td>{{$model->name}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Updated at')}}</th>
                        <td>{{$model->updated_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection