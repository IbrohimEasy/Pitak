@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">Buttons example</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('option.create')}}">{{translate('Create')}}</a>
            </div>
            <p class="text-muted font-14 mb-3">
                The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
            </p>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Name')}}</th>
                        <th>{{translate('Icon')}}</th>
                        <th>{{translate('Class list')}}</th>
                        <th class="text-center">{{translate('Functions')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 0
                @endphp
                @foreach($options as $option)
                    @php
                        $i++
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$option->name}}</td>
                        <td class="text-center">
                            @if(isset($option->id))
                                @php
                                    $sms_avatar = storage_path('app/public/option/'.$option->icon);
                                @endphp
                                @if(file_exists($sms_avatar))
                                    <img class="user_photo" src="{{asset('storage/option/'.$option->icon)}}" alt="">
                                @else
                                    <img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt="">
                                @endif
                            @endif
                        </td>
                        <td>{{$option->class_list->name}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="form_functions btn btn-info" href="{{route('option.edit', $option->id)}}"><i class="fe-edit-2"></i></a>
                                <a class="form_functions btn btn-info" href="{{route('option.show', $option->id)}}"><i class="fe-eye"></i></a>
                                <form action="{{route('option.destroy', $option->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
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