@extends('layout.layout')

@section('title')

@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14">
                {{translate('Car edit')}}
            </p>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('cars.update', $model->id)}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="car_list_id" class="form-label">{{translate('Car list')}}</label>
                    <select id="car_list_id" class="form-select" name="car_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($carLists as $carList)
                            <option value="{{$carList->id}}" @if(isset($model->status)){{$model->carList->id == $carList->id?'selected':''}}@endif>{{$carList->name??''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="driver_id" class="form-label">{{translate('Driver')}}</label>
                    <select id="driver_id" class="form-select" name="driver_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}" @if(isset($model->status)){{$model->driver->id == $driver->id?'selected':''}}@endif>{{$driver->personalInfo?$driver->personalInfo->first_name:''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_id" class="form-label">{{translate('Status')}}</label>
                    <select id="status_id" class="form-select" name="status_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($statuses as $statuse)
                            <option value="{{$statuse->id}}" @if(isset($model->status)){{$model->status->id == $statuse->id?'selected':''}}@endif>{{$statuse->name??''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="color_list_id" class="form-label">{{translate('Color')}}</label>
                    <select id="color_list_id" class="form-select" name="color_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($colorLists as $colorList)
                            <option value="{{$colorList->id}}" @if(isset($model->colorList)){{$model->colorList->id == $colorList->id?'selected':''}}@endif style="background-color: {{$colorList->code}}; color:{{strtolower($colorList->name)=='white'?'black':'white'}}">{{$colorList->name??''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">{{translate('Class list')}}</label>
                    <select id="class" class="form-select" name="class_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($classLists as $classList)
                            <option value="{{$classList->id}}" @if(isset($model->status)){{$model->classList->id == $classList->id?'selected':''}}@endif>{{$classList->name??''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Registration certificate')}}</label>
                    <input type="text" name="reg_certificate" class="form-control" value="{{$model->reg_certificate??''}}" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Registration certificate image')}}</label>
                    <input type="file" name="reg_certificate_image" class="form-control" />
                </div>
                <div class="mb-3">
                    @if(isset($model->images))
                        @php
                          $images = json_decode($model->images);
                        @endphp
                        @if(isset($images))
                            @foreach($images as $image)
                                <img src="{{asset('storage/cars/'.$image)}}" alt="">
                            @endforeach
                        @endif
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Image')}}</label>
                    <input type="file" name="images[]" class="form-control" multiple/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Steering wheel side')}}</label>
                    <select id="class" class="form-select" name="wheel_side">
                        <option value="0" @if(isset($model->status)){{$model->wheel_side == 0?'selected':''}}@endif>{{translate('Left')}}</option>
                        <option value="1" @if(isset($model->status)){{$model->wheel_side == 1?'selected':''}}@endif>{{translate('Right')}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Production date')}}</label>
                    <input type="date" name="production_date" class="form-control" value="{{$model->production_date??''}}"/>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Update')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection