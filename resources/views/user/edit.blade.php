@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14">
                {{translate('User edit')}}
            </p>
            <form action="{{route('user.store')}}" class="parsley-examples" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('First name')}}</label>
                        <input type="text" class="form-control" required value="{{old('first_name')}}"/>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Last name')}}</label>
                        <input type="text" class="form-control" value="{{old('first_name')}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Middle name')}}</label>
                        <input type="text" class="form-control" value="{{old('first_name')}}"/>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Phone number')}}</label>
                        <input type="text" class="form-control" value="{{old('first_name')}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-4">
                        <label class="form-label">{{translate('Avatar')}}</label>
                        <input type="file" class="form-control" value="{{old('first_name')}}"/>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="gender" class="form-label">{{translate('Gender')}}</label>
                        <select id="gender" class="form-select">
                            <option value="">{{translate('Choose..')}}</option>
                            <option value="0" {{old('gender')==0??'selected'}}>{{translate('Man')}}</option>
                            <option value="1" {{old('gender')==1??'selected'}}>{{translate('Woman')}}</option>
                        </select>
                    </div>
                    <div class="mb-3 col-4">
                        <label class="form-label">{{translate('Birth date')}}</label>
                        <input type="date" class="form-control" value="{{old('first_name')}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="gender" class="form-label">{{translate('Role')}}</label>
                        <select id="gender" class="form-select">
                            <option value="">{{translate('Choose..')}}</option>
                            <option value="0">{{translate('Man')}}</option>
                            <option value="1">{{translate('Woman')}}</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="gender" class="form-label">{{translate('Company')}}</label>
                        <select id="gender" class="form-select">
                            <option value="0">{{translate('Itkey')}}</option>
                            <option value="1">{{translate('Coworking')}}</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Login')}}</label>
                    <input type="email" class="form-control" name="login" required value="{{old('first_name')}}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Password')}}</label>
                    <input type="text" class="form-control" required value="{{old('first_name')}}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Password confirmation')}}</label>
                    <input type="text" class="form-control" required value="{{old('first_name')}}"/>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Update')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection