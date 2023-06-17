@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14">
                {{translate('Car create')}}
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
            <form action="{{route('cars.store')}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="car_list_id" class="form-label">{{translate('Car list')}}</label>
                    <select id="car_list_id" class="form-select" name="car_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($carLists as $carList)
                            <option value="{{$carList->id}}">{{$carList->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="driver_id" class="form-label">{{translate('Driver')}}</label>
                    <select id="driver_id" class="form-select" name="driver_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($drivers as $driver)
                            <option value="{{$driver->id}}">{{$driver->personalInfo->first_name.' '.$driver->personalInfo->last_name.' '.$driver->personalInfo->middle_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_id" class="form-label">{{translate('Status')}}</label>
                    <select id="status_id" class="form-select" name="status_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($statuses as $statuse)
                            <option value="{{$statuse->id}}">{{$statuse->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="color_list_id" class="form-label">{{translate('Color')}}</label>
                    <select id="color_list_id" class="form-select" name="color_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($colorLists as $colorList)
                            <option value="{{$colorList->id}}">{{$colorList->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">{{translate('Class list')}}</label>
                    <select id="class" class="form-select" name="class_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($classLists as $classList)
                            <option value="{{$classList->id}}">{{$classList->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Registration certificate')}}</label>
                    <input type="text" name="reg_certificate" class="form-control" value="" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Registration certificate image')}}</label>
                    <input type="file" name="reg_certificate_image" class="form-control"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Images')}}</label>
                    <input type="file" name="images[]" class="form-control" multiple/>
                </div>
{{--                <div class="clearfix"></div>--}}
{{--                <div class="mb-3 dropzone" id="myAwesomeDropzone" data-plugin="dropzone" data-previews-container="#file-previews"--}}
{{--                     data-upload-preview-template="#uploadPreviewTemplate">--}}
{{--                    <label class="form-label">{{translate('Image')}}</label>--}}
{{--                    <div class="fallback">--}}
{{--                        <input name="images" type="file" multiple />--}}
{{--                    </div>--}}

{{--                    <div class="dz-message needsclick">--}}
{{--                        <i class="h1 text-muted dripicons-cloud-upload"></i>--}}
{{--                        <h3>Drop files here or click to upload.</h3>--}}
{{--                        <span class="text-muted font-13">(This is just a demo dropzone. Selected files are--}}
{{--                        <strong>not</strong> actually uploaded.)</span>--}}
{{--                    </div>--}}

{{--                    <!-- Preview -->--}}
{{--                    <div class="dropzone-previews mt-3" id="file-previews"></div>--}}

{{--                    <!-- end row -->--}}

{{--                    <!-- file preview template -->--}}
{{--                    <div class="d-none" id="uploadPreviewTemplate">--}}
{{--                        <div class="card mt-1 mb-0 shadow-none border">--}}
{{--                            <div class="p-2">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <img data-dz-thumbnail src="#" class="avatar-sm rounded bg-light" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col ps-0">--}}
{{--                                        <a href="javascript:void(0);" class="text-muted fw-bold" data-dz-name></a>--}}
{{--                                        <p class="mb-0" data-dz-size></p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <!-- Button -->--}}
{{--                                        <a href="" class="btn btn-link btn-lg text-muted" data-dz-remove>--}}
{{--                                            <i class="dripicons-cross"></i>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Create')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection