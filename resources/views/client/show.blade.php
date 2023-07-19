@extends('layout.layout')

@section('title')
    {{ translate("Users Show") }}
@endsection

@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">

                {{-- <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all me-1"></i> {{ $model->title }} </h4> --}}

                <ul class="list-group mb-0 user-list">
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="user float-start me-3">
                                <i class="mdi mdi-circle text-primary"></i>
                            </div>
                            <div class="user-desc overflow-hidden">
                                <h5 class="name mt-0 mb-1">{{ translate('F.I.O') }}</h5>
                                <span class="desc text-muted font-12 text-truncate d-block">
                                    {{ $model->personalInfo ? $model->personalInfo->last_name . ' ' . $model->personalInfo->first_name . ' ' . $model->personalInfo->middle_name : '' }}
                                </span>
                            </div>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="user float-start me-3">
                                <i class="mdi mdi-circle text-success"></i>
                            </div>
                            <div class="user-desc overflow-hidden">
                                <h5 class="name mt-0 mb-1">{{ translate('Phone number') }}</h5>
                                <span class="desc text-muted font-12 text-truncate d-block">{{ $model->personalInfo ? $model->personalInfo->phone_number : '' }}</span>
                            </div>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="user float-start me-3">
                                <i class="mdi mdi-circle text-pink"></i>
                            </div>
                            <div class="user-desc overflow-hidden">
                                <h5 class="name mt-0 mb-1">{{ translate('Mail') }}</h5>
                                <span class="desc text-muted font-12 text-truncate d-block"></span>
                            </div>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="user float-start me-3">
                                <i class="mdi mdi-circle text-muted"></i>
                            </div>
                            <div class="user-desc overflow-hidden">
                                <h5 class="name mt-0 mb-1">{{ translate('Status') }}</h5>
                                <span class="desc text-muted font-12 text-truncate d-block">{{ $model->status ? $model->status->name : '' }}</span>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills navtab-bg"> {{--  nav-justified --}}
                    <li class="nav-item">
                        <a href="#passportTab" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                            {{ translate('Passport') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#ordersTab" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            {{ translate('Orders') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#commentScoreTab" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            {{ translate('Comment and scores') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="passportTab">

                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>{{ translate('Attribute') }}</th>
                                    <th>{{ translate('Value') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if (isset($model))
                                    <tr>
                                        <th>{{ translate('Serial number') }}</th>
                                        <td>
                                            {{ $model->serial_number ?? '' }}
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <th>{{ translate('Company') }}</th>
                                        <td>
                                            <a href="">{{ $order->company ? $order->company->name : '' }}</a>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <th>{{ translate('Issued by') }}</th>
                                        <td>{{ $model->issued_by ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Passport image') }}</th>
                                        <td>{{ $model->passport_image ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Passport expired date') }}</th>
                                        <td>{{ ($model->passport_expired_date) ? date('d.m.Y H:i', strtotime($model->passport_expired_date)) : '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('License number') }}</th>
                                        <td>{{ $model->license_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('License expired date') }}</th>
                                        <td>{{ ($model->license_expired_date) ? date('d.m.Y H:i', strtotime($model->license_expired_date)) : '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('License image') }}</th>
                                        <td>{{ $model->license_image ?? '' }}</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane overflow-scroll" id="ordersTab">
                        
                        <table class="table table-striped table-bordered dt-responsive nowrap datatable-buttons">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    {{-- <th>{{ translate('Company') }}</th> --}}
                                    <th>{{ translate('From') }}</th>
                                    <th>{{ translate('To') }}</th>
                                    <th>{{ translate('Order title') }}</th>
                                    <th>{{ translate('Seats type') }}</th>
                                    <th>{{ translate('Seats count') }}</th>
                                    <th>{{ translate('Price') }}</th>
                                    <th>{{ translate('Comment') }}</th>
                                    <th>{{ translate('Status') }}</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @if (count($orderDetails) > 0)
                                    @php
                                        $n = 1;
                                    @endphp
                                    @foreach ($orderDetails as $valOD)
                                        <tr>
                                            <td>{{ $n++ }}</td>
                                            {{-- <td><a href="">{{ $valOD->company ? $valOD->company->name : '' }}</a></td> --}}
                                            <td>{{ ($valOD->from) ? $valOD->from->name : '' }}</td>
                                            <td>{{ ($valOD->to) ? $valOD->to->name : '' }}</td>
                                            <td>{{ ($valOD->order) ? $valOD->order->title : '' }}</td>
                                            <td>{{ $valOD->seats_type }}</td>
                                            <td>{{ $valOD->seats_count }}</td>
                                            <td>{{ $valOD->price }}</td>
                                            <td>{{ $valOD->comment }}</td>
                                            <td>{{ $valOD->status ? $valOD->status->name : '' }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane" id="commentScoreTab">
                        
                        <table class="table table-striped table-bordered dt-responsive nowrap datatable-buttons">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ translate('Driver') }}</th>
                                    <th>{{ translate('Order') }}</th>
                                    <th>{{ translate('Date') }} date</th>
                                    <th>{{ translate('Text') }}</th>
                                    <th>{{ translate('Score') }}</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @if (count($commentScores) > 0)
                                    @php
                                        $n = 1;
                                    @endphp
                                    @foreach ($commentScores as $valCS)
                                        <tr>
                                            <td>{{ $n++ }}</td>
                                            <td>
                                                <a href="{{ route('client.show', ($valCS->driver) ? $valCS->driver->id : 0) }}">
                                                    {{ ($valCS->driver && $valCS->driver->personalInfo) ? $valCS->driver->personalInfo->last_name . ' ' . $valCS->driver->personalInfo->first_name . ' ' . $valCS->driver->personalInfo->middle_name : '' }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('order.show', ($valCS->order) ? $valCS->order->id : 0) }}">
                                                    {{ ($valCS->order) ? $valCS->order->title : '' }}
                                                </a>
                                            </td>
                                            <td>{{ date('d.m.Y H:i', strtotime($valCS->date)) }}</td>
                                            <td>{{ $valCS->text }}</td>
                                            <td>{{ $valCS->score }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> <!-- end row -->

@endsection

{{-- @extends('layout.layout')

@section('title')
    {{ translate("Order Show") }}
@endsection
@section('content')

    <div>
        <a href="{{ route('client.index') }}">
            <button type="button" class="btn btn-success waves-effect waves-light">{{ translate('List') }}</button>
        </a>
        <a href="{{ route('client.edit', $model->id) }}">
            <button type="button" class="btn btn-primary waves-effect waves-light">{{ translate('Edit') }}</button>
        </a>
        <button type="button" class="btn btn-danger delete-order" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('client.destroy', $model->id) }}">{{ translate('Delete') }}</button>
    </div>
    <br>
        
    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>{{ translate('Attribute') }}</th>
                <th>{{ translate('Value') }}</th>
            </tr>
        </thead>

        <tbody>
            @if (isset($model))            
                <tr>
                    <th>{{ translate('Personal info') }}</th>
                    <td>{{ $model->personalInfo ? $model->personalInfo->last_name . ' ' . $model->personalInfo->first_name . ' ' . $model->personalInfo->middle_name : '' }}</td>
                </tr>
                <tr>
                    <th>{{ translate('Company') }}</th>
                    <td>{{ $model->company ? $model->company->name : '' }}</td>
                </tr>
                <tr>
                    <th>{{ translate('Status') }}</th>
                    <td>{{ $model->status ? $model->status->name : '' }}</td>
                </tr>
            @endif
        </tbody>
    </table>

@endsection --}}
