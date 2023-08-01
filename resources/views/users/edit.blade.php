@extends('layout.layout')

@section('title')
    {{-- Driver Edit --}}
    {{ translate("Driver Edit") }}
@endsection

@section('styles')
    .error-data {
        color: red;
    }
@endsection

@section('content')

    <form action="{{ route('driver.update', $model->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('First name') }}</label>
                    {{-- <label for="simpleinput" class="form-label">First name</label> --}}
                    <input type="text" id="c_first_name" class="form-control" value="{{ $modelPersonalInfo->first_name }}" name="first_name">
                    <span class="error-data">@error('first_name'){{ $message }}@enderror</span>
                </div>
                

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('Last name') }}</label>
                    {{-- <label for="simpleinput" class="form-label">Last name</label> --}}
                    <input type="text" id="c_last_name" class="form-control" value="{{ $modelPersonalInfo->last_name }}" name="last_name">
                    <span class="error-data">@error('last_name'){{ $message }}@enderror</span>
                </div>
                

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('Middle name') }}</label>
                    {{-- <label for="simpleinput" class="form-label">Middle name</label> --}}
                    <input type="text" id="c_middle_name" class="form-control" value="{{ $modelPersonalInfo->middle_name }}" name="middle_name">
                    <span class="error-data">@error('middle_name'){{ $message }}@enderror</span>
                </div>
                

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('Phone number') }}</label>
                    {{-- <label for="simpleinput" class="form-label">Phone number</label> --}}
                    <input type="text" id="c_phone_number" class="form-control" value="{{ $modelPersonalInfo->phone_number }}" name="phone_number">
                    <span class="error-data">@error('phone_number'){{ $message }}@enderror</span>
                </div>
                

                {{-- <div class="mb-3"> --}}
                    {{-- <label for="simpleinput" class="form-label">{{ translate('Avatar') }}</label> --}}
                    {{-- <label for="simpleinput" class="form-label">Avatar</label> --}}
                    {{-- <input type="text" id="c_avatar" class="form-control" value="{{ $modelPersonalInfo->avatar }}" name="avatar"> --}}
                    {{-- <span class="error-data">@error('avatar'){{ $message }}@enderror</span> --}}
                {{-- </div> --}}
                
                
                <div class="mb-3">
                    <label for="birth_date" class="form-label">{{ translate('Birth date') }}</label>
                    {{-- <label for="basic-datepicker" class="form-label">Birth date</label> --}}
                    <input type="text" id="birth_date" class="form-control basic-datepicker" value="{{ $modelPersonalInfo->birth_date }}" name="birth_date">
                    <span class="error-data">@error('birth_date'){{ $message }}@enderror</span>
                </div>
                
                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('Gender') }}</label><br>
                    {{-- <label for="simpleinput" class="form-label">Gender</label> <br> --}}
                    
                    <input type="radio" id="c_male" class="" value="{{ $male }}" name="gender" {{ ($modelPersonalInfo->gender == $male) ? 'checked' : '' }}>
                    <label for="simpleinput" class="form-label">{{ translate('Male') }}</label>
                    {{-- <label for="c_male" class="form-label">Male</label> --}}
                    
                    <br>
                    <input type="radio" id="c_female" class="" value="{{ $female }}" name="gender" {{ ($modelPersonalInfo->gender == $female) ? 'checked' : '' }}>
                    <label for="simpleinput" class="form-label">{{ translate('Female') }}</label>
                    {{-- <label for="c_female" class="form-label">Female</label> --}}
                    
                    <span class="error-data">@error('gender'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">{{ translate('Status') }}</label>
                    {{-- <label for="example-select" class="form-label">Status</label> --}}
                    <select class="form-select" id="example-select" name="status_id">
                        @if (count($modelStatus) > 0)
                            @foreach ($modelStatus as $valStatus)
                                @php
                                    $selected = '';
                                    if ($model->status_id == $valStatus->id) {
                                        $selected = 'selected';
                                    }
                                @endphp
                                <option value="{{ $valStatus->id }}" {{ $selected }}>{{ $valStatus->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="error-data">@error('status_id'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="serial_number" class="form-label">{{ translate('Serial number') }}</label>
                    {{-- <label for="basic-datepicker" class="form-label">Birth date</label> --}}
                    <input type="text" id="serial_number" class="form-control" value="{{ $model->serial_number }}" name="serial_number">
                    <span class="error-data">@error('serial_number'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="issued_by" class="form-label">{{ translate('Issued by') }}</label>
                    {{-- <label for="basic-datepicker" class="form-label">Birth date</label> --}}
                    <input type="text" id="issued_by" class="form-control" value="{{ $model->issued_by }}" name="issued_by">
                    <span class="error-data">@error('issued_by'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="passport_expired_date" class="form-label">{{ translate('Passport expired date') }}</label>
                    {{-- <label for="basic-datepicker" class="form-label">Birth date</label> --}}
                    <input type="text" id="passport_expired_date" class="form-control basic-datepicker" value="{{ $model->passport_expired_date }}" name="passport_expired_date">
                    <span class="error-data">@error('passport_expired_date'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="license_number" class="form-label">{{ translate('License number') }}</label>
                    {{-- <label for="basic-datepicker" class="form-label">Birth date</label> --}}
                    <input type="text" id="license_number" class="form-control" value="{{ $model->license_number }}" name="license_number">
                    <span class="error-data">@error('license_number'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="license_expired_date" class="form-label">{{ translate('License expired date') }}</label>
                    {{-- <label for="basic-datepicker" class="form-label">Birth date</label> --}}
                    <input type="text" id="license_expired_date" class="form-control basic-datepicker" value="{{ $model->license_expired_date }}" name="license_expired_date">
                    <span class="error-data">@error('license_expired_date'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="personal_account" class="form-label">{{ translate('Personal account') }}</label>
                    {{-- <label for="basic-datepicker" class="form-label">Birth date</label> --}}
                    <input type="text" id="personal_account" class="form-control" value="{{ $model->personal_account }}" name="personal_account">
                    <span class="error-data">@error('personal_account'){{ $message }}@enderror</span>
                </div>

                <button class="btn btn-primary" type="submit">{{ translate('Submit') }}</button>
                {{-- <button class="btn btn-primary" type="submit">Submit</button> --}}

            </div>
        </div>
    </form>

@endsection
