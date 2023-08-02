@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')
    {{-- <div class="card"> --}}
        {{-- <div class="card-body"> --}}
            <h3 class="mt-0 header-title">{{translate('Coupons')}}</h3>
            <div class="dropdown float-end">
                <a class="form_functions btn btn-success" href="{{route('coupon.create')}}">{{translate('Create')}}</a>
            </div>
            <p class="text-muted font-14 mb-3">
                {{translate('Coupons list')}}
            </p>
            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Percent</th>
                        <th>date</th>
                        <th>Functions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                       $i = 1;
                    @endphp
                    @foreach ($coupons as $coupon)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{$coupon->name}}</td>
                        <td>{{$coupon->percent}}</td>
                        <td>{{$coupon->created_at}}</td>
                        <td>
                            {{-- <a href="{{ route('coupon.show', $coupon->id) }}">
                                <button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button>
                            </a> --}}
                            <a href="{{ route('coupon.edit', $coupon->id) }}">
                                <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-edit"></i></button>
                            </a>
                            {{-- <a href="{{ route('coupon.destroy', $coupon->id) }}"> --}}
                                {{-- <button type="button" class="btn btn-danger waves-effect waves-light"><i class="fe-trash-2"></i></button> --}}
                                <button type="button" class="btn btn-danger delete-datas" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('coupon.destroy', $coupon->id) }}"><i class="fe-trash-2"></i></button>
                            {{-- </a> --}}
                        </td>
                    </tr>   
                    @endforeach
                </tbody>
            </table>
        {{-- </div> --}}
    {{-- </div> --}}

<script>

var conn = new WebSocket('wss://185.196.213.73:8090/');
conn.onopen = function(e) {
    console.log("Connection established!");
};
conn.onmessage = function(e) {
    console.log(e.data);
};

</script>
@endsection