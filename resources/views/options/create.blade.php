@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <p class="text-muted font-14">
                {{translate('Option create')}}
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
            <form action="{{route('option.store')}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                    <div class="mb-3 col-8">
                        <label class="form-label">{{translate('Name')}}</label>
                        <input type="text" class="form-control" name="name" required value="{{old('name')}}"/>
                    </div>
                    <div class="col-4"></div>
                    <div class="mb-3 col-4">
                        <label class="form-label">{{translate('Icon')}}</label>
                        <input type="file" class="form-control" name="icon" value="{{old('icon')}}"/>
                    </div>
                    <div class="mb-3 col-4">
                        <label for="class_list_id" class="form-label">{{translate('Class list')}}</label>
                        <select id="class_list_id" class="form-select" name="class_list_id">
                            <option value="">{{translate('All')}}</option>
                            @foreach($class_lists as $class_list)
                                <option value="{{$class_list->id}}">{{$class_list->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Create')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection