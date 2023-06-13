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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('user.update', $staff->id)}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('First name')}}</label>
                        <input type="text" class="form-control" name="first_name" required value="{{$staff->personalInfo->first_name}}"/>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Last name')}}</label>
                        <input type="text" class="form-control" name="last_name" value="{{$staff->personalInfo->last_name??''}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Middle name')}}</label>
                        <input type="text" class="form-control" name="middle_name" value="{{$staff->personalInfo->middle_name??''}}"/>
                    </div>
                    <div class="mb-3 col-6">
                        <label class="form-label">{{translate('Phone number')}}</label>
                        <input type="text" class="form-control" name="phone_number" value="{{$staff->personalInfo->phone_number??''}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-4">
                        <label class="form-label">{{translate('Avatar')}}</label>
                        <input type="file" class="form-control" name="avatar" value=""/>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="gender" class="form-label">{{translate('Gender')}}</label>
                        <select id="gender" class="form-select" name="gender">
                            <option value="">{{translate('Choose..')}}</option>
                            <option value="1" {{$staff->personalInfo->gender==1?'selected':''}}>{{translate('Man')}}</option>
                            <option value="2" {{$staff->personalInfo->gender==2?'selected':''}}>{{translate('Woman')}}</option>
                        </select>
                    </div>
                    <div class="mb-3 col-4">
                        <label class="form-label">{{translate('Birth date')}}</label>
                        @php
                            $birth_date = explode(' ', $staff->personalInfo->birth_date);
                        @endphp
                        <input type="date" class="form-control" name="birth_date" value="{{$birth_date[0]}}"/>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-6">
                        <label for="role" class="form-label">{{translate('Role')}}</label>
                        <select id="role" class="form-select" name="role_id">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}" {{$staff->role_id == $role->id?'selected':''}}>{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-6">
                        <label for="company" class="form-label">{{translate('Company')}}</label>
                        <select id="company" class="form-select" name="company_id">
                            @foreach($companies as $company)
                                <option value="{{$company->id}}" {{$staff->company_id == $company->id?'selected':''}}>{{$company->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Login')}}</label>
                    <input type="email" class="form-control" name="email" required value="{{$staff->email??''}}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Current password')}}</label>
                    <input type="password" class="form-control" name="password" value=""/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('New password')}}</label>
                    <input type="password" class="form-control" name="new_password" value=""/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Password confirmation')}}</label>
                    <input type="password" class="form-control" name="password_confirmation" value=""/>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Update')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection