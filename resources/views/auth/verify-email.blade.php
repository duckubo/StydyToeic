@extends('layouts.app')

@section('title', 'Trang Chủ')

@section('content')
@include('includes.header')
<div class="container">
    <h1>{{ __('label.xacthucemail') }}</h1>
    <p>{{ __('label.xacminhdiachiemail') }}</p>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">{{ __('label.guilaixacminh') }}</button>
    </form>
</div>

<div id="para1">
    @include('includes.footer')
</div>

@endsection