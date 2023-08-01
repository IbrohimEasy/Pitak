@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    {{-- <div class="card">
        <div class="card-body"> --}}
            {{-- <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('user.create')}}">{{translate('Create')}}</a>
            </div> --}}
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>{{translate('Avatar')}}</th>
                        <th>{{translate('Firstname')}}</th>
                        <th>{{translate('Lastname')}}</th>
                        <th>{{translate('Role')}}</th>
                        <th>{{translate('Phone number')}}</th>
                        <th class="text-center">{{translate('Functions')}}</th>
                    </tr>
                </thead>
                <tbody>
                @php
                    $i = 0
                @endphp
                @foreach($staffs as $staff)
                    @php
                        $i++
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td class="text-center">
                            @if(isset($staff->id))
                                @php
                                    $sms_avatar = storage_path('app/public/user/'.$staff->personalInfo->avatar);
                                @endphp
                                @if(file_exists($sms_avatar))
                                    <img class="user_photo" src="{{asset('storage/user/'.$staff->personalInfo->avatar)}}" alt="">
                                @else
                                    <img class="user_photo" src="{{asset('assets/images/man.jpg')}}" alt="">
                                @endif
                            @endif
                        </td>
                        <td>{{$staff->personalInfo->first_name}}</td>
                        <td>{{$staff->personalInfo->last_name}}</td>
                        <td>{{$staff->role->name}}</td>
                        <td>{{$staff->personalInfo->phone_number}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="form_functions btn btn-info" href="{{route('user.edit', $staff->id)}}"><i class="fe-edit-2"></i></a>
                                <a class="form_functions btn btn-info" href="{{route('user.show', $staff->id)}}"><i class="fe-eye"></i></a>
                                <form action="{{route('user.destroy', $staff->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="form_functions btn btn-danger"><i class="fe-trash-2"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        {{-- </div>
    </div> --}}
@endsection