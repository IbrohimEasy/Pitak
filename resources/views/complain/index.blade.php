@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Color lists')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('complain.create')}}">{{translate('Create')}}</a>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Text')}}</th>
                        <th>{{translate('Updated_at')}}</th>
                        <th class="text-center">{{translate('Functions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0
                    @endphp
                    @foreach($ComplainReasons as $ComplainReason)
                        @php
                            $i++
                        @endphp
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td>{{$ComplainReason->text??''}}</td>
                            <td>{{$ComplainReason->updated_at??''}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="form_functions btn btn-info" href="{{route('complain.edit', $ComplainReason->id)}}"><i class="fe-edit-2"></i></a>
                                    <a class="form_functions btn btn-info" href="{{route('complain.show', $ComplainReason->id)}}"><i class="fe-eye"></i></a>
                                    <form action="{{route('complain.destroy', $ComplainReason->id)}}" method="POST">
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