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
                {{translate('Media list edit')}}
            </p>
            <form action="{{route('mediaHistory.update', $media_history->id)}}" class="parsley-examples" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <ul class="nav nav-pills navtab-bg"> {{--  nav-justified --}}
                    <li class="nav-item">
                        <a href="#uploadImage" data-bs-toggle="tab" aria-expanded="true" class="nav-link active" id="upload_image">
                            {{ translate('Upload image') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#uploadVideo" data-bs-toggle="tab" aria-expanded="false" class="nav-link" id="upload_video">
                            {{ translate('Upload video') }}
                        </a>
                    </li>
                </ul>
                @php
                    $big_image_array = explode('.', $media_history->url_big);
                    $image_small = storage_path('app/public/media/thumb/'.$media_history->url_small);
                    $image_big = storage_path('app/public/media/'.$media_history->url_big);
                    $video_big = storage_path('app/public/media/videos/'.$media_history->url_big);
                @endphp

                <div class="tab-content d-flex justify-content-between">
                    <div class="mb-3" style="width:44%">
                        <div style="height: 94px">
                            @if(file_exists($image_small))
                                <img src="{{asset('storage/media/thumb/'.$media_history->url_small)}}" alt="" height="90px">
                            @endif
                        </div>
                        <br>
                        <label class="form-label">{{translate('File')}}</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>
                    <div class="tab-pane show active" id="uploadImage">

                    </div>
                    <div class="tab-pane" id="uploadVideo" style="width:44%">
                        <div class="mb-3">
                            <div style="height: 94px">
                                @if(file_exists($video_big))
                                    <video height="90" width="90" controls>
                                        <source src="{{asset('storage/media/videos/'.$media_history->url_big)}}" type="video/mp4">
                                    </video>
                                @endif
                            </div>
                            <br>
                            <label class="form-label">{{translate('Video')}}</label>
                            @if(file_exists($video_big))
                                <input type="file" name="video" class="form-control" value="{{$video_big}}"/>
                            @else
                                <input type="file" name="video" class="form-control"/>
                            @endif
                            <input type="hidden" name="is_video" id="is_video" value="false">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">{{translate('Update')}}</button>
                    <button type="reset" class="btn btn-secondary waves-effect">{{translate('Cancel')}}</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        let uploadVideo = document.getElementById('upload_video')
        let is_video = document.getElementById('is_video')
        let uploadImage = document.getElementById('upload_image')
        uploadVideo.addEventListener('click', function () {
            is_video.value = 'true';
        })
        uploadImage.addEventListener('click', function () {
            is_video.value = 'false';
        })
        if(uploadImage.classList.contains('active')){
            is_video.value = 'false';
        }
    </script>
@endsection