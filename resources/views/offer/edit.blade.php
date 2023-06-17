@extends('layout.layout')

@section('title')
    {{-- Offer Edit --}}
    {{ translate("Offer Index") }}
@endsection

@section('styles')
    .error-data {
        color: red;
    }
@endsection

@section('content')

    <form action="{{ route('offer.update', $model->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">

                <div class="mb-3">
                    <label for="example-select" class="form-label">{{ translate('Driver') }}</label>
                    {{-- <label for="example-select" class="form-label">Driver</label> --}}
                    <select class="form-select" id="example-select" name="driver_id">
                        @if (count($driver) > 0)
                            @foreach ($driver as $valDriver)
                                @php
                                    $selected = '';
                                    if ($model->driver_id == $valDriver->id) {
                                        $selected = 'selected';
                                    }
                                @endphp
                                <option value="{{ $valDriver->id }}" {{ $selected }}>{{ $valDriver->personalInfo ? $valDriver->personalInfo->last_name . ' ' . $valDriver->personalInfo->first_name . ' ' . $valDriver->personalInfo->middle_name : '' }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="error-data">@error('driver_id'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="example-select" class="form-label">{{ translate('Client') }}</label>
                    {{-- <label for="example-select" class="form-label">Client</label> --}}
                    <select class="form-select" id="example-select" name="client_id">
                        @if (count($client) > 0)
                            @foreach ($client as $valClient)
                                @php
                                    $selected = '';
                                    if ($model->client_id == $valClient->id) {
                                        $selected = 'selected';
                                    }
                                @endphp
                                <option value="{{ $valClient->id }}" {{ $selected }}>{{ $valClient->personalInfo ? $valClient->personalInfo->last_name . ' ' . $valClient->personalInfo->first_name . ' ' . $valClient->personalInfo->middle_name : '' }}</option>
                            @endforeach
                        @endif
                    </select>
                    <span class="error-data">@error('client_id'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('Price') }}</label>
                    {{-- <label for="simpleinput" class="form-label">Price</label> --}}
                    <input type="text" id="simpleinput" class="form-control" value="{{ $model->price }}" name="price">
                    <span class="error-data">@error('price'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                    <label for="simpleinput" class="form-label">{{ translate('Comment') }}</label>
                    {{-- <label for="simpleinput" class="form-label">Comment</label> --}}
                    <input type="text" id="simpleinput" class="form-control" value="{{ $model->comment }}" name="comment">
                    <span class="error-data">@error('comment'){{ $message }}@enderror</span>
                </div>

                <button class="btn btn-primary" type="submit">{{ translate('Submit') }}</button>
                {{-- <button class="btn btn-primary" type="submit">Submit</button> --}}

            </div>
        </div>
    </form>

@endsection
