@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">Buttons example</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('class-list.create')}}">{{translate('Create')}}</a>
            </div>
            <p class="text-muted font-14 mb-3">
                The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
            </p>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Updated_at</th>
                        <th>Functions</th>
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
                                <a class="form_functions btn btn-info" href="{{route('class-list.edit', 1)}}">Edit</a>
                                <form action="{{route('class-list.destroy', 1)}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="form_functions btn btn-danger">Delete</button>
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
                                <a class="form_functions btn btn-info" href="{{route('class-list.edit', 1)}}">Edit</a>
                                <form action="{{route('class-list.destroy', 1)}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="form_functions btn btn-danger">Delete</button>
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
                                <a class="form_functions btn btn-info" href="{{route('class-list.edit', 1)}}">Edit</a>
                                <form action="{{route('class-list.destroy', 1)}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="form_functions btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection