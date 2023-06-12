@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Class lists')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('classList.create')}}">{{translate('Create')}}</a>
            </div>
            <p class="text-muted font-14 mb-3">
                The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
            </p>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Name')}}</th>
                        <th>{{translate('Status')}}</th>
                        <th>{{translate('Updated_at')}}</th>
                        <th class="text-center">{{translate('Functions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0
                    @endphp
                    @foreach($classLists as $classList)
                        @php
                            $i++
                        @endphp
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$classList->name??''}}</td>
                            <td>{{$classList->status->name??''}}</td>
                            <td>{{$classList->updated_at??''}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="form_functions btn btn-info" href="{{route('classList.edit', $classList->id)}}"><i class="fe-edit-2"></i></a>
                                    <a class="form_functions btn btn-info" href="{{route('classList.show', $classList->id)}}"><i class="fe-eye"></i></a>
                                    <form action="{{route('classList.destroy', $classList->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="form_functions btn btn-danger" type="submit"><i class="fe-trash-2"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection