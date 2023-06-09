@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14">
                {{translate('User create')}}
            </p>
            <form action="{{route('user.store')}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('First name')}}</label>
                        <input type="text" class="form-control" name="first_name" required value="{{old('first_name')}}"/>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Last name')}}</label>
                        <input type="text" class="form-control" name="last_name" value="{{old('last_name')}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Middle name')}}</label>
                        <input type="text" class="form-control" name="middle_name" value="{{old('middle_name')}}"/>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Phone number')}}</label>
                        <input type="text" class="form-control" name="phone_number" value="{{old('phone_number')}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-4">
                        <label class="form-label">{{translate('Avatar')}}</label>
                        <input type="file" class="form-control" name="avatar" value="{{old('avatar')}}"/>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="gender" class="form-label">{{translate('Gender')}}</label>
                        <select id="gender" class="form-select" name="gender">
                            <option value="">{{translate('Choose..')}}</option>
                            <option value="1" {{old('gender')==1??'selected'}}>{{translate('Man')}}</option>
                            <option value="2" {{old('gender')==2??'selected'}}>{{translate('Woman')}}</option>
                        </select>
                    </div>
                    <div class="mb-3 col-4">
                        <label class="form-label">{{translate('Birth date')}}</label>
                        <input type="date" class="form-control" name="birth_date" value="{{old('birth_date')}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="role" class="form-label">{{translate('Role')}}</label>
                        <select id="role" class="form-select" name="role_id">
                            <option value="">{{translate('Choose..')}}</option>
                            <option value="1">{{translate('Menedjer')}}</option>
                            <option value="2">{{translate('Admin')}}</option>
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="company" class="form-label">{{translate('Company')}}</label>
                        <select id="company" class="form-select" name="company_id">
                            <option value="1" {{old('company')==1??'selected'}}>{{translate('Itkey')}}</option>
                            <option value="2" {{old('company')==2??'selected'}}>{{translate('Coworking')}}</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Login')}}</label>
                    <input type="email" class="form-control" name="email" required value="{{old('email')}}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Password')}}</label>
                    <input type="text" class="form-control" name="password" required value="{{old('password')}}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Password confirmation')}}</label>
                    <input type="text" class="form-control" name="password_confirmation" required value="{{old('password_confirmation')}}"/>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Create')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection