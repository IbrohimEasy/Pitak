@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Media list')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('carList.create')}}">{{translate('Create')}}</a>
            </div>
            <table id="datatable-buttons" class="table dt-responsive nowrap table_show">
                <thead>
                    <tr>
                        <th>{{translate('Attributes')}}</th>
                        <th>{{translate('Informations')}}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>{{translate('Image')}}</th>
                        <td>
                            @if(isset($model->id))
                                @php
                                    $image_small = storage_path('app/public/media/thumb/'.$model->url_small);
                                @endphp
                                @if(file_exists($image_small))
                                    <img src="{{asset('storage/media/thumb/'.$model->url_small)}}" alt="">
                                @else
                                    <img src="{{asset('storage/media/thumb/apartment.webp')}}" alt="">
                                @endif
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{translate('Media')}}</th>
                        <td>
                            @if(isset($model->id))
                                @php
                                    $big_image_array = explode('.', $model->url_big);
                                    $image_big = storage_path('app/public/media/'.$model->url_big);
                                    $video_big = storage_path('app/public/media/videos/'.$model->url_big);
                                @endphp
                                @if(file_exists($image_big))
                                    <img src="{{asset('storage/media/'.$model->url_big)}}" alt="" width="140px">
                                @elseif(file_exists($video_big))
                                    <video width="100" height="100" controls>
                                        <source src="{{asset('storage/media/videos/'.$model->url_big)}}" type="video/mp4">
                                    </video>
                                @else
                                    <img src="{{asset('storage/media/thumb/apartment.webp')}}" alt="">
                                @endif
                            @else
                                <img src="{{asset('storage/media/thumb/apartment.webp')}}" alt="" width="140px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>{{translate('Updated at')}}</th>
                        <td>{{$model->updated_at??''}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection