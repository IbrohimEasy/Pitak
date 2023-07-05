@extends('layout.layout')

@section('title')
    {{-- Your page title --}}
@endsection
@section('content')

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

@endsection