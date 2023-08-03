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
                {{translate('Complain edit')}}
            </p>
            <form action="{{route('complain.update', $ComplainReason->id)}}" class="parsley-examples" method="POST">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label class="form-label" for="text">{{translate('Text')}}</label>
                    <textarea name="text" class="form-control" required id="text" cols="30" rows="4">
                        {{$ComplainReason->text??''}}
                    </textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Update')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection