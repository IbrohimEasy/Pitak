@extends('layout.layout')

@section('title')
    {{ translate("Order Show") }}
@endsection

@section('content')

<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-body">

                <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all me-1"></i> {{ $order->title }} </h4>
                {{-- <h4 class="header-title mt-0 mb-3"><i class="mdi mdi-notification-clear-all me-1"></i> {{ translate('Data of order\'s') }}</h4> --}}

                <ul class="list-group mb-0 user-list">
                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="user float-start me-3">
                                <i class="mdi mdi-circle text-primary"></i>
                            </div>
                            <div class="user-desc overflow-hidden">
                                <h5 class="name mt-0 mb-1">{{ translate('From') }}</h5>
                                <span class="desc text-muted font-12 text-truncate d-block">{{ $order->from ? $order->from->name : '' }}</span>
                            </div>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="user float-start me-3">
                                <i class="mdi mdi-circle text-success"></i>
                            </div>
                            <div class="user-desc overflow-hidden">
                                <h5 class="name mt-0 mb-1">{{ translate('To') }}</h5>
                                <span class="desc text-muted font-12 text-truncate d-block">{{ $order->to ? $order->to->name : '' }}</span>
                            </div>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a href="#" class="user-list-item">
                            <div class="user float-start me-3">
                                <i class="mdi mdi-circle text-pink"></i>
                            </div>
                            <div class="user-desc overflow-hidden">
                                <h5 class="name mt-0 mb-1">{{ translate('Start date') }}</h5>
                                <span class="desc text-muted font-12 text-truncate d-block">{{ date('d.m.Y H:i', strtotime($order->start_date)) }}</span>
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
                                <span class="desc text-muted font-12 text-truncate d-block">{{ $order->status ? $order->status->name : '' }}</span>
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
                <ul class="nav nav-pills navtab-bg"> {{-- nav-justified --}}
                    <li class="nav-item">
                        <a href="#moreTab" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                            {{ translate('More') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#reviewsTab" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                            {{ translate('Reviews') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#offersTab" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            {{ translate('Offers') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="moreTab">

                        <table class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>{{ translate('Attribute') }}</th>
                                    <th>{{ translate('Value') }}</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @if (isset($order))
                                    <tr>
                                        <th>{{ translate('Driver') }}</th>
                                        <td>
                                            <a href="">
                                                {{ $order->driver && $order->driver->personalInfo ? $order->driver->personalInfo->last_name . ' ' . $order->driver->personalInfo->first_name . ' ' . $order->driver->personalInfo->middle_name : '' }}
                                            </a>
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <th>{{ translate('Company') }}</th>
                                        <td>
                                            <a href="">{{ $order->company ? $order->company->name : '' }}</a>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <th>{{ translate('Car') }}</th>
                                        <td>{{ $order->carList ? $order->carList->name : '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Price') }}</th>
                                        <td>{{ $order->price }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Price type') }}</th>
                                        <td>{{ $order->price_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Title') }}</th>
                                        <td>{{ $order->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>{{ translate('Seats') }}</th>
                                        {{-- <td>
                                            @php
                                                $seats = [];
                                                if ($order->seats)
                                                    $seats = json_decode($order->seats);
                                            @endphp
                                            @foreach ($seats as $orderSeat)
                                                <button type="button" class="btn btn-soft-secondary waves-effect">{{ $orderSeat }}</button>
                                            @endforeach
                                        </td> --}}
                                        <td>
                                            @if ($order->seats)
                                                <button type="button" class="btn btn-soft-secondary waves-effect">{{ $order->seats }}</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane overflow-scroll" id="reviewsTab">

                        <table class="table table-striped table-bordered dt-responsive nowrap datatable-buttons">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ translate('Driver') }}</th>
                                    <th>{{ translate('Users') }}</th>
                                    <th>{{ translate('For whom') }}</th>
                                    <th>{{ translate('Date') }}</th>
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
                                                <a href="{{ route('client.show', $valCS->driver->id ?? 0) }}">
                                                    {{ ($valCS->driver && $valCS->driver->personalInfo) ? $valCS->driver->personalInfo->last_name . ' ' . $valCS->driver->personalInfo->first_name . ' ' . $valCS->driver->personalInfo->middle_name : '' }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('client.show', $valCS->client->id) }}">
                                                    {{ ($valCS->client && $valCS->client->personalInfo) ? $valCS->client->personalInfo->last_name . ' ' . $valCS->client->personalInfo->first_name . ' ' . $valCS->client->personalInfo->middle_name : '' }}
                                                </a>
                                            </td>
                                            <td>{{ ($valCS->type == 1) ? translate('Users') : translate('Driver') }}</td>
                                            <td>{{ date('d.m.Y H:i', strtotime($valCS->date)) }}</td>
                                            <td>{{ $valCS->text }}</td>
                                            <td>{{ $valCS->score }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                    <div class="tab-pane overflow-scroll" id="offersTab">
                        
                        <table class="table table-striped table-bordered dt-responsive nowrap datatable-buttons">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ translate('Driver') }}</th>
                                    <th>{{ translate('Users') }}</th>
                                    <th>{{ translate('Price') }} date</th>
                                    <th>{{ translate('Comment') }}</th>
                                    <th>{{ translate('Status') }}</th>
                                    <th>{{ translate('Created at') }}</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @if (count($offers) > 0)
                                    @php
                                        $n = 1;
                                    @endphp
                                    @foreach ($offers as $val)
                                        <tr>
                                            <td>{{ $n++ }}</td>
                                            <td>
                                                <a href="{{ route('client.show', $val->driver->id) }}">
                                                    {{ ($val->driver && $val->driver->personalInfo) ? $val->driver->personalInfo->last_name . ' ' . $val->driver->personalInfo->first_name . ' ' . $val->driver->personalInfo->middle_name : '' }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('client.show', $val->client->id) }}">
                                                    {{ ($val->client && $val->client->personalInfo) ? $val->client->personalInfo->last_name . ' ' . $val->client->personalInfo->first_name . ' ' . $val->client->personalInfo->middle_name : '' }}
                                                </a>
                                            </td>
                                            <td>{{ $val->price }}</td>
                                            <td>{{ $val->comment }}</td>
                                            <td>{{ $val->status }}</td>
                                            <td>{{ date('d.m.Y H:i', strtotime($val->created_at)) }}</td>
                                            {{-- <td> --}}
                                                {{-- <a href="{{ route('offer.show', $val->id) }}">
                                                    <button type="button" class="btn btn-success waves-effect waves-light"><i class="fe-eye"></i></button>
                                                </a>
                                                <a href="{{ route('offer.edit', $val->id) }}">
                                                    <button type="button" class="btn btn-primary waves-effect waves-light"><i class="fe-edit"></i></button>
                                                </a>
                                                <button type="button" class="btn btn-danger delete-datas" data-bs-toggle="modal" data-bs-target="#warning-alert-modal" data-url="{{ route('offer.destroy', $val->id) }}"><i class="fe-trash-2"></i></button> --}}
                                            {{-- </td> --}}
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