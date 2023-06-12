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
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Status')}}</th>
                        <th>{{translate('Car type')}}</th>
                        <th>{{translate('Name')}}</th>
                        <th>{{translate('Updated at')}}</th>
                        <th class="text-center">{{translate('Functions')}}</th>
                    </tr>
                </thead>
                <tbody>$carLists
                @php
                    $i = 0
                @endphp
                @foreach($carLists as $carList)
                    @php
                        $i++
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$carList->status->name}}</td>
                        <td>{{$carList->type->name}}</td>
                        <td>{{$carList->name}}</td>
                        <td>{{$carList->updated_at}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="form_functions btn btn-info" href="{{route('carList.edit', $carList->id)}}"><i class="fe-edit-2"></i></a>
                                <a class="form_functions btn btn-info" href="{{route('carList.show', $carList->id)}}"><i class="fe-eye"></i></a>
                                <form action="{{route('carList.destroy', $carList->id)}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="form_functions btn btn-danger"><i class="fe-trash-2"></i></button>
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