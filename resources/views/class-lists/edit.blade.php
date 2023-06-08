@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14">
                {{translate('Car class list edit')}}
            </p>
            <form action="{{route('class-list.update', 1)}}" class="parsley-examples">
                <div class="mb-3">
                    <label class="form-label">{{translate('Name')}}</label>
                    <input type="text" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">{{translate('Status')}}</label>
                    <select id="gender" class="form-select">
                        <option value="">{{translate('Choose..')}}</option>
                        <option value="0">{{translate('active')}}</option>
                        <option value="1">{{translate('inactive')}}</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Update')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection