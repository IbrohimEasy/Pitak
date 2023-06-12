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
            <form action="{{route('cars.store')}}" class="parsley-examples" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="car_list_id" class="form-label">{{translate('Car list')}}</label>
                    <select id="status" class="form-select" name="car_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        <option value="0">{{translate('SUV')}}</option>
                        <option value="1">{{translate('Coupe')}}</option>
                        <option value="2">{{translate('Convertable')}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">{{translate('Driver')}}</label>
                    <select id="type" class="form-select" name="driver_id">
                        <option value="">{{translate('Choose..')}}</option>
                        <option value="0">Alijon</option>
                        <option value="1">Elyor</option>
                        <option value="2">Rasul</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">{{translate('Status')}}</label>
                    <select id="status" class="form-select" name="status_id">
                        <option value="">{{translate('Choose..')}}</option>
                        <option value="0">{{translate('active')}}</option>
                        <option value="1">{{translate('inactive')}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">{{translate('Color')}}</label>
                    <select id="color" class="form-select" name="color_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        <option value="0">{{translate('active')}}</option>
                        <option value="1">{{translate('inactive')}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label">{{translate('Class list')}}</label>
                    <select id="class" class="form-select" name="class_list_id">
                        <option value="">{{translate('Choose..')}}</option>
                        <option value="0">{{translate('Chevrolet')}}</option>
                        <option value="1">{{translate('Toyota')}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Registration certificate')}}</label>
                    <input type="text" name="reg_certificate" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Registration certificate image')}}</label>
                    <input type="text" name="reg_certificate_image" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Image')}}</label>
                    <input type="text" name="image" class="form-control" />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Create')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection