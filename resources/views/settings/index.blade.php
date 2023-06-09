@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')


<div class="row mt-5">
    <div class="col-md-1">

    </div>
    <div class=" col-xl-8 col-md-8">
        <div class="card">
            <div class="card-body">
                <h2>{{ translate('Settings') }}</h2>
                
                <ul class="list-group mb-0 user-list">

                    <li class="list-group-item">
                        <a href="{{ route('language.index') }}" class="user-list-item">
                            <div class="user avatar-sm float-start me-2">
                                <img src="assets/images/users/user-3.jpg" alt="" class="img-fluid rounded-circle">
                            </div>
                            <div class="user-desc">
                                <h3 class="name mt-0 mb-1">{{ translate('Language') }}</h3>
                            </div>
                        </a>
                    </li>

                    <li class="list-group-item">
                        {{-- {{ route('coupon.index') }} --}}
                        <a href="" class="user-list-item">
                            <div class="user avatar-sm float-start me-2">
                                <img src="assets/images/users/user-5.jpg" alt="" class="img-fluid rounded-circle">
                            </div>
                            <div class="user-desc">
                                <h3 class="name mt-0 mb-1">{{ translate('Coupons') }}</h3>
                            </div>
                        </a>
                    </li>

                    <li class="list-group-item">
                        {{-- {{ route('role.index') }} --}}
                        <a href="" class="user-list-item">
                            <div class="user avatar-sm float-start me-2">
                                <img src="assets/images/users/user-6.jpg" alt="" class="img-fluid rounded-circle">
                            </div>
                            <div class="user-desc">
                                <h3 class="name mt-0 mb-1">{{ translate('Roles') }}</h3>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        
    </div>
</div>
@endsection