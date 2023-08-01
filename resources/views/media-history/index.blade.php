@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Media lists')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('mediaHistory.create')}}">{{translate('Create')}}</a>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Media small')}}</th>
                        <th>{{translate('Media big')}}</th>
                        <th>{{translate('Updated_at')}}</th>
                        <th class="text-center">{{translate('Functions')}}</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0
                    @endphp
                    @foreach($media_histories as $media_history)
                        @php
                            $i++;

                        @endphp
                        <tr>
                            <th scope="row">{{$i}}</th>
                            <td style="display:flex; align-items: center">
                                @if(isset($media_history->id))
                                    @php
                                        $image_small = storage_path('app/public/media/thumb/'.$media_history->url_small);
                                    @endphp
                                    @if(file_exists($image_small))
                                        <img src="{{asset('storage/media/thumb/'.$media_history->url_small)}}" alt="">
                                    @else
                                        <img src="{{asset('storage/media/thumb/apartment.webp')}}" alt="">
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if(isset($media_history->id))
                                    @php
                                        $big_image_array = explode('.', $media_history->url_big);
                                        $image_big = storage_path('app/public/media/'.$media_history->url_big);
                                        $video_big = storage_path('app/public/media/videos/'.$media_history->url_big);
                                    @endphp
                                    @if(file_exists($image_big))
                                        <img src="{{asset('storage/media/'.$media_history->url_big)}}" alt="" width="140px">
                                    @elseif(file_exists($video_big))
                                        <video width="150" height="150" controls>
                                            <source src="{{asset('storage/media/videos/'.$media_history->url_big)}}" type="video/mp4">
                                        </video>
                                    @else
                                        <img src="{{asset('storage/media/thumb/apartment.webp')}}" alt="">
                                    @endif
                                @else
                                    <img src="{{asset('storage/media/thumb/apartment.webp')}}" alt="" width="140px">
                                @endif
                            </td>
                            <td>{{$media_history->updated_at??''}}</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <a class="form_functions btn btn-info" href="{{route('mediaHistory.edit', $media_history->id)}}"><i class="fe-edit-2"></i></a>
                                    <a class="form_functions btn btn-info" href="{{route('mediaHistory.show', $media_history->id)}}"><i class="fe-eye"></i></a>
                                    <form action="{{route('mediaHistory.destroy', $media_history->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="form_functions btn btn-danger" type="submit"><i class="fe-trash-2"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection