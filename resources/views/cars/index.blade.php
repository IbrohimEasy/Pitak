@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Cars')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('cars.create')}}">{{translate('Create')}}</a>
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
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Active</td>
                    <td>2023-08-06 02:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>No active</td>
                    <td>2023-07-06 14:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">4</th>
                    <td>Mark</td>
                    <td>Active</td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">5</th>
                    <td>Jacob</td>
                    <td>Active</td>
                    <td>2023-08-06 02:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">6</th>
                    <td>Larry</td>
                    <td>No active</td>
                    <td>2023-07-06 14:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">7</th>
                    <td>Mark</td>
                    <td>Active</td>
                    <td>2023-06-06 12:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">8</th>
                    <td>Jacob</td>
                    <td>Active</td>
                    <td>2023-08-06 02:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">9</th>
                    <td>Larry</td>
                    <td>No active</td>
                    <td>2023-07-06 14:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">10</th>
                    <td>Jacob</td>
                    <td>Active</td>
                    <td>2023-08-06 02:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
                                @csrf
                                @method('POST')
                                <button class="form_functions btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th scope="row">11</th>
                    <td>Larry</td>
                    <td>No active</td>
                    <td>2023-07-06 14:14:14</td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="form_functions btn btn-info" href="{{route('cars.edit', 1)}}">Edit</a>
                            <a class="form_functions btn btn-info" href="{{route('cars.show', 1)}}">{{translate('Show')}}</a>
                            <form action="{{route('cars.destroy', 1)}}" method="POST">
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