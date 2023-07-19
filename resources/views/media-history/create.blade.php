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
                {{translate('Car class list create')}}
            </p>
            <form action="{{route('mediaHistory.store')}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                @csrf
                @method("POST")
                <div class="mb-3">
                    <label for="user" class="form-label">{{translate('Select user')}}</label>
                    <select id="user" class="form-select" name="user_id" required>
                        <option value="">{{translate('Choose..')}}</option>
                        @foreach($users as $user)
                            <option value="{{$user->id??''}}">
                                {{$user->personalInfo->first_name??''}} {{$user->personalInfo->last_name??''}} {{$user->personalInfo->middle_name??''}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <ul class="nav nav-pills navtab-bg"> {{--  nav-justified --}}
                    <li class="nav-item">
                        <a href="#uploadImage" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            {{ translate('Upload image') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#uploadVideo" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            {{ translate('Upload video') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content d-flex justify-content-between">
                    <div class="mb-3" style="width:44%">
                        <label class="form-label">{{translate('File')}}</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="tab-pane show active" id="uploadImage">

                    </div>
                    <div class="tab-pane" id="uploadVideo" style="width:44%">
                        <div class="mb-3" >
                            <label class="form-label">{{translate('Video')}}</label>
                            <input type="file" name="video" class="form-control"/>
                        </div>
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