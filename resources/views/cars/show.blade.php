@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Car info')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('cars.create')}}">{{translate('Create')}}</a>
            </div>
            @php
            if(isset($model->driver->personalInfo)){
                $firstname = $model->driver->personalInfo->first_name;
                $lastname = $model->driver->personalInfo->last_name;
                $middlename = $model->driver->personalInfo->middle_name;
            }else{
                $firstname = '';
                $lastname = '';
                $middlename = '';
            }

            @endphp
            <table id="datatable-buttons" class="table dt-responsive nowrap table_show">
                <thead>
                <tr>
                    <th>{{translate('Attributes')}}</th>
                    <th>{{translate('Informations')}}</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>{{translate('Car list')}}</th>
                    <td>{{$model->carList->name??''}}</td>
                </tr>
                <tr>
                    <th>{{translate('Driver')}}</th>
                    <td>{{$firstname.' '$lastname.' '$middlename}}</td>
                </tr>
                <tr>
                    <th>{{translate('Status')}}</th>
                    <td>{{$model->status->name??''}}</td>
                </tr>
                <tr>
                    <th>{{translate('Color')}}</th>
                    <td>{{$model->colorList->name??''}}</td>
                </tr>
                <tr>
                    <th>{{translate('Class')}}</th>
                    <td>{{$model->classList->name??''}}</td>
                </tr>
                <tr>
                    <th>{{translate('Registration certificate')}}</th>
                    <td>{{$model->reg_certificate??''}}</td>
                </tr>
                <tr>
                    <th>{{translate('Reg certificate image')}}</th>
                    <td><img src="{{asset('storage/certificate/'.$model->reg_certificate_image)}}" alt="no image"></td>
                </tr>
                <tr>
                    <th>{{translate('Image')}}</th>
                    <td>
                        <div class="row">
                            @if(isset($model->images))
                                @php
                                    $images = json_decode($model->images);
                                @endphp
                                @foreach($images as $image)
                                    <img class="col-4 mb-2" src="{{asset('storage/cars/'.$image)}}" alt="">
                                @endforeach
                            @endif
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>{{translate('Updated at')}}</th>
                    <td>{{$model->updated_at??''}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection