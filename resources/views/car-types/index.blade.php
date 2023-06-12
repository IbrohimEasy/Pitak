@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Car types')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('car-types.create')}}">{{translate('Create')}}</a>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{translate('Name')}}</th>
                    <th>{{translate('Status')}}</th>
                    <th>{{translate('Updated at')}}</th>
                    <th>{{translate('Functions')}}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Active</td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('car-types.edit', 1)}}"><i class="fe-edit-2"></i></a>
                            <a class="form_functions btn btn-info" href="{{route('car-types.show', 1)}}"><i class="fe-eye"></i></a>
                            <form action="{{route('car-types.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger"><i class="fe-trash-2"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Daewoo</td>
                    <td>Active</td>
                    <td>2023-08-06 02:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('car-types.edit', 1)}}"><i class="fe-edit-2"></i></a>
                            <a class="form_functions btn btn-info" href="{{route('car-types.show', 1)}}"><i class="fe-eye"></i></a>
                            <form action="{{route('car-types.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger"><i class="fe-trash-2"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>General motors</td>
                    <td>No active</td>
                    <td>2023-07-06 14:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('car-types.edit', 1)}}"><i class="fe-edit-2"></i></a>
                            <a class="form_functions btn btn-info" href="{{route('car-types.show', 1)}}"><i class="fe-eye"></i></a>
                            <form action="{{route('car-types.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger"><i class="fe-trash-2"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection