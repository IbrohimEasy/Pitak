@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <style>
        .user_list{

        }
    </style>
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Car lists')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('user.create')}}">{{translate('Create')}}</a>
            </div>
            <table id="datatable-buttons" class="table dt-responsive nowrap table_show" style="display:none;">
                <thead>
                    <tr>
                        <th>{{translate('Attributes')}}</th>
                        <th>{{translate('Informations')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{translate('Role')}}</th>
                        <td>{{$model->role->name}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Company')}}</th>
                        <td>{{$model->company->name}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Full name')}}</th>
                        <td>{{$model->personalInfo->first_name.' '.$model->personalInfo->last_name.' '.$model->personalInfo->middle_name}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Phone number')}}</th>
                        <td>{{$model->personalInfo->phone_number}}</td>
                    </tr>
{{--                    <tr>--}}
{{--                        <th>{{translate('Avatar')}}</th>--}}
{{--                        <td>--}}
{{--                            @php--}}
{{--                                $sms_avatar = storage_path('app/public/user/'.$model->personalInfo->avatar);--}}
{{--                            @endphp--}}
{{--                            @if(file_exists($sms_avatar))--}}
{{--                                <img class="user_photo" src="{{asset('storage/user/'.$model->personalInfo->avatar)}}" alt="">--}}
{{--                            @else--}}
{{--                                <img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt="">--}}
{{--                            @endif--}}
{{--                        </td>--}}
{{--                    </tr>--}}
                    <tr>
                        <th>{{translate('Gender')}}</th>
                        <td>{{$model->personalInfo->gender??''}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Birth date')}}</th>
                        <td>{{$model->personalInfo->birth_date??''}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('email')}}</th>
                        <td>{{$model->email??''}}</td>
                    </tr>
                    <tr>
                        <th>{{translate('Updated at')}}</th>
                        <td>{{$model->updated_at??''}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="account">
                <div class="row">
                    <div class="col-2">
                        @php
                            $sms_avatar = storage_path('app/public/user/'.$model->personalInfo->avatar);
                        @endphp
{{--                        @php--}}
{{--                            $birth_date_array = explode(' ', $model->personalInfo->birth_date);--}}
{{--                            $now_time = strtotime('now');--}}
{{--                            $year_old = date('Y', ($now_time - strtotime($birth_date_array[0])));--}}
{{--                            dd($now_time, strtotime($model->personalInfo->birth_date), $birth_date_array,$model->personalInfo->birth_date);--}}
{{--                        @endphp--}}
                        @if(file_exists($sms_avatar))
                            <img class="user_photo" src="{{asset('storage/user/'.$model->personalInfo->avatar)}}" alt="">
                        @else
                            <img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt="">
                        @endif
                    </div>
                    <div class="col-12">
                        <ul class="user_list">
                            <li>{{$model->personalInfo->first_name.' '.$model->personalInfo->last_name.' '.$model->personalInfo->middle_name}}</li>
                            <li>{{translate('Role').': '.$model->role->name }}</li>
                            <li>{{translate('Phone').': '.$model->personalInfo->phone_number }}</li>
                            <li>{{translate('Age').': '.$model->role->name }}</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                    <div class="col-6"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
