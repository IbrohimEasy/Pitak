@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14">
                {{translate('Car class list create')}}
            </p>
            <form action="{{route('car-types.store')}}" class="parsley-examples" method="POST">
                @csrf
                @method('POST')
                <div class="mb-3">
                    <label for="status" class="form-label">{{translate('Status')}}</label>
                    <select id="status" class="form-select" name="status_id">
                        <option value="">{{translate('Choose..')}}</option>
                        <option value="0">{{translate('active')}}</option>
                        <option value="1">{{translate('inactive')}}</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Name')}}</label>
                    <input type="text" class="form-control" name="name" required />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Create')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection