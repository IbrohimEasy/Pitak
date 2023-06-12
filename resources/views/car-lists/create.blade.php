@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14">
                {{translate('Car list create')}}
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
            <form action="{{route('carList.store')}}" class="parsley-examples" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="status_id" class="form-label">{{translate('Status')}}</label>
                    <select id="status_id" class="form-select" name="status_id" required>
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($statuses as $status)
                            <option value="{{$status->id??''}}">{{$status->name??''}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">{{translate('Car type')}}</label>
                    <select id="type" class="form-select" name="car_type_id">
                        <option value="">{{translate('Choose..')}}</option>
                        <option value="0">{{translate('SUV')}}</option>
                        <option value="1">{{translate('Coupe')}}</option>
                        <option value="2">{{translate('Convertable')}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Name')}}</label>
                    <input type="text" name="name" class="form-control" required />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Create')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection