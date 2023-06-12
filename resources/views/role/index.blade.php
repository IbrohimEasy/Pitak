@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    {{-- <div class="card"> --}}
        {{-- <div class="card-body"> --}}
            <h3 class="mt-0 header-title">{{translate('Roles')}}</h3>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('role.create')}}">{{translate('Create')}}</a>
            </div>
            <p class="text-muted font-14 mb-3">
                {{translate('Roles list')}}
            </p>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>status</th>
                        <th>date</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->name}}</td>
                        <td>{{$role->created_at}}</td>
                        <td>
                            {{-- <a href="{{ route('role.show', $role->id) }}">
                                <button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button>
                            </a> --}}
                            <a href="{{ route('role.edit', $role->id) }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-edit"></i></button>
                            </a>
                            {{-- <a href="{{ route('role.destroy', $role->id) }}"> --}}
                                {{-- <button type="button" class="btn btn-danger waves-effect waves-light"><i class="fe-trash-2"></i></button> --}}
                                <button type="button" class="btn btn-danger delete-datas" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('role.destroy', $role->id) }}"><i class="fe-trash-2"></i></button>
                            {{-- </a> --}}
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
        {{-- </div> --}}
    {{-- </div> --}}

@endsection