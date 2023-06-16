@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Option')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('option.create')}}">{{translate('Create')}}</a>
            </div>
            <table id="datatable-buttons" class="table dt-responsive nowrap table_show">
                <thead>
                <tr>
                    <th>{{translate('Attributes')}}</th>
                    <th>{{translate('Informations')}}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{translate('Name')}}</th>
                    <td>{{$model->name}}</td>
                </tr>
                <tr>
                    <th>{{translate('icon')}}</th>
                    <td>
                        @if(isset($model->id))
                            @php
                                $sms_avatar = storage_path('app/public/option/'.$model->icon);
                            @endphp
                            @if(file_exists($sms_avatar))
                                <img class="user_photo" src="{{asset('storage/option/'.$model->icon)}}" alt="">
                            @else
                                <img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt="">
                            @endif
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>{{translate('Class list')}}</th>
                    <td>{{$model->class_list->name}}</td>
                </tr>
                <tr>
                    <th>{{translate('Updated at')}}</th>
                    <td>{{$model->updated_at}}</td>
                </tr>
                </tbody>
            </table>
            <div style="display: flex; justify-content: end; width: 100%;">
                <div style="background-color: white; width: 34%; margin-top: -40px; height: 56px; z-index: 4; position: absolute"></div>
            </div>
        </div>
    </div>
@endsection