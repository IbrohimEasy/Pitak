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
                        <th>{{translate('Role')}}</th>
                        <td>Admin</td>
                    </tr>
                    <tr>
                        <th>{{translate('Company')}}</th>
                        <td>Itkey</td>
                    </tr>
                    <tr>
                        <th>{{translate('Firstname')}}</th>
                        <td>Active</td>
                    </tr>
                    <tr>
                        <th>{{translate('Lastname')}}</th>
                        <td>chevrolet</td>
                    </tr>
                    <tr>
                        <th>{{translate('Phone number')}}</th>
                        <td>Malibu</td>
                    </tr>
                    <tr>
                        <th>{{translate('Avatar')}}</th>
                        <td>photo.jpg</td>
                    </tr>
                    <tr>
                        <th>{{translate('Status')}}</th>
                        <td>photo.jpg</td>
                    </tr>
                    <tr>
                        <th>{{translate('Gender')}}</th>
                        <td>man</td>
                    </tr>
                    <tr>
                        <th>{{translate('Birth date')}}</th>
                        <td>1994-10-04</td>
                    </tr>
                    <tr>
                        <th>{{translate('Login')}}</th>
                        <td>elyor@mail.ru</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection