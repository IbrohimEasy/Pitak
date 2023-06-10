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
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Status')}}</th>
                        <th>{{translate('Car type')}}</th>
                        <th>{{translate('Name')}}</th>
                        <th>{{translate('Updated at')}}</th>
                        <th>{{translate('Functions')}}</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Active</td>
                    <td>chevrolet</td>
                    <td>Malibu</td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('car-list.edit', 1)}}">{{translate('Edit')}}</a>
                            <a class="form_functions btn btn-info" href="{{route('car-list.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('car-list.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">{{translate('Delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Active</td>
                    <td>Daewoo</td>
                    <td>tiko</td>
                    <td>2023-08-06 02:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('car-list.edit', 1)}}">{{translate('Edit')}}</a>
                            <a class="form_functions btn btn-info" href="{{route('car-list.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('car-list.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">{{translate('Delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>General motors</td>
                    <td>No active</td>
                    <td>Matiz</td>
                    <td>2023-07-06 14:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('car-list.edit', 1)}}">{{translate('Edit')}}</a>
                            <a class="form_functions btn btn-info" href="{{route('car-list.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('car-list.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">{{translate('Delete')}}</button>
                            </form>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection