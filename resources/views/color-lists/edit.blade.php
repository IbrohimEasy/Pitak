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
                {{translate('Car color list edit')}}
            </p>
            <form action="{{route('colorList.update', $colorLists->id)}}" class="parsley-examples" method="POST">
                @csrf
                @method("PUT")
                <div class="mb-3">
                    <label class="form-label">{{translate('Name')}}</label>
                    <input type="text" name="name" class="form-control" required value="{{$colorLists->name??''}}"/>
                </div>
                <div class="mb-3">
                    <label class="form-label">{{translate('Code')}}</label>
                    <input type="text" name="name" class="form-control" required value="{{$colorLists->code??''}}"/>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Update')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection