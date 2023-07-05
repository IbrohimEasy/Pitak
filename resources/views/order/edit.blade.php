@extends('layout.layout')

@section('title')
    {{-- Order Edit --}}
    {{ translate("Order Index") }}
@endsection

@section('styles')
    .error-data {
        color: red;
    }
@endsection

@section('content')

    <form action="{{ route('order.update', $model->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">

                <div class="mb-3">
                    <label for="example-select" class="form-label">{{ translate('Status') }}</label>
                    {{-- <label for="example-select" class="form-label">Status</label> --}}
                    <select class="form-select" id="example-select" name="status_id">
                        @if (count($modelStatus) > 0)
                            @foreach ($modelStatus as $valStatus)
                                @php
                                    $selected = '';
                                    if ($model->status_id == $valStatus->id) {
                                        $selected = 'selected';
                                    }
                                @endphp
                                <option value="{{ $valStatus->id }}" {{ $selected }}>{{ $valStatus->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="error-data">@error('status_id'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">{{ translate('Cars list') }}</label>
                    {{-- <label for="example-select" class="form-label">Cars list</label> --}}
                    <select class="form-select" id="example-select" name="cars_list_id">
                        @if (count($modelCarsList) > 0)
                            @foreach ($modelCarsList as $valCarsList)
                                @php
                                    $selected = '';
                                    if ($model->cars_list_id == $valCarsList->id) {
                                        $selected = 'selected';
                                    }
                                @endphp
                                <option value="{{ $valCarsList->id }}" {{ $selected }}>{{ $valCarsList->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="error-data">@error('cars_list_id'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">{{ translate('From') }}</label>
                    {{-- <label for="example-select" class="form-label">From</label> --}}
                    <select class="form-select" id="example-select" name="from_id">
                        @if (count($modelCity) > 0)
                            @foreach ($modelCity as $valCity)
                                @php
                                    $selected = '';
                                    if ($model->from_id == $valCity->id) {
                                        $selected = 'selected';
                                    }
                                @endphp
                                <option value="{{ $valCity->id }}" {{ $selected }}>{{ $valCity->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="error-data">@error('from_id'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">{{ translate('To') }}</label>
                    {{-- <label for="example-select" class="form-label">To</label> --}}
                    <select class="form-select" id="example-select" name="to_id">
                        @if (count($modelCity) > 0)
                            @foreach ($modelCity as $valCity)
                                @php
                                    $selected = '';
                                    if ($model->to_id == $valCity->id) {
                                        $selected = 'selected';
                                    }
                                @endphp
                                <option value="{{ $valCity->id }}" {{ $selected }}>{{ $valCity->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="error-data">@error('to_id'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('Price') }}</label>
                    {{-- <label for="simpleinput" class="form-label">Price</label> --}}
                    <input type="text" id="simpleinput" class="form-control" value="{{ $model->price }}" name="price">
                    <span class="error-data">@error('price'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">{{ translate('Price type') }}</label>
                    {{-- <label for="example-select" class="form-label">Price type</label> --}}
                    <select class="form-select" id="example-select" name="price_type">
                        @php
                            $selected = '';
                            if ($model->price_type == $valCarsList->id) {
                                $selected = 'selected';
                            }
                        @endphp
                        <option value="{{ $valCarsList->id }}" {{ $selected }}>{{ $valCarsList->name }}</option>
                    </select>
                    <span class="error-data">@error('price_type'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('Title') }}</label>
                    {{-- <label for="simpleinput" class="form-label">Title</label> --}}
                    <input type="text" id="simpleinput" class="form-control" value="{{ $model->title }}" name="titla">
                    <span class="error-data">@error('title'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label class="form-label">{{ translate('Start date') }}</label>
                    {{-- <label class="form-label">Start date</label> --}}
                    <input type="text" id="datetime-datepicker" class="form-control" placeholder="Date and Time" value="{{ date('Y-m-d H:i', strtotime($model->start_date)) }}" name="start_date">
                    <span class="error-data">@error('start_date'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    @php
                        $seats = [];
                        if ($model->seats)
                            $seats = json_decode($model->seats);
                    @endphp

                    <label class="form-label">{{ translate('Seats') }}</label> <br/>
                    {{-- <label class="form-label">Seats</label> --}}
                    <select id="selectize-optgroup" multiple placeholder="{{ translate('Select gear...') }}">
                    {{-- <select id="selectize-optgroup" multiple placeholder="Select gear..." name="seats[]"> --}}
                        @foreach($seats as $valSeat)
                            <option value="{{ $valSeat }}">{{ $valSeat }}</option>
                        @endforeach
                    </select>
                    <span class="error-data">@error('seats'){{ $message }}@enderror</span>
                </div>

                <button class="btn btn-primary" type="submit">{{ translate('Submit') }}</button>
                {{-- <button class="btn btn-primary" type="submit">Submit</button> --}}

            </div>
        </div>
    </form>

@endsection
