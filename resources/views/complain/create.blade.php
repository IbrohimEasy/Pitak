@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p class="text-muted font-14">
                {{translate('Complain create')}}
            </p>
            <form action="{{route('complain.store')}}" class="parsley-examples" method="POST">
                @csrf
                @method("POST")
                <div class="mb-3">
                    <label class="form-label" for="text">{{translate('Text')}}</label>
                    <textarea name="text" id="text" cols="30" class="form-control" required  rows="4">{{old('text')}}</textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Create')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection