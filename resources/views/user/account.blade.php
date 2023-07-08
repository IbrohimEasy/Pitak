@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="row">
        <div class="col-4">
            <div class="card chat-list-card mb-xl-0">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            @php
                                $sms_avatar = storage_path('app/public/user/'.$user->personalInfo->avatar);
                            @endphp
                            @if(file_exists($sms_avatar))
                                <img class="flex-shrink-0 rounded-circle avatar-sm" src="{{asset('storage/user/'.$user->personalInfo->avatar)}}" alt="">
                            @else
                                <img class="flex-shrink-0 rounded-circle avatar-sm" src="{{asset('assets/images/man.jpg')}}" alt="">
                            @endif
                        </div>
                        <div class="flex-grow-1 align-items-center ms-2">
                            <h5 class="mt-0 mb-1">{{$user->personalInfo->first_name??''}} {{$user->personalInfo->last_name??''}}</h5>
                            <p class="font-13 text-muted mb-0">{{$user->role->name??''}}</p>
                        </div>

                    </div>

                    <hr class="my-3">
                    <div class="">
                        <ul class="list-unstyled chat-list mb-0" style="max-height: 413px;" data-simplebar>
                            <li class="active">
                                <a href="#">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 chat-user-img active align-self-center me-2">
                                            <img src="assets/images/users/user-2.jpg" class="rounded-circle avatar-sm" alt="">
                                        </div>

                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-14 mt-0 mb-1">Margaret Clayton</h5>
                                            <p class="text-truncate mb-0">I've finished it! See you so...</p>
                                        </div>
                                        <div class="font-11">05 min</div>
                                    </div>
                                </a>
                            </li>
                            @foreach($stuffs as $stuff)
                                <li class="unread">
                                    <a href="{{route('user.show', $stuff->id)}}">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 chat-user-img align-self-center me-2">
                                                @php
                                                    $sms_avatar = storage_path('app/public/user/'.$stuff->personalInfo->avatar);
                                                @endphp
                                                @if(file_exists($sms_avatar))
                                                    <img class="rounded-circle avatar-sm" src="{{asset('storage/user/'.$stuff->personalInfo->avatar)}}" alt="">
                                                @else
                                                    <img class="rounded-circle avatar-sm" src="{{asset('assets/images/man.jpg')}}" alt="">
                                                @endif
                                            </div>

                                            <div class="flex-grow-1 overflow-hidden">
                                                <h5 class="text-truncate font-14 mt-0 mb-1">{{$stuff->personalInfo->first_name??''}} {{$stuff->personalInfo->last_name??''}}</h5>
                                                <p class="text-truncate mb-0">{{$stuff->role->name??''}}</p>
                                            </div>
                                            <div class="font-11">32 min</div>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="conversation-list-card card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a href="#" class="dropdown-toggle arrow-none card-drop font-20" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                            <div class="dropdown-divider"></div>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="mt-0 mb-1 text-truncate">Margaret Clayton</h5>
                            <p class="font-13 text-muted mb-0"><i class="mdi mdi-circle text-success me-1 font-11"></i> Active</p>
                        </div>
                    </div>
                    <hr class="my-3">

                    <div>
                        <ul class="conversation-list slimscroll" style="max-height: 410px;" data-simplebar>
                            <li>
                                <div class="chat-day-title">
                                    <span class="title">Today</span>
                                </div>
                            </li>
                            @foreach($stuffs as $stuff)
                                <li>
                                    <div class="message-list">
                                        <div class="chat-avatar">
                                            <img src="{{asset('assets/images/man.jpg')}}" alt="">
                                        </div>
                                        <div class="conversation-text">
                                            <div class="ctext-wrap">
                                                <span class="user-name">Margaret Clayton</span>
                                                <p>
                                                    Hello!
                                                </p>
                                            </div>
                                            <span class="time">10:00</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="p-3 conversation-input border-top">
                    <div class="row">
                        <div class="col">
                            <div>
                                <input type="text" class="form-control" placeholder="Enter Message...">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary chat-send width-md waves-effect waves-light"><span class="d-none d-sm-inline-block me-2">Send</span> <i class="mdi mdi-send"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection