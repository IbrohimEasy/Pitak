@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mt-0 header-title">{{translate('Cars')}}</h4>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('cars.create')}}">{{translate('Create')}}</a>
            </div>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>#</th>
                    <th>{{translate('Car list')}}</th>
                    <th>{{translate('Driver')}}</th>
                    <th>{{translate('Color')}}</th>
                    <th>{{translate('Image')}}</th>
                    <th>{{translate('Updated at')}}</th>
                    <th class="text-center">{{translate('Functions')}}</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 0
                @endphp
                @foreach($cars as $car)
                    @php
                        $i++
                    @endphp
                    <tr>
                        <th scope="row">{{$i}}</th>
                        <td>{{$car->carList->name??''}}</td>
                        <td>{{$car->driver->personalInfo->first_name??''}}</td>
                        <td>{{$car->colorList->name??''}}</td>
                        <td>
                            @php
                              $sms_image = storage_path('app/public/certificate/'.$car->reg_certificate_image);
                            @endphp
                            @if(file_exists($sms_image))
                                <img class="user_photo" src="{{asset('storage/certificate/'.$car->reg_certificate_image)}}" alt="">
                            @else
                                <img class="user_photo" src="{{asset('storage/certificate/no_certificate.webp')}}" alt="">
                            @endif
                        </td>
                        <td>{{$car->updated_at??''}}</td>
                        <td>
                            <div class="d-flex justify-content-center">
                                <a class="form_functions btn btn-info" href="{{route('cars.edit', $car->id)}}"><i class="fe-edit-2"></i></a>
                                <a class="form_functions btn btn-info" href="{{route('cars.show', $car->id)}}"><i class="fe-eye"></i></a>
                                <form action="{{route('cars.destroy', $car->id)}}" method="POST">
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
        </div>
    </div>

@endsection