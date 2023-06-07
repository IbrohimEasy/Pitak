@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="dropdown float-end">
                <a class="btn btn-success" href="{{route('role.create')}}">Create</a>
            </div>
            <h4 class="mt-0 header-title">Borderless Inverse table</h4>
            <p class="text-muted font-14 mb-3">
                Your awesome text goes here.Your awesome text goes here.
            </p>

            <div class="table-responsive">
                <table class="table table-borderless mb-0">
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
                                <button class="btn">Update</button>
                                <button class="btn"></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Active</td>
                        <td>2023-08-06 02:14:14</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>No active</td>
                        <td>2023-07-06 14:14:14</td>
                        <td>@twitter</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection